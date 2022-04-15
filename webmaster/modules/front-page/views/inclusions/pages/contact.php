<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">NOUS CONTACTER </h1>
  </div>
</div><br>

<?php
	if(!empty($msg) && $this->uri->segment(3)=='sendbox'){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
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

<form action="<?php echo site_url($ctrl.'/sendbox/nc') ?>" method="post">
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
         Nom et Prénoms<span style="color: #F00">*</span></fieldset>
	 </td>
    </tr>
  <tr>
    <td colspan="2"><input type="text" name="nom_prenoms" class="champ_de_saisie" required id="nom_prenoms" placeholder="..."></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/mail_v.png') ?>" alt="sbx">
          Adresse Electronique<span style="color: #F00">*</span></fieldset>
	  </td>
    </tr>
  <tr>
    <td colspan="2"><input type="email" name="mail" class="champ_de_saisie" required id="mail" placeholder="..."></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/edition_objet_v.png') ?>" alt="sbx">
       Objet<span style="color: #F00">*</span></fieldset></td>
    </tr>
  <tr>
    <td><input type="text" name="title" class="champ_de_saisie" required id="title" placeholder="..."></td>
  </tr>
</table>
</p>

</div>

<div class="panel-grid-cell" id="pgcx-7-1-2">
    <h3 class="widget-title">Votre message</h3>

    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">

        <div class="page-box page-box--block post-7 page type-page status-publish hentry photo">
            <span style="text-align:left;">
            <table width="100%" border="0" align="center" cellpadding="4" cellspacing="5">
        		 <tr>
    <td>
      <fieldset>
        <img src="<?php echo base_url('assets/css/form-icones/dialog_msg_v.png') ?>" alt="sbx">
         Message<span style="color: #F00">*</span></fieldset></td>
    </tr>
	 <tr>
	   <td colspan="2"><textarea name="msg" required id="msg" class="textarea" placeholder="..." rows="6" style="overflow:auto"></textarea></td>
   </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
      <td width="213">
        <span style="color: #F00; font-weight: bold;font-size: 15px">
          NB: les champs marqués du symbole (*) sont obligatoires
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
<table width="100%" align="left" >
    <tr>
      <td>
        <div>
        <p><strong>Adresse</strong> : 04 BP 189 Abidjan 04</p>
        <p><strong>Téléphone</strong> : (225) 27 20-21-92-00</p>
        <p><strong>Fax</strong> : (225) 27 20-21-45-77</p>
        <p><strong>E-mail</strong> : drhmef@finances.gouv.ci</p>
        <p><strong>Site web</strong> : www.drh.finances.gouv.ci</p>
        <p><strong>Situation géographique</strong> : <br>
          Abidjan Plateau – Immeuble du Stade, 1er et 2ème étage</p>
        </div>
        </td>
    </tr>
   </table>
</div>
<input name="recep" type="hidden" value="support@fonctionpublique.gouv.ci">
<input name="parent" type="hidden" value="winsend">
</form>
