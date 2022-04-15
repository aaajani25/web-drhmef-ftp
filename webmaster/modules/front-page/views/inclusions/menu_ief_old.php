<?php
// matricule du fonctionnaire
$matricule = $this->session->userdata('MATRICULE');

// niveau d'acces
$acces = $this->session->userdata('acces');

//var_dump($this->session->userdata); die(); etatpwd pour modification de mot de passe
$etatpwd = $this->session->userdata('Etat_pass');

// année de notation
$annee = '2016';

// periode de notation
$periode = '3';

$photo = $up_photo = $file_path1 = $file_path2 = '';

if ($this->session->userdata('photo') != '') {
    $file_path1 = $_SERVER['DOCUMENT_ROOT'] . "/identification/photo/" . $this->session->userdata('photo');
    $file_path2 = $_SERVER['DOCUMENT_ROOT'] . "/photos/" . $this->session->userdata('photo');

    if (file_exists($file_path1)) {
        $photo = "/identification/photo/" . $this->session->userdata('photo');
        $up_photo = 0;
    } elseif (file_exists($file_path2)) {
        $photo = "/photos/" . $this->session->userdata('photo');
        $up_photo = 0;
    } elseif ($this->session->userdata('SEXE') == 'MASCULIN') {
        $photo = base_url('assets/espace_fon/images/avatars/av-m.jpg');

        $up_photo = 1;
    } else {
        $photo = base_url('assets/espace_fon/images/avatars/av-f.jpg');

        $up_photo = 1;
    }
} else {
    if ($this->session->userdata('SEXE') == 'MASCULIN') {
        $photo = base_url('assets/espace_fon/images/avatars/av-m.jpg');

        $up_photo = 1;
    } else {
        $photo = base_url('assets/espace_fon/images/avatars/av-f.jpg');

        $up_photo = 1;
    }
}

// fonctions de notation
$notification = $this->espace_mod->notification($matricule);
$notification2016 = $this->espace_mod->notification2014($matricule, $annee);
$notification2014 = $this->espace_mod->notification2014($matricule);
$certification2014 = $this->espace_mod->certification2014($matricule);
$presenceposte2016 = $this->espace_mod->presenceposte2016($matricule);

// routing site
$link = site_url($this->uri->segment(1) . '/' . $this->uri->segment(2));

$nav_en_cours = $titre = '';
$menu = $this->uri->segment(3);

switch ($menu) {
    case 'notation': $nav_en_cours = 'rub2';
        $titre = "NOTATION";
        break;
    case 'controle_presence': $nav_en_cours = 'rub2';
        $titre = "CONTROLE DE PRESENCE";
        break;
    case 'position_speciale': $nav_en_cours = 'rub3';
        $titre = "POSITION SPECIALE";
        break;
    /* case 'demande_acte': $nav_en_cours = 'rub4'; $titre="DEMANDE D'ACTE"; break; */
    case 'recu_demande': $nav_en_cours = 'rub4';
        $titre = "RECU DEMANDE D'ACTE";
        break;
    case 'trt_demande_acte': $nav_en_cours = 'rub4';
        $titre = "DEMANDE D'ACTE";
        break;
    case 'nous_contacter': $nav_en_cours = 'rub5';
        $titre = "reclamation";
        break;
    case 'suivi_dossier': $nav_en_cours = 'rub6';
        $titre = "SUIVI DE DOSSIER";
        break;
    case 'mon_compte': $nav_en_cours = 'rub7';
        $titre = "MON COMPTE";
        break;
    default: $nav_en_cours = '';
        $titre = "FICHE D'IDENTIFICATION";
}
?>

<style type="text/css">
    .navigation--main > li > a{ font-family:Oswald}
    .navigation--main .sub-menu > li > a{background-color:#FFFFFF; border-bottom:1px solid #C0C0C0; font-family:Oswald; }
    .navigation--main .sub-menu > li > a:hover{background-color:#036D00; color:#FFF}/*036D00*/
    .navigation--main .sub-menu > li > a:after{ color:#CCC;}

    #link_active{background-color:#FFFFFF; color:#ff8b26; border-right:1px solid #64B57C; border-bottom:1px solid #ff8b26; text-shadow: none;}
    #link_active:hover{text-decoration:underline}
</style>

<ul id="menu-main-menu" class="navigation--main  js-dropdown menu_small">
    <?php
    if ($acces == 2 || $acces == '') {
        if ($acces == 0 && $etatpwd == 1) {  ?>
             <!--7 MON COMPTE-->
            <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-12">
                <a href="#" <?php if ($nav_en_cours == 'rub7') {
            echo 'id="link_active"'; } ?>
                   >MON COMPTE&nbsp;&nbsp;
                    <img src="<?php echo $photo; ?>" alt="" width="20" height="20" />
                </a>

                <ul class="sub-menu">

                    <li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80">
                        <a href="<?php echo $link . '/mon_compte?mc=2' ?>">Changer de mot de passe</a>
                    </li>

                    <li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80">
                        <a href="<?php echo $link . '/logout'; ?>">Se Déconnecter</a>
                    </li>
                </ul>

            </li>
      <?php
        } else {
            ?>
            <!--1 ACCUEIL-->
            <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-12">
                <a href="<?php echo $link . '/accueil'; ?>">ACCUEIL</a>
            </li>
            
<!--            4 DEMANDE D'ACTE-->
            <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-12">
                <a href="<?php echo $link . '/demande_acte' ?>" >DEMANDE D'ACTE</a>
            </li>
            <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12">
                <a href="<?php echo $link . '/doc_personnel' ?>">DOSSIER DU PERSONNEL</a>
           </li>
           <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12">
                <a href="<?php echo $link . '/gespers' ?>" >GESPERS</a>
           </li>
            <!--5 RECLAMATION-->
            <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12">
                <a href="<?php echo $link . '/contact' ?>">NOUS CONTACTER</a>
            </li>

            <!--7 MON COMPTE-->
            <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-12">
                <a href="#" 
                   >MON COMPTE&nbsp;&nbsp;
                    <img src="<?php echo $photo; ?>" alt="" width="20" height="20" />
                </a>

                <ul class="sub-menu">
                    
                    <li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80">
                        <a href="<?php echo $link . '/mon_compte?mc=2' ?>">Changer de mot de passe</a>
                    </li>
                    <!-- <li id="menu-item-65" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-65">
                        <a href="<?php //echo $link . '/mon_compte?mc=1' ?>">Modifier mes Informations personnelles</a>
                    </li>
                    <li id="menu-item-65" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-65">
                        <a href="<?php //echo $link . '/mon_compte?mc=3' ?>" target="_blank">Imprimer mon espace</a>
                    </li> -->

                    <li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80">
                        <a href="<?php echo $link . '/logout'; ?>">Se Déconnecter</a>
                    </li>
                </ul>

            </li>
    <?php
    }
} else {
    ?>
        <li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80">
            <a href="<?php echo $link . '/logout'; ?>">Se Déconnecter</a>
        </li>
<?php } ?>
</ul>