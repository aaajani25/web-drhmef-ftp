<br>

 <div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">LISTE DES ACTES DEMANDES
</h1>
  </div>
</div>

<br>

<?php
 $liste = $this->espace_mod->liste_demande_acte(); 
?>

<?php include('message.php'); ?>

    <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="8%" valign="middle"><img src="<?php echo base_url('assets/css/icones-rs/new-r.png'); ?>" alt="new" width="30" height="30"></td>
  
    <td width="92%"> <a href="https://fonctionpublique.laatech.com/payacte/print.php" target="_blank" style="font-size:15px; color:#03C;">
    Cliquez pour imprimer les Actes déjà payés (Non Sanction Disciplinaire/Prêt Bancaire)</a></td>
  </tr>
</table>
<p>&nbsp;</p>

<table width="100%" border="0" align="center" cellpadding="7" cellspacing="3" id="tabb">
        <tr align="center" class="row-title">
          <td width="" align="left" bgcolor="">LIBELLE DE L'ACTE</td>
          <td width="" bgcolor="">RENDEZ-VOUS</td>
          <td width="" height="" bgcolor="">RECU A IMPRIMER</td>
          <td width="" height="" bgcolor="">ACTION</td>
        </tr>
        <?php 
    if($liste != 0){
    foreach($liste as $tab_liste){$d=''; ?>
        <tr align="center" class="row-content">          
          <td align="left" bgcolor=""><?php echo $tab_liste['TYPE_ACTE']; ?></td>
          
          <td>
		    <?php 
				$d = explode('-',$tab_liste['DATE_RDV']);
				echo $d[2].'-'.$d[1].'-'.$d[0];
		    ?>
          </td>
          
          <td>
          <?php if($tab_liste['ID_ACTE'] == 'A0041' or $tab_liste['ID_ACTE'] == 'A0097'){
			  if(empty($tab_liste['ETAT']) or $tab_liste['ETAT'] == 0){ ?>
          	<a href="?da=5&id=<?php echo $tab_liste['NUM_RECU'] ?>">A payer</a>
          <?php }else{ ?>
          <a href="https://fonctionpublique.laatech.com/payacte/print.php">Imprimer le reçu</a>
          <?php } }else{ ?>
          --
          <?php } ?>
          </td>
          
          <td><?php if(empty($tab_liste['DATE_PAIE'])){?>
            <a href="javascript:void(0);" onClick="del_demande_acte('<?php echo $tab_liste['NUM_RECU'] ?>', '<?php echo $this->session->userdata('matricule')?>')">SUPPRIMER</a>
    
            <?php }else{echo 'DEJA PAYE';} ?>
            </td>
            
        </tr>
        <?php }}else {  ?>
        <tr class="row-content no-result">
          <td colspan="6" align="center">DESOLE, VOUS N'AVEZ EFFECTUE AUCUNE DEMANDE D'ACTES</td>
        </tr>
        <?php }  ?>
      </table>
      
      <p>&nbsp;</p>
      
<script type="text/javascript">
 function del_demande_acte(i,m){
  if(confirm("Confirmez-vous la suppression ?")){
   document.location.href = 'del_demande_acte?da=6&id='+i+'&mat='+m;
  }
 }
  </script>