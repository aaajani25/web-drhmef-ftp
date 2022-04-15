<!--INFOS GENERALES-->
<div class="acc">
    <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table">
        <tr valign="middle">
            <td width="3%"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_user.png"  /></td>
            <td width="94%" colspan="2" align="left">INFORMATIONS GENERALES</td>
        </tr>
    </table>

    <table width="100%" border="0" cellspacing="4" cellpadding="4" class="box-content" style="text-align:left">
        <tr>
            <td colspan="2" align="center" class="photo"><img src="<?php echo $photos; ?>" alt="aucune photo" width="150" height="150" />

                <?php
                if ($up_photo == 1) {
                    if ($acces == 3 || $acces == 2) {
                        if (isset($newPassword)) {
                            echo "<b>$newPassword</b>";
                        } else {
                            echo '<br><a href="?resetPwd=true">Afficher le mot de passe</a>';
                        }
                        ?>
                        <br>
                        <a href="javascript:void(0);" style="color:#03C; font-family:inherit" onClick="setPhoto('photo-400');">[ Changer la photo ]</a> <br>
                    <?php } else { ?>
                                 <?php } ?><br>


                    <form action="<?php echo $link . '/photo' ?>" method="post" enctype="multipart/form-data">
                        <table width="100%" border="0" cellspacing="2" cellpadding="4" id="photo-400" style="display:none">
                            <tr>
                                <td><input name="userfile2" type="file">&nbsp;(jpg, 150x150 max)</td>
                            </tr>
                            <tr>
                                <td align="center"><input name="button" type="submit" class="btn btn-primary" value="Valider" style="width:100%;"></td>
                            </tr>
                        </table>
                    </form>
                <?php } else { ?>
                    <div class="nom_mat_tof"><?php echo $this->session->userdata('MATRICULE') ?>

                        <?php
                        if ($acces == 3 || $acces == 2) {
                            if (isset($newPassword)) {
                                echo "<b>$newPassword</b>";
                            } else {
                                echo '<a href="?resetPwd=true">Afficher le mot de passe</a>';
                            }
                        }
                        ?>
                    </div>
                <?php } ?>
            </td>

<!-- <td class="">

</td>-->
        </tr>
        <tr>
            <td width="28%">Matricule</td>
            <td width="72%"><span class="content"><?php echo $this->session->userdata('matricule') ?></span></td>
        </tr>
        <tr>
            <td>Nom  Prénoms</td>
            <td><span class="content"><?php echo $this->session->userdata('nom') ?></span></td>
        </tr>
<!--        <tr>
            <td>Nom  jeune fille</td>
            <td><span class="content"><?php echo $this->session->userdata('NOMJFILLE') ?></span></td>
        </tr>-->
        <tr>
            <td>Date  Naissance</td>
            <td><span class="content"><?php echo $this->session->userdata('date_nais') ?></span></td>
        </tr>
        <tr>
            <td>Lieu  Naissance</td>
            <td><span class="content">
                    <?php echo $this->session->userdata('lieu_nais') ?>
                </span></td>
        </tr>
        <tr>
            <td>Nom  Père</td>
            <td><span class="content"><?php echo $this->session->userdata('nom_pere') ?></span></td>
        </tr>
        <tr>
            <td>Nom  Mère</td>
            <td><span class="content"><?php echo $this->session->userdata('nom_mere') ?></span></td>
        </tr>
        <tr>
            <td>Sexe</td>
            <td><span class="content"><?php echo $this->session->userdata('sexe') ?></span></td>
        </tr>
