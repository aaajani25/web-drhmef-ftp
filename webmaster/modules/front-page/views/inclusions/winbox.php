<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/page.css">

<style type="text/css">
#form-sbx td, option{padding:6px}
	.btn-sendbox{padding:10px; border-color:<?php echo $sboxcolor ?>; color:<?php echo $sboxcolor ?>; font-family:Oswald}
	.btn-sendbox:hover{opacity:0.8}
	@media screen and (min-width:800px){.page_art{width:50%; margin:0px auto 0px auto;}}

	.msg{
		text-align:center;
		padding:10px;
		margin-bottom:5px;
		width:100%;
	}

	.msg-erreur{
		border:1px solid #BF0000;
		background-color:#FFBFBF;
		color:#BF0000;
	}

	.msg-succes{
		border:1px solid #007500;
		background-color:#C4FFC4;
		color:#007500;
	}
	@media (min-width:900px){#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}}

	.champ_de_saisie{width:100%}
	.textarea{width:100%}
</style>

<div id="page" class="container">
<div id="titre">MFP'SENDBOX - ECRIRE AU MINISTRE</div><br>

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

<form action="<?php echo site_url($ctrl.'/sendbox') ?>" method="post">
<div class="panel-grid" id="pgx-7-1" style="margin-top:2px; background-color:#F5F5F5">

  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">Vos informations personnelles</h3>
		<!--contenu-->
        <p>
        	<table width="100%" border="0" align="center" cellpadding="4" cellspacing="5">
  <tr>
    <td>
    <fieldset>
    	<img src="<?php echo base_url('assets/css/ic_action_user.png') ?>" alt="sbx">
    	<input type="text" name="nom_prenoms" class="champ_de_saisie" required id="nom_prenoms" placeholder="Nom et Prénoms" value="<?php //if ($this->session->userdata('logged_in')) echo $this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS'); ?>">
    </fieldset>
      </td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td>
    	<fieldset>
    	<img src="<?php echo base_url('assets/css/ic_action_mail.png') ?>" alt="sbx">
    	<input type="email" name="mail" class="champ_de_saisie" required id="mail" placeholder="E-mail">
    </fieldset>
    </td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td>
    	<fieldset>
    	<img src="<?php echo base_url('assets/css/ic_action_edit.png') ?>" alt="sbx">
    	<input type="text" name="title" class="champ_de_saisie" required id="title" placeholder="Titre">
    </fieldset>
    </td>
  </tr>

</table>
        </p>

  </div>

<div class="panel-grid-cell" id="pgcx-7-1-2">
    <h3 class="widget-title">Votre message*</h3>

    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">

        <div class="page-box page-box--block post-7 page type-page status-publish hentry photo">
            <span style="text-align:left;">
            <table width="100%" border="0" align="center" cellpadding="4" cellspacing="5">
        		 <tr>
    <td>
    <fieldset>
     	   	<img src="<?php echo base_url('assets/css/ic_action_edit.png') ?>" alt="sbx">
    	<textarea name="msg" required id="msg" class="textarea" rows="8" placeholder="Entrez votre message" style="overflow:auto"></textarea>
        </fieldset>
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
  <tr><td colspan="2">&nbsp;</td></tr>
</table>
            </span>
        </div>

    </div>
  </div>

</div>
<input name="recep" type="hidden" value="support@fonctionpublique.gouv.ci">
<input name="parent" type="hidden" value="winsend">
</form>

</div>
