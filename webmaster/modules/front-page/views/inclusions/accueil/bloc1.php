<!--<p>&nbsp;</p>-->
<!-- Actualité et espace fonctionnaire-->
<style type="text/css">
	#btn_bl22{background-color:#CE6200; color:#FFF;}
	#btn_bl22:hover{color:#CE6200; background-color:#ff8b26; border:1px solid #CE6200;}
	.actu_contanier{/* overflow:auto; height:900px;*/}
	.actualite img{padding:0px; margin:0px; border-spacing:0px}
	.actualite span{color:#333333; text-transform:uppercase; font-weight:bold}
	.resume-actualite{padding:14px; margin-bottom:2px; border-bottom:1px solid #036D00;background-color:#EFEFEF;}
	.imp{color:#C00}
	.rsond{margin-bottom:5px; padding:6px 10px; background-color:#FFF}
	.bloc{padding:10px; background-color:rgb(0, 128, 0); color:#FFF;}
	.bloc a{color:#FFF; font-weight:normal; font-family:'Oswald';}
	.bloc input {color:#fff;}
  .bloc .ch_input {color:#000;}
	.read-more{font-size:12px}
	.actu{border-top:none}

	#concours{
		background-color:#FFF;
		padding:10px;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.33);
	}

	#concours .titre{
		text-align:center;
		color: #fff;
		background-color: #218838;
		border-color: #1e7e34;
		/*background-color:#FFBFBF;
		color:#BF0000;*/
		padding:10px;
		border-bottom:3px solid #ff8b26;
		margin-bottom:30px;
	}

	#concours .link_ a{
		color:#666666;
		font-family: "Segoe UI","Segoe WP","Oswald",Arial,sans-serif;
		font-size:15px;
		font-weight:bold;
	}

	#concours .link_ img{
		width:15px;
		height:15px;
	}


</style>

<div class="panel-grid actu" id="pg-7-3">

<!--bloc 3 gauche-->
<div class="panel-grid-cell" id="pgc-7-3-0">

<div class="so-panel widget widget_text panel-first-child" id="panel-7-3-0-0" data-index="8">
	<div class="textwidget"></div>
</div>

<!--contenu bloc 3 gauche-->
<?php if ($actu_max || $actu_min){
	$lien=$lien1=$target=$target1='';
?>
<div class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce panel-last-child" id="panel-7-3-0-1" data-index="9">

	<h3 class="module-title" id="actu"><span style="background-color:#ffbc67; color:#FFF">ACTUALITES</span></h3>

	<div class="textwidget">
    <!--actualites : Affichage 1  debut -->

<!--actualites : contenu prioritaire-->
        <?php if($actu_max) {foreach ($actu_max as $nw){
		$attach=$date_ins=$date_jour=$txt=$datej=$datefin='';
		$today = explode('/', date('d/m/Y'));
    if (!empty($nw['date_fin_inscr'])) {
      $fin_ins = explode('/', $nw['date_fin_inscr']);
      $datefin = $fin_ins[2].$fin_ins[1].$fin_ins[0];
    }


		$datej = $today[2].$today[1].$today[0];


		// date d'insertion et date auj
		$date_jour = date('Y-m-d');
		$date_ins = $nw['date_ins'];

		// gestion des liens
		switch($nw['type_lien']){
				case "auto":
					$lien = $urd.$nw['lien'];
					$target = "_self";
				break;

				case "site":
					$lien = $nw['lien'];
					$target = "_blank";
				break;

				case "rep":
					$lien = $nw['lien'];
					$target = "_blank";
				break;

				case "fichier":
					$lien = $path_fic.$nw['lien'];
					$target = "_blank";
					$attach = "ic_action_attachment_2.png";
				break;

				default :
					$lien = "#";
					$target = "_self";
			}
		?>
   <div class="row">
        <div class="col-lg-3">
             <a href="<?php echo $lien ?>" target=""><img src="<?php echo base_url()?>assets/rubriques/_actualite/<?php echo $nw['image_small']?>" width="231" height="160"></a>
        </div>
        <div class="col-lg-8 col-lg-offset-1">
		<table width="100%" height="160" border="0">
                    <tbody>
		   <tr>
                      <td valign="top">
			<a href="<?php echo $lien ?>" target="<?php echo $target ?>"><h6><?php echo $nw['titre']?></h6></a>
                        <p style="color:black"><?php echo $nw['resume'] ?></p>
                    </tr>
       
                    <tr style="color:black">
	                      <td valign="bottom" align="right">Publié le&nbsp;
		                        <?php
					 $fr_date=explode('-',$nw['date_ins']);
					 $nw['date_ins']=$fr_date[2].'-'.$fr_date[1].'-'.$fr_date[0];
		                         ?>
	                        	<?php echo $nw['date_ins'] ?>&nbsp;&nbsp;
                                        <?php if ($attach){ ?>
        	                       <img src="<?php echo base_url('assets/css/'.$attach) ?>" alt="pict-actu">
                                       <?php }?>
                                        <a href="<?php echo $lien; ?>" target="<?php echo $target;?>" class="read-more  read-more--page-box">Lire la suite</a>           
        &nbsp;&nbsp;
	                      </td>
                    </tr>
                  </tbody>
		</table>
              </div>

            </div>
		                    <!--actualites : Affichage 1  fin -->
<div class="row">
                  <div class="col-lg-12">&nbsp;</div>
                </div>
        <?php }}?>
        <div class="row">
                  <!-- <div class="col-lg-12">&nbsp;</div> -->
                  <div class="col-lg-12">
                    <p align="left">
                    <!-- <a href="<?php //echo $urd.'archives/_communique'?>" -->
                     <a href="<?php echo $urd.'archives/_actualite' ?>" class="btn btn-primary"> + actualités</a>
		    </p>
                  </div>
        </div>
<div class="row">
     <div class="col-lg-5">
         <h3 class="module-title"><span style="background-color:#ffbc67; color:#FFF" id="com">COMMUNIQUES</span></h3>
      <table style="font-size:10px; color:#000;font-family: 'Merriweather Sans', Arial, Helvetica, sans-serif;" width="285" cellspacing="20" cellpadding="20" border="0">
          <tbody>
        <?php if ($communique){
          foreach ($communique as $comm) {
          $lien=explode('/',$comm['lien']);
          $comm['lien']=$lien[1];
            ?><tr>
    <td height="80"><img src="<?php echo base_url('assets/css/com_icon.png')   ?>" alt="pict-actu" width="50" height="25"></td>
    <td height="80"><h6>
            <a href="<?php
    echo site_url(); ?>front-page/navigator/affiche_com_pdf/<?php echo $comm['lien'] ?>"  style="color:black;"><?php echo $comm['titre'] ?>
            </a>&nbsp;
            <img src="<?php echo base_url('assets/css/new_icon-gif-3.gif')   ?>" alt="pict-actu" width="50" height="25">
            <br>
      <br>
      <?php
       $fr_date=explode('-',$comm['date_ins']);
       $comm['date_ins']=$fr_date[2].'-'.$fr_date[1].'-'.$fr_date[0];
       ?>
      Publié le&nbsp; <?php echo $comm['date_ins'] ?><p></p></h6>
     </td>
  </tr><?php

          }?>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><a href="<?php echo $urd.'archives/_communique'?>" class="btn btn btn-primary" color="white">+communiques
    </a></td>
  </tr>
    <?php
    } else
      {
          ?>
          <p style="color:red">Aucun communiqué disponible</p>
          <?php
      }?>
</tbody></table>


      <br>
     </div>
    <div class="col-lg-6 col-ld-offset-1">
      <h4 class="module-title" id="communiques">
            <span style="background-color:#ffbc67; color:#FFF" id="doc">DOCUMENTATION</span>
        </h4>
      <table width="285" border="0" cellspacing="20" cellpadding="20" style="font-size:10px; color:#000;font-family: 'Merriweather Sans', Arial, Helvetica, sans-serif;">
        <?php if ($documentation){

foreach ($documentation as $document) {

	?>
<tr>
	<td height="80"><img src="<?php echo base_url('assets/css/doc_icon.png')?>" alt="pict-actu" width="50" height="75"></td>
	<td height="80"><h6><a href="<?php echo $document['lien'] ?>
	"style="color:black;"><?php echo $document['nom_document'] ?></a><br>
		<br>
		<?php
		 // $fr_date = explode('-',$document['date_publication']);
		 // $document['date_publication']=$fr_date[2].'-'.$fr_date[1].'-'.$fr_date[0];
		 ?>
		Publié le&nbsp; <?php echo $document['date_publication'] ?><p></p></h6>
	 </td>
</tr>
<?php }} ?>
        <tr>
          <td>&nbsp;</td>
          <td align="right">
          <a href="<?php echo $urs; ?>/mediatheque/media_documentation" class="btn btn-primary"> + documents</a>
           </td>
        </tr>
      </table>
    </div>
</div>
	</div>

</div>
</div>
<!--fin du bloc 3 gauche-->
<?php }?>

<!--Espace fonctionnaire-->
<div class="panel-grid-cell" id="pgc-7-3-1">

<div class="so-panel widget widget_text panel-first-child" id="panel-7-3-1-0" data-index="10">
	<div class="textwidget"></div>
</div>

<div class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce panel-last-child" id="panel-7-3-1-1" data-index="11">
<?php /*?>
<!--lucarne concours 20xx-->
	<h3 class="module-title" id="ep"><span style="background-color:#ffbc67; color:#FFF">LUS POUR VOUS</span></h3>

    <div class="textwidget">
     <div id="concours">
         <div class="titre"><strong><span>Bon à savoir</span></strong>
             
            <div style="margin:5px; background-color:#FFF;">
            <p style="color:black;">
					Un agent public, dans son lieu de travail et en dehors du service ne doit pas divulguer d’informations...<br>
					<a href="<?php echo $urs; ?>/default/lu_pour_vous" class="read-more  read-more-page-box">Lire la suite</a>
				    </p>
            </div>
         </div>
         <div class="titre"><strong><span>Le saviez-vous ?</span></strong>
             
            <div style="margin:5px; background-color:#FFF;">
            <p style="color:black;">
            Le fonctionnaire, au cours de sa carrière, peut changer d’emploi dans
				    son grade, en fonction des besoins de l’administration...<br>
					<a href="<?php echo $urs; ?>/default/lu_pour_vous" class="read-more  read-more-page-box">Lire la suite</a>
				    </p>
            </div>
         </div>
</div>
<?php */?>
<!--lucarne concours 20xx-->
<h3 class="module-title" id="ep"><span style="background-color:#ffbc67; color:#FFF">INFORMATIONS</span></h3>

<div class="textwidget">
 <div id="concours">
     <div class="titre"><strong><span>Procedure d'affectation</span></strong>
     <img src="http://drh.finances.gouv.ci/assets/css/new_icon-gif-3.gif" alt="pict-actu" width="50" height="25">
         
        <div style="margin:5px; background-color:#FFF;">
        <p style="color:black;">
          Vous etes un nouvel agent mis à la disposition du MEF?...<br>
          veuillez consulter la procedure d'affectation 
         <a href="http://drh.finances.gouv.ci/assets/rubriques/_alaune/procedure_aff_mef_n.jpg" class="read-more  read-more-page-box">Lire la suite</a>
        </p>
        </div>
     </div>
     <div class="titre"><strong><span>Centre d'appels </span></strong>
            <img src="http://drh.finances.gouv.ci/assets/css/new_icon-gif-3.gif" alt="pict-actu" width="50" height="25">
         
        <div style="margin:5px; background-color:#FFF;">
        <p style="color:black;">
        le centre d'appels de la DRH/MEF momentanement inaccessible...<br>
      <a href="http://drh.finances.gouv.ci/assets/rubriques/_alaune/centre_appels_indispo_n.jpg" class="read-more  read-more-page-box">Lire la suite</a>
        </p>
         <p style="color:black;">
        Mise en service d'un nouveau numero d'appels...<br>
      <a href="http://drh.finances.gouv.ci/assets/rubriques/_alaune/centre_appels_nouveau.jpg" class="read-more  read-more-page-box">Lire la suite</a>
        </p>
        </div>
     </div>
     
</div>
  </div>

<!--lucarne concours 20xx-->
<!--sondage-->
<p>&nbsp;</p>
<h3 class="module-title" id="snd"><span style="background-color:#ffbc67; color:#FFF">Vidéo à la Une</span></h3>
<div class="esp_fon blocs">
<iframe width="400" height="300" src="https://www.youtube.com/embed/3Uf9sppoeEU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<!--sondage-->
<!--espace fonctionnaire-->
	<h3 class="module-title" id="esp"><span style="background-color:#ffbc67; color:#FFF">Espace Agent</span></h3>

    <div class="textwidget">
    	<?php
	if(!empty($msg) && $this->uri->segment(3)=='connexion'){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>" id="esp">
            <?php echo $msg; ?>
        </div>

         <script type="text/javascript">
    	setTimeout(function(){
    		document.getElementById('esp').style.display = 'none';
    },15000);
    </script>
<?php }?>

     <div id="connexion" class="esp_fon bloc">
		<form action="<?php echo site_url($ctrl.'/connexion#ep') ?>" method="post" name="form_espfon">
          	<table width="100%" border="0" cellspacing="5" cellpadding="7">

               <tr>
                <td colspan="2" align="center"><input name="matricule" type="text" autocomplete="off" required class="champ_de_saisie ch_input" placeholder="Entrez votre matricule" maxlength="15" style="text-transform:uppercase" /></td>
              </tr>

              <tr><td colspan="2">&nbsp;</td></tr>

              <tr>
                <td colspan="2" align="center"><input name="mot_de_passe" id="mot_de_passe" autocomplete="off" required type="password" class="champ_de_saisie ch_input" placeholder="Entrez votre mot de passe" /></td>
              </tr>

              <tr><td colspan="2">&nbsp;</td></tr>

              <tr>
                <td colspan="2" align="center"><input type="submit" name="button" id="" color="white" value="CONNEXION" class="btn btn btn-primary" /></td>
              </tr>
              <tr><td colspan="2">&nbsp;</td></tr>

              <tr valign="middle">
                <td width="11%">   <img src="<?php echo base_url('assets/css/icones-rs/ic_chevron_right_white_24dp.png') ?>" alt="pict-actu">
                 </td>
                <td width="89%"><a href="<?php echo site_url($ctrl.'/inscription') ?>">s'inscrire</a></td>
              </tr>
              <tr valign="middle"><td>   <img src="<?php echo base_url('assets/css/icones-rs/ic_chevron_right_white_24dp.png') ?>" alt="pict-actu"></td>
                <td><a href="<?php echo site_url($ctrl.'/password') ?>">mot de passe oublié ?</a></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>

            </table>
            <input name="cc" type="hidden" id="cc" value="sdf" />
            <input name="parent" type="hidden" id="parent" value="accueil" />
        </form>
	</div>
	</div>
<!--espace fonctionnaire-->

<!--newsletter-->
<p>&nbsp;</p>
<h3 class="module-title" id="nl"><span style="background-color:#ffbc67; color:#FFF">NEWSLETTER</span></h3>
        <?php
	if(!empty($msg) && $this->uri->segment(3)=='newsletter'){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
    <div class="msg <?php echo $msg_type; ?>" id="nlt">
    	<?php echo $msg; ?>
    </div>

    <script type="text/javascript">
    	setTimeout(function(){
    		document.getElementById('nlt').style.display = 'none';
    },15000);
    </script>
<?php }?>
            <div class="esp_fon bloc">
        <p>
         Inscrivez-vous à  notre newsletter pour être toujours bien informé !
        </p>

        <p>
       	  <form action="<?php echo site_url($ctrl.'/newsletter#nl') ?>" method="post">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr><td>&nbsp;</td></tr>

                    <tr>
                    	<td align="center"><input name="mail_nl1" type="email" required placeholder="Entrez votre Email" class="champ_de_saisie ch_input" /></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>

                    <tr>
                    	<td align="center"><input name="mail_nl2" type="email" required placeholder="Confirmez votre Email" class="champ_de_saisie ch_input" /></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>

                  <tr>
                    <td align=""><input name="btn_nl" id="btn_nl" type="submit" value="JE M'INSCRIS" class="btn btn-primary" /></td>
                  </tr>

            </table>
       	  </form>
        </p>
        </div>
<!--newsletter-->

</div>
</div>
<!--fin bloc 3 droit-->

</div>

<script type="text/javascript">
  function showResult(){
	if(document.getElementsByClassName('rsond').style.display=="block"){
		document.getElementsByClassName('rsond').style.display="none";
	}
	else{
		document.getElementsByClassName('rsond').style.display="block";
	}
	//$('#rsond').show();
  }
</script>
