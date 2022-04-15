<!--titre de la page-->
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">LA BIBLIOTHEQUE DE LA DRH DU MEF
</h1>
  </div>
</div>

<!--alerte, info, message apres validation de formulaire-->
<div class="page_msg">
	<?php //echo $msg; ?>
</div>

<!--contenu pour formulaire-->
<!--donnez la classe "champ" à tous les champs de saisie et liste déroulante-->
<!--donnez les classes "btn btn-primary" à tous les boutons-->
<div class="page_form">&nbsp;</div>

<!--contenu pour articles-->
<div class="page_art">

  <?php  if(!empty( $decrets)){
  foreach ($decrets as $decret) {
     $info_decrets = $this->nav_mod->read('article_pnd',array('articleId'=>$decret['pndId']));
     //print_r($info_decrets);exit;
    ?>
  <div class="panel-grid title">
      <h3 class="widget-title"><?php echo $decret['nom_pnd'] ?></h3>
  </div>
  <div class="page_art_content">
     <table width="100%" border="0" cellpadding="5" cellspacing="5" id="tabb">
      <tr class="row-title">
        <td width="76%">Nom du document</td>
        <td width="20%">Voir</td>
      </tr>
      <?php if (!empty($info_decrets)) {
      foreach ($info_decrets as $info_decret) { ?>
      <tr class="row-content">
          <td style="text-align:left; color:#7b7b7b;">
            <?php echo $info_decret['nom_document'] ?></td>
          <td><a href="<?php echo site_url('front-page/navigator'); ?>/affiche_pdf/<?php echo $info_decret['lien'] ?>">Consulter</a></td>
      </tr>
      <?php }}?>
     </table>
   </div>
 <?php }} ?>
