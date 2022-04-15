<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plaintes ou reclamations - DRH / MEF</title>
           <meta charset="utf-8" />

  </head>
  <body>
    <font color="#303030";>
             <div align="center">
               <table width="700px" style="border:1px solid #000; background-color:#9FC">
                 <tr>
                   <td>
                     <div align="center"><h3><u><?php echo $service;  ?></u></h3></div>
                     <div><strong><u>Objet</u></strong>:<?php echo $nature;  ?></div>
                     <div>
                       <span style="text-align:center"><h5><u>Identite du Plaignant</h5></u></span>
                       <p><strong><u>Nom et Prenoms</strong></u> : <?php echo $noms;  ?></p>
                       <p><strong><u>Email:</strong></u> <?php echo $email;  ?></p>
                     </div>
                      <div><strong><u>Informations :</strong></u> <?php echo $motif;  ?></div>
                   </td>
                 </tr>
                 <tr>
                 </tr>
               </table>
             </div>
  </body>
</html>