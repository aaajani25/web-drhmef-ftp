<?php	
	// nombre total d'enregistrement
	$nb = count($event);			
	
	// l'id du dernier tableau		
	
	// initialisation des variables
	$id=$next=$prev=0;
	
	/*if(!$id || $id>$i){
		$id=$next=$prev=0;				
	}
	
	if($id<0){
		$id=$next=$prev=$i;
	}*/
	
	// navigation
	/*$next = $next + 1;	
	$prev = $prev - 1;*/	  	
  ?>   
  
<div class="carousel  slide  js-jumbotron-slider" id="headerCarousel" data-interval="5000">
<div class="carousel-inner">

<div class="item active">
<?php 
switch($event[0]['type_lien']){
	case "auto":
		$lien = $urd.$event[0]['lien'];
		$target = "_self";
	break;
	
	case "site":
		$lien = $event[0]['lien'];
		$target = "_blank";
	break;
	
	case "rep":
		$lien = '/'.$event[0]['lien'];
		$target = "_blank";
	break;
	
	case "fichier":
		$lien = $path_fic.$event[0]['lien'];
		$target = "_blank";
	break;
	
	default : 
		$lien = "#";
		$target = "_self";
}
?>

    <a href="<?php echo $lien; ?>" target="<?php echo $target; ?>" title="Lire la suite" class="img_grd_slide">       
    <img src="<?php echo base_url('assets/') ?>/rubriques/_evenement/<?php echo $event[0]['image_small'] ?>" srcset="<?php echo base_url('assets/') ?>/rubriques/_evenement/<?php echo $event[0]['image_small'] ?> 480w, <?php echo base_url('assets/') ?>/rubriques/_evenement/<?php echo $event[0]['image_wide'] ?> 960w" sizes="100vw" alt="">        
        </a>                     
</div>

<!--non actif-->
<?php if ($nb > 1){	 
	for($i=1;$i<$nb;$i++){
		
	switch($event[$i]['type_lien']){
		case "auto":
			$lien = $urd.$event[$i]['lien'];
			$target = "_self";
		break;
		
		case "site":
			$lien = $event[$i]['lien'];
			$target = "_blank";
		break;
		
		case "rep":
			$lien = '/'.$event[$i]['lien'];
			$target = "_blank";
		break;
		
		case "fichier":
			$lien = $path_fic.$event[$i]['lien'];
			$target = "_blank";
		break;
		
		default : 
			$lien = "#";
			$target = "_self";
	}				
?>
<div class="item">
    <a href="<?php echo $lien; ?>" target="<?php echo $target; ?>" title="Lire la suite" class="img_grd_slide">       
    <img src="<?php echo base_url('assets/') ?>/rubriques/_evenement/<?php echo $event[$i]['image_small'] ?>" srcset="<?php echo base_url('assets/') ?>/rubriques/_evenement/<?php echo $event[$i]['image_small'] ?> 480w, <?php echo base_url('assets/') ?>/rubriques/_evenement/<?php echo $event[$i]['image_wide'] ?> 960w" sizes="100vw" alt="">        
        </a>                        
</div>
<?php } ?>
<!--non actif-->

<!--bouton de nav-->
<a class="left carousel-control" href="#headerCarousel" role="button" data-slide="prev">
        <i class="fa  fa-angle-left"></i>
    </a>
    
    <a class="right carousel-control" href="#headerCarousel" role="button" data-slide="next">
        <i class="fa  fa-angle-right"></i>
    </a>
 <!--bouton de nav-->
<?php }?>

</div>      
</div>

<!--Affichage AJAX-->
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
  function load_carrousel(val){	  	  
	  var url = '<?php //echo current_url() ?>';
	  var param = 'event='+val;
	        	
	  $('#global-container').load(url, param);          	
  }
</script>-->