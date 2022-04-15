<?php
function getHolidays($year = null)
{
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
$jourferies=getHolidays(date('Y'));//retourne ts ls jours feriés

function getDatesBetween($start, $end)
{
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

// FONCTION DE CODIFICATION 
// FONCTION DE CODIFICATION 
function codification($numrec){

/* // Sortir code structure
$code="SELECT  `CE_AGT_STRUCT` FROM `bd_sigfae_web`.`tbce_agt` WHERE `CE_AGT_MAT` = '".$_SESSION['matricule']."'";
$ex_code=mysql_query($code);
$tab_code=mysql_fetch_array($ex_code);
$str=$tab_code['CE_AGT_STRUCT']; */


 $nbrchar=strlen($numrec);
  $an=  date('y');
  $str='XXXX';
       
 if($nbrchar==1)
 {
  $val='000000'.$numrec.'/'.$an.$str;
 }
 elseif($nbrchar==2)
 {
  $val='00000'.$numrec.'/'.$an.$str;
 }
 elseif($nbrchar==3)
 {
  $val='0000'.$numrec.'/'.$an.$str;
 }
 elseif($nbrchar==4)
 {
  $val='000'.$numrec.'/'.$an.$str;
 }
 elseif($nbrchar==5)
 {
           $val='00'.$numrec.'/'.$an.$str;
 }
 elseif($nbrchar==6)
 {
  $val='0'.$numrec.'/'.$an.$str;
 }
 else
 {
 $val=$numrec.'/'.$an.$str;
 }
 
 return $val;
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

function checkcivilite($sexe, $civilite)
{
	if($sexe==2)
	{
		if($civilite==1)
		{
		  $ers=0;	
		}
	   else
	    {
		  $ers=1;	
		}
	}
   else
    {
		if($civilite==2)
		{
		  $ers=0;	
		}
	   elseif($civilite==3)
	    {
		  $ers=0;	
		}
	  else
	    {
		  $ers=1;	
		}
	}
return $ers;
}
?>

<!--date picker-->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/jquery-ui.css">
  <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
  
  <script src="<?php echo base_url('assets') ?>/js/jquery-1.12.4.js"></script>
  <script src="<?php echo base_url('assets') ?>/js/jquery-ui.js"></script> 
  <script src="<?php echo base_url('assets') ?>/css/datepicker-fr.js"></script>
   
  <script>
	  jQuery.noConflict();
	  
	  jQuery( function() {
		jQuery( "#datepicker" ).datepicker( jQuery.datepicker.regional[ "fr" ] );   
	  } );
  </script>
<!--date picker-->

<script type="text/javascript">
function modif_cout()
{  
	var t1 = document.getElementById("nbcopie");
	var t2 = document.getElementById("cout");
	t2.disabled="";
	t2.value=(t1.value*2000); 
	t2.disabled="disabled";
	t2.style.color='red';
}
</script>

<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	FORMULAIRE DE DEMANDE D'ACTES DE NON ENGAGEMENT<br>
<!--<span style="text-transform:lowercase">(UNIQUEMENT POUR LES NON-FONCTIONNAIRES)</span>-->
</h1>
  </div>
</div>

<?php 
	if(!empty($msg)){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>" id="tab" style="margin-top:3px">
            <?php echo $msg; ?>
        </div>
        
        <script type="text/javascript"> 
    	setTimeout(function(){
    		document.getElementById('tab').style.display = 'none';
    },10000);
    </script>
<?php
}
?>

<br>

<div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">  
 <form action="<?php echo site_url($ctrl.'/trt_non_engagement') ?>" method="post">
 
  <div class="panel-grid-cell" id="pgcx-7-1-0">

	    <h3 class="widget-title">Informations personnelles</h3> 
          
		<!--contenu-->
        <p>        
            <table width="100%" border="0" align="center" cellpadding="7" cellspacing="5">                            
              <tr>
                <td colspan="2"> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Civilité  <span style="color:#F00">*</span></fieldset></td>
              </tr>
              <tr>
                <td colspan="2"><select name="civilite" class="champ_de_saisie sel" required id="civilite">
                  <option value="">Sélectionnez ...</option>
                  <option value="6">DOCTEUR</option>
                  <option value="2">MADAME</option>
                  <option value="3">MADEMOISELLE</option>
                  <option value="1">MONSIEUR</option>
                  <option value="5">PROFESSEUR</option>
                  <option value="7">SON EXCELLENCE</option>
                </select></td>
              </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>
                             
               
               <tr>
                <td colspan="2"> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/sexe_enfant_v.png') ?>" alt="sbx">
               Sexe  <span style="color:#F00">*</span></fieldset></td>
              </tr>
               <tr>
                 <td colspan="2"><select name="sexe" class="champ_de_saisie sel" required>
                   <option value="">Sélectionnez ...</option>
                   <option value="1">MASCULIN</option>
                   <option value="2">FEMININ</option>
                 </select></td>
               </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>
               
              <tr>
                <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/lieu_monde_v.png') ?>" alt="sbx">
               Lieu de naissance  <span style="color:#F00">*</span></fieldset></td>
              </tr>
              <tr>
                <td colspan="2"><select name="lieu" class="champ_de_saisie sel" required>
                  <option value="">Sélectionnez ...</option>
                  <?php foreach($ville as $vil) {?>
                  <option value="<?php echo $vil['CODE_SPREF'] ?>"><?php echo $vil['LIB_SPREF'] ?></option>
                  <?php } ?>
                </select></td>
              </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>
               
               <tr>
                <td colspan="2"> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/piece_pin_v.png') ?>" alt="sbx">
               Nature de la pièce</fieldset></td>
              </tr>
               <tr>
                 <td colspan="2"><select name="cni" class="champ_de_saisie sel">
                   <option value="">Sélectionnez ...</option>
                   <option value="1">Attesttation d'identité</option>
                   <option value="2">Carte Nationale d'Itentité</option>
                   <option value="3">Permis de conduire</option>
                   <option value="4">Passeport</option>
                 </select></td>
               </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>
               
                 <tr>
                <td colspan="2">  <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/piece_pin_v.png') ?>" alt="sbx">
               N&deg; de la pièce
                </fieldset> </td>
              </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="numpiece" id="numpiece" placeholder="..." class="champ_de_saisie" /></td>
                 </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>
              
              <tr>
                <td colspan="2">  <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Nom  <span style="color:#F00">*</span></fieldset></td>
              </tr>
              <tr>
                <td colspan="2"><input type="text" required name="nom" id="nom" placeholder="..." class="champ_de_saisie" /></td>
              </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>
               
               <tr>
                <td colspan="2"> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Prénoms  <span style="color:#F00">*</span></fieldset></td>
              </tr>
               <tr>
                 <td colspan="2"><input type="text" required placeholder="..." name="prenom" id="prenom" class="champ_de_saisie" /></td>
               </tr>

              
               <tr><td colspan="2">&nbsp;</td></tr>
               
                  <tr>
                <td colspan="2"> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
               Date de naissance  <span style="color:#F00">*</span></fieldset></td>
              </tr>
                  <tr>
                    <td colspan="2"><input type="text" name="datenaiss" placeholder="..." id="datepicker" class="champ_de_saisie" required /></td>
                  </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>
                                
               
                   <tr>
                <td colspan="2">  <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/contact_phone_v.png') ?>" alt="sbx">
               Téléphone</fieldset> </td>
              </tr>
                   <tr>
                     <td colspan="2"><input type="text" name="tel" id="tel" placeholder="..." class="champ_de_saisie" /></td>
                   </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>
               
                   <tr>
                <td colspan="2">  <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Fonction  <span style="color:#F00">*</span></fieldset></td>
              </tr>
                   <tr>
                     <td colspan="2"><input type="text" name="fonction" id="fonction" placeholder="..." class="champ_de_saisie" required /></td>
                   </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr> 
               
              <tr>
                <td colspan="2">  <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Nom du Père  <span style="color:#F00">*</span></fieldset></td>
              </tr>
              <tr>
                <td colspan="2"><input type="text" required name="nompere" id="nompere" placeholder="..." class="champ_de_saisie" /></td>
              </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>                 <tr>
                <td colspan="2">  <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Nom de la Mère  <span style="color:#F00">*</span></fieldset></td>
              </tr>
               <tr>
                 <td colspan="2"><input type="text" name="mere" id="mere" class="champ_de_saisie" placeholder="..." required /></td>
               </tr>
     
            </table>                
        </p>
     
  </div>
   
  
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
    <h3 class="widget-title">Informations Actes</h3>
     
    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
        <div class="page-box page-box--block post-7 page type-page status-publish hentry" style="padding-left:0px">
        	<!--<h3>sous titre</h3> <br>-->       
            <span style="text-align:left;">
           <table width="100%" border="0" cellspacing="5" cellpadding="7">
             <tr>
                <td colspan="2"> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Nature de l'acte  <span style="color:#F00">*</span></fieldset></td>
              </tr>
             <tr>
               <td colspan="2"><select name="acte" class="champ_de_saisie sel" required id="acte">
                 <option value="">Sélectionnez ...</option>
                 <option value="A0129">ATTESTATION DE NON ENGAGEMENT A LA FONCTION PUBLIQUE</option>
                 <option value="A0130">DECISION PORTANT ENGAGEMENT D'UN TRAVAILLEUR OCCASIONNEL</option>
               </select></td>
             </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>
               
                 <tr>
                <td colspan="2"> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
               Date de Rendez-vous  <span style="color:#F00">*</span></fieldset></td>
              </tr>
                 <tr>
                   <td colspan="2"><?php
	
	$var = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
			   
$datedeb='2014-09-17';
if(date('Y-m-d')>$datedeb){
	
$date_string = mktime(0,0,0,date("m"),date("d"),date("Y"));
$nombre_jour = 7;
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

$var = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
			   
	echo '<select name="daterdv" id="daterdv" class="champ_de_saisie sel">';
	echo'<option value="" selected="selected">Sélectionnez ...</option>';
      foreach($tdates as $val){
		  $date=explode('-',$val);
		 $dateval=($date[2].'/'.$date[1].'/'.$date[0]);
		 $jourrepos=check_dimanche($dateval);//verifie si c'est un dimanche
		 //$joursam=check_samedi($dateval);//verifie si c'est un samedi
		// $jourfeire=jourferie($dateval);//verifie si la date est un jour ferié
		
		  if($jourrepos==0){
          
			   
                    echo'<option value="'.$val.'">'.$date[2].' '.$var[intval($date[1])].' '.$date[0].'</option>';
		  }
		 /*  else{
			    echo'<option value="'.$val.'">SDDD'.$date[2].' '.$var[intval($date[1])].' '.$date[0].'</option>';
		  } */
	  }
                 echo  '</select>';
					 ?></td>
                 </tr>
              
               <tr><td colspan="2">&nbsp;</td></tr>
               
                 <tr>
                <td colspan="2">  <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Nombre de copie  <span style="color:#F00">*</span></fieldset></td>
              </tr>
                 <tr>
                   <td colspan="2"><select name="nbcopie" id="nbcopie" class="champ_de_saisie copie" required onChange="modif_cout();">
                     <option value="1" selected="selected">1</option>
                     <?php for($i=2;$i<=10;$i++):?>
                     <option value="<?php echo $i ?>"><?php echo $i ?></option>
                     <?php endfor;?>
                   </select>
                   <input name="cout" type="text" class="champ_de_saisie sel" readonly placeholder="montant à payer" value="2000" id="cout" disabled="disabled" style="font:bold; width:auto">&nbsp;FCFA</td>
                 </tr>
              
              
               <tr><td colspan="2">&nbsp;</td></tr> 
               
   <tr>
                <td colspan="2"> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Motif
                </fieldset> </td>
              </tr>
   <tr>
     <td colspan="2"><textarea name="motif" id="motif" class="textarea" rows="5" style="overflow:auto" placeholder="..."></textarea></td>
   </tr>
  
    <tr><td colspan="2">&nbsp;</td></tr>
               
              <tr>
                <td width="213"><span style="color:#F00; font-weight:bold; font-size:15px">NB: les champs marqués du symbole (*) sont obligatoires</span></td></tr>
                
                <tr><td colspan="2">&nbsp;</td></tr>
                
              <tr>  <td width="244"><input type="submit" name="button" id="button" value="Valider la demande" class="btn btn-primary" /></td>
              </tr>
</table><p>&nbsp;</p>
        </span> 
                                                      
        </div>                        
    </div>  
 </div>
 
  </form>     
</div> 