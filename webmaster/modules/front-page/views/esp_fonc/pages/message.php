<!--affichage des messages : erreur; succes etc-->

<?php if(!empty($msg)){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';} ?>

        <div id="tab" class="msg <?php echo $msg_type; ?>">
            <?php echo $msg; ?>
        </div>

<script type="text/javascript">
 jQuery.noConflict();

  setTimeout(function(){
	    jQuery("#tab").fadeOut("slow");
  },10000);
</script>

<?php }?>