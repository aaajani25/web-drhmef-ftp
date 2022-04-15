<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// $parent est la fonction principale qui appelle une vue donnée
// $type est le type de message à  afficher (0:erreur ou alerte, 1:succes)

class Navigator extends MX_Controller {

    private $tab1 = '_communique';
    private $tab2 = '_annonce';
    private $tab3 = '_actualite';
    private $tab4 = '_pub';
    private $tab5 = '_evenement';
    private $tab6 = '_offre';
    private $tab9 = '_alaune';
    private $tab11 = 'access_ef';
    private $tab12 = '_publication';
    private $tab13 = 'inscription_agent_1';
    private $tab14 = '_intro';
   // private $tab15 = 'situation_agent_maj';
    private $tab15 = 'agent';
    private $tab16 = '_phototheque';
    private $tab17 = '_documentation';
    private $tab18 = 'categorie_doc';
    private $tab19 = '_sondage';
    private $tab20 = 'album';
    private $tab21 = 'tbaf_spref';
    private $tab22 = 'newsletter';
    private $tab23 = 'drh';
    //private $tab24 = 'tbce_agt';
    private $tab24 = 'agent';
    private $tab25 = 'tbno_inscrire';
    private $tab26 = 'situation_agent_maj_sp';
    private $tab27 = '_bon_savoir';
    private $tab28 = '_lesaviez';


    private $mail_support = '';
    private $mail_sce_web = 'drhmef@finances.gouv.ci';
    private $mail_cabinet = '';
    private $mail_info = '';
    private $mail_test = '';

    //
    public function __construct() {
        parent::__construct();
        $this->load->model('front-page/nav_mod');
        $this->load->model('front-page/espace_mod');
        $this->load->helper('download');
        $this->load->helper('password');
        $this->load->helper('captcha');
        
        
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.office365.com';
        $config['smtp_user']='a.akangbe@finances.gouv.ci';
        $config['smtp_pass']='Janis@drh';
        $config['smtp_port']='587';
    }

    public function index() {
        // intro
        $data['intro'] = $this->nav_mod->read_row_l
                (
                $this->tab14, array('etat' => 'on'), array('id', 'desc'), 1
        );
        // -- intro

        if ($data['intro'] != 0) {
            $this->load->view('intro', $data);
        } else {
            redirect('front-page/navigator/accueil', 'refresh');
        }
    }

    // chargement de la page d'accueil
    public function accueil($msg = '', $type = '') {
        // sondage
        $data['sondage'] = $this->nav_mod->read_row_l
                (
                $this->tab19, array('etat' => 'on'), array('id', 'desc'), 1
        );
        // -- sondage
        // pub
        $data['pub'] = $this->nav_mod->read_row_l
                (
                $this->tab4, array('etat' => 'on'), array('id', 'desc'), 1
        );
        // -- pub
        // communiqués
        $data['communique'] = $this->nav_mod->read_result
                (
                $this->tab1, array('etat' => 'on'), array('id', 'desc'), 3
        );
        $data['documentation']= $this->nav_mod->requete(test_doc_acc,'');
        // -- communiqués
        // phototheque
        $data['phototheque'] = $this->nav_mod->read_result_nolimit
                (
                $this->tab16, array('etat' => 'on'), array('id', 'RANDOM')
        );
        // -- phototheque
        // publication
        $data['publication'] = $this->nav_mod->read_result
                (
                $this->tab12, array('etat' => 'on'), array('ordre', 'asc'), 8
        );
        // -- publication
        // categorie doc
        $data['categorie'] = $this->nav_mod->read_result_nolimit
                (
                $this->tab18, array('etat' => 'on'), array('id_categorie', 'asc')
        );
        // -- categorie doc
        //  slide
        $data['slide'] = $this->nav_mod->read_result
                (
                $this->tab9, array('etat' => 'on'), array('id', 'desc'), 7
        );
        // -- slide
        // actualites prioritaires
        $data['actu_max'] = $this->nav_mod->read_result
                (
                $this->tab3, array('etat' => 'on', 'urgent' => 1), array('date_ins', 'desc'), 6
        );
        // -- actualite prioritaires
        // autres actualites
        $data['actu_min'] = $this->nav_mod->read_result
                (
                $this->tab3, array('etat' => 'on', 'urgent' => 0), array('id', 'desc'), 7
        );

        // -- autres actualites
        // slide  : mobile
        $data['slide_mob'] = $this->nav_mod->read_result
                (
                $this->tab9, array('etat' => 'on'), array('id', 'desc'), 7
        );
        // -- slide mobile
        // annonces
        $data['annonce'] = $this->nav_mod->read_result
                (
                $this->tab2, array('etat' => 'on'), array('id', 'desc'), 3
        );
        // -- annonces
        // evenement majeur : grand slide
        $data['event'] = $this->nav_mod->read_result_nolimit
                (
                $this->tab5, array('etat' => 'on'), array('id', 'desc')
        );
        // -- evenement
        // offre emploi
        $data['offre'] = $this->nav_mod->read_result
                (
                $this->tab6, array('etat' => 'on'), array('id', 'desc'), 3
        );
        // -- offre
        
        // bon 
        $data['asavoirs'] = $this->nav_mod->read_result
                (
                $this->tab27, array('etat' => 'on'), array('date_ins', 'desc'), 1
        );
        // -- a savoir

        // le saviez 
        $data['savoirs'] = $this->nav_mod->read_result
                (
                $this->tab28, array('etat' => 'on'), array('date_ins', 'desc'), 1
        );
        // -- le savier ss



        $data['msg'] = $msg;
        $data['type'] = $type;

        $data['conteneur'] = 'inclusions/corps_accueil';
        $this->load->view('index', $data);
    }

    // compteur de visite
    public function initTools() {
        $platform = $this->agent->platform();
        $browser = $this->agent->browser();
        $version = $this->agent->version();
        $langue = $this->agent->languages();

        $screen_x = $this->input->post('scren_x');
        $screen_y = $this->input->post('scren_y');
        $resol = $this->input->post('resol');
        $ip = $this->input->ip_address();
        $refer = $this->agent->referrer();

        $dataOs = $this->nav_mod->opsystem($platform);
        $dataWeb = $this->nav_mod->browser($browser, $version);

        $randid = uniqid();

        if ($this->session->userdata('randid') == 0) {
            $dataGuest1 = array('id_operating_system' => $dataOs,
                'id_web_browser' => $dataWeb,
                'idrand' => $randid,
                'screen_resolution_x' => $screen_x,
                'screen_resolution_y' => $screen_y,
                'accept_language' => $langue[0]
            );

            $idcon = $this->nav_mod->addquerry('guest', $dataGuest1);

            $dataCon = array(
                'id_guest' => $idcon,
                'ip_address' => $ip,
                'http_referer' => $refer,
                'date_add' => date('Y-m-d'),
                'heure_add' => date('H:i:s')
            );

            $idcon2 = $this->nav_mod->addquerry('connections', $dataCon);

            $data = array('idUser' => $idcon2, 'randid' => $randid, 'ip_address' => $ip, 'isVisited' => true);

            $this->session->set_userdata($data);
        }
    }

