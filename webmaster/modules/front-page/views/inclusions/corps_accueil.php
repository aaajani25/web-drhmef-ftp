<?php
	// url des pages à contenu dynamique
	$urd = site_url($ctrl).'/';
	$path_fic = base_url().'assets/rubriques/';
?>

<style type="text/css">
	.date_actu{margin-bottom:18px; font-style:italic; color:#999; font-size:12px}

	._offre{color:#C00; }

	.msg{
		border-radius:5px;
		text-align:center;
		padding:10px;
		margin-bottom:5px;
	}

	.msg-erreur{
		border:1px solid #BF0000;
		background-color:#FFBFBF;
		color:#BF0000;
	}

	.msg-succes{
		border:1px solid #007500;
		background-color:#C4FFC4;
		color:#007500;
	}
    .module-title {

    border-bottom: 1px solid #ffbc67;
    border-bottom-color: rgb(255, 188, 103);
    border-bottom-color: #ffbc67;
    padding-bottom: 0;
    font-size: 14px;
    margin-bottom: 30px;
}
</style>

<!--SLIDES niveau 1-->
	<?php //include('accueil/slides_1.php'); ?>

   <!-- <div class="jumbotron  jumbotron--with-captions"></div>-->
<!--FIN SLIDES niveau 1-->

<div class="container post-7 page type-page status-publish hentry" role="main">
<div id="pl-7">

 <!--BLOC 0 : FLASH INFO-->
    	<?php //include('accueil/bloc0.php'); ?>
 	<!--FIN BLOC 0: FLASH INFO-->

      <!-- BLOC 1x: SLIDER ET PHOTO MINISTRE-->
        <?php include('accueil/bloc1x.php'); ?>
    <!--FIN BLOC 1x: SLIDER ET PHOTO MINISTRE-->

      <!--BLOC 5: publicite-->
        <?php include('accueil/bloc5.php'); ?>
    <!--FIN BLOC 5-->

    <!-- BLOC 1: actualité et espace fonctionnaire, sondage, newsletter-->
        <?php include('accueil/bloc1.php'); ?>
    <!--FIN BLOC 1-->

    <!--BLOC 4y : communiques-->
        <?php //include('accueil/bloc4y.php'); ?>
    <!--FIN BLOC 4y-->

    <!--BLOC 2: phototheque-->
        <?php include('accueil/bloc2.php'); ?>
    <!--FIN DU BLOC 2-->

    <!--BLOC cicg: -->
        <?php include('accueil/bloc_cicg.php'); ?>
    <!--FIN DU BLOC 2-->

    <!--BLOC 3 : offres etc -->
        <?php //include('accueil/bloc3.php'); ?>
    <!--FIN BLOC 3-->

    <!--BLOC 4x : annonces-->
        <?php //include('accueil/bloc4x.php'); ?>
    <!--FIN BLOC 4x-->

    <!--BLOC 6: documentation -->
        <?php //include('accueil/bloc6.php'); ?>
    <!--FIN BLOC 6-->

    <!--BLOC 4 : publication-->
        <?php include('accueil/bloc4.php'); ?>
    <!--FIN BLOC 4-->

    <!--BLOC 3x :  sondage etc-->
        <?php //include('accueil/bloc3x.php'); ?>
    <!--FIN BLOC 3-->

</div>
</div>
