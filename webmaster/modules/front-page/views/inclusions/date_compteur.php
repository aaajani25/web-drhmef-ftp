   <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    
    <td width="4%" align="right" valign="middle">
    	<span>
			<?php 
			  if($compteur > 1){
				 $vues = 'vues';  
			  }
			  else{
				 $vues = 'vue';   
			  }
			  
			  echo $compteur.' '.$vues; 
			?>
        </span>
     </td>   
  </tr>
</table>