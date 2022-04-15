<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>GESTION DES ACCES A L'ESPACE FONCTIONNAIRE</strong></td>  
  </tr>
  <tr>
    <td colspan="2"><?php include('message.php'); ?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td><a href="<?php echo site_url('mfp-admin/siteback/access_ef?a=insert&t=access_ef'); ?>" class="btn btn-nouveau">Nouveau</a></td>
  </tr>
</table>

<table width="100%" border="1" cellspacing="2" cellpadding="4" class="content">
  <tr>
    <td width="59%" valign="top">    
    <?php if ($this->input->get_post('a')=='insert'){ ?>
    <form name="form1" method="post" action="<?php echo site_url($ctrl.'/do_acces_ef?a=insert&t=access_ef') ?>">
    <table width="100%" border="0" cellspacing="2" cellpadding="4">
      <tr>
        <td width="27%">Matricule :</td>
        <td width="73%"><label for="mat_acces"></label>
          <input type="text" name="mat_acces" id="mat_acces" required style="text-transform:uppercase"></td>
      </tr>
      <tr>
        <td>Mot de passe :</td>
        <td><label for="mdp_acces"></label>
          <input type="password" name="mdp_acces" id="mdp_acces" required></td>
      </tr>
      <tr>
        <td>Niveau d'accès :</td>
        <td>
          <select name="niv_acces" id="niv_acces" required>
            <option value="">Sélectionnez ...</option>
          		<option value="1">1: (consultation)</option> 
                <option value="2">2: (passe-partout)</option>          
                     <option value="3">3: (consultation avec mdp)</option>  
            </select>
          </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button2" id="button" value="Valider" style="height:50px; cursor:pointer"></td>
        </tr>      
    </table>
    <input type="hidden" name="a" id="a" value="insert">
    </form>
    <?php }else{?> 
    <form name="form1" method="post" action="<?php echo site_url($ctrl.'/do_acces_ef?a=upd&t=access_ef') ?>">
      <table width="100%" border="0" cellspacing="2" cellpadding="4">
        <tr>
          <td width="27%">Matricule :</td>
          <td width="73%"><label for="mat_acces3"></label>
            <input name="mat_acces" type="text" required id="mat_acces3" readonly value="<?php echo $this->input->get_post('mat') ?>"></td>
        </tr>
        <tr>
          <td>Niveau d'accès :</td>
          <td><select name="niv_acces" id="niv_acces" required>
            <option value="">Sélectionnez ...</option>
            <option value="1" <?php if($this->input->get_post('n')=='1') echo "selected" ?>>1</option>
            <option value="2"  <?php if($this->input->get_post('n')=='2') echo "selected" ?>>2</option>
             <option value="3"  <?php if($this->input->get_post('n')=='3') echo "selected" ?>>3</option>
            </select></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="button2" id="button" value="Modifier" style="height:50px; cursor:pointer"></td>
        </tr>
      </table>
      <input type="hidden" name="a" id="a" value="upd">
     </form>
    <?php }?>        	
    </td>
    
    <td width="41%" valign="top">
    
    
    <table width="100%" border="0" cellspacing="2" cellpadding="4">
      <tr>
        <td colspan="5" class="title-right"><strong>MATRICULE &amp; NIVEAU D'ACCES</strong></td>
      </tr>
        
         <tr>
        <td colspan="4" valign="middle" class="content-right">1: consultation , 2: tout, 3: mdp</td>
        </tr>
               
      <tr>
        <td colspan="4" valign="middle" class="content-right">&nbsp;</td>
        </tr>
      <tr>
        <td width="26%" valign="middle" class="content-right"><strong>Matricule</strong></td>
        <td width="37%" valign="middle" class="content-right"><strong>Niveau d'accès</strong></td>
        <td width="37%" colspan="2" align="center" valign="middle" class="content-right"><strong>Actions</strong></td>
      </tr>
      <?php foreach($liste_acces as $l_acces){?>
      <tr>
        <td valign="middle" class="content-right"><?php echo $l_acces['mat_aef'] ?></td>
        <td align="center" valign="middle" class="content-right"><?php echo $l_acces['niveau_access'] ?></td>
        <td align="center" valign="middle" class="content-right"><a href="<?php echo site_url('mfp-admin/siteback/access_ef?a=upd&t=access_ef&mat='.$l_acces['mat_aef'].'&n='.$l_acces['niveau_access']); ?>">maj</a></td>
        <td align="center" valign="middle" class="content-right"><a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>','<?php echo $l_acces['mat_aef'] ?>');">del</a></td>
      </tr>     
      <?php }?>
    </table>     
         
    </td>
  </tr>
</table>
