<div id="publicite">

   <style type="text/css">
   @media (min-width:992px){
     #pub{margin:30px -89px; position:relative; background-color:#F5F5F5;box-shadow: 0 0 20px rgba(0, 0, 0, 0.33);}
   }
  #pub img{width:100%; height:auto;}
 </style>

   <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <div class="item active">
        <img src="<?php echo base_url('assets/rubriques/_pub/ban_eth_hier.jpg')  ?>" alt="" style="width:100%;">
      </div>
      <?php /*?><div class="item ">
        <a href="<?php echo site_url('front-page/navigator'); ?>/identification/eth">
        <img src="<?php echo base_url('assets/rubriques/_pub/banniere.gif')  ?>" alt="" style="width:100%;">
      </a>
      </div>
      <?php */?>
      <div class="item">
        <img src="<?php echo base_url('assets/rubriques/_pub/banniere2.jpg')  ?>" alt="" style="width:100%;">
      </div>

      <div class="item">
        <img src="<?php echo base_url('assets/rubriques/_pub/banniere3.jpg')  ?>" alt="" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev" role="button">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next" role="button">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="icon-next"></span>
    </a>
  </div>
</div>
