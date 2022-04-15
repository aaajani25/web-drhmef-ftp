<!------------------------------------- SLIDES DES COMMUNIQUES ------------------------------------------------->

<div id="lofslidecontent45" class="lof-slidecontent lof-snleft" style="border:1px solid #036D00">
<div class="preload"><div></div></div>
 
 <!-- SLIDE --> 
  <div class="lof-main-wapper"><!--slide : contenu dynamique-->
  <?php if ($slide){
	    //		
	    $lien=$target='';
	  
		foreach($slide as $slide){
			// gestion des liens
			switch($slide['type_lien']){
				case "auto":
					$lien = $urd.$slide['lien'];
					$target = "_self";
				break;
				
				case "site":
					$lien = $slide['lien'];
					$target = "_blank";
				break;
				
				case "rep":
					$lien = '/'.$slide['lien'];
					$target = "_blank";
				break;
				
				case "fichier":
					$lien = $path_fic.$slide['lien'];
					$target = "_blank";
				break;
				
				default : 
					$lien = "#";
					$target = "_self";
			} 
  ?>	    
  		<div class="lof-main-item">
             <!--image--> 
             <img src="<?php echo $path_fic; ?>/_alaune/<?php echo $slide['image_small']; ?>"> 
                    
             <!--texte et lien transparent-->  
             <div class="lof-main-item-desc">
                <h3 style="font-size:18px"><a href="<?php echo $lien; ?>" target="<?php echo $target; ?>"><?php echo $slide['titre']; ?></a>
                
                <br>
<br>
<a href="<?php echo $lien; ?>" target="<?php echo $target; ?>" style="font-style:italic; float:right; font-size:17px; text-transform:none; font-family:'Oswald'; font-weight:lighter">-- Lire la suite ...</a>
                </h3>
             </div>
        </div>                                     
     <?php }?>
     	
  </div>  
  <!-- FIN DU SLIDE --> 
  
    <!-- NAV -->
   		 
   <div class="lof-navigator-outer">
  		<ul class="lof-navigator">
        
         <?php foreach($slide_mob as $sm){	?>
            <li>
            	<div>
                	<img src="<?php echo $path_fic; ?>/_alaune/<?php echo $sm['image_small']; ?>" width="80" height="43"><!--image--> 
               
                  	<h3 style="text-transform:capitalize; font-family:'Merriweather Sans'; font-size:13px; padding-right:5px; font-weight:400"><?php echo $sm['resume']; ?></h3>
                </div>    
            </li>
         <?php }?>
            
         </ul>
      </div>   
    <!-- NAV -->
    
  <?php }?> 
</div> 
 
<script type="text/javascript">
	var _lofmain =  $('lofslidecontent45');
	var _lofscmain = _lofmain.getElement('.lof-main-wapper');
	var _lofnavigator = _lofmain.getElement('.lof-navigator-outer .lof-navigator');
	var object = new LofFlashContent( _lofscmain, 
									  _lofnavigator,
									  _lofmain.getElement('.lof-navigator-outer'),
									   { fxObject:{ transition:Fx.Transitions.Quad.easeInOut,  duration:800},
									 	 interval:6000,
							 			 direction:'vrdown' } );
	object.start( true, _lofmain.getElement('.preload') );
</script>

<!------------------------------------- FIN ------------------------------------------------->


