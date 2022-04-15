<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Demandes de stages - DRH / MEF</title>
    <meta charset="utf-8" />
  </head>

  <body>
	<font color="#303030";>
          <div align="center">
             <table width="600px" style="border:1px solid #000; background-color:#9FC">
                 <tr>
                   <td>
                     <div align="center"><h3><u>DEMANDE DE STAGE</u></h3></div>
                     <div>Date : <?php echo date('d/m/Y');?></div>
                     <div>Objet : <?php echo $nature;?></div>
                     <div>
                       <span style="text-align:center"><h5><u>Identité du Demandeur</h5></u></span>
                       <p>Nom et Prénoms : <?php echo $noms;?></p>
                       <p>Date de naissance : <?php echo $date_naissance;?></p>
                       <p>Filière : <?php echo $filiere;?></p>
                       <p>Diplôme : <?php echo $diplome;?></p>
                       <p>Type de stage : <?php echo $type_stage;?></p>
                       <p>Etablissement : <?php echo $etablissement;?></p>
                       <p>Email & téléphone : <?php echo $email.' / '.$telephone;?></p>
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