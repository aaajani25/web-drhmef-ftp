<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of So_Dates
 *
 * @author SCE RESEAU
 */
class Datespro {
    private $datedeb;
    private $datefin;
    private $year;
    private $datejour;
    private $var = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
    private $tdates=array();
    private $CI = null;
    //put your code here
   public function __construct()
    {     
        

        //$this->load->library("Datespro");
    }
    
    //FUNCTION QUI TROUVE LES SAMEDIS ET DIMANCHES
public function check_dimanche($datejour) {
preg_match(' /([0-9]+)\/([0-9]+)\/([0-9]+)/ ', $datejour , $match );
$date = date("l", mktime(0, 0, 0, $match[2], $match[1], $match[3]));
$date = trim($date);
if (strstr($date,"Sunday")) return 1;
if (strstr($date,"Saturday")) return 1;
else return 0;
}
//function qui retourne tous les jours feriés
public function getHolidays($year = null){
        if ($year === null)
        {
                $year = intval(strftime('%Y'));
        }

        $easterDate = easter_date($year);
        $easterDay = date('j', $easterDate);
        $easterMonth = date('n', $easterDate);
        $easterYear = date('Y', $easterDate);

        $holidays = array(
                // Jours feries fixes
               date('Y-m-d', mktime(0, 0, 0, 1, 1, $year)),// 1er janvier
               date('Y-m-d', mktime(0, 0, 0, 5, 1, $year)),// Fete du travail
                date('Y-m-d',mktime(0, 0, 0, 5, 8, $year)),// Victoire des allies
                date('Y-m-d',mktime(0, 0, 0, 8, 7, $year)),// Fete nationale
               date('Y-m-d', mktime(0, 0, 0, 8, 15, $year)),// Assomption
               date('Y-m-d', mktime(0, 0, 0, 11, 1, $year)),// Toussaint
               //date('Y-m-d', mktime(0, 0, 0, 11, 11, $year)),// Armistice
                date('Y-m-d',mktime(0, 0, 0, 12, 25, $year)),// Noel

                // Jour feries qui dependent de paques
                date('Y-m-d',mktime(0, 0, 0, $easterMonth, $easterDay + 1, $easterYear)),// Lundi de paques
               date('Y-m-d', mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear)),// Ascension
                date('Y-m-d',mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear)), // Pentecote
        );

        sort($holidays);

        return $holidays;
}

//functin qui la date ex: lundi 2 Janvier annee
public function date_jour($datejour){
  //$frdate="02/02/2009";
  $joursem = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  //$mois = array(0,"Janvier", "Fevrier", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  
//$dat=explode('-',$frdate);

  // extraction des jour, mois, an de la date
  list($annee, $mois,$jour ) = explode('-',$datejour);
  $moisj=$var[intval($mois)];
  // calcul du timestamp
  $timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
  // affichage du jour de la semaine
  $datejm=$joursem[date("w",$timestamp)].' '.$jour.' '.$moisj.' '.$annee;
  return $datejm;
  
 }  
 
 //function qui affiche l'inervalle entre deux dates
 public function getDatesBetween($datedeb,$datefin){
    if($datedeb > $datefin)
    {
        return false;
    }    
   
    $sdate    = strtotime("$datedeb +1 day");
    $edate    = strtotime($datefin);
   
    $dates = array();
   
    for($i = $sdate; $i < $edate; $i += strtotime('+1 day', 0))
    {
        $dates[] = date('Y-m-d', $i);
    }
   
    return $dates;
}
//function qui affiche des dates contenu d'un tableau en champ select
public function date_select($champ,$tdates){
 //$tablea_mois = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
  echo '<select name="'.$champ.'" id="'.$champ.'" >';
	echo'<option value="" selected="selected">--Selectionnez--</option>';
      foreach($tdates as $val){
		  $date=explode('-',$val);
		 $dateval=($date[2].'/'.$date[1].'/'.$date[0]);
		
			   
                    echo'<option value="'.$val.'">'.$date[2].' '.$var[intval($date[1])].' '.$date[0].'</option>';
		//  }
		 /*  else{
			    echo'<option value="'.$val.'">SDDD'.$date[2].' '.$var[intval($date[1])].' '.$date[0].'</option>';
		  } */
	  }
                 echo  '</select>';  
}

    
}
