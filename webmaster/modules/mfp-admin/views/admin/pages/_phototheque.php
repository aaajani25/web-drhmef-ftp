<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>RUBRIQUE :&nbsp;PHOTOTHEQUE</strong></td>  
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
    <form name="form1" method="post" action="<?php echo site_url($ctrl.'/phototheque?a=insert') ?>" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="2" cellpadding="4">
      <tr>
        <td width="28%">Album : <span style="color:#F00">*</span></td>
        <td width="72%"><label for="titre2"></label>
          <label for="album"></label>
          <select name="album" id="album" required>
          <option value="">Sélectionnez ...</option> 
          <?php foreach($album as $alb) {?>
          	<option value="<?php echo $alb['lib_album']; ?>"><?php echo $alb['lib_album']; ?></option>
          <?php }?>
          </select> 
            <a href="<?php echo site_url($ctrl.'/open_popup?t=album&a=insert'); ?>" style="text-decoration:none;">Ajouter [+]</a>
          </td>
      </tr>
       
       <input name="type_lien" type="hidden" value="auto"> 
      
       <!--Element d'une liste-->
       <!--Fichier à télécharger-->
       <!--Ouverture d'un site-->
       <!--Vers un autre projet-->             
       
       <input name="type_image" type="hidden" value="wide"> 
        <tr>
         <td>Nombre de photos : <span style="color:#F00">*</span></td>
         <td>
           <select name="nb_up_photo" id="nb_up_photo" style="width:auto" required>
           	<option value="">Sélectionnez ...</option>
            <?php for($i=1;$i<11;$i++){?>
            <option value="<?php echo $i ?>"><?php echo $i; ?></option>
            <?php }?>
           </select>
           </td>
        </tr>
       
        <tr>
         <td colspan="2" align="center">
         (max 1000x1000, 200ko)<br>

         	<div id="photo"></div>
         </td>
       </tr>             
    
    <input name="resume" type="hidden" value="null">
  
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
        <td>Album : <span style="color:#F00">*</span></td>
        <td colspan="2"><label for="album"></label>         
          <select name="album" id="album" required>
            <option value="">Sélectionnez ...</option>
            <?php foreach($album as $alb) {?>
            <option value="<?php echo $alb['lib_album'] ?>" <?php if ($alb['lib_album']==$to_update['album']) echo 'selected'; ?>><?php echo $alb['lib_album'] ?></option>
            <?php }?>
          </select></td>
      </tr>
    <?php if ($to_update['type_image'] != 'NULL') {
		 if($to_update['type_image'] == 'wide'){ 
	   ?>
      <tr id="wide2">
        <td>Photo : (max 1000x1000) </td>
        <td width="52%"><label for="userfile2"></label>
          <input type="file" name="userfile" id="userfile2"></td>
        <td width="22%"><span class="content-right"><img src="<?php echo base_url(); ?>assets/rubriques/<?php echo $this->input->get_post('t') ?>/<?php echo $to_update['image_wide'] ?>" width="30" height="30" alt="pas d'image" /></span></td>
      </tr>     
       <?php }}?>                                                
      <input name="resume" type="hidden" value="null">
       
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
         <td width="26%">&nbsp;</td>
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
    <div style="overflow:auto; height:350px">
<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
        <td colspan="4" class="title-right"><strong>EN LIGNE</strong></td>
      </tr>
      <?php if($online) {foreach($online as $on){?>
      <tr>
        <td width="14%" class="content-right">       
        		<img src="<?php echo base_url(); ?>assets/rubriques/<?php echo $this->input->get_post('t') ?>/<?php echo $on['image_wide'] ?>" width="60" height="50" alt="pas d'image" />       
        </td>
        
        <td width="68%" valign="middle">
       	  <?php echo $on['album'] ?></td>      
          
        <td width="8%" valign="middle"><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&id='.$on['id'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
        
        <td width="10%" valign="middle"><a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>', '<?php echo $on['id'] ?>');">Supp</a></td>
      </tr>
      <?php }}?>
      </table>
       </div>
       
       <p>&nbsp;</p>
       
      <div style="overflow:auto; height:350px">
<table width="100%" border="0" cellspacing="2" cellpadding="4">  
      <tr>
        <td colspan="4" class="title-right"><strong>HORS LIGNE</strong></td>
      </tr>
      <?php if($offline) {foreach($offline as $off){?>
      <tr>
       <td width="14%" class="content-right">       
        		<img src="<?php echo base_url(); ?>assets/rubriques/<?php echo $this->input->get_post('t') ?>/<?php echo $off['image_wide'] ?>" width="60" height="50" alt="pas d'image" />
       </td>
        
        <td valign="middle">        
			<?php echo $off['album'] ?>
        </td>
        
        <td width="8%" valign="middle"><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&id='.$off['id'].'&a=upd') ?>" class="btn btn-modifier">Maj</a></td>
        
        <td width="10%" valign="middle"><a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>', '<?php echo $off['id'] ?>');">Supp</a></td>        
      </tr>
      <?php }}?>
  </table>
  </div>
  </td>
  </tr>
</table>

<script type="text/javascript">
	 $(document).ready(function(){
      $("#nb_up_photo").change(function(){
		  $('#photo').empty();
		  
          var nb=$("#nb_up_photo").val();
		  
		  for(var i=1;i<=nb;i++){
			$("#photo").append('<tr><td>Photo '+i+' :</td><td><input name="userfile[]" type="file" required></td></tr>');
		  }
      });
     });
</script>