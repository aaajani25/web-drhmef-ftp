 <header class="header _wide _small" role="banner">

 <!--banniere-->
 <?php if ($this->uri->segment(2)!='espace_fonctionnaire'){ ?>
  <a href="<?php echo site_url(''); ?>">
  <img src="<?php echo base_url('assets/rubriques/_banniere/'.$banniere['image_wide']) ?>" srcset="<?php echo base_url('assets/rubriques/_banniere/'.$banniere['image_small']);?> 640w, <?php echo base_url('assets/rubriques/_banniere/'.$banniere['image_wide']);?> 1258w" sizes="100vw" alt="">
  </a>
   <?php }else{?>
  <img src="<?php echo base_url('assets/rubriques/_banniere/'.$banniere['image_wide']) ?>" srcset="<?php echo base_url('assets/rubriques/_banniere/'.$banniere['image_small']);?> 640w, <?php echo base_url('assets/rubriques/_banniere/'.$banniere['image_wide']);?> 1258w" sizes="100vw" alt="">
   <?php }?>

<!--menu-->
 <div class="container">
<!--menu format petit ecran-->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#buildpress-navbar-collapse" style="background-color:#036D00;">
        <span class="navbar-toggle__text">MENU</span>
        <span class="navbar-toggle__icon-bar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </span>
    </button>
<!--fin menu format petit ecran-->

</div><!--fin div class container-->

<div class="header_wide" style="padding:14px">&nbsp;</div>
<div class="sticky-offset  js-sticky-offset"></div>

<?php if ($this->uri->segment(2)=='espace_fonctionnaire'){ ?>
<!--menu-->
    <div class="container _menu">
        <div class="navigation" role="navigation">
            <div class="collapse  navbar-collapse" id="buildpress-navbar-collapse">
             	<?php
					include('menu_ief.php');
				?>
            </div>
        </div>
    </div>
<!--fin menu-->
<?php }else{?>
<!--menu-->
    <div class="container _menu">
        <div class="navigation" role="navigation">
            <div class="collapse  navbar-collapse" id="buildpress-navbar-collapse">
             		<?php
					include('menu_oef.php');
				?>
            </div>
        </div>
    </div>
<!--fin menu-->
<?php }?>


<!--compteur de visites-->
<!-- <div class="_compteur" align="right">
        <span>
          <?php
			  /*if($compteur > 1){
				 $vw = 'vues';
			  }
			  else{
				 $vw = 'vue';
			  }

			  echo $compteur.'ss'.$vw;*/
			?>
        </span>
</div> -->


</header>