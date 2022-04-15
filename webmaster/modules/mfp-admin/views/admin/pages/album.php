<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>GESTION DES ALBUMS</strong></td>  
  </tr>
  <tr>
    <td><?php include('message.php'); ?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td width="9%"><a href="<?php echo site_url('mfp-admin/siteback/open_popup?t='.$this->input->get_post('t').'&a=insert'); ?>" class="btn btn-nouveau">Nouveau</a></td>
    <td width="91%"><a href="<?php echo site_url('mfp-admin/siteback/homepage?t=_phototheque&a=insert') ?>">Aller à la photothèque</a></td>
  </tr>
</table>

<table width="100%" border="1" cellspacing="2" cellpadding="4" class="content">
  <tr>
    <td width="57%" valign="top">
    
   <?php if ($this->input->get_post('a')=='insert'){ ?>
    <form name="form1" method="post" action="<?php echo site_url($ctrl.'/allGrid') ?>">
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="2" class="tab">
  <tr>
    <td>    
      <table width="100%" border="0" cellspacing="2" cellpadding="4">
        <tr>
          <td width="15%">Nom de l'Album : <span style="color:#F00">*</span></td>
          <td width="85%"><label for="textfield"></label>
            <input type="text" name="lib" id="lib" required></td>
        </tr>
        <tr>
          <td>Résumé : <span style="color:#F00">*</span></td>
          <td><label for="textfield2"></label>
            <textarea name="contenu" cols="36" rows="8" id="contenu"></textarea></td>
        </tr>
        <tr>
          <td>Lien url :</td>
          <td><label for="textfield3"></label>
            <input type="text" name="lien" id="lien"></td>
        </tr>
    
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td><input type="submit" name="button2" id="button" value="Valider" style="height:40px; width:200px"></td>
          </tr>
      </table>
      <input name="action" type="hidden" value="ins">
      	<input type="hidden" name="a" id="a" value="insert">
		<input type="hidden" name="t" id="t" value="<?php echo $this->input->get_post('t') ?>">	    
    </td>
  </tr>
</table>         
      </form>
      <?php }else{?>
      <form name="form1" method="post" action="<?php echo site_url($ctrl.'/allGrid') ?>">
      
      <table width="100%" border="0" align="center" cellpadding="4" cellspacing="2" class="tab">
  <tr>
    <td>    
      <table width="100%" border="0" cellspacing="2" cellpadding="4">
        <tr>
          <td width="15%">Nom de l'Album : <!--<span style="color:#F00">*</span>--></td>
          <td width="85%"><label for="textfield"></label>
            <input name="lib" type="text" id="lib" value="<?php echo $to_update['lib_album'] ?>" readonly> 
            (lecture seule)
            </td>
        </tr>
        <tr>
          <td>Résumé : <span style="color:#F00">*</span></td>
          <td><label for="textfield2"></label>
            <textarea name="contenu" cols="36" rows="8" id="contenu"><?php echo $to_update['contenu'] ?></textarea></td>
        </tr>
        <tr>
          <td>Lien Url :</td>
          <td><label for="textfield4"></label>
            <input type="text" name="lien" id="lien" value="<?php echo $to_update['lien'] ?>"></td>
        </tr>
 
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td><input type="submit" name="button2" id="button" value="Appliquer la modification" style="height:40px; width:200px"></td>
          </tr>
      </table>        
    </td>
  </tr>
</table>
      
        <input name="action" type="hidden" value="upd">
      	<input type="hidden" name="a" id="a" value="upd">
        
		<input type="hidden" name="t" id="t" value="<?php echo $this->input->get_post('t') ?>">	
        <input type="hidden" name="id" id="id" value="<?php echo $this->input->get_post('id') ?>">	
      </form>
      <?php }?>
      
    <p>&nbsp;</p>
    </td>
    
    <td width="43%" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="4">
      <tr>
        <td colspan="4" class="title-right"><strong>EN LIGNE</strong></td>
      </tr>
      <?php if($online) {foreach($online as $on){?>
      <tr>             
        <td width="87%" valign="middle"><?php echo $on['lib_album'] ?></td>      
          
        <td width="13%" valign="middle"><a href="<?php echo site_url('mfp-admin/siteback/open_popup?t='.$this->input->get_post('t').'&id='.$on['id_album'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
     
      </tr>
      <?php }}?>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" class="title-right"><strong>HORS LIGNE</strong></td>
      </tr>
      <?php if($offline) {foreach($offline as $off){?>
      <tr>               
        <td valign="middle"><?php echo $off['lib_album'] ?></td>
        
        <td width="13%" valign="middle"><a href="<?php echo site_url('mfp-admin/siteback/open_popup?t='.$this->input->get_post('t').'&id='.$off['id_album'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
               
      </tr>
      <?php }}?>
    </table></td>
  </tr>
</table>

       <script type="text/javascript">
//<![CDATA[

	CKEDITOR.replace( 'contenu',
		{
			fullPage : false
		});

//]]>
</script>