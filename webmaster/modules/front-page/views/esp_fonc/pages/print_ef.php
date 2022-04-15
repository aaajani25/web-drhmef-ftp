<?php 
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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mon espace fonctionnaire</title>
</head>

<body>
<!--logo etc-->
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="20%" align="center"> <img src="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>" alt="MFPMA" class="img-responsive" width="75" height="75"></td>
    
    <td width="65%" align="center"><h1><span class="titre_ef"><strong>ESPACE FONCTIONNAIRE </strong></span></h1></td>
    
    <td width="15%" align="center"> <img src="<?php echo base_url('assets/') ?>/rubriques/_armoirie/<?php echo $armoirie['image_small'] ?>" width="75" height="75"></td>
  </tr>
</table>

<p>&nbsp;</p>

<!--<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td>GSGSRGRTG</td>
  </tr>
</table>-->

<!--emploi etc-->
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="center"><b> <?php echo $civ; echo '&nbsp;'; echo $this->session->userdata('NOM'); echo '&nbsp;'; echo $this->session->userdata('PRENOMS'); ?> </b> , <span style="color:#F00; text-transform:uppercase; font-weight:lighter"> <?php echo $this->session->userdata('MATRICULE'); echo ' - '; echo $this->session->userdata('EMPLOI'); ?></span></td>
  </tr>
</table>

<p>&nbsp;</p>

<!--fiche : info gne-->
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td><strong>INFORMATIONS GENERALES</strong></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="20%"><strong>Matricule :</strong></td>
    <td width="51%"><span class="content"><?php echo $this->session->userdata('MATRICULE') ?></span></td>
    <td width="29%" rowspan="8" align="center" valign="middle"><span class="photo"><img src="<?php echo base_url('assets/espace_fon/photos/'.$this->session->userdata('photo')) ?>" alt="aucune photo" width="150" height="150" /></span></td>
  </tr>
  <tr>
    <td><strong>Nom et Prénoms :</strong></td>
    <td><span class="content"><?php echo $this->session->userdata('NOM') ?>&nbsp;<?php echo $this->session->userdata('PRENOMS') ?></span></td>
  </tr>
  <tr>
    <td><strong>Nom de jeune fille :</strong></td>
    <td><span class="content"><?php echo $this->session->userdata('NOMJFILLE') ?></span></td>
  </tr>
  <tr>
    <td><strong>Date de Naissance :</strong></td>
    <td><span class="content"><?php echo $this->session->userdata('DATENAISS') ?></span></td>
  </tr>
  <tr>
    <td><strong>Lieu de Naissance :</strong></td>
    <td><span class="content"><?php echo $lieu; ?></span></td>
  </tr>
  <tr>
    <td><strong>Nom du Père :</strong></td>
    <td><span class="content"><?php echo $this->session->userdata('NOMPERE') ?></span></td>
  </tr>
  <tr>
    <td><strong>Nom de la Mère :</strong></td>
    <td><span class="content"><?php echo $this->session->userdata('NOMMERE') ?></span></td>
  </tr>
  <tr>
    <td><strong>Sexe :</strong></td>
    <td><span class="content"><?php echo $this->session->userdata('SEXE') ?></span></td>
  </tr>
  <tr>
    <td><strong>Numéro CNI :</strong></td>
    <td><span class="content"><?php echo $cni; ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Date CNI :</strong></td>
    <td><span class="content"><?php echo $datecni ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Téléphone :</strong></td>
    <td><span class="content"><?php echo $tel ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Cellulaire :</strong></td>
    <td><span class="content"><?php echo $cell ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Adresse :</strong></td>
    <td><span class="content"><?php echo $adr ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Email :</strong></td>
    <td><span class="content"><?php echo $this->session->userdata('email') ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Situation Famille :</strong></td>
    <td><span class="content"><?php echo $this->session->userdata('SITFAM') ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Nombre d'enfant :</strong></td>
    <td><span class="content"><?php echo $this->session->userdata('NBRE_ENFT') ?></span></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td><strong>EMPLOI</strong></td>
  </tr>
