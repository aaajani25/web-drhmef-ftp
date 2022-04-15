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
                     <div align="center">
						 <h3><u>Boite à Messages du DRH</u></h3>
					 </div>
                     <div><strong><u>Objet</u></strong>: <?php echo $nature;?></div> 
				     <div><strong><u>Nom et Prenoms</strong></u> : <?php echo $noms;?></div>
                     <div><strong><u>Email:</strong></u><?php echo $email;?></div>
			         <div><strong><u>message :</strong></u><?php echo $motif;?></div>
                   </td>
                 </tr>
                 <tr>
                 </tr>
               </table>
             </div>
  </body>
</html>