<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MISE A JOUR  - DRH / MEF</title>
    <meta charset="utf-8" />
  </head>
	
  <body>
    <font color="#303030";>
             <div align="center">
               <table width="900px" style="border:1px solid #000; background-color:#9FC;font-size:14px;">
                 <thead>
                 <tr>
                 <th colspan="2">MISE A JOUR FICHIER AGENT</th>
                 </tr>
                 </thead>
                 <tr>
                 <td>Date :</td>
                 <td>&nbsp;<?php echo date('d-m-Y h:i:s'); ?></td>
                 </tr>
                 <tr>
                 <td>insertions:</td>
                 <td><?php echo $insert; ?></td>
                 </tr>
                 <tr>
                 <td>Modifications :</td>
                 <td><?php echo $modif; ?></td>
                 </tr>
                 <tr>
                 <td>Total mise à jour :</td>
                 <td><?php echo $total; ?></td>
                 </tr>
                 <tr>
                 <td>Total des agents à ce jour  :</td>
                 <td><?php echo $total_agt; ?></td>
                 </tr>
               </table>
             </div>
  </body>
</html>