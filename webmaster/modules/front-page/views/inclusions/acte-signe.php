<style type="text/css">	
	 @media (min-width:900px){.page_art{width:50%; margin:10px auto}} 
	.champ_de_saisie{width:100%} 
	.tab-form{width:50%; background-color:#F5F5F5; margin:0px auto 0px auto; padding:15px}
</style>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/page.css">

<div id="page" class="container">
<div id="titre">Fonctionnaires, veuillez vérifier si votre Acte est signé</div>
 
<!--affichage des messages : erreur; succes etc-->
<style type="text/css">
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

<?php 
	if(!empty($msg)){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>">
            <?php echo $msg; ?>
        </div>
<?php }?>

  
<div class="page_art" style="background-color:#F5F5F5; padding:2px 10px">
	<div class="panel-grid title">
   		<h3 class="widget-title">Entrez votre Matricule</h3>
    </div>      
    
   <div class="page_art_content">
     <form action="<?php echo site_url($ctrl.'/trt_acte_signe') ?>" method="post">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td><input name="matricule" type="text" maxlength="7" class="champ_de_saisie" required></td>
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
</div>