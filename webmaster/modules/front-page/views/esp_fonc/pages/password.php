<!--<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="box-table">
  <tr valign="middle">
    <td width="3%"><img src="<?php //echo base_url('assets/espace_fon') ?>/images/ic_action_flags.png"  /></td>
    <td width="94%" colspan="2" align="left">MODIFICATION DU MOT DE PASSE</td>
  </tr>
</table>
<br>-->
<p>&nbsp;</p>
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	MODIFICATION DU MOT DE PASSE
  </h1>
  </div>
</div>
  <p>&nbsp;</p>
<form action="<?php echo $link.'/mon_compte_do?mc=2' ?>" method="post">
  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="2">
  <tr>
    <td><table width="100%" border="0" cellpadding="4" cellspacing="2">
      <tr align="">
      <td align="">
       <?php include('message.php'); ?>
      </td>
    </tr> 
      <tr>
        <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/mdp_v.png') ?>" alt="sbx">
        Mot de passe actuel  <span style="color:#F00">*</span></fieldset></td>
        </tr>
      <tr align="left">
        <td><input type="password" name="mdp1" id="mdp1" required placeholder="..." class="champ_de_saisie"></td>
      </tr>
      <tr>
        <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/mdp_v.png') ?>" alt="sbx">
        Nouveau mot de passe  <span style="color:#F00">*</span></fieldset></td>
        </tr>
      <tr align="left">
        <td><input type="password" name="mdp2" id="mdp2" required class="champ_de_saisie" placeholder="..."></td>
      </tr>
      <tr>
        <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/mdp_v.png') ?>" alt="sbx">
     Entrez à nouveau <span style="color:#F00">*</span></fieldset></td>
        </tr>
      <tr align="left">
        <td><input type="password" name="mdp3" id="mdp3" required class="champ_de_saisie" placeholder="..."></td>
      </tr>
      <tr align="right">
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><input type="submit" name="button" id="button" class="btn btn-primary" value="Appliquer la modification"></td>
        </tr>
    </table></td>
  </tr>
</table>

</form>