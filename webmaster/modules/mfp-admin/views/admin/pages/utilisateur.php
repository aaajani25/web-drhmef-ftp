<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td class="title"><strong>PROFIL :&nbsp;<?php echo strtoupper($this->input->get_post('t')); ?></strong></td>  
  </tr>
  <tr>
    <td colspan="2"><?php include('message.php'); ?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td width="7%"><input name="button" type="button" value="Valider" class="btn btn-valider" onClick="button_action('val','form1')"></td>
  
   <?php if ($this->session->userdata('profil')=="root"){ ?>  
    <td width="93%"><a href="<?php echo site_url($url.'?t='.$this->input->get_post('t').'&a=insert'); ?>" class="btn btn-nouveau">Nouveau</a></td>
    <?php }?>
  </tr>
</table>

<table width="100%" border="1" cellspacing="2" cellpadding="4" class="content">
  <tr>
    <td width="59%" valign="top">    
    <?php if ($this->input->get_post('a')=='insert'){ ?>
    <form name="form1" method="post" action="<?php echo site_url($ctrl.'/traitement?a=insert') ?>">
    <table width="100%" border="0" cellspacing="2" cellpadding="4">
      <tr>
        <td width="27%">Login :</td>
        <td width="73%"><label for="login"></label>
          <input type="text" name="login" id="login" required>&nbsp;<span style="color:#F00"><?php echo form_error('login') ?></span></td>
      </tr>
      <tr>
        <td>Mot de passe :</td>
        <td><label for="mdp"></label>
          <input type="password" name="mdp" id="mdp" required></td>
      </tr>
      <tr>
        <td>Noms et Prénoms :</td>
        <td><label for="np"></label>
          <input type="text" name="np" id="np" required style="text-transform:uppercase"></td>
      </tr>
      <tr id="tr_profil">
        <td>Profil :</td>
        <td>
          <select name="profil" id="profil">
          <option value="">Sélectionnez un profil ...</option>
          <?php foreach($profil as $p){?>
          	<option value="<?php echo $p['lib_profil'] ?>"><?php echo $p['lib_profil'] ?></option>
          <?php }?>
           <option value="autre" onClick="onRep()">AUTRE ...</option>
          </select>
        </td>
      </tr> 
      
       <tr id="tr_profil2" style="display:none">
          <td>Nouveau profil  :</td>
          <td>
            <input type="text" name="profil2" id="profil2">
          </td>
        </tr>     
    </table>
    
    	<input name="action" type="hidden" value="ins">
    	<input type="hidden" name="t" id="t" value="<?php echo $this->input->get_post('t') ?>">
		<input type="hidden" name="a" id="a" value="insert">
    </form>
    <?php }else{?> 
    <form name="form1" method="post" action="<?php echo site_url($ctrl.'/traitement?a=upd') ?>">   
    <table width="100%" border="0" cellspacing="2" cellpadding="4">
      <tr>
        <td width="27%">Mot de passe actuel  :</td>
        <td width="73%"><label for="np"></label>
          <input type="password" name="mdp" id="mdp"></td>
      </tr>
      <tr>
        <td>Nouveau mot de passe :</td>
        <td><label for="profil2"></label>
          <input type="password" name="nouvo_pass1" id="nouvo_pass1"></td>
      </tr>
      <tr>
        <td>Entrer à nouveau :</td>
        <td><label for="np"></label>
          <input type="password" name="nouvo_pass2" id="nouvo_pass2">
         </td>
      </tr>
      <tr>
        <td>Noms et Prénoms :</td>
        <td><label for="nom"></label>
          <input type="text" name="nom" id="nom" value="<?php echo $this->session->userdata('nom_user') ?>"></td>
      </tr>
      
    
    </table>
    
    	<input name="action" type="hidden" value="upd">
    	<input type="hidden" name="t" id="t" value="<?php echo $this->input->get_post('t') ?>">
		<input type="hidden" name="a" id="a" value="upd">
     </form>
    <?php }?>        	
    </td>
    
    <td width="41%" valign="top">
    
    
    <table width="100%" border="0" cellspacing="2" cellpadding="4">
      <tr>
        <td colspan="4" class="title-right"><strong>UTILISATEURS</strong></td>
      </tr>
          
      <?php foreach($all_profil as $p){?>
      <tr>
        <td width="33%" valign="middle" class="content-right">
        	<?php echo $p['nom_user'].', ('.$p['profil'].')'; ?>
        </td>
          <?php if ($this->session->userdata('profil')=="root"){ ?>
        <td width="33%" align="right" valign="middle" class="content-right">
      
         <select name="s_profil" id="s_profil" style="width:auto">
          <option value="">Changer le profil</option>
          <?php foreach($profil as $prf){?>
          	<option onClick="apply('<?php echo $prf['lib_profil'] ?>', '<?php echo $p['id_user']; ?>');" value="<?php echo $prf['lib_profil']; ?>"><?php echo $prf['lib_profil'] ?></option>
          <?php }?>
          </select>        
     
        </td>
        
        <td width="20%" align="right" valign="middle">        			 
                <a href="javascript:void(0);" class="btn btn-supprimer" onClick="button_action('del','<?php echo $this->input->get_post('t') ?>','<?php echo $p['id_user'] ?>');">Supp</a>                                             
        </td>
        <?php }?>
        
      </tr>
      <?php }?>     
    
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>          
      
    </table>     
         
    </td>
  </tr>
</table>
<script type="text/javascript">
	function onRep(){
		$('#tr_profil2').show();
		$('#tr_profil').hide();
	}
	
	function apply(profil, id){
		var u = '<?php echo base_url() ?>index.php/<?php echo $ctrl ?>';
		
			var t = u+"/change_profil?a=insert&t=utilisateur&p="+profil+"&i="+id;
			
		if(confirm("Confirmez-vous la modification ?")){		
			document.location.href = t;		
		}
	}	
</script>