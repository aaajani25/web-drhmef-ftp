<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">ESPACE FONCTIONNAIRE</h1>
  </div>
</div>

<!--titre de la page-->
 <style type="text/css">
	@media screen and (min-width:800px){.page_art{width:50%; margin:0px auto 0px auto;}}
		
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

  </style>
  <p>&nbsp;</p>
  <!--contenu pour articles-->
<div class="page_art">
	<div class="panel-grid title">
   		<h3 class="widget-title">Authentification</h3>
    </div>
   
   <div class="page_art_content">
     	<!--affichage des messages : erreur; succes etc-->

<?php 
	if(!empty($msg)){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>">
            <?php echo $msg; ?>
        </div>
<?php }?>

        
     <div class="esp_fon" style="background-color:#F5F5F5;">
	   <form action="<?php echo site_url($ctrl.'/connexion/menu/service-offert/espace-fonctionnaire') ?>" method="post" name="form_espfon">
          	<table width="100%" border="0" cellspacing="5" cellpadding="7">              
              <tr><td colspan="3">&nbsp;</td></tr>
                            
               <tr>              
                <td colspan="2" align="center"><input name="matricule" type="text" autocomplete="off"  class="champ_de_saisie" placeholder="Entrer votre matricule ici..." /></td>
              </tr>
              
              <tr><td colspan="2">&nbsp;</td></tr>
            
              <tr>             
                <td colspan="2" align="center"><input name="mot_de_passe" id="mot_de_passe" autocomplete="off" type="password" class="champ_de_saisie" placeholder="Entrer votre mot de passe ici..." /></td>
              </tr>      
                      
              <tr><td colspan="2">&nbsp;</td></tr>
              <tr><td colspan="2">&nbsp;</td></tr>
              
              <tr>
                <td width="44%" align="right"><input type="submit" name="button" id="btn_bl22" value="CONNEXION" class="btn btn-primary" /></td>
                <td width="56%" align="left">&nbsp;&nbsp;<a href="#">mot de passe oublié ?</a></td>
              </tr>         
                   
              <tr><td colspan="2">&nbsp;</td></tr>
              <tr><td colspan="2">&nbsp;</td></tr>
            </table>
            <input name="xq" type="hidden" id="xq" value="statics" />
            <input name="parent" type="hidden" id="parent" value="statics" />
        </form>
	</div> 
   </div>       
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
