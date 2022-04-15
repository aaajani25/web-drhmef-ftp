<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>RUBRIQUE :&nbsp; SONDAGE</strong></td>  
  </tr>
  <tr>
    <td><?php include('message.php'); ?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&a=insert'); ?>" class="btn btn-nouveau">Nouveau</a>&nbsp;|&nbsp; <a href="<?php echo site_url($ctrl.'/open_popup?t=_reponse&a=insert'); ?>" style="text-decoration:none;">Ajouter une réponse [+]</a></td>
  </tr>
</table>

<table width="100%" border="1" cellspacing="2" cellpadding="4" class="content">
  <tr>
    <td width="57%" valign="top">
    
   <?php if ($this->input->get_post('a')=='insert'){ ?>
    <form name="form-ins" method="post" action="<?php echo site_url($ctrl.'/traitement?a=insert') ?>" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="2" cellpadding="4">
       <tr id="content">
         <td>Question : <span style="color:#F00">*</span></td>
         <td>
           <textarea name="contenu" cols="35" rows="15" id="contenu"></textarea></td> 
       </tr>
  
       <tr>
         <td colspan="2">&nbsp;</td>
       </tr>
       <tr>
         <td>Groupe de réponse : <span style="color:#F00">*</span></td>
         <td><select name="reponse" id="reponse" required>
            <option value="">Sélectionnez ...</option>
              <?php foreach($reponse as $rep){?>
              <option value="<?php echo $rep['groupe'] ?>"><?php echo $rep['groupe'] ?></option>             
              <?php }?>              
              </select>
         &nbsp; <a href="<?php echo site_url($ctrl.'/open_popup?t=_reponse&a=insert'); ?>" style="text-decoration:none;">Ajouter [+]</a></td>
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
               
     <input name="type_lien" type="hidden" value="NULL">  
<input name="type_image" type="hidden" value="NULL">
      </form>
      <?php }else{?>
      <form name="form1" method="post" action="<?php echo site_url($ctrl.'/traitement') ?>" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="2" cellpadding="4">    
       
       <?php if(!empty($to_update['contenu'])){?>
      
       <tr id="content">
         <td>Question : <span style="color:#F00">*</span></td>
         <td width="78%"><label for="contenu"></label>
           <textarea name="contenu" required cols="35" rows="15" id="conten"><?php echo $to_update['contenu'] ?></textarea></td> 
       </tr>
       <?php }?>
       
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
         <td>Groupe de réponse : <span style="color:#F00">*</span></td>
         <td><select name="reponse" id="reponse" required>
            <option value="" selected>Sélectionnez ...</option>
              <?php foreach($reponse as $rep){?>
              <option value="<?php echo $rep['groupe'] ?>" <?php if ($to_update['group_reponse']==$rep['groupe']) echo 'selected'; ?>><?php echo $rep['groupe'] ?></option>             
              <?php }?>              
              </select>&nbsp;&nbsp;&nbsp; <a href="<?php echo site_url($ctrl.'/open_popup?t=_reponse&a=insert'); ?>" style="text-decoration:none;">Ajouter [+]</a></td>
       </tr>
       <tr>
         <td>Statut : <span style="color:#F00">*</span></td>
         <td><select name="etat" id="etat" required>
           <option value="">Sélectionnez ...</option>
           <option value="on" <?php if ($to_update['etat']=='on') echo 'selected'; ?>>En ligne</option>
           <option value="off" <?php if ($to_update['etat']=='off') echo 'selected'; ?>>Hors ligne</option>
         </select></td>
         </tr>
  
<tr>
         <td colspan="2">&nbsp;</td>
         </tr>
       <tr>
         <td width="22%">&nbsp;</td>
         <td><input type="submit" name="button" id="button2" value="Appliquez la modification" style="height:50px; cursor:pointer"></td>
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
    
    <td width="43%" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="4">
      <tr>
        <td colspan="4" class="title-right"><strong>EN LIGNE</strong></td>
      </tr>
      <?php if($online) {$n=0;
			$bg_article_on='';			
			
			foreach($online as $on){
				$n=$n+1;			
		?>
        <tr bgcolor="<?php if($n<=1){$bg_article_on = "#F5F5F5";}else{$bg_article_on = "#FFF";} echo $bg_article_on; ?>">
        <td width="14%" class="content-right">
        <?php if (!empty($on['image_small'])){ ?>
        		<img src="<?php echo base_url(); ?>assets/rubriques/<?php echo $this->input->get_post('t') ?>/<?php echo $on['image_small'] ?>" width="60" height="50" alt="pas d'image" />
        <?php } else echo $on['date_ins'];?>
        </td>
        
        <td width="68%" valign="middle"><?php echo strtolower($on['contenu']) ?></td>      
          
        <td width="8%" valign="middle"><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&id='.$on['id'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
        
        <td width="10%" valign="middle"><a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>', '<?php echo $on['id'] ?>');">Supp</a></td>
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
       <td width="14%" class="content-right">
       <?php if (!empty($off['image_small'])) { ?>
        		<img src="<?php echo base_url(); ?>assets/rubriques/<?php echo $this->input->get_post('t') ?>/<?php echo $off['image_small'] ?>" width="60" height="50" alt="pas d'image" />
        <?php } else echo $off['date_ins'];?>
       </td>
        
        <td valign="middle"><?php echo strtolower($off['contenu']) ?></td>
        <td width="8%" valign="middle"><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&id='.$off['id'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
        
        <td width="10%" valign="middle"><a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>','<?php echo $off['id'] ?>');">Supp</a></td>        
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