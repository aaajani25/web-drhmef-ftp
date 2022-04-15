      <div id="tsr_box">
<style type="text/css">
	#form-sbx td, option{padding:6px; color:#333}
	#form-sbx input, select{width:250px; height:35px; padding-left:10px; color:#333}
	
	#tsr_box .msg{				
		text-align:center;
		padding:10px;
		margin:2px 15px;
	}
	
	#tsr_box .msg-erreur{
		border:1px solid #BF0000;	
		background-color:#FFBFBF;
		color:#BF0000;				
	}
	
	#tsr_box .msg-succes{
		border:1px solid #007500;		
		background-color:#C4FFC4;
		color:#007500;		
	}
	
	.btn-sendbox{
		padding:10px; 		 
		color:#FFF; 
		font-family:Oswald;
		background-color:#C00;
		transition:all 0.5s ease-in-out;
		cursor:pointer;
		box-shadow:0px 0px 12px #C00 inset;	
	}
		
	.btn-sendbox:hover{background-color:#900;}
	
	.sb_body{background-color:#000; font-family:'Oswald'; background-image:none; color:#FFF;}
	
	.rote{			
	    transform: rotate(270deg);		
		-ms-transform: rotate(270deg); /* IE 9 */
    	-webkit-transform: rotate(270deg); /* Chrome, Safari, Opera */		
		right:-100px;
		margin-top:90px	;					
		background-color:#000;
		padding:2px 12px;	
	}
	
	.rote span{				 
		color:#FFF;	
		font-size:18px;
		font-family:'Oswald';		
		font-weight:400;
	}
	
	.close-box{background-color:#FFF; width:auto}
	.close-box img{border-radius:10px}
</style>

<div class="ptss__toggle-btn js-ptss-toggle-btn rote">      
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle"><img src="<?php echo base_url('assets/css/ic_action_mail_white.png');?>" alt="mail" width="25" height="25" /></td>    
     
    <td valign="middle">&nbsp;</td>
    <td valign="middle"><span>Ecrire au Ministre</span></td>
  </tr>
</table>
</div>
    
<div class="ptss__header sb_body" id="tbox" style="text-align:left; padding-left:15px">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>MFP :: SENDBOX</td>
    <td align="right"><div class="btn-sendbox js-ptss-toggle-btn" style="margin:0px 10px; padding:2px 5px 2px 2px; height:auto; width:50px">
      <div>Fermer</div>
    </div></td>
  </tr>
</table>

</div>

<div class="ptss__settings sb_body">
	<div class="ptss__single-setting" id="ptss__layout sb_body" style="text-align:left; font-size:18px">
    <table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <img src="<?php echo base_url().'assets/rubriques/';?>/_ministre/<?php echo $ministre['image_small'] ;?>" alt="M" width="32" height="32" style="border-radius:15px; border:none; padding:0px; margin:0px;">
    </td>
    <td valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
    <td valign="middle">Ecrire au Ministre</td>
  </tr>
</table>    	
    </div>
</div>
  
  <!--affichage des messages : erreur; succes etc-->

<?php 
	if(!empty($msg) && $this->uri->segment(3)=='sendbox'){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>" id="senb" style="margin-top:3px">
            <?php echo $msg; ?>
        </div>
        
        <script type="text/javascript"> 
    	setTimeout(function(){
    		document.getElementById('senb').style.display = 'none';
    },10000);
    </script>
<?php }?>


<div class="ptss__single-setting sb_body" id="form-sbx">    
<form action="<?php echo site_url($ctrl.'/sendbox') ?>" method="post">
<table width="100%" border="0" cellpadding="4" cellspacing="5">
  <tr>
    <td>
   
    <!--  <select name="civilite" id="civilite" required style="width:auto">
      	 <option value="M." selected>M.</option>  
         <option value="Mme">Mme</option> 
         <option value="Mlle">Mlle</option>        
      </select>-->
      <input type="text" name="nom_prenoms" required id="nom_prenoms" placeholder="Nom et Prénoms">
   
    </td>
  </tr>
  <tr>
    <td>
     
        <input type="email" name="mail" required id="mail" placeholder="E-mail" class="fit">
      
      </td>
  </tr>
  <tr>
    <td>
    	
    	<input type="text" name="title" required id="title" placeholder="Objet" class="fit">
    
    </td>
  </tr>
  <tr>
    <td align="center"> 
   <!-- <fieldset>
    	<img src="<?php echo base_url('assets/css/ic_action_users.png') ?>" alt="users">-->   	   	
    	<textarea name="msg" required id="msg" rows="5" placeholder="Entrez votre message" style="overflow:auto; padding-left:10px; width:250px"></textarea>
     <!--   </fieldset> -->
    </td>
  </tr>   
  
  <tr>
    <td align="center">  	 
    	<input name="Envoyer" type="submit" class="btn btn-sendbox" style="margin:5px 0px; color:#FFF">  
    </td>
  </tr>    
</table>

<input name="parent" type="hidden" value="accueil">
</form>
</div>

</div>