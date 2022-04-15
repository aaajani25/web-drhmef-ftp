<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Demande d'avis favorable - DRH / MEF</title>
    <meta charset="utf-8" />
  </head>

  <body>
	<font color="#303030";>
          <div align="center">
             <table width="600px" style="border:1px solid #000; background-color:#9FC">
                 <tr>
                   <td>
                     <div align="center"><h3><u>DEMANDE D'AVIS FAVORABLE</u></h3></div>
                     <div>Date : <?php echo date('d/m/Y');?></div>
                     <div>Objet : <?php echo $nature;?></div>
                     <div>
                       <span style="text-align:center"><h5><u>IDENTITE DU DEMANDEUR</h5></u></span>
                       <p>Matricule : <?php echo $matricule; ?></p>
                       <p>Nom et Prénoms : <?php echo $nom.' '.$prenoms; ?></p>
                       <p>Date de naissance : <?php echo $date_naissance; ?></p>
                       <p>Ministère d'origine : <?php echo $ministere; ?></p>
                       <p>Emploi : <?php echo $emploi; ?></p>
                       <p>Date de prise de Service : <?php echo $prise_service; ?></p>
                       <p>Email & téléphone : <?php echo $email.' / '.$telephone; ?></p>
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