<div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">

    <div class="page-box page-box--block post-7 page type-page status-publish hentry _t_ministre">

            	<img src="<?php echo $path_fic ?>/_ministre/<?php echo $ministre['image_small'] ?>" alt="M">
            <div class="page-box__content" style="padding-top:10px; padding-left:12px; font-family:Oswald; color:#333;border-bottom:1px solid #999;">
                      <?php echo $ministre['titre'] ?>
            </div>


        <?php if ($ministre['stitre']!='' or $ministre['stitre']!=NULL){ ?>
               <div class="page-box__content" style="padding-top:1px; padding-left:12px; font-family:Oswald;  color:#000; font-size:12px">                      <?php echo $ministre['stitre'] ?>
               <br><br>
                <a href="<?php echo $urs; ?>/direction/mot_du_drh" title="Mot du Directeur" style="font-weight:normal; font-family:'Oswald'">
                      Mot du Directeur
                </a>
            </div>
            <?php }?>

          <div class="zelda" style="font-size:12px; padding-top:10px; font-family:'Oswald'">
          	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left"><?php echo $ministre['resume'] ?></td>
              </tr>
            </table>
          </div>
<br>
          <div class="bottom_min">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
              <td>
               <?php if($ministre['lien']==NULL or $ministre['lien']==''){ ?>

                	<a href="<?php echo $urd.'winsend' ?>" title="Ecrire au Directeur" style="font-weight:normal; font-family:'Oswald'">
                    	<img src="<?php echo base_url('assets/css/ic_action_mail.png') ?>" alt="pict-actu">

                        Ecrire au Directeur
                	</a>
                 <?php }else{?>
                 <a href="<?php echo $urd.'winsend' ?>" title="Ecrire au Ministre">
                    	<img src="<?php echo base_url('assets/css/ic_action_mail.png') ?>" alt="pict-actu">
                	</a>
                 <?php }?>
                </td>

                <td align="right">
                <?php if($ministre['lien']!=NULL or $ministre['lien']!=''){ ?>
                	<img src="<?php echo base_url('assets/css/ic_action_attachment_2.png') ?>" alt="pict-actu">
                	<a href="<?php echo $path_fic.$ministre['lien'] ?>" style="font-family:'Oswald'">Biographie</a>
                 <?php }?>
                </td>
              </tr>
            </table>
          </div>
        </div>

    </div>