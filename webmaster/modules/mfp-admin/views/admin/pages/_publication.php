<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>RUBRIQUE :&nbsp;PUBLICATIONS</strong></td>  
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
        <td width="21%">Lien : <span style="color:#F00">*</span></td>
        <td width="79%">
          <select name="type_lien" id="type_lien" onChange="setLien()"> 
          <option value="">Sélectionnez ...</option>           
            <option value="NULL">Aucun</option>
            <option value="fichier">Fichier à télécharger</option>
            <!--<option value="site">Ouverture d'un site web</option>
            <option value="rep">Vers un autre répertoire</option>
            <option value="auto">Dynamique</option>-->
            </select>
          </td>
      </tr>
      
      <tr id="fichier" style="display:none"><td><label for="userfile3">Fichier : <span style="color:#F00">*</span></label></td>
         <td><input type="file" name="userfile3" id="userfile3"></td>
       </tr>
       
       <!--Ouverture d'un site-->
       <!--Vers un autre projet-->
       
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
       
       <!--Fichier à télécharger-->
       <!--Ouverture d'un site-->
       <!--Vers un autre projet-->
        <input name="type_image" type="hidden" value="small">
       
       <tr id="small">
         <td>Pochette : (246x346) <span style="color:#F00">*</span></td>
         <td><label for="fileField2"></label>
           <input type="file" name="userfile2" id="fileField2"></td>
       </tr>
       <tr>
         <td>Titre : <span style="color:#F00">*</span></td>
         <td><label for="titre"></label>
           <textarea name="titre" cols="36" id="titre"></textarea></td>
       </tr>
       <tr>
         <td colspan="2">&nbsp;</td>
       </tr>
       <tr>
         <td>De : <span style="color:#F00">*</span></td>
         <td><select name="debut" id="debut">
           <option value="">Sélectionnez ...</option>
           <option value="JANVIER">JANVIER</option>
           <option value="FEVRIER">FEVRIER</option>
           <option value="MARS">MARS</option>
           <option value="AVRIL">AVRIL</option>
           <option value="MAI">MAI</option>
           <option value="JUIN">JUIN</option>
           <option value="JUILLET">JUILLET</option>
           <option value="AOUT">AOUT</option>
           <option value="SEPTEMBRE">SEPTEMBRE</option>
           <option value="OCTOBRE">OCTOBRE</option>
           <option value="NOVEMBRE">NOVEMBRE</option>
           <option value="DECEMBRE">DECEMBRE</option>
         </select></td>
       </tr>
  
       <tr>
         <td>A : <span style="color:#F00">*</span></td>
         <td><select name="fin" id="fin">
           <option value="">Sélectionnez ...</option>
           <option value="JANVIER">JANVIER</option>
           <option value="FEVRIER">FEVRIER</option>
           <option value="MARS">MARS</option>
           <option value="AVRIL">AVRIL</option>
           <option value="MAI">MAI</option>
           <option value="JUIN">JUIN</option>
           <option value="JUILLET">JUILLET</option>
           <option value="AOUT">AOUT</option>
           <option value="SEPTEMBRE">SEPTEMBRE</option>
           <option value="OCTOBRE">OCTOBRE</option>
           <option value="NOVEMBRE">NOVEMBRE</option>
           <option value="DECEMBRE">DECEMBRE</option>
         </select></td>
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
      <tr id="small2">
        <td>Pochette : (246x346) :</td>
        <td width="46%"><label for="fileField3"></label>
          <input type="file" name="userfile2" id="fileField3"></td>
        <td width="34%"><span class="content-right"><img src="<?php echo base_url(); ?>assets/rubriques/<?php echo $this->input->get_post('t') ?>/<?php echo $to_update['image_small'] ?>" width="30" height="30" alt="pas d'image" /></span></td>
      </tr>
     
       
       <!--<tr><td colspan="3">&nbsp;</td></tr>-->
       
       <?php if (($to_update['type_lien'] != 'auto') || ($to_update['type_lien'] != 'NULL')) {
		 if($to_update['type_lien'] == 'fichier'){ 
	   ?>
      	 <!--Fichier à télécharger-->
       <tr id="fichier"><td><label for="userfile3">Fichier :</label></td>
         <td colspan="2"><input type="file" name="userfile3" id="userfile3"></td>
         </tr>      
       <?php }else{?>
       	<tr id="auto-aucun"> <td colspan="3">&nbsp;</td></tr>
		<?php }}?>              
       
       <tr><td colspan="3">&nbsp;</td></tr>                          
       
       <?php if(!empty($to_update['titre'])){?>
     
       <tr>
         <td>Titre : <span style="color:#F00">*</span></td>
         <td colspan="2"><label for="titre"></label>
           <textarea name="titre" cols="36" id="titre"><?php echo $to_update['titre'] ?></textarea></td>
       </tr>
       <tr>
         <td colspan="3">&nbsp;</td>
       </tr>
       <?php }?>
       
       <tr>
         <td>De : <span style="color:#F00">*</span></td>
         <td colspan="2"><select name="debut" id="debut">
           <option value="">Sélectionnez ...</option>
           <option value="JANVIER" <?php if ($to_update['debut']=='JANVIER') echo 'selected'; ?>>JANVIER</option>
           <option value="FEVRIER" <?php if ($to_update['debut']=='FEVRIER') echo 'selected'; ?>>FEVRIER</option>
           <option value="MARS" <?php if ($to_update['debut']=='MARS') echo 'selected'; ?>>MARS</option>
           <option value="AVRIL" <?php if ($to_update['debut']=='AVRIL') echo 'selected'; ?>>AVRIL</option>
           <option value="MAI" <?php if ($to_update['debut']=='MAI') echo 'selected'; ?>>MAI</option>
           <option value="JUIN" <?php if ($to_update['debut']=='JUIN') echo 'selected'; ?>>JUIN</option>
           <option value="JUILLET" <?php if ($to_update['debut']=='JUILLET') echo 'selected'; ?>>JUILLET</option>
           <option value="AOUT" <?php if ($to_update['debut']=='AOUT') echo 'selected'; ?>>AOUT</option>
           <option value="SEPTEMBRE" <?php if ($to_update['debut']=='SEPTEMBRE') echo 'selected'; ?>>SEPTEMBRE</option>
           <option value="OCTOBRE" <?php if ($to_update['debut']=='OCTOBRE') echo 'selected'; ?>>OCTOBRE</option>
           <option value="NOVEMBRE" <?php if ($to_update['debut']=='NOVEMBRE') echo 'selected'; ?>>NOVEMBRE</option>
           <option value="DECEMBRE" <?php if ($to_update['debut']=='DECEMBRE') echo 'selected'; ?>>DECEMBRE</option>
         </select></td>
       </tr>
  
       <tr>
         <td>A : <span style="color:#F00">*</span></td>
         <td colspan="2"><select name="fin" id="fin">
           <option value="">Sélectionnez ...</option>
           <option value="JANVIER" <?php if ($to_update['fin']=='JANVIER') echo 'selected'; ?>>JANVIER</option>
           <option value="FEVRIER" <?php if ($to_update['fin']=='FEVRIER') echo 'selected'; ?>>FEVRIER</option>
           <option value="MARS" <?php if ($to_update['fin']=='MARS') echo 'selected'; ?>>MARS</option>
           <option value="AVRIL" <?php if ($to_update['fin']=='AVRIL') echo 'selected'; ?>>AVRIL</option>
           <option value="MAI" <?php if ($to_update['fin']=='MAI') echo 'selected'; ?>>MAI</option>
           <option value="JUIN" <?php if ($to_update['fin']=='JUIN') echo 'selected'; ?>>JUIN</option>
           <option value="JUILLET" <?php if ($to_update['fin']=='JUILLET') echo 'selected'; ?>>JUILLET</option>
           <option value="AOUT" <?php if ($to_update['fin']=='AOUT') echo 'selected'; ?>>AOUT</option>
           <option value="SEPTEMBRE" <?php if ($to_update['fin']=='SEPTEMBRE') echo 'selected'; ?>>SEPTEMBRE</option>
           <option value="OCTOBRE" <?php if ($to_update['fin']=='OCTOBRE') echo 'selected'; ?>>OCTOBRE</option>
           <option value="NOVEMBRE" <?php if ($to_update['fin']=='NOVEMBRE') echo 'selected'; ?>>NOVEMBRE</option>
           <option value="DECEMBRE" <?php if ($to_update['fin']=='DECEMBRE') echo 'selected'; ?>>DECEMBRE</option>
         </select></td>
       </tr>
       
        <tr><td colspan="3">&nbsp;</td></tr>
       
       <tr>
         <td>Statut : <span style="color:#F00">*</span></td>
         <td colspan="2"><select name="etat" id="etat">
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
        <tr bgcolor="<?php if($n<=8){$bg_article_on = "#F5F5F5";}else{$bg_article_on = "#FFF";} echo $bg_article_on; ?>">
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
			fullPage : true
		});

//]]>
</script>