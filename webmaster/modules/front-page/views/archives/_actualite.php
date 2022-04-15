<!--titre de la page-->
 <div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	ARCHIVES DES ACTUALITES
  </h1>
  </div>
</div>
  
<?php foreach($data as $nw){ 
			$attach='';								
			// gestion des liens
		switch($nw['type_lien']){
				case "auto":
					$lien = $urd.$nw['lien'];
					$target = "_self";
				break;
				
				case "site":
					$lien = $nw['lien'];
					$target = "_blank";
				break;
				
				case "rep":
					$lien = '/'.$nw['lien'];
					$target = "_blank";
				break;
				
				case "fichier":
					$lien = $path_fic.$nw['lien'];
					$target = "_blank";
					$attach = "ic_action_attachment_2.png";
				break;
				
				default : 
					$lien = "#";
					$target = "_self";
			}																
?>
<div class="page_art">
	<div class="panel-grid title">
   		<h3 class="widget-title"><?php echo $nw['titre'] ?></h3>
    </div>
   
   <div class="page_art_content">
     	<?php echo $nw['resume'] ?>
        
        <p align="right">
        <?php if ($attach){ ?>
        	<img src="<?php echo base_url('assets/css/'.$attach) ?>" alt="pict-actu">
        <?php }?>
        
        <a href="<?php echo $lien; ?>" target="<?php echo $target;?>" class="read-more  read-more--page-box">Lire la suite</a>           
        &nbsp;&nbsp;
        
        <?php if(!empty($nw['lien_inscrire'])){?>        	
        	<a href="<?php echo $nw['lien_inscrire']; ?>" target="_self" class="read-more  read-more--page-box">s'inscrire</a>
        <?php }?>
        </p>             
                         
        
        <div class="date_actu" align="right">Publié le&nbsp;<?php echo $nw['date_ins'] ?></div>
   </div>  
        
</div>

<?php }?>