<!--        <tr>
            <td> NUMERO CNI</td>
            <td><span class="content"><?php //echo $this->session->userdata('num_cni') ?></span></td>
        </tr>
        <tr>
            <td>Date CNI</td>
            <td><span class="content"><?php //echo $this->session->userdata('date_cni') ?></span></td>
        </tr>-->
        <tr>
            <td>Téléphone</td>
            <td><span class="content"><?php echo $this->session->userdata('tel_bureau') ?></span></td>
        </tr>
        <tr>
            <td>Cellulaire</td>
            <td><span class="content"><?php echo str_pad($this->session->userdata('cellulaire'),8,0,STR_PAD_LEFT)</span></td>
        </tr>
        <tr>
            <td>Adresse</td>
            <td><span class="content"><?php echo $this->session->userdata('adresse') ?></span></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><span class="content"><?php echo $this->session->userdata('email') ?></span></td>
        </tr>
        <tr>
            <td>Situation matrimoniale</td>
            <td><span class="content"><?php echo $this->session->userdata('sitmat') ?></span></td>
        </tr>
        <tr>
            <td>Nombre d'enfant</td>
            <td><span class="content"><?php echo $this->session->userdata('nbre_enf') ?></span>&nbsp;
                <!-- <a href="javascript:void(0);" onClick="toggle_enft('child-400')" style="color:#03C; float:right" title="liste des enfants">détails [+/-]</a>--></td>
        </tr>
    </table>
    <!--INFOS GENERALES-->

    <!--EMPLOI-->
    <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table">
        <tr valign="middle">
            <td width="3%" align="left"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_business.png"  /></td>
            <td width="89%" align="left">RENSEIGNEMENTS ADMINISTRATIFS</td>
        </tr>
    </table>


    <span id="popup1-400">
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" class="box-content">
            <tr class="">
                            <td width="28%" height="50" align="left">Matricule :</td>

                            <td width="72%" height="50" align="left"><span class="content">
                                    <?php echo $this->session->userdata('matricule') ?>
                                </span></td>
                        </tr>
            <tr class="">
                <td width="28%" height="50" align="left">Structure </td>

                <td width="72%" height="50" align="left"><span class="content">
                        MINISTERE DE l'ECONOMIE ET DES FINANCES
                    </span></td>
            </tr>
                    <tr class="">
                        <td height="50" align="left" bgcolor="" class="">Direction G&eacute;n&eacute;rale </td>

                        <td height="50" bgcolor="" class="content"><?php echo $this->session->userdata('lib_dg') ?></td>
                    </tr>

                    <tr class="">
                        <td height="50" align="left" class="">Direction Centrale </td>

                        <td height="50" class="content"><?php echo $this->session->userdata('lib_dir') ?></td>
                    </tr>
                    <tr class="">
                        <td height="50" align="left" bgcolor="" class="">Sous Direction </td>

                        <td height="50" bgcolor="" class="content"><?php echo $this->session->userdata('lib_dir') ?></td>
                    </tr>
                    <tr class="">
                        <td height="50" align="left" bgcolor=""><span class="">Date de prise de service :</span></td>

                        <td height="50" align="left" class="content">
                            <?php echo $this->session->userdata('date_1ere_ps') ?>
                            </td>
                    </tr>
            <tr class="">
                <td height="50" align="left" bgcolor=""><span class="">Emploi </span></td>

                <td height="50" align="left" class="content">
                    <?php                                  echo $this->session->userdata('emploi');

                                ?>
                </td>
            </tr>
            <!--  </table>

      <table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" class="box-content">-->
            <tr class="">
                <td width="28%" height="50" align="left">Type Agent </td>
                <td width="72%" height="50" align="left" class="content"><?php echo $this->session->userdata('type_agent') ?></td>
            </tr>

            <?php //if ($universel =='universel') {    ?>
<!--            <tr class="">
                <td height="50" align="left" bgcolor="">Type Recrutement </td>
                <td height="50" align="left" class="content"><?php //echo $this->session->userdata('type_recru') ?></td>
            </tr>
            <tr class="">
                <td height="50" align="left" class="">Mode Recrutement </td>
                <td height="50" align="left" class="content"><?php //echo $this->session->userdata('mod_recru') ?></td>
            </tr>-->
            <?php //}    ?>
            <tr class="">
                <td height="50" align="left">Grade </td>

                <td height="50" align="left" class="content"><?php echo $this->session->userdata('grade') ?></td>
            </tr>
            <tr class="">
                <td height="50" align="left" width="35%">Classe / Echelon : </td>
                <td height="50" align="left" class="content">
                             <?php
                            echo $this->session->userdata('echelle');
                             ?>
                </td>
            </tr>

            <tr class="">
                            <td height="50" align="left">Date de départ à la retraite  :</td>

                            <td height="50" align="left" class="content"><?php echo $this->session->userdata('date_retraite') ?></td>
                        </tr>

        </table>
    </span>
    <!--FIN EMPLOI-->
    <br>

    <!--ETAT AGENT-->
    <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table etat_agent">
        <tr valign="middle">
            <td width="3%" align="left"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_flag.png"  /></td>
            <td width="89%" align="left">EXPERIENCES PROFESSIONNELLES</td>
        </tr>
    </table>

    <span id="popup2-400">
        <table width="100%" border="0" cellspacing="2" cellpadding="4" class="box-content" style="text-align:left">
            <tr class="row">
                <td width="">Fonction Actuelle</td>
                <td width="" class="content"><?php echo $this->session->userdata('fonction') ?></td>
            </tr>
            <tr class="row">
                <td width="">Date d'entrée :</td>
                <td width="" class="content"><?php echo $this->session->userdata('date_emploi') ?></td>
            </tr>
            <tr class="row">
                <td width="">Acte de nomination :</td>
                <td width="" class="content"><?php echo $this->session->userdata('hfonc_reference') ?></td>
            </tr>
        </table>
    </span>
    <!--FIN ETAT AGENT-->
</div>
