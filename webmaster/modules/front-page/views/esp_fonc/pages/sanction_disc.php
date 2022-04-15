<p>&nbsp;</p>
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	NON SANCTION DISCIPLINAIRE
  </h1>
  </div>
</div>
  <p>&nbsp;</p>
  
<div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">  

<div class="panel-grid-cell" id="pgcx-7-1-0">
<h3 class="widget-title">Attestation de non Sanction Disciplinaire</h3> 

<p>
<?php include('message.php'); ?>

<form action="<?php echo site_url($ctrl.'/trt_demande_acte') ?>" method="post">
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="">
 <tr>
    <td><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/doc_v.png') ?>" alt="sbx">
                   Nombre de Concours à payer <span style="color:#F00">*</span>
                  </fieldset></td>
  </tr>
   <tr>
    <td>  <select name="nbre_conc" id="nbre_conc" required class="champs_de_saisie copie">      	
        <option value="1">1</option>
      </select>
        &nbsp;
                <input name="cout" type="text" class="champ_de_saisie" readonly value="3000" id="cout" style="font:bold; width:auto"> &nbsp; FCFA</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
 <!-- <tr>
    <td><fieldset>
    	<img src="<?php //echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
                   Date du paiement <span style="color:#F00">*</span>
                  </fieldset></td>
  </tr>
   <tr>
    <td><?php //include('rdv_paiement.php'); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>-->
  <tr>
    <td><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/article_v.png') ?>" alt="sbx">
                   Motif <span style="color:#F00">*</span>
                  </fieldset> </td>
  </tr>
   <tr>
    <td><textarea name="motif" rows="5" placeholder="..." id="motif" required></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="nota">NB: tous les champs sont obligatoires</td>
  </tr>
  <tr>
    <td><input type="submit" name="button" id="button" value="Valider la demande" class="btn btn-primary"></td>
  </tr>
 
</table>

<input name="da" type="hidden" value="2">
<input name="id_acte" type="hidden" value="A0041">         
</form>
</p>

</div>
   
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
<h3 class="widget-title">Note d'Information</h3>
     
<div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
<div class="page-box page-box--block post-7 page type-page status-publish hentry" style="padding-left:3px"> 

<!--contenu-->      	      
<div class="warning">
le reçu de paiement de l'acte de non sanction disciplinaire est valable pour tous les concours de la session <?php echo date('Y'); ?>.
  <p>&nbsp;</p>
(payable uniquement par MTN Mobile Money pour le moment)
</div> 
   
   <p>&nbsp;</p>
    <div>
    <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="8%" valign="middle"><img src="<?php echo base_url('assets/css/icones-rs/new-r.png'); ?>" alt="new" width="30" height="30"></td>
  
    <td width="92%"> <a href="https://fonctionpublique.laatech.com/payacte/print.php" target="_blank" style="font-size:15px; color:#03C;">
    Cliquez pour imprimer son Acte de Non Sanction Disciplinaire déjà payé...</a></td>
  </tr>
</table>

   </div>
   
</div>   
</div>


</div>     


</div>