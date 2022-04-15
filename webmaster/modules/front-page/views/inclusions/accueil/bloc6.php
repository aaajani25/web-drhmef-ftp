<!--documentations -->
<style type="text/css">
	.gix img{
		/*box-shadow: 0 1px 2px #ededed;*/
		box-shadow:none;
		opacity: 0.9;
	}
	.gix img:hover{
		border:none;
		box-shadow:none;
	}

	.row-gix a{color:#999; padding:5px 20px; text-decoration:none;}
	.row-gix a:hover{ color:#ff8b26; opacity:1}

	@media (max-width:500px){.doc .col-xs-12{width:auto;}}
</style>

<?php if ($categorie){ ?>
<div class="panel-grid" id="pg-7-6" style="margin-bottom:30px">
<div class="panel-grid-cell" id="pgc-7-6-0">
<div class="so-panel widget widget_text panel-first-child panel-last-child" id="panel-7-6-0-0" data-index="14">

<!--titre bloc 6-->
<h3 class="widget-title">DOCUMENTATIONS</h3>

<div class="textwidget">
<div class="logo-panel">

<div class="row">
<div class="row-gix">
<!--contenu-->
<div class="doc">
 <?php foreach ($categorie as $doc){
 // total
 		$docs = $this->nav_mod->read_result_nolimit(
                    '_documentation',
                    array('etat'=>'on', 'titre'=>$doc['libel_categorie']),
                    array('id','desc')
            );

		?>
    <a href="<?php echo site_url($ctrl.'/documentation?v='.$doc['libel_categorie']) ?>" target="_blank" class="col-xs-12  col-sm-2 gix">
    	<img src="<?php echo base_url('assets/') ?>/css/ic_action_document_o.png">
    	<span class="doc"><?php echo $doc['libel_categorie'] ?></span>
    </a>
<?php }?>
</div>
<!--fin contenu-->
</div>
</div>

</div>
</div>

</div>
</div>
</div>
<?php }?>