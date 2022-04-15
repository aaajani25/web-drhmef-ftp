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
		$photo = "/identification/photo/".$this->session->userdata('photo');	
		$up_photo = 0;
	}
	elseif(file_exists($file_path2)){
		$photo = "/photos/".$this->session->userdata('photo');	
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
</style>
    
<div id="container">
<div class="str str_1">
    <div class="str_ctn h1"><img src="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>" alt="MFP" class="img-responsive" width="116" height="75" />
    </div>
    
    <div class="str_ctn h2"><h2><span class="titre_ef">ESPACE FONCTIONNAIRE </span></h2></div>
    
    <div class="str_ctn h3"><img src="<?php echo base_url('assets/') ?>/rubriques/_armoirie/<?php echo $armoirie['image_small'] ?>" width="75" height="75" /></div> 
</div>

<div class="str photo" align="center">
<img src="<?php echo $photo; ?>" alt="aucune photo" width="100" height="100" />
</div>

<div class="str" align="center">
<b> <?php echo $civ; echo '&nbsp;'; echo $this->session->userdata('NOM'); echo '&nbsp;'; echo $this->session->userdata('PRENOMS'); ?></b><br>      <span class="content" style=" text-transform:uppercase;"><?php echo $this->session->userdata('MATRICULE'); echo ' - '; echo $this->session->userdata('EMPLOI'); ?></span>
</div>

<div class="str titre">INFORMATIONS GENERALES</div>

<div class="str tab_div">
<div class="">
  <div class="row">
<table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Matricule :&nbsp;
  <span class="content"><?php echo $this->session->userdata('MATRICULE') ?></span></td>
  
    <td style="text-align:left; width:50%"> Numéro CNI :&nbsp;
    <span class="content"><?php echo $cni; ?></span></td>
  </tr>
</table>
  </div>
  
 <div class="row">   
     <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%"> Nom et Prénoms :&nbsp;
     <span class="content"><?php echo $this->session->userdata('NOM') ?>&nbsp;<?php echo $this->session->userdata('PRENOMS') ?></span></td>
  
    <td style="text-align:left; width:50%"> Date CNI :&nbsp;
    <span class="content"><?php echo $datecni ?></span></td>
  </tr>
</table>
  </div>
  
  <div class="row">   
    <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Nom de jeune fille :&nbsp;
    <span class="content"><?php echo $this->session->userdata('NOMJFILLE') ?></span></td>
  
    <td style="text-align:left; width:50%">Téléphone :&nbsp;
    <span class="content"><?php echo $tel ?></span></td>
  </tr>
</table>
  </div>
  
  <div class="row">  
     <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">  Date de Naissance :&nbsp;
    <span class="content"><?php echo $this->session->userdata('DATENAISS') ?></span></td>
  
    <td style="text-align:left; width:50%"> Cellulaire :&nbsp;
   <span class="content"><?php echo $cell ?></span></td>
  </tr>
</table>
  </div>
  
 <div class="row">   
      <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%"> Lieu de Naissance :&nbsp;
    <span class="content"><?php echo $lieu; ?></span></td>
  
    <td style="text-align:left; width:50%">Adresse :&nbsp;
    <span class="content"><?php echo $adr ?></span></td>
  </tr>
</table>
  </div>
  
  <div class="row">  
        <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">  Nom du Père :&nbsp;
    <span class="content"><?php echo $this->session->userdata('NOMPERE') ?></span></td>
  
    <td style="text-align:left; width:50%">  Email :&nbsp;
    <span class="content"><?php echo $this->session->userdata('email') ?></span></td>
  </tr>
  </table>
  </div>
  
 <div class="row">   
           <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%"> Nom de la Mère :&nbsp;
    <span class="content"><?php echo $this->session->userdata('NOMMERE') ?></span></td>
  
    <td style="text-align:left; width:50%"> Situation Famille :&nbsp;
    <span class="content"><?php echo $this->session->userdata('SITFAM') ?></span></td>
  </tr>
  </table>
  </div>
  
  <div class="row">    
              <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Sexe :&nbsp;
    <span class="content"><?php echo $this->session->userdata('SEXE') ?></span></td>
  
    <td style="text-align:left; width:50%">Nombre d'enfant :&nbsp;
    <span class="content"><?php echo $this->session->userdata('NBRE_ENFT') ?></span></td>
  </tr>
  </table>
  </div>
  
</div>
</div>

 <?php if ($enfant){ ?>
<div class="str titre">LISTE DES ENFANTS</div>

<div class="str">
  <table width="700" align="center">
    <tr>
      <td style="width:36%; text-align:left"><strong>Nom et Prénoms</strong></td>
      <td style="width:20%; text-align:center"><strong>Date de Naissance</strong></td>
      <td style="width:20%; text-align:center"><strong>Lieu de Naissance</strong></td>
      <td style="width:20%; text-align:center"><strong>Sexe</strong></td>
    </tr>
    
 <?php foreach($enfant as $child){?>
             <tr>
  <td style="width:36%; text-align:left"><?php echo $child['PR_PARENT_NOM'] ?></td>
    <td style="width:20%; text-align:center"><?php echo $child['PR_PARENT_DATNAIS'] ?></td>
    <td style="width:20%; text-align:center"><?php if(substr($child['PR_PARENT_LIEUNAIS'], 0, 5) == 'SPREF') echo $child['LIB_SPREF']; else echo $child['PR_PARENT_LIEUNAIS']; ?></td>
    <td style="width:20%; text-align:center"><?php echo $child['PA_SEXE_LIB'] ?></td>
  </tr>
  <?php }?>
  </table>  
</div>
 <?php }?>
 
<div class="str titre"><strong>EMPLOI</strong></div>
 
<div class="str tab_div">        
  <div class="">                         
  
         <table style="width:100%">
        <tr>
          <td style="vertical-align:top; width:50%">
                  
         <table style="width:100%">
            <tr class="">
              <td style="text-align:left; width:100%;">Structure : <span class="content"><?php 
				if ($nbre_sce_note > 0) {echo $service_notation['libelle']; } else {echo $this->session->userdata('STRUCTURE'); } ?>
              </span></td>
              </tr>
           
               <?php 
      if ($nbre_sce_note > 0) 
	    {  
            			
			if (!empty($service_notation['LIB_CAB']))
			 {
?>
	 <tr class="">
        <td style="text-align:left; width:100%">Cabinet : <span class="content"><?php echo $service_notation['LIB_CAB']; ?></span></td>
        </tr>
<?php					 
			 }
			if (!empty($service_notation['LIB_DG']))
			 {
?>
	 <tr class="">
        <td style="text-align:left; width:100%">Direction G&eacute;n&eacute;rale : <span class="content"><?php echo $service_notation['LIB_DG']; ?></span></td>
        </tr>
<?php					 
			 }
			 
			if (!empty($service_notation['LIB_DC']))
			 {
?>
	 <tr class="">
        <td class="" style="text-align:left; width:100%">Direction Centrale : <span class="content"><?php echo $service_notation['LIB_DC']; ?></span></td>
        </tr>
<?php					 
			 }
		   
		    if (!empty($service_notation['LIB_SD']))
			 {
?>
	 <tr class="">
        <td class="" style="text-align:left; width:100%">Sous Direction : <span class="content"><?php echo $service_notation['LIB_SD']; ?></span></td>
        </tr>
<?php					 
			 }
			
			if (!empty($service_notation['LIB_SC']))
			 {
?>
	 <tr class="">
        <td style="text-align:left; width:100%;">Service : <span class="content"><?php echo $service_notation['LIB_SC']; ?></span></td>
        </tr>
<?php					 
			 }
			 
		}
	  else
	    {
?>
	 <tr class="">
        <td style="text-align:left; width:100%;">Service : <span class="content"><?php echo $this->session->userdata('SERVICE'); ?></span></td>
        </tr>
<?php			
		}
        
   if ($nbre_sce_note > 0) 
    {
       if (!empty($service_notation['LIB_SPREF']))
		{
?>
			 <tr class="">
              <td style="text-align:left; width:100%;"><span class="">Lieu de Travail :</span> <span class="content"><?php echo $service_notation['LIB_SPREF'] ?></span></td>
              </tr>
<?php
        }
    }
?>
            
            <tr class="">
              <td style="text-align:left; width:100%;"><span class="">Emploi :</span>                <span class="content"><?php if($this->session->userdata('OPTION_EMPLOI')!='') {echo $this->session->userdata('EMPLOI').' option '.$this->session->userdata('OPTION_EMPLOI');} else {echo $this->session->userdata('EMPLOI');} ?></span></td>
              </tr>
          </table>
          </td>
         
          <td style="width:50%; vertical-align:top;">
                    
<table style="width:100%;">
        <tr class="">
              <td style="text-align:left; width:100%;">Type Agent : <span class="content"><?php echo $this->session->userdata('TYPEAGENT') ?></span></td>
              </tr>
            
 <?php //if ($universel =='universel') { ?>
            <tr class="">
              <td style="text-align:left; width:100%">Type Recrutement : <span class="content"><?php echo $this->session->userdata('TYPERECRUTEMENT') ?></span></td>
          </tr>
            <tr class="">
              <td style="text-align:left; width:100%">Mode Recrutement : <span class="content"><?php echo $this->session->userdata('MODERECRUTEMENT') ?></span></td>
              </tr>
<?php //} ?>
            <tr class="">
              <td style="text-align:left; width:100%">Grade : <span class="content"><?php echo $this->session->userdata('GRADE') ?></span></td>
              </tr>
            <tr class="">
              <td style="text-align:left; width:100%">Classe : <span class="content"><?php echo $this->session->userdata('CLASSE') ?></span></td>
              </tr>
            <tr class="">
              <td style="text-align:left; width:100%">Echelon : <span class="content"><?php echo $this->session->userdata('ECHELON') ?></span></td>
              </tr>           
         </table>
         </td>
           </tr>
         </table>
       <!--</div>-->
  </div>
</div>

<div class="str titre"><strong>ETAT AGENT</strong></div>

<div class="str tab_div">        
  <div class="">                         
              <div class="row">
                                     <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Date prise de service :&nbsp;<span class="content"><?php echo $this->session->userdata('DATE_PRISE') ?></span></td>
  
    <td style="text-align:left; width:50%"> Indemnité :&nbsp;<span class="content"><?php echo $this->session->userdata('INDEMNITE') ?></span></td>
  </tr>     </table>
              </div>
              
                           <div class="row">
                               <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Date de depart à la retraite :&nbsp;<span class="content"><?php echo $this->session->userdata('DATERETRAI') ?></span>     </td>
  
    <td style="text-align:left; width:50%">Montant de la Pension :&nbsp;<span class="content"><?php echo $this->session->userdata('MONTANTPENS') ?></span></td>
  </tr>     </table></div>


              <div class="row">
              <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Date de Radiation :&nbsp;<span class="content"><?php echo $this->session->userdata('DATE_RADIATION') ?></span>      </td>
  
    <td style="text-align:left; width:50%"> Présent dans le Fichier Paye :&nbsp;<span class="content"><?php echo $this->session->userdata('PAYE') ?></span></td>
  </tr>     </table></div>

 <div class="row">
              <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%"> Etat :&nbsp;<span class="content"><?php echo $this->session->userdata('ETAT') ?></span>       </td>
  
    <td style="text-align:left; width:50%"> </td>
  </tr>     </table></div>
  

              <div class="row">
                <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Date de Radiation :&nbsp;<span class="content"><?php echo $this->session->userdata('DATE_RADIATION') ?></span>      </td>
  
    <td style="text-align:left; width:50%">    Banque de Paye :&nbsp;<span class="content"><?php echo $agence_banque['banque'] ?></span></td>
  </tr>     </table></div>


              <div class="row">
                 <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">Position :&nbsp;<span class="content"><?php echo $this->session->userdata('POSITION') ?></span>      </td>
  
    <td style="text-align:left; width:50%">   Agence de Paye  :&nbsp;<span class="content"><?php echo $agence_banque['agence'] ?></span></td>
  </tr>     </table></div>


              <div class="row">
          <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">    Date Position :&nbsp;<span class="content"><?php echo $this->session->userdata('DATE_POSITION') ?></span></td>
  
    <td style="text-align:left; width:50%">  Etat Physique :&nbsp;<span class="content"><?php echo $this->session->userdata('ETATPHYSIQUE') ?></span></td>
  </tr>     </table></div>


              <div class="row">
             <table style="width:100%">
  <tr>
    <td style="text-align:left; width:50%">   Motif :&nbsp;<span class="content"><?php echo $this->session->userdata('MOTIF') ?></span></td>
  
    <td style="text-align:left; width:50%">  Présent au récensement :&nbsp;<span class="content"><?php echo $this->session->userdata('RECENSE') ?></span></td>
  </tr>     </table></div>
 
       
    </div>
</div>

<?php if ($acte){ ?>
<div class="str titre"><strong>ACTES</strong></div>
<div class="str">
	<?php echo $acte; ?>
</div>
<?php }?>

<?php if ($courrier){ ?>
<div class="str titre"><strong>COURRIERS</strong></div>
<div class="str">
	<?php echo $courrier; ?>
</div>
<?php }?>

</div>


<div id="footer">&copy; <?php echo @date('Y') ?>, RCI - <?php echo $logo['titre'] ?>, Espace Fonctionnaire. </div>