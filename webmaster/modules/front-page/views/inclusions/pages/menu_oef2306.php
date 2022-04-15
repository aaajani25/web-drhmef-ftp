<?php
// url des pages à contenu statique
$urs = site_url($ctrl.'/statics/menu');

 $nav_en_cours='';
 $menu = $this->uri->segment(5);
 $other = $this->uri->segment(3);
 $other1 = $this->input->post('parent');

if($other=='contact' || $other1=='contact'){
	$nav_en_cours = 'rub8';
}
elseif($other=='logix' || $other=='demande_acte' || $other=='acte_signe' || $other=='non_engagement' || $other=='trt_demande_acte' || $other=='recu_non_engagement' || $other=='trt_acte_signe' || $other=='inscription' || $other=='password'){
$nav_en_cours = 'rub3';
}
else{
  switch($menu){
	case 'direction': $nav_en_cours = 'rub2';break;
	case 'service-offert': $nav_en_cours = 'rub3';break;
	case 'reforme': $nav_en_cours = 'rub4';break;
	case 'recrutement': $nav_en_cours = 'rub5';break;
	case 'sigfae': $nav_en_cours = 'rub6';break;
	case 'faq': $nav_en_cours = 'rub7';break;
	case 'contact': $nav_en_cours = 'rub8';break;
	default: $nav_en_cours = '';
  }
}
?>

