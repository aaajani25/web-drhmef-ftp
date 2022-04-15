<?php 
	switch($this->uri->segment(2)){
		case 'navigator': $model = 'nav_mod'; break;
		case 'espace_fonctionnaire': $model = 'espace_mod'; break;
	}
	
// logo                                              
	$logo = $this->espace_mod->read_row_l
	(
		'_logo',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- logo

// armoirie                                              
	$armoirie = $this->espace_mod->read_row_l
	(
		'_armoirie',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- armoirie

	// info agent
	include('data_session.php');
	
	 switch($this->session->userdata('CIVILITE')){
       case "MONSIEUR" : $civ = 'M.'; break;
       case "MADAME" : $civ = 'Mme'; break;
       default : $civ = 'Mlle';	 
     }
	 
$photo=$file_path1=$file_path2='';
 
if($this->session->userdata('photo')!=''){ 
	$file_path1 = $_SERVER['DOCUMENT_ROOT']."/identification/photo/".$this->session->userdata('photo');
	$file_path2 = $_SERVER['DOCUMENT_ROOT']."/photos/".$this->session->userdata('photo');

	if(file_exists($file_path1)){
		$photo = base_url()."/identification/photo/".$this->session->userdata('photo');	
		$up_photo = 0;
	}
	elseif(file_exists($file_path2)){
		$photo = base_url()."/photos/".$this->session->userdata('photo');	
		$up_photo = 0;
	}
	elseif($this->session->userdata('SEXE')=='MASCULIN'){
		$photo = base_url('assets/espace_fon/images/avatars/av-m.jpg');
		
		$up_photo = 1;
	}
	else{
		$photo = base_url('assets/espace_fon/images/avatars/av-f.jpg');
		
		$up_photo = 1;
	}
}
else{
 	if($this->session->userdata('SEXE')=='MASCULIN'){
		$photo = base_url('assets/espace_fon/images/avatars/av-m.jpg');
		
		$up_photo = 1;
	}
	else{
		$photo = base_url('assets/espace_fon/images/avatars/av-f.jpg');
		
		$up_photo = 1;
	}
}

 $nbre_sce_note = count($service_notation);
?>
<style type="text/css">
	#container{border:1px solid #CCC; width:700px; margin-left:33px; margin-top:5px; padding:5px; position:relative; height:auto; font-size:10px}
	#container .str{margin-bottom:9px; max-width:700px;position:relative;}
	#container .str_ctn, .ef{position:absolute}
	#container .h1{width:116px}
	#container .h2{margin-left:200px; width:500px}
	#container .h3{margin-left:630px; width:75px}
	#container .str_1{background-color:#F5F5F5; border-bottom:1px solid #CCC; height:80px;}
	.content{color:#C00; font-weight:bold}
	.titre{padding:5px; background-color:#036D00; color:#FFF; font-weight:bold}
	#container .ef_1{width:175px}
	#container .ef_2{width:175px; margin-left:175px}
	#container .ef_3{width:175px; margin-left:350px}
	#container .ef_4{width:175px; margin-left:525px}
table.t2 {width:100%; border-collapse:collapse; padding:10px;}

.tab_div{width:90%; margin-left:57px;}
#footer{padding:10px; margin:5px 25px 0px 25px; font-size:10px; font-weight:bold; color:#666}
.titre1 {	/*font-family:"Segoe UI";*/
	font-size:16px;
	font-weight: lighter;
	color:#fff;
}
</style>
    
<div id="container">
<div class="str str_1">
    <div class="str_ctn h1" ><img src="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>" alt="MFP" class="img-responsive" width="116" height="75" />
    </div>
    
    <div class="str_ctn h2">
      <h1>NOTATION <?php echo $annee; ?> </h1></div>
    
    <div class="str_ctn h3"><img src="<?php echo base_url('assets/') ?>/rubriques/_armoirie/<?php echo $armoirie['image_small'] ?>" width="75" height="75" /></div> 
</div>

<div class="str photo" align="center">

<img src="<?php echo $photo; ?>" alt="aucune photo" width="100" height="100" />
</div>



<div class="str titre">INFORMATIONS GENERALES</div>

<div class="str tab_div">
<div class="">
  <div class="row">
<table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Matricule :&nbsp;
      <span class="content"><?php echo $this->session->userdata('MATRICULE') ?></span></td>
    </tr>
</table>
  </div>
  
 <div class="row">   
     <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%"> Nom et Prénoms :&nbsp;
      <span class="content"><?php echo $this->session->userdata('NOM') ?>&nbsp;<?php echo $this->session->userdata('PRENOMS') ?></span></td>
    </tr>
</table>
  </div>
  
  <div class="row">   
    <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Nom de jeune fille :&nbsp;
      <span class="content"><?php echo $this->session->userdata('NOMJFILLE') ?></span></td>
    </tr>
</table>
  </div>
  
  <div class="row"> </div>
  
 <div class="row"> </div>
  
  <div class="row"> </div>
  
 <div class="row">   
           <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Emploi :<span class="content">
      <?php if($this->session->userdata('OPTION_EMPLOI')!='') {echo $this->session->userdata('EMPLOI').' option '.$this->session->userdata('OPTION_EMPLOI');} else {echo $this->session->userdata('EMPLOI');} ?>
    </span></td>
    </tr>
  </table>
  </div>
  
  <div class="row">    
              <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Structure : <span class="content">
      <?php 
				if ($nbre_sce_note > 0) {echo $service_notation['libelle']; } else {echo $this->session->userdata('STRUCTURE'); } ?>
    </span></td>
    </tr>
  </table>
  </div>
  
</div>
</div>

 


 

<div class="str titre">APPRECIATIONS DETAILLEES</div>
<?php
	/*$annee = $this->input->get_post('y');
	$periode = $this->input->get_post('t');
	$matricule = $this->session->userdata('MATRICULE');*/
	
	$tb_evaluer = $tb_notation = '';
	
	switch($annee){	
		case '2014': 
			$tb_evaluer = 'evaluer';
			$tb_notation = 'notation';
		break;
		
		case '2016': 
			$tb_evaluer = 'evaluer2016';
			$tb_notation = 'notation2016';
		break;
		
		// debut de la notation 2013
		default:
			$tb_evaluer = 'evaluer_2013_fin';
			$tb_notation = 'notation_2013_fin';
	}

	include('find_agent_name.php');			
	include('f-notation.php');
			
	if($table['ETAT_CS']==5) {
		$crii=$supwhile;
		$sup1=$sup2=$crii['NOM_PRENOMS'];
		
		$valider='NOTE VALIDEE PAR LE SUPERIEUR HIERARCHIQUE 2';	
	}
	else {	
		$crii=$supwhile;
		$sup1=$crii['NOM_PRENOMS'];
		$crii=$supwhile;
		$sup2=$crii['NOM_PRENOMS'];
		$mat2=$crii['MATRICULE'];
		
		if($crvalider[0]['valider']=='EN_ATTENTE') $valider='NOTE EN ATTENTE DE VALIDATION PAR LE SUPERIEUR HIERARCHIQUE 2';
		else $valider='NOTE VALIDEE PAR LE SUPERIEUR HIERARCHIQUE 2';	
	}
		
	if($crvalider!=0) {	
	$total=0;
	$i=0;
	$aux="";		
		
	//$aux .='<fieldset><legend><b>LES NOTES</b></legend>';
	
		$aux .='<p><b>&nbsp;&nbsp;LES NOTES</b></p>';
		
	$aux.='<table width="100%" border="0" cellspacing="0" cellpadding="0"  >';	
	
	foreach($crvalider as $cr) { 
	$style='style="background-color:#EFEFEF;"';
	
	if($cr['id_critere']==1){
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>'.$cr['lib_critere'].'</b></td><td>'.$cr['note_valideur'].'/20</td></tr>';
		$aux .='<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<i>- Sens des responsabilités</i> <br>
		&nbsp;&nbsp;&nbsp;&nbsp;<i>- Sens du service public</i> <br>
		&nbsp;&nbsp;&nbsp;&nbsp;<i>- Sens social, sens des relations humaines </i><br>
		&nbsp;&nbsp;&nbsp;&nbsp;<i>- Tenue et présentation</i></td>
		</tr>';
	}
	elseif($cr['id_critere']==2) {
		$aux .='<tr><td colspan="2">&nbsp;</td></tr>';
		$aux .='<tr height="30" '.$style.'>';
	  	$aux .='<td><b>'.$cr['lib_critere'].'</b></td><td>'.$cr['note_valideur'].'/15</td></tr>';
		$aux .='<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<i>- Esprit d\' initiative</i><br>
		&nbsp;&nbsp;&nbsp;&nbsp;<i>- Connaissances et aptitudes professionnelles</i><br>
		&nbsp;&nbsp;&nbsp;&nbsp;<i>- Puissance de travail et rendement</i></td></tr>';
	}
	elseif($cr['id_critere']==3) {
		$aux .='<tr><td colspan="2">&nbsp;</td></tr>';
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>'.$cr['lib_critere'].'</b></td><td>'.$cr['note_valideur'].'/10</td></tr>';
		$aux .='<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<i>- Civisme, intégrité et moralité</i><br>

						 	  &nbsp;&nbsp;&nbsp;&nbsp;<i>- Esprit de discipline</i></td></tr>';
	}
	elseif($cr['id_critere']==9) {
		$aux .='<tr><td colspan="2">&nbsp;</td></tr>';
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>'.$cr['lib_critere'].'</b></td><td>'.$cr['note_valideur'].'/5</td></tr>';
	}
	  
		$i++; 
		$total=$total+$cr['note_valideur'];
	  }

	$cr = $crvalider;
	
	$aux .='<tr><td colspan="2">&nbsp;</td></tr>';
	$aux .='<tr height="30" '.$style.' >';
	$aux .='<td><b>TOTAL</b></td><td><font color="#990000"><b>'.$total.'/50</b></font></td></tr>';
	
	$aux .='<tr><td colspan="2">&nbsp;</td></tr>';
	$aux .='<tr height="30" '.$style.' >';
	$aux .='<td><b>MOYENNE</b></td><td><font color="#990000"><b>'.$cr[0]['note_chiffre_sup2'].'/5</b></font></td></tr>';
	  
	$aux.='</table>'; 
	
	// BLOC DES APPRECIATIONS
$aux .='<p>&nbsp;</p><p><b>&nbsp;&nbsp;LES APPRECIATIONS</b></p>';

	$aux.='<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >';	
	
	$cr = $crvalider;
	
	$style='style="background-color:#EFEFEF;"';
		
		// Afficher l'Appréciation du supérieur
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>Appréciation du supérieur</b></td></tr>';
	  	$aux .='<tr><td><font color="#990000">'.$cr[0]['appreciation_sup'].'</font></td></tr>';
		
		// Afficher la Proposition du supérieur
		$aux .='<tr><td>&nbsp;</td></tr>';
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>Proposition du supérieur</b></td></tr>';
	  	$aux .='<tr><td><font color="#990000">'.$cr[0]['avancement_sup'].'</font></td></tr>';	
		
		$aux.='</table>';  
	
	$aux.='<p>&nbsp;</p>&nbsp;- SUPERIEUR HIERARCHIQUE 1 &nbsp; :<b> '.$name_sup1.'</b><p>&nbsp;</p>';	//$sup1
	$aux.='&nbsp;- SUPERIEUR HIERARCHIQUE 2 &nbsp; : <b>'.$name_sup2.'</b><p>&nbsp;</p>';//$sup2
	$aux.='&nbsp;- ETAT :&nbsp; <b>'.$valider.'</b>';		
	
 echo $aux;
  }
?>



</div>


<div id="footer">&copy; <?php echo @date('Y') ?>, RCI - <?php echo $logo['titre'] ?>, Notation. <?php echo $annee; ?></div>