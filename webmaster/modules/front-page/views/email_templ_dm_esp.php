<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Demande Acte - DRH / MEF</title>
    <meta charset="utf-8" />
  </head>

  <body>
	 <font color="#303030";>
          <div align="center">
             <table width="600px" style="border:1px solid #000; background-color:#9FC">
                 <tr>
                   <td>
                     <div align="center"><h3><u> DEMANDE D'ACTE </u></h3></div>
					 <div>Objet: Demande d'un(e)<?php echo $nature;?></div>
                     <div>Motif: <?php echo $message;?></div>
					 <div>Date:<?php echo date('d/m/Y');?></div>
                     <div>
                     <span style="text-align:center"><h5><u>Identite de l'agent</h5></u></span>
                     <p>Nom et Prenoms : <?php echo $noms; ?></p>
		     <p>Matricule :<?php echo $matricule; ?></p>
                     <p>DIRECTION GENERALE :<?php echo $dg; ?></p>
                     <p><?php echo $cs; ?></p>
                     <p>Date de prise de service: 
                      <?php 
                        $fr_date=explode('-',$date_prise_service);
			$date_prise_service=$fr_date[2].'-'.$fr_date[1].'-'.$fr_date[0];
		                        
                       echo $date_prise_service; 
                     ?>
                     </p>
                     <p>Telephone:<?php echo $tel; ?></p>
                     <p>Email:<?php echo $email; ?></p>
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