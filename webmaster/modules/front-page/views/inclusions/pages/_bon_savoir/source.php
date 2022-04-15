<?php $path_fic = base_url().'assets/rubriques/';?>

<style type="text/css">
	@media (min-width:900px){#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}}

#pgcx-7-1-0{margin-bottom:0;}
 .photo a img{margin-bottom:10px; padding:2px; box-shadow:2px 4px 2px 2px #CCC}
 .photo a img:hover{box-shadow:none}
</style>

<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	BON A SAVOIR ?
</h1>
  </div>
</div>

<div class="panel-grid" id="pgx-7-1" style="margin-top:20px;">

  <div class="panel-grid-cell" id="pgcx-7-1-0">
	    <h3 class="widget-title"><?php echo $data_page['titre'] ?></h3>
            <img src="<?php echo base_url() ?>assets/rubriques/_actualite/<?php echo $data_page['image_small'] ?>">
           <br>&nbsp;
        <p><?php echo $data_page['contenu'] ?></p>
  </div>


<div class="panel-grid-cell" id="pgcx-7-1-2">
    <h3 class="widget-title">Galerie Photos</h3>

    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">

        <div class="page-box page-box--block post-7 page type-page status-publish hentry photo">
        	<!--      <h3></h3> <br> -->
            <span style="text-align:left">
            	<?php
				  // phototheque
            	$phototheque = $this->nav_mod->read_result_nolimit
                (
                    '_phototheque',
                    array('etat' => 'on', 'album' => $data_page['album']),
                    array('id','desc')
                );
            	// -- phototheque

			if($phototheque){
				foreach($phototheque as $tof){
				?>
                     <a href="<?php echo $path_fic ?>_phototheque/<?php echo $tof['image_wide'] ?>" data-fancybox="group" data-caption="<?php echo $data_page['resume'] ?>" style="text-decoration:none">

            <img src="<?php echo $path_fic ?>/_phototheque/<?php echo $tof['image_wide'] ?>" alt="" width="100" height="80">
         </a>

     <?php }}else{?>
     	<a href="#" class="btn btn-info">aucune photo</a>
     <?php }?>
            </span>
        </div>

    </div>
  </div>

</div>
<script src="<?php echo base_url('assets/') ?>/css/jquery.fancybox.min.js"></script>