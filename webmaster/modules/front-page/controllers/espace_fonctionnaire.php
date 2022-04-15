<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Espace_fonctionnaire extends MX_Controller {

     private $tab1 = 'objet';
     private $tab2 = 'situation_agent_maj';
     private $mail_support = 'support@finances.gouv.ci';
     private $mail_sce_web = 'a.akangbe@finances.gouv.ci';
     private $mail_cabinet = 'cabinet2017@fonctionpublique.ci';
     private $mail_info = 'info@finances.gouv.ci';
     private $mail_test = 'a.akangbe@finances.gouv.ci';

     public function __construct() {
          parent::__construct();
          $this->load->model('front-page/espace_mod');
          $this->load->helper('download');
          $this->load->helper('file');
        
          // controle de la session
          if ($this->session->userdata('logged_in') == FALSE) {
               redirect('front-page/navigator/logix?f=1', 'refresh');
          } else {
               $fonctionCalled = $this->uri->segment(3);
               if ($this->session->userdata('Etat_pass') == 1 && $this->session->userdata('acces') == 0) {
                    if (strpos($fonctionCalled, 'mon_compte') === false) {
                         // alors on le redirige sur la page de changement de mot de passe.
                         redirect('front-page/espace_fonctionnaire/mon_compte?mc=2', 'refresh');
                    }
               }
          }
     }

     // deconnexion
     public function logout() {
          $this->session->sess_destroy();
          redirect('front-page/navigator/accueil', 'refresh');
     }

     // chargement des pages avec contenu statique
     /*  public function statics() {
       // chemin de la page à afficher
       $data['rep'] = $this->uri->segment(4);

       // chargement de la page
       $data['conteneur'] = 'inclusions/pages/index_page';
       $this->load->view('index',$data);
       }
      */
     public function accueil($msg = '', $type = '') {

          if(file_exists('./assets/espace_fon/photos').'/'.$this->session->userdata('matricule').'.jpg')
          {
            $data['photos']=base_url('assets/espace_fon/photos').'/'.$this->session->userdata('matricule').'.jpg';
          } else {
            $data['photos']=base_url('assets/espace_fon/photos').'/'.'avatar.png';
          }
          $data['up_photo']=0;

          // actes à télécharger
          $data['actes'] = $this->espace_mod->user_actes();
          $data['actes_m'] = $this->espace_mod->user_actes_mobile();

          $data['msg'] = $msg;
          $data['type'] = $type;

          $data['conteneur'] = 'esp_fonc/index';
          $data['page'] = 'accueil_ef';
          //afficher le mot de passe dans espace fonctionnaire
          if (!empty($_GET['resetPwd']) && intval($this->session->userdata('acces')) >= 2) {
               $newPassword = Password::randomPassword();
               $mat = $this->session->userdata('matricule');
               $this->db->where('matricule', $mat);
               $this->db->update('inscription_agent_1', array('pswd' => Password::hash($newPassword), 'date_modif' => date('Y-m-d H:i:s'), 'Etat_pass' => 1));
               $data['newPassword'] = $newPassword;
          }


          $this->load->view('index', $data);
     }

     // NOTATION
     public function notation() {

          $data['conteneur'] = 'esp_fonc/index';
          $data['page'] = 'pages/notation';

          $this->load->view('index', $data);
     }
// DOCUMENT DU PERSONNEL
     public function doc_personnel() {

          $data['cat_docs']= $this->espace_mod->requete(type_docs,'');
          $data['conteneur'] = 'esp_fonc/index';
          $data['page'] = 'pages/doc_personnel';

          $this->load->view('index', $data);
     }
     // DOCUMENT DU PERSONNEL
     public function gespers() {

          $data['conteneur'] = 'esp_fonc/index';
          $data['page'] = 'pages/construction';

          $this->load->view('index', $data);
     }
     public function imprime_notation() {
//        $config = array(
//            array('field' => 'ann_note', 'label' => 'ann�e notation', 'rules' => 'required|trim'),
//            array('field' => 'per_note', 'label' => 'note', 'rules' => 'required|trim'),
//            array('field' => 'matricule', 'label' => 'matricule', 'rules' => 'required|trim'),
//        );
//
//        $this->form_validation->set_rules($config);
//        if ($this->form_validation->run() == FALSE) {
//
//        } else {
//            //$msg = "Donn�es de formulaire incorrectes!";
//            redirect('front-page/espace_fonctionnaire/notation');
//        }
          $data['annee'] = $this->input->post('ann_note');
          $data['periode'] = $this->input->post('per_note');
          $data['matricule'] = $this->session->userdata('matricule');
          $data['service_notation'] = $this->espace_mod->section_emploi();

          $this->imprimer('esp_fonc/pages/print_notation', $data, 'fiche_de_notation.pdf');
     }

     public function controle_presence() {

          $data['conteneur'] = 'esp_fonc/index';
          $data['page'] = 'pages/ctrl_presence';

          $this->load->view('index', $data);
     }

     //
     /* public function ansult_messagerie() {
       $data['conteneur'] = 'esp_fonc/index';
       $data['page'] = 'pages/me_gouv';

       $this->load->view('index',$data);
       } */

     // MON COMPTE
     public function mon_compte($msg = '', $type = '') {
        
          $mc = intval($this->input->get_post('mc'));

          switch ($mc) {
               // infos perso
               case 1:
                    $data['page'] = 'pages/info_perso';
                    $data['ville'] = $this->espace_mod->read_ville();

                    // le lieu de naissance d'un agent
                    $lieun = $this->session->userdata('lieunaiss');
                    if (substr($lieun, 0, 5) == 'SPREF') {
                         $data['LieuNaiss'] = $this->espace_mod->lieu_naiss();
                    } else {
                         $data['LieuNaiss'] = $lieun;
                    }

                    $data['msg'] = $msg;
                    $data['type'] = $type;

                    $data['conteneur'] = 'esp_fonc/index';
                    $this->load->view('index', $data);
                    break;

               // mot de passe
               case 2:
                    $data['page'] = 'pages/password';

                    $data['msg'] = $msg;
                    $data['type'] = $type;

                    $data['conteneur'] = 'esp_fonc/index';
                    $this->load->view('index', $data);
                    break;

               // print espace fonct
               default:
                    //chargement de la liste des enfants
                    //$data['enfant'] = $this->espace_mod->liste_enfant();

                    // cascade des services
                    //$data['service_notation'] = $this->espace_mod->section_emploi();

                    // banque
                    //$data['agence_banque'] = $this->espace_mod->info_banque($this->tab2);

                    // le lieu de naissance d'un agent
                    $lieun = $this->session->userdata('lieunaiss');
                    if (substr($lieun, 0, 5) == 'SPREF') {
                         $data['LieuNaiss'] = $this->espace_mod->lieu_naiss();
                    } else {
                         $data['LieuNaiss'] = $lieun;
                    }

                    // actes à télécharger
                    //$data['acte'] = $this->espace_mod->user_actes();
                    //$data['courrier'] = $this->espace_mod->user_actes_2();
                    if(file_exists('./assets/espace_fon/photos').'/'.$this->session->userdata('matricule').'.jpg')
                    {
                      $data['photos']=base_url('assets/espace_fon/photos').'/'.$this->session->userdata('matricule').'.jpg';
                    } 
                    else 
                    {
                      $data['photos']=base_url('assets/espace_fon/photos').'/'.'av-m.jpg';
                    }
                    $data['up_photo']=0;

                    $this->imprimer('esp_fonc/ef_print', $data, 'espace_agent.pdf');
          }
     }


    public function winsend($msg = '', $type = '') {
        $data['msg'] = $msg;
        $data['type'] = $type;

		$data['page'] = 'pages/winbox';

        $data['conteneur'] = 'esp_fonc/index';
        $this->load->view('index', $data);
    }

	public function winsend_demande($msg = '', $type = '') {
	  //preafficher la date de prise de service
      $date_p=explode('/',$this->session->userdata('date_prise_serv_structure'));
      //permutation
      $temp=$date_p[0];
      $date_p[0]=$date_p[2];
      $date_p[2]=$temp;
      $date_p=implode('-',$date_p);

       $data['emplois'] = $this->espace_mod->list_emploi();
       $data['type_actes']= $this->espace_mod->nature_da();
       $data['date_p']=$date_p;


        $data['msg'] = $msg;
        $data['type'] = $type;

		$data['page'] = 'pages/demande_acte';
        $data['conteneur'] = 'esp_fonc/index';
        $this->load->view('index', $data);
    }


    // envoi de mail
    public function sendbox($p) {

    $config = array(
    array('field'=>'nom_prenoms','label'=>'Nom et Prenom','rules' => 'required|trim'),
    array('field'=>'title','label'=>'titre','rules'=>'required|trim'),
    array('field'=>'msg','label'=>'message','rules'=>'required|trim'),
    array('field'=>'mail','label'=>'email','rules'=>'required|trim|email')
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
        $mail_to='drhmef_scom@finances.gouv.ci,drhmef@finances.gouv.ci';
      }
      else if($p=="dr")
      {
        $mail_to='drhmef_scom@finances.gouv.ci,drhmef@finances.gouv.ci';
      }

      $mail_to_cl= $this->input->post('mail');
      $subject=$this->input->post('title');
      $data=array(
		'nature'=>$subject,
        'noms'=>$this->input->post('nom_prenoms'),
        'email'=>$mail_to_cl,
        'message'=>$this->input->post('msg'));

        //envoi du mail au service
      	$message=$this->load->view('email_templ_nc_esp',$data,TRUE);

      	$this->email->_set_header('Return-Receipt-To',$mail_to_cl);
		$this->email->_set_header('Disposition-Notification-To',$mail_to_cl);
		$this->email->_set_header('Content-Transfer-Encoding','8bit');

		$this->email->set_mailtype("html");
		$this->email->initialize($config);
		$this->email->from('drhmef@finances.gouv.ci','DRH MEF');
		$this->email->to($mail_to);
		$this->email->cc(support);
		$this->email->subject($this->input->post('title'));
		$this->email->message($message);
    $this->email->send();

      //accuse de reception
      $message=$this->load->view('email_templ_cl_nc_esp',$data,TRUE);

      $this->email->_set_header('Return-Receipt-To',$mail_to);
      $this->email->_set_header('Disposition-Notification-To', $mail_to);
      $this->email->_set_header('Content-Transfer-Encoding','8bit');

      $this->email->set_mailtype("html");
      $this->email->initialize($config);
      $this->email->from('drhmef@finances.gouv.ci','DRH MEF');
      $this->email->to($mail_to_cl);
      $this->email->cc(support);
      $this->email->subject($this->input->post('title'));
      $this->email->message($message);
      $this->email->send();

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

     // imprimer
     private function imprimer($page, $data, $titre) {
          $this->load->library('html2pdf', array('P', 'A4', 'fr'));

          $content = $this->load->view($page, $data, TRUE);

          try {
               $html2pdf = new HTML2PDF('P', 'A4', 'fr', TRUE, 'UTF-8', array(0, 0, 0, 0));
               $html2pdf->pdf->SetDisplayMode('fullpage');
               $html2pdf->pdf->SetTitle('Aperçu avant impression');
               $html2pdf->writeHTML($content);
               $html2pdf->Output($titre);
          } catch (HTML2PDF_exception $e) {
               echo $e;
               exit;
          }
     }

	public function contact($msg = '', $type = '') {
        $data['msg'] = $msg;
        $data['type'] = $type;

        $data['page'] = 'pages/contact';

        $data['conteneur'] = 'esp_fonc/index';
        $this->load->view('index', $data);
    }

     public function nous_contacter($msg = '', $type = '') {

          $config = array(
              array('field' => 'email', 'label' => 'email', 'rules' => 'required|trim|email'),
              array('field' => 'mat', 'label' => 'matricule', 'rules' => 'required|trim'),
              array('field' => 'nom', 'label' => 'nom', 'rules' => 'required|trim'),
              array('field' => 'tel', 'label' => 'telephone', 'rules' => 'required|trim'),
              array('field' => 'objet', 'label' => 'objet', 'rules' => 'required|trim'),
              array('field' => 'msg', 'label' => 'message', 'rules' => 'required|trim'),
          );

          $this->form_validation->set_rules($config);
          if ($this->form_validation->run() == FALSE) {

          } else {
               $msg = 'Données incorrectes!';
               $type = 1;
               $data['msg'] = $msg;
               $data['type'] = $type;
               $data['page'] = 'pages/reclamation';
               $data['conteneur'] = 'esp_fonc/index';
               $this->load->view('index', $data);
          }
          $nc = intval($this->input->get_post('nc'));

          if ($this->input->post('send_form') == 'rc') {
               $res = $this->espace_mod->do_reclamation();

               switch ($res) {
                    // succès
                    case 1:
                         $msg = "Réclamation envoyée avec succès.";
                         $type = 0;
                         break;

                    // erreur sur l'upload
                    case 2:
                         $msg = $this->multi_upload->display_errors();
                         $type = 1;
                         break;

                    default:
                         $msg = "Lenvoi de la Réclamation a échoué, veuillez réessayer SVP !";
                         $type = 1;
               }
          }

          /* if($this->input->post('send_form')=='rdv'){
            $res = $this->espace_mod->do_rendezvous($this->input->post('daterdv'));

            switch($res){
            // echec
            case 0:
            $msg = "Lenregistrement du rendez-vous a échoué, veuillez réessayer SVP !";
            $type = 1;
            break;

            // erreur
            case 2:
            $msg = "Vous avez dej&agrave; pris un Rendez-vous pour ce motif &agrave; cette date !";
            $type = 1;
            break;

            // erreur
            case 3:
            $msg = "Impossible de prendre Rendez-vous pour cette date !";
            $type = 1;
            break;

            // succès, fiche de rdv
            default:
            $data['page'] = 'pages/fiche_rdv_2';
            $data['numrecu'] = $res;
            $data['date_rdv'] = $this->input->post('daterdv');

            $data['conteneur'] = 'esp_fonc/index';
            $this->load->view('index',$data);

            return FALSE;
            }
            } */

          switch ($nc) {
               // reclamation
               case 1:
                    $data['page'] = 'pages/reclamation';
                    break;

               // rdv
               /*                case 2:
                 $data['extract_data'] = $this->espace_mod->extract_data();
                 $data['page'] = 'pages/demande_rdv';
                 break;
                */
               //
               default:
                    redirect('front-page/espace_fonctionnaire/accueil', 'refresh');
          }

          $data['objet'] = $this->espace_mod->readAll($this->tab1);

          $data['msg'] = $msg;
          $data['type'] = $type;

          $data['conteneur'] = 'esp_fonc/index';
          $this->load->view('index', $data);
     }

     /* public function print_recu_rdv() {
       $page = 'esp_fonc/pages/print_rdv';
       $data['numrecu'] = $this->input->post('recu');

       $this->imprimer($page, $data, 'recu_demande_rdv.pdf');
       } */

     // traitement
     public function mon_compte_do() {
          $mc = intval($this->input->get_post('mc'));

          switch ($mc) {
               // infos perso
               case 1:
                    $res = $this->espace_mod->update_compte();

                    if ($res == 1) {
                         $msg = "Mise à jour effectuée avec succès.";
                         $type = 2;
                    } elseif ($res == 2) {
                         $msg = "Renseignez le lieu de naissance SVP !";
                         $type = 1;
                    } else {
                         $msg = "La mise à jour a échoué !";
                         $type = 1;
                    }
                    break;

               // mot de passe
               case 2:
                    $res = $this->espace_mod->change_pass();

                    switch ($res) {
                         case 4:
                              $msg = "Les mots de passe ne sont pas identiques !";
                              $type = 1;
                              break;

                         case 3:
                              $msg = "Entrez un nouveau mot de passe SVP !";
                              $type = 1;
                              break;

                         case 2:
                              $msg = "Le mot de passe actuel est erroné !";
                              $type = 1;
                              break;

                         case 1:
                              $msg = "Nouveau mot de passe enregistré avec succès.";
                              $type = 2;
                              $this->session->set_userdata(['Etat_pass' => 0]);
                              break;

                         default :
                              $msg = "La mise à jour a échoué !";
                              $type = 1;
                    }
                    break;

               // print espace fonct
               default:
          }

          $this->mon_compte($msg, $type);
     }

     // changement de photo
     public function photo() {
          $res = $this->espace_mod->change_photo();

          switch ($res) {
               case 2:
                    $msg = $this->upload2->display_errors();
                    $type = 1;
                    break;

               case 1:
                    $msg = "Photo enregistrée.";
                    $type = 2;
                    break;

               default :
                    $msg = "La mise à jour a échoué !";
                    $type = 1;
          }

          $this->accueil($msg, $type);
     }

     // position speciale
     public function position_speciale($msg = '', $type = '') {
          $ps = intval($this->input->get_post('ps'));

          $data['msg'] = $msg;
          $data['type'] = $type;

          $data['motif'] = $this->espace_mod->motif_ps();

          if ($ps == 1) { // detachement
               $data['projet'] = $this->espace_mod->projet_dtch();
               $data['suivi'] = $this->espace_mod->suivi_dtch();
               $data['suivi_det_400'] = $this->espace_mod->suivi_dtch();

               $data['page'] = 'pages/detachement';
          } elseif ($ps == 2) { // disponibilité
               $data['accueil'] = $this->espace_mod->accueil_med();
               $data['destination1'] = $this->espace_mod->accueil_med();
               $data['destination2'] = $this->espace_mod->destination_med();
               $data['suivi'] = $this->espace_mod->suivi_med();
               $data['suivi_med_400'] = $this->espace_mod->suivi_med();

               $data['page'] = 'pages/disponibilite';
          } else { // mise a disposition
               $data['str_affect'] = $this->espace_mod->str_affect();
               $data['line_query_dmd'] = $this->espace_mod->suivi_mad();
//                $data['line_query_dmd_400'] = $this->espace_mod->suivi_mad();
               redirect('front-page/espace_fonctionnaire/logout', 'refresh');
               //$data['page'] = 'pages/disposition';
          }

          $data['conteneur'] = 'esp_fonc/index';
          $this->load->view('index', $data);
     }

     // traitement de validation des positions speciales
     public function do_ps_val() {
          $sm = intval($this->input->get_post('ps'));

          // DETACHEMENT
          if ($sm == 1) { // detachement
               // controle sur la date d'effet
               $date_effet = substr($this->input->post('TBGL_EFFET'), 6, 4)
                       . substr($this->input->post('TBGL_EFFET'), 3, 2)
                       . substr($this->input->post('TBGL_EFFET'), 0, 2);

               $date_jour = date('Ymd', strtotime('+3 month')); //date du jour plus 3 mois
               $date_retour = date('Ymd', strtotime('+2 month')); //date du jour plus 2 mois

               if ($this->input->post('TBGL_NAT') == 'Demande' || $this->input->post('TBGL_NAT') == 'Renouvellement') {
                    if (intval($date_effet) < intval($date_jour)) {
                         $msg = "la date d'effet doit être égale à la date du jour plus 3 mois";
                         $type = 1;

                         $this->position_speciale($msg, $type);
                    } else {
                         $this->traitement_ps();
                    }
               } else {
                    if (intval($date_effet) <> intval($date_retour)) {
                         $msg = "la date d'effet doit être égale à la date du jour plus 2 mois";
                         $type = 1;

                         $this->position_speciale($msg, $type);
                    } else {
                         $this->traitement_ps();
                    }
               }
          }
          // DISPONIBILITE
          elseif ($sm == 2) {
               // controle sur la date d'effet
               $date_effet = substr($this->input->post('TBGL_EFFETS'), 6, 4)
                       . substr($this->input->post('TBGL_EFFETS'), 3, 2)
                       . substr($this->input->post('TBGL_EFFETS'), 0, 2);

               $date_jour = date('Ymd', strtotime('+3 month')); //date du jour plus 3 mois
               $date_retour = date('Ymd', strtotime('+2 month')); //date du jour plus 2 mois

               if ($this->input->post('TBGL_NATS') == 'Demande' || $this->input->post('TBGL_NATS') == 'Renouvellement') {
                    if (intval($date_effet) < intval($date_jour)) {
                         $msg = "la date d'effet doit être égale à la date du jour plus 3 mois";
                         $type = 1;

                         $this->position_speciale($msg, $type);
                    } else {
                         $this->traitement_ps();
                    }
               } else {
                    $this->traitement_ps();
               }
          }
          // MISE A DISPOSITION
          else {
               $this->traitement_ps();
          }
     }

     // traitement position speciale
     public function traitement_ps() {
          $sm = $this->input->get_post('ps');

          switch ($sm) {
               // detachement
               case 1:
                    if ($this->input->get_post('detach')) {
                         $trt = $this->espace_mod->del_ps_dtch();
                    } else {
                         $trt = $this->espace_mod->val_ps_dtch();
                    }
                    break;

               // disponibilite
               case 2:
                    if ($this->input->get_post('dispon')) {
                         $trt = $this->espace_mod->del_ps_med();
                    } else {
                         $trt = $this->espace_mod->val_ps_med();
                    }
                    break;

               // disposition
               default:
                    if ($this->input->get_post('dispo')) {
                         $trt = $this->espace_mod->del_ps_mad();
                    } else {
                         $trt = $this->espace_mod->val_ps_mad();
                    }
          }

          switch ($trt) {
               case 2:
                    $msg = "Vous avez déjà une demande en cours !";
                    $type = 1;
                    break;

               case 3:
                    $msg = "Désolé, vous n'avez fait aucune demande !";
                    $type = 1;
                    break;

               case 4:
                    $msg = "Désolé, votre demande a été validée par un des acteurs !";
                    $type = 1;
                    break;

               case 5:
                    $msg = "Désolé vous ne pouvez pas exprimer une demande.<br>"
                            . " Vous êtes en attente de redéploiement !";
                    $type = 1;
                    break;

               case 0:
                    $msg = "Le traitement a échoué, veuillez réessayer SVP !";
                    $type = 1;
                    break;

               default :
                    $msg = "Opération effectuée avec succès.";
                    $type = 2;
          }

          $this->position_speciale($msg, $type);
     }


     // DEMANDE D'ACTES
     public function demande_acte($msg = '', $type = '') {

      //preafficher la date de prise de service
      $date_p=explode('/',$this->session->userdata('date_prise_serv_structure'));
      //permutation
      $temp=$date_p[0];
      $date_p[0]=$date_p[2];
      $date_p[2]=$temp;
      $date_p=implode('-',$date_p);

       $data['emplois'] = $this->espace_mod->list_emploi();
       $data['type_actes']= $this->espace_mod->nature_da('');
       $data['date_p']=$date_p;


          //$data['extract_data'] = $this->espace_mod->extract_data();

          $data['msg'] = $msg;
          $data['type'] = $type;

          $data['page'] = 'pages/demande_acte';
          $data['conteneur'] = 'esp_fonc/index';

          $this->load->view('index', $data);
     }

     public function trt_demande_acte() {

		$config = array(
    	array('field'=>'nom_prenoms','label'=>'Nom et Prenom','rules'=>'required|trim'),
         array('field'=>'acte','label'=>'acte','rules'=>'required|trim'),
         //msg recoit le motif de la demande 
    	array('field'=>'msg','label'=>'message','rules'=>'required|trim'),
     array('field'=>'mail','label'=>'email','rules'=>'required|trim|email'),
         //ajout des autres champs obligatoires
     array('field'=>'matricule','label'=>'matricule','rules'=>'required|trim'),
     array('field'=>'date_service','label'=>'date_service','rules'=>'required|trim|email'),
     array('field'=>'emploid','label'=>'emploid','rules'=>'required|trim|email')
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

        //verification matricule chef hierarchique
        $chef_mat='';
        $rep_chef=0;
        $ch_acte=$this->input->post('acte');
        $chef_mat=$this->input->post('mat_chef');

        if(!empty($chef_mat)) $rep_chef=$this->espace_mod->exist('agent',array('matricule'=>$chef_mat));
        
        if($ch_acte==6  && $rep_chef==0)
        {
                $msg = "Veuillez Vérifier le Matricule du Supérieur Hiérarchique !";
                $type = 1;
                $function = $this->input->post('parent');
                $this->$function($msg, $type);
        }
        else
        {
      //enregistrement de la demande
            $actes=array();
            $actes['matricule']=$this->input->post('matricule');
            $actes['type_acte']=$this->input->post('acte');
            $actes['motif']=$this->input->post('msg');
            $actes['Etat']=1;
            $actes['nom_acte']='';
            $actes['telephone']='';
            $actes['email']='';
            $actes['chef_mat']=$chef_mat;
            $actes['DateEtat']=date('d-m-Y');

            $dmd=$this->espace_mod->addquerry('demande_acte',$actes);

		$mail_to='sgp.drhmef@finances.gouv.ci,drhmef_scom@finances.gouv.ci,vam.toure@finances.gouv.ci';


      $mail_to_cl = $this->input->post('mail');
      $subject = $this->input->post('acte');

	  $nature= $this->espace_mod->nature_da($subject);
      $data = array(
		'nature' => $nature[0]['type_acte'],
        'noms' => $this->input->post('nom_prenoms'),
		'matricule' => $this->input->post('matricule'),
		'date_prise_service' => $this->input->post('date_service'),
		'tel' => $this->input->post('tel'),
        'email' => $mail_to_cl,
        'message' => $this->input->post('msg'),
        'dg'=>$this->session->userdata('lib_dir'));
      $data['cs']='';
      if($ch_acte==6)
      {
        $chief=$this->espace_mod->read_row('agent',array('matricule'=>$chef_mat));
        $data['cs']='Nom du Supérieur Hiérarchique : ';
        $data['cs'] .=$chief['nom'];
        $data['cs'] .='(';
        $data['cs'] .=$chef_mat;
        $data['cs'] .=')';
      }

        //envoi du mail au service
      	$message=$this->load->view('email_templ_dm_esp',$data,TRUE);

      	$this->email->_set_header('Return-Receipt-To',$mail_to_cl);
		$this->email->_set_header('Disposition-Notification-To',$mail_to_cl);
		$this->email->_set_header('Content-Transfer-Encoding','8bit');

		$this->email->set_mailtype("html");
		$this->email->initialize($config);
		$this->email->from('drhmef@finances.gouv.ci','DRH MEF');
		$this->email->to($mail_to);
          $this->email->cc(support);

		$this->email->subject($nature[0]['type_acte']);
		$this->email->message($message);
      	$this->email->send();

      //accuse de reception
      $message=$this->load->view('email_templ_cl_dem_esp',$data,TRUE);

      $this->email->_set_header('Return-Receipt-To',$mail_to);
      $this->email->_set_header('Disposition-Notification-To', $mail_to);
      $this->email->_set_header('Content-Transfer-Encoding','8bit');

      $this->email->set_mailtype("html");
      $this->email->initialize($config);
      $this->email->from('drhmef@finances.gouv.ci','DRH MEF');
      $this->email->to($mail_to_cl);
      $this->email->cc('aajani25@gmail.com,gnirecoul@gmail.com,deonto@finances.gouv.ci,koumnouh@gmail.com');
      $this->email->subject($nature[0]['type_acte']);
      $this->email->message($message);
      $this->email->send();

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
    }//grand else
        //if($this->input->post('parent')=='contact'){

     }

     public function del_demande_acte() {
          $res = $this->espace_mod->del_dmd_acte();

          if ($res == 0) {
               $msg = "Echec de la suppression, veuillez réessayer SVP !";
               $type = 1;
          } else {
               $msg = "Suppression effectuée avec succès.";
               $type = 2;
          }

          $this->demande_acte($msg, $type);
     }

     public function imprime_acte() {
          $data['tab'] = $this->espace_mod->print_recu_1();
          $data['numrows'] = $this->espace_mod->print_recu_2();

          $this->imprimer('esp_fonc/pages/print_acte', $data, 'recu.pdf');
     }


     public function sup_hierar()
	{

	   $html='<select class="form-control" name="sd" id="sd">';
	   $html .='<option value="">--Choix--</option>';
           $html .='<option value="">Aucun</option>';
	   $html .='<option value=""></option>';
	   $html .='</select>';

           $html='<input type="text" name="nom" class="champ_de_saisie" required id="nom" value="qqqq"/>';

	  $data = array('nom' =>$html);

        //Either you can print value or you can send value to database
        echo json_encode($data);
	}

     // compteur de visite
     /* public function initTools(){
       $platform = $this->agent->platform();
       $browser = $this->agent->browser();
       $version = $this->agent->version();
       $langue = $this->agent->languages();

       $screen_x = $this->input->post('scren_x');
       $screen_y = $this->input->post('scren_y');
       $resol = $this->input->post('resol');
       $ip = $this->input->ip_address();
       $refer = $this->agent->referrer();

       $dataOs = $this->espace_mod->opsystem($platform);
       $dataWeb = $this->espace_mod->browser($browser,$version);

       $randid = uniqid();

       if($this->session->userdata('randid') == 0){
       $dataGuest1 = array('id_operating_system'=>$dataOs,
       'id_web_browser'=>$dataWeb,
       'idrand'=>$randid,
       'screen_resolution_x'=>$screen_x,
       'screen_resolution_y'=>$screen_y,
       'accept_language'=>$langue[0]
       );

       $idcon = $this->espace_mod->addquerry('guest',$dataGuest1);

       $dataCon = array(
       'id_guest'=>$idcon,
       'ip_address'=>$ip,
       'http_referer'=>$refer,
       'date_add'=>date('Y-m-d'),
       'heure_add'=>date('H:i:s')
       );

       $idcon2 = $this->espace_mod->addquerry('connections',$dataCon);

       $data = array('idUser' => $idcon2,'randid'=>$randid,'ip_address'=>$ip,'isVisited' => true);

       $this->session->set_userdata($data);

       }
       } */
       // DEMANDE D'ACTES
     public function stat_servicesignes($serv=null) {

          if(!in_array($serv,array('actes','plaintes','stages','avf','drh'))) 
          {
               redirect('front-page/espace_fonctionnaire/accueil', 'refresh');
          }
          else 
          {    if ($serv=='actes')
               { 
                    $type_actes= $this->espace_mod->requete(REQ_LST_TYPE_ACTE,'');
                                 
                    for ($i=0;$i<3;$i++){
                         $stat=$this->espace_mod->requete(REQ_STAT_DMD_ACTE,$type_actes[$i]['idtype']);
                         $stats[]=$stat[0];
                    }
               
                        
                    $data['msg'] = $msg;
                    $data['type'] = $type;
                    $data['stats'] = $stats;
                    $data['page'] = 'pages/stat_demande_acte';
                    $data['conteneur'] = 'esp_fonc/index';
                    $this->load->view('index', $data);
                    
               }
               else if($serv=='plaintes') 
               {  
                    $plaintes= $this->espace_mod->requete(REQ_STAT_PLAINTES,'');
                    $data['msg'] = $msg;
                    $data['type'] = $type;
                    $data['stats'] = $plaintes;
                    $data['page'] = 'pages/stat_plaintes';
                    $data['conteneur'] = 'esp_fonc/index';
                    $this->load->view('index', $data);

               }
               else if($serv=='stages') 
               {   
                    $stages= $this->espace_mod->requete(REQ_STAT_STAGES,'');
                    $data['msg'] = $msg;
                    $data['type'] = $type;
                    $data['stats'] = $stages;
                    $data['page'] = 'pages/stat_stages';
                    $data['conteneur'] = 'esp_fonc/index';
                    $this->load->view('index', $data);
               }
               else if($serv=='avf') 
               {
                    $avfs= $this->espace_mod->requete(REQ_STAT_AVF,'');
                    $data['msg'] = $msg;
                    $data['type'] = $type;
                    $data['stats'] = $avfs;
                    $data['page'] = 'pages/stat_avis_favoravle';
                    $data['conteneur'] = 'esp_fonc/index';
                    $this->load->view('index', $data);
               }
               else if($serv=='drh') 
               {
                    echo 'drh';exit;
               }
               
          }
     }
          
           
}

?>
