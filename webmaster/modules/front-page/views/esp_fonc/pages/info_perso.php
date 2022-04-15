<p>&nbsp;</p>
<div id="titre">
    <div class="t_container">
        <h1 class="h_tilte disp-1">
            MODIFICATION DES INFORMATIONS DU COMPTE
        </h1>
    </div>
</div>
<p>&nbsp;</p>

<form name="form1" method="post" action="<?php echo $link . '/mon_compte_do?mc=1' ?>">
    <table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
            <td align="center">
                <table id="tab_court" border="0" align="center" cellpadding="4" cellspacing="2" class="">
                    <tr align="">
                        <td align="">
                            <?php include('message.php'); ?>
                        </td>
                    </tr> 

                    <tr>
                        <td>  <fieldset>
                                <img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx">
                                Numéro CNI ou Attestation 
                            </fieldset> </td>
                    </tr>
                    <tr align="right">
                        <td align="left"><input type="text" name="cni" id="cni" class="champ_de_saisie inactif" placeholder="..." value="<?php echo $cni; ?>"></td>
                    </tr>
                    <tr>
                        <td> <fieldset>
                                <img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
                                Date CNI ou Attestation
                            </fieldset></td>
                    </tr>
                    <tr align="right">
                        <td align="left"><input type="text" name="datecni" id="datepicker" placeholder="..." class="champ_de_saisie inactif" value="<?php echo $datecni ?>"></td>
                    </tr>
                    <tr>
                        <td> <fieldset>
                                <img src="<?php echo base_url('assets/css/form-icones/lieu_monde_v.png') ?>" alt="sbx">
                                Lieu de naissance <span style="color:#C00">(<?php
                                    if (is_array($LieuNaiss)) {
                                        foreach ($LieuNaiss as $k => $valieu_nais) {
                                            echo $valieu_nais['LIB_SPREF'];
                                        }
                                    } else {
                                        echo $LieuNaiss;
                                    }
                                    ?>)</span>
                            </fieldset></td>
                    </tr>
                    <tr align="right">
                        <td align="left"><select name="lieu" id="lieu" class="champ_de_saisie inactif" onChange="keoz()">
                                <option value="">Sélectionnez ...</option>
                                <?php foreach ($ville as $vil) { ?>
                                    <option value="<?php echo $vil['CODE_SPREF'] ?>" <?php if ($vil['CODE_SPREF'] == $this->session->userdata('lieunaiss')) echo 'selected'; ?>><?php echo $vil['LIB_SPREF'] ?></option>
                                <?php } ?>

                                <option value="autre">AUTRE ...</option>
                            </select></td>
                    </tr>
                    <tr id="trix" align="right" style="display:none">
                        <td align="left"><input type="text" name="autre_lieu" id="autre_lieu" class="champ_de_saisie inactif" placeholder="Autre lieu de naissance ..." style="text-transform:uppercase"></td>
                    </tr>
                    <tr>
                        <td><fieldset>
                                <img src="<?php echo base_url('assets/css/form-icones/contact_phone_v.png') ?>" alt="sbx">
                                Téléphone
                            </fieldset></td>
                    </tr>
                    <tr align="right">
                        <td align="left"><input type="text" name="tel" id="tel" class="champ_de_saisie inactif" placeholder="..." value="<?php echo $tel ?>"></td>
                    </tr>
                    <tr>
                        <td><fieldset>
                                <img src="<?php echo base_url('assets/css/form-icones/contact_phone_v.png') ?>" alt="sbx">
                                Cellulaire</fieldset></td>
                    </tr>
                    <tr align="right">
                        <td align="left"><input type="text" name="cel" id="cel" class="champ_de_saisie inactif" placeholder="..." value="<?php echo $cell ?>"></td>
                    </tr>
                    <tr>
                        <td><fieldset>
                                <img src="<?php echo base_url('assets/css/form-icones/contact_phone_v.png') ?>" alt="sbx">
                                Adresse</fieldset></td>
                    </tr>
                    <tr align="right">
                        <td align="left"><textarea name="addr" placeholder="..." id="addr" class="champ_de_saisie inactif"><?php echo $adr ?></textarea></td>
                    </tr>
                    <tr>
                        <td> <fieldset>
                                <img src="<?php echo base_url('assets/css/form-icones/mail_v.png') ?>" alt="sbx">
                                Email</fieldset> </td>
                    </tr>
                    <tr align="right">
                        <td align="left"><input type="email" placeholder="..." name="email" id="email" class="champ_de_saisie inactif" value="<?php echo $this->session->userdata('email') ?>"></td>
                    </tr>
                    <tr align="right">
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="button" id="button" value="Appliquer la modification" class="btn btn-primary"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


    <input name="tb_cni" type="hidden" value="<?php echo $tb_cni ?>">
    <input name="col_cni" type="hidden" value="<?php echo $col_cni ?>">
    <input name="tb_datecni" type="hidden" value="<?php echo $tb_datecni ?>">
    <input name="col_datecni" type="hidden" value="<?php echo $col_datecni ?>">
    <input name="tb_lieu" type="hidden" value="<?php echo $tb_lieu ?>">
    <input name="col_lieu" type="hidden" value="<?php echo $col_lieu ?>">
    <input name="tb_tel" type="hidden" value="<?php echo $tb_tel ?>">
    <input name="col_tel" type="hidden" value="<?php echo $col_tel ?>">
    <input name="tb_cell" type="hidden" value="<?php echo $tb_cell ?>">
    <input name="col_cell" type="hidden" value="<?php echo $col_cell ?>">
    <input name="tb_adr" type="hidden" value="<?php echo $tb_adr ?>">
    <input name="col_adr" type="hidden" value="<?php echo $col_adr ?>">
</form>

<script type="text/javascript">
    jQuery.noConflict();

    jQuery(document).ready(function () {
        jQuery('#lieu').change(function () {
            if (jQuery('#lieu').val() == 'autre') {
                jQuery('#trix').show();
            } else {
                jQuery('#trix').hide();
            }
        }
        );
    });
</script>
