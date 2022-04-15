<p>&nbsp;</p>
<!--offres emplois, stages, formations -->
<?php if ($offre) {
	$n=0;
	$lien = '';
	$target = '';
?>
<div class="panel-grid" id="pg-7-1">

	<div style="padding:0px 15px;">
		<h3 class="widget-title">OFFRES / EMPLOIS / FORMATIONS</h3>
	</div>

<!--ligne 1-->
<div>

<?php foreach($offre as $off){
	$attach = "";
		// gestion des liens
		switch($off['type_lien']){
				case "auto":
					$lien = $urd.$off['lien'];
					$target = "_self";
				break;

				case "site":
					$lien = $off['lien'];
					$target = "_blank";
				break;

				case "rep":
					$lien = '/'.$off['lien'];
					$target = "_blank";
				break;

				case "fichier":
					$lien = $path_fic.$off['lien'];
					$target = "_blank";
					$attach = "ic_action_attachment_2.png";
				break;

				default :
					$lien = "#";
					$target = "_self";
			}

		// gestion des id des blocs div

?>
<!--contenu 1-->
<div class="panel-grid-cell" id="pgc-7-1-<?php echo $n++;?>">

<div class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child">

<div class="page-box page-box--block post-7 page type-page status-publish hentry">
    <div class="page-box__content">
        <h5 class="page-box__title  text-uppercase"><?php echo $off['titre'] ?></h5>

    <p>&nbsp;</p>

        <p>
       	<?php echo $off['resume'] ?>
        </p>

        <p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="date_actu _offre">Du&nbsp;<?php echo $off['debut'] ?> au <?php echo $off['fin'] ?></td>
                    <td align="right">

                                           <?php if ($attach){ ?>
        	<img src="<?php echo base_url('assets/css/'.$attach) ?>" alt="pict-actu">
             <a href="<?php echo $lien; ?>" target="<?php echo $target;?>" class="read-more  read-more--page-box" style="text-transform:none;">Télécharger</a>
        <?php }else{?>
        <a href="<?php echo $lien; ?>" target="<?php echo $target;?>" class="read-more  read-more--page-box" style="text-transform:none;">Lire la suite</a>
        <?php }?></td>
                </tr>
            </table>
        </p>
    </div>

</div>

</div>
</div>
<!--fin contenu 1-->
<?php }?>

 <div align="right" class="voir-plus"><a href="<?php echo $urd.'archives/_offre' ?>" class="btn btn-primary">Voir plus</a></div>

</div>
<!--fin ligne 1-->

</div>
<?php }?>