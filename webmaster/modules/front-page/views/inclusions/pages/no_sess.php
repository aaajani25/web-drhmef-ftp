<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/page.css">

<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">Espace agent - Authentification</h1>
  </div>
</div><br>

<div class="panel-grid" id="pgx-7-1">

    <h3 class="widget-title">Se Reconnecter</h3>
		<!--contenu-->
        <?php include('message.php'); ?>
        <div class="esp_fon tab-form">
        <p>
        <form action="<?php echo site_url($ctrl.'/connexion') ?>" method="post" name="form_espfon">
          	<table width="50%" border="0" cellspacing="5" cellpadding="7" align="center">
                <tr>
                <td align="">
                <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Matricule </fieldset>
                </td>
              </tr>
          	  <tr>
          	    <td align="left"><input name="matricule" type="text" autocomplete="off"  class="champ_de_saisie" required style="text-transform:uppercase" placeholder="..." /></td>
       	      </tr>

              <tr><td>&nbsp;</td></tr>

               <tr>
                <td align="">
                 <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/mdp_v.png') ?>" alt="sbx">
        Mot de passe</fieldset>
                </td>
              </tr>

              <tr><td><input name="mot_de_passe" id="mot_de_passe" autocomplete="off" type="password"  placeholder="..." class="champ_de_saisie" required /></td></tr>

              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="submit" name="button" id="btn_bl22" value="CONNEXION" class="btn btn-primary" /></td>
              </tr>
            </table>
            <input name="parent" type="hidden" id="parent" value="logix" />
        </form>
        </p>
    </div>

<!-- <div class="panel-grid-cell" id="pgcx-7-1-2">
    <h3 class="widget-title">Avoir mon espace fonctionnaire, c'est utile :</h3>

    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">

        <div class="page-box page-box--block post-7 page type-page status-publish hentry">
            <span style="text-align:left;">

    <ul class="hit">
              <li>Savoir ma situation administrative</li>
              <li>Voir mes notes</li>
                <li>Télécharger mes actes</li>
                <li>Postuler à un Concours</li>
                <li>Faire une demande de mise à disposition</li>
                <li>Faire une demande de détachement</li>
                <li>Faire une demande de disponibilité</li>
                <li>Suivre mes dossiers</li>
                <li>Faire des réclamations</li>
                <li>Et autres ...</li>
            </ul>

            </span>
        </div>

    </div>
  </div> -->

</div>