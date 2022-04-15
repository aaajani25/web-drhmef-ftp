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
<img src="<?php echo base_url(); ?>assets/images/construction.gif" width="150" height="200">
</div>
</div>









