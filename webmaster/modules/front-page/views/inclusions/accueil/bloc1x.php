<!--a la une et photo du ministre -->
<style type="text/css">
	.m_down{margin:0px 2px 0px 2px;  border-radius:13px; padding:5px 5px 8px 5px; background-color:#CCC;}
	.m_down:hover, .m_activ{background-color:#09F;}
	.blc_m{border:1px solid #666; padding:6px; margin:14px; border-radius:6px}
	#a_laune{
		border-width: .1rem;
		background: #fff;
		padding: .3rem;
	}

	/*.zelda{height:auto; margin-top:6px; background-color:#999; color:#CCC; border:1px solid #333; padding:5px}
	.zelda a{padding:6px 12px; border:1px solid #000; margin-right:8px}*/
	#pgx-7-1{margin-bottom:0px}
	@media (max-width:900px){#pgx-7-1{margin-bottom:0px}}
</style>

<div class="panel-grid" id="pgx-7-1"><br>



  <!--communiqués-->
  <div id="slides">
<div class="panel-grid-cell" id="pgcx-7-1-0">

		<div id="a_laune" class="sld_com_desktop" style="height:auto;" align="center"><?php include('slide_com.php'); ?></div>
        <div class="sld_com_mobile" style="height:auto;"><?php include('slide_com_mobile.php'); ?></div>
  </div>
  </div>
  <!--communiqués-->

      <!--photo du Ministre-->
   <div id="mte">
<div class="panel-grid-cell ml" id="pgcx-7-1-2">
    <?php include('bloc-ministre.php'); ?>
  </div>
   </div>
  <!--photo du Ministre-->
  <div class="header_wide">&nbsp;</div>
</div>