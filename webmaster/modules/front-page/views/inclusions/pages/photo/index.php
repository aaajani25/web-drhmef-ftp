<?php $path_fic = base_url().'assets/rubriques/';?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/page.css">
  
<style type="text/css">
	@media (min-width:900px){
	#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}
}  
 
 #pgcx-7-1-0{margin-bottom:0;}
 .photo a img{margin-bottom:10px; margin-right:3px; padding:2px; box-shadow:2px 4px 2px 2px #CCC}
 .photo a img:hover{box-shadow:none}
</style>

<div id="page" class="container">

 <div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">PHOTOTHEQUE</h1>
  </div>
</div>
<br>

<div class="panel-grid" id="pgx-7-1" style="margin-top:20px;">  
 
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title"><?php echo $this->input->get_post('album') ?></h3>           
		<!--contenu-->
        <p><?php echo $album['contenu'] ?></p>
        
        <?php if ($album['lien']!=''){ ?>
        <p><a href="<?php echo $album['lien'] ?>" target="_blank">Lire la suite</a></p>
        <?php }?>
        
        <p>&nbsp;</p>     
  </div>
   
  
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
    <h3 class="widget-title">Galerie Photos</h3>
     
    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
        <div class="page-box page-box--block post-7 page type-page status-publish hentry photo">
        	<!--<h3>sous titre</h3> <br>-->       
            <span style="text-align:left;">
          <?php foreach($phototheque as $tof){?>        
     <a href="<?php echo $path_fic ?>_phototheque/<?php echo $tof['image_wide'] ?>" data-fancybox="group" data-caption="<?php echo $tof['album'] ?>" style="text-decoration:none">
     
        <img src="<?php echo $path_fic ?>/_phototheque/<?php echo $tof['image_wide'] ?>" alt="" width="100" height="80">
     </a> 
               
 <?php }?>
            </span>                                       
        </div> 
               
    </div>
  </div>     
  
</div>

 <!-- JS -->
	<!--<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>-->
	<script src="<?php echo base_url('assets/') ?>/css/jquery.fancybox.min.js"></script>
</div>