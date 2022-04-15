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
             <table width="600px" style="border:1px solid #000; background-color:#9FC">
                 <tr>
                   <td>
                     <div align="center"><h3><u>ECOUTE AGENT </u></h3></div>
                     <div>Date:<?php echo date('d m Y');?></div>
                     <div>Objet:<?php echo $nature;?></div>
                     <div>Message: <?php echo $message;?></div>
                     <div>
                       <span style="text-align:center"><h5><u>Identite du Emeteur</h5></u></span>
                       <p>Nom et Prenoms : <?php echo $noms;?></p>
                       <p>Email:<?php echo $email;?></p>
                     </div>
                     <!--<div></div>-->
                   </td>
                 </tr>
                 <!--<tr>
                 </tr>-->
            </table>
          </div>

  </body>
</html>