    // gestion des documentations
    public function documentation() {
        $titreParDefaut = 'Constitution';
        $titre = $this->input->get_post('v', TRUE) ?: $titreParDefaut;

        $docs = $this->nav_mod->read_result_nolimit(
                $this->tab17, array('etat' => 'on', 'titre' => $titre), array('id', 'desc')
        );

        $n = count($docs);

        if ($n == 1) {
            // on telecharge le fichier
            $fichier = APPPATH . 'assets/rubriques/' . $docs[0]['lien'];
            if (file_exists($fichier)) {
                $path = file_get_contents(base_url() . 'assets/rubriques/' . $docs[0]['lien']);
                $name = $docs[0]['lien'];

                force_download($name, $path);
            } else {
                redirect('front-page/navigator/documentation?v=' . $titreParDefaut, 'refresh');
            }
        } else {
            $data['titre'] = $titre;
            $data['docs'] = $docs;
            $data['conteneur'] = 'inclusions/pages/doc/index';

            $this->load->view('index', $data);
        }
    }

    // chargement des pages à  contenu statique
    public function statics() {
        // chemin de la page Ã  afficher
        $data['rep'] = $this->uri->segment(4);
        $data['decrets']= $this->nav_mod->requete(decrets,'');
        $data['testdocs']= $this->nav_mod->requete(test_doc,'');
        $data['testdocs']= $this->nav_mod->requete(test_doc,'');

        $data['faqs']= $this->nav_mod->requete(REQ_LST_FAQ,1);
        $data['faqs_deonto']= $this->nav_mod->requete(REQ_LST_FAQ,2);
    
        // chargement de la page
        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }

    // chargement de la phototheque
    public function phototheque() {
        // phototheque
        if ($this->input->get_post('album')) {

            $result = $this->nav_mod->read_result_nolimit(
                    $this->tab16, array('etat' => 'on', 'album' => $this->input->get_post('album')), array('id', 'desc')
            );

            if ($result == 0) {
                redirect('front-page/navigator/accueil', 'refresh');
            } else {
                $data['phototheque'] = $this->nav_mod->read_result_nolimit
                        (
                        $this->tab16, array('etat' => 'on', 'album' => $this->input->get_post('album')), array('id', 'desc')
                );
            }
            $data['album'] = $this->nav_mod->read_row
                    (
                    $this->tab20, array('lib_album' => $this->input->get_post('album'))
            );
            // -- album

            $data['conteneur'] = 'inclusions/pages/photo/index';
            $this->load->view('index', $data);
        } else {
            redirect('front-page/navigator/accueil', 'refresh');
        }
    }

    // chargement des pages avec contenu dynamique
     public function viewpage() {
         // chemin de la page à  afficher
         $data['rep'] = $this->uri->segment(4);
          //requete du contenu
         $cond = array('id' => $this->uri->segment(5));
         $data['data_page'] = $this->nav_mod->read_row($this->uri->segment(4),$cond);
          //chargement de la page
         $data['urd']= site_url('front-page/navigator/'.$this->uri->segment(3).'/');
         $data['conteneur'] = 'inclusions/pages/index_page';
         $this->load->view('index',$data);
     }
    // archives
    public function archives() {
        $data['data'] = $this->nav_mod->readTable($this->uri->segment(4));

        $data['conteneur'] = 'archives/index_arch';
        $this->load->view('index', $data);
    }

    // Action sur formulaires
    public function control($fonction, $type, $data, $msg_prm) {
        switch ($type) {
            case 1 : // validation des champs de formulaire
                $res = $this->nav_mod->form_val($data);

                if ($res == 1) {
                    $msg = "Renseignez les champs obligatoires ou vérifiez la syntaxe des champs SVP !";
                    $type_msg = 1;

                    $this->$fonction($msg, $type_msg);
                } else {
                    return $res;
                }
                break;

            case 2: // verification d'un enregistrement dans une table
                $res = $this->nav_mod->exist($data[0], $data[1]);

                if ($res == 0) {
                    $msg = $msg_prm;
                    $type_msg = 1;

                    $this->$fonction($msg, $type_msg);
                } else {
                    return $res;
                }
                break;
        }
    }

    //acte_signe
    public function acte_signe($msg = '', $type = '', $aux = '') {
        $data['msg'] = $msg;
        $data['type'] = $type;

        $data['resultat'] = $aux;
        $data['page'] = 'acte-signe';

        $data['conteneur'] = 'inclusions/pages/index_page';

        $this->load->view('index', $data);
    }

    // actes signés
    public function trt_acte_signe() {
        $res = $this->nav_mod->actes_signes(addslashes($this->input->get_post('matricule', TRUE)));

        switch ($res) {
            case 1:
                $msg = "Matricule incorrect";
                $type = 1;
                $aux = '';
                break;

            case 5:
                $msg = "Vous n'avez pas d'actes sign&eacute;s depuis Ao&ucirc;t 2011";
                $type = 1;
                $aux = '';
                break;

            default :
                $msg = '';
                $type = '';
                $aux = $res;
        }

        $this->acte_signe($msg, $type, $aux);
    }

    /* public function affectation_new() {

      $data['msg'] = $msg;
      $data['type'] = $type;

      $data['resultat'] = $aux;
      $data['conteneur'] = 'inclusions/pages/index_page';
      $data['page'] = 'affectation_new';

      $this->load->view('index',$data);

      } */

    // demande d'acte de non engagement
    public function non_engagement($msg = '', $type = '') {
        $data['msg'] = $msg;
        $data['type'] = $type;

        $data['ville'] = $this->nav_mod->readTable($this->tab21);

        $data['page'] = 'non_engagement';

        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }

    public function trt_non_engagement() {
        $res = $this->nav_mod->non_engagement();

        switch ($res) {
            case 4:
                $msg = "Incohérence sur le choix de la civilité et du sexe !";
                $type = 1;
                break;

            case 3:
                $msg = "Impossible de modifier la demande en cours !";
                $type = 1;
                break;

            case 2:
                $msg = "Impossible d'insérer la demande en cours !";
                $type = 1;
                break;

            default :
                // recu de la demande
                redirect('front-page/navigator/recu_non_engagement?num_recu=' . $res, 'refresh');
        }

        $this->non_engagement($msg, $type);
    }

    // recu demande d'acte de non engagement
    public function recu_non_engagement() {
        $data['resultat4'] = $this->nav_mod->inforecu_acte();

        $data['page'] = 'recu_non_engagement';

        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }

    public function print_recu_demande_nf() {
        $this->load->library('html2pdf', array('L', 'A4', 'fr'));
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(7, 7, 10, 10));

        $data['tab'] = $this->nav_mod->print_nf();

        $content = $this->load->view('inclusions/pages/recu_p', $data, TRUE);

