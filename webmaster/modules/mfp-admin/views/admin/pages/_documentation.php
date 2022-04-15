<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>RUBRIQUE :&nbsp;DOCUMENTATION</strong></td>  
  </tr>
  <tr>
    <td>
    <?php 
	if(!empty($msg)){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>">
            <?php echo $msg; ?>
        </div>
<?php }?>
    </td>
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
        <td>Catégorie : <span style="color:#F00">*</span></td>
        <td><label for="titre2"></label>
          <label for="titre"></label>
          <select name="titre" id="titre">
          <option value="">Sélectionnez ...</option> 
          <?php foreach($categorie as $cat) {?>
          	<option value="<?php echo $cat['libel_categorie']; ?>"><?php echo $cat['libel_categorie']; ?></option>
          <?php }?>
          </select> 
             <a href="<?php echo site_url($ctrl.'/open_popup?t=categorie_doc&a=insert'); ?>" style="text-decoration:none;">Ajouter [+]</a>
          </td>
      </tr>
       
      <tr>
        <td width="19%">Lien : <span style="color:#F00">*</span></td>
        <td width="81%">
          <select name="type_lien" id="type_lien" onChange="setLien()"> 
          <option value="">Sélectionnez ...</option>           
            <option value="NULL">Aucun</option>
            <option value="fichier">Fichier à télécharger</option>           
            <option value="liste">Elément d'une liste</option>
            <option value="auto">Dynamique</option>
            </select>
          </td>
      </tr>
      
       <!--Element d'une liste-->
      <tr id="liste" style="display:none">
        <td>Nom du Document : <span style="color:#F00">*</span></td>
        <td><label for="doc"></label>
          <textarea name="doc" cols="36" id="list"></textarea></td>
      </tr>
       
       <!--Fichier à télécharger-->
       <tr id="fichier" style="display:none"><td><label for="userfile3">Fichier : <span style="color:#F00">*</span></label></td>
         <td><input type="file" name="userfile3" id="userfile3"></td>
       </tr>
       
       <!--Ouverture d'un site-->
       <!--Vers un autre projet-->
       <input name="type_image" type="hidden" value="NULL">
  
       <tr>
         <td colspan="2">&nbsp;</td>
       </tr>
       <tr>
         <td>Statut : <span style="color:#F00">*</span></td>
         <td><select name="etat" id="etat">
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
                             
      
       <?php if (($to_update['type_lien'] != 'auto') || ($to_update['type_lien'] != 'NULL')) {
		 if($to_update['type_lien'] == 'liste'){ 
	   ?>
        <!--Element d'une liste-->
          <tr id="liste">
            <td>Nom du Document : <span style="color:#F00">*</span></td>
            <td width="80%"><label for="doc"></label>
            <textarea name="doc" cols="36" id="list"><?php echo $to_update['document'] ?></textarea></td>
          </tr>
          
           <!--Fichier à télécharger-->
       		<tr id="fichier"><td><label for="userfile3">Fichier :</label></td>
         		<td><input type="file" name="userfile3" id="userfile3"></td>
         	</tr>               	
          <?php }elseif($to_update['type_lien'] == 'fichier'){?>
       	  <!--Fichier à télécharger-->
       <tr id="fichier"><td><label for="userfile3">Fichier :</label></td>
         <td><input type="file" name="userfile3" id="userfile3"></td>
         </tr>
       <?php }}?>              
       
       <?php if(!empty($to_update['titre'])){?>     
       <tr>
         <td>Catégorie : <span style="color:#F00">*</span></td>
         <td><label for="titre"></label>
           <label for="titre"></label>
           <select name="titre" id="titre">
           <option value="">Sélectionnez ...</option> 
          <?php foreach($categorie as $cat) {?>
          	<option value="<?php echo $cat['libel_categorie'] ?>" <?php if ($cat['libel_categorie']==$to_update['titre']) echo 'selected'; ?>><?php echo $cat['libel_categorie'] ?></option>
          <?php }?>
           </select></td>
       </tr>
       <?php }?>
      
       
        <tr><td colspan="2">&nbsp;</td></tr>
       
       <tr>
         <td>Statut : <span style="color:#F00">*</span></td>
         <td><select name="etat" id="etat">
           <option value="">Sélectionnez ...</option>
           <option value="on" <?php if ($to_update['etat']=='on') echo 'selected'; ?>>En ligne</option>
           <option value="off" <?php if ($to_update['etat']=='off') echo 'selected'; ?>>Hors ligne</option>
         </select></td>
         </tr>
  
