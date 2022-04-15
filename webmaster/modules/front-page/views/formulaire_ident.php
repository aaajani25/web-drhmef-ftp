<div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">

	    <h3 class="widget-title">Identification</h3>
				<!--contenu-->
        <p>
          <!--affichage des messages : erreur; succes etc-->
					<?php
						if(!empty($msg)){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
					?>
        <div class="msg <?php echo $msg_type; ?>" id="tab">
            <?php echo $msg; ?>
        </div>
        <script type="text/javascript">
				  setTimeout(function(){document.getElementById('tab').style.display='none';},10000);
				</script>
        <?php }?>

        <form id="contactForm" action="<?php echo site_url($ctrl.'/identification/eth') ?>" method="post">
            <div class="row form-group">
              <div class="col-sm-4">
                <strong>Nature du témoignage <span style="color: #F00">*</span></strong>
              </div>
              <div class="col-sm-6">
                <select id="dirg" name="nature" class="form-control">
                  <?php if (!empty($res_nat)){

                     foreach ($res_nat as $nat) {
                       echo  '<option value='.$nat->id.'">'.$nat->libelle.'</option>';
                     }
                   } ?>

                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-sm-4">
                <strong>Souhaitez vous dévoiler votre identité?</strong>
              </div>
              <div class="col-sm-6">
                <select id="identites" name="identite" class="form-control">
                    <option value="Non">Non je préfère rester dans l'anonymat</option>
                    <option value="Oui">Oui je souhaite dévoiler mon identité</option>
                </select>
              </div>
            </div>
             <div class="row form-group">
              <div class="col-sm-4">
                <strong>Email <span style="color: #F00">*</span></strong>
              </div>
              <div class="col-sm-6">
                <input type="email" id="email" name="email" required class="form-control" placeholder="Entrez votre email">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-sm-4">
                <strong>Veuillez saisir le code dans l'image <span style="color: #F00">*</span></strong>
              </div>
              <div class="col-sm-6">
                <?php echo $captchar ?><br/>
                <input type="text"  name="captchar" required class="form-control">
              </div>
            </div>
						<p style="color: #F00; font-weight: bold;font-size: 15px">
		          NB: les champs marqués du symbole (*) sont obligatoires
		        </p>

            <fieldset id="devoileid"  style="border:1px solid black;margin-bottom:10px;">
              <caption>
                <span  style="padding:25px;">Informations personnelles
                </span>
              </caption>
            <div class="container"  style="width:90%; padding:  10px;">
            <div  class="row form-group">
              <div class="col-sm-2">
                Nom
              </div>
              <div class="col-sm-4">
                <input type="text" id="nom" name="nom"  class="form-control" placeholder="Entrez votre nom" required="required">
              </div>
              <div class="col-sm-2">
                Prénom(s)
              </div>
              <div class="col-sm-4">
                <input type="text" id="pnom" name="prenoms" class="form-control" placeholder="Entrez vos prénoms" required="required">
              </div>
            </div>
            <div  class="row form-group">
              <div class="col-sm-2">
               Sexe
              </div>
              <div class="col-sm-4">
                <select id="sexe" name="sexe" class="form-control" required="required">
                    <option value="">--Choix--</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
              </div>
              <div class="col-sm-2">
                Fonction
              </div>
              <div class="col-sm-4">
                <input type="text" id="fonction" name="fonction" class="form-control" placeholder="Entrez votre fonction">
              </div>
            </div>
            <div  class="row form-group">
              <div class="col-sm-2">
               Ville
              </div>
              <div class="col-sm-4">
                <input type="text" id="ville" name="ville"  class="form-control" placeholder="Entrez votre ville" required="required">
              </div>
            </div>
          </div>
          </fieldset>
            <div class="row">
                <div class="col-md-12">
                 <input  type="submit" name="button" class="btn btn-success btn-lg" value="Passez à l'étape suivante"/>
                                      <!--<strong id="msgcreatecpt"></strong>!-->
                </div>
            </div>
            </form>
        </p>
