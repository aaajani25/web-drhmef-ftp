<?php if ($phototheque){ ?>
<!--mediatheques -->
<div id='med'>
<div class="panel-grid" id="pg-7-2">

<div class="siteorigin-panels-stretch panel-row-style" style="background-color:#ffff;" data-stretch-type="full">
<div class="panel-grid-cell" id="pgc-7-2-0">
<div class="so-panel widget widget_ess-grid-widget widget_ess_grid panel-first-child panel-last-child" id="panel-7-2-0-0" data-index="7">

<!--chargement du style-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/bloc_2.css">

<!--articles et divs du bloc 2-->
<article class="myportfolio-container buildpress" id="esg-grid-33-1-wrap">
<div id="esg-grid-33-1" class="esg-grid" style="background-color: transparent;padding: 0px 0px 25px 0px ; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; display:none">

<!--DEBUT DES ARTICLES POUR LES TITRES DES BLOCS 2-->
<article class="esg-filters esg-singlefilters" style="margin-bottom: 30px; text-align: left; ">

<!--titres des differents contenus du bloc 2-->
<div class="esg-filter-wrapper  esg-fgc-33" style="margin-left: 0px; margin-right: 0px;">

<div class="esg-filterbutton selected esg-allfilter" data-filter="filterall" data-fid="-1">
    <span>Phototh&egrave;que</span>
</div>

<a href="#" target="_blank">
<div class="esg-filterbutton">
    <span>VIDEOTHEQUE</span>

    <span class="esg-filter-checked">
      <i class="eg-icon-ok-1"></i>
    </span>
</div>
</a>

<div class="eg-clearfix"></div>

</div><!--fin des titres-->
</article><!--fin des articles pour les titres-->

<div class="esg-clear-no-height"></div>

<!--CONTENUS DE L'ONGLET : PHOTOTHEQUE -->
<ul>
<?php foreach ($phototheque as $photo) {

?>

    <li class="filterall filter-buildings filter-interior-design eg-buildpress-item-skin-wrapper eg-post-id-247" data-date="1414428878">

        <div class="esg-media-cover-wrapper">

        <div class="esg-entry-media">
        	<img class="img-responsive" src="<?php echo $path_fic ?>/_phototheque/<?php echo $photo['image_wide'] ?>" alt="Project Image">
        </div>

        <div class="esg-entry-cover">

        <div class="esg-overlay esg-fade eg-buildpress-item-skin-container" data-delay="0"></div>

        <div class="esg-center eg-post-247 eg-buildpress-item-skin-element-1 esg-flipdown" data-delay="0">
         <a class="eg-buildpress-item-skin-element-0 eg-post-247" href="<?php echo $path_fic ?>_phototheque/<?php echo $photo['image_wide'] ?>" data-fancybox="group" data-caption="<?php echo $photo['album'] ?>">Voir la photo</a>
       </div>

        <div class="esg-center eg-buildpress-item-skin-element-9 esg-none esg-clear" style="height: 5px; visibility: hidden;"></div>

        <div class="esg-center eg-post-247 eg-buildpress-item-skin-element-0-a esg-slideup" data-delay="0"> <a class="eg-buildpress-item-skin-element-0 eg-post-247" href="<?php echo site_url($ctrl.'/phototheque?album='.$photo['album']) ?>" target="_self">Galerie</a> </div>

        </div>
        </div>
    </li>
 <?php }?>
</ul>
<!-- fin contenu   -->

<!--FIN DU CONTENU DES TITRES-->


<article class="esg-filters esg-singlefilters" style="margin-top: 30px; text-align: center; ">
    <div class="esg-navigationbutton esg-left  esg-fgc-33" style="margin-left: 0px !important; margin-right: 0px !important; display: none;">
    	<i class="eg-icon-left-open"></i>
    </div>

    <div class="esg-navigationbutton esg-right  esg-fgc-33" style="margin-left: 0px !important; margin-right: 0px !important; display: none;">
    	<i class="eg-icon-right-open"></i>
    </div>
</article>
<div class="esg-clear-no-height"></div>

    </div>
</article>
<!--fin articles et divs du bloc 2-->

<div class="clear"></div>

<!--effets sur les contenus du bloc 2-->
<script src="<?php echo base_url('assets/') ?>/css/jquery.fancybox.min.js"></script>
<script type="text/javascript">
var essapi_33;
jQuery(document).ready(function() {
	essapi_33 = jQuery("#esg-grid-33-1").tpessential({
        gridID:33,
        layout:"even",
        forceFullWidth:"off",
        lazyLoad:"off",
        row:1,
        loadMoreAjaxToken:"943fc74d0d",
        loadMoreAjaxUrl:"css/admin-ajax.php",
        loadMoreAjaxAction:"Essential_Grid_Front_request_ajax",
        ajaxContentTarget:"ess-grid-ajax-container-",
        ajaxScrollToOffset:"0",
        ajaxCloseButton:"off",
        ajaxContentSliding:"on",
        ajaxScrollToOnLoad:"on",
        ajaxNavButton:"off",
        ajaxCloseType:"type1",
        ajaxCloseInner:"false",
        ajaxCloseStyle:"light",
        ajaxClosePosition:"tr",
        space:30,
        pageAnimation:"fade",
        paginationScrollToTop:"off",
        spinner:"spinner0",
        evenGridMasonrySkinPusher:"off",
        lightBoxMode:"single",
        animSpeed:300,
        delayBasic:1,
        mainhoverdelay:1,
        filterType:"single",
        showDropFilter:"hover",
        filterGroupClass:"esg-fgc-33",
        aspectratio:"4:3",
        responsiveEntries: [
						{ width:1400,amount:4},
						{ width:1170,amount:4},
						{ width:1024,amount:4},
						{ width:960,amount:3},
						{ width:778,amount:3},
						{ width:640,amount:3},
						{ width:480,amount:1}
						]
	});

});
</script>

        	</div>
        </div>
    </div>
</div>
</div>
<?php }?>