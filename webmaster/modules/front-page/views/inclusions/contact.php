<style type="text/css">
 @media (min-width:900px){
	#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}
 }
 .textarea{width:100%}
 .champ_de_saisie{width:100%}

 #pgcx-7-1-0{margin-bottom:0;}

 	.msg{
		border-radius:5px;
		text-align:center;
		padding:10px;
		margin-bottom:10px;
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


</style>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/page.css">
<div id="page" class="container">

  <div id="titre">
  	Le Ministère de l'économie des Finances à votre écoute !
  </div>
  <br>

<div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">

  <div class="panel-grid-cell" id="pgcx-7-1-0"  style="background-color:#F5F5F5;">


	    <h3 class="widget-title">Nous écrire</h3>

		<!--contenu-->
        <p>
          <!--affichage des messages : erreur; succes etc-->
<?php
	if(!empty($msg)){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>" id="tab">
            <?php echo $msg; ?>
        </div>

        <script type="text/javascript">
  setTimeout(function(){
	   document.getElementById('tab').style.display='none';
  },10000);
</script>
<?php }?>

        <form action="<?php echo site_url($ctrl.'/sendbox') ?>" method="post">
            <table width="100%" border="0" align="center" cellpadding="7" cellspacing="5">
              <tr>
                <td colspan="2"><label for="textfield"></label>
                Noms et Prénoms :    <br>

                <input type="text" name="nom_prenoms" id="nom_prenoms" required class="champ_de_saisie" /></td>
              </tr>
               <tr><td colspan="2">&nbsp;</td></tr>

              <tr>
                <td colspan="2"> <label for="textfield2"></label>Votre E-mail :<br>
                <input type="email" required name="mail" id="mail" class="champ_de_saisie" /></td>
              </tr>
               <tr><td colspan="2">&nbsp;</td></tr>

              <tr>
                <td colspan="2"><label for="textfield3"></label>Sujet :<br>
                <input type="text" name="title" required id="title" class="champ_de_saisie" /></td>
              </tr>
               <tr><td colspan="2">&nbsp;</td></tr>

              <tr>
                <td colspan="2">Message :
                  <label for="textarea"></label>
              <textarea name="msg" required id="msg" class="textarea" rows="8" placeholder="Entrez votre message" style="overflow:auto"></textarea></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
               <tr><td colspan="2">&nbsp;</td></tr>

              <tr>
                <td width="213"><span style="color:#F00; font-weight:bold; font-size:15px">NB: tous les champs sont obligatoires</span></td></tr>

                <tr><td colspan="2">&nbsp;</td></tr>

              <tr>  <td width="244"><input type="submit" name="button" id="button" value="Envoyer le message" class="btn btn-primary" /></td>
              </tr>

            </table>

        <input name="parent" type="hidden" value="contact">
          </form>
        </p>
        <p>&nbsp;</p>
  </div>


<div class="panel-grid-cell" id="pgcx-7-1-2">
    <h3 class="widget-title">Contacts utiles</h3>

    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
        <div class="page-box page-box--block post-7 page type-page status-publish hentry" style="padding-left:30px">
        	<!--<h3>sous titre</h3> <br>-->
    <span style="text-align:left;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="28%" align="left"><strong>Email</strong> :</td>&nbsp;
        <td width="72%"><a href="mailto:<?php echo $annuaire['email'] ?>"><?php echo $annuaire['email'] ?></a></td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>
      <tr>
        <td align="left"><strong>Support</strong> :</td>&nbsp;
        <td><?php echo $annuaire['support'] ?></td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>
      <tr>
        <td align="left"><strong>Standard</strong> :</td>&nbsp;
        <td><?php echo $annuaire['standard'] ?></td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>
      <tr>
        <td align="left"><strong>Call Center</strong> :</td>&nbsp;
        <td><?php echo $annuaire['call_center'] ?></td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>
      <tr>
        <td align="left"><strong>Cabinet</strong> :</td>&nbsp;
        <td><?php echo $annuaire['dircab'] ?></td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>
      <tr>
        <td align="left"><strong>Fax</strong> :</td>&nbsp;
        <td><?php echo $annuaire['fax'] ?></td>
      </tr>
    </table><p>&nbsp;</p></span>
  </div>
</div>
</div>
</div>

  <div id="map" class="panel-grid-cell">
     <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15890.347988953878!2d-4.0200681!3d5.3269278!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x942bf6ca005c4bf7!2sMinist%C3%A8re+de+la+Fonction+Publique+et+de+la+Modernisation+Administrative!5e0!3m2!1sfr!2s!4v1502711114181" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</div>
