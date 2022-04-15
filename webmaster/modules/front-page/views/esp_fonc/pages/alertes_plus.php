 <?php 
 // image des alertes et autres
 $nai_img = base_url('assets/css/icones-rs/new-r.png');
 ?>
 
 <div class="nb_alerte_info">
    <strong>NB </strong>: Pour toute réclamation sur les informations ci-dessous, lire les <a href="<?php echo $link2.'/docs/situation_administrative_new.pdf' ?>" target="_blank">pièces exigées pour la correction de la situation administrative</a> et les déposer avec une copie de votre espace fonctionnaire à la Direction des Ressources Humaines de votre structure.
 </div>
 
 <?php
 // alerte presence au poste 
 	if($sw_lines==1){
 ?>
 <div class="nb_alerte_info">
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <!--<td width="7%" valign="middle"><img src="<?php// echo $nai_img; ?>" alt="new" width="30" height="30"></td>-->
    <td width="7%" valign="middle">...</td>
    <td width="93%" valign="middle">Veuillez vérifier votre présence au poste en cliquant&nbsp;<a href="<?php echo $link.'/controle_presence' ;?>">ICI</a></td>
  </tr>
</table>

 </div>
 <?php }?>
 
  <?php
  if ($this->$model->titulariser($this->session->userdata('MATRICULE'))==1) {?>
  <!--POUR AFFICHER LE LIEN DE DEPOT DE DOSSIERS DE TITULARISATION-->

<!--<div class="nb_alerte_info">
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="7%" valign="middle"><img src="<?//php echo $nai_img; ?>" alt="new" width="30" height="30"></td>
    
     <td width="93%" valign="middle">
     Dossier &agrave; d&eacute;poser pour la demande de titularisation. <a href="/documents/titularisation.pdf" target="_blank">Cliquer ici</a>
     </td>
       </tr>
</table>    
   </div>-->
   
   <?php }?>
   
    <?php 
   if ($this->$model->alerte_deblocage($this->session->userdata('MATRICULE'))==1) 
   { if($this->$model->search_structure($this->session->userdata('MATRICULE'))==1)
   		{
		  if ($this->$model->deblocage_aout($this->session->userdata('MATRICULE'))==1 ) 
		  { 
 ?> 
             <div class="nb_alerte_info">
             <table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td width="7%" valign="middle"><img src="<?php echo $nai_img; ?>" alt="new" width="30" height="30"></td>
                
                 <td width="93%" valign="middle">
                 	Vous avez &eacute;t&eacute; d&eacute;bloqu&eacute; au mois d&acute;ao&ucirc;t.
                 </td>
                   </tr>
            </table>                                 
              </div>                
 <?php 
		  }
		else
		 {
 ?>
            <div class="nb_alerte_info">
             <table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td width="7%" valign="middle"><img src="<?php echo $nai_img; ?>" alt="new" width="30" height="30"></td>
                
                 <td width="93%" valign="middle">
                 	 Pri&egrave;re remettre &agrave; votre DREN, votre attestation de pr&eacute;sence et les actes de nomination ou de promotion dans votre dernier emploi pour le traitement du d&eacute;blocage de votre salaire indiciaire.
                 </td>
                   </tr>
            </table>                                 
              </div>                           
  <?php 
		 }
  }
  else
  {
	 if ($this->$model->deblocage_aout($this->session->userdata('MATRICULE'))==1 ) 
	  { 
?>
        <div class="nb_alerte_info">
             <table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td width="7%" valign="middle"><img src="<?php echo $nai_img; ?>" alt="new" width="30" height="30"></td>
                
                 <td width="93%" valign="middle">
                 	Vous avez &eacute;t&eacute; d&eacute;bloqu&eacute; au mois d&acute;ao&ucirc;t.
                 </td>
                   </tr>
            </table>                                 
              </div> 
<?php 
	  }
	else
	 {
?>
  <div class="nb_alerte_info">
             <table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td width="7%" valign="middle"><img src="<?php echo $nai_img; ?>" alt="new" width="30" height="30"></td>
                
                 <td width="93%" valign="middle">
                 	Pri&egrave;re remettre &agrave; votre DRH, votre attestation de pr&eacute;sence et les actes de nomination ou de promotion dans votre dernier emploi pour le traitement du d&eacute;blocage de votre salaire indiciaire.
                 </td>
                   </tr>
            </table>                                 
              </div>
  <?php
	 }
  }}
?>

 <?php if($this->$model->sans_actes($this->session->userdata('MATRICULE'))>0){?>
    <div class="nb_alerte_info">
             <table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td width="7%" valign="middle"><img src="<?php echo $nai_img; ?>" alt="new" width="30" height="30"></td>
                
                 <td width="93%" valign="middle">
                 	 Pri&egrave;re d&eacute;poser votre arr&ecirc;t&eacute; de nomination ou de promotion dans votre dernier emploi pour le traitement du d&eacute;blocage de votre salaire indiciaire &agrave; la Direction des Ressources Humaines Civiles de l'Etat du Minist&egrave;re de la Fonction Publique et de la Modernisation de l&acute;Administration.
                 </td>
                   </tr>
            </table>                                 
              </div>
<?php }?>

<?php 
	 if($this->$model->check_collecte_info($this->session->userdata('MATRICULE'))==1){
?>
	 <div class="nb_alerte_info">
             <table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td width="7%" valign="middle"><img src="<?php echo $nai_img; ?>" alt="new" width="30" height="30"></td>
                
                 <td width="93%" valign="middle">
                 	 Grades A3 &agrave; A7, Chefs de Service, Secr&eacute;taires de Direction ou encore Assistantes de Direction, Cr&eacute;ez votre compte de Messagerie Gouvernementale ou faite r&eacute;initialiser votre mot de passe. <a href="<?php echo $link.'/ansult_messagerie' ;?>">Cliquez ici</a>
                 </td>
                   </tr>
            </table>                                 
              </div>     
<?php 
	 }
?>

<?php 
	 $reponse = $this->$model->check_send_param($this->session->userdata('MATRICULE'));
	  
	 if($reponse!='0'){		 
?>
     <div class="nb_alerte_info">
             <table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td width="7%" valign="middle"><img src="<?php echo $nai_img; ?>" alt="new" width="30" height="30"></td>
                
                 <td width="93%" valign="middle">
                 	<?php echo $reponse; ?>
                 </td>
                   </tr>
            </table>                                 
              </div>      
 <?php
	 }
?>  
