<!--affichage des messages : erreur; succes etc-->
<style type="text/css">
	.msg{		
		border-radius:5px;	
		text-align:center;
		padding:10px;
		margin-bottom:5px;
	}
	
	.msg-erreur{
		border:1px solid #BF0000;	
		background-color:#FFBFBF;
		color:#BF0000;		
	}
	
	.msg-succes{
		border:1px solid #007500;		
		background-color:#C4FFC4;
		color:#007500;		
	}
</style>

<?php 
	if(!empty($msg)){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div id="tab_info" class="msg <?php echo $msg_type; ?>" style="display:none">
            <?php echo $msg ; ?>
        </div>
<?php }?>

<script type="text/javascript">
  var msg = '<?php echo $msg ?>';
  //var element = document.getElementById('tab_info'); 
  
  if(msg!=''){		 	   	  
	 $("#tab_info").show();	
	  
	   setTimeout(function(){
		  $("#tab_info").fadeOut("slow");
	  },10000);		
  }
</script>

