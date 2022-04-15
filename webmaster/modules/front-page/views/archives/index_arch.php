<?php
	// url des pages à contenu dynamique
	$urd = site_url($ctrl).'/';	
	$path_fic = base_url().'assets/rubriques/';
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/page.css">

<style type="text/css">
	.date_actu{margin-bottom:18px; font-style:italic; color:#999; font-size:14px}		
</style>

<div id="page" class="container">
	<?php include($this->uri->segment(4).'.php'); ?>
</div>

