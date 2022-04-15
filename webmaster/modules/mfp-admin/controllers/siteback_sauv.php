<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Siteback extends MX_Controller {
        private $tab1 = '_phototheque';

        public function __construct(){
            parent::__construct();
                // load model backend
                $this->load->model('mfp-admin/siteback_mod');

                /*if($this->session->userdata('logged_in') !=1){
                    redirect('mfp-admin/connex?f=1', 'refresh');
                }*/
        }

        public function accueil($msg='', $type=''){
            $data['msg'] = $msg;
            $data['type'] = $type;

            $data['page'] = 'pages/accueil';
            $this->load->view('admin/index',$data);
        }

        public function homepage($msg='', $type='') {
            $table = $this->input->get_post('t');
            $traitement = $this->input->get_post('a');

            $data['msg'] = $msg;
            $data['type'] = $type;
            
            if($table=='utilisateur'){

                $data['all_profil'] = $this->siteback_mod->read_result($table, array('profil !='=>''), array('profil','ASC'));
                $data['profil'] = $this->siteback_mod->read('profil');
            }
            else{
                // chargement du contenu pour les mises à jour d'un enregistrement sélectionné
                if($traitement=='upd'){
                    $data['to_update'] = $this->siteback_mod->read_row
                    (
                        $table,
                        array('id' => $this->input->get_post('id'))
                    );
                }

                $data['categorie'] = $this->siteback_mod->read('categorie_doc');
                $data['pnd'] = $this->siteback_mod->read('pnd');
                $data['album'] = $this->siteback_mod->read('album');
                $data['reponse'] = $this->siteback_mod->read_reponse();

                // contenu du volet latéral droit
                $data['online'] = $this->siteback_mod->read_result($table, array('etat'=>'on'),array('id','DESC'));
                $data['offline'] = $this->siteback_mod->read_result($table, array('etat'=>'off'),array('id','DESC'));
            }
               
            $data['page'] = 'pages/'.$table;
            $this->load->view('admin/index',$data);
        }

        public function phototheque() {
            $res = $this->siteback_mod->do_phototheque($this->tab1);

            switch($res){
                // succès
                case 1:
                    $msg = "Traitement effectué avec succès.";
                    $type = 0;
                break;

                // erreur sur l'upload de  l'image
                case 2:
                    $msg = $this->multi_upload->display_errors();
                    $type = 1;
                break;

                default:
                    $msg = "Une erreur est survenue lors du traitement !";
                    $type = 1;
            }

            $this->homepage($msg, $type);
        }

        public function communiques() {
            $res = $this->siteback_mod->do_communiques($this->input->get_post('t'));

            switch($res){
                // succès
                case 1:
                    $msg = "Traitement effectué avec succès.";
                    $type = 0;
                break;

                // erreur sur l'upload de petite image
                case 3:
                    $msg = $this->upload2->display_errors();
                    $type = 1;
                break;

                // erreur sur l'upload de fichier
                case 4:
                    $msg = $this->upload3->display_errors();
                    $type = 1;
                break;

                // champ obligatoire
                case 5:
                    $msg = "Renseigner les champs obligatoires SVP !";
                    $type = 1;
                break;

                default:
                    $msg = "Une erreur est survenue lors du traitement !";
                    $type = 1;
            }

            $this->homepage($msg, $type);
        }

        public function traitement() {
            $table = $this->input->get_post('t');
            $trt = $this->input->post('action');

            if($table=='utilisateur'){
                // creation
                if($trt=='ins'){
                    $config=array(
                        array('field'=>'login','label'=>'login','rules'=>'required|trim|is_unique[utilisateur.login]')
                    );

                    $form = $this->siteback_mod->form_val($config);

                    if($form){
                        $msg = "Renseigner les champs obligatoires SVP !";
                        $type = 1;

                        $this->homepage($msg, $type);
                    }
                    else{
                        $res = $this->siteback_mod->insertion($table);

                        if($res==1){
                            $msg = "Traitement effectué avec succès.";
                            $type = 0;
                        }
                        else{
                            $msg = "Le traitement a échoué !";
                            $type = 1;
                        }

                        $this->homepage($msg, $type);
                    }
                }
                // mise a jour
                else{
                    $config=array(
                        array('field'=>'mdp','label'=>'passe','rules'=>'required|trim'),
                        array('field'=>'nouvo_pass1','label'=>'passe1','rules'=>'required|trim'),
                        array('field'=>'nouvo_pass2','label'=>'passe2','rules'=>'required|trim|matches[nouvo_pass1]')
                    );

                    $form = $this->siteback_mod->form_val($config);

                    if($form){
                        $msg = "Renseignez les champs obligatoires SVP et/ou vérifiez la correspondance !";
                        $type = 1;

                        $this->homepage($msg, $type);
                    }
                    else{
                        $mdp_sess = $this->encrypt->decode($this->session->userdata('pswd'));

                        if($this->input->post('mdp') != $mdp_sess){
                            $msg = "Le mot de passe actuel est incorrect !";
                            $type = 1;

                            $this->homepage($msg, $type);
                        }
                        else{
                            $login = $this->session->userdata('login');
                            $res = $this->siteback_mod->mise_a_jour($table,$login);

                            if($res==1){
                                $msg = "Traitement effectué avec succès.";
                                $type = 0;
                            }
                            else{
                                $msg = "Le traitement a échoué !";
                                $type = 1;
                            }

                            $this->homepage($msg, $type);
                        }
                    }
                }
            }
            else{
                // les rubriques du site
                switch($table){
                     case '_phototheque':
                        $config=array(
                            array('field'=>'etat','label'=>'etat','rules'=>'required|trim')
                        );
                    break;

                    case '_evenement':
                        $config=array(
                            array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
                            array('field'=>'type_lien','label'=>'type_lien','rules'=>'required|trim'),
                            array('field'=>'type_image','label'=>'type_image','rules'=>'required|trim'),
//                            array('field'=>'album','label'=>'album','rules'=>'required|trim'),
                            array('field'=>'titre','label'=>'titre','rules'=>'required|trim')
                        );
                    break;

                    case '_alaune':
                        $config=array(
                            array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
                            array('field'=>'type_lien','label'=>'type_lien','rules'=>'required|trim'),
                            array('field'=>'type_image','label'=>'type_image','rules'=>'required|trim'),
//                            array('field'=>'album','label'=>'album','rules'=>'required|trim'),
                            array('field'=>'titre','label'=>'titre','rules'=>'required|trim')
                        );
                    break;

                    case '_documentation':
                        $config=array(
                            array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
                            array('field'=>'type_lien','label'=>'type_lien','rules'=>'required|trim'),
                            array('field'=>'type_image','label'=>'type_image','rules'=>'required|trim'),
//                            array('field'=>'doc','label'=>'doc','rules'=>'required|trim'),
                            array('field'=>'titre','label'=>'titre','rules'=>'required|trim')
                        );
                    break;
                case 'article_pnd':
                        $config=array(
                            array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
                            array('field'=>'type_lien','label'=>'type_lien','rules'=>'required|trim'),
                            array('field'=>'doc','label'=>'doc','rules'=>'required|trim'),
                            array('field'=>'titre','label'=>'titre','rules'=>'required|trim')
                        );
                    break;

                    case '_armoirie':
                        $config=array(
                            array('field'=>'etat','label'=>'etat','rules'=>'required|trim')
                        );
                    break;

                    case '_annuaire':
                        $config=array(
                            array('field'=>'etat','label'=>'etat','rules'=>'required|trim')
                        );
                    break;

                    case '_offre':
                        $config=array(
                            array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
                            array('field'=>'type_lien','label'=>'type_lien','rules'=>'required|trim'),
                            array('field'=>'type_image','label'=>'type_image','rules'=>'required|trim'),
                            array('field'=>'debut','label'=>'debut','rules'=>'required|trim'),
                            array('field'=>'fin','label'=>'fin','rules'=>'required|trim'),
                            array('field'=>'titre','label'=>'titre','rules'=>'required|trim')
                        );
                    break;

                    case '_sondage':
                        $config=array(
                            array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
                            array('field'=>'contenu','label'=>'contenu','rules'=>'required|trim'),
                            array('field'=>'reponse','label'=>'reponse','rules'=>'required|trim'),
                        );
                    break;

                    default:
                        $config=array(
                            array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
                            array('field'=>'type_lien','label'=>'type_lien','rules'=>'required|trim'),
                            array('field'=>'type_image','label'=>'type_image','rules'=>'required|trim'),
                            array('field'=>'titre','label'=>'titre','rules'=>'required|trim')
                        );
                }

                if($trt=='ins'){
                    //print_r($_POST); exit
                    $this->do_insert($table, $config);
                }
                else {
                    
                    $id = $this->input->post('id');
                    $this->do_update($table, $id);
                    
                }
            }
        }

        //procedure d'insertion
        public function do_insert($table, $config) {
            $form = $this->siteback_mod->form_val($config);

            if($form){
                $msg = "Renseigner les champs obligatoires SVP !";
                $type = 1;

                $this->homepage($msg, $type);
            }
            else{
                if($table=='_offre'){
                    $date_debut = $this->input->post('debut');
                    $date_fin = $this->input->post('fin');
                    $date_d = explode("/", $date_debut);
                    $date_f = explode("/", $date_fin);

                    $deb = $date_d[2].$date_d[1].$date_d[0];
                    $fin = $date_f[2].$date_f[1].$date_f[0];

                    if($deb > $fin){
                        $msg = "Erreur, la date de début ne doit pas être supérieure à celle de fin !";
                        $type = 1;

                        $this->homepage($msg, $type);
                        return FALSE;
                    }
                    else{
                        $res = $this->siteback_mod->insertion($table);
                    }
                }
                elseif($table=='_actualite' && $this->input->post('lien_inscrire')!=''){
                    if($this->input->post('date_fin_ins')=='' || $this->input->post('lien_connex')==''){
                        $msg = "Renseignez la date de fin dinscription et/ou le lien de connexion SVP !";
                        $type = 1;

                        $this->homepage($msg, $type);
                        return FALSE;
                    }
                    elseif($this->input->post('date_fin_ins') < date('d/m/Y')){
                        $msg = "La date de fin dinscription doit être supérieure à celle daujourdhui !";
                        $type = 1;

                        $this->homepage($msg, $type);
                        return FALSE;
                    }
                    else{
                        $res = $this->siteback_mod->insertion($table);
                    }
                }
                else {
                    $res = $this->siteback_mod->insertion($table);
                }

                switch($res){
                    // succès
                    case 1:
                        $msg = "Traitement effectué avec succès.";
                        $type = 0;
                    break;

                    // erreur sur l'upload de grande image
                    case 2:
                        $msg = $this->upload->display_errors();
                        $type = 1;
                    break;

                    // erreur sur l'upload de petite image
                    case 3:
                        $msg = $this->upload2->display_errors();
                        $type = 1;
                    break;

                    // erreur sur l'upload de fichier
                    case 4:
                        $msg = $this->upload3->display_errors();
                        $type = 1;
                    break;

                    // champ obligatoire
                    case 5:
                        $msg = "Renseigner les champs obligatoires SVP !";
                        $type = 1;
                    break;

                    default:
                        $msg = "Une erreur est survenue lors du traitement !";
                        $type = 1;
                }

                $this->homepage($msg, $type);
            }
        }

        // procédure de mise à jour
        public function do_update($table, $id) {
            if($table=='_phototheque'){
                $config=array(
                    array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
//                    array('field'=>'album','label'=>'album','rules'=>'required|trim'),
                    array('field'=>'resume','label'=>'resume','rules'=>'required|trim')
                );
            }
            elseif ($table=='_offre' || $table=='_publication') {
                $config=array(
                    array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
                    array('field'=>'debut','label'=>'debut','rules'=>'required|trim'),
                    array('field'=>'fin','label'=>'fin','rules'=>'required|trim'),
                    array('field'=>'titre','label'=>'titre','rules'=>'required|trim')
                );
            }
            elseif ($table=='_annuaire') {
                $config=array(
                    array('field'=>'etat','label'=>'etat','rules'=>'required|trim')
                );
            }
            elseif ($table=='_sondage') {
                $config=array(
                    array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
                    array('field'=>'contenu','label'=>'contenu','rules'=>'required|trim')
                );
            }
            else{
                $config=array(
                    array('field'=>'etat','label'=>'etat','rules'=>'required|trim'),
                    array('field'=>'titre','label'=>'titre','rules'=>'required|trim')
                );
            }

            $form = $this->siteback_mod->form_val($config);

            if($form){
                $msg = "Renseigner les champs obligatoires SVP !";
                $type = 1;

                $this->homepage($msg, $type);
            }
            else{
                if($table=='_offre'){
                    $date_debut = $this->input->post('debut');
                    $date_fin = $this->input->post('fin');
                    $date_d = explode("/", $date_debut);
                    $date_f = explode("/", $date_fin);

                    $deb = $date_d[2].$date_d[1].$date_d[0];
                    $fin = $date_f[2].$date_f[1].$date_f[0];

                    if($deb > $fin){
                        $msg = "Erreur, la date de début ne doit pas être supérieure à celle de fin !";
                        $type = 1;

                        $this->homepage($msg, $type);
                        return FALSE;
                    }
                    else{

                       $res = $this->siteback_mod->mise_a_jour($table, $id);
                    }
                }
                elseif($table=='_actualite' && $this->input->post('lien_inscrire')!=''){
                    if($this->input->post('date_fin_ins')=='' || $this->input->post('lien_connex')==''){
                        $msg = "Renseignez la date de fin dinscription et/ou le lien de connexion SVP !";
                        $type = 1;

                         $this->homepage($msg, $type);
                         return FALSE;
                    }
                    elseif($this->input->post('date_fin_ins') < date('d/m/Y')){
                        $msg = "La date de fin dinscription doit être supérieure à celle daujourdhui !";
                        $type = 1;

                         $this->homepage($msg, $type);
                         return FALSE;
                    }
                    else{
                        $res = $this->siteback_mod->mise_a_jour($table, $id);
                    }
                }
                else{
                    $res = $this->siteback_mod->mise_a_jour($table, $id);
                   
                }

                switch($res){
                    // succès
                    case 1:
                        $msg = "Traitement effectué avec succès.";
                        $type = 0;
                    break;

                    // erreur sur l'upload de grande image
                    case 2:
                        $msg = $this->upload->display_errors();
                        $type = 1;
                    break;

                    // erreur sur l'upload de petite image
                    case 3:
                        $msg = $this->upload2->display_errors();
//                        $msg = "Image pas uploadée";
                        $type = 1;
                    break;

                    // erreur sur l'upload de fichier
                    case 4:
                        $msg = $this->upload3->display_errors();
                        $type = 1;
                    break;

                    // champ obligatoire
                    case 5:
                        $msg = "Renseigner les champs obligatoires SVP !";
                        $type = 1;
                    break;

                    default:
                        $msg = "Une erreur est survenue lors du traitement !";
                        $type = 1;
                }

                $this->homepage($msg, $type);
            }
        }

        //
        public function access_ef($msg='', $type='') {
            $data['msg'] = $msg;
            $data['type'] = $type;

            $data['liste_acces'] = $this->siteback_mod->liste_acces();

            $data['page'] = 'pages/acces_ef';
            $this->load->view('admin/index',$data);
        }

        //
        public function do_acces_ef() {
            if($this->input->get_post('a')=='insert'){
                $res = $this->siteback_mod->access();
            }
            else{
                $data = array(
                    'niveau_access' => $this->input->post('niv_acces')
                );

                $cond = array('mat_aef'=>$this->input->post('mat_acces'));
                $res = $this->siteback_mod->update($cond, 'access_ef', $data);
            }

            switch($res){
                case '1':
                    $msg = "Traitement effectué avec succès.";
                    $type = 2;
                break;

                case '2':
                    $msg = "Désolé, le Matricule saisi nest pas reconnu !";
                    $type = 1;
                break;

                case '3':
                    $msg = "Désolé, le Matricule saisi a déja des accès !";
                    $type = 1;
                break;

                default:
                    $msg = "Echec du traitement !";
                    $type = 1;
            }

            $this->access_ef($msg, $type);
        }

        // changement de profil d'un user
        public function change_profil() {
            $res = $this->siteback_mod->change_profil_user();

            if($res==1){
                $msg = "Mise à jour effectuée avec succès.";
                $type = 2;
            }
            else{
                $msg = "Echec de la Mise à jour !";
                $type = 1;
            }

            $this->homepage($msg, $type);
        }

        public function open_popup($msg='', $type='') {
            $data['msg'] = $msg;
            $data['type'] = $type;

            $table = $this->input->get_post('t');

            // chargement du contenu pour les mises à jour d'un enregistrement sélectionné
            if($this->input->get_post('a')=='upd'){
                switch ($table){
                    case 'categorie_doc':
                        $data['to_update'] = $this->siteback_mod->read_row
                        (
                            $table,
                            array('id_categorie' => $this->input->get_post('id'))
                        );
                    break;
                case 'pnd':
                        $data['to_update'] = $this->siteback_mod->read_row
                        (
                            $table,
                            array('pndId' => $this->input->get_post('id'))
                        );
                    break;

                    case 'album':
                        $data['to_update'] = $this->siteback_mod->read_row
                        (
                            $table,
                            array('id_album' => $this->input->get_post('id'))
                        );
                    break;

                    default:
                        $data['all_rep'] = $this->siteback_mod->all_reponse();
                }
            }

                switch ($table){
                    case 'categorie_doc':
                        // contenu du volet latéral droit
                        $data['online'] = $this->siteback_mod->read_result($table, array('etat'=>'on'),array('id_categorie','DESC'));
                        $data['offline'] = $this->siteback_mod->read_result($table, array('etat'=>'off'),array('id_categorie','DESC'));
                    break;
                 case 'pnd':
                        // contenu du volet latéral droit
                        $data['online'] = $this->siteback_mod->read_result($table, array('etat'=>'on'),array('pndId','DESC'));
                        $data['offline'] = $this->siteback_mod->read_result($table, array('etat'=>'off'),array('pndId','DESC'));
                    break;

                    case 'album':
                        $data['online'] = $this->siteback_mod->read_result($table, array('etat_album'=>'on'),array('id_album','DESC'));
                        $data['offline'] = $this->siteback_mod->read_result($table, array('etat_album'=>'off'),array('id_album','DESC'));
                    break;

                    default:
                        $data['reponse'] = $this->siteback_mod->read_reponse();
                }


            $data['page'] = 'pages/'.$table;
            $this->load->view('admin/index',$data);
        }

        public function upd_reponse() {
            $res = $this->siteback_mod->do_upd_reponse();

            if($res==1){
                $msg = "Mise à jour effectuée avec succès.";
                $type = 0;
            }
            else{
                $msg = "La mise à jour a échoué !";
                $type = 1;
            }

            $this->open_popup($msg, $type);
        }

        public function allGrid() {
            $table = $this->input->get_post('t');

            switch($table){
                case 'categorie_doc':
                   $config=array(
                        array('field'=>'lib','label'=>'lib','rules'=>'required|trim')
                    );
                break;

                case 'album':
                    $config=array(
                        array('field'=>'contenu','label'=>'contenu','rules'=>'required|trim')
                    );
                break;

                case '_reponse':
                    $config=array(
                        array('field'=>'nb_choix','label'=>'nb_choix','rules'=>'required|trim')
                    );
                break;
            }

            $form = $this->siteback_mod->form_val($config);

            if($form){
                $msg = "Renseigner les champs obligatoires SVP !";
                $type = 1;

                $this->open_popup($msg, $type);
            }
            else{
                $action = $this->input->get_post('a');

                if($action=='insert'){
                    switch($table){
                        case 'categorie_doc':
                            $data = array(
                                'libel_categorie' => $this->input->post('lib'),
                                'etat' => 'off'
                            );
                        break;

                        case 'album':
                            $data = array(
                                'lib_album' => $this->input->post('lib'),
                                'contenu' => $this->input->post('contenu'),
                                'lien' => $this->input->post('lien'),
                                'etat_album' => 'off'
                            );
                        break;

                        case '_reponse':
                            $data = '';
                        break;
                    }

                    $f = $this->siteback_mod->insert_simple($table, $data);
                }
                // upd
                else{
                    switch($table){
                        case 'categorie_doc':
                            $data = array('libel_categorie' => $this->input->post('lib'));
                            $cond = array('id_categorie'=>$this->input->get_post('id'));
                        break;

                        case 'album':
                            $data = array(
                                'lib_album' => $this->input->post('lib'),
                                'lien' => $this->input->post('lien'),
                                'contenu' => $this->input->post('contenu')
                            );

                            $cond = array('id_album'=>$this->input->get_post('id'));
                        break;
                    }

                    $f = $this->siteback_mod->update($cond, $table, $data);
                }

                if($f){
                    $msg = "Traitement effectué avec succès.";
                    $type = 2;
                }
                else{
                    $msg = "Echec du taitement !";
                    $type = 1;
                }

                $this->open_popup($msg, $type);
            }
        }

        public function supprimer() {
            $table = $this->input->get_post('t');
            $val = $this->input->get_post('v');
            $go = '';

            if($table=='_reponse'){
                $res = $this->siteback_mod->do_del_reponse();
            }
            else{
                $res = $this->siteback_mod->delete($table, $val);
            }

           if($res==1){
                $msg = "Suppression effectuée avec succès.";
                $type = 0;
            }
            elseif($res==0){
                $msg = "La suppression a échoué !";
                $type = 1;
            }
            else{
                $msg = "Impossible de supprimer ce groupe de réponses, il est utilisé dans les sondages !";
                $type = 1;
            }

            switch ($table){
                case 'access_ef': $go=$table; break;
                case '_reponse': $go='open_popup'; break;
                case 'categorie_doc': $go='open_popup'; break;

                default : $go='homepage';
            }

            $this->$go($msg, $type);
        }

        // deconnexion
        public function logout() {
            $this->session->sess_destroy();
            redirect('mfp-admin/connex/', 'refresh');
        }
    }
?>