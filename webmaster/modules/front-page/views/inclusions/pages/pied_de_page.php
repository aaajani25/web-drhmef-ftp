<style type="text/css">
	.titrix{font-family: Oswald; color: #f9f9f9; font-size: 20px; text-shadow: 1px 1px 0px #000;}
	.btn-footer{background-color:#575757; padding:15px 17px; color:#FFF; font-weight:bold; border:none; border-radius:0px}
	.btn-footer:hover{background-color:#757575;}
	.libix{color:#000000; font-size: 12px;}
	.r-sociaux{padding:20px;}
	.footer-script{color:#F5F5F5; text-shadow:0px 3px #000000; font-family:Oswald}
	.footer a {color:#fff;}
	.div_height{height: 35px; font-size: 12px;}
</style>

<!--footer 1 : reseaux sociaux-->
<div class="footer" style="background-color:#919191; padding-top:30px;">

<!---->
<div class="container">
<div class="row">
<!--footer 1: contenu 1 ANNUAIRE TÉLÉPHONIQUE-->
<div class="col-xs-12  col-md-3">
<div class="widget  widget_text  push-down-30">

    <h6 class="footer__headings titrix">ANNUAIRE T&Eacute;L&Eacute;PHONIQUE</h6><!--titre-->

    <div class="textwidget libix">
        <span>
            &nbsp; <strong>Email DRH</strong> : <a href="mailto:<?php echo $annuaire['email'] ?>"><?php echo $annuaire['email'] ?></a><br>
            &nbsp; <strong>Standard</strong> : <?php echo $annuaire['standard'] ?><br>
            &nbsp; <strong>Fax</strong> : <?php echo $annuaire['fax'] ?>
       </span>
	</div>

</div>
</div>
<!--footer 1: fin contenu 1-->

<!--footer 1: debut contenu 2 PLAN DU SITE-->
<div class="col-xs-12  col-md-3">
<div class="widget  widget_nav_menu  push-down-30">

<h6 class="footer__headings titrix">PLAN DU SITE</h6>

<div class="menu-top-menu-container" style="text-transform:uppercase; text-align:justify; padding-left:4px;">
    <ul id="menu-top-menu-1" class="menu libix">

        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-496">
            <a href="<?php echo site_url($ctrl.'/accueil') ?>#" class="footer_text">Pr&eacute;sentation</a>
        </li>

        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2132">
            <a href="<?php echo site_url($ctrl.'/accueil') ?>#mte">Mot du Directeur</a>
        </li>

        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-164">
        	<a href="<?php echo site_url($ctrl.'/accueil') ?>#actu">Actualit&eacute;s</a>
        </li>

         <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-165">
        	<a href="<?php echo site_url($ctrl.'/accueil') ?>#communiques">Communiqu&eacute;s</a>
        </li>

        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-165">
        	<a href="<?php echo site_url($ctrl.'/accueil') ?>#med">Phototh&egrave;que</a>
        </li>

        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-166">
        	<a href="<?php echo site_url($ctrl.'/accueil') ?>#med">Vidéothèque</a>
        </li>

        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-167">
        	<a href="<?php echo site_url($ctrl.'/accueil') ?>#doc">Documentation</a>
        </li>

        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-168">
        	<a href="<?php echo site_url($ctrl.'/accueil') ?>#publ">Publications</a>
        </li>
    </ul>
</div>

</div>
</div>
<!--footer 1: fin contenu 2 PLAN DU SITE-->

<!--footer 1: debut contenu 3 LIENS UTILES-->
<div class="col-xs-12  col-md-3">
<div class="widget  widget_nav_menu  push-down-30">

<h6 class="footer__headings titrix">LIENS UTILES</h6>

<div class="menu-top-menu-container" style="text-transform:uppercase; text-align:justify; padding-left:4px;">
    <ul id="menu-top-menu-1" class="menu libix" >

       <!--site de l'IGF-->
          <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-167">
          <a href="http://www.finances.gouv.ci/" class="" style="color:#000000;" target="_blank"> Ministère de l'Economie et des Finances</a>
        </li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-167">
          <a href="https://www.fonctionpublique.gouv.ci" class="" style="color:#000000;" target="_blank"> Ministère de la Fonction Publique</a>
        </li>

        <!--site de l'DGE-->
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-168">
          <a href="http://www.igf.finances.gouv.ci/" class="" style="color:#000000;" target="_blank">Inspection Générale des Finances</a></li>

        <!--site de l'DGTCP-->
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-167">
          <a href="http://www.tresor.gouv.ci/" class="" style="color:#000000;" target="_blank">  Direction G&eacute;n&eacute;rale du Tr&eacute;sor et de la Comptabilité Publique</a>
        </li>

        <!--site de l'DGI-->
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-168">
          <a href="http://www.dgi.gouv.ci/" class="" style="color:#000000;" target="_blank">  Direction G&eacute;n&eacute;rale des Impôts</a>
        </li>

         <!--site de la DGD-->
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-168">
          <a href="http://www.douanes.ci/" class="" style="color:#000000;" target="_blank">  Direction G&eacute;n&eacute;rale des Douanes</a>
        </li>

        <!--site de la DGBF-->
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-169">
          <a href="http://www.dgbf.gouv.ci/" style="color:#000000;" target="_blank">  Direction G&eacute;n&eacute;rale du Budget et des Finances</a>
        </li>

        <!--site de la DGPE-->
        <!--site de la DAFP-->
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-168">
          <a href="http://www.daaf.finances.gouv.ci/" class="" style="color:#000000;" target="_blank">Direction des Affaires Financières et du Patrimoine</a>
        </li>

        <!--site de la DDAP-->

    </ul>
</div>

</div>
</div>
<!--footer 1: fin contenu 3 LIENS UTILES-->

<!--footer 1: debut contenu 4 SITES GOUVERNEMENTAUX-->
<div class="col-xs-12  col-md-3">
<div class="widget  widget_text  push-down-30">

<h6 class="footer__headings titrix">SITES WEB GOUVERNEMENTAUX</h6>

<div class="textwidget div_height" align="center">
      <?php include('annuaire.php'); ?>
</div>

</div>
</div>
<!--footer 1: fin contenu 4 SITES GOUVERNEMENTAUX-->

</div>
</div>
</div>
<!--fin footer 1-->

<!-- debut footer 2-->
<div class="footer-bottom" style="height:45px; background-color:#212121; font-size:13px; font-family: Oswald;">
<div class="container">
    <div class="footer-bottom__left footer-script">
        <!-- <a href="<?php echo site_url($ctrl.'/go_mfp_admin'); ?>" style="text-decoration:none; color:white;" accesskey="w" target="_blank">
        ©</a> --> <?php echo @date('Y') ?> - DRH - MEF, tous droits réservés.
    </div>

    <div class="footer-bottom__right">
    <div class="footer-script">
     <?php if ($tracabilite){
		 $date_trc = explode('-', $tracabilite['date_trace']);

		 echo 'Dernière mise à jour le :&nbsp;';
		 echo $date_trc[2].'-'.$date_trc[1].'-'.$date_trc[0];
		 echo ' à ';
		 echo $tracabilite['heure_trace'];
	 }?>
    </div>
    </div>
</div>
</div>
<!--fin footer 2-->


<!---->