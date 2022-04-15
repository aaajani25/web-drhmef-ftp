<?php 
	if(!empty($msg)){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>" id="tab">
            <?php echo $msg; ?>
        </div>
        
        <script type="text/javascript"> 
  setTimeout(function(){	 
	   document.getElementById('tab').style.display='none';	
  },10000);
</script>
<?php }?>
