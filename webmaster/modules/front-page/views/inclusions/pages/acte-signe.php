<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">Fonctionnaires, veuillez vérifier si votre Acte est signé</h1>
  </div>
</div>

<style type="text/css">
 @media (min-width:900px){.page_art{width:50%; margin:10px auto}} 
</style>


<?php 
	if(!empty($msg)){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>">
            <?php echo $msg; ?>
        </div>
<?php }?>

  
<div class="page_art" style="padding:2px 10px">
	<div class="panel-grid title">
   		<h3 class="widget-title">Entrez votre Matricule</h3>
    </div>      
    
   <div class="page_art_content">
     <form action="<?php echo site_url($ctrl.'/trt_acte_signe') ?>" method="post">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td><input name="matricule" type="text" maxlength="7" class="champ_de_saisie" required  placeholder="..."></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
        </tr>
        <tr>
        	<td><input type="submit" name="button" id="btn_bl22" value="Valider" class="btn btn-primary" /></td>
        </tr>
        <tr>
       	 	<td>&nbsp;</td>
        </tr>
    </table>
    <input name="trt" type="hidden" value="on">
   </form>
   </div>   
       
</div>	
    
<?php if ($resultat) {	
?>
<div class="panel-grid title">
   		<h3 class="widget-title">Résultat</h3>
    </div>
<?php	
	echo $resultat;
	}
?>