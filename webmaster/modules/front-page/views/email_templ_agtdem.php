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
                     <div>
                        <?php  if(date('G') >= 0 && date('G') < 13) { $salut='Bonjour'; } else { $salut='Bonsoir'; } ?>
                        <p><?php echo $salut.' '.$nom.' '.$prenoms; ?></p>
                        <p>Nous accusons réception de votre demande d'avis favorable en date du <?php echo date('d/m/Y');  ?>, avec pour informations
                           votre date de prise de service: <?php echo $prise_service;?>, votre Emploi : <?php echo $emploi; ?>, Votre ministère d'origine : <?php echo $ministere; ?>,
                           et date de naissance: <?php echo $date_naissance; ?>. 
                           Nous vous assurons qu'une reponse adéquate sera apportée par nos services. 
                        </p>
                      </div>
                      <div>
                        <p><strong>Adresse</strong> : 04 BP 189 Abidjan 04</p>
                        <p><strong>Téléphone</strong> : (225) 27-20-21-92-00</p>
                        <p><strong>Fax</strong> : (225) 27-20-21-45-77</p>
                        <!-- <p><strong>E-mail</strong> : drhmef@finances.gouv.ci</p> -->
                        <p><strong>Site web</strong> : www.drh.finances.gouv.ci</p>
                        <p><strong>Situation géographique</strong> : <br>
                          Abidjan Plateau – Immeuble du Stade, 1er, 2ème et 3ème étages</p>
                      </div>
                      <div>Ceci est un mail automatique merci de ne pas y repondre</div>
                   </td>
                 </tr>
            </table>
          </div>
    </body>
</html>
