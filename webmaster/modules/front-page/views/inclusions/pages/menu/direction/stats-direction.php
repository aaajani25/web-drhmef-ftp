<!--titre de la page-->
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">Statistiques</h1>
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
      <ul>
          <li><a href="<?php echo $urs; ?>/default/stat_genre">Effectifs genre</a></li>
          <li><a href="<?php echo $urs; ?>/default/stat_grade">Effectifs par grade</a></li>
      </ul>
    </div>
</div>
