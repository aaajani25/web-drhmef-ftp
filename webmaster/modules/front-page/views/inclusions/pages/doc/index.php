<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/page.css">

<div id="page" class="container">	
    
 <div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	DOCUMENTATION - <?php echo $titre ?>
  </h1>
  </div>
</div>

<div class="page_art">
	<div class="panel-grid title">
   		<h3 class="widget-title">Liste des <?php echo $titre ?></h3>
    </div>
   
   <div class="page_art_content">
     <table width="100%" border="0" cellpadding="5" cellspacing="5" id="tabb">
  <tr class="row-title">
    <td width="4%">N&deg;</td>
    <td width="76%">Nom du document</td>
    <td width="20%">Voir</td>
  </tr>
  <?php
     $r = 1; 
  	 foreach($docs as $dc){
  ?>
  <tr class="row-content">
    <td><?php echo $r; $r++; ?></td>
    <td style="text-align:left"><?php echo $dc['document'] ?></td>
    <td><a href="<?php echo base_url().'assets/rubriques/'.$dc['lien'] ?>">Télécharger</a></td>
  </tr>
  <?php }?>
</table>

   </div>       
</div>
</div>
<p>&nbsp;</p>