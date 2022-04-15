<?php 
//print_r($resultat4); exit;

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
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/page.css">

<style type="text/css">
	@media (min-width:900px){#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}}  
</style>

<div id="page" class="container">
<div id="titre">RECU DE DEMANDE D'ACTE DE NON ENGAGEMENT</div><br>

<div class="panel-grid" id="pgx-7-1" style="background-color:#FFF;margin-top:2px;">  
 
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">Informations personnelles</h3>           
		<!--contenu-->
        <p>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>RECU N&deg;</strong> <br>
 <?php echo $resultat4['NUMRECU']?></td>
  </tr>
  
   <tr><td>&nbsp;</td></tr>
   
  <tr>
    <td><strong>Identifiant</strong><br>
<?php echo $resultat4['identifiant']?></td>
  </tr>
  
   <tr><td>&nbsp;</td></tr>
   
  <tr>
    <td><strong>Noms et Prénoms</strong><br>
<?php echo $resultat4['NOM_PRENOMS']?>
</td>
  </tr>
  
   <tr><td>&nbsp;</td></tr>
   
  <tr>
    <td><strong>Date de Naissance</strong><br>
<?php echo $resultat4['DATENAISS']?></td>
  </tr>
  
   <tr><td>&nbsp;</td></tr>
   
  <tr>
    <td><strong>Lieu de Naissance</strong><br>
<?php echo $resultat4['LIB_SPREF']?></td>
  </tr>
  
</table>

        </p>       
            
  </div>   
  
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
    <h3 class="widget-title">Informations sur l'Acte</h3>
     
    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
        <div class="page-box page-box--block post-7 page type-page status-publish hentry photo">           
            <span style="text-align:left;">
        		<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <!-- <tr>
    <td><img src="<?php //echo base_url('assets/') ?>/rubriques/_logo/<?php //echo $logo['image_small'] ?>" width="70" height="50"></td>
  </tr>
  
   <tr><td>&nbsp;</td></tr>-->
   
  <tr>
    <td><strong>Nature de l'Acte</strong><br>
	<?php echo $resultat4['TYPE_ACTE']?>
</td>
  </tr>
  
   <tr><td>&nbsp;</td></tr>
   
  <tr>
    <td><strong>Coût de l'Acte </strong><br>
    <?php echo $resultat4['MONTANT']?>&nbsp;FCFA
</td>
  </tr>
  
   <tr><td>&nbsp;</td></tr>
   
  <tr>
    <td><strong>Date de la demande</strong><br>
    <?php echo date('d/m/Y',strtotime($resultat4['DATE_DEM']))?>
</td>
  </tr>
  
   <tr><td>&nbsp;</td></tr>
   
  <tr>
    <td><strong>Date de Rendez-vous </strong><br>
      <?php 
			$da=explode("-",$resultat4['DATE_RDV']) ;
			$rdv=$da[2].'/'.$da[1].'/'.$da[0];
			//echo $rdv; 
			echo date_jour($resultat4['DATE_RDV']);
			?>
</td>
  </tr>
  
   <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
  
  <form action="<?php echo site_url($ctrl.'/print_recu_demande_nf') ?>" method="post">
  <tr>   
    <td align="center"><input name="Envoyer" type="submit" class="btn btn-primary" value="Imprimer le reçu"></td>
    <input name="numrecu" type="hidden" value="<?php echo $resultat4['NUMRECU']?>" />
  </tr>
</form>
</table>
<p>&nbsp;</p>
            </span>                                       
        </div> 
               
    </div>
  </div>     
  
</div>

</div>