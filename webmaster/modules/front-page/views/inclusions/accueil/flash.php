 <div id="flash_info" style="background-color: #030; width:100%; padding:0px; margin:0px">
        <table  border="0" cellspacing="0" cellpadding="0">
            <tr>
              	<!-- <td class="cad_inf">FLASH INFO &nbsp;</td> -->
            	<td>
                 <marquee direction="left" width="100%" scrollamount="3.5" onmouseover="this.stop()" onmouseout="this.start()" style="font-size:15px; padding:3px;">
                    <?php foreach ($flash_info as $fi){
                        //type de lien 
                        $attach='';
			// gestion des liens
                        
		switch($fi['type_lien']){
				case "auto":
					$lien = $urd.$fi['lien'];
					$target = "_self";
				break;

				case "site":
					$lien = $fi['lien'];
					$target = "_blank";
				break;

				case "rep":
					$lien = '/'.$fi['lien'];
					$target = "_blank";
				break;

				case "fichier":
                                        $t_lien=explode('/',$fi['lien']);
                                        //$comm['lien']=$lien[1];
                                        $lien=site_url().'/front-page/navigator/affiche_com_pdf/'.$t_lien[1];
					//$lien = $path_fic.$nw['lien'];
					$target = "";
					$attach = "ic_action_attachment_2.png";
				break;

				default :
					$lien = "#";
					$target = "_self";
                        //fin type lien
                }
					 $id = $fi['id'];

					if($fi['urgent']!='Oui') {
						 $type_fi='INFO';
						 $color = '#FFF';
					 }
				     else {
						 $color = '#FFF';
					     $type_fi='URGENT';
					 }
					 ?>
                 &nbsp;
                        <span style="background-color:#C00; color:#FFF; font-weight:bold; padding:4px 4px 5px 4px"><?php echo $type_fi; ?></span>
                        
		
                        
                            <span style="color:<?php echo $color ?>; font-weight:normal; font-family:Oswald;">
                            <?php echo $fi['titre'] ?>
                            </span> &nbsp;
                            <!-- <a href="<?php echo $lien ?>" class="read-more  read-more--page-box" style="text-transform:uppercase;">
                                Lire la suite
                            </a> -->
							<img src="<?php echo base_url() ?>assets/images/certificateur.png" width="70" height="25"/>
                        

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