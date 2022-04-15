<?php

	// info agent
	// declaration des tables
	$tab1 = 'inscription_agent_1';
	$tab2 = 'agent';

	// INFORMATIONS GENERALES
	$rek_info_gen="select inscription_agent_1.*, LIB_SPREF from inscription_agent_1 left join tbaf_spref on lieunaiss=CODE_SPREF where matricule='".$this->session->userdata('MATRICULE')."'";

	 $table = $this->$model->getSQL('db', $rek_info_gen, 'row');


/*####################### PARAMETRAGE DES INFOS GEN #################*/
	// CNI

	if(!empty($table['numcni']))
	{
		$cni = $table['numcni'];
		$tb_cni = $tab1;
		$col_cni = 'numcni';
	} else {
		$cni = $this->session->userdata('NUMCNI');
		$tb_cni = $tab2;
		$col_cni = 'NUMCNI';
	}

	// date cni
	if(!empty($table['date_cni']))
			{
				$datecni = $table['date_cni'];
				$tb_datecni = $tab1;
				$col_datecni = 'date_cni';
	} else {
			$datecni = $this->session->userdata('DATECNI');
			$tb_datecni = $tab2;
			$col_datecni = 'DATECNI';
		}

	// lieu de naissance
	if(!empty($table['lieunaiss'])){
		$lieu = $table['LIB_SPREF'];
		$tb_lieu = $tab1;
		$col_lieu = 'lieunaiss';
	}
	else{
		$lieu = $this->session->userdata('LIEUNAISS');
		$tb_lieu = $tab2;
		$col_lieu = 'LIEUNAISS';
	}

	// telephone
	if(!empty($table['tel'])){
		$tel = $table['tel'];
		$tb_tel = $tab1;
		$col_tel = 'tel';
	}
	else{
		$tel = $this->session->userdata('TEL');
		$tb_tel = $tab2;
		$col_tel = 'TEL';
	}

	// cellulaire
	if(!empty($table['cel'])){
		$cell = $table['cel'];
		$tb_cell = $tab1;
		$col_cell = 'cel';
	}
	else{
		$cell = $this->session->userdata('CELL');
		$tb_cell = $tab2;
		$col_cell = 'CELL';
	}

	// adresse
	if(!empty($table['adrs'])){
		$adr = $table['adrs'];
		$tb_adr = $tab1;
		$col_adr = 'adrs';
	}
	else{
		$adr = $this->session->userdata('ADRESSE');
		$tb_adr = $tab2;
		$col_adr = 'ADRESSE';
	}

	// routing base
	$link2 = base_url('assets');
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/page.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/espace_fon') ?>/css/espace.css" media="screen" />

<link href="<?php echo base_url('assets/espace_fon') ?>/css/skins/graphite.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
function divaffiche(voir,cache,popup){
  document.getElementById(popup).style.display = "block";
  document.getElementById(cache).style.display = "block";
  document.getElementById(voir).style.display = "none";
}

function divcache(voir,cache,popup){
  document.getElementById(popup).style.display = "none";
  document.getElementById(cache).style.display = "none";
  document.getElementById(voir).style.display = "block";
}

function voirplus(klas){
  if(document.getElementsByClassName(klas).style.display=="none"){
	  document.getElementsByClassName(klas).style.display = "block";
  }
  else{
	  document.getElementsByClassName(klas).style.display = "none";
  }

}

function toggle_enft(id){
	if(document.getElementById(id).style.display == "block") {
		document.getElementById(id).style.display = "none";
	}else{
		document.getElementById(id).style.display = "block";
	}
}

function setPhoto(id){
	if(document.getElementById(id).style.display == "block") {
		document.getElementById(id).style.display = "none";
	}else{
		document.getElementById(id).style.display = "block";
	}
}
</script>

<style type="text/css">
  textarea{width:100%; padding:5px}
 .champ_de_saisie{width:100%}
 .sel{width:50%}
 .copie{width:20%}
 .title_acte{background-color:#212121; color:#FFF}
 .tab_mob td{padding:6px 0px}
 .nb_alerte_info{margin-bottom:5px; padding:5px; background-color:#FFF; border-bottom:1px solid #F5F5F5}
 .nb_alerte_info a{color:#03C; font-family:inherit}

 .nb{background-color:#F5F5F5;}
 ._info{background-color:#CFE6F3; color:#2372A0; border-bottom:1px solid #2372A0}
 ._alerte{border-bottom:1px solid #BF0000; background-color:#FFBFBF; color:#BF0000;}

 #pgcx-7-1-0{margin-bottom:0;}

	.warning, .nota{color:#C00; font-weight:lighter;}

	.warning{
		border:1px solid #21a7d7;
		background-color:#21a7d7;
		color:#FFF;
		font-size:18px;
		padding:10px;
		text-align:left;
	}

	.lien_recu div{text-align:center}
	.lien_recu a{color:#F00; text-decoration:none; font-size:16px}
	.lien_recu a:hover{color:#F00; text-decoration:underline}

	#shell .photo{
		border: #CCC 1px solid;
		width: 200px;
		height: 110px;
		margin:10px 20px;
		/*background-color:#FFF;*/
	}

	#shell .photo img{
		border-radius: none;
	}

	.nom_mat_tof{padding:12px; background-color:#FFF; color:#212121; font-size:14px; font-weight:bold;}

	#tab_court{width:100%}

	@media (min-width:900px){
		.photo img, .nom_mat_tof{width:80%;}
		#tab_court{width:50%}
	}
</style>

<div id="page" class="container">
	<?php
       switch($this->session->userdata('sexe')){
       case "M" : $civ = 'M.'; break;
       case "F" : $civ = 'Mme'; break;
       default : $civ = 'M';
     }
    ?>

 <div class="panel-grid title">
	<h3 class="widget-title" style="margin-bottom:2px; padding-bottom:6px;">
        	<div class="titre_ef" style="margin-top:5px">
        		ESPACE AGENT
             </div>

        <p>&nbsp;</p>

        <div align="center">
       	    <b>
				<?php /*echo $civ; echo '&nbsp;';*/ echo $this->session->userdata('nom'); echo '&nbsp;';  ?>
            </b>
            ,

            <span style="color:#F00; text-transform:uppercase; font-weight:lighter">
				<?php echo $this->session->userdata('matricule'); echo ' - '; echo $this->session->userdata('emploi'); ?>
            </span>
        </div>
    </h3>

  </div>

<div id="shell">
<div class="page_art">

   <div class="page_art_content">
     	<?php include($page.'.php'); ?>
   </div>

</div>
</div>

<div class="footer_ef">
    &copy; <?php echo @date('Y') ?>, <?php echo $logo['titre'] ?> - Espace Agent.
</div>