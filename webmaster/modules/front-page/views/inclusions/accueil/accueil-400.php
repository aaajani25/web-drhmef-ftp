<!--INFOS GENERALES-->
<div class="acc">
  <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table">
    <tr valign="middle">
      <td width="3%"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_user.png"  /></td>
      <td width="94%" colspan="2" align="left">INFORMATIONS GENERALES</td>
    </tr>
    </table> 
  
  <table width="100%" border="0" cellspacing="4" cellpadding="4" class="box-content" style="text-align:left">
    <tr>
      <td colspan="2" align="center" class="photo"><img src="<?php echo $photo; ?>" alt="aucune photo" width="150" height="150" />
        
  <?php if ($up_photo==1){ if ($acces==3 || $acces==2) { echo '<br>'.$this->session->userdata('pswd');
					  ?>
  <br>   
  <a href="javascript:void(0);" style="color:#03C; font-family:inherit" onClick="setPhoto('photo-400');">[ Changer la photo ]</a> <br> 
   <?php }else{?>
   Veuillez-vous rendre au Ministère de la Fonction <br />
Publique, au Plateau si vous êtes à Abidjan, sinon, <br />
prière entrer en contact avec  la Direction régionale de la Fonction Publique de votre localité.
                      <?php }?><br>

        
        <form action="<?php echo $link.'/photo' ?>" method="post" enctype="multipart/form-data">
          <table width="100%" border="0" cellspacing="2" cellpadding="4" id="photo-400" style="display:none">
            <tr>
              <td><input name="userfile2" type="file">&nbsp;(jpg, 150x150 max)</td>                 
            </tr>
            <tr>                   
              <td align="center"><input name="button" type="submit" class="btn btn-primary" value="Valider" style="width:100%;"></td>
            </tr>
          </table>
        </form>
        <?php }else{?>
          <div class="nom_mat_tof"><?php echo $this->session->userdata('MATRICULE') ?>
                
        <?php if ($acces==3 || $acces==2){
			echo '<br>'.$this->session->userdata('pswd');
		} ?>
</div>
        <?php }?>
      </td>
      
      <!-- <td class="">
    	 
    </td>-->
    </tr>
    <tr>
      <td width="28%">Matricule</td>
      <td width="72%"><span class="content"><?php echo $this->session->userdata('MATRICULE') ?></span></td>
    </tr>
    <tr>
      <td>Nom  Prénoms</td>
      <td><span class="content"><?php echo $this->session->userdata('NOM') ?>&nbsp;<?php echo $this->session->userdata('PRENOMS') ?></span></td>
    </tr>
    <tr>
      <td>Nom  jeune fille</td>
      <td><span class="content"><?php echo $this->session->userdata('NOMJFILLE') ?></span></td>
    </tr>
    <tr>
      <td>Date  Naissance</td>
      <td><span class="content"><?php echo $this->session->userdata('DATENAISS') ?></span></td>
    </tr>
    <tr>
      <td>Lieu  Naissance</td>
      <td><span class="content"><?php echo $lieu; ?></span></td>
    </tr>
    <tr>
      <td>Nom  Père</td>
      <td><span class="content"><?php echo $this->session->userdata('NOMPERE') ?></span></td>
    </tr>
    <tr>
      <td>Nom  Mère</td>
      <td><span class="content"><?php echo $this->session->userdata('NOMMERE') ?></span></td>
    </tr>
    <tr>
      <td>Sexe</td>
      <td><span class="content"><?php echo $this->session->userdata('SEXE') ?></span></td>
    </tr>
    <tr>
      <td> CNI</td>
      <td><span class="content"><?php echo $cni; ?></span></td>
    </tr>
    <tr>
      <td>Date CNI</td>
      <td><span class="content"><?php echo $datecni ?></span></td>
    </tr>
    <tr>
      <td>Téléphone</td>
      <td><span class="content"><?php echo $tel ?></span></td>
    </tr>
    <tr>
      <td>Cellulaire</td>
      <td><span class="content"><?php echo $cell ?></span></td>
    </tr>
    <tr>
      <td>Adresse</td>
      <td><span class="content"><?php echo $adr ?></span></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><span class="content"><?php echo $this->session->userdata('email') ?></span></td>
    </tr>
    <tr>
      <td>Situation Famille</td>
      <td><span class="content"><?php echo $this->session->userdata('SITFAM') ?></span></td>
    </tr>
    <tr>
      <td>Nombre d'enfant</td>
      <td><span class="content"><?php echo $this->session->userdata('NBRE_ENFT') ?></span>&nbsp;                   
      <!-- <a href="javascript:void(0);" onClick="toggle_enft('child-400')" style="color:#03C; float:right" title="liste des enfants">détails [+/-]</a>--></td>
    </tr>
  </table>       
  <!--INFOS GENERALES-->
  
  <!--ENFANT-->
 
    <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table">
      <tr>
        <td width="3%" align="left"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_users.png"  /></td>
        <td width="89%" align="left">LISTE DES ENFANTS</td>              
      </tr>
      </table>                            
    
    <table width="100%" border="0" align="" cellpadding="4" cellspacing="2" class="box-content">
      <tr class="actes" align="left" style="background-color:#8080FF;">              
        <td>Nom  Prénoms</td>
        <td>Date</td>
        <td>Lieu</td>
        <td>Sexe</td>
      </tr>
      <?php if ($enfant){			
			  foreach($enfant as $child){ 
			 ?>
      <tr align="left">             
        <td><?php echo $child['PR_PARENT_NOM'] ?></td>
        <td><?php echo $child['PR_PARENT_DATNAIS'] ?></td>
        <td><?php if(substr($child['PR_PARENT_LIEUNAIS'], 0, 5) == 'SPREF') echo $child['LIB_SPREF']; else echo $child['PR_PARENT_LIEUNAIS']; ?></td>
        <td><?php echo $child['PA_SEXE_LIB'] ?></td>
      </tr>
      <?php }}else{?>
      <tr class="" align="center">
        <td colspan="5" style="color:#F00;">AUCUN ENFANT D&Eacute;CLAR&Eacute;</td>               
      </tr>
      <?php }?>
      </table>
   
  <!--FIN ENFANT--> 
  
  <!--EMPLOI-->
  <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table">
    <tr valign="middle">
      <td width="3%" align="left"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_business.png"  /></td>
      <td width="89%" align="left">EMPLOI</td>
    </tr>
    </table>  
  
  
  <span id="popup1-400">
  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" class="box-content">
            <tr class="">
              <td width="28%" height="50" align="left">Structure </td>
             
              <td width="72%" height="50" align="left"><span class="content">
                <?php 
				if ($nbre_sce_note > 0) {echo $service_notation['libelle']; } else {echo $this->session->userdata('STRUCTURE'); } ?>
              </span></td>
            </tr>
            <tr>
               <?php 
      if ($nbre_sce_note > 0) 
	    {  
            			
			if (!empty($service_notation['LIB_CAB']))
			 {
?>
	 <tr class="">
        <td height="50" align="left" class="">Cabinet </td>
       
        <td height="50" bgcolor="" class="content"><?php echo $service_notation['LIB_CAB']; ?></td>
      </tr>
<?php					 
			 }
			if (!empty($service_notation['LIB_DG']))
			 {
?>
	 <tr class="">
        <td height="50" align="left" bgcolor="" class="">Direction G&eacute;n&eacute;rale </td>
        
        <td height="50" bgcolor="" class="content"><?php echo $service_notation['LIB_DG']; ?></td>
      </tr>
<?php					 
			 }
			 
			if (!empty($service_notation['LIB_DC']))
			 {
?>
	 <tr class="">
        <td height="50" align="left" class="">Direction Centrale </td>
       
        <td height="50" class="content"><?php echo $service_notation['LIB_DC']; ?></td>
      </tr>
<?php					 
			 }
		   
		    if (!empty($service_notation['LIB_SD']))
			 {
?>
	 <tr class="">
        <td height="50" align="left" bgcolor="" class="">Sous Direction </td>
        
        <td height="50" bgcolor="" class="content"><?php echo $service_notation['LIB_SD']; ?></td>
      </tr>
<?php					 
			 }
			
			if (!empty($service_notation['LIB_SC']))
			 {
?>
	 <tr class="">
        <td height="50" align="left" class="">Service </td>
       
        <td height="50" class="content"><?php echo $service_notation['LIB_SC']; ?></td>
      </tr>
<?php					 
			 }
			 
		}
	  else
	    {
?>
	 <tr class="">
        <td height="50" align="left" bgcolor="" class="">Service </td>
        <td height="50" bgcolor="" class="content"><?php echo $this->session->userdata('SERVICE'); ?></td>
      </tr>
<?php			
		}
        
   if ($nbre_sce_note > 0) 
    {
       if (!empty($service_notation['LIB_SPREF']))
		{
?>
			 <tr class="">
              <td height="50" align="left" bgcolor=""><span class="">Lieu de Travail </span></td>
            
              <td height="50" align="left" class="content"><?php echo $service_notation['LIB_SPREF'] ?></td>
            </tr>
<?php
        }
    }
