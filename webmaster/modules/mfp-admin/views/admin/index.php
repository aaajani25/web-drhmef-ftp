<?php
	$ctrl = 'mfp-admin/siteback';

	// logo
	$logo = $this->siteback_mod->read_row_l
	(
		'_logo',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- logo

// armoirie
	$armoirie = $this->siteback_mod->read_row_l
	(
		'_armoirie',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- armoirie
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>:. Espace d'administration du site de la DRH/MEF .:</title>

<link rel="shortcut icon" href="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>">

<style type="text/css">
 .content input, .content select{width:300px; height:30px;}
 option{padding:6px}
 option:hover{cursor:pointer}
</style>

<link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet" type="text/css" />

    <!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,100,300,300italic,100italic,400italic,600,600italic,700,700italic" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
<!-- google font -->

<!--ck editor-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/ckeditor/sample.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/ckeditor/sample.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
	function button_action(x,y,z){
		var user = '<?php echo $this->session->userdata('profil'); ?>';

		var u = '<?php echo base_url() ?>index.php/<?php echo $ctrl ?>';

		var t = u+"/supprimer?a=insert&t="+y+"&v="+z;

		switch(x){
			case 'val':
				document.forms[y].submit();
			break;

			case 'upd':
				if(confirm("Confirmez-vous la modification ?")){
					document.forms[y].submit();
				}
			break;

			case 'del':
			 if(user=="root" || user=="Administrateur"){
				if(confirm("Confirmez-vous la suppression ?")){
					document.location.href = t;
				}
			 }
			 else{
				alert("Désolé, vous n'avez pas le niveau d'accès requit pour supprimer un article, veuillez contacter un Administrateur !");
			}
			break;
		}

	}

	function delGrid(table, id, titre){
		var u = '<?php echo base_url().$ctrl; ?>';
		var t = u+"/supprimer?a=insert&t="+table+"&v="+id+"&grid="+titre;

		if(confirm("Confirmez-vous la suppression ?")){
			document.location.href = t;
		}
	}

	function setLien(){
		var iLien = document.getElementById("type_lien")	;
		var choix = iLien.selectedIndex;
		var valeur = iLien.options[choix].value;

		switch(valeur){
			case 'liste':
				$('#fichier').show();
				$('#titre').show();
				$('#liste').show();
				$('#resume').hide();
				$('#site').hide();
				$('#rep').hide();
				$('#content').hide();
			break;

		 	case 'fichier':
				$('#fichier').show();
				$('#liste').hide();
				$('#titre').show();
				$('#resume').show();
				$('#site').hide();
				$('#rep').hide();
				$('#content').hide();
			break;

			case 'site':
				$('#fichier').hide();
				$('#liste').hide();
				$('#titre').show();
				$('#resume').show();
				$('#site').show();
				$('#rep').hide();
				$('#content').hide();
			break;

			case 'rep':
				$('#fichier').hide();
				$('#liste').hide();
				$('#titre').show();
				$('#resume').show();
				$('#site').hide();
				$('#rep').show();
				$('#content').hide();
			break;

			case 'auto':
				$('#fichier').hide();
				$('#liste').hide();
				$('#titre').show();
				$('#resume').show();
				$('#site').hide();
				$('#rep').hide();
				$('#content').show();
			break;

			default:
				$('#fichier').hide();
				$('#titre').show();
				$('#resume').hide();
				$('#liste').hide();
				$('#site').hide();
				$('#rep').hide();
				$('#content').hide();
	    }
	}

	function setImage(){
		var iImg = document.getElementById('type_image');
		var choix = iImg.selectedIndex;
		var valeur = iImg.options[choix].value;

		switch(valeur){
		 	case 'wide':
				$('#wide').show();
				$('#small').show();
			break;

			case 'small':
				$('#small').show();
				$('#wide').hide();
			break;

			default:
				$('#wide').hide();
				$('#small').hide();
	    }
	}

</script>

<!--date picker-->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/jquery-ui.css">

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
<style type="text/css">
body{background-color:#F5F5F5;}

option{padding:8px; cursor:pointer}
.msg{
	/*border-radius:5px;	*/
	text-align:center;
	padding:10px;
}

.msg-erreur{
	border-bottom:1px solid #BF0000;
	background-color:#FFBFBF;
	color:#BF0000;
}

.msg-succes{
	border:1px solid #007500;
	background-color:#C4FFC4;
	color:#007500;
}

	#master-container{margin-left:50px; margin-right:50px; background-color:#FFF; box-shadow:0 0 7px 4px #CCC}

	.header-footer{background-color:#048646; color:#FFF;}
	.left-side{background-color:#F5F5F5;}
</style>
</head>

<body>
<div id="master-container">
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="4" class="header-footer">
  <tr>
    <td width="158" align="left" valign="middle"><img src="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>" alt=" " width="180" height="120"></td>
    <td width="636" align="center"><h1>Bienvenue sur l'espace d'administration du site de la DIRECTION DES RESSOURCES HUMAINES DU MEF</h1>
    </td>
    <td width="123" align="right" valign="middle"><img src="<?php echo base_url('assets/') ?>/rubriques/_armoirie/<?php echo $armoirie['image_small'] ?>" alt="sds" width="100" height="100"></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="4" class="tab2">
  <tr>
    <td width="987"><strong><?php echo $this->session->userdata('profil') ?>&nbsp;&nbsp;<?php echo $this->session->userdata('nom_user') ?></strong></td>

    <td width="81" align="right"><strong><a href="<?php echo site_url($ctrl.'/logout') ?>">Déconnexion</a></strong></td>

  </tr>
</table>
<br>
<?php $url=$ctrl.'/homepage'; ?>
<table width="100%" border="1" align="center" cellpadding="7" cellspacing="4">
  <tr>
    <td width="175" valign="top" class="left-side"><table width="100%" border="0" cellspacing="2" cellpadding="4">
    <tr>
        <td class="title-left"><strong><a href="<?php echo site_url($ctrl.'/accueil') ?>">Accueil</a></strong></td>
      </tr>

      <tr><td>&nbsp;</td></tr>

      <tr>
        <td class="title-left"><strong>PROFIL</strong></td>
      </tr>

      <?php if ($this->session->userdata('profil')=="root"){ ?>
      <tr class="">
        <td><a href="<?php echo site_url($url.'?t=utilisateur&a=insert'); ?>">Gestion des utilisateurs</a></td>
      </tr>
      <?php }?>

      <?php if ($this->session->userdata('profil')!="root"){ ?>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=utilisateur&a=upd'); ?>">Modifier mon compte</a></td>
      </tr>
     <?php }?>

       <?php if ($this->session->userdata('profil')=="root"){ ?>
      <tr>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td><strong>ESPACE AGENT</strong></td>
      </tr>

       <tr>
        <td><a href="<?php echo site_url('mfp-admin/siteback/access_ef?a=insert&t=access_ef'); ?>">Gestion des accès</a></td>
      </tr>
      <?php }?>
			<tr>
        <td>&nbsp;</td>
      </tr>
			<tr>
        <td class="title-left"><strong>MISE A JOUR</strong></td>
      </tr>

      <?php if ($this->session->userdata('profil')=="root"){ ?>
      <tr class="">
        <td><a href="<?php echo site_url($ctrl.'/fich_agt') ?>">Fichier Agent</a></td>
      </tr>
      <?php }?>
       <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="title-left"><strong>RUBRIQUES DU SITE</strong></td>
      </tr>
       <?php if ($this->session->userdata('profil')!="Sce Communication"){ ?>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_logo&a=insert'); ?>">Logo</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_intro&a=insert'); ?>">Page d'intro</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_armoirie&a=insert');  ?>">Armoirie</a></td>
      </tr>
     <!-- <tr>
        <td><a href="<?php //echo site_url($url.'?t=_evenement&a=insert'); ?>">Grand slide</a></td>
      </tr>-->
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_flashinfo&a=insert');?>">Flash Info</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_alaune&a=insert'); ?>">Evènement (slide)</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_ministre&a=insert');  ?>">Le Drh</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_actualite&a=insert'); ?>">Les Actualités</a></td>
      </tr>
			<tr>
        <td><a href="<?php echo site_url($url.'?t=_bon_savoir&a=insert'); ?>">Bon a savoir </a></td>
      </tr>
			<tr>
        <td><a href="<?php echo site_url($url.'?t=_lesaviez&a=insert'); ?>">Le saviez </a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_communique&a=insert'); ?>">Les Communiqués</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($ctrl.'/open_popup?t=album&a=insert'); ?>">Gestion des Albums</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_phototheque&a=insert'); ?>">Photothèque</a></td>
      </tr>
			<tr>
        <td><a href="<?php echo site_url($url.'?t=_publication&a=insert'); ?>">Les Publications</a></td>
      </tr>
			<tr>
        <td><a href="<?php echo site_url($url.'?t=_sondage&a=insert'); ?>">Les Sondages</a></td>
      </tr>
      <!-- <tr>
        <td><a href="<?php echo site_url($url.'?t=_offre&a=insert'); ?>">Les Offres</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_annonce&a=insert'); ?>">Les Annonces</a></td>
      </tr> -->
      <!-- <tr>
        <td><a href="<?php echo site_url($url.'?t=_documentation&a=insert'); ?>">La Documentation</a></td>
      </tr> -->
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_annuaire&a=insert'); ?>">L'Annuaire téléphonique</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_banniere&a=insert'); ?>">Bannière</a></td>
      </tr>
    <!--  <tr>
        <td><a href="<?php //echo site_url($url.'?t=_menu&a=insert'); ?>">Le Menu principal</a></td>
      </tr>-->
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_pub&a=insert'); ?>">Publicités</a></td>
      </tr>
      <?php }else{?>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_alaune&a=insert'); ?>">Evènement (slide)</a></td>
      </tr>
       <tr>
        <td><a href="<?php echo site_url($url.'?t=_communique&a=insert'); ?>">Les Communiqués</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($ctrl.'/open_popup?t=album&a=insert'); ?>">Gestion des Albums</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_phototheque&a=insert'); ?>">Photothèque</a></td>
      </tr>
			<tr>
        <td><a href="<?php echo site_url($url.'?t=_publication&a=insert'); ?>">Les Publications</a></td>
      </tr>
			<tr>
        <td><a href="<?php echo site_url($url.'?t=_sondage&a=insert'); ?>">Les Sondages</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_actualite&a=insert'); ?>">Les Actualités</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_flashinfo&a=insert');?>">Flash Info</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url($url.'?t=_intro&a=insert'); ?>">Page d'intro</a></td>
      </tr>
      <?php }?>
    </table>
    </td>
    <td width="979" valign="top" class="_corps"><?php include($page.'.php'); ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="4" class="header-footer">
  <tr>
    <td align="center">&copy; <?php echo @date('Y') ?>&nbsp;- Ministere de l'Economie et des Finances, espace d'administration</td>
  </tr>
</table>
</div>
</body>
</html>