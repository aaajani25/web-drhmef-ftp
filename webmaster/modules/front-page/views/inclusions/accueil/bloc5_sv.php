<div id="pub">
   <?php if ($pub){
		// gestion des liens
		switch($pub['type_lien']){
				case "auto":
					$lien = $urd.$pub['lien'];
					$target = "_self";
				break;

				case "site":
					$lien = $pub['lien'];
					$target = "_blank";
				break;

				case "rep":
					$lien = '/'.$pub['lien'];
					$target = "_blank";
				break;

				case "fichier":
					$lien = $path_fic.$pub['lien'];
					$target = "_blank";
				break;

				default :
					$lien = "#";
					$target = "_self";
			}
   ?>
   <style type="text/css">
   @media (min-width:992px){
     #pub{margin:30px -89px; position:relative; background-color:#F5F5F5;box-shadow: 0 0 20px rgba(0, 0, 0, 0.33);}
   }
  #pub img{width:100%; height:auto;}
 </style>

   <a href="<?php echo $lien; ?>" target="<?php echo $target; ?>" title="<?php echo $pub['titre'] ?>">
        <img src="<?php echo $path_fic ?>/_pub/<?php echo $pub['image_small'] ?>" alt="<?php echo $pub['titre'] ?>" />
    </a>
<?php }?>
</div>



