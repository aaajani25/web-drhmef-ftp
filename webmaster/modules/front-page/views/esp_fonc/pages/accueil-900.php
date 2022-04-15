<div class="acc">
    <!--INFOS GENERALES-->
    <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table">
        <tr valign="middle">
            <td width="3%"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_user.png"  /></td>
            <td width="94%" colspan="2" align="left">INFORMATIONS GENERALES </td>
        </tr>
    </table>

    <table width="100%" border="0" cellspacing="2" cellpadding="7" class="box-content">
        <tr class="row">
            <td width="17%" valign="top">Matricule :</td>
            <td colspan="2" valign="top" class="content"><?php echo $this->session->userdata('matricule') ?></td>

            <!--cadre photo-->
            <td width="26%" rowspan="8" align="center" valign="top" class="photo">
                <img src="<?php echo $photos; ?>" alt="" width="150" height="150" />

                <?php if ($up_photo == 0) { ?>
                    <div class="nom_mat_tof"><?php echo $this->session->userdata('matricule') ?>

                        <?php
                        if ($acces == 3 || $acces == 2) {
                            if (isset($newPassword)) {
                                echo "<b>$newPassword</b>";
                            } else {
                                echo '<br><a href="?resetPwd=true">Afficher le mot de passe</a>';
                            }
                        }
                        ?><br>
                    </div>
                <?php } else { ?>
                    <table width="100%" border="0" cellspacing="2" cellpadding="4">
                        <tr>
                            <td align="center">
                                <?php
                                if ($acces == 3 || $acces == 2) {
                                    if (isset($newPassword)) {
                                        echo "<b>$newPassword</b>";
                                    } else {
                                        echo '<a href="?resetPwd=true">Afficher le mot de passe</a>';
                                    }
                                    ?>
                                    <br>

                                    <a href="javascript:void(0);" onClick="setPhoto('photo');" style="color:#03C; font-family:inherit">[ Charger une photo ]</a>
                                <?php } else { ?>
                                           <?php } ?>
                            </td>
                        </tr>
                    </table>

                    <form action="<?php echo $link . '/photo' ?>" method="post" enctype="multipart/form-data">
                        <table width="100%" border="0" cellspacing="2" cellpadding="4" id="photo" style="display:none">
                            <tr>
                                <td><input name="userfile2" type="file">&nbsp;(jpg, 150x150 max)</td>
                            </tr>
                            <tr>
                                <td><input name="button" type="submit" class="btn btn-primary" value="Valider"></td>
                            </tr>
                        </table>
                    </form>
                <?php } ?>
            </td>
            <!--fin cadre photo-->

        </tr>

        <tr valign="top" class="row">
            <td>Nom et Prénoms :</td>
            <td colspan="2" class="content"><?php echo $this->session->userdata('nom') ?></td>
        </tr>
<!--        <tr valign="top" class="row">
            <td>Nom de jeune fille :</td>
            <td colspan="2" class="content"><?php echo $this->session->userdata('NOMJFILLE') ?></td>
        </tr>-->
        <tr valign="top" class="row">
            <td>Date de Naissance :</td>
            <td colspan="2" class="content"><?php echo $this->session->userdata('date_nais') ?></td>
        </tr>
        <tr valign="top" class="row">
            <td>Lieu de Naissance :</td>
            <td colspan="2" class="content">
              <?php echo $this->session->userdata('lieu_nais') ?>
            </td>
        </tr>
        <tr valign="top" class="row">
            <td>Nom du Père :</td>
            <td colspan="2" class="content"><?php echo $this->session->userdata('nom_pere') ?></td>
        </tr>
        <tr valign="top" class="row">
            <td>Nom de la Mère :</td>
            <td colspan="2" class="content"><?php echo $this->session->userdata('nom_mere') ?></td>
        </tr>
    </table>
                <!--<span style="float:right; margin-bottom:4px"><input type="file" name="userfile" id="userfile"></span>-->
    <!--upload photo-->
        <!--<table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="right"><label for="userfile"></label>
            <input type="file" name="userfile" id="userfile"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>-->
    <!--upload photo-->

    <table width="100%" border="0" cellspacing="2" cellpadding="7" class="box-content">
        <tr valign="top" class="row">
            <td width="17%">Sexe :</td>
            <td colspan="3" class="content"><?php echo $this->session->userdata('sexe') ?></td>
        </tr>