?>
            
            <tr class="">
              <td height="50" align="left" bgcolor=""><span class="">Emploi </span></td>
     
              <td height="50" align="left" class="content"><?php if($this->session->userdata('OPTION_EMPLOI')!='') {echo $this->session->userdata('EMPLOI').' option '.$this->session->userdata('OPTION_EMPLOI');} else {echo $this->session->userdata('EMPLOI');} ?></td>
            </tr>
        <!--  </table>
       
  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" class="box-content">-->
            <tr class="">
              <td width="28%" height="50" align="left">Type Agent </td>
              <td width="72%" height="50" align="left" class="content"><?php echo $this->session->userdata('TYPEAGENT') ?></td>
            </tr>
            
 <?php //if ($universel =='universel') { ?>
            <tr class="">
              <td height="50" align="left" bgcolor="">Type Recrutement </td>
          <td height="50" align="left" class="content"><?php echo $this->session->userdata('TYPERECRUTEMENT') ?></td>
            </tr>
            <tr class="">
              <td height="50" align="left" class="">Mode Recrutement </td>
              <td height="50" align="left" class="content"><?php echo $this->session->userdata('MODERECRUTEMENT') ?></td>
            </tr>
<?php //} ?>
            <tr class="">
              <td height="50" align="left">Grade </td>
            
              <td height="50" align="left" class="content"><?php echo $this->session->userdata('GRADE') ?></td>
            </tr>
            <tr class="">
              <td height="50" align="left">Classe </td>
              <td height="50" align="left" class="content"><?php echo $this->session->userdata('CLASSE') ?></td>
            </tr>
            <tr class="">
              <td height="50" align="left">Echelon </td>
      
              <td height="50" align="left" class="content"><?php echo $this->session->userdata('ECHELON') ?></td>
            </tr>
           
          </table>
  </span>
  <!--FIN EMPLOI-->                     
  <br> 
  
  <!--ETAT AGENT-->
  <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table etat_agent">
    <tr valign="middle">
      <td width="3%" align="left"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_flag.png"  /></td>
      <td width="89%" align="left">ETAT AGENT</td>
      </tr>
    </table>                   
  
  <span id="popup2-400">
  <table width="100%" border="0" cellspacing="2" cellpadding="4" class="box-content" style="text-align:left">
    <tr class="">
      <td width="23%">Date prise service</td>
      <td class="content"><?php echo $this->session->userdata('DATE_PRISE') ?></td>
    </tr>
    <tr class="">
      <td>Date depart retraite</td>
      <td class="content"><?php echo $this->session->userdata('DATERETRAI') ?></td>
    </tr>
    <tr class="">
      <td>Date Radiation</td>
      <td class="content"><?php echo $this->session->userdata('DATE_RADIATION') ?></td>
    </tr>
    <tr class="">
      <td>Etat</td>
      <td class="content"><?php echo $this->session->userdata('ETAT') ?></td>
    </tr>
    <tr class="">
      <td>Position</td>
      <td class="content"><?php echo $this->session->userdata('POSITION') ?></td>
    </tr>
    <tr class="">
      <td>Date Position</td>
      <td class="content"><?php echo $this->session->userdata('DATE_POSITION') ?></td>
    </tr>
    <tr class="">
      <td>Motif</td>
      <td class="content"><?php echo $this->session->userdata('MOTIF') ?></td>
    </tr>
    <tr class="">
      <td>Indemnité</td>
      <td class="content"><?php echo $this->session->userdata('INDEMNITE') ?></td>
    </tr>
    <tr class="">
      <td>Montant Pension</td>
      <td class="content"><?php echo $this->session->userdata('MONTANTPENS') ?></td>
    </tr>
    <tr class="">
      <td>Présent Fichier Paye</td>
      <td class="content"><?php echo $this->session->userdata('PAYE') ?></td>
    </tr>
    <tr class="">
      <td>Banque Paye</td>
      <td class="content"><?php echo $agence_banque['banque'] ?></td>
    </tr>
    <tr class="">
      <td>Agence Paye</td>
      <td class="content"><?php echo $agence_banque['agence'] ?></td>
    </tr>
    <tr class="">
      <td>Etat Physique</td>
      <td class="content"><?php echo $this->session->userdata('ETATPHYSIQUE') ?></td>
    </tr>
    <tr class="">
      <td>Présent récensement</td>
      <td class="content"><?php echo $this->session->userdata('RECENSE') ?></td>
    </tr>
  </table>
  </span>
  <!--FIN ETAT AGENT-->         
  <br> 
  
  <!--ACTES A TELECHARGER-->
  <span id="actes"></span>
    <?php if ($actes_m){ ?>
            <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table download_acte">
              <tr valign="middle">
                <td width="3%" align="left"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_document.png"  /></td>
                <td width="89%" align="left">ACTES A TELECHARGER</td>
              
              </tr>
        </table>
    
    <span id="popup3-400">          
		 <?php echo $actes_m; ?>
    </span>
    <?php }?>
    <br>

    <?php if($courrier_m){?>
     <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table download_acte">
              <tr valign="middle">
                <td width="3%" align="left"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_document.png"  /></td>
                <td width="89%" align="left">COURRIERS A TELECHARGER</td>
              
              </tr>
        </table>
        
        <span id="popup33-400">
        <?php echo $courrier_m; ?>       
    </span>
    <?php }?>
  <!--FIN ACTES A TELECHARGER--> 
</div>
