<!--contenu pour articles-->
<?php $path_fic = base_url().'assets/rubriques/';?>
  
<style type="text/css">
	@media (min-width:900px){#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}}
		 
 #pgcx-7-1-0{margin-bottom:0;}
 .photo a img{margin-bottom:10px; padding:2px; box-shadow:2px 4px 2px 2px #CCC}
 .photo a img:hover{box-shadow:none}  
</style>

<div class="carousel slide  js-jumbotron-slider" id="headerCarousel" data-interval="5000" style="margin-top:3px">
<div class="carousel-inner">

<!--slide -->
<div class="item active"> 
    <img src="<?php echo base_url('assets/') ?>/rubriques/_evenement/<?php echo $data_page['image_small'] ?>" srcset="<?php echo base_url('assets/') ?>/rubriques/_evenement/<?php echo $data_page['image_small'] ?> 480w, <?php echo base_url('assets/') ?>/rubriques/_evenement/<?php echo $data_page['image_wide'] ?> 960w" sizes="100vw" alt="">   
</div>
<!--fin slide -->

</div>
</div>
<!--<div id="titre">EVENEMENT MAJEUR</div><br>--><br>


<div class="panel-grid" id="pgx-7-1">   
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title"><?php echo $data_page['album'] ?></h3>           
		<!--contenu-->
        <p>
        	<?php echo $data_page['contenu'] ?>
        </p>       
        <p>&nbsp;</p>     
  </div>   
  
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
    <h3 class="widget-title">Galerie Photos</h3>
     
    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
        <div class="page-box page-box--block post-7 page type-page status-publish hentry photo">          
            <span style="text-align:left;">
        		<?php 
				  // phototheque
            	$phototheque = $this->nav_mod->read_result_nolimit
                (
                    '_phototheque',
                    array('etat' => 'on', 'album' => $data_page['album']),
                    array('id','desc')
                );
            	// -- phototheque
				
				foreach($phototheque as $tof){
				?>
                     <a href="<?php echo $path_fic ?>_phototheque/<?php echo $tof['image_wide'] ?>" data-fancybox="group" data-caption="<?php echo $tof['resume'] ?>" style="text-decoration:none">
         
            <img src="<?php echo $path_fic ?>/_phototheque/<?php echo $tof['image_wide'] ?>" alt="" width="100" height="80">
         </a> 
                   
     <?php }?>
            </span>                                       
        </div> 
               
    </div>
  </div>     
  
</div>

<script src="<?php echo base_url('assets/') ?>/css/jquery.fancybox.min.js"></script>
