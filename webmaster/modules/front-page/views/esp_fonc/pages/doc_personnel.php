<!--<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">MFP'SENDBOX - ECRIRE AU MINISTRE</h1>
  </div>
</div><br>-->

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

<div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">
<div class="page_art">

  <?php if(!empty($cat_docs)){
  foreach ($cat_docs as $cat_doc) {
     $info_docs = $this->espace_mod->read_row_l2('document',array('Categorie_Dossier'=>$cat_doc['Categorie_Dossier'],'Matricule'=>$this->session->userdata('matricule')));
    ?>
  <div class="panel-grid title">
      <h3 class="widget-title"><?php echo $cat_doc['Categorie_Dossier'] ?></h3>
  </div>
  <div class="page_art_content">
     <table width="100%" border="0" cellpadding="5" cellspacing="5" id="tabb">
      <tr class="row-title">
        <td width="76%">Nom du document</td>
        <td width="20%">Voir</td>
      </tr>
      <?php if (!empty($info_docs)) {
      foreach ($info_docs as $info_doc) { ?>
      <tr class="row-content">
          <td style="text-align:left; color:#7b7b7b;">
            <?php echo $info_doc['Type_Fichier'] ?></td>
          <td><a href="<?php echo base_url('assets/documents'); ?>/<?php echo $info_doc['Nom_Fichier'] ?>">Télécharger</a></td>
      </tr>
      <?php }}?>
  </table>
   </div>
 <?php }} ?>
</div>
</div>
