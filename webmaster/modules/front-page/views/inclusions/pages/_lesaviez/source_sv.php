<!--titre de la page-->
 <div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	ACTUALIT&Eacute;
 </h1>
  </div>
</div>

<!--contenu pour articles-->
<div class="page_art">
	<div class="panel-grid title">
   		<h3 class="widget-title"><?php echo $data_page['titre'] ?></h3>
    </div>

   <div class="page_art_content">
    <img src="<?php echo base_url() ?>assets/rubriques/_actualite/<?php echo $data_page['image_small'] ?>">
    <br>&nbsp;
     	<?php echo $data_page['contenu'] ?>
   </div>
</div>