</table>
<br>
 <?php
		  // cascade des services 
		  	$nb_cascade = count($cascade);			
		  ?>
          
            <table width="100%" border="0" cellspacing="2" cellpadding="4" class="box-content">                         
              <tr class="row">
                <td width="20%"><strong>Structure :</strong></td>
                <td class="content"><?php if($nb_cascade){echo $cascade['libelle'];} else {echo $this->session->userdata('STRUCTURE');} ?></td>
              </tr>
              
              <?php if ($nb_cascade){
				  
				 if(!empty($cascade['LIB_CAB'])) { ?>
                  <tr class="row">             
                    <td><strong>Cabinet :</strong></td>
                    <td class="content"><?php echo $cascade['LIB_CAB'] ?></td>             
                  </tr>
               <?php }?>
               
               <?php  if(!empty($cascade['LIB_DG'])) { ?>
                  <tr class="row">                 
                    <td><strong>Direction Générale :</strong></td>
                    <td class="content"><?php echo $cascade['LIB_DG'] ?></td>                
                  </tr>
              <?php }?>
              
              <?php  if(!empty($cascade['LIB_DC'])) { ?>
                  <tr class="row">                
                    <td><strong>Direction Centrale :</strong></td>
                    <td class="content"><?php echo $cascade['LIB_DC'] ?></td>               
                  </tr>
               <?php }?>
               
               <?php  if(!empty($cascade['LIB_SD'])) { ?>
                  <tr class="row">                
                    <td><strong>Sous Direction :</strong></td>
                    <td class="content"><?php echo $cascade['LIB_SD'] ?></td>                
                  </tr>
              <?php }?>
              
              <?php  if(!empty($cascade['LIB_SC'])) { ?>
                  <tr class="row">                
                    <td><strong>Service :</strong></td>
                    <td width="80%" class="content"><?php echo $cascade['LIB_SC'] ?></td>               
                    </tr>
               <?php }
			    } else{
			   ?>
               	 <tr class="row">                
                    <td><strong>Service :</strong></td>
                    <td width="80%" class="content"><?php echo $cascade['LIB_SC'] ?></td>               
                    </tr>
              <?php }
			  	if($nb_cascade){
					if(!empty($cascade['LIB_SPREF'])){
			  ?>
               <tr class="row">
                	<td><strong>Lieu de Travail :</strong></td>
                	<td class="content"><?php echo $cascade['LIB_SPREF'] ?></td>
              	</tr>
             <?php }}?>
               
              <tr class="row">
                <td><strong>Grade :</strong></td>
                <td class="content"><?php echo $this->session->userdata('GRADE') ?></td>
              </tr>
              <tr class="row">
                <td><strong>Classe :</strong></td>
                <td class="content"><?php echo $this->session->userdata('CLASSE') ?></td>
              </tr>
              <tr class="row">
                <td><strong>Echelon :</strong></td>
                <td class="content"><?php echo $this->session->userdata('ECHELON') ?></td>
              </tr>
              <tr class="row">
                <td><strong>Type Agent :</strong></td>
                <td class="content"><?php echo $this->session->userdata('TYPEAGENT') ?></td>
              </tr>             
              <tr class="row">
                <td><strong>Emploi :</strong></td>
                <td class="content"><?php echo $this->session->userdata('EMPLOI') ?></td>
              </tr>
              
              <?php //if ($universel=='universel'){ ?>
              <tr class="row">
                <td><strong>Type de recrutement :</strong></td>
                <td class="content"><?php echo $this->session->userdata('TYPERECRUTEMENT') ?></td>
              </tr>
              <tr class="row">
                <td><strong>Mode de recrutement :</strong></td>
                <td class="content"><?php echo $this->session->userdata('MODERECRUTEMENT') ?></td>
              </tr>
              <?php //}?>             
              
            </table>
         
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td><strong>ETAT AGENT</strong></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="2" cellpadding="4" class="box-content">
  <tr class="row">
    <td width="23%"><strong>Date prise de service :</strong></td>
    <td width="34%" class="content"><?php echo $this->session->userdata('DATE_PRISE') ?></td>
    <td width="25%"><strong>Indemnité :</strong></td>
    <td width="18%" class="content"><?php echo $this->session->userdata('INDEMNITE') ?></td>
  </tr>
  <tr class="row">
    <td><strong>Date de depart à la retraite :</strong></td>
    <td class="content"><?php echo $this->session->userdata('DATERETRAI') ?></td>
    <td><strong>Montant de la Pension :</strong></td>
    <td class="content"><?php echo $this->session->userdata('MONTANTPENS') ?></td>
  </tr>
  <tr class="row">
    <td><strong>Date de Radiation :</strong></td>
    <td class="content"><?php echo $this->session->userdata('DATE_RADIATION') ?></td>
    <td><strong>Présent dans le Fichier Paye :</strong></td>
    <td class="content"><?php echo $this->session->userdata('PAYE') ?></td>
  </tr>
  <tr class="row">
    <td><strong>Etat :</strong></td>
    <td class="content"><?php echo $this->session->userdata('ETAT') ?></td>
    <td><strong>Banque de Paye :</strong></td>
    <td class="content"><?php echo $this->session->userdata('PAYE_BANQUE') ?></td>
  </tr>
  <tr class="row">
    <td><strong>Position :</strong></td>
    <td class="content"><?php echo $this->session->userdata('POSITION') ?></td>
    <td><strong>Agence de Paye :</strong></td>
    <td class="content"><?php echo $this->session->userdata('') ?></td>
  </tr>
  <tr class="row">
    <td><strong>Date Position :</strong></td>
    <td class="content"><?php echo $this->session->userdata('DATE_POSITION') ?></td>
    <td><strong>Etat Physique :</strong></td>
    <td class="content"><?php echo $this->session->userdata('ETATPHYSIQUE') ?></td>
  </tr>
  <tr class="row">
    <td><strong>Motif :</strong></td>
    <td class="content"><?php echo $this->session->userdata('MOTIF') ?></td>
    <td><strong>Présent au récensement :</strong></td>
    <td class="content"><?php echo $this->session->userdata('RECENSE') ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td><strong>ACTES</strong></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="2" class="box-content">
  <tr class="row actes" align="center" style="background-color:#8080FF;">
    <td><strong>N° de l'acte</strong></td>
    <td><strong>Nature de l'acte</strong></td>
    <td><strong>Etat</strong></td>
    <td><strong>Date de signature</strong></td>
    <td><strong>Date d'effet </strong></td>
    <td><strong>Statut</strong></td>
  </tr>
  <?php if ($acte){				
				foreach($acte as $acte){
				     // acte numérisé - download
					 $upload_acte = $this->espace_mod->read_row(
					 	'upload_acte', 
						array('matricule' =>$this->session->userdata('MATRICULE'),'numero'=>$acte['num_actes'])
					 );
					 
					 if($upload_acte){
						 $fichier = $upload_acte['fichier'];
						 $info_acte = '';
					 }
					 else{
						 // disponible aux archives
						 $date_signature = explode('/', $acte['date_signe']);
						 $signature = $date_signature[2].$date_signature[1];
						 
						 if(($acte['etat']=="ACTE SIGNE") && ($signature < 201207)){
							 $info_acte = "Disponible aux archives";
						 }
						 // en traitement
						 elseif(($acte['libelle_acte']!="TITULARISATION") && ($acte['etat']=="DOCUMENT SAISI")){
							 $info_acte = "En traitement";
						 }
						 // non encore numérisé
						 else{
							$info_acte = "Non encore numérisé";	 
						 }
					 } 
			  ?>
  <tr class="row" align="center">
    <td><?php echo $acte['num_actes'] ?></td>
    <td><?php echo $acte['libelle_acte'] ?></td>
    <td><?php echo $acte['etat'] ?></td>
    <td><?php echo $acte['date_signe'] ?></td>
    <td><?php echo $acte['date_effet'] ?></td>
    <td class="content"><?php echo $info_acte ?></td>
  </tr>
  <?php }}else{?>
  <tr class="row" align="center">
    <td colspan="6" style="color:#F00">AUCUN ACTE DISPONIBLE</td>
  </tr>
  <?php }?>
</table>

</body>
</html>