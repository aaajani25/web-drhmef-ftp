<!--titre de la page-->
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">DOCUMENTS DE REFERENCE
</h1>
  </div>
</div>

<!--alerte, info, message apres validation de formulaire-->
<div class="page_msg">
	<?php //echo $msg; ?>
</div>


<!--contenu pour formulaire-->
<!--donnez la classe "champ" à tous les champs de saisie et liste déroulante-->
<!--donnez les classes "btn btn-primary" à tous les boutons-->
<div class="page_form">&nbsp;</div>

<!--contenu pour articles-->
<div class="page_art">

  <div class="page_art_content">
       <!-- <ul style="color:#090909">
            <li><a href="https://www.fonctionpublique.gouv.ci/assets/rubriques/_documentation/loi_92_570_Statut_General_Fonct_Publ1.PDF">Statut général de la fonction publique</a></li>
            <li><a href="#">Décrets d’application du Statut général de la fonction publique</a>
                <ul>
                  <li><a href="http://www.caidp.ci/uploads/2d3eda3a2c076d069168d357ac8a2743.pdf">Décret n° 93-607 du 2 Juillet 1993 portant modalités communes d’application du statut général de la Fonction Publique.
          </a></li>
                  <li><a href="http://www.enseignement.gouv.ci/files/ATT08111.pdf">Décret N°93-609 du 2 Juillet 1993,portant modalités particulières d'application du Statut général de la Fonction Publique .
          </a></li>
            <li><a href="https://www.fonctionpublique.gouv.ci/documentation/limite_age1.pdf
          ">Décret n°2012-652 du 11 juillet 2012 portant fixation de la limite d'âge</a></li>
                  <li><a href="http://www.mamcom.org/images/le-fonctionnaire/decret-n-2015-432-grades-emplois.pdf">decret-n-2015-432 portant classification des grades et emplois</a></li>
                </ul>
            </li>
            <li><a href="http://www.igf.finances.gouv.ci/IgfAdmin/activites/doc/Code_de_deontologie.pdf
">Code d’éthique et de déontologie de l’Inspection Générale des Finances</a></li>
            <li><a href="http://observatoire.tresor.gouv.ci/oed/images/Documents/CED-DGTCP-OEDTP-2eme-edition.pdf">Code d’éthique et de déontologie des Agents du Trésor Public</a></li>
            <li><a href="http://www.habg.ci/fichier/Ordonnance_2013-661.pdf">Ordonnance_2013-661</a></li>
            <li><a href="https://www.fonctionpublique.gouv.ci/index.php/front-page/navigator/documentation?v=R%C3%A9gime%20Disciplinaire">regime disciplinaire des fonctionnaires</a></li>
        </ul> -->

        <table width="100%" border="0" cellpadding="5" cellspacing="5" id="tabb">
         <tr class="row-title">
           <td width="76%">Nom du document</td>
           <td width="20%">Voir</td>
         </tr>
         <?php foreach ($testdocs as $testdoc) { ?>
         <tr class="row-content">
             <td style="text-align:left; color:#7b7b7b;">
               <?php echo $testdoc['nom_document'] ?></td>
             <td><a href="<?php echo $testdoc['lien'] ?>" target="_blank">Consulter</a></td>
         </tr>
       <?php } ?>
       </table>
  </div>
