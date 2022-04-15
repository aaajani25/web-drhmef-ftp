<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>RUBRIQUE :&nbsp;ANNONCE</strong></td>  
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
        <td width="20%">Lien : <span style="color:#F00">*</span></td>
        <td width="80%">
          <select name="type_lien" id="type_lien" onChange="setLien()"> 
          <option value="">Sélectionnez ...</option>           
            <option value="NULL">Aucun</option>
            <option value="fichier">Fichier à télécharger</option>
            <option value="site">Ouverture d'un site web</option>
            <option value="rep">Vers un autre répertoire</option>
            <option value="auto">Dynamique</option>
            </select>
          </td>
      </tr>
       
       <!--Fichier à télécharger-->
       <tr id="fichier" style="display:none"><td><label for="userfile3">Fichier :</label> <span style="color:#F00">*</span></td>
         <td><input type="file" name="userfile3" id="userfile3"></td>
       </tr>
       
       <!--Ouverture d'un site-->
       <tr id="site" style="display:none">
         <td>Url du Site : <span style="color:#F00">*</span></td>
         <td><label for="page"></label>
           <input type="text" name="site" id="sitex"></td>
       </tr>
       
       <!--Vers un autre projet-->
       <tr id="rep" style="display:none">
         <td>Répertoire : <span style="color:#F00">*</span></td>
         <td><label for="page"></label>
           <input type="text" name="rep" id="rept"></td>
       </tr>
       <tr>
         <td colspan="2">&nbsp;</td>
       </tr>
       <input name="type_image" type="hidden" value="NULL">
       <tr>
         <td>Titre : <span style="color:#F00">*</span></td>
         <td><label for="titre"></label>
           <textarea name="titre" cols="36" id="titre"></textarea></td>
       </tr>
       <tr id="resume" style="display:none">
         <td>Résumé : <span style="color:#F00">*</span></td>
         <td><label for="resume"></label>
           <textarea name="resume" cols="36" rows="4" id="resum"></textarea></td>
       </tr>
       <tr id="content" style="display:none">
         <td>Détails : <span style="color:#F00">*</span></td>
         <td><label for="contenu"></label>
           <textarea name="contenu" cols="35" rows="15" id="conten"></textarea></td> 
       </tr>
  
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
   
       
       <!--<tr><td colspan="3">&nbsp;</td></tr>-->
       
       <?php if (($to_update['type_lien'] != 'auto') || ($to_update['type_lien'] != 'NULL')) {
		 if($to_update['type_lien'] == 'fichier'){ 
	   ?>
      	 <!--Fichier à télécharger-->
       <tr id="fichier"><td><label for="userfile3">Fichier :</label></td>
         <td width="80%"><input type="file" name="userfile3" id="userfile3"></td>
         </tr>
       <?php } elseif($to_update['type_lien'] == 'site'){?>
       <!--Ouverture d'un site-->
       <tr id="site">
         <td>Url du Site : <span style="color:#F00">*</span></td>
         <td>
           <input type="text" name="site" id="sitex" value="<?php echo $to_update['lien'] ?>">
         </td>       
       </tr>
       <?php }elseif($to_update['type_lien'] == 'rep'){?>
       <!--Vers un autre projet-->
       <tr id="rep">
         <td>Répertoire : <span style="color:#F00">*</span></td>
         <td>
           <input type="text" name="rep" id="repp" value="<?php echo $to_update['lien'] ?>">
         </td> 
       </tr>
       <?php }else{?>
       	<tr id="auto-aucun"> <td colspan="2">&nbsp;</td></tr>
		<?php }}?>              
       
       <?php if(!empty($to_update['titre'])){?>
     
       <tr>
         <td>Titre : <span style="color:#F00">*</span></td>
         <td><label for="titre"></label>
           <textarea name="titre" cols="36" id="titre"><?php echo $to_update['titre'] ?></textarea></td>
       </tr>
       <?php }?>
       
       <?php if(!empty($to_update['resume'])){?>
     
       <tr id="resume">
         <td>Résumé : <span style="color:#F00">*</span></td>
         <td><label for="resume"></label>
           <textarea name="resume" cols="36" rows="4" id="resum"><?php echo $to_update['resume'] ?></textarea></td>
       </tr>
       <?php }?>
       
       <?php if(!empty($to_update['contenu'])){?>
      
       <tr id="content">
         <td>Détails : <span style="color:#F00">*</span></td>
         <td><label for="contenu"></label>
           <textarea name="contenu" cols="35" rows="15" id="conten"><?php echo $to_update['contenu'] ?></textarea></td> 
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
        <?php if($online) {$n=0;
			$bg_article_on='';			
			
			foreach($online as $on){
				$n=$n+1;			
		?>
        <tr bgcolor="<?php if($n<=3){$bg_article_on = "#F5F5F5";}else{$bg_article_on = "#FFF";} echo $bg_article_on; ?>">
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
              <?php } else echo $off['date_ins'];?>
            </td>
            
            <td valign="middle"><?php echo strtolower($off['titre']) ?></td>
            <td width="8%" valign="middle"><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&id='.$off['id'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
            
            <td width="10%" valign="middle"><a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>','<?php echo $off['id'] ?>');">Supp</a></td>        
          </tr>
          <?php }}?>
        </table>
    </div></td>
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