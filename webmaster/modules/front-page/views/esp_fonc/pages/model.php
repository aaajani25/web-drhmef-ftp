<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="box-table">
  <tr valign="middle">
    <td width="3%"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_flags.png"  /></td>
    <td width="94%" colspan="2" align="left">TITRE PAGE</td>
  </tr>
</table>
<br>
<form action="<?php echo $link.'/' ?>" method="post">
  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="2" class="box-content">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="4" cellspacing="2">
      <tr>
        <td>label 1</td>
        <td><label for="textfield"></label>
          <input type="text" name="textfield" id="textfield" class="champ_de_saisie"></td>
      </tr>
      <tr>
        <td>label 2</td>
        <td><label for="select"></label>
          <select name="select" id="select" class="champ_de_saisie">
           <option value="">-- Sélectionnez --</option>
              <option value=""></option>
          </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" class="btn btn-primary" value="Valider"></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="box-table">
    <tr valign="middle">
      <td width="3%"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_flags.png"  /></td>
      <td width="94%" colspan="2" align="left">TITRE TABLEAU</td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="2" cellpadding="4" class="box-content">
    <tr class="row actes"style="background-color:#8080FF;">
      <td width="12%">Matricule</td>
      <td width="21%">Nom et Prénoms</td>
      <td width="16%">Nature</td>
      <td width="16%">Destination</td>
      <td width="10%">Motif</td>
      <td>Validation</td>
      <td align="center">Action</td>
    </tr>
    
    <?php ?>
    <tr class="row">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="16%">&nbsp;</td>
      <td width="9%" align="center"><a href="javascript:void(0);" class="del" title="supprimer" onClick="del_('<?php echo $view['ID'] ?>');"><img src="<?php echo $link2.'/espace_fon/images/ic_action_cancel.png' ?>" alt="del"></a></td>
    </tr>
    <?php ?>
    <tr>
      <td colspan="7" align="center" style="color:#F00">AUCUN(E)</td>
    </tr>
    <?php ?>
  </table>
</form>

<script type="text/javascript">
 function del_(ID){
	var slink = '<?php echo $link; ?>';
	 
	if(confirm("Confirmez-vous la suppression ?")){
		document.location.href = slink+"/traitement_ps?sm=xx&yy="+ID;
	}
	else{
		//	
	}	 
 }
</script>