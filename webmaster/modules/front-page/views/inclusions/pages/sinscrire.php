<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">Inscription à l'Espace Agent</h1>
  </div>
</div><br>

<!--date picker-->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/jquery-ui.css">
  <!--<link rel="stylesheet" href="/resources/demos/style.css">-->

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

 <?php include('message.php'); ?>

<div class="panel-grid form-page" id="pgx-7-1" style="margin-top:2px;">
<form action="<?php echo site_url($ctrl.'/do_inscription') ?>" method="post" name="form_espfon" enctype="multipart/form-data">
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">Informations personnelles</h3>
		<!--contenu-->
        <p>
          	  <table width="100%" border="0" cellspacing="5" cellpadding="7">

               <tr>
                <td align="">
                <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Matricule </fieldset>
                </td>
              </tr>

              <tr>
                <td><input name="matricule" type="text" required class="champ_de_saisie" value="<?php echo set_value('matricule');?>" placeholder="..." style="text-transform:uppercase" /></td>
                </tr>
             <tr>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td align="">
                  <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
                  Date de naissance
                  </fieldset>
                </td>
              </tr>

               <tr>
                 <td><input name="date_naiss" id="datepicker" placeholder="..." required type="text" class="champ_de_saisie" value="<?php echo set_value('date_naiss');?>" /></td>
               </tr>
            <tr>
                 <td>&nbsp;</td>
               </tr>
            <tr>
                 <td>&nbsp;</td>
               </tr>
              <tr>
                <td align="">
                <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/mail_v.png') ?>" alt="sbx">
              E-mail
                </fieldset>
                </td>
              </tr>

               <tr><td><input name="email" id="email" type="email" class="champ_de_saisie" placeholder="..." required value="<?php echo set_value('email');?>" /></td></tr>
            <tr>
                 <td>&nbsp;</td>
               </tr>

              <tr>
                <td align="">
                 <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/mail_v.png') ?>" alt="sbx">
                 Confirmer l'adresse electronique
                 </fieldset>
                </td>
              </tr>
               <tr>
                 <td><input name="conf_email" id="conf_email" type="email" required class="champ_de_saisie" placeholder="..."  /></td>
               </tr>
            </table>
        </p>

  </div>

<div class="panel-grid-cell" id="pgcx-7-1-2">
    <h3 class="widget-title">Informations sur le compte</h3>

    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">

        <div class="page-box page-box--block post-7 page type-page status-publish hentry ">
            <span>
                <table width="100%" border="0" cellspacing="5" cellpadding="7">

                  <tr>
                <td align="">
                 <fieldset>
      <img src="<?php echo base_url('assets/css/form-icones/mdp_v.png') ?>" alt="sbx">
        Mot de passe</fieldset>
                </td>
              </tr>

               <tr><td><input name="mot_de_passe" id="mot_de_passe" required type="password" placeholder="..." class="champ_de_saisie" /></td></tr>
            <tr>
                 <td>&nbsp;</td>
               </tr>
               <tr>
                <td align="">
                  <fieldset>
      <img src="<?php echo base_url('assets/css/form-icones/mdp_v.png') ?>" alt="sbx">
                 Confirmer le mot de passe </fieldset>
                </td>
              </tr>
              <tr><td><input name="conf_mdp" id="conf_mdp" required type="password" placeholder="..." class="champ_de_saisie" /></td></tr>
              <tr>
                 <td>&nbsp;</td>
               </tr>
                  <tr><td colspan="2">&nbsp;</td></tr>

                	<tr><td colspan="2" align="" style="color:#F00;">NB: tous les champs sont obligatoires</td></tr>

              		<tr><td colspan="2">&nbsp;</td></tr>

                	<tr><td width="44%" align=""><input type="submit" name="button" id="btn_bl22" value="Valider l'inscription" class="btn btn-primary" /></td>
              		</tr>
            </table>
            </span>
        </div>

    </div>
  </div>

    </form>

</div>
