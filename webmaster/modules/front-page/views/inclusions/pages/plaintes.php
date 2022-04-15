<div id="page" class="container">
    <div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1"></h1>
  </div>
</div><br>
<!--date picker-->
  <link rel="stylesheet" href="assets/css/jquery-ui.css">
  <!--<link rel="stylesheet" href="/resources/demos/style.css">-->

  <script src="assets/js/jquery-1.12.4.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="assets/css/datepicker-fr.js"></script>

  <script>
    jQuery.noConflict();

    jQuery( function() {
    jQuery( "#datepicker" ).datepicker( jQuery.datepicker.regional[ "fr" ] );
    } );
  </script>
<!--date picker-->

<div class="panel-grid form-page" id="pgx-7-1" style="margin-top:2px;">

<?php /*if(isset($_GET['email']) && $_GET['email'] == 'success'){
             echo '<div class="msg msg-succes" id="nlt" >
      Message envoyé.
</div>';}*/ ?>

<?php /*if(isset($_GET['email']) && $_GET['email'] == 'faux'){
             echo '<div class="msg msg-erreur" id="nlt" >
      Désolé, veuillez réessayer.
</div>';}*/ ?>

<?php /*if(isset($_GET['plaint']) && $_GET['plaint'] == 'rien'){
             echo '<div class="msg msg-erreur" id="nlt" >
      Veuillez saisir votre message.
</div>';}*/ ?>
<?php if(isset($msg) && $type==2){
             echo '<div class="msg msg-succes" id="nlt" >
             '.$msg.'
</div>';}?>

<?php if(isset($msg) && $type==1){
             echo '<div class="msg msg-erreur" id="nlt" >
      '.$msg.'
</div>';} ?>

<?php echo validation_errors(); ?>
<form action="<?php echo site_url($ctrl.'/sendplainte') ?>" method="post" name="form_espfon" enctype="multipart/form-data">
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">Informations personnelles</h3>
    <!--contenu-->

<p>
<table width="100%" border="0" cellspacing="5" cellpadding="7">
    <tr>
                <td align="">
                <fieldset>
      <img src="<?php echo base_url('assets/css/form-icones/photo_v.png') ?>" alt="sbx">
               piece jointe </fieldset>
                </td>
              </tr>

              <tr>
                <td><input name="piece" id="photo" type="file"  class="champ_de_saisie" value="<?php //if(isset($email)){ echo $email;}?>" placeholder="votre piece jointe" /><span><?php if(isset($erreur_mail)){ echo $erreur_mail;}?></span></td>
              </tr>
            <tr>
                <td>&nbsp;</td>
              </tr>
</table>
</p>

        <p>
        <div class="panel-grid-cell" id="pgcx-7-1-2">
            <h3 class="widget-title">Motif</h3>
  <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">

  <div class="page-box page-box--block post-7 page type-page status-publish hentry" style="padding-left:0px">

    <table width="100%" border="0" cellspacing="5" cellpadding="7">
         <tr>
                <td align="">
                <fieldset>

      <img src="<?php echo base_url('assets/css/form-icones/photo_v.png') ?>" alt="sbx">
               Réclamations: ( Veuillez apporter votre contribution)* </fieldset>
                </td>
              </tr>

         <tr>
                <td><textarea name="motif" required id="motif" style="height: 100px; width:520px"></textarea><span><?php if(isset($erreur_motif)){ echo $erreur_motif;}?></span></td>
                </tr>

                <tr>
                 <td>&nbsp;</td>
               </tr>

              <tr>
                 <td>
                <input type="hidden" name="objet" value="<?php echo $nature[0]['libelle']; ?>">
                  <input type="submit" required name="button" id="btn_bl22" value="Valider la plainte" class="btn btn-primary" />

                 </td>
               </tr>

             </table>
               <!--
              !-->
        </p>
  </div>
</div></div></p></div></form></div></div>

