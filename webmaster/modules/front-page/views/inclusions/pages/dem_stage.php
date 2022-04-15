<style type="text/css">
 @media (min-width:900px){
	#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}
 }
 .textarea{width:100%}
 .champ_de_saisie{width:100%}

 #pgcx-7-1-0{margin-bottom:0;}

 	.msg{
		border-radius:5px;
		text-align:center;
		padding:10px;
		margin-bottom:10px;
	}

	.msg-erreur{
		border:1px solid #BF0000;
		background-color:#FFBFBF;
		color:#BF0000;
	}

	.msg-succes{
		border:1px solid #007500;
		background-color:#C4FFC4;
		color:#007500;
	}
</style>

<!--titre de la page-->
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">DEMANDES DE STAGE
</h1>
  </div>
</div>

<!--alerte, info, message apres validation de formulaire-->
<!--contenu pour articles-->
<div class="page_art">
  <?php
    //&& $this->uri->segment(3)=='sendbox2'
    if(!empty($msg))
    {
      if($type==1){$msg_type='msg-erreur';}else{$msg_type='msg-succes';}
  ?>
        <div class="msg <?php echo $msg_type; ?>" id="senb" style="margin-top:3px">
            <?php echo $msg; ?>
        </div>

        <script type="text/javascript">
      	     setTimeout(function(){ document.getElementById('senb').style.display = 'none';},10000);
        </script>
  <?php } ?>
  <form action="<?php echo site_url($ctrl.'/sendbox2/st') ?>" method="post" enctype="multipart/form-data">
    <div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">
      <div class="panel-grid-cell" id="pgcx-7-1-0">
          <h3 class="widget-title">Identification du stagiaire</h3>

          <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
                <div class="page-box page-box--block post-7 page type-page status-publish hentry photo">
                    <span style="text-align:left;">
                        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="5">
                          		 <tr>
                                  <td>
                                     <fieldset>
                                      <img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
                                       Nom & Prénoms<span style="color: #F00">*</span>
                                     </fieldset>
                                  </td>
                               </tr>
                          	   <tr>
                          	     <td colspan="2"><input type="text" name="nom_prenoms" required id="nom_prenoms" class="champ_de_saisie" placeholder="..."></td>
                               </tr>
                               <tr>
                                 <td>
                                   <fieldset>
                                    <img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
                                     Date de naissance:<span style="color: #F00">*</span>
                                   </fieldset>
                                 </td>
                               </tr>
                               <tr>
                                 <td colspan="2"><input type="date" name="date_naissance" required class="champ_de_saisie" placeholder="..."></td>
                               </tr>
                               <tr>
                                <td>
                                    <fieldset>
                                     <img src="<?php echo base_url('assets/css/form-icones/sexe_enfant_v.png') ?>" alt="sbx">
                                      Sexe:<span style="color: #F00">*</span>
                                    </fieldset>
                                </td>
                               </tr>
                               <tr>
                                 <td colspan="2">
                                     <select name="sexe" class="champ_de_saisie">
                                         <option>--- Choisir le sexe ---</option>
                                         <option value="masculin">Masculin</option>
                                         <option value="feminin">Féminin</option>
                                     </select>
                                 </td>
                               </tr>
                               <tr>
                                <td>
                                  <fieldset>
                                    <img src="<?php echo base_url('assets/css/form-icones/lieu_monde_v.png') ?>" alt="sbx">
                                    Nationalité: <span style="color: #F00">*</span>
                                  </fieldset>
                                </td>
                               </tr>
                               <tr><td colspan="2"><input type="text" name="nationalite" class="champ_de_saisie" placeholder="..."></td></tr>
                               <tr>
                                <td>
                                  <fieldset>
                                    <img src="<?php echo base_url('assets/css/form-icones/acc.png') ?>" alt="sbx">
                                    Etablissement d'origine: <span style="color: #F00">*</span>
                                  </fieldset>
                               </tr>
                               <tr>
                                 <td colspan="2"><input type="text" name="etab_origin" class="champ_de_saisie" placeholder="..."></td>
                               </tr>
                               <tr>
                                <td>
                                  <fieldset>
                                    <img src="<?php echo base_url('assets/css/form-icones/article_v.png') ?>" alt="sbx">
                                    Filière: <span style="color: #F00">*</span>
                                  </fieldset>
                                </td>
                               </tr>
                               <tr>
                                 <td colspan="2"><input type="text" name="filiere" class="champ_de_saisie" placeholder="..."></td>
                               </tr>
                               <tr>
                                 <td>
                                   <fieldset>
                                     <img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
                                     Type de stage: <span style="color: #F00">*</span>
                                   </fieldset>
                                 </td>
                               </tr>
                               <tr>
                                 <td colspan="2">
                                     <select name="type_stage" class="champ_de_saisie">
                                         <option>-- Choisir le type de stage --</option>
                                         <option>Professionnelle</option>
                                         <option>Soutenance</option>
                                         <option>Perfectionnement</option>
                                     </select>
                                 </td>
                               </tr>
                               <tr>
                                <td>
                                  <fieldset>
                                    <img src="<?php echo base_url('assets/css/form-icones/lieu_monde_v.png') ?>" alt="sbx">
                                    Nature du diplôme: <span style="color: #F00">*</span>
                                  </fieldset>
                                </td>
                               </tr>
                               <tr><td colspan="2"><input type="text" name="nature_diplome" class="champ_de_saisie" placeholder="..."></td></tr>
                       </table>
                    </span>
                </div>
           </div>

      </div>

      <div class="panel-grid-cell" id="pgcx-7-1-2">
          <h3 class="widget-title">Contacts</h3>

          <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
                <div class="page-box page-box--block post-7 page type-page status-publish hentry photo">
                    <span style="text-align:left;">
                        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="5">
                          		 <tr>
                                  <td>
                                    <fieldset>
                                      <img src="<?php echo base_url('assets/css/form-icones/ic_action_map.png') ?>" alt="sbx">
                                       Adresse Géographique:
                                       <!-- <span style="color: #F00">*</span> -->
                                    </fieldset>
                                  </td>
                               </tr>
                          	   <tr>
                          	     <td colspan="2"><input type="text" name="ad_geo" id="ad_geo" class="champ_de_saisie" placeholder="..."></td>
                               </tr>
                               <tr>
                                 <td>
                                   <fieldset>
                                     <img src="<?php echo base_url('assets/css/form-icones/contact_phone_v.png') ?>" alt="sbx">
                                      Téléphone:<span style="color: #F00">*</span>
                                   </fieldset>
                                 </td>
                               </tr>
                               <tr>
                          	     <td colspan="2"><input type="text" name="telephone" id="telephone" class="champ_de_saisie" required placeholder="..."></td>
                               </tr>
                               <tr>
                                  <td>
                                    <fieldset>
                                      <img src="<?php echo base_url('assets/css/form-icones/mail_v.png') ?>" alt="sbx">
                                       Email:<span style="color: #F00">*</span>
                                    </fieldset>
                                  </td>
                               </tr>
                               <tr>
                                 <td colspan="2"><input type="text" name="email" id="email" class="champ_de_saisie" required placeholder="..."></td>
                               </tr>
                               <tr>
                                  <td>
                                    <fieldset>
                                      <img src="<?php echo base_url('assets/css/ic_action_attachment_2.png') ?>" alt="sbx">
                                      Joindre votre dossier (CV + Diplôme en un fichier au Format pdf - <br> Taille max.: 1Mo):<span style="color: #F00">*</span>
                                    </fieldset>
                                  </td>
                               </tr>
                               <tr>
                                 <td colspan="2"><input type="file" name="dossier" id="file" class="champ_de_saisie" required></td>
                               </tr>
                               <!-- <tr>
                                  <td>
                                    <fieldset>
                                      <img src="<?php echo base_url('assets/css/ic_action_attachment_2.png') ?>" alt="sbx">
                                       Joindre votre diplôme (Format pdf - Taille max.: 1Mo):<span style="color: #F00">*</span>
                                    </fieldset>
                                  </td>
                               </tr>
                               <tr>
                                 <td colspan="2"><input type="file" name="fiche_diplome" id="file" class="champ_de_saisie" required></td>
                               </tr> -->
                               <tr>
                                  <td width="213">
                                    <span style="color: #F00; font-weight: bold;font-size: 15px">
                                      NB: les champs marqués du symbole (*) sont obligatoires
                                    </span>
                                  </td>
                               </tr>
                               <tr>
                                 <td colspan="2"></td>
                                 <input name="parent" type="hidden" value="demande_stage">
                               </tr>
                               <tr>
                                  <td align="right">
                                      <fieldset>
                                          <!-- <input name="Envoyer" type="submit" class="btn btn-primary"> -->
                                          <button name="Envoyer" type="submit" class="btn btn-primary">ENVOYER</button>
                                          <!-- <button name="Envoyer" type="submit" class="btn btn-primary" onclick="fnew()">NOUVEAU</button>
                                          <button name="Envoyer" type="submit" class="btn btn-primary" onclick="fquit()">QUITTER</button> -->
                                      </fieldset>
                                  </td>
                               </tr>
                       </table>
                    </span>
                </div>
           </div>
      </div>
  </form>

</div>
