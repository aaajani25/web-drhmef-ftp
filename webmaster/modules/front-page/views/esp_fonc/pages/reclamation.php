<style type="text/css">
	@media (min-width:900px){#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}} 
</style>

<p>&nbsp;</p>
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	RECLAMATION<span style="text-transform:lowercase"></span>
    </h1>
  </div>
</div>
  <p>&nbsp;</p>
  
<div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">  

<div class="panel-grid-cell" id="pgcx-7-1-0">

<h3 class="widget-title">Faites une réclamation !</h3> 

<p>
<?php include('message.php'); ?>

<form action="<?php echo site_url($ctrl.'/nous_contacter') ?>" method="post" enctype="multipart/form-data">
 <table width="100%" border="0" cellspacing="3" cellpadding="3" class="">
  <tr>
    <td>
       <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Matricule  <span style="color:#F00">*</span></fieldset></td>
  </tr>
  <tr>
    <td><input name="mat" type="text" required class="champ_de_saisie" id="mat" placeholder="..." value="<?php echo $this->session->userdata('MATRICULE');?>" readonly></td>
  </tr>
  <tr>
    <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
               Nom et Prénoms  <span style="color:#F00">*</span></fieldset></td>
  </tr>
  <tr>
    <td><input name="nom" type="text" required class="champ_de_saisie" id="nom" placeholder="..." value="<?php echo $this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS').''.$this->session->userdata('NOMJFILLE');?>" readonly></td>
  </tr>
  <tr>
    <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/mail_v.png') ?>" alt="sbx">
               Email  <span style="color:#F00">*</span></fieldset></td>
  </tr>
  <tr>
    <td><input type="email" name="email" id="email" class="champ_de_saisie" required  placeholder="..." value="<?php echo $this->session->userdata('email');?>"></td>
  </tr>
  <tr>
    <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/contact_phone_v.png') ?>" alt="sbx">
               Tel/Cel</fieldset></td>
  </tr>
  <tr>
    <td><input type="tel" name="tel" id="tel" class="champ_de_saisie" placeholder="..." value="<?php echo $tel.' / '.$cell; ?>"></td>
  </tr>
  <tr>
    <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/edition_objet_v.png') ?>" alt="sbx">
               Objet  <span style="color:#F00">*</span></fieldset></td>
  </tr>
  <tr>
    <td><select name="objet" id="objet" class="champ_de_saisie sel" required placeholder="Objet ...">
      <option value="">Sélectionnez ...</option>
      <?php foreach($objet as $odj){?>
      <option value="<?php echo $odj['email'].'-'.$odj['libelle'] ?>"><?php echo $odj['libelle'] ?></option>
      <?php }?>
    </select></td>
  </tr>
  <tr>
    <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/article_v.png') ?>" alt="sbx">
               Réclamation  <span style="color:#F00">*</span></fieldset></td>
  </tr>
  <tr>
    <td><textarea name="msg" id="msg" cols="45" rows="5" required placeholder="..."></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
         <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/doc_v.png') ?>" alt="sbx">
               Nombre de pièce jointe :
          
           <span style="color:#F00">
           <select name="nb_fichier" id="nb_fichier" style="width:auto">
             <option value="" onClick="show_field(0)">0</option>
             <?php for($i=1;$i<6;$i++){?>
             <option value="<?php echo $i ?>"><?php echo $i; ?></option>
             <?php }?>
           </select>
         </span></fieldset></td>       
        </tr>
       
        <tr>
         <td align="center">
         	<div id="fichier"></div>
         </td>
       </tr> 
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="submit" name="button" id="button" value="Valider la réclamation" class="btn btn-primary"></td>
  </tr>
 </table>
      <input name="parent" type="hidden" value="reclamation"> 
      <input name="send_form" type="hidden" value="rc"> 
      <input name="nc" type="hidden" value="1"> 
</form>
</p>

</div>
   
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
<h3 class="widget-title">Note d'Information</h3>
     
<div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
<div class="page-box page-box--block post-7 page type-page status-publish hentry" style="padding-left:3px"> 

<!--contenu-->      	      
<div class="warning">
Pour toutes vos suggestions adressées au Ministère de la Fonction Publique, faire parvenir ce formulaire dûment rempli !
</div> 
                                          
</div>   
</div>

<p>&nbsp;</p>
     
<div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
<div class="page-box page-box--block post-7 page type-page status-publish hentry" style="padding-left:3px"> 

<!--contenu-->      	      
<div class="lien_recu">
  <div align="center">
    
  </div>
</div> 
                                          
</div>   
</div>

</div>     


</div>

<script type="text/javascript">
	jQuery.noConflict();
	
	jQuery(document).ready(function(){
		jQuery("#nb_fichier").change(function(){				
			jQuery('#fichier').empty();	
			
			var nb=jQuery("#nb_fichier").val();
			 
			if(nb>0){
				for(var i=1;i <= nb;i++){
					jQuery('#fichier').append('<tr><td>Pièce '+i+' :</td><td><input name="userfile[]" type="file" required></td></tr>');
				}	
			}
	 	});
	 });	
</script>