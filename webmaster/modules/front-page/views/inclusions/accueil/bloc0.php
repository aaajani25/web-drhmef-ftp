<!--flash info -->
<?php if ($flash_info){ 
	$nb = count($flash_info);	
?>
<style type="text/css">
	.inf, .cad_inf{background-color:#C00; color:#FFF; padding:0px 10px; font-family:Oswald; font-weight:bold}
	.siteorigin-panels-stretch{background-color:#F5F5F5; border-bottom:1px solid #CCC;}	
</style>

<div class="panel-grid" id="pg-7-0" style="margin-bottom:0px;">
<div class="siteorigin-panels-stretch panel-row-style" data-stretch-type="full">
<div class="panel-grid-cell" id="pgc-7-0-0">

<div class="so-panel widget widget_pt_banner widget-banner panel-first-child panel-last-child" id="panel-7-0-0-0" data-index="0">
   
   <!--flash info-->
    <div class="banner__text" id="flash_info" style="width:100%; padding:0px; margin:0px">
        <table  border="0" cellspacing="0" cellpadding="0">
            <tr>  
              	<td class="cad_inf">FLASH INFO &nbsp;</td>                                               
            	<td>                                                   
                 <marquee direction="left" width="100%" scrollamount="6.5" onmouseover="this.stop()" onmouseout="this.start()" style="font-size:18px; padding:3px;"> 
                    <?php foreach ($flash_info as $fi){
					 $id = $fi['id'];					
					 
					 if($fi['urgent']!='Oui') {
						 $type_fi='INFO';
						 $color = '#333'; 
					 }
				     else {
						 $color = '#F00'; 
					     $type_fi='URGENT';
					 }					 
					 ?>					 
					<!--  <span class="inf">
					  		<?php //echo $type_fi ?>
                      </span>-->
                 &nbsp;
                        <span style="color:<?php echo $color ?>; font-weight:normal; font-family:Oswald;">
							<?php echo $fi['titre'] ?> &nbsp;
                        </span>
				 	 
                       <?php }?>                               	                                        	
                 </marquee> 
                                                     
                </td>            
            
            <!--  <td><a href="#" title="précédent" class="btn_nav_flash">
              	<img src="<?php //echo base_url('assets/css/ic_chevron_left_black_18dp.png') ?>" alt="prec">
                </a></td>
                
              <td><a href="#" title="suivant" class="btn_nav_flash">
              	<img src="<?php //echo base_url('assets/css/ic_chevron_right_black_18dp.png') ?>" alt="suiv">
                </a></td>-->
            </tr>
        </table>
	</div>          
    
    
</div>

</div>
</div>
</div>
<?php }?>