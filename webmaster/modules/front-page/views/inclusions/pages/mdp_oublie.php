<style type="text/css">	
	 @media (min-width:900px){.page_art{width:50%; margin:10px auto}} 
	.champ_de_saisie{width:100%} 
</style>

<div id="pass_get">
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">Récupération du mot de passe oublié</h1>
  </div>
</div>
 
  <?php include('message.php'); ?>
  
<div class="page_art" style="padding:2px 10px">
	<div class="panel-grid title">
   		<h3 class="widget-title">Entrez votre Matricule</h3>
    </div>      
    
  <form action="<?php echo site_url($ctrl.'/getpassword') ?>" method="post">
   <div class="page_art_content">
     	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><input name="mat" type="text" maxlength="7" class="champ_de_saisie" placeholder="..." required></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="submit" name="button" id="btn_bl22" value="Etape suivante" class="btn btn-primary" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

   </div>
   <input name="step" type="hidden" value="1">
   </form>
       
</div>
</div>