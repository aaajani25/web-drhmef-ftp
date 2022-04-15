<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>RUBRIQUE :&nbsp;LE MINISTRE</strong></td>  
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
       
      <tr>
        <td width="22%">Biographie : <span style="color:#F00">*</span></td>
        <td width="78%">
          <select name="type_lien" id="type_lien" onChange="setLien()" required> 
          <option value="">Sélectionnez ...</option>           
            <option value="NULL">Aucune</option>
            <option value="fichier">Existant</option>          
            </select>
          </td>
      </tr>
       
       <!--Fichier à télécharger-->
       <tr id="fichier" style="display:none"><td><label for="userfile3">Fichier word ou pdf : <span style="color:#F00">*</span></label></td>
         <td><input type="file" name="userfile3" id="userfile3"></td>
       </tr>
       
        <tr id="resume" style="display:none">
         <td>Résumé : <span style="color:#F00">*</span></td>
         <td><label for="resume"></label>
           <textarea name="resume" cols="36" rows="4" id="resum"></textarea></td>
       </tr>
    
    <input name="type_image" type="hidden" value="small">
    
       <tr id="small">
         <td>Photo : (174x209) <span style="color:#F00">*</span></td>
         <td><label for="fileField2"></label>
           <input type="file" name="userfile2" id="fileField2" required></td>
       </tr>
       <tr>
         <td>Noms : <span style="color:#F00">*</span></td>
         <td><label for="stitre"></label>
           <input name="titre" type="text" id="titre" value="" size="36" required></td>
       </tr>
    <tr>
         <td>Titre :</td>
         <td><label for="stitre"></label>
           <input name="stitre" type="text" id="stitre" value="" size="36"></td>
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
    <?php if ($to_update['type_image'] != 'NULL') {
		 if($to_update['type_image'] == 'wide'){ 
	   ?>
      <?php }else{?>
      <tr id="small2">
        <td>Photo : (174x209)</td>
        <td width="43%"><label for="fileField3"></label>
          <input type="file" name="userfile2" id="fileField3"></td>
        <td width="37%"><span class="content-right"><img src="<?php echo base_url(); ?>assets/rubriques/<?php echo $this->input->get_post('t') ?>/<?php echo $to_update['image_small'] ?>" width="30" height="30" alt="pas d'image" /></span></td>
      </tr>
       <?php }}?>
       
        <?php if($to_update['type_lien'] == 'fichier'){?>
       	  <!--Fichier à télécharger-->
       <tr id="fichier"><td><label for="userfile3">Biographie :</label></td>
         <td colspan="2"><input type="file" name="userfile3" id="userfile3"></td>
         </tr>
       <?php }?>
       
       <?php if(!empty($to_update['resume'])){?>
     
       <tr id="resume">
         <td>Résumé : <span style="color:#F00">*</span></td>
         <td colspan="2"><label for="resume"></label>
           <textarea name="resume" cols="36" rows="4" id="resum"><?php echo $to_update['resume'] ?></textarea></td>
       </tr>
       <?php }?>
       <!--<tr><td colspan="3">&nbsp;</td></tr>-->
       
       <?php if (($to_update['type_lien'] != 'auto') || ($to_update['type_lien'] != 'NULL')) {
		 if($to_update['type_lien'] == 'fichier'){ 
	   ?>
       
      	 <!--Fichier à télécharger-->
       <?php } elseif($to_update['type_lien'] == 'site'){?>
       <!--Ouverture d'un site-->
       <?php }elseif($to_update['type_lien'] == 'rep'){?>
       <!--Vers un autre projet-->
       <?php }else{?>
		<?php }}?>              
       
       <?php if(!empty($to_update['titre'])){?>
     
       <tr>
         <td>Noms : <span style="color:#F00">*</span></td>
         <td colspan="2"><label for="titre"></label>
           <input name="titre" type="text" id="titre" value="<?php echo $to_update['titre'] ?>" size="36" required></td>
       </tr>
       <?php }?>
              
        <tr>
         <td>Titre :</td>
         <td colspan="2"><label for="stitre"></label>
           <input name="stitre" type="text" id="stitre" value="<?php echo $to_update['stitre'] ?>" size="36"></td>
       </tr>      
       
       
       <?php if(!empty($to_update['resume'])){?>
       <?php }?>
       
       <?php if(!empty($to_update['contenu'])){?>
       <?php }?>
       
        <tr><td colspan="3">&nbsp;</td></tr>
       
       <tr>
         <td>Statut : <span style="color:#F00">*</span></td>
         <td colspan="2"><select name="etat" id="etat" required>
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
        
        <td width="68%" valign="middle"><?php echo strtolower($on['titre']) ?></td>      
          
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
       <?php if(!empty($off['image_small'])){ ?>
        		<img src="<?php echo base_url(); ?>assets/rubriques/<?php echo $this->input->get_post('t') ?>/<?php echo $off['image_small'] ?>" width="60" height="50" alt="pas d'image" />
        <?php } else echo $off['date_ins'] ;?>
       </td>
        
        <td valign="middle"><?php echo strtolower($off['titre']) ?></td>
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
			fullPage : true
		});

//]]>
</script>