<style type="text/css">
	.navigation--main > li > a{ font-family: Helvetica, Arial, sans-serif;color: black;
text-shadow: none;font-weight: bold;font-size: 12px;}
	.navigation--main .sub-menu > li > a{background-color:#FFFFFF; border-bottom:1px solid #C0C0C0; font-family: Helvetica, Arial, sans-serif;font-weight:100;}
	.navigation--main .sub-menu > li > a:hover{background-color:orange; color:#FFF}/*036D00*/
	.navigation--main .sub-menu > li > a:after{ color:#CCC;}

	#link_active{background-color:#orange; color:black; border-right:1px solid #64B57C; border-bottom:1px solid #ff8b26; text-shadow: none;}
	#link_active:hover{text-decoration:underline}
</style>

<ul id="menu-main-menu" class="navigation--main  js-dropdown menu_small">

	<!--1 ACCUEIL-->
    <li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-7 current_page_item menu-item-13">
    	<a href="<?php echo site_url($ctrl.'/accueil') ?>" <?php if ($nav_en_cours=='') {echo 'id="link_active"';} ?>>ACCUEIL</a>
    </li>

    <!--2 MINISTERE-->
    <li id="menu-item-175" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-175">
        <a href="#" <?php if ($nav_en_cours=='rub2') {echo 'id="link_active"';} ?> id="pre">PRESENTATION</a>

    <ul class="sub-menu">
            <li id="menu-item-65" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-65">
            	<a href="<?php echo $urs; ?>/direction/historique-direction">Historique</a>
            </li>

            <li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80 ">
           	<a href="<?php echo $urs; ?>/direction/missions-direction">Missions</a>            </li>

            <li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79 ">
            <a href="<?php echo $urs; ?>/direction/organisation-direction">Organisation</a>
            <li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
            	<a href="<?php echo $urs; ?>/default/orga">Organigramme</a>
             </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499"><a href="<?php echo $urs; ?>/default/regl_int">Règlement intérieur</a></li>
            <li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80 ">
           	<a href="<?php echo $urs; ?>/direction/stats-direction">Statistiques</a></li>

     </ul>

    </li>

     <!--3 service offert-->
    <li id="menu-item-51" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-51">
          <a href="#" <?php if ($nav_en_cours=='rub3') {echo 'id="link_active"';} ?>>PLANS D'ACTIONS</a>

        <ul class="sub-menu">
            <li id="menu-item-65" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-65"><a href="<?php echo site_url(); ?>front-page/navigator/affiche_pdf/pas_mef_2017_2020.pdf">PAS MEF 2017-2020</a>
            </li>

            <li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80"><a href="#">PAO DRH</a>
                <ul class="sub-menu">
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a a href="<?php echo site_url(); ?>front-page/navigator/affiche_pdf/pas_drh_2017.pdf">PAO 2017</a>
                  </li>
                   <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a a href="<?php echo site_url(); ?>front-page/navigator/affiche_pdf/pas_drh_2018.pdf">PAO 2018</a>
                  </li>
                </ul>
            </li>

            <li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79" menu-item-has-children><a href="#">EXECUTION PAO DRH</a>

			 <ul class="sub-menu">

                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499 menu-item-has-children">
                    	<a href="#">2017</a>

                        <ul class="sub-menu">

                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a a href="<?php echo $urs; ?>/pas/pas-2017-edsi">Etude diagnostic du système integré</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a href="<?php echo $urs; ?>/pas/pas-2017-pform">Plan de formation</a>
                            </li>
                            <!--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a href="?id=pao_2">Politique sociale
									</a></li>-->
                             <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a href="<?php echo $urs; ?>/pas/pas-2017-ethique">Ethique  et  Déontologie</a>
                            </li>
                            <!--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a href="?id=pao_5">Certification de la DRH</a>
                            </li>-->

						</ul>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499 menu-item-has-children">
                    	<a href="#">2018</a>

                        <ul class="sub-menu">

                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a href="<?php echo $urs; ?>/pas/pas-2018-gespers"">Vulgarisation de GESPERS</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a href="<?php echo $urs; ?>/pas/pas-2018-pform">Politique de formation</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a href="<?php echo $urs; ?>/pas/pas-2018-psocial">Politique sociale
									</a>
                             <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a href="<?php echo $urs; ?>/pas/pas-2018-ethique">Ethique et  déontologie</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                <a href="<?php echo $urs; ?>/pas/pas-2018-certif">Certification de la DRH</a>
                            </li>

                        </ul>

                    </li>
				</ul>
            </li>
        </ul>
    </li>

    <!--5 RECRUTEMENT-->
    <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-12">
      <a href="#" <?php if ($nav_en_cours=='rub5') {echo 'id="link_active"';} ?>>ETHIQUE ET DEONTOLOGIE</a>
      <ul class="sub-menu">
        <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-59 "><a href="<?php echo $urs; ?>/ethique/ethique_deonto">Ethique et déontologie</a></li>
            <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-59"><a href="<?php  echo $urs; ?>/ethique/code_deonto">Code de déontologie</a></li>
            <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-59"><a href="<?php  echo $urs; ?>/ethique/charte_ethique">Charte d'éthique</a></li>
            <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-59"><a href="<?php echo $urs; ?>/ethique/docref_deonto" >Documents de référence</a></li>
            <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-59"><a href="<?php  echo $urs; ?>/ethique/guide_plainte" >Guide des plaintes et réclamations</a></li>
            <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-59"><a href="<?php echo site_url('front-page/navigator'); ?>/identification/eth">Formulaire de plaintes et réclamations</a></li>
            <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-59"><a href="<?php echo $urs; ?>/ethique/contact_deonto">Contactez le Service de l’Ethique et de la Déontologie</a></li>


            <!--<li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80"><a href="#">Demande d'acte de non engagement</a></li>

            <li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79"><a href="#">Actes sign&eacute;s</a></li>

            <li id="menu-item-65" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-65"><a href="#">Retraite / Radiation</a></li>!-->

        </ul>

  </li>


  <!--6 SIGFAE-->
   <li id="menu-item-414" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-414">
    <a href="#" <?php if ($nav_en_cours=='rub6') {echo 'id="link_active"';} ?>>QUALITE</a>
    <ul class="sub-menu">
                	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                    	<a href="<?php  echo $urs; ?>/qualite/polit_qualite">Politique qualité</a>
                    </li>

                 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                    	<a href="<?php echo $urs; ?>/default/construction">Référentiel des engagements de service</a>

                 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                    	<a href="<?php echo site_url('front-page/navigator'); ?>/identification/qs">Ecoute client</a>
                    </li>
            	</ul>
</li>

  <!--8 CONTACT-->
     <li id="menu-item-414" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-414">

    <a href="#" <?php if ($nav_en_cours=='rub8' || $this->uri->segment(3)=='contact') {echo 'id="link_active"'; $nav_en_cours='rub8';} ?>>SERVICES EN LIGNE </a>
         <ul class="sub-menu">
            <li id="menu-item-65" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-65"><a href="<?php  echo $urs; ?>/eservices/livret_acc">Livret d'accueil</a></li>


            <li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80"><a href="<?php echo site_url($ctrl.'/accueil') ?>#esp">Espace Agent</a></li>

            <li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79"><a href="<?php echo site_url($ctrl.'/accueil') ?>#esp">Demande d'actes</a></li>

            <li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79"><a href="<?php echo $urs; ?>/default/construction" >GESPERS</a></li>

</ul>

    </li>

   <!--ENA-->
    <li id="menu-item-176" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-176 menu-item-has-children">
      <a href="#">MEDIATHEQUE</a>

      <ul class="sub-menu">
            <li id="menu-item-65" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-65"><a href="<?php echo $urs; ?>/mediatheque/media_documentation" >Documentation</a></li>

            <li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80"><a href="<?php echo site_url($ctrl.'/accueil') ?>#med" >Photothèque</a></li>

            <li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79"><a href="<?php echo site_url($ctrl.'/accueil') ?>#med" >Vidéothèque</a></li>

</ul>
  </li>
      <li id="menu-item-176" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-176 menu-item-has-children">
      <a href="<?php echo $urs; ?>/faq/faq">FAQ</a>
      </li>
      <li id="menu-item-176" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-176 menu-item-has-children">
      <a href="<?php echo site_url(); ?>/front-page/navigator/contact">NOUS CONTACTER</a>
      </li>

</ul>