<tr>
         <td colspan="2">&nbsp;</td>
         </tr>
       <tr>
         <td width="20%">&nbsp;</td>
         <td><input type="submit" name="button" id="button2" value="Appliquez la modification" style="height:50px; cursor:pointer"></td>
       </tr>
    </table>  
      	<input name="action" type="hidden" value="upd">
      	<input type="hidden" name="a" id="a" value="upd">
        
		<input type="hidden" name="t" id="t" value="<?php echo $this->input->get_post('t') ?>">	
        <input type="hidden" name="id" id="id" value="<?php echo $this->input->get_post('id') ?>">
        
        <input type="hidden" name="type_lien" id="type_lien" value="<?php echo $to_update['type_lien'] ?>">
        <input type="hidden" name="current_lien" id="current_lien" value="<?php echo $to_update['lien'] ?>">
        
        <?php //if ($to_update['type_lien']=='fichier'){ ?>
         <!--<input type="hidden" name="doc" id="doc" value="NULL">-->
        <?php //}?>
        
        <input type="hidden" name="type_image" id="type_image" value="<?php echo $to_update['type_image'] ?>">
        <input type="hidden" name="current_wide" id="current_wide" value="<?php echo $to_update['image_wide'] ?>">
        <input type="hidden" name="current_small" id="current_small" value="<?php echo $to_update['image_small'] ?>">	
      </form>
      <?php }?>
      
    <p>&nbsp;</p>
    </td>
    
    <td width="43%" valign="top"><div style="overflow:auto; height:350px">
      <table width="100%" border="0" cellspacing="2" cellpadding="4">
        <tr>
          <td colspan="4" class="title-right"><strong>EN LIGNE</strong></td>
          </tr>
        <?php if($online) {foreach($online as $on){?>
        <tr>
          <td width="14%" class="content-right">
            <?php if (!empty($on['image_small'])){ ?>
            <img src="<?php echo base_url(); ?>assets/rubriques/<?php echo $this->input->get_post('t') ?>/<?php echo $on['image_small'] ?>" width="60" height="50" alt="pas d'image" />
            <?php } else echo $on['titre'];?>
            </td>
          
          <td width="68%" valign="middle"><?php if(!empty($on['document'])) echo strtolower($on['document']); else echo '<span style="color:#F00">Fichier joint</span>'; ?></td>      
          
          <td width="8%" valign="middle"><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&id='.$on['id'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
          
          <td width="10%" valign="middle"><a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>', '<?php echo $on['id'] ?>');">Supp</a></td>
          </tr>
        <?php }}?>
        <tr>
          <td colspan="4">&nbsp;</td>
          </tr>
      </table>
    </div>
      <div style="overflow:auto; height:350px">
        <table width="100%" border="0" cellspacing="2" cellpadding="4">
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
              <?php } else echo $off['titre'];?>
            </td>
            
            <td valign="middle"><?php if(!empty($off['document'])) echo strtolower($off['document']); else echo '<span style="color:#F00">Fichier joint</span>'; ?></td>
            <td width="8%" valign="middle"><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&id='.$off['id'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
            
            <td width="10%" valign="middle"><a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>', '<?php echo $off['id'] ?>');">Supp</a></td>        
          </tr>
          <?php }}?>
        </table>
    </div></td>
  </tr>
</table>
