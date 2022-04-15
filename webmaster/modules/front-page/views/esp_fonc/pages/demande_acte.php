<!--<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">MFP'SENDBOX - ECRIRE AU MINISTRE</h1>
  </div>
</div><br>-->
<?php
//echo validation_errors();
  if(!empty($msg) && $this->uri->segment(3)=='trt_demande_acte'){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>" id="senb" style="margin-top:3px">
            <?php echo $msg; ?>
        </div>

        <script type="text/javascript">
      setTimeout(function(){
        document.getElementById('senb').style.display = 'none';
    },10000);
     
    </script>
<?php }?>
<script type="text/javascript">
function sup_h(acte)
{
  
  //alert(acte.value);
  if(acte.value==6)
  {
    document.getElementById('devoileacte1').style.display = 'block';
    document.getElementById('devoileacte2').style.display = 'block';
  }
  else 
  {
    document.getElementById('devoileacte1').style.display = 'none';
    document.getElementById('devoileacte2').style.display = 'none';
  }
}
</script>

<form action="<?php echo site_url($ctrl.'/trt_demande_acte') ?>" method="post">
<div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">

  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">Vos informations personnelles</h3>
    <!--contenu-->
      <p>
          <table width="100%" border="0" align="center" cellpadding="4" cellspacing="5">
            <tr valign="middle">
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
         Matricule<span style="color: #F00">*</span></fieldset></td>
    </tr>
  <tr>
      <td colspan="2"><input type="text" name="matricule" class="champ_de_saisie" required id="matricule" readonly value="<?php echo $this->session->userdata('matricule'); ?>"></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr valign="middle">
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
         Nom et Prénoms<span style="color: #F00">*</span></fieldset></td>
    </tr>
  <tr>
    <td colspan="2"><input type="text" name="nom_prenoms" class="champ_de_saisie" required readonly id="nom_prenoms"  value="<?php echo $this->session->userdata('nom'); ?>"></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/contact_phone_v.png') ?>" alt="sbx">
      Telephone<span style="color: #F00">*</span></fieldset></td>
    </tr>
  <tr>
    <td colspan="2"><input type="text" name="tel" class="champ_de_saisie" required  id="tel" value="<?php echo str_pad($this->session->userdata('cellulaire'),8,0,STR_PAD_LEFT); ?>"></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/mail_v.png') ?>" alt="sbx">
          Adresse Electronique<span style="color: #F00">*</span></fieldset></td>
    </tr>
  <tr>
    <td colspan="2"><input type="email" name="mail" class="champ_de_saisie" required id="mail" value="<?php echo $this->session->userdata('email'); ?>"></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
          Date de prise de service(MEF)<span style="color: #F00">*</span></fieldset></td>
    </tr>
  <tr>
    <td colspan="2"><input type="date" name="date_service" class="champ_de_saisie" required id="date_service" value="<?php echo $date_p; ?>"></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
       Emploi<span style="color: #F00">*</span></fieldset> </td>
    </tr>
    <tr>
      <td>
          <select name="emploid" class="champ_de_saisie"   id="emploid">
          <option >--choix--</option>
          <!--<option selected="selected">--test--</option>-->
          <?php foreach ($emplois as $emploi){ ?>
          <option value="<?php echo $emploi['EMP_CODE']  ?>"<?php if($emploi['EMP_LIBELLE']==$this->session->userdata('emploi')) {echo 'selected="selected"';} else {echo '';} ?>><?php echo $emploi['EMP_LIBELLE'] ;  ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
      </table>
  </div>

<div class="panel-grid-cell" id="pgcx-7-1-2">
    <h3 class="widget-title">Informations Actes</h3>

    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">

  <!-- <div class="page-box page-box--block post-7 page type-page status-publish hentry photo">
            <span style="text-align:left;"> -->
  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="5">
    <tr>
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
       Nature de l'acte<span style="color: #F00">*</span></fieldset></td>
    </tr>
  <tr>
    <td>
      <select name="acte" class="champ_de_saisie" id="acte" onchange="sup_h(this);">
        <option value="">--choix--</option>
        <?php foreach ($type_actes as $type_acte) { ?>
        <option value="<?php echo $type_acte['idtype'] ?>"><?php echo $type_acte['type_acte'] ?></option>
        <?php } ?>
      </select>
    </td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <fieldset id="">
<tr id="devoileacte1" style="display:none;">
<td>
<fieldset>
<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
Matricule du supérieure hierrachique<span style="color: #F00">*</span></fieldset></td>
</tr>
<tr id="devoileacte2" style="display:none;">
    <td colspan="2"><input type="text" name="mat_chef" class="champ_de_saisie"  id="matri" maxlength="7" style="text-transform:uppercase" value="<?php //echo $this->session->userdata('cellulaire'); ?>"></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<!--<tr id="devoileacte3">
<td>
<fieldset>
<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
Nom du supérieure hierrachique<span style="color: #F00">*</span></fieldset></td>
</tr>-->
<!--<tr id="devoileacte4">
<td colspan="2"><input type="text" name="nom" class="champ_de_saisie" required id="nom" value="<?php //echo $this->session->userdata('cellulaire'); ?>"></td>
</tr>-->
</fieldset>
  <tr><td colspan="2">&nbsp;</td></tr>
<tr>
  <tr>
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/photo_v.png') ?>" alt="sbx">
          piece jointe
	  </fieldset></td>
    </tr>
  <tr>
    <td colspan="2"><input type="file" name="fichier" class="champ_de_saisie" id="fichier"></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
      <td>
      <fieldset>
      <img src="<?php echo base_url('assets/css/form-icones/dialog_msg_v.png') ?>" alt="sbx">
       Motif<span style="color: #F00">*</span>
      </fieldset>
     </td>
    </tr>
    <tr>
     <td colspan="2">
<!--      <textarea name="msg" required id="msg" class="textarea" placeholder="..." rows="6"></textarea>-->
        <select name="msg" required id="msg">
            <option value="">--Choix--</option>
            <option value="Pour complément de dossier administratif">Pour complément de dossier administratif</option>
            <option value="Pour complément de dossier bancaire">Pour complément de dossier bancaire</option>
            <option value="Pour complément de dossier de demande de visas">Pour complément de dossier de demande de visas</option>
            <option value="Pour complément de dossier de retraite">Pour complément de dossier de retraite</option>
            <option value="Pour complément de dossier de concours administratif">Pour complément de dossier de concours administratif</option>
        </select>
    </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
      <td width="213">
        <span style="color: #F00; font-weight: bold;font-size: 15px">
          NB: Les champs marqués du symbole (*) sont obligatoires
        </span>
      </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
    <td align="">
    <fieldset>
      <input name="Envoyer" type="submit" class="btn btn-primary">
    </fieldset>
    </td>
    </tr>
</table>

            </span>
        </div>
    </div>
 </div>

</div>
<input name="recep" type="hidden" value="support@fonctionpublique.gouv.ci">
<input name="parent" type="hidden" value="winsend_demande">
</form>

