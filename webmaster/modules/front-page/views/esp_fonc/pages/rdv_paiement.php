<?php
 
 $var = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
      
$datedeb='2014-09-17';
if(date('Y-m-d')>$datedeb){
 
$date_string = mktime(0,0,0,date("m"),date("d"),date("Y"));
$nombre_jour = 30;
$timestamp = $date_string + ($nombre_jour * 86400);
$jourfin = date("Y-m-d", $timestamp); 

$nombre_jour1 = 1;
$timestamp1 = $date_string - ($nombre_jour1 * 86400);
$jour=date("Y-m-d", $timestamp1); 

}else{

$dat=explode('-',$datedeb);
$jour=$datedeb;
$jourfin=$dat[0].'-'.$dat[1].'-'.($dat[2]+10); 
}

$dates = getDatesBetween($jour,$jourfin); 
$tdates=array_diff($dates,$jourferies); 
//$tdates=array_diff($dates,$table);

$var = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
      
 echo '<select name="daterdv" id="daterdv" class="champs_de_saisie" required style="width:100%">';
 echo'<option value="" selected="selected">Sélectionnez ...</option>';
      foreach($tdates as $val){
    $date=explode('-',$val);
   $dateval=($date[2].'/'.$date[1].'/'.$date[0]);
   $jourrepos=check_dimanche($dateval);//verifie si c'est un dimanche
  
    if($jourrepos==0){
          
      
                    echo'<option value="'.$val.'">'.$date[2].' '.$var[intval($date[1])].' '.$date[0].'</option>';
    }
  
   }
                 echo  '</select>';
      ?>