<!--<div class="widget  widget-icon-box"> 
    
        <i class="fa" style="padding-top:10px;"><img src="<?php //echo base_url('assets/') ?>/rubriques/ic_action_clock.png"></i>
        
        <div class="icon-box__text" style="padding-top:10px;">
            <h4 class="icon-box__title">Aujourd'hui</h4>
            <span class="icon-box__subtitle"><?php //echo @date('d-m-Y h:m'); ?></span>
        </div>    
   
</div>

<div class="widget  widget-icon-box"> 
<div class="icon-box">
	<i class="fa"><img src="<?php //echo base_url('assets/') ?>/rubriques/ic_action_globe.png"></i>
    
    <div class="icon-box__text" style="padding-top:10px;">
        <h4 class="icon-box__title">Nombre de visite</h4>
        <span class="icon-box__subtitle">48 729 622</span>
    </div>
</div>
</div>

<div class="widget  widget-icon-box">
<div class="icon-box">
    <i class="fa"><img src="<?php //echo base_url('assets/') ?>/rubriques/ic_action_home.png"></i>
    <div class="icon-box__text">
        <h4 class="icon-box__title">Mon - Sat 8.00 - 18.00</h4>
        <span class="icon-box__subtitle">Sunday CLOSED</span>
    </div>
</div>
</div>-->


<div class="widget  widget-social-icons" style="position:relative; width:100%; text-align:right; margin:0px 0px 0px 15px;">
<?php if ($this->uri->segment(2)=='navigator'){ ?>
   <a href="<?php echo site_url($ctrl.'/go_mfp_admin'); ?>" style="text-decoration:none" target="_blank">
   		<img src="<?php echo base_url('assets/') ?>/rubriques/_armoirie/<?php echo $armoirie['image_small'] ?>" width="75" height="75">
    </a>
   <?php }else{?>
   <img src="<?php echo base_url('assets/') ?>/rubriques/_armoirie/<?php echo $armoirie['image_small'] ?>" width="75" height="75">
   <?php }?>
</div>