        try {
            $html2pdf->setTestIsImage(false);
            $html2pdf->writeHTML($content);
            ob_end_clean();
            $html2pdf->Output('recu_non_engagement.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    // menu : nous contactez
    public function contact($msg = '', $type = '') {
        $data['msg'] = $msg;
        $data['type'] = $type;

        $data['page'] = 'contact';

        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }
    // menu : nous contactez
    public function demande_stage($msg = '', $type = '') {
        $data['msg'] = $msg;
        $data['type'] = $type;

        $data['page'] = 'dem_stage';

        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }

 // menu : Ecoute client
    public function identification($msg = '', $type = '') {
        
        if($msg !="qs" and $msg !="eth")
        {
          $data['msg'] = $msg;
          $data['type'] = $type;
        }
        $service=$this->uri->segment(4);
        $config = array(
            array('field' => 'email', 'label' => 'email', 'rules' => 'required|trim|email')
        );

        $this->form_validation->set_rules($config);
        //var_dump($this->form_validation->run()); exit;
        /*captchar  */

        $vals = array(
			'img_path'      => FCPATH.'assets/captcha/',
			'img_url'       => base_url().'assets/captcha/',
            'font_path'     => FCPATH.'sysbase/fonts/texb.ttf',
            'img_width' => '250',   //Set image width.
            'img_height' => 50,   // Set image height.
            'word' => '',   //Generate alternate word by default. You can also set your word.
            'word_length' => 6  // To set length of captcha word.
		);
		$cap = create_captcha($vals);
		
		$data = array(
				'captcha_time'  => $cap['time'],
				'ip_address'    => $this->input->ip_address(),
				'word'          => $cap['word']
		);

			$query = $this->db->insert_string('captcha', $data);
			$this->db->query($query);

            $data['captchar']=$cap['image'];
        /* fin */
        if($this->input->post('email') == ''){
        $data['res_nat']=$this->nav_mod->getNature();
        $data['page'] = 'formulaire_ident';
        //var_dump($this->form_validation->run(), $data); exit;
        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
        }
        else
        {
                
                $identite=array('nature' =>$this->input->post('nature') ,
                'identite' =>$this->input->post('identite'),
                'email' =>$this->input->post('email'),
                'nom'=>$this->input->post('nom'),
                'prenoms'=>$this->input->post('prenoms'),
                'sexe'=>$this->input->post('sexe'),
                'fonction'=>$this->input->post('fonction'),
                'ville'=>$this->input->post('ville'),
                'dossier'=>rand(),
                'service'=>$service);
                $this->session->set_userdata($identite);
                redirect("front-page/navigator/plaintes");

       }
    }

// menu : Ecoute client
    public function plaintes($msg = '', $type = '') {
       
        $data['msg'] = $msg;
        $data['type'] = $type;

        $data['nature']=$this->nav_mod->requete(temoin,array('id'=>$this->session->userdata('nature')));
        $data['page'] = 'plaintes';

        $data['conteneur'] = 'inclusions/pages/index_page';

        $this->load->view('index', $data);
    }

    // view  resultats Affectation
     public function disposition($msg = '', $type = '') {
          $data['msg'] = $msg;
          $data['type'] = $type;
          $res_emp = $this->nav_mod->getEmploi();
          $data['res_emp'] = $res_emp;

          if ($this->input->post() == true) {
               $config = array(
                   array('field' => 'Candidat', 'label' => 'Candidat', 'rules' => 'trim'),
                   array('field' => 'spec', 'label' => 'nom et prenom', 'rules' => 'trim'),
                   array('field' => 'emploi', 'label' => 'emploi', 'rules' => 'trim')
               );

               $form = $this->nav_mod->form_val($config);
               if ($form == 0) {

                    $Candidat = $this->input->post('Candidat', TRUE);
                    $spec = $this->input->post('spec', TRUE);
                    $emploi = $this->input->post('emploi', TRUE);

                    $dispo = $this->nav_mod->search_disposition($Candidat, $spec, $emploi, true);


                    if ($dispo != false) {
                         if ($dispo->num_rows() == 0) {

                              $data['put'] = 1;
                         } else {
                              $data['dispo'] = $dispo->result_array();
                              $data['put'] = 2;
                         }
                    } else {
                         $data['put'] = 3;
                    }
               } else {
                    $data['put'] = 3;
               }
          } else {
               $data['put'] = 3;
          }

          $data['page'] = 'disposition';

          $data['conteneur'] = 'inclusions/pages/index_page';
          $this->load->view('index', $data);
     }


     // view  resultats Affectation
     public function affectation($msg = '', $type = '') {
          $data['msg'] = $msg;
          $data['type'] = $type;
          $res_emp = $this->nav_mod->getEmploi();
          $data['res_emp'] = $res_emp;

          if ($this->input->post() == true) {
               $config = array(
                   array('field' => 'Candidat', 'label' => 'Candidat', 'rules' => 'trim'),
                   array('field' => 'Composition', 'label' => 'Composition', 'rules' => 'trim'),
                   array('field' => 'spec', 'label' => 'nom et prenom', 'rules' => 'trim'),
                   array('field' => 'emploi', 'label' => 'emploi', 'rules' => 'trim')
               );

               $form = $this->nav_mod->form_val($config);
               if ($form == 0) {

                    $Candidat = $this->input->post('Candidat', TRUE);
                    $Composition = $this->input->post('Composition', TRUE);
                    $spec = $this->input->post('spec', TRUE);
                    $emploi = $this->input->post('emploi', TRUE);

                    $affect = $this->nav_mod->search_affectation($Candidat, $Composition, $spec, $emploi, true);


                    if ($affect != false) {
                         if ($affect->num_rows() == 0) {

                              $data['put'] = 1;
                         } else {
                              $data['affect'] = $affect->result_array();
                              $data['put'] = 2;
                         }
                    } else {
                         $data['put'] = 3;
                    }
               } else {
                    $data['put'] = 3;
               }
          } else {
               $data['put'] = 3;
          }

          $data['page'] = 'affectation';

          $data['conteneur'] = 'inclusions/pages/index_page';
          $this->load->view('index', $data);
     }

     // recuperation de matricule d' un agent
     public function recherche_mat($msg = '', $type = '') {
          $data['msg'] = $msg;
          $data['type'] = $type;
          $data['infomat'] = '';
          $data['compo'] = $this->input->get_post('compo');
          $data['dtep'] = $this->input->get_post('dtep');

          if ($this->input->post() == true) {

               if ($this->input->post('compo') != '' AND $this->input->post('datenaiss') != '') {

                    /* $config = array(
                      array('field' => 'compo', 'label' => 'Composition', 'rules' => 'required|trim'),
                      array('field' => 'dtep', 'label' => 'date de prise de service', 'rules' => 'required|trim'),
                      array('field' => 'datenaiss', 'label' => 'date de naissance', 'rules' => 'required|trim')
                      ); */

                    // $form = $this->form_validation->set_rules($config);
                    //var_dump($this->form_validation->run()); die();
                    $Composition = $this->input->post('compo', TRUE);
                    $datepserv = $this->input->post('dtep', TRUE);
                    $datenaiss = $this->input->post('datenaiss', TRUE);
                    $matagent = $this->nav_mod->recup_mat($Composition, $datenaiss, $datepserv, true);

                    if ($matagent->num_rows() == 0) {
                         $data['msg'] = "Merci de renseigner";
                         $data['type'] = 1;
                         $data['infomat'] = '';
                         redirect('front-page/navigator/recherche_mat?compo=' . $this->input->get_post('compo') . '&dtep=' . $this->input->get_post('dtep') . '', 'refresh');
                    } else {
                         $data['matagent'] = $matagent->result_array();
                         $data['infomat'] = 1;
                    }
                    /*
                      if ($form == FALSE) {
                      $Composition = $this->input->post('compo', TRUE);
                      $datepserv = $this->input->post('dateserv', TRUE);
                      $datenaiss = $this->input->post('datenaiss', TRUE);

                      $matagent = $this->nav_mod->recup_mat($Composition, $datenaiss, $datepserv, true);
                      //var_dump($matagent->result_array()); die();
                      } else {
                      // var_dump($form); die();
                      } */
               } else {

                    if ($this->input->post('compo') == '') {
                         $data['msg'] = "Merci de renseigner votre numero de composition";
                         $data['type'] = 1;
                         $data['infomat'] = '';

                    } elseif ($this->input->post('datenaiss') == '') {
                         $data['msg'] = "Merci de renseigner votre date de naissance";
                         $data['type'] = 1;
                         $data['infomat'] = '';

                    }
               }
          }

          $data['page'] = 'recherche_mat';

          $data['conteneur'] = 'inclusions/pages/index_page';
          $this->load->view('index', $data);
     }

    //
    public function winsend($msg = '', $type = '') {
        $data['msg'] = $msg;
        $data['type'] = $type;
        $data['page'] = 'winbox';

        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }

    // newsletter inscription
    public function newsletter() {
        $config = array(
            array('field' => 'mail_nl1', 'label' => 'mail_nl1', 'rules' => 'required|trim|valid_email|is_unique[newsletter.email]'),
            array('field' => 'mail_nl2', 'label' => 'mail_nl2', 'rules' => 'required|trim|matches[mail_nl1]')
        );

        $form = $this->nav_mod->form_val($config);

        if ($form == 0) {
            $data = array('email' => $this->input->post('mail_nl1', TRUE));
            $res = $this->nav_mod->insertion($this->tab22, $data);

            if ($res == 1) {
                $msg = "Inscription à  la newsletter effectuée.";
                $type = 2;
            } else {
                $msg = "L'inscription à  la newletter a échoué, veuillez réessayer !";
                $type = 1;
            }
        } else {
            $msg = "Les emails ne sont pas identiques ou vous êtes déja inscrit à  notre Lettre d'information !";
            $type = 1;
        }

        $this->accueil($msg, $type);
    }

    // vote_sondage
    public function vote_sondage() {
        //verifier qu'une reponse à été donner
        if(empty($this->input->post('radio')))
        {
          $msg = "Vueillez choisir une réponse !";
            $type = 1;
            $this->accueil($msg, $type);
        }
        else
        {
          //verifier que l'ip à déja voté
          $ck_ip=$this->nav_mod->exist('_sondes',
                                       array('ip'=>$this->session->userdata('ip_address')));

            if($ck_ip>0)
            {
            $msg = "Vous avez déja voté";
            $type = 1;
            }
          else
          {
            $vote = explode('-', $this->input->post('radio'));
            $vote[0] = intval($vote[0]);
            $vote[1] = intval($vote[1]);

            $sondage_of_this_radio = $this->nav_mod->read_row_l
                (
                '_reponse', array('id' => $vote[0]), array('id', 'desc'), 1
            );


        if ($sondage_of_this_radio['choix'] == $vote[1])
        {
              $nbp = intval($this->input->post('nbp'));
            // question
            $maj_question = $this->nav_mod->maj(
                    'id', intval($this->input->post('id_sond')), '_sondage', array('nbp' => $nbp + 1)
            );

            // reponse
            $maj_reponse = $this->nav_mod->maj(
                    'id', $vote[0], '_reponse', array('choix' => $vote[1] + 1)
            );


        if ($maj_question == 1 || $maj_reponse == 1) {

            //enregistrement du sondes
            $this->nav_mod->insertion('_sondes',array('question'=>intval($this->input->post('id_sond')),'ip'=>$this->session->userdata('ip_address')));

            $msg = "Votre vote a été enregistré.";
            $type = 2;
        } else {
            $msg = "Votre vote n'a pas pu être enregistré, veuillez réessayer svp !";
            $type = 1;
        }
        }
        else
        {
            $msg = "Données incorrectes";
            $type = 1;
            $this->accueil($msg, $type);
        }
     }//deja votez

      }//else
      $this->accueil($msg, $type);
    }//function

    // apres expiration de la session
    public function logix($msg = '') {
        if (intval($this->input->get_post('f')) == 1) { // session expirée
            $msg = "Votre session a expiré, veuillez vous reconnecter !";
        }

        $data['msg'] = $msg;
        $data['type'] = 1;

        $data['page'] = 'no_sess';

        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }

    // encryption
//        public function encrypt_decrypt($action, $string){
//           $output = false;
//
//           $key = 'My strong webmaster secret key';
//
//           // initialization vector
//           $iv = md5(md5($key));
//
//           if( $action == 'encrypt' )
//           {
//                   $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
//                   $output = base64_encode($output);
//           }
//           else if( $action == 'decrypt' )
//           {
//                   $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
//                   $output = rtrim($output, "");
//           }
//           return $output;
//        }
    //inscription à  l'espace fonctionnaire
    public function inscription($msg = '', $type = '') {
        $data['msg'] = $msg;
        $data['type'] = $type;

        $data['page'] = 'sinscrire';

        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }

    public function do_inscription() {
        $config = array(
            array('field' => 'matricule', 'label' => 'matricule', 'rules' => 'required|trim'),
            array('field' => 'date_naiss', 'label' => 'date de naissance', 'rules' => 'required|trim'),
            array('field' => 'conf_mdp', 'label' => 'confirmation mdp', 'rules' => 'required|trim|matches[mot_de_passe]'),
            array('field' => 'conf_email', 'label' => 'confirmation email', 'rules' => 'required|trim|matches[email]')
        );

        $form = $this->control('inscription', $type = 1, $config, $msg_prm = '');

        if ($form == 0) {
            $mat = $this->input->post('matricule');
            $dn = $this->input->post('date_naiss');

            // on verifie s'il est fonctionnaire
            $check1 = $this->espace_mod->read_row($this->tab24, array('matricule' => $mat));  // tab24 = agent

            if ($check1['matricule'] == null ) {
                $msg = "Désolé, vous n'êtes pas agent du ministère !";
                $this->inscription($msg, $type = 1);
            } else {
                // on verifie s'il est deja inscrit
                $check2 = $this->nav_mod->exist($this->tab13, array('matricule' => $mat));

                if ($check2 == 1) {
                    $msg = "Désolé, vous êtes déja inscrit à  l'espace agent !";
                    $this->inscription($msg, $type = 1);
                } else {
                    // on verifie la date de naissance entrée
                    $row = $this->nav_mod->read_row($this->tab15, array('matricule' => $mat));

                    if ($dn != $row['date_nais']) {
                        $msg = "Erreur sur la date de naissance !";
                        $this->inscription($msg, $type = 1);
                    } else {
                        // on l'inscrit
                        $res = $this->nav_mod->inscr_espace_fonct($this->tab13);

                        if ($res == 0) {
                            $msg = "Une erreur s'est produite lors de l'inscription, veuillez réessayer SVP !";
                            $this->inscription($msg, $type = 1);
                        } else {
                            // mise en session et ouverture de l'espace fonctionnaire
                            $sess_data = $this->data_session($mat);
                            $this->open_profil($sess_data);
                        }
                    }
                }
            }
        }
    }

    // recuperation du mot de passe
    public function password($msg = '', $type = '') {
        $data['msg'] = $msg;
        $data['type'] = $type;

        $data['page'] = 'mdp_oublie';

        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }

    //Generation de mot de passe new
  public function getpassword() {
        $mat = $this->input->post('mat', TRUE);

        // on verifie qu'il est fonctionnaire
        $check1 = $this->nav_mod->exist($this->tab15, array('matricule' => $mat));

        if ($check1 == 0) {
            $msg = "Erreur de matricule !";
            $this->password($msg, $type = 1);
        } else {
            // on verifie qu'il est inscrit
            $check2 = $this->nav_mod->exist($this->tab13, array('matricule' => $mat));

            if ($check2 == 0) {
                $msg = "Désolé, vous n\'Ãªtes pas inscrit à  l'espace agent !";
                $this->password($msg, $type = 1);
            } else {
                // on verifie qu'il ai renseigné un mail
                $check3 = $this->nav_mod->read_row($this->tab13, array('matricule' => $mat));
                $email = $check3['email'];

                if ($email == '' || $email == NULL) {
                    $msg = "Désolé, vous n'avez renseigné aucune adresse électronique sur laquelle envoyer votre mot de passe !";
                    $this->password($msg, $type = 1);
                } else {
                    // envoi du mail
                    $password = Password::randomPassword();

                    $this->email->set_mailtype("html");
                    $this->email->initialize($config);
                    $this->email->from($this->mail_sce_web, "DRH_MEF SUPPORT");
                    $this->email->to($email);
                    $this->email->subject("RECUPERATION DU MOT DE PASSE ESPACE AGENT");
                    $this->email->message("Bonjour, votre mot de passe a été re-initialisé. Votre nouveau mot de passe est le suivant: " . $password);
                    
                    $this->db->where('matricule', $mat);
                    $this->db->update('inscription_agent_1', array('pswd' => Password::hash($password), 'date_modif' => date('Y-m-d H:i:s'), 'Etat_pass' => 1,'pswd_user' => $password));
            
                        
                    if ($this->email->send()) {
//                        $this->db->where('matricule', $mat);
//                        $this->db->update('inscription_agent_1', array('pswd' => Password::hash($password), 'date_modif' => date('Y-m-d H:i:s'), 'Etat_pass' => 1));

                        $msg = "Votre nouveau mot de passe a été envoyé à  : " . $email . ". Vérifiez dans vos SPAMS si le mail n'apparait pas dans la boite à  réception.";
                        $type = 2;
                    } else {
                        $msg = "L'envoi du mail a échoué, veuillez réessayer !";
                        $type = 1;
                    }

                    $this->password($msg, $type);
                }
            }
        }
    }

    //Fin


    /*
    public function getpassword() {
        $mat = $this->input->post('mat', TRUE);

        // on verifie qu'il est fonctionnaire
        $check1 = $this->nav_mod->exist($this->tab15, array('MATRICULE' => $mat));

        if ($check1 == 0) {
            $msg = "Désolé, vous n'êtes pas fonctionnaire !";
            $this->password($msg, $type = 1);
        } else {
            // on verifie qu'il est inscrit
            $check2 = $this->nav_mod->exist($this->tab13, array('matricule' => $mat));

            if ($check2 == 0) {
                $msg = "Désolé, vous n'êtes pas inscrit à  l'espace fonctionnaire !";
                $this->password($msg, $type = 1);
            } else {
                // on verifie qu'il ai renseigné un mail
                $check3 = $this->nav_mod->read_row($this->tab13, array('matricule' => $mat));
                $email = $check3['email'];

                if ($email == '' || $email == NULL) {
                    $msg = "Désolé, vous n'avez renseigné aucune adresse électronique sur laquelle envoyer votre mot de passe !";
                    $this->password($msg, $type = 1);
                } else {
                    // envoi du mail
                    $this->email->initialize($config);
                    $this->email->from($this->mail_sce_web, "MFP - SERVICE WEB");
                    $this->email->to($email);
                    $this->email->subject("RECUPERATION DU MOT DE PASSE ESPACE FONCTIONNAIRE");
                    $this->email->message("Bonjour, le mot de passe de votre espace fonctionnaire est : " . $check3['pswd']);

                    if ($this->email->send()) {
                        $msg = "Votre mot de passe a été envoyé à  : " . $email . ". Vérifiez dans vos SPAMS si le mail n'apparait pas dans la boite à  réception.";
                        $type = 2;
                    } else {
                        $msg = "L'envoi du mail a échoué, veuillez réessayer !";
                        $type = 1;
                    }

                    $this->password($msg, $type);
                }
            }
        }
    }
  */

  //send plaintes
    public function sendplainte() {

        $config = array(
            array('field' => 'motif', 'label' => 'motif', 'rules' => 'required|trim'),

        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $msg = "Données incorrectes !";
            $type = 1;
            $function = $this->input->post('parent');
            $this->$function($msg, $type);
          }
        else{
           
            if($this->session->userdata('service')=='eth')
            {
                $service='ECOUTE CLIENT ETHIQUE';
                $mail_to='deonto@finances.gouv.ci';
               
            }
            else if($this->session->userdata('service')=="qs")
            {
                $service='ECOUTE CLIENT QUALITE';
                $mail_to='sqci.drhmef@finances.gouv.ci';
            }
            // echo $this->session->userdata('service').'ssss'.$mail_to;exit;
             $mail_to_cl=$this->session->userdata('email');
             $subject=$this->input->post('objet');
             $data=array(
                'service'=>$service,
				'nature'=>$subject,
				'noms'=>$this->session->userdata('nom').' '.$this->session->userdata('prenoms'),
				'email'=>$mail_to_cl,
				'motif'=>$this->input->post('motif'));
             
            //telecharger pieces jointes 

            $pj = $_FILES['piece']['name'] ;
            $file_tmp_name = $_FILES['piece']['tmp_name'];
            move_uploaded_file($file_tmp_name,"./assets/documents/$pj");


             //envoi du mail au service
              $message=$this->load->view('email_templ',$data,TRUE);


             $this->email->_set_header('Return-Receipt-To', $mail_to_cl);
             $this->email->_set_header('Disposition-Notification-To', $mail_to_cl);
             $this->email->_set_header('Content-Transfer-Encoding', $this->session->userdata('8bit'));

            $this->email->set_mailtype("html");
            $this->email->initialize($config);
            $this->email->from('drhmef@finances.gouv.ci','DRH MEF');
            // $this->email->to('herve.akeboue@egouv.ci,deonto@finances.gouv.ci');
             $this->email->to($mail_to);
            $this->email->cc(support);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->attach('./assets/documents/'.$pj);
            $this->email->send();
            //accuse de reception
            
            $message_cl=$this->load->view('email_templ_cl',$data,TRUE);

             $this->email->_set_header('Content-Transfer-Encoding', $this->session->userdata('8bit'));

            $this->email->set_mailtype("html");
            $this->email->initialize($config);
            $this->email->from('drhmef@finances.gouv.ci', 'DRH MEF');
            $this->email->to($mail_to_cl);
            $this->email->cc('drhmef_scom@finances.gouv.ci,aaajani25@gmail.com,gnirecoul@gmail.com,ami.coulibaly@finances.gouv.ci,koumnouh@gmail.com');
            $this->email->subject($subject);
            $this->email->message($message_cl);
           
            if ($this->email->send()) {
                $msg = "Mail envoyé.";
                $type = 2;
            } else {
                $msg = "Echec de l'envoi !";
                $type = 1;
            }
            if(!empty($pj)) $data['pieces_jointes']="./assets/documents/$pj";
            $this->nav_mod->addquerry('plaintes',$data);

            $function = "plaintes";
            $this->$function($msg, $type);
        }
        //if($this->input->post('parent')=='contact'){
    }

    // envoi de mail
    public function sendbox($p) {

        $config = array(
            array('field' => 'nom_prenoms', 'label' => 'Nom et Prenom','rules' => 'required|trim'),
            array('field' => 'title','label' => 'titre','rules' => 'required|trim'),
            array('field' => 'msg','label' => 'message','rules' => 'required|trim'),
            array('field' => 'mail','label' => 'email','rules' =>'required|trim|email')
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {


            $msg = "Données incorrectes !";
            $type = 1;
            $function = $this->input->post('parent');
            $this->$function($msg, $type);
		}
		else
		{
			if($p=="nc")
			{
				$mail_to='drhmef@finances.gouv.ci';
			}
			else if($p=="dr")
			{
				$mail_to='drhmef@finances.gouv.ci';
			}

			$mail_to_cl= $this->input->post('mail');
            $subject=$this->input->post('title');
            $data=array(
			'nature'=>$subject,
			'noms'=>$this->input->post('nom_prenoms'),
			'email'=>$mail_to_cl,
			'message'=>$this->input->post('msg'));

            //envoi du mail au service
			$message=$this->load->view('email_templ_nc',$data,TRUE);

			$this->email->_set_header('Return-Receipt-To', $mail_to_cl);
            $this->email->_set_header('Disposition-Notification-To', $mail_to_cl);
            $this->email->_set_header('Content-Transfer-Encoding','8bit');

            $this->email->set_mailtype("html");
            $this->email->initialize($config);
            $this->email->from('drhmef@finances.gouv.ci', 'DRH MEF');
            $this->email->to($mail_to);
            $this->email->cc('drhmef_scom@finances.gouv.ci,deonto@finances.gouv.ci,sqci.drhmef@finances.gouv.ci,aaajani25@gmail.com,gnirecoul@gmail.com,ami.coulibaly@finances.gouv.ci,koumnouh@gmail.com');

            $this->email->subject($this->input->post('title'));
            $this->email->message($message);
			$this->email->send();

			//accuse de reception
            $message=$this->load->view('email_templ_cl_nc',$data,TRUE);

			$this->email->_set_header('Return-Receipt-To',$mail_to);
            $this->email->_set_header('Disposition-Notification-To', $mail_to);
            $this->email->_set_header('Content-Transfer-Encoding','8bit');

            $this->email->set_mailtype("html");
            $this->email->initialize($config);
            $this->email->from('drhmef@finances.gouv.ci','DRH MEF');
            $this->email->to($mail_to_cl);
            $this->email->cc('aaajani25@gmail.com,gnirecoul@gmail.com,koumnouh@gmail.com');
            $this->email->subject($this->input->post('title'));
            $this->email->message($message);

            if ($this->email->send()) {
                $msg = "Mail envoyé.";
                $type = 2;
            } else {
                $msg = "Echec de l'envoi !";
                $type = 1;
            }

            $function = $this->input->post('parent');
            $this->$function($msg, $type);
        }
        //if($this->input->post('parent')=='contact'){
    }

    //envois de mail pour demande de stage
    public function sendbox2($p) 
    {
        $config = array(
               array('field' => 'nom_prenoms', 'label' => 'Nom et Prenom','rules' => 'required|trim'),
               array('field' => 'date_naissance','label' => 'date de naissance','rules' => 'required|trim'),
               array('field' => 'etab_origin','label' => 'etablissement','rules' => 'required|trim'),
               array('field' => 'filiere','label' => 'filiere','rules' => 'required|trim'),
               array('field' => 'telephone','label' => 'telephone','rules' => 'required|trim'),
               array('field' => 'email','label' => 'email','rules' =>'required|trim|email')
           );
       
               $this->form_validation->set_rules($config);
       
               if ($this->form_validation->run() == FALSE) 
               {
                   $msg_r = "Données incorrectes !";
                   $type = 1;
                   $function = $this->input->post('parent');
                   $this->$function($msg_r,$type);
               }
               else
               {
                   if($p == "nc")
                   {
                       $mail_to = 'drhmef@finances.gouv.ci';
                   }
                   // else if($p == "dr")
                   // {
                   //     $mail_to = 'drhmef@finances.gouv.ci';
                   // }
                   else if($p == "st")
                   {
                       $mail_to = 'drhmef_stages@finances.gouv.ci';
                   }
       
                   $mail_to_cl = $this->input->post('email');
                   $subject = "DEMANDE DE STAGE"; 	
                   
                   $data = array(
                       'nature'=> $subject,
                       'email'=> $mail_to_cl,
                       'noms' => $this->input->post('nom_prenoms'),	
                       'date_naissance' => $this->input->post('date_naissance'),
                       'etablissement' => $this->input->post('etab_origin'), 	
                       'filiere' => $this->input->post('filiere'),
                       'type_stage'=> $this->input->post('type_stage'),
                       'diplome' => $this->input->post('nature_diplome'),
                       'telephone' => $this->input->post('telephone'));

                        $cv = $_FILES['dossier']['name'] ;
                        $file_tmp_name = $_FILES['dossier']['tmp_name'];
                        move_uploaded_file($file_tmp_name,"./assets/documents/$cv");


                   $dem_stage = array(
                       'noms_prenoms'=> $this->input->post('nom_prenoms'),	
                       'date_naissance'=> $this->input->post('date_naissance'), 	
                       'sexe'=> $this->input->post('sexe'), 	
                       'nationnalite'=> $this->input->post('nationalite'), 	
                       'etablissement'=> $this->input->post('etab_origin'), 	
                       'filiere'=> $this->input->post('filiere'), 	
                       'type_stage'=> $this->input->post('type_stage'), 	
                       'nature_diplome'=> $this->input->post('nature_diplome'), 	
                       'adresse'=> $this->input->post('ad_geo'), 	
                       'telephone'=> $this->input->post('telephone'),
                       'dossier'=> $cv,  	
                       'email'=> $this->input->post('email')); 	
                       // 'piece_jointe'=> $this->input->post('fiche'));

                   $this->nav_mod->addquerry('stage',$dem_stage);    
                   
                   //envoi du mail au service
                   $message = $this->load->view('email_templ_nc_stage',$data,TRUE);
       
                   $this->email->_set_header('Return-Receipt-To', $mail_to_cl);
                   $this->email->_set_header('Disposition-Notification-To', $mail_to_cl);
                   $this->email->_set_header('Content-Transfer-Encoding','8bit');
       
                   $this->email->set_mailtype("html");
                   $this->email->initialize($config);
                   $this->email->from('drhmef@finances.gouv.ci','DRH MEF');
                   $this->email->to($mail_to);
                   $this->email->cc('aaajani25@gmail.com','drhmef@finances.gouv.ci','gnirecoul@gmail.com,koumnouh@gmail.com');
                   $this->email->attach('./assets/documents/'.$cv);

                   $this->email->subject($subject);
                   $this->email->message($message);
                   $this->email->send();
       
                   //accuse de reception
                   $message=$this->load->view('email_templ_dem_stg',$data,TRUE);
       
                   $this->email->_set_header('Return-Receipt-To',$mail_to);
                   $this->email->_set_header('Disposition-Notification-To', $mail_to);
                   $this->email->_set_header('Content-Transfer-Encoding','8bit');
       
                   $this->email->set_mailtype("html");
                   $this->email->initialize($config);
                   $this->email->from('drhmef@finances.gouv.ci','DRH MEF');
                   $this->email->to($mail_to_cl);
                   $this->email->cc('aaajani25@gmail.com,koumnouh@gmail.com');
                   $this->email->subject($subject);
                   $this->email->message($message);
       
                   if ($this->email->send()) {
                       $msg = "Mail envoyé.";
                       $type = 2;
                   } else {
                       $msg = "Echec de l'envoi !";
                       $type = 1;
                   }
       
                   $function = $this->input->post('parent');
                   $this->$function($msg, $type);
               }
               //if($this->input->post('parent')=='contact'){
           }



    // espace fonctionnaire
    public function connexion() {
        $mat = $this->input->post('matricule');
        $mdp = $this->input->post('mot_de_passe');
        $parent = $this->input->post('parent');
        if (!method_exists($this, $parent)) {
            $parent = 'logix';
        }
        $loginAdmin = '';
        
        //verifie qu'un administrateur se connecte
        if (strpos($mat, '/') !== false) {
            $mat = explode('/', $mat);
            $loginAdmin = $mat[1];
            $mat = $mat[0];
        }
        $config = array(
            array('field' => 'matricule', 'label' => 'matricule', 'rules' => 'required|trim'),
            array('field' => 'mot_de_passe', 'label' => 'mot de passe', 'rules' => 'required|trim|password')
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $msg = "Données de formulaire incorrectes!";
            $this->$parent($msg, $type = 1);

        }
        else {

        // on verifie s'il est fonctionnaire et inscrit
        $check1 = $this->espace_mod->read_row($this->tab24, array('matricule' => $mat));  // tab24 = agent
        $check2 = $this->nav_mod->read_row($this->tab13, array('matricule' => $mat));  // tab13=inscription_agent_1
       
        if ($check1['matricule'] != null ) {
            if ($check2 > 0) {

                // pass agent
                $pass_tb_usager = $check2['pswd'];
                // control acces agent
                if (empty ($loginAdmin) && Password::verify($mdp, $pass_tb_usager)) {
                    //  ouverture de l'espace agent
                    $sess_data = $this->data_session($mat);
                    
                    $this->open_profil($sess_data);
                }
                else if(!empty ($loginAdmin) || $loginAdmin !="") {
                      //var_dump($check1['matricule'], $check2['pswd'], $loginAdmin); die();
                    // accès personnalisé avec nivo dacces Password::hash($newPassword)
                    $check3= $this->nav_mod->read_row($this->tab11, array('mat_aef' => $loginAdmin));
                    
                    // pass access
                     $pass_tb_acces = $check3['mdp_aef'];
                                   
                 if (Password::verify($mdp, $pass_tb_acces)) {
                    //if ($tb_acces != 0) {
                         $niv_acc = $check3['niveau_access'];

                        // trace acces
                        $mat_usager = $check2['matricule'];
                        $mat_acces = $check3['mat_aef'];

                        // $this->nav_mod->insert_trace_acces($mat_usager, $mat_acces);
                        // ouverture de l'espace fonctionnaire
                        $sess_data = $this->data_session($mat);
                        $this->open_profil($sess_data, $acces = $niv_acc, $mat_usager, $mat_acces);
                    } else {
                        $msg = "L'authentification a échoué, veuillez réessayer SVPzzzzz !";
                        $this->$parent($msg, $type = 1);
                    }
                }
                else {
                        $msg = "L'authentification a échoué, veuillez réessayer SVP !";
                        $this->$parent($msg, $type = 1);
                    }
            }
            else
            {
                $msg = "Désolé, vous n'êtes pas inscrit !";
                $this->$parent($msg, $type = 1);
            }
        /*} else {
            $msg = "L'authentification a échoué, veuillez réessayer SVP !";
            $this->$parent($msg, $type = 1);
        }*/
    }
       }
    }

    // données de session
    private function data_session($mat) {
        $s1 = $s2 = '';

        $select1 = $this->db->list_fields($this->tab13);
        $select2 = $this->db->list_fields($this->tab15);

        foreach ($select1 as $select1) {
            $s1 .= $this->tab13 . '.' . $select1 . ', ';
        }

        foreach ($select2 as $select2) {
            $s2 .= $this->tab15 . '.' . $select2 . ', ';
        }

        $select = $s1 . $s2;

        $joint = array($this->tab15, $this->tab15 . '.matricule=' . $this->tab13 . '.matricule', 'left');

        $session_data = $this->nav_mod->do_join_row(
                $select, $this->tab13, $joint, array($this->tab13 . '.matricule' => $mat)
        );

        return $session_data;

    }

    // ouverture de l'espace fonctionnaire
    private function open_profil($donnees, $nivo_acc = '', $mat_usager = false, $mat_acces = false) {
        $other_datas = array('logged_in' => TRUE, 'acces' => $nivo_acc);
        $data_session = array_merge($other_datas, $donnees);
        $mat_usager = $mat_usager ?: $data_session['matricule'];
        $mat_acces = $mat_acces ?: $data_session['matricule'];
        //var_dump($data_session); die();
        
        //print_r($data_session);exit;
        $this->session->set_userdata($donnees);
        $this->session->set_userdata(array('logged_in' => TRUE));
        $this->session->set_userdata(array('acces' => $nivo_acc));
        
        $this->nav_mod->insert_trace_acces($mat_usager, $mat_acces);
        
        //var_dump($this->session->userdata,'<br><br>'); 
        //print_r($this->session->userdata('logged_in')); exit;
        //var_dump($data_session); die();
        if ($data_session['Etat_pass'] == 1 && $data_session['acces'] == 0) {
            redirect('front-page/espace_fonctionnaire/mon_compte?mc=2', 'refresh');
        } else {
            
            // redirect('front-page/espace_fonctionnaire/accueil', 'refresh');
            redirect('front-page/espace_fonctionnaire/accueil', 'refresh');
        }
    }

    // changement de module - administration
    public function go_mfp_admin() {
        redirect('mfp-admin/connex/', 'refresh');
    }
public function affiche_pdf($doc) {


        $data['src_doc']=base_url().'assets/documentations_pdf/'.$doc;
        $data['page'] = 'pdf/aff_pdf_view';

        $data['conteneur'] = 'inclusions/pages/index_page';

        $this->load->view('index', $data);
    }
    public function affiche_com_pdf($doc) {


        $data['src_doc']=base_url().'assets/rubriques/_communique/'.$doc;
        $data['page'] = 'pdf/aff_pdf_view';

        $data['conteneur'] = 'inclusions/pages/index_page';

        $this->load->view('index', $data);
    }

    // menu : service en ligne - recrutement - mise a disposition
    public function recrutement($msg = '', $type = '') 
    {
        $data['msg'] = $msg;
        $data['type'] = $type;
        
        $data['emplois'] = $this->espace_mod->list_emploi();
        $data['ministeres'] = $this->espace_mod->list_ministere();
        $data['page'] = 'dem_disposition';

        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }

    //fonction de recrutement cas de la mise a disposition
    public function mise_a_dispo($m="")
    {  
        $config = array(
            array('field' => 'nom','label' => 'Nom','rules' => 'required|trim'),
            array('field' => 'prenoms','label' => 'Nom et Prenom','rules' => 'required|trim'),
            array('field' => 'date_naissance','label' => 'date de naissance','rules' => 'required|trim'),
            array('field' => 'ministere','label' => 'ministere','rules' => 'required|trim'),
            array('field' => 'emploi','label' => 'emploi','rules' => 'required|trim'),
            array('field' => 'telephone','label' => 'telephone','rules' => 'required|trim'),
            array('field' => 'email','label' => 'email','rules' =>'required|trim|email')
        );
    
            $this->form_validation->set_rules($config);
    
            if ($this->form_validation->run() == FALSE) 
            {
                $msg_r = "Données incorrectes !";
                $type = 1;
                $function = $this->input->post('parent');
                $this->$function($msg_r,$type);
            }
            else
            {
                if($m == "nc")
                {
                    $mail_to = 'drhmef@finances.gouv.ci';
                }
                else if($m == "rec")
                {
                    $mail_to='sgp.drhmef@finances.gouv.ci,vam.toure@finances.gouv.ci';
                }

                $mail_to_cl = $this->input->post('email');
                $subject = "DEMANDE D'AVIS FAVORABLE"; 	
                
                $data = array(
                    'nature'=> $subject,
                    'email'=> $mail_to_cl,
                    'matricule' => $this->input->post('matricule'),
                    'nom' => $this->input->post('nom'),
                    'prenoms' => $this->input->post('prenoms'),	
                    'date_naissance' => $this->input->post('date_naissance'),
                    'ministere' => $this->espace_mod->get_ministere_lib($this->input->post('ministere')), 	
                    'emploi' => $this->espace_mod->get_emploi_lib($this->input->post('emploi')),
                    'prise_service' => $this->input->post('prise_service'),
                    'telephone' => $this->input->post('telephone'));
                    

                    $cv = addslashes($_FILES['fiche']['name']) ;
                    $cv_tmp_name = addslashes($_FILES['fiche']['tmp_name']);
    
    
                    //telechargement lettre de motivation
                    $lettre = addslashes($_FILES['fiche_lettre']['name']) ;
                    $ltre_tmp_name = addslashes($_FILES['fiche_lettre']['tmp_name']);

                    $ext=$file_name=true;

                    if($this->get_file_extension($cv) !="pdf" || $this->get_file_extension($lettre) !="pdf") $ext=false;
                    if(!$this->is_valid_name($lettre) || !$this->is_valid_name($lettre)) $file_name=false;
                    
                    if($ext==true && $file_name==true) {
                        
                    move_uploaded_file($cv_tmp_name,"./assets/documents/$cv");
                    move_uploaded_file($ltre_tmp_name,"./assets/documents/$lettre");

               
                $mise_dispo = array(
                    'matricule' => $this->input->post('matricule'),
                    'nom' => $this->input->post('nom'),
                    'prenoms'=> $this->input->post('prenoms'),	
                    'date_naissance'=> $this->input->post('date_naissance'), 	
                    'sexe'=> $this->input->post('sexe'), 	
                    'prise_service'=> $this->input->post('prise_service'), 	
                    'emploi'=> $this->input->post('emploi'), 	
                    'ministere'=> $this->input->post('ministere'),
                    'telephone'=> $this->input->post('telephone'), 	
                    'email'=> $this->input->post('email'), 	
                    'fiche'=> $cv,
                    'motif_fiche'=> $lettre);

                $this->nav_mod->addquerry('agent_dem',$mise_dispo);    
                
                //envoi du mail au service
                $message = $this->load->view('email_templ_service',$data,TRUE);
    
                $this->email->_set_header('Return-Receipt-To', $mail_to_cl);
                $this->email->_set_header('Disposition-Notification-To', $mail_to_cl);
                $this->email->_set_header('Content-Transfer-Encoding','8bit');
    
                $this->email->set_mailtype("html");
                $this->email->initialize($config);
                $this->email->from('drhmef@finances.gouv.ci','DRH MEF');
                $this->email->to($mail_to);
                $this->email->cc('aaajani25@gmail.com','drhmef@finances.gouv.ci','gnirecoul@gmail.com');
                $this->email->attach('./assets/documents/'.$cv);
                $this->email->attach('./assets/documents/'.$lettre);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();
    
                //accuse de reception
                $message=$this->load->view('email_templ_agtdem',$data,TRUE);
    
                $this->email->_set_header('Return-Receipt-To',$mail_to);
                $this->email->_set_header('Disposition-Notification-To', $mail_to);
                $this->email->_set_header('Content-Transfer-Encoding','8bit');
    
                $this->email->set_mailtype("html");
                $this->email->initialize($config);
                $this->email->from('drhmef@finances.gouv.ci','DRH MEF');
                $this->email->to($mail_to_cl);
                $this->email->cc('aaajani25@gmail.com','drhmef@finances.gouv.ci','gnirecoul@gmail.com,koumnouh@gmail.com');
                $this->email->subject($subject);
                $this->email->message($message);
    
                if ($this->email->send()) {
                    $msg = "Mail envoyé.";
                    $type = 2;
                } else {
                    $msg = "Echec de l'envoi !";
                    $type = 1;
                }
    
                $function = $this->input->post('parent');
                $this->$function($msg, $type);
            } else 
            {
                $msg = "Erreur lors du téléchargement des fichiers !";
                $type = 1;
                $function = $this->input->post('parent');
                $this->$function($msg, $type);
            }
        }//fin else
           
    }
    function is_valid_name($file) {
        return preg_match('/^([-\.\w]+)$/', $file) > 0;
      }

      function get_file_extension($file_name) {
        return substr(strrchr($file_name,'.'),1);
    }
    function maintenance($serv=null)
    {
        if($serv=='pl') 
        {
            $message="Le formulaire de plaintes et reclamations est momentanement indisponible. Nos services sont à pied d'oeuvre pour son rétablissement";
        }
        else 
        {
            $message="Cette page est en momentanement indisponible. Nos services sont à pied d'oeuvre pour son rétablissement";
        }
        $data['msg']  =  $message;
        $data['page'] = 'maint_page';
        $data['conteneur'] = 'inclusions/pages/index_page';
        $this->load->view('index', $data);
    }
      
}

?>
