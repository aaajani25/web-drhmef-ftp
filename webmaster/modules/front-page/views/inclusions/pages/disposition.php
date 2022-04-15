<style type="text/css">	
     @media (min-width:900px){.page_art{width:50%; margin:10px auto}} 
     .champ_de_saisie{width:100%} 
</style>

<div id="pass_get">
     <div id="titre">
          <div class="t_container">
               <h1 class="h_tilte disp-1"><center>CONSULTATION DES MISES A DISPOSITION</center></h1>
          </div>
     </div>

     <?php include('message.php'); ?>

     <div class="page_art" style="padding:2px 10px">
<!--          <small style="color:red; font-style: italic; font-size: 15px;">Les admis peuvent consulter leur MinistÃ¨re d'affectation</small>-->
          <div class="panel-grid title">
               <h3 class="widget-title">Effectuer une recherche</h3>
          </div>      

          <form action="<?php echo site_url($ctrl . '/disposition') ?>" method="post">

               <div class="page_art_content">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                         <tr>
                              <td colspan="2"> 
                                   <fieldset>
                                        MATRICULE 
                                   </fieldset>
                                   <small style="color:red;">Ex : 000000Z</small>
                              </td>
                         </tr>
                         <tr>
                              <td colspan="2">
                                   <input name="Candidat" type="text"  class="champ_de_saisie" placeholder="MATRICULE">
                              </td>
                         </tr>
                         <tr>
                              <td colspan="2"> 
                                   <fieldset>
                                        NOM
                                   </fieldset>
                              </td>
                         </tr>
                         <tr>
                              <td colspan="2">
                                   <input name="spec" type="text" class="champ_de_saisie" placeholder="NOM">
                              </td>
                         </tr>
                         <tr>
                              <td colspan="2"> 
                                   <fieldset>
                                        EMPLOI
                                   </fieldset>
                              </td>
                         </tr>
                         <tr>
                              <td colspan="2">
                                   <select class="form-control" name="emploi" id="emploi">
                                        <option value="" selected="selected">--Selectionnez un Emploi--</option>
                                        <?php
                                        foreach ($res_emp as $k => $v) {
                                             ?>
                                             <option value="<?php echo $v['PA_EM'] ?>">
                                                  <?php echo $v['PA_EMPLOI_LIB'] ?>
                                             </option>
                                        <?php } ?>  
                                   </select>
                              </td>
                         </tr>

                         <tr>
                              <td style="font-family:Arial; font-size:12px;">
                                   <input type="submit" name="btn_bdispo" id="btn_bdispo" value="Rechercher" class="btn btn-primary" />
                              </td>
                              <?php
                              if ($put == 2) {
                                   $btntyp = 'button';
                              } else {
                                   $btntyp = 'hidden';
                              }
                              ?>
                              <td style="font-family:Arial; font-size:12px;"> 
                                   <input type="<?php echo $btntyp; ?>" class="btn btn-success" value="Imprimer" onclick="imprime_zone('disposition', 'page');"> 
                              </td>
                         </tr>
                         <tr>
                              <td style="font-family:Arial; font-size:12px;">&nbsp;</td>
                         </tr>
                    </table>

               </div>


          </form>

     </div>
     <table class="table table-bordered" style="border-collapse: collapse;  border: 1px solid black;">
          <thead>
               <tr>
                    <th style="border: 1px solid black;" scope="col">MATRICULE</th>
                    <th style="border: 1px solid black;" scope="col">NOM PRENOM</th>
                    <th style="border: 1px solid black;" scope="col">EMPLOI</th>
                    <th style="border: 1px solid black;" scope="col">STRUCTURE D'AFFECTATION</th>
                    <th style="border: 1px solid black;" scope="col">SERVICE</th>
                    <th style="border: 1px solid black;" scope="col">LOCALITE</th>
                    <th style="border: 1px solid black;" scope="col">DATE PRISE SERVICE</th>     
               </tr>
          </thead>
          <tbody>
               <?php
               if ($put == 2) {
                    foreach ($dispo as $k => $vdispo) {


                         if (!empty($vdispo['LIB_SC'])) {
                              $service = $vdispo['LIB_SC'];
                         } elseif (!empty($vdispo['LIB_SD'])) {
                              $service = $vdispo['LIB_SD'];
                         } elseif (!empty($vdispo['LIB_DC'])) {
                              $service = $vdispo['LIB_DC'];
                         } elseif (!empty($vdispo['LIB_DG'])) {
                              $service = $vdispo['LIB_DG'];
                         } elseif (!empty($vdispo['LIB_CAB'])) {
                              $service = $vdispo['LIB_CAB'];
                         } else {
                              $service = 'NEANT';
                         }
                         ?>
                         <tr>
                              <td style="font-family:Arial; font-size:12px; border: 1px solid black;"><?php echo $vdispo['MATRICULE'] ?></td>
                              <td style="font-family:Arial; font-size:12px; border: 1px solid black;">&nbsp;&nbsp;<?php echo $vdispo['FC_NOM'] . ' ' . $vdispo['FC_PRENOMS'] ?>&nbsp;</td>
                              <td style="font-family:Arial; font-size:12px; border: 1px solid black;">&nbsp;&nbsp;<?php
                                   if (!empty($vdispo['emploi_option'])) {
                                        echo $vdispo['PA_EMPLOI_LIB'] . ' option ' . $vdispo['emploi_option'];
                                   } else {
                                        echo $vdispo['PA_EMPLOI_LIB'];
                                   }
                                   ?>&nbsp;
                              </td>
                              <td style="font-family:Arial; font-size:12px; border: 1px solid black;">&nbsp;&nbsp;<?php echo $vdispo['libelle'] ?>&nbsp;</td>
                              <td style="font-family:Arial; font-size:12px; border: 1px solid black;">&nbsp;&nbsp;<?php echo $service ?>&nbsp;</td>
                              <td style="font-family:Arial; font-size:12px; border: 1px solid black;">&nbsp;&nbsp;<?php echo $vdispo['LIB_SPREF'] ?>&nbsp;</td>
                              <td style="font-family:Arial; font-size:12px; border: 1px solid black;">&nbsp;&nbsp;<?php if (empty($vdispo['DATE_PSERVICE']))
                              echo 'NEANT';
                         else
                              echo $vdispo['DATE_PSERVICE']
                                        ?>&nbsp;</td>

                         </tr>
          <?php
     }
}elseif ($put == 1) {
     ?>
                    <tr>
                         <td style="font-family:Arial; color:#FF0000; font-size:15px; border: 1px solid black;" colspan="9"><center>DESOLE, VOUS NE FIGUREZ PAS SUR LA LISTE DES PERSONNES AFFECTEES</center></td>
               </tr>
<?php }
?> 
          </tbody>
     </table>
</div>
<script type='text/javascript'>

     function imprime_zone(titre, obj)
     {
// Définie la zone à imprimer
          var zi = document.getElementById(obj).innerHTML;
// Ouvre une nouvelle fenetre
          var f = window.open("", "ZoneImpr", "height=500, width=600,toolbar=0, menubar=0, scrollbars=1, resizable=1,status=0, location=0, left=10, top=10");
// Définit le Style de la page

          f.document.body.style.color = '#000000';
          f.document.body.style.backgroundColor = '#FFFFFF';

          f.document.body.style.padding = "10px";
// Ajoute les Données
          f.document.title = titre;

          f.document.body.innerHTML += "<img src=<?php echo base_url('assets/rubriques/_banniere/BanniereMFPB2.jpg') ?> >" + zi + " ";
// Imprime et ferme la fenetre
          f.window.print();
          f.window.close();
          return true;
     }

</script>