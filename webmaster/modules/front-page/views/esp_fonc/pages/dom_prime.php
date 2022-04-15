<p>&nbsp;</p>
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	DOMICILIATION DE PRIME
 </h1>
  </div>
</div>
  <p>&nbsp;</p>
  
<div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">  

<div class="panel-grid-cell" id="pgcx-7-1-0">
<h3 class="widget-title">Domiciliation de Prime</h3> 

<p>
<?php include('message.php'); ?>

<form action="<?php echo site_url($ctrl.'/trt_demande_acte') ?>" method="post">
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="">         
              <tr class="">
                <td>                        
                <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/doc_v.png') ?>" alt="sbx">
                   Nombre de copie <span style="color:#F00">*</span>
                  </fieldset></td>
              </tr>
              <tr class=""><td> <select name="nbcopie" id="nbcopie" class="champ_de_saisie copie" required onchange="modif_cout();">
                    <?php for($i=1;$i<=10;$i++):?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php endfor;?>                   
                </select>
                 &nbsp;
                <input name="cout" type="text" class="champ_de_saisie" readonly value="2000" id="cout" style="font:bold; width:auto" required> &nbsp; FCFA
               </td></tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
                   Date du paiement <span style="color:#F00">*</span>
                  </fieldset></td>
  </tr>
  <tr class=""><td><?php include('rdv_paiement.php'); ?></td></tr>
     <tr class=""><td>&nbsp;</td></tr>  
  <tr>
    <td><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/article_v.png') ?>" alt="sbx">
                   Motif <span style="color:#F00">*</span>
                  </fieldset>  </td>
  </tr>
  <tr class=""><td><textarea name="motif" placeholder="..." rows="5" id="motif" required></textarea></td></tr>
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

<input name="da" type="hidden" value="4"> 
<input name="id_acte" type="hidden" value="A0128">        
</form>
</p>

</div>
   
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
<h3 class="widget-title">Note d'Information</h3>
     
<div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
<div class="page-box page-box--block post-7 page type-page status-publish hentry" style="padding-left:3px"> 

<!--contenu-->      	      
<div class="warning">
Le respect de la date de rendez-vous pour l'acte de non sanction disciplinaire n'est pas obligatoire. <br>
Vous pouvez toujours payer l'acte malgré l'expiration du delai.
</div> 
                                          
</div>   
</div>
</div>     

<script type="text/javascript">
function modif_cout()
{  
	var t1 = document.getElementById("nbcopie");
	var t2 = document.getElementById("cout");
	
	if(t1)
	{
		t2.readonly="";
		t2.value=(t1.value*2000); 
		t2.readonly="readonly";
		t2.style.color='red';
	}
}
</script>

</div>