<p>&nbsp;</p>
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	PRET BANCAIRE
</h1>
  </div>
</div>
  <p>&nbsp;</p>

<div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">  

<div class="panel-grid-cell" id="pgcx-7-1-0">
<h3 class="widget-title" style="text-align:left">Attestation Administrative pour prêt bancaire</h3> 

<p>
<?php include('message.php'); ?>

<form action="<?php echo site_url($ctrl.'/trt_demande_acte') ?>" method="post">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr class="">
    <td><select name="nbre_conc" id="nbre_conc" required="required" class="champs_de_saisie copie">
      <option value="1">1</option>
    </select>
      &nbsp;
      <input name="cout" type="text" class="champ_de_saisie" readonly="readonly" value="3000" id="cout" style="font:bold; width:auto" />
      &nbsp; FCFA</td>
  </tr>
  <tr>
    <td> <fieldset>
    </fieldset></td>
  </tr>
  <tr>
    <td><?php /*?><?php include('rdv_paiement.php'); ?><?php */?></td>
  </tr>
 
  <tr>
    <td><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/article_v.png') ?>" alt="sbx">
                   Motif <span style="color:#F00">*</span>
                  </fieldset></td>
  </tr>
  <tr>
    <td><textarea name="motif" placeholder="..." rows="5" id="motif" required></textarea></td>
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

<input name="da" type="hidden" value="1">    
<input name="id_acte" type="hidden" value="A0097">      
</form>
</p>

</div>
   
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
<h3 class="widget-title">Note d'Information</h3>
     
<div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
<div class="page-box page-box--block post-7 page type-page status-publish hentry" style="padding-left:3px"> 

<!--contenu-->      	      
<div class="warning">
Le Ministre de la Fonction Publique informe les fonctionnaires et agents de l'Etat, que désormais le paiement <br> 
des frais d'établissement de l'attestation de prêt bancaire se fera désormais en ligne avec MTN Mobile Money sur le site du ministère :<br />
<span style="text-decoration: underline;">www.fonctionpublique.gouv.ci</span>, dans l'espace fonctionnaire.
</div> 
<p>&nbsp;</p>
  <div>
    <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="8%" valign="middle"><img src="<?php echo base_url('assets/css/icones-rs/new-r.png'); ?>" alt="new" width="30" height="30"></td>
  
    <td width="92%"> <a href="https://fonctionpublique.laatech.com/payacte/print.php" target="_blank" style="font-size:15px; color:#03C;">
    Cliquez ICI pour imprimer son Acte de Prêt Bancaire déjà payé...</a></td>
  </tr>
</table>

   </div>                                        
</div>   
</div>
<!---->
</div>     
</div>