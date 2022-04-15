<?php
	switch($this->uri->segment(2)){
		case 'navigator': $model = 'nav_mod'; break;
		case 'espace_fonctionnaire': $model = 'espace_mod'; break;
	}

	// le controlleur
	$ctrl = $this->uri->segment(1).'/'.$this->uri->segment(2);

		// banniere
            $banniere = $this->$model->read_row_l
                (
                    '_banniere',
                    array('etat' => 'on'),
                    array('id','desc'),
                    1
                );
            // -- banniere

 	// tracabilite
	$tracabilite = $this->$model->read_row_l
	(
		'tracabilite',
		array('lib_trace !=' => ''),
		array('id_trace','desc'),
		1
	);
// -- tracabilite

// compteur de visite
	$compteur = $this->$model->compteur();
// -- compteur

 // ministre
            $ministre = $this->$model->read_row_l
                (
                    '_ministre',
                    array('etat' => 'on'),
                    array('id','desc'),
                    1
                );
            // -- ministre

// flash info
            $flash_info = $this->$model->read_result
                (
                    '_flashinfo',
                    array('etat' => 'on'),
                    array('urgent','desc'),
                    10
                );
            // -- flash info

 // logo
	$logo = $this->$model->read_row_l
	(
		'_logo',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- logo

// armoirie
	$armoirie = $this->$model->read_row_l
	(
		'_armoirie',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- armoirie

 // annuaire
	$annuaire = $this->$model->read_row_l
	(
		'_annuaire',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- annuaire

// sondage
	$q_sondage = $this->$model->read_row
		(
			'sondage_fonctionnaire',
			array('sondage_en_cour' => 'v')
		);

	$r_sondage = $this->$model->do_join_limit
		(
			// select
			array('reponse_fonctionnaire'.".lib_reponse"),
			// from
			'sondage_fonctionnaire',
			// join
			array(
				array('reponse_fonctionnaire','reponse_fonctionnaire'.".id_sondage=".'sondage_fonctionnaire'.".id_sondage","inner")
			),
			// where
			array('sondage_fonctionnaire'.'.sondage_en_cour' => 'v'),
			// order by
			array('sondage_fonctionnaire'.".id_sondage",'desc'),
			// limit
			3
		);
// -- sondage
?>
<!DOCTYPE html>
<html idmmzcc-ext-docid="1659604992" style="" class="js flexbox no-touch slb pt-pb-closed" lang="fr-FR">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<!--<meta http-equiv="Refresh" content="1000">-->
<meta http-equiv="Pragma" content="no-cache">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="pingback" href="">

<title><?php echo $logo['titre'] ?>&nbsp;- Côte d'Ivoire</title>

<meta name="robots" content="noodp,noydir">
<meta name="description" content="">
<link rel="canonical" href="">
<script src="<?php echo base_url('assets/') ?>/css/analytics.js"></script>

<!--phototheque-->
<link href="<?php echo base_url('assets/') ?>/css/lightgallery.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/jquery.fancybox.min.css">
<script src="<?php echo base_url('assets/') ?>/js/ajax.js"></script>
<!--phototheque-->

<!--<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"WebSite","name":"BuildPress","url":"https:\/\/demo.proteusthemes.com\/"}</script>

<link rel="dns-prefetch" href="https://fonts.googleapis.com/">
<link rel="dns-prefetch" href="https://s.w.org/">-->

<!--slide com-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/slide_com1.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/slide_com2.css" />
<script language="javascript" type="text/javascript" src="<?php echo base_url('assets/') ?>/css/mootools.svn.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url('assets/') ?>/css/lofslidernews.mt11.js"></script>
<!--slide com-->

<!--jquery-->
<!--<script src="<?php //echo base_url('assets/') ?>/css/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php //echo base_url('assets/') ?>/css/jquery.min.js" type="text/javascript"></script>-->
<!--jquery-->

<!--<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/demo.proteusthemes.com\/buildpress\/wp-includes\/js\/wp-emoji-release.min.js"}};
			!function(a,b,c){function d(a){var c,d,e,f,g,h=b.createElement("canvas"),i=h.getContext&&h.getContext("2d"),j=String.fromCharCode;if(!i||!i.fillText)return!1;switch(i.textBaseline="top",i.font="600 32px Arial",a){case"flag":return i.fillText(j(55356,56806,55356,56826),0,0),!(h.toDataURL().length<3e3)&&(i.clearRect(0,0,h.width,h.height),i.fillText(j(55356,57331,65039,8205,55356,57096),0,0),c=h.toDataURL(),i.clearRect(0,0,h.width,h.height),i.fillText(j(55356,57331,55356,57096),0,0),d=h.toDataURL(),c!==d);case"diversity":return i.fillText(j(55356,57221),0,0),e=i.getImageData(16,16,1,1).data,f=e[0]+","+e[1]+","+e[2]+","+e[3],i.fillText(j(55356,57221,55356,57343),0,0),e=i.getImageData(16,16,1,1).data,g=e[0]+","+e[1]+","+e[2]+","+e[3],f!==g;case"simple":return i.fillText(j(55357,56835),0,0),0!==i.getImageData(16,16,1,1).data[0];case"unicode8":return i.fillText(j(55356,57135),0,0),0!==i.getImageData(16,16,1,1).data[0];case"unicode9":return i.fillText(j(55358,56631),0,0),0!==i.getImageData(16,16,1,1).data[0]}return!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i;for(i=Array("simple","flag","unicode8","diversity","unicode9"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>-->

<script src="<?php echo base_url('assets/') ?>/css/wp-emoji-release.js" type="text/javascript"></script>

<style type="text/css">img.wp-smiley,img.emoji{display:inline!important;border:none!important;box-shadow:none!important;height:1em!important;width:1em!important;margin:0 .07em!important;vertical-align:-0.1em!important;background:none!important;padding:0!important;}</style>

<link rel="stylesheet" id="siteorigin-panels-front-css" href="<?php echo base_url('assets/') ?>/css/front.css" type="text/css" media="all">
<link rel="stylesheet" id="contact-form-7-css" href="<?php echo base_url('assets/') ?>/css/styles.css" type="text/css" media="all">
<link rel="stylesheet" id="essential-grid-plugin-settings-css" href="<?php echo base_url('assets/') ?>/css/settings.css" type="text/css" media="all">
<link rel="stylesheet" id="mediaelement-css" href="<?php echo base_url('assets/') ?>/css/mediaelementplayer.css" type="text/css" media="all">
<link rel="stylesheet" id="wp-mediaelement-css" href="<?php echo base_url('assets/') ?>/css/wp-mediaelement.css" type="text/css" media="all">
<link rel="stylesheet" id="fvp-frontend-css" href="<?php echo base_url('assets/') ?>/css/frontend.css" type="text/css" media="all">

<link rel="stylesheet" id="woocommerce-layout-css" href="<?php echo base_url('assets/') ?>/css/woocommerce-layout.css" type="text/css" media="all">
<link rel="stylesheet" id="woocommerce-smallscreen-css" href="<?php echo base_url('assets/') ?>/css/woocommerce-smallscreen.css" type="text/css" media="only screen and (max-width: 767px)">
<link rel="stylesheet" id="woocommerce-general-css" href="<?php echo base_url('assets/') ?>/css/woocommerce.css" type="text/css" media="all">

<link rel="stylesheet" id="ptss-style-css" href="<?php echo base_url('assets/') ?>/css/pt-style-switcher.css" type="text/css" media="all">
<link rel="stylesheet" id="buildpress-main-css" href="<?php echo base_url('assets/') ?>/css/style_003.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo base_url('assets/') ?>/css/style_xy.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo base_url('assets/') ?>/css/style_zz.css" type="text/css" media="all">

<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,100,300,300italic,100italic,400italic,600,600italic,700,700italic" rel="stylesheet" type="text/css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

<link href='https://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto%3A700%7COpen+Sans%3A400%2C700&#038;subset=latin" type="text/css" media="all"/>
<!-- google font -->

<style id="buildpress-main-inline-css" type="text/css">
/*.top{background:#333333 linear-gradient(to bottom,#333333,#2b2b2b);}
.top{border-bottom-color:#4d4d4d;}*/
/*.top,.top a,.navigation--top>.menu-item-has-children>a::after{color:#999999;}*/
/*.header{ background-color:linear-gradient(60deg, white, #F7941E);}*/
.icon-box__title,.widget-icon-box .icon-box:hover .fa{color:#000000;}
.icon-box__subtitle,.widget-icon-box .icon-box,.textwidget{color:#989898;}
@media (min-width: 992px) {
	.navigation{background:#ffffff linear-gradient(to bottom,#ffffff,#ededed);}
	}
.navigation--main>li>a,.navigation--main>.menu-item-has-children>a::after,.navigation--main .sub-menu>li>a{color:#333333;}
.navigation--main>li:hover>a,.navigation--main>.menu-item-has-children:hover>a::after,.navigation--main .sub-menu>li:hover>a{color:#333333;}
@media (min-width: 992px) {.navigation--main>li>a,.navigation--main>.menu-item-has-children>a::after{
	color: #000000;
	text-shadow: 0px 1px 1px rgba(0,0,0,0.62);
	font-size: 14px;
	}}
@media (min-width: 992px) {.navigation--main>li:hover>a,.navigation--main>.menu-item-has-children:hover>a::after{color:#333333; text-shadow:none;}}
@media (min-width: 992px) {.navigation--main .sub-menu>li>a,.navigation--main .sub-menu>li>a:hover,.navigation--main .sub-menu>.menu-item-has-children>a::after{color:#333333;}}.main-title{background-color:#f2f2f2;}
.main-title{background-image:url("css/title-area-pattern.png");}
.main-title h1{color:#333333;}.breadcrumbs{background-color:#ffffff;}
.breadcrumbs a{color:#666666;}.breadcrumbs a:hover{color:#595959;}
.breadcrumbs{color:#999999;}
.jumbotron__category h6,.social-icons__link,.testimonial__rating,body.woocommerce-page .star-rating,body.woocommerce-page ul.products li.product a:hover img,body.woocommerce-page p.stars a,.navigation--top>li>a:hover,.navigation--top>li:hover>a::after,.navigation--top .sub-menu>li>a:hover,.navigation--top>li:hover>a,.widget_pt_icon_box .icon-box>.fa,html body.woocommerce-page nav.woocommerce-pagination ul li .next:hover,html body.woocommerce-page nav.woocommerce-pagination ul li .prev:hover{color:#f7c51e;}
.jumbotron__category::after,.alternative-heading::after,.navbar-toggle,#comments-submit-button,.btn-primary,.btn-primary:focus,.panel-grid .wpb-js-composer .wpb_wrapper .widget-title::after,.footer .footer__headings::after,.main-title h3::before,.hentry__title::after,.widget_search .search-submit,.pagination li .current,.pagination li:hover,.sidebar__headings::after,.sidebar .widget_nav_menu ul li.current-menu-item>a,.sidebar .widget_nav_menu ul li>a:hover,.widget_calendar caption,.widget_tag_cloud a,body.woocommerce-page .widget_product_search #searchsubmit,body.woocommerce-page span.onsale,body.woocommerce-page ul.products::before,body.woocommerce-page nav.woocommerce-pagination ul li span.current,body.woocommerce-page nav.woocommerce-pagination ul li a:hover,body.woocommerce-page a.add_to_cart_button:hover,body.woocommerce-page button.button:hover,body.woocommerce-page .widget_product_categories ul>li>a:hover,body.woocommerce-page a.button:hover,body.woocommerce-page input.button:hover,body.woocommerce-page table.cart td.actions input.button.alt,body.woocommerce-page .cart-collaterals .shipping_calculator h2::after,body.woocommerce-page .cart-collaterals .cart_totals h2::after,body.woocommerce-page .woocommerce-info,body.woocommerce-page .woocommerce-message,body.woocommerce-page .woocommerce-error,body.woocommerce-page #payment #place_order,body.woocommerce-page .short-description::before,body.woocommerce-page .short-description::after,body.woocommerce-page .quantity .minus:hover,body.woocommerce-page .quantity .plus:hover,body.woocommerce-page button.button.alt,body.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,body.woocommerce-page #review_form #respond input#submit,body.woocommerce-page div.product .woocommerce-tabs h2::after,.buildpress-table thead th,.brochure-box:hover,body.woocommerce-page .widget_product_search .search-field+input,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt:disabled[disabled],.woocommerce button.button.alt:disabled[disabled]:hover,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,body .buildpress-light .esg-filterbutton:hover,body .buildpress-light .esg-sortbutton:hover,body .buildpress-light .esg-sortbutton-order:hover,body .buildpress-light .esg-cartbutton-order:hover,body .buildpress-light .esg-filterbutton.selected{background-color:#ff8b26;}
@media (min-width: 992px) {.header-light .navigation--main>.current-menu-item>a,.header-light .navigation--main>.current-menu-ancestor>a,.navigation--main .sub-menu>li>a{background-color:#f7c51e;}}
.btn-primary,.btn-primary:focus,.logo-panel img:hover,blockquote,#comments-submit-button,.navigation--main>li:hover>a,body .buildpress .esg-navigationbutton:hover span,body .buildpress .esg-filterbutton:hover span,body .buildpress .esg-sortbutton:hover span,body .buildpress .esg-sortbutton-order:hover span,body .buildpress .esg-cartbutton-order:hover span,body .buildpress .esg-filterbutton.selected span,body .buildpress-light .esg-navigationbutton:hover span,body .buildpress-light .esg-filterbutton:hover span,body .buildpress-light .esg-sortbutton:hover span,body .buildpress-light .esg-sortbutton-order:hover span,body .buildpress-light .esg-cartbutton-order:hover span,body .buildpress-light .esg-filterbutton.selected span{border-color:#ff8b26;}
@media (min-width: 992px) {.header-light .navigation--main>li.is-hover>a,.header-light .navigation--main>li:hover>a{border-color:#f7c51e;}}
.social-icons__link:hover{color:#ff8b26;}

.navbar-toggle:hover,.btn-primary:hover,.btn-primary:active,.widget_search .search-submit:hover,#comments-submit-button:hover,.widget_tag_cloud a:hover,body.woocommerce-page .widget_product_search #searchsubmit:hover,body.woocommerce-page .widget_product_search #searchsubmit:focus,body.woocommerce-page table.cart td.actions input.button.alt:hover,body.woocommerce-page #payment #place_order:hover,body.woocommerce-page button.button.alt:hover,body.woocommerce-page #review_form #respond input#submit:hover,body.woocommerce-page .widget_product_search .search-field+input:hover,body.woocommerce-page .widget_product_search .search-field+input:focus,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover{background-color:#FFFFFF; color:#ff8b26;}

@media (min-width: 992px) {.navigation--main .sub-menu>li>a:hover{background-color:#FFFFFF;}}

.btn-primary:hover,.btn-primary:active,#comments-submit-button:hover{border-color:#ff8b26;}

body .eg-buildpress-item-skin-element-0,body .eg-buildpress-item-skin-element-0:hover{background:#ff8b26!important;}
a{color:#008000;}

a:hover,.more-link .btn:hover{color:#1098cb;}

body,.textwidget{color:#666666;}

#comments-submit-button,.btn-primary,.btn-primary:focus,.footer .btn-primary,.sidebar .widget_nav_menu ul>li.current-menu-item a,.sidebar .widget_nav_menu li.current-menu-ancestor a,.widget_tag_cloud a,.pagination li .current,.widget_search .search-submit{color:#454545;}
#comments-submit-button:hover,.btn-primary:hover,.btn-primary:active,.footer .btn-primary:hover,.sidebar .widget_nav_menu ul>li a:hover,.sidebar .widget_nav_menu ul>li.current-menu-item a:hover,.widget_tag_cloud a:hover,.pagination li:hover a,body.woocommerce-page .woocommerce-message,body.woocommerce-page nav.woocommerce-pagination ul li span.current,body.woocommerce-page button.button.alt,body.woocommerce-page table.cart td.actions input.button.alt,body.woocommerce-page button.button.alt:hover,body.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a,body.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a:hover,body.woocommerce-page nav.woocommerce-pagination ul li .prev:hover,body.woocommerce-page nav.woocommerce-pagination ul li .next:hover,body.woocommerce-page a.add_to_cart_button:hover,body.woocommerce-page a.button:hover,body.woocommerce-page input.button:hover,body.woocommerce-page nav.woocommerce-pagination ul li a:hover,body.woocommerce-page .woocommerce-info,body.woocommerce-page #payment #place_order,body.woocommerce-page .widget_product_categories ul>li>a:hover,body.woocommerce-page .widget_product_search #searchsubmit,body.woocommerce-page #review_form #respond input#submit,body.woocommerce-page button.button:hover,body.woocommerce-page .woocommerce-error .showlogin,body.woocommerce-page .woocommerce-error .showcoupon,body.woocommerce-page .woocommerce-info .showlogin,body.woocommerce-page .woocommerce-info .showcoupon,body.woocommerce-page .woocommerce-message .showlogin,body.woocommerce-page .woocommerce-message .showcoupon,body.woocommerce-page .woocommerce-error::before,body.woocommerce-page .woocommerce-info::before,body.woocommerce-page .woocommerce-message::before{color:#333333;}
/*.footer{background-color:#f2f2f2;}*/
/*.footer{background-image:url("css/title-area-pattern.png");}*/
.footer__headings{color:#3d3d3d;}.footer{color:#666666;}
.footer a{color:#1fa7da;}
.footer a:hover{color:#0074a7;}
.footer-bottom{background-color:#6fcc20;}
.footer-bottom{color:#FFFFFF;}
.footer-bottom a{color:#666666;}
.footer-bottom a:hover{color:#333333;}
.slb_details{display:none;}
</style>

<link rel="stylesheet" id="slb_core-css" href="<?php echo base_url('assets/') ?>/css/app.css" type="text/css" media="all">
<link rel="stylesheet" id="pt-pb-style-css" href="<?php echo base_url('assets/') ?>/css/style_004.css" type="text/css" media="all">
<!--<script type="text/javascript" src="<?php //echo base_url('assets/') ?>/css/jquery.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/jquery-migrate.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/lightbox.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/jquery_005.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/jquery_002.js"></script>
<!--<script type="text/javascript">
/* <![CDATA[ */
var mejsL10n = {"language":"en-US","strings":{"Close":"Close","Fullscreen":"Fullscreen","Turn off Fullscreen":"Turn off Fullscreen","Go Fullscreen":"Go Fullscreen","Download File":"Download File","Download Video":"Download Video","Play":"Play","Pause":"Pause","Captions\/Subtitles":"Captions\/Subtitles","None":"None","Time Slider":"Time Slider","Skip back %1 seconds":"Skip back %1 seconds","Video Player":"Video Player","Audio Player":"Audio Player","Volume Slider":"Volume Slider","Mute Toggle":"Mute Toggle","Unmute":"Unmute","Mute":"Mute","Use Up\/Down Arrow keys to increase or decrease volume.":"Use Up\/Down Arrow keys to increase or decrease volume.","Use Left\/Right Arrow keys to advance one second, Up\/Down arrows to advance ten seconds.":"Use Left\/Right Arrow keys to advance one second, Up\/Down arrows to advance ten seconds."}};
var _wpmejsSettings = {"pluginPath":"\/buildpress\/wp-includes\/js\/mediaelement\/"};
/* ]]> */
</script>-->
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/mediaelement-and-player.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/wp-mediaelement.js"></script>
<!--<script type="text/javascript" src="<?php //echo base_url('assets/') ?>/css/jquery_003.js"></script>-->

<!--MEDIATHEQUES-->
<script type="text/javascript">
/* <![CDATA[ */
var fvpdata = {"ajaxurl":"https:\/\/demo.proteusthemes.com\/buildpress\/wp-admin\/admin-ajax.php","nonce":"28f54b848d","fitvids":"1","dynamic":"1","overlay":"","opacity":"0.75","color":"b","width":"640"};
/* ]]> */
</script>
<!--MEDIATHEQUES-->

<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/frontend.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/modernizr.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/respimage.js"></script>


<!--[if lt IE 9]>
			<script src="<?php echo base_url('assets/') ?>/css/html5shiv.min.js"></script>
			<script src="<?php echo base_url('assets/') ?>/css/respond.min.js"></script>
		<![endif]-->

<link rel="shortcut icon" href="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>">

<style type="text/css" media="all" id="siteorigin-panels-grids-wp_head">
#flash_info {width:73.666%;}
#flash_info a{color:#F00;}
#flash_info a:hover{}

#pg-7-0{margin-bottom:30px;}
/*#pg-7-1{}*/

#pg-7-1,#pgx-7-1,#pg-7-2,#pg-7-3, #pg-7-3-b3-l1,#pg-7-4x,#pg-7-4y, #pl-7 .panel-grid-cell .so-panel{margin-bottom:30px}
#pg-7-0 .panel-grid-cell,#pg-7-2 .panel-grid-cell,#pg-7-4 .panel-grid-cell,#pg-7-5 .panel-grid-cell,#pg-7-6 .panel-grid-cell{float:none}

#pgc-7-1-0,#pgcy-7-1-0,#pgc-7-1-0x,#pgc-7-1-0y,#pgc-7-1-1y,#pgc-7-1-2y,#pgc-7-1-1x,#pgc-7-1-2x,#pgc-7-1-1,#pgcy-7-1-1,#pgc-7-1-2,#pgcy-7-1-2,#pg-7-3-b3-l1-c1,#pg-7-3-b3-l1-c2,#pg-7-3-b3-l1-c3{width:33.333%}

#pg-7-3-b3-l1-c1,#pg-7-3-b3-l1-c2,#pg-7-3-b3-l1-c3{padding-bottom:20px; height:500px;}

#pg-7-3-b3-l1{color:#FFFFFF}

#pg-7-3-b3-l1-c1{background-color:#47975F;}
#pg-7-3-b3-l1-c2{ background-color:#F1F1F1;}
#pg-7-3-b3-l1-c3{background-color:#3b5998;}

@media (max-width:800px){
	#pg-7-3-b3-l1-c1, #pg-7-3-b3-l1-c2, #pg-7-3-b3-l1-c3{padding-top:1px; height:auto;}
}

#pgcx-7-1-0{width:80%;}
#pgcx-7-1-2{width:20%;}

@media (min-width:640px){
	.esp_fon{padding:10px; box-shadow:2px 0px 4px #CCCCCC;}

}

.champ_de_saisie{width:97%; height:40px; padding-left:4px}

#pg-7-1 .panel-grid-cell, #pgx-7-1 .panel-grid-cell, #pg-7-3 .panel-grid-cell, #pg-7-3-b3-l1 .panel-grid-cell,#pg-7-4x .panel-grid-cell, #pg-7-4y .panel-grid-cell{float:left}

@media (min-width:800px){
	#pgc-7-3-0{width:66.666%;}
	#pgc-7-3-1{width:33.333%;}
}

#pgc-7-3-0-b3-l1-c1, #pgc-7-3-0-b3-l1-c2, #pgc-7-3-0-b3-l1-c3{width:33.333%;}

#pl-7 .panel-grid-cell .so-panel:last-child{margin-bottom:0px}

/*#pg-7-4,#pg-7-3-b3-l1{margin:5px 0px;}*/

/*#pg-7-5{margin:5px 0px}*/

#pg-7-0,#pg-7-1,#pg-7-4x,#pg-7-4y,#pgx-7-1,#pg-7-2,#pg-7-3,#pg-7-3-b3-l1,#pg-7-4,#pg-7-5,#pg-7-6{margin-left:-15px;margin-right:-15px}
#pg-7-0 .panel-grid-cell,#pg-7-1 .panel-grid-cell,#pg-7-4x .panel-grid-cell,#pg-7-4y .panel-grid-cell,#pgx-7-1 .panel-grid-cell, #pg-7-2 .panel-grid-cell,#pg-7-3 .panel-grid-cell,#pg-7-4 .panel-grid-cell,#pg-7-5 .panel-grid-cell,#pg-7-6 .panel-grid-cell, #pg-7-3-b3-l1 .panel-grid-cell{padding-left:15px;padding-right:15px}
@media (max-width:780px){
#pg-7-0 .panel-grid-cell,#pg-7-1 .panel-grid-cell,#pg-7-4x .panel-grid-cell,#pg-7-4y .panel-grid-cell,#pgx-7-1 .panel-grid-cell, #pg-7-2 .panel-grid-cell,#pg-7-3 .panel-grid-cell,#pg-7-4 .panel-grid-cell,#pg-7-5 .panel-grid-cell,#pg-7-6 .panel-grid-cell, #pg-7-3-b3-l1 .panel-grid-cell{float:none;width:auto}
#pgc-7-1-0,#pgc-7-1-0x,#pgc-7-1-0y,#pgc-7-1-1y,#pgc-7-1-2y,#pgc-7-1-1x,#pgc-7-1-2x,#pgcx-7-1-0,#pgcy-7-1-0,#pgcx-7-1-1,#pgcx-7-1-2,#pgc-7-1-1,#pgcy-7-1-1,#pgc-7-3-0,#pgc-7-3-0-b3-l1-c1,#pgc-7-3-0-b3-l1-c2,#pgc-7-3-0-b3-l1-c3{margin-bottom:30px}
#pl-7 .panel-grid,#pl-7 .panel-grid-cell{}#pl-7 .panel-grid .panel-grid-cell-empty{display:none}
#pl-7 .panel-grid .panel-grid-cell-mobile-last{margin-bottom:0px}}
</style>
<style type="text/css">
.esgbox-margin{margin-right:0px;}</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/css.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/style_002.css">

<style id="fit-vids-style">
.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}
.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}
</style>

<style>
	.voir-plus{margin-right:15px; margin-bottom:15px}
	._corps{background-color:#FFF;}
</style>



<script type="text/javascript" charset="UTF-8" src="<?php echo base_url('assets/') ?>/css/common.js"></script><script type="text/javascript" charset="UTF-8" src="<?php echo base_url('assets/') ?>/css/util.js"></script><script type="text/javascript" charset="UTF-8" src="<?php echo base_url('assets/') ?>/css/stats.js"></script>

<script>
 function go_mfpadmin(){
	 document.forms['frm_go_admin'].submit();
 }
</script>
<script type="text/javascript">
	$("[data-fancybox]").fancybox({
		// Animation duration in ms
		speed : 330,

		// Enable infinite gallery navigation
		loop : true,

		// Should zoom animation change opacity, too
		// If opacity is 'auto', then fade-out if image and thumbnail have different aspect ratios
		opacity : 'auto',

		// Space around image, ignored if zoomed-in or viewport smaller than 800px
		margin : [44, 0],

		// Horizontal space between slides
		gutter : 30,

		// Should display toolbars
		infobar : true,
		buttons : true,

		// What buttons should appear in the toolbar
		slideShow  : true,
		fullScreen : true,
		thumbs     : true,
		closeBtn   : true,

		// Should apply small close button at top right corner of the content
		// If 'auto' - will be set for content having type 'html', 'inline' or 'ajax'
		smallBtn : 'auto',

		image : {

			// Wait for images to load before displaying
			// Requires predefined image dimensions
			// If 'auto' - will zoom in thumbnail if 'width' and 'height' attributes are found
			preload : "auto",

			// Protect an image from downloading by right-click
			protect : false

		},

		ajax : {

			// Object containing settings for ajax request
			settings : {

				// This helps to indicate that request comes from the modal
				// Feel free to change naming
				data : {
					fancybox : true
				}
			}

		},

		iframe : {

			// Iframe template
			tpl : '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',

			// Preload iframe before displaying it
			// This allows to calculate iframe content width and height
			// (note: Due to "Same Origin Policy", you can't get cross domain data).
			preload : true,

			// Scrolling attribute for iframe tag
			scrolling : 'no',

			// Custom CSS styling for iframe wrapping element
			css : {}

		},

		// Custom CSS class for layout
		baseClass : '',

		// Custom CSS class for slide element
		slideClass : '',

		// Base template for layout
		baseTpl	: '<div class="fancybox-container" role="dialog" tabindex="-1">' +
				'<div class="fancybox-bg"></div>' +
				'<div class="fancybox-controls">' +
					'<div class="fancybox-infobar">' +
						'<button data-fancybox-previous class="fancybox-button fancybox-button--left" title="Previous"></button>' +
						'<div class="fancybox-infobar__body">' +
							'<span class="js-fancybox-index"></span>&nbsp;/&nbsp;<span class="js-fancybox-count"></span>' +
						'</div>' +
						'<button data-fancybox-next class="fancybox-button fancybox-button--right" title="Next"></button>' +
					'</div>' +
					'<div class="fancybox-buttons">' +
						'<button data-fancybox-close class="fancybox-button fancybox-button--close" title="Close (Esc)"></button>' +
					'</div>' +
				'</div>' +
				'<div class="fancybox-slider-wrap">' +
					'<div class="fancybox-slider"></div>' +
				'</div>' +
				'<div class="fancybox-caption-wrap"><div class="fancybox-caption"></div></div>' +
			'</div>',

		// Loading indicator template
		spinnerTpl : '<div class="fancybox-loading"></div>',

		// Error message template
		errorTpl : '<div class="fancybox-error"><p>The requested content cannot be loaded. <br /> Please try again later.<p></div>',

		// This will be appended to html content, if "smallBtn" option is not set to false
		closeTpl : '<button data-fancybox-close class="fancybox-close-small"></button>',

		// Container is injected into this element
		parentEl : 'body',

		// Enable gestures (tap, zoom, pan and pinch)
		touch : true,

		// Enable keyboard navigation
		keyboard : true,

		// Try to focus on first focusable element after opening
		focus : true,

		// Close when clicked outside of the content
		closeClickOutside : true,

		// Callbacks; See Documentation/API/Events for description and samples
		beforeLoad	 : $.noop,
		afterLoad    : $.noop,
		beforeMove 	 : $.noop,
		afterMove    : $.noop,
		onComplete	 : $.noop,

		onInit       : $.noop,
		beforeClose	 : $.noop,
		afterClose	 : $.noop,
		onActivate   : $.noop,
		onDeactivate : $.noop
	});
</script>

  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/css/rwd.css" type="text/css" media="all">
  <link href="<?php echo base_url('assets/') ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<!-- bloc de transparence de l'en-tete de la pub -->
	<!--<div id="cover_body"></div>-->
<!-- fin -->

<body class="home page page-id-7 page-template page-template-template-front-page-slider page-template-template-front-page-slider-php siteorigin-panels siteorigin-panels-home pt-pb-loaded boxed esg-blurlistenerexists fixed-navigation">

<!--code facebook-->
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--code facebook-->

<!--Sendbox-->
    <!-- <div class="ptss-frame js-ptss-frame">
        <?php // include('inclusions/sendbox.php'); ?>
    </div>
<!--FIN Sendbox-->

<!--reseaux sociaux fixes-->
    <div id="rezo">
     <a href="https://www.facebook.com/drhmef" class="" target="_blank" title="Facebooksss">
     	 <div class="_link _fcbk">
         	<img src="<?php echo base_url('assets/css/icones-rs/ic_action_facebook.png') ?>" alt="fcbk" width="40" height="40">
         </div>
     </a>

     <!-- <a href="https://www.youtube.com/channel/UCQbklU20EGZUrTK1sps5w2A" class="" target="_blank" title="Vidéothèque"> -->
     	 <!-- <div class="_link _yt">
                  <img src="<?php //echo base_url('assets/css/icones-rs/ic_action_youtube.png') ?>" alt="video" width="40" height="40">
                </div> -->
     <!-- </a> -->

     <!-- <a href="https://twitter.com/FonctionCi" title="Twitter" target="_blank" class=""> -->
     	 <!-- <div class="_link _tw">
                  <img src="<?php //echo base_url('assets/css/icones-rs/ic_action_twitter.png') ?>" alt="tw" width="40" height="40">
                </div> -->
     <!-- </a> -->
    </div>
<!--reseaux sociaux-->


<!--flash info fixe-->
<?php if ($flash_info){ $nb = count($flash_info);	?>
    <div class="" id="tiv">
       <?php include('inclusions/accueil/flash.php'); ?>
    </div>
<?php }?>
<!--flash info-->

<!--########## BLOC GENERAL DE TOUT LE CONTENU ##########-->
<div class="boxed-container" id="global-container">
<!--EN TETE : logo, armoirie et menu-->
<!--<div id="header_1">
	  <?php //include('inclusions/header_1.php'); ?>
  </div>

  <div id="header_2">
	  <?php //include('inclusions/header_2.php'); ?>
  </div>-->

	<div id="header_3">
	  <?php include('inclusions/header.php'); ?>
  </div>
<!--FIN EN TETE-->

<!--################# CORPS / région modifiable : bloc 0 à 7 ################-->
    <div class="master-container">
        <div class="_small_t _corps">
          <?php include($conteneur.'.php');?>
        </div>
    </div>
<!--FIN CORPS-->

<!--FOOTER-->
    <footer role="contentinfo" style="background-color:#ff8b26;">
        <?php include('inclusions/pied_de_page.php'); ?>
    </footer>
<!--FIN FOOTER-->

<p>&nbsp;</p>

<!--########## FIN DU BLOC GENERAL DE TOUT LE CONTENU ##########-->
</div>
<!--########## FIN DU BLOC GENERAL DE TOUT LE CONTENU ##########-->

<script type="text/template" id="ptss-layout-tmpl">
			<div class="ptss__layout-wrapper  <%= isBoxed ? '' : 'is-selected' %>">
				<div class="ptss__layout-box  ptss__layout-box--wide"></div>
				Etendu
			</div>
			<div class="ptss__layout-wrapper  <%= isBoxed ? 'is-selected' : '' %>">
				<div class="ptss__layout-box  ptss__layout-box--boxed"></div>
				Centré
			</div>
</script>

<script type="text/template" id="ptss-nav-tmpl">
			<div class="ptss__nav-wrapper  <%- isSticky ? 'is-sticky' : '' %>">
				<div class="ptss__control-label  <%- isSticky ? '' : 'is-selected' %>">Normal</div>
				<div class="ptss__nav-switch"></div>
				<div class="ptss__control-label  <%- isSticky ? 'is-selected' : '' %>">Fixe</div>
			</div>
</script>

<script type="text/template" id="ptss-css-selectors-tmpl"></script>

<!--<script type="text/javascript" src="<?php //echo base_url('assets/') ?>/css/jquery_006.js"></script>
--><script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/underscore.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/backbone.js"></script>

<script type="text/javascript">
/* <![CDATA[ */
var ptssVars = {"siteId":"16","pathToPlugin":"https:\/\/demo.proteusthemes.com\/buildpress\/wp-content\/plugins\/js-style-swicher-buildpress\/"};
/* ]]> */
</script>

<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/frontend_002.js"></script>

<script type="text/javascript">
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/buildpress\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/buildpress\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View Cart","cart_url":"https:\/\/demo.proteusthemes.com\/buildpress\/shop\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>

<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/add-to-cart.js"></script>
<!--<script type="text/javascript" src="<?php //echo base_url('assets/') ?>/css/jquery_007.js"></script>-->

<script type="text/javascript">
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/buildpress\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/buildpress\/?wc-ajax=%%endpoint%%"};

/* ]]> */
</script>

<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/woocommerce.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/jquery_004.js"></script>

<script type="text/javascript">
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/buildpress\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/buildpress\/?wc-ajax=%%endpoint%%","fragment_name":"wc_fragments"};
/* ]]> */
</script>

<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/cart-fragments.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/js"></script>

<script type="text/javascript">
/* <![CDATA[ */
var BuildPressVars = {"pathToTheme":"https:\/\/demo.proteusthemes.com\/buildpress\/wp-content\/themes\/buildpress"};
/* ]]> */
</script>

<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/main.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/main_002.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/wp-embed.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var panelsStyles = {"fullContainer":"body"};
/* ]]> */
</script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/styling-24.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/lib.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/lib_002.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/client.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/client_002.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/tag.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/tag_002.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>/css/handler.js"></script>


<!--phototheque-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#lightgallery').lightGallery();
	});
</script>
<!--<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>-->
<script src="<?php echo base_url('assets/') ?>/css/lightgallery.js"></script>
<script src="<?php echo base_url('assets/') ?>/css/lg-fullscreen.js"></script>
<script src="<?php echo base_url('assets/') ?>/css/lg-thumbnail.js"></script>
<script src="<?php echo base_url('assets/') ?>/css/lg-video.js"></script>
<script src="<?php echo base_url('assets/') ?>/css/lg-autoplay.js"></script>
<script src="<?php echo base_url('assets/') ?>/css/lg-zoom.js"></script>
<script src="<?php echo base_url('assets/') ?>/css/lg-hash.js"></script>
<script src="<?php echo base_url('assets/') ?>/css/lg-pager.js"></script>
<script src="<?php echo base_url('assets/') ?>/css/jquery.mousewheel.min.js"></script>

<!--phototheque-->

 </div>

 <!--ajax de compteur-->
<script type="application/javascript">
 jQuery.noConflict();

 jQuery(document).ready(function() {
//gestion de l'espace agent
                
               
               jQuery("#devoileid").hide();
               jQuery("#nom").removeAttr('required');
               jQuery("#pnom").removeAttr('required');
               jQuery("#sexe").removeAttr('required');
               jQuery("#ville").removeAttr('required');
               jQuery("#devoileid").hide();
               
               jQuery("#identites").change(function(e){
		var val=jQuery("#identites").val();
                var ch=jQuery("#devoileid");
                
                

                if(val=="Oui"){
                  //ch.removeAttr('disabled');
                   ch.show();

                }
                else{
               jQuery("#nom").removeAttr('required');
               jQuery("#pnom").removeAttr('required');
               jQuery("#sexe").removeAttr('required');
               jQuery("#ville").removeAttr('required');
               jQuery("#devoileid").hide();
                  ch.hide();
                }
            //jquery du faq
  //pour la faq
   function toggleIcon(e) {

        $(e.target)
            .prev('.panel-heading')
            .find(".short-full")
            .toggleClass('.fa-plus .fa-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);


               });
    jQuery("#devoileacte1").hide();
    jQuery("#devoileacte2").hide();
    jQuery("#devoileacte3").hide();
    jQuery("#devoileacte4").hide();
    
    jQuery("#acte").change(function(e){
               
        var act=jQuery("#acte").val();
        
        var ch1=jQuery("#devoileacte1");
        var ch2=jQuery("#devoileacte2");
        var ch3=jQuery("#devoileacte3");
        var ch4=jQuery("#devoileacte4");
        
        if(act==6)
        {
          ch1.show(); 
          ch2.show();
          jQuery("#matri").attr( 'required',true );
            
        }
        else 
        {
          ch1.hide(); 
          ch2.hide(); 
           
        }
    });
                

   var form_data = {
    scren_x : jQuery(window).width(),
    scren_y : jQuery(window).height(),
    resol : (jQuery(window).width() * jQuery(window).height())/2.56,
    ajax : '1'
   };

   jQuery.ajax({
    url: "<?php echo site_url($ctrl.'/initTools'); ?>",
    type: 'POST',
    data: form_data,
    success: function(msg) {
        },
        error:function(XMLHttpRequest, textStatus, errorThrows){
        }
    });
    return false;


});
</script>
</body>
</html>