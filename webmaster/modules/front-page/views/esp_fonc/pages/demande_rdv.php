<style type="text/css">
 @media (min-width:900px){
	#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}
 }  
</style>

<?php
$table = '';
 
/*while($ext=$extract_data){
	$table[]=$ext['DATE_RDV'];
}*/

foreach($extract_data as $ext){
	$table[]=$ext['DATE_RDV'];
}

function date_jour($frdate){
  //$frdate="02/02/2009";
  $joursem = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  //$mois = array(0,"Janvier", "Fevrier", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  $var = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
//$dat=explode('-',$frdate);

  // extraction des jour, mois, an de la date
  list($annee, $mois,$jour ) = explode('-', $frdate);
  $moisj=$var[intval($mois)];
  // calcul du timestamp
  $timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
  // affichage du jour de la semaine
  $datejm=$joursem[date("w",$timestamp)].' '.$jour.' '.$moisj.' '.$annee;
  
  return $datejm;
 } 
 
// GET HOLIDAYS
function getHolidays($year = null){
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
		   date('Y-m-d', mktime(0, 0, 0, 11, 11, $year)),// Armistice
			date('Y-m-d',mktime(0, 0, 0, 12, 25, $year)),// Noel

			// Jour feries qui dependent de paques
			date('Y-m-d',mktime(0, 0, 0, $easterMonth, $easterDay + 1, $easterYear)),// Lundi de paques
		   date('Y-m-d', mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear)),// Ascension
			date('Y-m-d',mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear)), // Pentecote
	);

	sort($holidays);

	return $holidays;
}

 /*$next_day_fund = null;
	
  for ($i = 0; $i <= 7; $i++)
  {
    $next_day = mktime(0,0,0, date("m"), date("d")+$i, date("Y"));
    $end_date = mktime(0,0,0, date("m"), date("d")+$i, date("Y")+2);
  
  echo date("w",$next_day).'<br>'; exit;
  }*/
  
function next_day($day_number)
{
	//$nom_jour_fr = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
    $next_day_fund = null;
	
  for ($i = 0; $i <= 7; $i++)
  {
    $next_day = mktime(0,0,0, date("m"), date("d")+$i, date("Y"));
    $end_date = mktime(0,0,0, date("m"), date("d")+$i, date("Y")+2);
  
    //echo date("w",$next_day).'<br>';
    if(date("w",$next_day)==3 /*and !in_array(date('Y-m-d',$next_day),getHolidays(date('Y',$next_day)))*/)
    {
      $XDate = getdate($next_day);
      $next_day_fund = sprintf('%02d', $XDate['mday']).'-'.sprintf('%02d', 
      $XDate['mon']).'-'.sprintf('%02d', $XDate['year']);
      
	  $pas = 60*60*24*7;
	  $tab = array();
      for($next_day; $next_day <= $end_date; $next_day += $pas)
      {
		  if(date("w",$next_day)==3)
    		{
        		$tab[] = date("d-m-Y", $next_day);
				
			}else
			{
				$next_day += 60*60*23;
				$tab[] = date("d-m-Y", $next_day);
				
			}
      }
    }
  }
  return $tab;
}

//FUNCTION QUI TROUVE LES SAMEDIS ET DIMANCHES
function check_dimanche($value) {
	preg_match(' /([0-9]+)\/([0-9]+)\/([0-9]+)/ ', $value , $match );
	$date = date("l", mktime(0, 0, 0, $match[2], $match[1], $match[3]));
	$date = trim($date);
	if (strstr($date,"Sunday")) return 1;
	if (strstr($date,"Saturday")) return 1;
	else return 0;
}

function getDatesBetween($start, $end){
	if($start > $end)
	{
		return false;
	}    

	$sdate    = strtotime("$start +1 day");
	$edate    = strtotime($end);

	$dates = array();

	for($i = $sdate; $i < $edate; $i += strtotime('+1 day', 0))
	{
		$dates[] = date('Y-m-d', $i);
	}

	return $dates;
}

//retourne ts ls jours feriés
$jourferies=getHolidays(date('Y'));
?>

 <div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">DEMANDE DE RENDEZ-VOUS<span style="text-transform:lowercase"></span></h1>
  </div>
</div>

<br>

<div class="panel-grid" id="pgx-7-1" style="margin-top:20px;">  
 
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">Formulaire de demande d'un rendez-vous</h3>           
		<!--contenu-->
        <p>
        	<?php include('message.php'); ?>

<form action="<?php echo site_url($ctrl.'/nous_contacter') ?>" method="post">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr>
    <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/edition_objet_v.png') ?>" alt="sbx">
               Objet  <span style="color:#F00">*</span></fieldset></td>
  </tr>
  <tr>
    <td><select name="objet" id="objet" class="champ_de_saisie sel" required placeholder="Objet ...">
      <option value="">Sélectionnez ...</option>
      <?php foreach($objet as $odj){?>
      <option value="<?php echo $odj['idobjet'] ?>"><?php echo $odj['libelle'] ?></option>
      <?php }?>
    </select></td>
  </tr> 
  <tr>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
                   Date du rendez-vous <span style="color:#F00">*</span>
                  </fieldset></td>
  </tr>
  <tr>
    <td><?php
	
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
//$dates = next_day(date('m/d/Y'));
$tdates=array_diff($dates,$jourferies); 
////$tdates=array_diff($dates,$table);

$var = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
			   
	echo '<select required name="daterdv" id="daterdv" class="acte_champ">';
	echo'<option value="" selected="selected">Sélectionnez --</option>';
	$tab1 =  next_day(date('m/d/Y')); 
     foreach ($tab1 as $valeur) {
		?>
		<option value="<?php echo $valeur; ?>"><?php echo 'Mercredi '.$valeur; ?></option>
		<?php
		}
                 echo  '</select>';
					 ?>
             
                        </select></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/article_v.png') ?>" alt="sbx">
               Quelques précisions sur l'objet du RDV
    </fieldset></td>
  </tr>
  <tr>
    <td><textarea name="motif" id="motif" cols="45" rows="5" placeholder="..."></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <!--<tr>
    <td class="nota">&nbsp;</td>
  </tr>-->
  <tr>
    <td><input type="submit" name="button" id="button" value="Valider le rendez-vous" class="btn btn-primary"></td>
  </tr>
 
</table>

<input name="send_form" type="hidden" value="rdv">
<input name="nc" type="hidden" value="2">      
</form>
        </p>   
              
  </div>   
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
<h3 class="widget-title">Note d'Information</h3>
     
<div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
<div class="page-box page-box--block post-7 page type-page status-publish hentry" style="padding-left:3px"> 

<!--contenu-->      	      
<div class="warning">
En cas d'indisponibilité à la date prévue, Merci de le signaler à nos services 48H à l'avance, en annulant votre RDV. Dans ce cas, vous devrez refaire la procédure pour un RDV à une autre date.
</div> 
                                          
</div>   
</div>
<!---->
</div>     
</div>