<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>GESTION DES GROUPES DE REPONSE</strong></td>  
  </tr>
  <tr>
    <td><?php include('message.php'); ?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td width="9%"><a href="<?php echo site_url('mfp-admin/siteback/open_popup?t='.$this->input->get_post('t').'&a=insert'); ?>" class="btn btn-nouveau">Nouveau</a></td>
    <td width="91%"><a href="<?php echo site_url('mfp-admin/siteback/homepage?t=_sondage&a=insert') ?>">Retour aux sondages</a></td>
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
        <tr id="grp">
          <td width="18%">Groupe  : <span style="color:#F00">*</span></td>
          <td width="82%">         
            <select name="group" id="rep" required>
            <option value="" selected>Sélectionnez ...</option>
              <?php foreach($reponse as $rep){?>
              <option value="<?php echo $rep['groupe'] ?>"><?php echo $rep['groupe'] ?></option>             
              <?php }?>
               <option value="autre" onClick="onRep()">AUTRE ...</option>
              </select></td>
        </tr>
        
        <tr id="other" style="display:none">
          <td>Nouveau groupe  : <span style="color:#F00">*</span></td>
          <td>
            <input type="text" name="group2" id="ch2">
          </td>
        </tr>
      
        <tr>
         <td>Nombre de réponses : <span style="color:#F00">*</span></td>
         <td>
           <select name="nb_choix" id="nb_choix" style="width:auto" required>
           	<option value="">...</option>
            <?php for($i=1;$i<6;$i++){?>
            <option value="<?php echo $i ?>" onClick="show_field(<?php echo $i; ?>)"><?php echo $i; ?></option>
            <?php }?>
           </select>
           </td>
        </tr>
        
      <tr>
         <td colspan="2" align="">
         	<div id="field"></div>
         </td>
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
      <form name="form-maj" id="form_maj" method="post" action="<?php echo site_url($ctrl.'/upd_reponse?grp='.$this->input->get_post('grp').'&a=upd&t=_reponse') ?>">
      
      <table width="100%" border="0" align="center" cellpadding="4" cellspacing="2" class="tab">
  <tr>
    <td>    
      <table width="100%" border="0" cellspacing="2" cellpadding="4">
        <tr>
          <td>Groupe :</td>
          <td><label for="textfield10"></label>
            <input type="text" name="new_grp" id="new_grp" value="<?php echo $this->input->get_post('grp') ?>" required></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <?php foreach($all_rep as $rep){ $n=1;?>
        <tr valign="middle">
          <td>Choix  :</td>
          <td>
            <input type="text" name="ch[]" id="ch<?php echo $n; ?>" value="<?php echo $rep['reponse'] ?>" required><!--&nbsp;&nbsp;<a href="#">Supp</a>--></td>
        </tr>
        <input type="hidden" name="id[]" id="id<?php echo $n; ?>" value="<?php echo $rep['id'] ?>">
 <?php $n++;}?>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="25%" align="center">&nbsp;</td>
          <td width="75%"><input type="button" name="button2" id="button_maj" value="Appliquer la modification" style="height:40px; width:200px"></td>
          </tr>
      </table>        
    </td>
  </tr>
</table>
      
        <input name="action" type="hidden" value="upd">
      	<input type="hidden" name="a" id="a" value="upd">
        
		<input type="hidden" name="t" id="t" value="<?php echo $this->input->get_post('t') ?>">
        
        <input type="hidden" name="grp" id="grp" value="">        	
         <script>
	   $("#button_maj" ).click(function() {				           $('#grp').val($('#new_grp').val());
	       $('#form_maj').submit();
		});
	  </script>
      </form>
      <?php }?>           

    <p>&nbsp;</p>
    </td>
    
    <td width="43%" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="4">
      <tr>
        <td colspan="3"><strong>Groupes</strong></td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;<span id="contentqst"></span></td>
      </tr>
      <?php foreach($reponse as $rp){?>
      <tr>
        <td><?php echo $rp['groupe']; ?></td>
        <td align="right"><a href="<?php echo site_url('mfp-admin/siteback/open_popup?grp='.$rp['groupe'].'&a=upd&t='.$this->input->get_post('t')) ?>" class="btn btn-modifier">Maj</a></td>
        
        <td align="right">  
        <a href="javascript:void(0);" class="btn btn-supprimer"  onClick="button_action('del','<?php echo $this->input->get_post('t') ?>', '<?php echo $rp['groupe'] ?>');">Supp</a>     
        </td>
      </tr>
      <?php }?>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

<script type="text/javascript">
	function onRep(){
		$('#other').show();
		$('#grp').hide();
	}
	
	function show_field(nb){				
		$('#field').empty();	
		
		for(var i=1;i <= nb;i++){
			$('#field').append('<tr><td>Réponse '+i+' :</td><td><input name="choix[]" type="text" required></td></tr>');
		}
	}
</script>