<?php
//print_r($publication);exit;
if ($publication){ $n=count($publication); $t=$n-1; ?>
<!--publication -->
<style>
  #pg-7-4 .col-sm-6{width:20%;}

  @media (max-width:800px){
	  #pg-7-4 .col-sm-6{border:1px dashed #999; width:70%;}
	  #pg-7-4 .testimonial__quote{margin-top:10px;}
	 /* #pg-7-4 .widget-title {font-size:20px;}*/
  }
   @media (max-width:340px){
	  #pg-7-4 .col-sm-6{border:1px dashed #999; width:100%;}
	  #pg-7-4 .testimonial__quote{padding-left:18px; margin-top:10px;}
	/*  #pg-7-4 .widget-title {font-size:20px;}*/
  }

  .link{position:relative; bottom:300px;}
  .dlink{padding:15px 18px; background-color:#333; opacity:0.8; color:#FFF; font-weight:bold; transition: all 200ms ease-out;}
  .dlink:hover{text-decoration:none; color:#FFF; opacity:1}
</style>


<div class="panel-grid" id="pg-7-4">

<div class="siteorigin-panels-stretch panel-row-style" style="padding-top:0px; border-top:0px solid #999;" data-stretch-type="full">

<div class="panel-grid-cell" id="pgc-7-4-0">
<div class="so-panel widget widget_pt_testimonials widget-testimonials panel-first-child panel-last-child" id="panel-7-4-0-0" data-index="12">

<div class="testimonial">

<!--titre bloc 4-->
<h2 class="module-title" id="publ">
     <span style="background-color:#ffbc67; color:#FFF">PUBLICATIONS</span>
     <?php if ($n>4){ ?>
    <a class="testimonial__carousel  testimonial__carousel--left" href="#carousel-testimonials-widget-4-0-0" data-slide="next"><i class="fa  fa-angle-right" aria-hidden="true"></i><span class="sr-only" role="button">Next</span></a>

    <a class="testimonial__carousel  testimonial__carousel--right" href="#carousel-testimonials-widget-4-0-0" data-slide="prev"><i class="fa  fa-angle-left" aria-hidden="true"></i><span class="sr-only" role="button">Previous</span></a>
    <?php }?>
</h2>

<!--contenu bloc 4: liste box; défilement horizontal-->

<div id="carousel-testimonials-widget-4-0-0" class="carousel slide">
<div class="carousel-inner" role="listbox">

<?php if ($n>3){ $j=5; ?>
<!--actif-->
<div class="item active">
<div class="row">
 <?php for($i=0;$i<5;$i++){?>
   <div class="col-xs-12  col-sm-6">
        <div class="testimonial__quote" align="center" <?php if ($i==0) {echo 'style="border:6px solid #ff8b26; padding:1px 1px 1px 1px"';} ?>>
        <a href="<?php echo $urs.'/'.$publication[$i]['lien'] ?>"><img src="<?php echo $path_fic?>_publication/<?php echo $publication[$i]['image_small'] ?>" alt="Project Image"></a>
        </div>

        <!-- <cite class="testimonial__author"><?php //echo $publication[$i]['titre'] ?></cite> -->

        <!-- <div class="testimonial__rating">
            <i class="fa  fa-star" style="color:#2B6828; font-weight:bold; font-family:'Oswald'"><?php //echo $publication[$i]['debut'] ?>&nbsp;-&nbsp;<?php //echo $publication[$i]['fin'] ?></i>

        </div> -->

    </div>
 <?php }?>
</div>
</div>
<!--actif-->

<!--inactif-->
<div class="item">
<div class="row">
  <?php for($j=5;$j<=$t;$j++){?>
 	<div class="col-xs-12  col-sm-6">
        <div class="testimonial__quote" align="center">
             <a href="<?php echo $urs.'/'.$publication[$i]['lien'] ?>">
              <img src="<?php echo $path_fic?>_publication/<?php echo $publication[$j]['image_small'] ?>" alt="Project Image"></a>
        </div>

        <!-- <cite class="testimonial__author"><?php //echo $publication[$j]['titre'] ?></cite>
 -->
        <!-- <div class="testimonial__rating">
            <i class="fa  fa-star" style="color:#2B6828; font-weight:bold; font-family:'Oswald'"><?php //echo $publication[$j]['debut'] ?>&nbsp;-&nbsp;<?php //echo $publication[$j]['fin'] ?></i>
        </div> -->

    </div>
  <?php }?>
</div>
</div>
<!--inactif-->
<?php }?>

</div>
</div>
<!--fin listbox-->

</div>

</div>
</div>

</div>
</div>

<?php }?>
