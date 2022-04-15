<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>RUBRIQUE :&nbsp;ANNUAIRE</strong></td>  
  </tr>
  <tr>
    <td><?php include('message.php'); ?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&a=insert'); ?>" class="btn btn-nouveau">Nouveau</a></td>
  </tr>
</table>

<table width="100%" border="1" cellspacing="2" cellpadding="4" class="content">
  <tr>
    <td width="57%" valign="top">
    
   <?php if ($this->input->get_post('a')=='insert'){ ?>
    <form name="form1" method="post" action="<?php echo site_url($ctrl.'/traitement?a=insert') ?>" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="2" cellpadding="4">
    <input name="type_lien" type="hidden" value="NULL">  
<input name="type_image" type="hidden" value="NULL">

         <tr>
           <td>Email :</td>
           <td>
            <input type="email" name="email" id="email"></td>
         </tr>
         <tr>
           <td>Support :</td>
           <td>
             <input type="text" name="support" id="support"></td>
         </tr>
         <tr>
           <td>Standard :</td>
           <td>
             <input type="text" name="standard" id="standard"></td>
         </tr>
         <tr>
           <td>Call Center :</td>
           <td>
             <input type="text" name="call_center" id="call_center"></td>
         </tr>
         <tr>
           <td>Directeur de Cabinet :</td>
           <td>
             <input type="text" name="dircab" id="dircab"></td>
         </tr>
         <tr>
           <td>Fax :</td>
           <td>
             <input type="text" name="fax" id="fax"></td>
         </tr>
  
       <tr>
         <td colspan="2">&nbsp;</td>
       </tr>
       <tr>
         <td>Statut : <span style="color:#F00">*</span></td>
         <td><select name="etat" id="etat" required>
           <option value="">Sélectionnez ...</option>
           <option value="on">En ligne</option>
           <option value="off">Hors ligne</option>
         </select></td>
       </tr>
       <tr>
         <td colspan="2">&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td><input type="submit" name="button2" id="button" value="Valider l'enregistrement" style="height:50px; cursor:pointer"></td>
       </tr>
    </table>   
      <input name="action" type="hidden" value="ins">
      	<input type="hidden" name="a" id="a" value="insert">
		<input type="hidden" name="t" id="t" value="<?php echo $this->input->get_post('t') ?>">	
      </form>
      <?php }else{?>
      <form name="form1" method="post" action="<?php echo site_url($ctrl.'/traitement') ?>" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="2" cellpadding="4">
    <tr>
           <td>Email :</td>
           <td colspan="2">
            <input type="email" name="email" id="email" value="<?php echo $to_update['email'] ?>"></td>
         </tr>
         <tr>
           <td>Support :</td>
           <td colspan="2">
             <input type="text" name="support" id="support" value="<?php echo $to_update['support'] ?>"></td>
         </tr>
         <tr>
           <td>Standard :</td>
           <td colspan="2">
             <input type="text" name="standard" id="standard" value="<?php echo $to_update['standard'] ?>"></td>
         </tr>
         <tr>
           <td>Call Center :</td>
           <td colspan="2">
             <input type="text" name="call_center" id="call_center" value="<?php echo $to_update['call_center'] ?>"></td>
         </tr>
         <tr>
           <td>Directeur de Cabinet :</td>
           <td colspan="2">
             <input type="text" name="dircab" id="dircab" value="<?php echo $to_update['dircab'] ?>"></td>
         </tr>
         <tr>
           <td>Fax :</td>
           <td colspan="2">
             <input type="text" name="fax" id="fax" value="<?php echo $to_update['fax'] ?>"></td>
         </tr>
       
        <tr><td colspan="3">&nbsp;</td></tr>
       
       <tr>
         <td>Statut : <span style="color:#F00">*</span></td>
         <td width="80%" colspan="2"><select name="etat" id="etat" required>
           <option value="">Sélectionnez ...</option>
           <option value="on" <?php if ($to_update['etat']=='on') echo 'selected'; ?>>En ligne</option>
           <option value="off" <?php if ($to_update['etat']=='off') echo 'selected'; ?>>Hors ligne</option>
         </select></td>
         </tr>
  
<tr>
         <td colspan="3">&nbsp;</td>
         </tr>
       <tr>
         <td width="20%">&nbsp;</td>
         <td colspan="2"><input type="submit" name="button" id="button2" value="Appliquez la modification" style="height:50px; cursor:pointer"></td>
       </tr>
    </table>  
      	<input name="action" type="hidden" value="upd">
      	<input type="hidden" name="a" id="a" value="upd">
        
		<input type="hidden" name="t" id="t" value="<?php echo $this->input->get_post('t') ?>">	
        <input type="hidden" name="id" id="id" value="<?php echo $this->input->get_post('id') ?>">
        
        <input type="hidden" name="type_lien" id="type_lien" value="<?php echo $to_update['type_lien'] ?>">
        <input type="hidden" name="current_lien" id="current_lien" value="<?php echo $to_update['lien'] ?>">
        
        <input type="hidden" name="type_image" id="type_image" value="<?php echo $to_update['type_image'] ?>">
        <input type="hidden" name="current_wide" id="current_wide" value="<?php echo $to_update['image_wide'] ?>">
        <input type="hidden" name="current_small" id="current_small" value="<?php echo $to_update['image_small'] ?>">	
      </form>
      <?php }?>
      
    <p>&nbsp;</p>
    </td>
    
    <td width="43%" valign="top">
     <div style="overflow:auto; height:auto">
