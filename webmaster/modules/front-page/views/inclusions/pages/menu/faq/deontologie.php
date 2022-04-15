<style type="text/css">
 .panel-group .panel {
border-radius: 5px;
border-color: #EEEEEE;
padding:0;
}

.panel-default > .panel-heading {
color: #fff;
background-color:#f2f2f2;
border-color: #EEEEEE;
}

.panel-title {
font-size: 14px;
}

.panel-title > a {
display: block;
padding: 15px;
text-decoration: none;
}

.short-full {
float: right;
color:#000000;
}

.panel-default > .panel-heading + .panel-collapse > .panel-body {
border: solid 1px #EEEEEE;
background-color: #ffffff;

}
</style>
<!--titre de la page-->
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">FOIRE AUX QUESTIONS(DEONTOLOGIE)
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
  <!-- <div class="page_art_content">
        <p><strong>Article 2 - Le Cabinet comprend </strong>:</p>
        <p style="color:#090909">
        L’éthique est une réflexion sur les valeurs qui orientent et motivent notre action. L’éthique nous invite à réfléchir sur les valeurs qui motivent son action et à choisir, sur cette base, la conduite la plus appropriée.
       </p>
  </div> !-->
  <div class="page_art">
  <div class="page_art_content">

<div class="container " style="width: 750px;">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php $i=0;foreach($faqs_deonto as $fq):$i++;?>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" <?php echo 'id="heading'.$i.'"' ; ?>>
        <h6 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion"  <?php echo 'href="#collapse'.$i.'"' ; ?> aria-expanded="true"
          <?php echo 'aria-controls="collapse'.$i.'"' ; ?>>
            <i class="short-full fa fa-plus"></i>
            <?php echo $fq['question']; ?>
          </a>
        </h6>
      </div>
      <div <?php echo 'id="collapse'.$i.'"' ; ?> class="panel-collapse collapse" role="tabpanel"  <?php echo 'aria-labelledby="heading'.$i.'"' ; ?>>
        <div class="panel-body">
            <p style="text-align: justify; color:#090909;"><?php echo $fq['reponse']; ?></p>
        </div>
      </div>
    </div>
<?php endforeach;?>
</div>
</div>








