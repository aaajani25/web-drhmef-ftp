<!-- communiqués -->
<?php if ($communique){
	$n=0;
	$lien = '';
	$target = '';
?>
<div class="panel-grid" id="pg-7-4y">

	<div style="padding:0px 15px;">
		<h3 class="widget-title">COMMUNIQUES</h3>
	</div>

<div>
<?php
	foreach($communique as $comm){
		$attach='';
		// gestion des liens
		switch($comm['type_lien']){
				case "auto":
					$lien = $urd.$comm['lien'];
					$target = "_self";
				break;

				case "site":
					$lien = $comm['lien'];
					$target = "_blank";
				break;

				case "rep":
					$lien = '/'.$comm['lien'];
					$target = "_blank";
				break;

				case "fichier":
					$lien = $path_fic.$comm['lien'];
					$target = "_blank";
					$attach = "ic_action_attachment_2.png";
				break;

				default :
					$lien = "#";
					$target = "_self";
			}

		// gestion des id des blocs div
		$n++;
?>

<!--contenu com-->
<div class="panel-grid-cell" id="pgc-7-1-<?php echo $n-1;?>y">

<div class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child">

<div class="page-box page-box--block post-7 page type-page status-publish hentry">
    <div class="page-box__content">

        <h5 class="page-box__title  text-uppercase"><?php echo $comm['titre'] ?></h5>

    	<p><?php echo $comm['resume'] ?></p>

        <p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="date_actu">Publié le&nbsp;<?php echo $comm['date_ins'] ?></td>
                    <td align="right">

                                           <?php if ($attach){ ?>
        	<img src="<?php echo base_url('assets/css/'.$attach) ?>" alt="pict-actu">
             <a href="<?php echo $lien; ?>" target="<?php echo $target;?>" class="read-more  read-more--page-box" style="text-transform:none;">Télécharger</a>
        <?php }else{?>
        <a href="<?php echo $lien; ?>" target="<?php echo $target;?>" class="read-more  read-more--page-box" style="text-transform:none;">Lire la suite</a>
        <?php }?>
          </td>
                </tr>
            </table>
        </p>
    </div>

</div>

</div>
</div>
<!--fin contenu com-->
<?php }?>

      <div align="right" class="voir-plus"><a href="<?php echo $urd.'archives/_communique'?>" class="btn btn-primary">Voir plus</a></div>

</div>

</div>
<?php }?>