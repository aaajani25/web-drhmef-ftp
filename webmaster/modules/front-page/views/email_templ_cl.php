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
                     <div>
                   <p>Bonjour Mr/Mne/Mlle <?php echo $noms;  ?></p>
                   <p>Nous accusons réception de votre <?php echo substr($nature,0,strlen($nature)-1); ?> en date du <?php echo date('d/m/Y');  ?> et vous assurons que votre requete a été bien transmise à notre service competent pour analyse et traitement.</p>
                   </div>
                   <div>Ceci est un mail automatique merci de ne pas y repondre</div></td>
                 </tr>
                 <tr>
                 </tr>
               </table>
             </div>
  </body>
</html>