<!--        <tr valign="top" class="row">
            <td>Numéro CNI :</td>
            <td width="40%" class="content"><?php //echo $this->session->userdata('numcni') ?></td>
            <td width="17%">Date CNI :</td>
            <td width="26%" class="content"><?php //echo $this->session->userdata('date_cni') ?></td>
        </tr>-->
        <tr valign="top" class="row">
            <td>Téléphone :</td>
            <td class="content"><?php echo $this->session->userdata('tel_bureau') ?></td>
            <td>Cellulaire :</td>
            <td class="content"><?php echo str_pad($this->session->userdata('cellulaire'),8,0,STR_PAD_LEFT) ?></td>
        </tr>
        <tr valign="top" class="row">
            <td>Adresse :</td>
            <td class="content"><?php echo $this->session->userdata('adresse') ?></td>
            <td>Email :</td>
            <td class="content"><?php echo $this->session->userdata('email') ?></td>
        </tr>
        <tr valign="top" class="row">
            <td>Situation matrimoniale  :</td>
            <td class="content"><?php echo $this->session->userdata('sitmat') ?></td>
            <td>Nombre d'enfant :</td>
            <td class="content"><?php echo $this->session->userdata('nbre_enf') ?>&nbsp;
                <!--      <a href="javascript:void(0);" onClick="toggle_enft('child')" style="color:#03C; float:center; font-weight:normal" title="liste des enfants">détails [+/-]</a> -->
            </td>
        </tr>
    </table>
    <!--FIN INFOS GENERALES-->
    <!--EMPLOI-->
    <table width="100%" border="0" cellspacing="2" cellpadding="2" class="box-table">
        <tr valign="middle">
            <td width="3%" align="left"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_business.png"  /></td>
            <td width="89%" align="left">RENSEIGNEMENTS ADMINISTRATIFS</td>

        </tr>
    </table>

    <span id="popup1">

        <table width="100%" border="0" cellpadding="0" cellspacing="1" class="box-content">
            <tr>
                <td valign="top" width="50%">
                    <table width="100%" border="0" align="" cellpadding="4" cellspacing="4">
                        <tr class="">
                            <td width="28%" height="50" align="left">Matricule :</td>

                            <td width="72%" height="50" align="left"><span class="content">
                                    <?php echo $this->session->userdata('matricule') ?>
                                </span></td>
                        </tr>
                        <tr class="">
                            <td width="22%" height="50" align="left">Structure :</td>

                            <td width="78%" height="50" align="left"><span class="content">
                                    MINISTERE DE l'ECONOMIE ET DES FINANCES
                                </span></td>
                        </tr>
                        <tr class="">
                            <td width="22%" height="50" align="left">Direction Générale :</td>

                            <td width="78%" height="50" align="left"><span class="content">
                                    <?php echo $this->session->userdata('lib_dg') ?>
                                </span></td>
                        </tr>
                        <tr class="">
                            <td width="22%" height="50" align="left">Direction Centrale :</td>

                            <td width="78%" height="50" align="left"><span class="content">
                                    <?php echo $this->session->userdata('lib_dir') ?>
                                </span></td>
                        </tr>
<tr class="">
                            <td height="50" align="left" bgcolor=""><span class="">Date de prise de service :</span></td>

                            <td height="50" align="left" class="content">
                                <?php echo $this->session->userdata('date_1ere_ps') ?>
                                </td>
                        </tr>
                        <tr class="">
                            <td height="50" align="left" bgcolor=""><span class="">Emploi :</span></td>

                            <td height="50" align="left" class="content">
                                <?php
                                    echo $this->session->userdata('emploi');

                                ?></td>
                        </tr>
                    </table>
                </td>

                <td width="50%" valign="top" bgcolor="">
                    <table width="100%" border="0" align="center" cellpadding="4" cellspacing="4">
                        <tr class="row">
                            <td width="20%" height="50" align="left">Type Agent :</td>
                            <td width="80%" height="50" align="left" class="content"><?php echo $this->session->userdata('type_agent') ?></td>
                        </tr>

                        <?php //if ($universel =='universel') {    ?>
<!--                        <tr class="row">
                            <td height="50" align="left" bgcolor="">Type Recrutement :</td>
                            <td height="50" align="left" class="content"><?php echo $this->session->userdata('type_recru') ?></td>
                        </tr>
                        <tr class="row">
                            <td height="50" align="left" class="">Mode Recrutement :</td>
                            <td height="50" align="left" class="content"><?php echo $this->session->userdata('mod_recru') ?></td>
                        </tr>-->
                        <?php //}    ?>
                        <tr class="row">
                            <td height="50" align="left">Grade :</td>

                            <td height="50" align="left" class="content"><?php echo $this->session->userdata('grade') ?></td>
                        </tr>
                        <tr class="row">
                            <td height="50" align="left" width="35%">Classe / Echelon :</td>
                            <td height="50" align="left" class="content">
                            <?php
                            echo $this->session->userdata('echelle');
                             ?>
                            </td>
                        </tr>
<!--                        <tr class="row">
                            <td height="50" align="left">Echelon :</td>

                            <td height="50" align="left" class="content"><?php
                            //recuperation de l'echelon
                            $lg=strlen($this->session->userdata('echelle'));
                                echo $this->session->userdata('echelle')[$lg-1];
                            ?></td>
                        </tr>-->
                        <tr class="row">
                            <td height="50" align="left">Date de départ à la retraite  :</td>
                            <td height="50" align="left" class="content"><?php echo $this->session->userdata('date_retraite') ?></td>
                        </tr>

                    </table></td>
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

    <span id="popup2">
        <table width="100%" border="0" cellspacing="2" cellpadding="4" class="box-content">
            <tr class="row">
                <td width="50%">Fonction Actuelle</td>
                <td width="50%" class="content"><?php echo $this->session->userdata('fonction') ?></td>
            </tr>
            <tr class="row">
                <td width="50%">Date d'entrée :</td>
                <td width="50%" class="content"><?php echo $this->session->userdata('date_emploi') ?></td>
            </tr>
            <tr class="row">
                <td width="50%">Acte de nomination :</td>
                <td width="50%" class="content"><?php echo $this->session->userdata('hfonc_reference') ?></td>
            </tr>

        </table>
    </span>
    <!--FIN ETAT AGENT-->
    <br>
</div>