<table width="100%" border="0" cellspacing="2" cellpadding="4">
      <tr>
        <td colspan="4" class="title-right"><strong>EN LIGNE</strong></td>
      </tr>
      <?php if($online) {foreach($online as $on){?>
      <tr>               
        <td width="68%" valign="middle">
			<?php echo 'email : '.strtolower($on['email']) ?><br>
			<?php echo 'support : '.strtolower($on['support']) ?><br>
            <?php echo 'standard : '.strtolower($on['standard']) ?><br>
            <?php echo 'call center : '.strtolower($on['call_center']) ?><br>
            <?php echo 'dir cab : '.strtolower($on['dircab']) ?><br>
            <?php echo 'fax : '.strtolower($on['fax']) ?><br>
            
            <p>---------------------------</p>
        </td>      
          
        <td width="8%" valign="middle"><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&id='.$on['id'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
        
        <td width="10%" valign="middle"><a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>', '<?php echo $on['id'] ?>');">Supp</a></td>
      </tr>
      <?php }}?>
      </table>
       </div>
       
       <p>&nbsp;</p>
       
      <div style="overflow:auto; height:auto">
<table width="100%" border="0" cellspacing="2" cellpadding="4"> 
      <tr>
        <td colspan="4" class="title-right"><strong>HORS LIGNE</strong></td>
      </tr>
      <?php if($offline) {foreach($offline as $off){?>
      <tr>
      <td width="68%" valign="middle">
			<?php echo 'email : '.strtolower($off['email']) ?><br>
			<?php echo 'support : '.strtolower($off['support']) ?><br>
            <?php echo 'standard : '.strtolower($off['standard']) ?><br>
            <?php echo 'call center : '.strtolower($off['call_center']) ?><br>
            <?php echo 'dir cab : '.strtolower($off['dircab']) ?><br>
            <?php echo 'fax : '.strtolower($off['fax']) ?><br>
            
            <p>---------------------------</p>
        </td>  
        
        <td width="8%" valign="middle"><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&id='.$off['id'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
        
        <td width="10%" valign="middle"><a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>','<?php echo $off['id'] ?>');">Supp</a></td>        
      </tr>
      <?php }}?>
    </table>
    </div>
    </td>
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