<style type="text/css">	
     @media (min-width:900px){.page_art{width:30%; margin:10px auto}} 
     .champ_de_saisie{width:100%} 
</style>

<div id="pass_get">
     <?php
     if ($infomat == 1) {
          // $compo = $this->input->get_post('compo');
          // $dtep = $this->input->get_post('dtep');
          ?>

          <div id="titre">
               <div class="t_container">
                    <h1 class="h_tilte disp-1">VOTRE MATRICULE APRES L'IMMATRICULATION</h1>
               </div>
          </div>
          <div class="esp_fon" style="padding:15px 10px">
               <div class="page_art_content">
                    <?php
                    foreach ($matagent as $k => $v) {
                         ?>
                         <table width="80%" border="0" cellspacing="3" cellpadding="7"  align="center">


                              <tr align="center" class="row">
                                   <td align="right" style="font-weight:bold; font-size:18px;">Numero de Composition :&nbsp;</td>
                                   <td align="left">&nbsp;<?php echo $v['numcomp'] ?></td>
                              </tr>
                              <tr align="center" class="row">
                                   <td align="right" style="font-weight:bold; font-size:18px;">Nom et Prénoms  :&nbsp;</td>
                                   <td align="left">&nbsp;<?php echo $v['nom'] ?>&nbsp;<?php echo $v['prenoms'] ?></td>
                              </tr>
                              <tr align="center" class="row">
                                   <td align="right" style="font-weight:bold; font-size:18px;">Emploi :&nbsp;</td>
                                   <td align="left">&nbsp;<?php echo $v['emploi'] ?></td>
                              </tr>
                              <tr align="center" class="row">
                                   <td align="right" style="font-weight:bold; font-size:18px;">Date Prise Service :&nbsp;</td>
                                   <td align="left" style="color:#09C; font-weight:bold; font-size:18px;">&nbsp;<?php echo $v['DATE_PSERVICE']; ?></td>
                              </tr>
                              <tr align="center" class="row">
                                   <td align="right" style="font-weight:bold; font-size:18px;">Matricule :&nbsp;</td>
                                   <td align="left" style="color:#09C; font-weight:bold; font-size:18px;">&nbsp;<?php echo $v['matricule']; ?></td>
                              </tr>

                         </table>
                    <?php } ?>
               </div>
          </div>
          <div class="esp_fon" style="padding:15px 10px;">
               <table width="80%" border="0" cellspacing="3" cellpadding="7"  align="center">
                    <tr align="center" class="row">
                         <td align="right" style="font:Tahoma; color: #F00; font-size:14px; text-align:center;">
                              NB : Veuillez obligatoirement vous inscrire à l'Espace Fonctionnaire afin de vérifier la disponibilité de vos actes.
                              <a href="../../front-page/navigator/inscription" target="_blank">cliquez ici</a>
                         </td>

                    </tr>
                    <tr align="center" class="row">
                         <td align="right" style="font:Tahoma; color: #F00; font-size:16px; text-align:center;">  
                              <a href="../../front-page/navigator/affectation" target="">Retour</a> 
                         </td>
                    </tr>
               </table>
               <span style="font:Tahoma; color: #F00; font-size:14px; text-align:center">

               </span>
          </div>

          <?php
     } else {
          // formulaire de recherche de matricule d'un agent 
          ?>
          
          <div id="titre">
               <div class="t_container">
                    <h1 class="h_tilte disp-1">OBTENIR  SON MATRICULE APRES L'IMMATRICULATION</h1>
               </div>
          </div>

          <?php
          // var_dump($msg, $infomat, $type); die;
          include('message.php');
          //$compo = $this->input->get_post('compo');
          //$dtep = $this->input->get_post('dateserv');
          ?>

          <div class="page_art" style="padding:2px 10px">

               <div class="panel-grid title">
                    <h3 class="widget-title">Retouver son matricule</h3>
               </div>      

               <form action="<?php echo site_url($ctrl . '/recherche_mat') ?>" method="post">

                    <div class="page_art_content">
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                   <td colspan="2"> 
                                        <fieldset>
                                             NUMERO DE COMPOSITION: 
                                        </fieldset>

                                   </td>
                              </tr>
                              <tr>
                                   <td colspan="2">
                                        <input name="compo" type="text" readonly="readonly"  class="champ_de_saisie" value="<?php echo $compo; ?>">
                                   </td>
                              </tr>
                              <tr>
                                   <td colspan="2"> 
                                        <fieldset>
                                             DATE DE PRISE SERVICE:
                                        </fieldset>

                                   </td>
                              </tr>
                              <tr>
                                   <td colspan="2">
                                        <input name="dtep" type="text" readonly="readonly" class="champ_de_saisie" value="<?php echo $dtep; ?>">
                                   </td>
                              </tr>
                              <tr>
                                   <td colspan="2"> 
                                        <fieldset>
                                             DATE DE NAISSANCE:
                                        </fieldset>
                                   </td>
                              </tr>
                              <tr>
                                   <td colspan="2">
                                        <input name="datenaiss" type="text" class="champ_de_saisie" placeholder="JJ/MM/AAAA">
                                   </td>
                              </tr>

                              <tr>
                                   <td style="font-family:Arial; font-size:12px;"><input type="submit" name="btn_bvalid" id="btn_bvalid" value="Valider" class="btn btn-primary" /></td>
                              </tr>
                              <tr>
                                   <td style="font-family:Arial; font-size:12px;">&nbsp;</td>
                              </tr>
                         </table>

                    </div>


               </form>

          </div>
     <?php } ?>
</div>
