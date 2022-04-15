<!--Sondage / Newsletters / Facebook -->
<style type="text/css">
	#btn_bl2{background-color:#ff8b26; color:#FFFFFF;}
	#btn_bl2:hover{color:#CE6200; background-color:#ff8b26;}

	#btn_bl1{background-color:#47975F; color:#FFFFFF; border-color:#38764A; }
	#btn_bl1:hover{background-color:#47975F; color:#38764A;}
</style>

<div class="panel-grid" id="pg-7-3-b3-l1">
<h3 class="widget-title"></h3>

<!--ligne 1-->
<div>

<!--contenu 1 : sondage-->
<div class="panel-grid-cell" id="pg-7-3-b3-l1-c1">

<div class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" id="panel-7-1-0-0" data-index="1">

<div class="page-box page-box--block post-7 page type-page status-publish hentry">
    <div class="page-box__content">
        <h3 class="module-title" style="color:#FFFFFF;">Sondage</h3>

   		<div class="esp_fon" style="margin:0px; padding:7px; background-color:#38764A;">
        <p>
          <?php echo $q_sondage['question_sondage'] ?>
        </p>

        <p>
       	  <form action="" method="post">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr><td colspan="2">&nbsp;</td></tr>

                    <tr>
                    	<td width="23%">&nbsp;</td>
                    	<td width="77%"> (<?php echo $q_sondage['nbre_participant'] ?>&nbsp;votes)</td>
                    </tr>
                    <?php foreach($r_sondage as $r_sond){?>
                    <tr><td colspan="2">&nbsp;</td></tr>

                     <tr>
                    	<td width="23%">&nbsp;</td>
                    	<td width="77%"><input name="radio" type="radio" value="<?php echo $r_sond['lib_reponse'] ?>" />&nbsp;<?php echo $r_sond['lib_reponse'] ?></td>
                    </tr>
                <?php }?>
            </table>

                 <br /><br />

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="34%" align="right"><input name="" type="button" value="Votez" id="btn_bl1" class="btn btn-primary" /></td>
                    <td width="33%">&nbsp;&nbsp;&nbsp;<a href="#" style="color:#FFFFFF;">résultats</a></td>
                    <td width="33%"><a href="#" style="color:#FFFFFF;">+ de sondages</a></td>
                  </tr>
                  <tr>
                    <td colspan="3" align="center">&nbsp;</td>
                  </tr>
            </table>
       	  </form>
        </p>
        </div>

    </div>

</div>

</div>
</div>
<!--fin contenu 1-->

<!--contenu 2 : NEWSLETTER-->
<div class="panel-grid-cell" id="pg-7-3-b3-l1-c2" style="background-color:#ff8b26;">
<div class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" id="panel-7-1-1-0" data-index="2">

 <div class="page-box page-box--block post-7 page type-page status-publish hentry">
    <div class="page-box__content">
        <h5 class="page-box__title  text-uppercase">LETTRE D'INFORMATION</h5>

            <div class="esp_fon" style="margin:0px; padding:7px; background-color:#D76600;">
        <p>
         Inscrivez-vous à notre newsletter pour être toujours bien informé !
        </p>

        <p>
       	  <form action="" method="post">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#000">
                    <tr><td>&nbsp;</td></tr>

                    <tr>
                    	<td align="center"><input name="" type="text" placeholder="votre Email ici ..." class="champ_de_saisie" /></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>

                    <tr>
                    	<td align="center"><input name="" type="text" placeholder="confirmer votre Email" class="champ_de_saisie" /></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
            </table>

                 <br />

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="34%" align="center"><input name="" id="btn_bl2" type="button" value="Valider" class="btn btn-primary" /></td>
                  </tr>
                 <tr><td>&nbsp;</td></tr>
            </table>
       	  </form>
        </p>
        </div>

    </div>
</div>

</div>
</div>
<!--fin contenu 2-->

<!--contenu 3 : facebook likebox-->
<div class="panel-grid-cell" id="pg-7-3-b3-l1-c3" style="padding-top:24px;">
  <div class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child" id="panel-7-1-2-0" data-index="3">
    <div class="page-box page-box--inline post-7 page type-page status-publish hentry">
    <div class="page-box__content" style="-webkit-flex-basis: calc(100% - 0px); -ms-flex-preferred-size: calc(100% - 0px); flex-basis: calc(100% - 0px);">

         <h5 class="page-box__title  text-uppercase" style="color:#FFFFFF;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="35%">Page Facebook</td>
                    <td width="65%"><img src="css/ic_action_like.png" alt="like"  /></td>
                </tr>
            </table>
         </h5>

    <div class="esp_fon" style="margin:0px; padding:7px; background-color:#FFFFFF;">

        <div class="fb-like-box" data-href="http://www.facebook.com/Fonctionpublique.ci" data-width="320" data-height="390" data-show-faces="true" data-border-color="#8EC600" data-stream="false" data-header="true"></div>

        </div>

    </div>

    </div>
    </div>
</div>
<!--fin contenu 3-->

</div>
<!--fin ligne 1-->


</div>