<div id="lofslidecontent45_m" class="lof-slidecontent lof-snleft" style="border:1px solid #036D00">

	<div class="preload">
  		<div></div>
 	</div>
 
 <!-- MAIN CONTENT --> 
  <div class="lof-main-wapper">
	    <!--slide-->
          <?php 
		  	$n = count($slide_mob);
			for($i=1;$i<$n+1;$i++){
		  ?>
  			<div class="lof-main-item"></div>
          <?php }?>
        <!--fin slide-->  	
  </div>
  <!-- END MAIN CONTENT --> 
  
    <!-- NAV -->	   
   <div class="lof-navigator-outer" style="padding-left:10px; padding-right:10px">
  		<ul class="lof-navigator">
        
         <?php foreach($slide_mob as $sm){
			// gestion des liens
			switch($sm['type_lien']){
				case "auto":
					$lien = $urd.$sm['lien'];
					$target = "_self";
				break;
				
				case "site":
					$lien = $sm['lien'];
					$target = "_blank";
				break;
				
				case "rep":
					$lien = '/'.$sm['lien'];
					$target = "_blank";
				break;
				
				case "fichier":
					$lien = $path_fic.$sm['lien'];
					$target = "_blank";
				break;
				
				default : 
					$lien = "#";
					$target = "_self";
			} 	 
		 ?>
            <li>            	
                  <div>
                  <a href="<?php echo $lien; ?>" target="<?php echo $target; ?>" style="text-decoration:none;">
                	<img src="<?php echo $path_fic; ?>/_alaune/<?php echo $sm['image_small']; ?>" width="80" height="43"> 
                    
                    
                	<h3 style="text-transform:capitalize; font-family:'Merriweather Sans'; font-size:13px; padding-right:5px; font-weight:400"><?php echo $sm['resume']; ?></h3>
                    
                  <!--	<p><?php //echo $sm['resume']; ?></p>-->
                    </a>
                  </div>                   
            </li>
         <?php }?>
            
         </ul>
      </div>   
    <!-- NAV -->
   
</div> 
 
<script type="text/javascript">
	var _lofmain =  $('lofslidecontent45_m');
	var _lofscmain = _lofmain.getElement('.lof-main-wapper');
	var _lofnavigator = _lofmain.getElement('.lof-navigator-outer .lof-navigator');
	var object = new LofFlashContent( _lofscmain, 
									  _lofnavigator,
									  _lofmain.getElement('.lof-navigator-outer'),
									   { fxObject:{ transition:Fx.Transitions.Quad.easeInOut,  duration:800},
									 	 interval:3000,
							 			 direction:'vrdown' } );
	object.start( true, _lofmain.getElement('.preload') );
</script>

<!------------------------------------- FIN ------------------------------------------------->


