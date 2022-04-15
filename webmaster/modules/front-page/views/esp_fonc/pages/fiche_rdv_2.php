<?php 
$tab_demande = $this->espace_mod->create_recu_rdv($numrecu);

//
function date_jour($frdate){
  //$frdate="02/02/2009";
  $joursem = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  //$mois = array(0,"Janvier", "Fevrier", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  $var = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
//$dat=explode('-',$frdate);

  // extraction des jour, mois, an de la date
  list($jour, $mois, $annee) = explode('-', $frdate);
  $moisj=$var[intval($mois)];
  // calcul du timestamp
  $timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
  // affichage du jour de la semaine
  $datejm=$joursem[date("w",$timestamp)].' '.$jour.' '.$moisj.' '.$annee;
  
  return $datejm;  
 }
?>

<div id="" class="">

 <div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">NOUS CONTACTER<br>
 <span style="text-transform:lowercase">(demande de rendez-vous)</span></h1>
  </div>
</div>

<style type="text/css">
	@media (min-width:900px){#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}}
	
	.fiche_rdv{background-color:#FFF; border:2px dashed #036D00; padding-left:10px}
	
	.fiche_rdv img{padding:0px}
	.titre_rdv{color:#036D00; background-color:#9FFF9D; padding:10px; font-weight:bold}
	.cn{font-weight:bold;}
</style>

<br>

<div class="panel-grid" id="pgx-7-1" style="margin-top:20px;">  
 
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">RECU DE DEMANDE DE RENDEZ-VOUS</h3>           
		<!--contenu-->
        <p>
   	  <table width="100%" border="0" cellspacing="3" cellpadding="3" class="">
  <tr>
    <td align="center" class="titre_rdv"><strong>DEMANDE DE RENDEZ-VOUS</strong></td>
  </tr>
  </table>
  
     	<table width="100%" border="0" cellspacing="3" cellpadding="3" class="fiche_rdv">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td class=""><img src="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>" alt="MFP" class="img-responsive" width="154" height="90"></td>
    <td align="right" class=""><img src="<?php echo base_url('assets/') ?>/rubriques/_armoirie/<?php echo $armoirie['image_small'] ?>" alt="MFP" class="img-responsive" width="97" height="96"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/doc_v.png') ?>" alt="sbx"> RECU N° : <span class="cn"><?php echo $tab_demande['NUM_RECU'].'/'.$tab_demande['idobjet'];?></span></fieldset></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx"> Matricule : <span class="cn"><?php echo $this->session->userdata('MATRICULE') ?></span></fieldset></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx"> Nom et Prénoms : <span class="cn"><?php if($this->session->userdata('NOMJFILLE')) echo $this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS').' Née '.$this->session->userdata('NOMJFILLE');
			else echo $this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS').' '.$this->session->userdata('NOMJFILLE'); ?>
    </span></fieldset></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/edition_objet_v.png') ?>" alt="sbx"> Objet du Rendez-vous : <span class="cn"><?php echo $tab_demande['libelle'];?></span></fieldset></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx"> Date de Rendez-vous : <span class="cn"><?php echo date_jour($tab_demande['DATE_RDV']);?>
    </span></fieldset></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><form action="<?php echo site_url($ctrl.'/print_recu_rdv') ?>" method="post" name="frm" target="_blank">          
      <input type="hidden" name="recu" id="recu" value="<?php echo $tab_demande['NUM_RECU'];?>" />
      <input type="hidden" name="rdv" id="rdv" value="<?php echo $date_rdv; ?>" />
      <input type="submit" style="cursor:pointer;" value="IMPRIMER LE RECU" class="btn btn-primary" />         
    </form></td>
  </tr>
<!--  <tr>
    <td>&nbsp;</td>
  </tr>-->
      </table>

        </p>   
        
  </div>   
  
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
    <h3 class="widget-title">Note d'Information</h3>
     
    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
        <div class="page-box page-box--block post-7 page type-page status-publish hentry ">           
          <div class="warning">
En cas d'indisponibilité à la date prévue, Merci de le signaler à nos services 48H à l'avance, en annulant votre RDV. Dans ce cas, vous devrez refaire la procédure pour un RDV à une autre date.
</div> 
                                       
        </div> 
               
    </div>
  </div>     
  
</div>

</div>