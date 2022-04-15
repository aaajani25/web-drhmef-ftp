<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Espace_mod extends CI_Model {

    private $bd_site = 'dba_mefsitepro';
    private $bd_sigfae = 'bd_gespers_web';

    public function __construct() {
        parent::__construct();
        define('QUOTA', 100);

        // chargement de la base de données sigfae
        $this->sf = $this->load->database('sigfae', TRUE);
        $this->load->helper('password');
    }

    // VALIDATION DE FORMULAIRE
    public function form_val($config) {
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            return 1;
        } else {
            return 0;
        }
    }

    // verifier l'existence d'un enregistrement
    public function exist($table, $cond) {
        $query = $this->db->get_where($table, $cond);

        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    // requete de projection en tableau avec condition et limite
    public function read_result($table, $cond, $orderby, $limit) {
        $this->db->select("*")
                ->from($table)
                ->where($cond)
                ->order_by($orderby[0], $orderby[1])
                ->limit($limit);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    public function read_row_l($table, $cond, $orderby, $limit) {
        $this->db->select("*")
                ->from($table)
                ->where($cond)
                ->order_by($orderby[0], $orderby[1])
                ->limit($limit);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        } else {
            return 0;
        }
    }

    // requete de projection
    public function readAll($table) {
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    // requete de projection
    public function read_ville() {
        $this->db->select("*")
                ->from('tbaf_spref')
                ->where(array('LIB_SPREF <>' => ''))
                ->order_by('LIB_SPREF', 'asc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    // requete de projection
    public function readOne($table) {
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        } else {
            return 0;
        }
    }


    public function read_row_l2($table, $cond) {
        $this->db->select("*")
                ->from($table)
                ->where($cond)
                ;
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }


    // requete de projection d'une ligne
    public function read_row($table, $cond) {
        $query = $this->db->get_where($table, $cond);

        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        } else {
            return 0;
        }
    }

    public function selectlist($req, $data) {
        $query = $this->sf->query($req, $data);
        $row = $query->result(); //row();
        return $row;
    }
    public function requete($requete, $cond) {
        if(empty($cond))
            {
                $query=$this->db->query($requete);
            }
            else
            {
              $query=$this->db->query($requete,$cond);
            }

            if ($query->num_rows() > 0)
            {
                $data = $query->result_array();
                return $data;
            }
            else
            {
                return 0;
            }

    }

    public function selectline($req, $data) {
        $query = $this->sf->query($req, $data);
        $row = $query->row(); //row();
        return $row;
    }

    public function read_row_sf($table, $cond) {
        $query = $this->sf->get_where($table, $cond);

        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        } else {
            return 0;
        }
    }

    // requete avec jointure
    public function do_join_limit($projection, $table_from, $jointure, $cond, $orderby, $limit) {
        $this->db->select($projection);
        $this->db->from($table_from);

        foreach ($jointure as $val) {
            $this->db->join($val[0], $val[1], $val[2]);
        }

        $this->db->where($cond);
        $this->db->order_by($orderby[0], $orderby[1]);
        $this->db->limit($limit);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    // MISE A JOUR DU COMPTE
    public function update_compte() {
        $lieu = '';

        if ($this->input->post('lieu') == 'autre') {
            if ($this->input->post('autre_lieu') == '') {
                return 2;
            } else {
                $lieu = $this->input->post('autre_lieu');
            }
        } else {
            $lieu = $this->input->post('lieu');
        }

        $table = array(
            $this->input->post('tb_cni'),
            $this->input->post('tb_datecni'),
            $this->input->post('tb_lieu'),
            $this->input->post('tb_tel'),
            $this->input->post('tb_cell'),
            $this->input->post('tb_adr'),
            'inscription_agent_1'
        );

        $col = array(
            $this->input->post('col_cni'),
            $this->input->post('col_datecni'),
            $this->input->post('col_lieu'),
            $this->input->post('col_tel'),
            $this->input->post('col_cell'),
            $this->input->post('col_adr'),
            'email'
        );

        $value = array(
            $this->input->post('cni'),
            $this->input->post('datecni'),
            $lieu,
            $this->input->post('tel'),
            $this->input->post('cel'),
            $this->input->post('addr'),
            $this->input->post('email')
        );

        $n = 0;
        $t = count($table);

        while ($n <= $t - 1) {
            $xt = substr($table[$n], 0, 1);

            if ($xt == 's')
                $colmat = 'MATRICULE';
            else
                $colmat = 'matricule';

            $this->db->where($colmat, $this->session->userdata('matricule'));
            $this->db->update($table[$n], array($col[$n] => $value[$n]));

            $n++;
        }

        if ($n == $t) {
            // rafraichissement de la session
            $data_sess = array(
                $col[0] => $value[0],
                $col[1] => $value[1],
                $col[2] => $value[2],
                $col[3] => $value[3],
                $col[4] => $value[4],
                $col[5] => $value[5],
                $col[6] => $value[6]
            );

            $this->session->set_userdata($data_sess);

            // on MAJ
            $this->db->where('matricule', $this->session->userdata('matricule'));
            $this->db->update('inscription_agent_1', array('lieunaiss' => $lieu, 'date_modif' => date('Y-m-d H:i:s')));

            return 1;
        } else {
            return 0;
        }
    }

    // MAJ  du password
    public function change_pass() {
        $mdp_sess = $this->session->userdata('pswd');
        $mdp1 = $this->input->post('mdp1');
        $mdp2 = $this->input->post('mdp2');
        $mdp3 = $this->input->post('mdp3');

        if ($mdp3 != $mdp2) {
            return 4;
        } elseif ($mdp2 == $mdp1) {
            return 3;
        } elseif (!Password::verify($mdp1, $mdp_sess)) {
            return 2;
        } else {
            $hashedPassword=Password::hash($mdp2);
            $this->db->where('matricule', $this->session->userdata('matricule'));
            $this->db->update('inscription_agent_1', array('pswd' => $hashedPassword, 'date_modif' => date('Y-m-d H:i:s'), 'Etat_pass' => 0));

            $query = $this->db->affected_rows();

            if ($query > 0) {
                // session refresh
                $this->session->set_userdata(array('pswd' => $hashedPassword,'Etat_pass' => 0));
                return 1;
            } else {
                return 0;
            }
        }
    }

    //upload image miniature
    public function getPhoto() {
        $config['upload_path'] = 'assets/espace_fon/photos/';
        $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG';
        $config['max_size'] = '500';
        $config['max_width'] = '200';
        $config['max_height'] = '200';

        $this->load->library('upload2', $config);
        $this->upload2->initialize($config);

        if (!$this->upload2->do_upload()) {
            return 0;
        } else { // image uploadée
            $photo = $this->upload2->data();
            return $photo;
        }
    }

    public function change_photo() {
        // on upload la nouvelle photo
        $img = $this->getPhoto();

        if ($img == 0) {
            return 2;
        } else {
            $newphoto = $this->session->userdata('matricule') . $img['file_ext'];
        }

//            // on verifie si une photo existe deja
//            $photo_bd = $this->read_row('inscription_agent_1', array('matricule' => $this->session->userdata('matricule')));
//
//            // on supprime l'ancienne photo
//            if($photo_bd['photo'] != ''){
//                unlink('assets/espace_fon/photos/'.$photo_bd['photo']);
//            }
        // on rennome la nouvelle
        $oldname = "assets/espace_fon/photos/" . $img['file_name'];
        $newname = $_SERVER['DOCUMENT_ROOT'] . "/photos/" . $newphoto;

        $rename = rename($oldname, $newname);

        if ($rename == TRUE) {
            // on MAJ
            $this->db->where('matricule', $this->session->userdata('matricule'));
            $this->db->update('inscription_agent_1', array('photo' => $newphoto, 'date_modif' => date('Y-m-d H:i:s')));

            // on rafraichit la donnée session photo
            $this->session->set_userdata(array('photo' => $newphoto));
            return 1;
        } else {
            return 0;
        }
    }

    /* ################################## REQUETES ESPACE FONCTIONNAIRE ################################## */

    // execution des requetes
    /*
     * $base = la base de données à attaquer (site = db (base par defaut), sigfae = sf, concours = cc)
     * $sql = la requete sql
     * $mode = le type de resultat retourné (tableau par defaut, row pour une ligne)
     */

    // requete xCUD (control , create, update, delete)
    public function xcudSQL($base, $sql) {
        $this->$base->query($sql);
        $query = $this->$base->affected_rows();

        if ($query > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    // requete de projection (read)
    public function getSQL($base, $sql, $mode) {
        $query = $this->$base->query($sql);

        if ($query->num_rows() > 0) {
            if ($mode == 'row') {
                $data = $query->row_array();
            } else {
                $data = $query->result_array();
            }

            return $data;
        } else {
            return 0;
        }
    }

    // liste des enfants
    public function liste_enfant() {
        $rek_enft = "SELECT DISTINCT `PR_PARENT_NOM` ,`PR_PARENT_PREN`, `PR_PARENT_DATNAIS` , `PR_PARENT_LIEUNAIS`, `PA_SEXE_LIB`, `LIB_SPREF`
                FROM " . $this->bd_sigfae . ".tbpr_parent
                INNER JOIN tbpa_sexe ON " . $this->bd_sigfae . ".tbpr_parent.PA_SEXE_CODE = tbpa_sexe.PA_SEXE_CODE
                LEFT JOIN tbaf_spref ON CODE_SPREF = PR_PARENT_LIEUNAIS
                WHERE CE_AGT_MAT = '" . $this->session->userdata('matricule') . "'";

        return $this->getSQL('sf', $rek_enft, '');
    }


     // le lieu de naissance d'un agent
     public function lieu_naiss($special = false) {
          $req_lieu = "SELECT  `LIB_SPREF`
                FROM " . $this->bd_site . ".tbaf_spref
                INNER JOIN inscription_agent_1 ON " . $this->bd_site . ".tbaf_spref.CODE_SPREF = " . $this->bd_site . ".inscription_agent_1.lieunaiss
                WHERE " . $this->bd_site . ".inscription_agent_1.matricule = '" . $this->session->userdata('matricule') . "'";

          $res_lieunais = $this->db->query($req_lieu);

          if ($special) {
               $data = $res_lieunais;
          } else {

               if ($res_lieunais->num_rows() > 0) {
                    $data = $res_lieunais->result_array();

               } else {
                    $data = '';
               }
          }

           return $data;

     }


    // banque
    public function info_banque($table) {
        $rek_bank = "SELECT " . $table . ".PAYE_BANQUE, agences.LIBELLE as agence, banques.LIBELLE as banque FROM " . $table . "
                LEFT JOIN `agences` ON `PAYE_BANQUE` = `CODE_AGENCE`
                LEFT JOIN `banques` ON `CODE_BANQUE` = `CODE`
                WHERE `MATRICULE` LIKE '%" . $this->session->userdata('matricule') . "%' ";

//            echo $rek_bank; exit;
        return $this->getSQL('db', $rek_bank, 'row');
    }

    // présence au poste
    public function presence_poste() {
        $sw_presence = "SELECT * FROM $this->bd_sigfae.`presence_poste2016` "
                . "WHERE `agentmatricule` = '" . $this->session->userdata('matricule') . "' and total=0";

        $run_query = $this->sf->query($sw_presence);
        return $run_query->num_rows();
    }

    // verification de titularisation
    public function titulariser($matricule) {
        $tit = "SELECT * FROM `actes` WHERE `matricule` LIKE '%" . $matricule . "%' AND `libelle_acte`"
                . " LIKE '%TITULARISATION%' ";

        $res_tit = $this->db->query($tit);

        $data = $res_tit->row_array();
        $nb = $res_tit->num_rows();

        if ($nb > 0) {
            $datsign = explode('/', $data['date_signe']);
            $datsign_tit = $datsign[2] . $datsign[1];

            if ($datsign_tit < 201207 && $data['etat'] == 'ACTE SIGNE') {
                return 2;
            } else {
                return 1;
            }
        } else {
            return 0;
        }
    }

    public function alerte_deblocage($matricule) {
        $query = "Select * From $this->bd_sigfae.deblocage_salaire Where MATRICULE = '" . $matricule . "' ";

        $res_query = $this->sf->query($query);
        $nb = $res_query->num_rows();

        if ($nb > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function search_structure($matricule) {
        $query = "Select * From  $this->bd_sigfae.deblocage_salaire "
                . "Where MATRICULE = '" . $matricule . "' "
                . "AND STRUCTURE = 'MINISTERE DE L\'EDUCATION NATIONALE ET DE L\'ENSEIGNEMENT TECHNIQUE' ";

        $res_query = $this->sf->query($query);
        $nb = $res_query->num_rows();

        if ($nb > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function deblocage_aout($matricule) {
        $query = "Select * From  $this->bd_sigfae.deblocage_aout Where CE_AGT_MAT = '" . $matricule . "' ";

        $res_query = $this->sf->query($query);
        $nb = $res_query->num_rows();

        if ($nb > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function check_collecte_info($matricule) {
        //grade A3, A4, A5, A6, A7
        if (in_array($this->session->userdata('GRADE'), array('A3', 'A4', 'A5', 'A6', 'A7'))) {
            $valid = 1;
        } else {
            //secretaire de direction, secretaire assistant de direction
            if (in_array($this->session->userdata('EMPLOI'), array('SECRETAIRE DE DIRECTION', 'SECRETAIRE ASSISTANT DE DIRECTION'))) {
                $valid = 1;
            } else {
                //chef de service
                $query = 'Select Distinct MATRICULE '
                        . 'From ' . $this->bd_sigfae . '.tbno_inscrire '
                        . 'Where MATRICULE = "' . $matricule . '" And ETAT_INCR = 1 ';

                $res_query = $this->sf->query($query);
                $nb = $res_query->num_rows();

                if ($nb > 0) {
                    $valid = 1;
                } else {
                    $valid = 0;
                }
            }
        }

        return $valid;
    }

    public function check_send_param($matricule) {
        $query1 = "Select * From ansult_compte Where Matricule = '" . $matricule . "' And Etat_rep = 1";

        $res_query1 = $this->db->query($query1);
        $nb1 = $res_query1->num_rows();

        if ($nb1 > 0) {
            $r1 = $res_query1->row_array();
            $Login_user = $r1['Login_user'];
            $Pass_user = $r1['Pass_user'];

            $reponse = 'Votre Nom utilisateur est: ' . $Login_user . ' et votre mot de passe est: ' . $Pass_user;
        } else {
            $query2 = "Select * From ansult_pass_init Where Matricule = '" . $matricule . "' And Etat_rep = 1";

            $res_query2 = $this->db->query($query2);
            $nb2 = $res_query2->num_rows();

            if ($nb2 > 0) {
                $r2 = $res_query2->row_array();
                $Login_user = $r2['Login_user'];
                $Pass_user = $r2['Pass_user'];

                $reponse = 'Votre Nom utilisateur est: ' . $Login_user . ' et votre Mot de passe est: ' . $Pass_user;
            } else {
                $reponse = '0';
            }
        }

        return $reponse;
    }

    // sans actes
    public function sans_actes($matricule) {
        $query = 'SELECT * FROM sans_actes_2016 WHERE MATRICULE="' . $matricule . '" ';

        $res_query = $this->db->query($query);
        $nb = $res_query->num_rows();

        if ($nb > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    //requete qui attribue le service de notation de l'agent s'il est note
    public function section_emploi() {
        $sql = "Select Case When (tbno_notation.CODE_SC Is Not Null And tbno_notation.CODE_SC <> '')  Then LIB_SC
                             Else (Case When (tbno_notation.CODE_SD Is Not Null And tbno_notation.CODE_SD <> '') Then LIB_SD
                 Else (Case When (tbno_notation.CODE_DC Is Not Null And tbno_notation.CODE_DC <> '') Then LIB_DC
                 Else (Case When (tbno_notation.CODE_DG Is Not Null And tbno_notation.CODE_DG <> '') Then LIB_DG
                 Else (Case When tbno_notation.CODE_CAB Is Not Null And tbno_notation.CODE_CAB <> '' Then LIB_CAB
                 End)End) End) End) End As service, structure.libelle, LIB_CAB, LIB_DG, LIB_DC, LIB_SD, LIB_SC, LIB_SPREF
                               From $this->bd_sigfae.tbno_notation
                      Left Join $this->bd_sigfae.tbaf_cabinet On tbno_notation.CODE_CAB = tbaf_cabinet.CODE_CAB
                   Left Join $this->bd_sigfae.tbaf_direction_gle On tbno_notation.CODE_DG = tbaf_direction_gle.CODE_DG
                   Left Join $this->bd_sigfae.tbaf_direction_centre On tbno_notation.CODE_DC = tbaf_direction_centre.CODE_DC
                   Left Join $this->bd_sigfae.tbaf_sdirection On tbno_notation.CODE_SD = tbaf_sdirection.CODE_SD
                   Left Join $this->bd_sigfae.tbaf_service On tbno_notation.CODE_SC = tbaf_service.CODE_SC
                   Left Join $this->bd_sigfae.structure On tbno_notation.STRUCTURE = structure.code
                   Left Join $this->bd_sigfae.tbaf_spref On tbno_notation.CODE_SP = tbaf_spref.CODE_SPREF
              Where MATRICULE = '" . $this->session->userdata('matricule') . "'";

//            echo $sql; exit;
//            return $this->getSQL('sf', $sql, 'row');
        $query = $this->sf->query($sql);
        $data = $query->row_array();

//            $nbre_sce_note = $query->num_rows();

        return $data;
    }

    // requete qui retourne les actes d'un fonctionnaire
    public function user_actes() {
        $aux = "";
        $matricule = $this->session->userdata('matricule');

        $dossier_s = "SELECT * FROM `note_service` WHERE `MATRICULE` LIKE '%" . $matricule . "%'";

        $signe = $this->db->query($dossier_s);
        $nbre_s = $signe->num_rows();
        $line_s = $signe->row_array();

        $query = "SELECT DISTINCT matricule, nom, prenoms, num_actes, date_signe, date_effet, Case When (code_acte = 'A0010' Or code_acte = 'A0004' Or code_acte = 'A0002') Then 'NOMINATION' Else libelle_acte End As libelle_acte,
             Case When (OBSERV_REJET <> '') Then 'DOCUMENT REJETE' Else etat End as etat, Concat_ws('/',Right(DATE_REJET,2), Left(Right(DATE_REJET,4),2), Left(DATE_REJET,4))As DATE_REJET ,
             OBSERV_REJET
              FROM `actes`
              WHERE `matricule` LIKE '%" . $matricule . "%' /*And Left(num_actes, 5) Not Like '%N2015%'*/ And code_acte Not In ('A0141') And num_actes Not in('AVT2017MAJ01','AVT2017SOLDE001') ";

        $r_promo = $this->db->query($query);
        $enreg = $r_promo->num_rows();

        if ($enreg > 0) {
            $aux .= '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="3" class="box-content">
                    <tr class="row actes" align="left" style="background-color:#8080FF;">
                       <td>N&deg;</td>
                       <td>Nature</td>
                       <td>Etat</td>
                       <td>Signature</td>
                       <td>Effet</td>
                       <td align="center">Statut</td>
                    </tr>';

            if ($nbre_s > 0) {
                $aux .= '<tr class="row">
                         <td class="">' . $line_s['NUM_ACTE'] . '</td>
                         <td class="">NOTE DE SERVICE</td>
                         <td class="">NOTE SIGNEE</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         </tr>';
            }

            foreach ($r_promo->result_array() as $ligne_promo) {
                $req_upload = "SELECT * FROM `upload_acte` WHERE `matricule`='" . $matricule . "' and `numero` = '" . $ligne_promo['num_actes'] . "'";
//                    echo $req_upload; exit;
                $rp = $this->db->query($req_upload);
                $ln_rp = $rp->row_array();

                //Vérifier que la date de signature est inférieure ou supérieure à la date de début de scannage
                if ($ligne_promo['date_signe'] != '') {
                    $detach = explode('/', $ligne_promo['date_signe']);
                    $datsign = $detach[2] . $detach[1];
                } else {
                    $datsign = '';
                }

                $dir = $_SERVER['DOCUMENT_ROOT'] . '/upload_acte/dir_acte/';
                $rep = $_SERVER['DOCUMENT_ROOT'] . '/TITULARISATION/';

                if ($datsign < 201207 && $ligne_promo['etat'] == 'ACTE SIGNE') {
                    $mention = 'Disponible aux archives';
                } elseif ($ligne_promo['libelle_acte'] <> 'TITULARISATION' && $ligne_promo['etat'] == 'DOCUMENT SAISI') {
                    $mention = 'En traitement';
                } elseif ($ligne_promo['libelle_acte'] == 'REGULARISATION D\'AVANCEMENT') {
                    $mention = 'Acte électronique non délivrable';
                } else {
                    $mention = 'Non encore num&eacute;ris&eacute;';
                }

                $aux .= '<tr class="row" align="left">';

                $aux .= '<td width="5%">' . $ligne_promo['num_actes'] . '</td>
                    <td>' . $ligne_promo['libelle_acte'] . '</td>
                    <td>' . $ligne_promo['etat'] . '</td>
                    <td>' . $ligne_promo['date_signe'] . '</td>
                    <td>' . $ligne_promo['date_effet'] . '</td>';

                if (!empty($ln_rp) && $ln_rp['fichier'] and file_exists($dir . $ln_rp['fichier'])) {
                    $aux .= '<td align="center">'
                            . '<a href="/upload_acte/dir_acte/' . $ln_rp['fichier'] . '" target="_blank" title="Téléchargez l\'acte">'
                            . '<img src="' . base_url('assets/espace_fon') . '/images/pdf.png" width="30" heigth="30" />'
                            . '</a>'
                            . '</td>';
                } elseif (!empty($ligne_promo) && $ligne_promo['libelle_acte'] == 'TITULARISATION' && $ligne_promo['etat'] == 'DOCUMENT SAISI' && file_exists($rep . $matricule . '_TITULARISATION_' . $ligne_promo['num_actes'] . '.PDF')) {
                    $aux .= '<td align="center">'
                            . '<a href="/TITULARISATION/' . $matricule . '_TITULARISATION_' . $ligne_promo['num_actes'] . '.PDF"  title="Téléchargez l\'acte" target="_blank">'
                            . '<img src="' . base_url('assets/espace_fon') . '/images/pdf.png" width="30" heigth="30" />'
                            . '</a>'
                            . '</td>';
                } else {
                    $aux .= '<td class="content" align="center">' . $mention . '</td>';
                }

                $aux .= '</tr>';

                if (!empty($ligne_promo['OBSERV_REJET'])) {
                    $aux .= '<tr class="row">
                          <td align="center"><b>Date Rejet: </b>' . $ligne_promo['DATE_REJET'] . '</td>

                          <td align="center" colspan="4"><b>Motif: </b>' . $ligne_promo['OBSERV_REJET'] . '</td>

                        </tr>';
                }
            }

            $aux .= '</table>';
        }

        return $aux;
    }

    public function user_actes_2() {
        $aux = "";
        $matricule = $this->session->userdata('matricule');

        $query = "SELECT * FROM `courriers` WHERE `matricule` LIKE '%" . $matricule . "%'";
//            echo $query; exit;
        $c_promo = $this->db->query($query);
        $enregc = $c_promo->num_rows();

        if ($enregc > 0) {
            $aux .= '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="3" class="box-content">
                        <tr class="row actes" style="background-color:#8080FF;">
                            <td align="left">N&deg;</td>
                            <td align="left">Nature</td>
                            <td align="center">Objet</td>
                            <td align="center">Date</td>
                            <td align="center">Statut</td>
                        </tr>';

            foreach ($c_promo->result_array() as $cour_promo) {
                $cour_upload = "SELECT * FROM `upload_cour` WHERE `matricule`='" . $matricule . "' and `numero` = '" . $cour_promo['num_cour'] . "'";
                $cu = $this->db->query($cour_upload);
                $ln_cu = $cu->row_array();

                $detach_c = explode('/', $cour_promo['date_signe']);
                $datrep = $detach_c[2] . $detach_c[1];

                $dir = $_SERVER['DOCUMENT_ROOT'] . '/upload_cour/dir_cour/';

                //echo $datrep;
                if ($datrep < 201207) {
                    $mention = 'Disponible aux archives';
                } else {
                    $mention = 'Non encore num&eacute;ris&eacute;';
                }

                $aux .= '<tr class="row">';

                $aux .= '<td align="" class="">' . $cour_promo['num_cour'] . '</td>
                        <td class="" align="left">' . $cour_promo['libelle_cour'] . '</td>
			<td class="" align="center">' . $cour_promo['etat'] . '</td>
                        <td class="" align="center">' . $cour_promo['date_signe'] . '</td>';

                if (!empty($ln_cu) && $ln_cu['fichier'] and file_exists($dir . $ln_cu['fichier'])) {
                    $aux .= '<td align="center">'
                            . '<a href="/upload_cour/dir_cour/' . $ln_cu['fichier'] . '" target="_blank"  title="Téléchargez le courrier">'
                            . '<img src="' . base_url('assets/espace_fon') . '/images/pdf.png" width="30" heigth="30" />'
                            . '</a>'
                            . '</td>';
                } else {
                    $aux .= '<td align="center" class="">' . $mention . '</td>';
                }

                $aux .= '</tr>';
            }

            $aux .= '</table>';
        }
//            else{
//                $aux.='<table width="100%" border="0" align="center" cellpadding="2" cellspacing="3" class="box-content">
//                        <tr class="row actes" style="background-color:#8080FF;">
//                            <td width="15%">N&deg;</td>
//                            <td align="center" width="30%">Nature</td>
//                            <td width="15%">Objet</td>
//                            <td width="15%" align="center">Date</td>
//                            <td width="42%" align="center">Statut</td>
//                        </tr>
//
//                        <tr class="">
//                            <td align="center" class="no-result" colspan="6">AUCUN COURRIER DISPONIBLE</td>
//                        </tr>
//                    </table>';
//            }

        return $aux;
    }

    // requete qui retourne les actes d'un fonctionnaire
    public function user_actes_mobile() {
        $aux = $statut = "";
        $matricule = $this->session->userdata('matricule');

//             $dossier_s="SELECT * FROM `note_service` WHERE `MATRICULE` LIKE '%".$matricule."%'";
//
//             $signe=$this->db->query($dossier_s);
//             $nbre_s=$signe->num_rows();
//             $line_s = $signe->row_array();

        $query = "SELECT DISTINCT matricule, nom, prenoms, num_actes, date_signe, date_effet, Case When (code_acte = 'A0010' Or code_acte = 'A0004' Or code_acte = 'A0002') Then 'NOMINATION' Else libelle_acte End As libelle_acte,
             Case When (OBSERV_REJET <> '') Then 'DOCUMENT REJETE' Else etat End as etat, Concat_ws('/',Right(DATE_REJET,2), Left(Right(DATE_REJET,4),2), Left(DATE_REJET,4))As DATE_REJET ,
             OBSERV_REJET
              FROM `actes`
              WHERE `matricule` LIKE '%" . $matricule . "%' /*And Left(num_actes, 5) Not Like '%N2015%'*/ And code_acte Not In ('A0141') And num_actes Not in('AVT2017MAJ01','AVT2017SOLDE001') ";

        $r_promo = $this->db->query($query);
        $enreg = $r_promo->num_rows();

        if ($enreg > 0) {
//                    if($nbre_s>0){
//                        $aux.='<tr class="row">
//                         <td class="">'.$line_s['NUM_ACTE'].'</td>
//                         <td class="">NOTE DE SERVICE</td>
//                         <td class="">NOTE SIGNEE</td>
//                         <td>&nbsp;</td>
//                         <td>&nbsp;</td>
//                         </tr>';
//                    }

            $aux .= '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="3" class="box-content tab_mob">';

            foreach ($r_promo->result_array() as $ligne_promo) {
                $req_upload = "SELECT * FROM `upload_acte` WHERE `matricule`='" . $matricule . "' and `numero` = '" . $ligne_promo['num_actes'] . "'";

                $rp = $this->db->query($req_upload);
                $ln_rp = $rp->row_array();

                //Vérifier que la date de signature est inférieure ou supérieure à la date de début de scannage
                if ($ligne_promo['date_signe'] != '') {
                    $detach = explode('/', $ligne_promo['date_signe']);
                    $datsign = $detach[2] . $detach[1];
                } else {
                    $datsign = '';
                }

                $dir = $_SERVER['DOCUMENT_ROOT'] . '/upload_acte/dir_acte/';
                $rep = $_SERVER['DOCUMENT_ROOT'] . '/TITULARISATION/';

                if ($datsign < 201207 && $ligne_promo['etat'] == 'ACTE SIGNE') {
                    $mention = 'Disponible aux archives';
                } elseif ($ligne_promo['libelle_acte'] <> 'TITULARISATION' && $ligne_promo['etat'] == 'DOCUMENT SAISI') {
                    $mention = 'En traitement';
                } elseif ($ligne_promo['libelle_acte'] == 'REGULARISATION D\'AVANCEMENT') {
                    $mention = 'Acte électronique non délivrable';
                } else {
                    $mention = 'Non encore num&eacute;ris&eacute;';
                }

                //
                if (!empty($ln_rp) && $ln_rp['fichier'] and file_exists($dir . $ln_rp['fichier'])) {
                    $statut = '<a href="/upload_acte/dir_acte/' . $ln_rp['fichier'] . '" target="_blank" title="Téléchargez l\'acte">'
                            . '<img src="' . base_url('assets/espace_fon') . '/images/pdf.png" width="30" heigth="30" />'
                            . '</a>';
                } elseif (!empty($ligne_promo) && $ligne_promo['libelle_acte'] == 'TITULARISATION' && $ligne_promo['etat'] == 'DOCUMENT SAISI' && file_exists($rep . $matricule . '_TITULARISATION_' . $ligne_promo['num_actes'] . '.PDF')) {
                    $statut = '<a href="/TITULARISATION/' . $matricule . '_TITULARISATION_' . $ligne_promo['num_actes'] . '.PDF"  title="Téléchargez l\'acte" target="_blank">'
                            . '<img src="' . base_url('assets/espace_fon') . '/images/pdf.png" width="30" heigth="30" />'
                            . '</a>';
                } else {
                    $statut = $mention;
                }

                //
                $aux .= '<tr>
                        <td colspan="3" align="" class="title_acte">&nbsp;&nbsp;ACTE</td>
                    </tr>

                    <tr style="background-color:#8080FF;">
                    <td>&nbsp;&nbsp;N&deg;</td>
                    <td align="">Nature</td>
                    <td align="">Etat</td>
                  </tr>

                <tr>
                   <td>&nbsp;&nbsp;' . $ligne_promo['num_actes'] . '</td>
                   <td align="">' . $ligne_promo['libelle_acte'] . '</td>
                   <td align="">' . $ligne_promo['etat'] . '</td>
                 </tr>

                <tr style="background-color:#8080FF;">
                    <td>&nbsp;&nbsp;Signé le</td>
                    <td align="">Date d\'Effet</td>
                    <td align="">Statut</td>
                    </tr>

                  <tr>
                    <td>&nbsp;&nbsp;' . $ligne_promo['date_signe'] . '</td>
                    <td align="">' . $ligne_promo['date_effet'] . '</td>
                    <td align="" class="content">' . $statut . '</td>
                  </tr>
                  ';

                if (!empty($ligne_promo['OBSERV_REJET'])) {
                    $aux .= '<tr class="">
                          <td align=""><b>Date Rejet: </b>' . $ligne_promo['DATE_REJET'] . '</td>
                          </td>
                          <td align="" colspan="4"><b>Motif: </b>' . $ligne_promo['OBSERV_REJET'] . '</td>
                          </td>
                        </tr>';
                }
            }
            $aux .= '</table>';
        }

        return $aux;
    }

    public function user_courrier_mobile() {
        $aux = $tatut = "";
        $matricule = $this->session->userdata('matricule');

        $query = "SELECT * FROM `courriers` WHERE `matricule` LIKE '%" . $matricule . "%'";
//            echo $query; exit;
        $c_promo = $this->db->query($query);
        $enregc = $c_promo->num_rows();

        if ($enregc > 0) {
            $aux .= '
              <table width="100%" border="0" align="center" cellpadding="2" cellspacing="3" class="box-content tab_mob">
                        ';

            foreach ($c_promo->result_array() as $cour_promo) {
                $cour_upload = "SELECT * FROM `upload_cour` WHERE `matricule`='" . $matricule . "' and `numero` = '" . $cour_promo['num_cour'] . "'";
                $cu = $this->db->query($cour_upload);
                $ln_cu = $cu->row_array();

                $detach_c = explode('/', $cour_promo['date_signe']);
                $datrep = $detach_c[2] . $detach_c[1];

                $dir = $_SERVER['DOCUMENT_ROOT'] . '/upload_cour/dir_cour/';

                //echo $datrep;
                if ($datrep < 201207) {
                    $mention = 'Disponible aux archives';
                } else {
                    $mention = 'Non encore num&eacute;ris&eacute;';
                }

                if (!empty($ln_cu) && $ln_cu['fichier'] and file_exists($dir . $ln_cu['fichier'])) {
                    $statut = '<a href="/upload_cour/dir_cour/' . $ln_cu['fichier'] . '" target="_blank"  title="Téléchargez le courrier">'
                            . '<img src="' . base_url('assets/espace_fon') . '/images/pdf.png" width="30" heigth="30" />'
                            . '</a>';
                } else {
                    $statut = $mention;
                }

                //
                $aux .= '
                        <tr>
                        <td colspan="3" align="" class="title_acte">&nbsp;&nbsp;COURRIER</td>
                    </tr>

                        <tr style="background-color:#8080FF;">
                            <td align="">&nbsp;&nbsp;N&deg;</td>
                            <td align="">Nature</td>
                            <td align="">Objet</td>
                        </tr>

                        <tr>
                            <td>&nbsp;&nbsp;' . $cour_promo['num_cour'] . '</td>
                            <td align="">' . $cour_promo['libelle_cour'] . '</td>
                            <td align="">' . $cour_promo['etat'] . '</td>
                        </tr>

                    <tr style="background-color:#8080FF;">
                        <td align="">&nbsp;&nbsp;Date</td>
                        <td align="">Statut</td>
                    </tr>

                  <tr>
                    <td>&nbsp;&nbsp;' . $cour_promo['date_signe'] . '</td>
                    <td align="">' . $statut . '</td>
                  </tr>
                    ';
            }

            $aux .= '</table>';
        }

        return $aux;
    }

    // *************** POSITION SPECIALE *******************************************************
    // motif
    public function motif_ps() {
        $sql = "Select ID, LIBELLE From tmp_motif_disponibilite Order By LIBELLE Asc";
        return $this->getSQL('sf', $sql, 'tab');
    }

    //recuperer le code_dg de l'agent niveau direction generale
    public function codeDG() {
        $sql_code_dg = "Select CODE_DG From tbno_notation Where MATRICULE = '" . $this->session->userdata('matricule') . "' ";
        $code_dg = $this->getSQL('sf', $sql_code_dg, 'row');

        return $code_dg['CODE_DG'];
    }

    // recuperation de la structure de l'agent dans tbno_notation
    public function get_cascade() {
        $rech_str = "Select STRUCTURE, CODE_CAB, CODE_DG, CODE_DC, CODE_SD, CODE_SC "
                . "From tbno_notation "
                . "Where MATRICULE='" . $this->session->userdata('matricule') . "'";

        $code = $this->getSQL('sf', $rech_str, 'row');

        return $code;
    }

    // ############# DETACHEMENT ##############################################
    // projets ou structure de destination detachement
    public function projet_dtch() {
        $sql = "Select code, libelle From tmp_detach_projet Order By libelle Asc";
        return $this->getSQL('sf', $sql, 'tab');
    }

    // Suivi des dettachements
    public function suivi_dtch() {
        $suivi = "Select tmp_detachement.ID, tmp_detachement.MATRICULE, TBGL_ACT, NOM_PRENOMS,
                structure.libelle As STR,
                tmp_motif_disponibilite.LIBELLE As Motif,
                Case When tmp_detachement.ETAT_USERCHEF = 0 Then 'EN ATTENTE'
                Else (Case When tmp_detachement.ETAT_USERCHEF = 1
                Then 'VALIDE' Else 'REJETE' End)End As ETAT_CHEF,
                Case When tmp_detachement.ETAT_DRH = 0 Then 'EN ATTENTE'
                Else (Case When tmp_detachement.ETAT_DRH = 1 Then 'VALIDE'
                Else 'REJETE' End)End As ETATS_DRH, Case When tmp_detachement.ETAT_DPCE = 0
                Then 'EN ATTENTE' Else (Case When tmp_detachement.ETAT_DPCE = 1 Then 'VALIDE'
                Else 'REJETE' End)End As ETAT_DPCE, Case When tmp_detachement.ETAT_CABINET = 0
                Then 'EN ATTENTE' Else (Case When tmp_detachement.ETAT_CABINET = 1 Then 'VALIDE'
                Else 'REJETE' End)End As ETAT_CABINET, tmp_detach_projet.libelle As STRUCT_DEST
                From tmp_detachement Inner Join tbno_notation On tmp_detachement.MATRICULE = tbno_notation.MATRICULE
                Inner Join structure On tmp_detachement.CODE_STR = structure.code
                Left Join tmp_detach_projet on tmp_detach_projet.code = tmp_detachement.STRUCT_DEST
                Left Join tmp_motif_disponibilite on tmp_motif_disponibilite.ID = tmp_detachement.TBGL_MOTIF
                Where TBGL_ETAT = 1 And tmp_detachement.MATRICULE = '" . $this->session->userdata('matricule') . "'
                And tmp_detachement.TBGL_TYPE = 1 Order By tmp_detachement.ID Desc ";

        return $this->getSQL('sf', $suivi, '');
    }

    // VALIDATION DETACHEMENT
    public function val_ps_dtch() {
        // ligne service
        $sql_line_service = "Select Distinct STRUCTURE, CODE_DG, CODE_DC, CODE_SD, CODE_SC, NOM_PRENOMS
                From tbno_notation Where MATRICULE = '" . $this->session->userdata('matricule') . "' ";
        $line_service = $this->getSQL('sf', $sql_line_service, 'row');

        // gestion des cas de redeploiement
        $code = $this->get_cascade();

        if ($code['STRUCTURE'] == 'XX') {
            return 5;
        }

        // on recupere la nature de la demande
        $nature = $this->input->post('TBGL_NAT');

        switch ($nature) {
            case 'Demande':
                // on verifie si une demande existe deja
                $sql_exist = "Select MATRICULE "
                        . "From tmp_detachement "
                        . "Where TBGL_ACT "
                        . "Like '%Demande%' And TBGL_TYPE = 1 And MATRICULE = '" . $this->session->userdata('matricule') . "' "
                        . "And TBGL_ETAT = 1 limit 0,1 ";

                $exist = $this->xcudSQL('sf', $sql_exist);

                if ($exist > 0) {
                    // existe deja
                    return 2;
                } else {
                    // insertion
                    $sql_create = "Insert Into tmp_detachement "
                            . "(`DATE`, `MATRICULE`, `TBGL_MOTIF`,  `TBGL_EFFET`,  `TBGL_TYPE` , `TBGL_ACT`, "
                            . "`CODE_STR`, TBGL_ETAT, TBGL_DUREE, STRUCT_DEST, CODE_DG ) VALUES (CURRENT_TIMESTAMP,"
                            . " '" . $this->session->userdata('matricule') . "',  '" . addslashes($this->input->post('TBGL_MOTIF')) . "', "
                            . "'" . addslashes($this->input->post('TBGL_EFFET')) . "', 1, '" . addslashes($this->input->post('TBGL_NAT')) . "',"
                            . " '" . $line_service['STRUCTURE'] . "', 1, '" . addslashes($this->input->post('TBGL_DUREE')) . "', "
                            . "'" . addslashes($this->input->post('TBGL_STRCT_DEST')) . "', '" . $this->codeDG() . "')";

                    return $this->xcudSQL('sf', $sql_create);
                }
                break;

            // Renouvellement
            case 'Renouvellement':
                $sql_exist = "Select MATRICULE "
                        . "From tmp_detachement "
                        . "Where TBGL_ACT "
                        . "Like '%Demande%' And TBGL_TYPE = 1 "
                        . "And MATRICULE = '" . $this->session->userdata('matricule') . "'"
                        . " And TBGL_ETAT = 1 And ETAT_DPCE = 1 And ETAT_CABINET = 1 limit 0,1 ";

                $exist = $this->xcudSQL('sf', $sql_exist);

                if ($exist > 0) {
                    $sql_create = "Insert Into tmp_detachement "
                            . "(`DATE`, `MATRICULE`, `TBGL_MOTIF`,"
                            . "  `TBGL_EFFET`,  `TBGL_TYPE` , `TBGL_ACT`,"
                            . " `CODE_STR`, TBGL_ETAT, TBGL_DUREE, STRUCT_DEST, CODE_DG )"
                            . " VALUES (CURRENT_TIMESTAMP, "
                            . "'" . $this->session->userdata('matricule') . "',"
                            . "  '" . addslashes($this->input->post('TBGL_MOTIF')) . "',"
                            . " '" . addslashes($this->input->post('TBGL_EFFET')) . "', 1,"
                            . " '" . addslashes($this->input->post('TBGL_NAT')) . "', "
                            . "'" . $line_service['STRUCTURE'] . "', 1, "
                            . "'" . addslashes($this->input->post('TBGL_DUREE')) . "',"
                            . " '" . addslashes($this->input->post('TBGL_STRCT_DEST')) . "',"
                            . " '" . $this->codeDG() . "')";

                    return $this->xcudSQL('sf', $sql_create);
                } else {
                    return 3;
                }
                break;

            // RETOUR
            default:
                $sql_exist = "Select MATRICULE "
                        . "From tmp_detachement "
                        . "Where  TBGL_ACT Like '%Demande%' "
                        . "And TBGL_TYPE = 1 "
                        . "And MATRICULE = '" . $this->session->userdata('matricule') . "' "
                        . "And TBGL_ETAT = 1 "
                        . "And ETAT_DPCE = 1 "
                        . "And ETAT_CABINET = 1 "
                        . "limit 0,1 ";

                $exist = $this->xcudSQL('sf', $sql_exist);

                if ($exist > 0) {
                    $sql_create = "Insert Into tmp_detachement "
                            . "(`DATE`, `MATRICULE`, `TBGL_MOTIF`,  "
                            . "`TBGL_EFFET`,  `TBGL_TYPE` , `TBGL_ACT`, "
                            . "`CODE_STR`, TBGL_ETAT, TBGL_DUREE, "
                            . "STRUCT_DEST, CODE_DG ) "
                            . "VALUES (CURRENT_TIMESTAMP, "
                            . "'" . $this->session->userdata('matricule') . "',  "
                            . "'" . addslashes($this->input->post('TBGL_MOTIF')) . "', "
                            . "'" . addslashes($this->input->post('TBGL_EFFET')) . "', 1, "
                            . "'" . addslashes($this->input->post('TBGL_NAT')) . "', "
                            . "'" . $line_service['STRUCTURE'] . "', 1, "
                            . "'" . addslashes($this->input->post('TBGL_DUREE')) . "', "
                            . " '" . addslashes($this->input->post('TBGL_STRCT_DEST')) . "',"
                            . " '" . $this->codeDG() . "')";

                    return $this->xcudSQL('sf', $sql_create);
                } else {
                    return 3;
                }
        }
    }

    // SUPPRESSION DETACHEMENT
    public function del_ps_dtch() {
        $exists_1 = "Select MATRICULE "
                . "From tmp_detachement "
                . "Where ID = '" . $this->input->get_post('detach') . "' "
                . "And TBGL_TYPE = 1 "
                . "And MATRICULE = '" . $this->session->userdata('matricule') . "' "
                . "And ETAT_USERCHEF = 1 limit 0,1 ";

        $nb = $this->getSQL('sf', $exists_1, 'row');

        if ($nb > 0) {
            return 4;
        } else {
            $del_detach = "Update tmp_detachement "
                    . "Set TBGL_ETAT = 0 "
                    . "Where ID = '" . $this->input->get_post('detach') . "' "
                    . "And TBGL_TYPE = 1 ";

            return $this->xcudSQL('sf', $del_detach);
        }
    }

    // ############# FIN DETACHEMENT ##############################################
    // ############# DISPONIBILITE ################################################
    // structure d'accueil
    public function accueil_med() {
        $sql = "Select Distinct code, libelle "
                . "From structure "
                . "Inner Join tbno_notation"
                . " On structure.code = tbno_notation.STRUCTURE "
                . "Where MATRICULE = '" . $this->session->userdata('matricule') . "'  "
                . "Order By libelle Asc";

        return $this->getSQL('sf', $sql, 'tab');
    }

    // structure de destination
    public function destination_med() {
        $sql = "Select Distinct code, libelle "
                . "From structure "
                . "Inner Join tbno_notation "
                . "On structure.code = tbno_notation.STRUCTURE "
                . "Order By libelle Asc";

        return $this->getSQL('sf', $sql, 'tab');
    }

    // VALIDATION disponibilites
    public function val_ps_med() {
        // gestion des cas de redeploiement
        $code = $this->get_cascade();

        if ($code['STRUCTURE'] == 'XX') {
            return 5;
        }

        // on recupere la nature de la demande
        $nature = $this->input->post('TBGL_NATS');

        switch ($nature) {
            case 'Demande':
                // on verifie si une demande existe deja
                $sql_exist = "Select MATRICULE "
                        . "From tmp_detachement "
                        . "Where TBGL_ACT "
                        . "Like '%Demande%' And TBGL_TYPE = 2 And MATRICULE = '" . $this->session->userdata('matricule') . "' "
                        . "And TBGL_ETAT = 1 limit 0,1 ";

                $exist = $this->xcudSQL('sf', $sql_exist);

                if ($exist > 0) {
                    // existe deja
                    return 2;
                } else {
                    // insertion
                    $sql_create = "Insert Into tmp_detachement "
                            . "(`DATE`, `MATRICULE`, `TBGL_MOTIF`,  `TBGL_EFFET`,  `TBGL_TYPE` , `TBGL_ACT`,"
                            . " `CODE_STR`, TBGL_ETAT, CODE_DG) "
                            . "VALUES (CURRENT_TIMESTAMP, '" . $this->session->userdata('matricule') . "',"
                            . "  '" . addslashes($this->input->post('TBGL_MOTIFS')) . "',"
                            . " '" . addslashes($this->input->post('TBGL_EFFETS')) . "', 2,"
                            . " '" . addslashes($this->input->post('TBGL_NATS')) . "',"
                            . " '" . addslashes($this->input->post('TBGL_STRCT')) . "',"
                            . " 1, '" . $this->codeDG() . "')";

                    return $this->xcudSQL('sf', $sql_create);
                }
                break;

            // Renouvellement
            case 'Renouvellement':
                $sql_exist = "Select MATRICULE "
                        . "From tmp_detachement "
                        . "Where TBGL_ACT "
                        . "Like '%Demande%' And TBGL_TYPE = 2 "
                        . "And MATRICULE = '" . $this->session->userdata('matricule') . "'"
                        . " And TBGL_ETAT = 1 And ETAT_DPCE = 1 And ETAT_CABINET = 1 limit 0,1 ";

                $exist = $this->xcudSQL('sf', $sql_exist);

                if ($exist > 0) {
                    $sql_create = "Insert Into tmp_detachement "
                            . "(`DATE`, `MATRICULE`, `TBGL_MOTIF`,"
                            . "  `TBGL_EFFET`,  `TBGL_TYPE` , `TBGL_ACT`,"
                            . " `CODE_STR`, TBGL_ETAT, CODE_DG )"
                            . " VALUES (CURRENT_TIMESTAMP, "
                            . "'" . $this->session->userdata('matricule') . "',"
                            . "  '" . addslashes($this->input->post('TBGL_MOTIFS')) . "',"
                            . " '" . addslashes($this->input->post('TBGL_EFFETS')) . "', 2,"
                            . " '" . addslashes($this->input->post('TBGL_NATS')) . "', "
                            . "'" . addslashes($this->input->post('TBGL_STRCT')) . "', 1, "
                            . " '" . $this->codeDG() . "')";

                    return $this->xcudSQL('sf', $sql_create);
                } else {
                    return 3;
                }
                break;

            // RETOUR
            default:
                $sql_exist = "Select MATRICULE"
                        . "From tmp_detachement "
                        . "Where  TBGL_ACT Like '%Retour%' "
                        . "And TBGL_TYPE = 2 "
                        . "And MATRICULE = '" . $this->session->userdata('matricule') . "' "
                        . "/*And TBGL_ETAT = 1 "
                        . "And ETAT_DPCE = 1 "
                        . "And ETAT_CABINET = 1*/ "
                        . "limit 0,1 ";

                $exist = $this->xcudSQL('sf', $sql_exist);

                if ($exist > 0) {
                    $sql_create = "Insert Into tmp_detachement "
                            . "(`DATE`, `MATRICULE`, `TBGL_MOTIF`,  `TBGL_EFFET`,"
                            . "  `TBGL_TYPE` , `TBGL_ACT`, `CODE_STR`, TBGL_ETAT, "
                            . "STRUCT_DEST, ETAT_USERCHEF, ETAT_DRH, ETAT_DPCE, CODE_DG)"
                            . " VALUES (CURRENT_TIMESTAMP, "
                            . "'" . $this->session->userdata('matricule') . "',  "
                            . "'" . addslashes($this->input->post('TBGL_MOTIFS')) . "',"
                            . " '" . addslashes($this->input->post('TBGL_EFFETS')) . "', 2,"
                            . " '" . addslashes($this->input->post('TBGL_NATS')) . "',"
                            . " '" . addslashes($this->input->post('TBGL_STRCT')) . "', 1,"
                            . " '" . addslashes($this->input->post('STRCT_DEST')) . "', 1"
                            . ", 1 ,0, '" . $this->codeDG() . "')";

                    return $this->xcudSQL('sf', $sql_create);
                } else {
                    return 3;
                }
        }
    }

    // SUPPRESSION
    public function del_ps_med() {
        $exists_1 = "Select MATRICULE "
                . "From tmp_detachement "
                . "Where ID = '" . $this->input->get_post('dispon') . "' "
                . "And TBGL_TYPE = 2 "
                . "And MATRICULE = '" . $this->session->userdata('matricule') . "' "
                . "And ETAT_USERCHEF = 1 limit 0,1 ";

        $nb = $this->getSQL('sf', $exists_1, 'row');

        if ($nb > 0) {
            return 4;
        } else {
            $del_detach = "Update tmp_detachement "
                    . "Set TBGL_ETAT = 0 "
                    . "Where ID = '" . $this->input->get_post('dispon') . "' "
                    . "And TBGL_TYPE = 2 ";

            return $this->xcudSQL('sf', $del_detach);
        }
    }

    // Suivi des disponibilites
    public function suivi_med() {
        $suivi = "Select tmp_detachement.ID, tmp_detachement.MATRICULE, TBGL_ACT, NOM_PRENOMS,
                structure.libelle As STR, tmp_motif_disponibilite.LIBELLE As Motif,
                Case When tmp_detachement.ETAT_USERCHEF = 0 Then 'EN ATTENTE'
                Else (Case When tmp_detachement.ETAT_USERCHEF = 1 Then 'VALIDE'
                Else 'REJETE' End)End As ETAT_CHEF, Case When tmp_detachement.ETAT_DRH = 0
                Then 'EN ATTENTE' Else (Case When tmp_detachement.ETAT_DRH = 1 Then 'VALIDE'
                Else 'REJETE' End)End As ETATS_DRH, Case When tmp_detachement.ETAT_DPCE = 0
                Then 'EN ATTENTE' Else (Case When tmp_detachement.ETAT_DPCE = 1 Then 'VALIDE'
                Else 'REJETE' End)End As ETAT_DPCE, Case When tmp_detachement.ETAT_CABINET = 0
                Then 'EN ATTENTE' Else (Case When tmp_detachement.ETAT_CABINET = 1 Then 'VALIDE'
                Else 'REJETE' End)End As ETAT_CABINET
                From tmp_detachement Inner Join tbno_notation
                On tmp_detachement.MATRICULE = tbno_notation.MATRICULE
		Inner Join structure On tmp_detachement.CODE_STR = structure.code
                Left Join tmp_motif_disponibilite on tmp_motif_disponibilite.ID = tmp_detachement.TBGL_MOTIF
                Where TBGL_ETAT = 1 And tmp_detachement.MATRICULE = '" . $this->session->userdata('matricule') . "'
                And TBGL_TYPE = 2 Order By tmp_detachement.ID Desc ";

        return $this->getSQL('sf', $suivi, '');
    }

    // ############# FIN DISPONIBILITE ################################################
    // ############# MISE A DISPOSITION ################################################
    // possibilité d'effectuer une mise a disposition
    public function enable_mad() {
        $code = $this->get_cascade();

        if ($code['STRUCTURE'] == 'XX') {
            return 5;
        }
    }

    // SUPPRESSION
    public function del_ps_mad() {
        $exists_1 = "UPDATE tmp_disposition"
                . " SET ETAT_AGT=1, POSITION=2, ETAT_AGT_DATE='" . date('d/m/Y : H:i') . "'"
                . " where ID='" . $this->input->get_post('dispo') . "' "
                . "AND MATRICULE='" . $this->session->userdata('matricule') . "' ";

        $nb = $this->xcudSQL('sf', $exists_1);

//            $verif_del_mad = "SELECT * "
//                    . "FROM tmp_disposition "
//                    . "where ID='".$this->input->get_post('dispo')."' "
//                    . "and  POSITION=2 and "
//                    . "ETAT_AGT=1";
//
//            $nb = $this->getSQL('sf', $verif_del_mad, 'row');

        if ($nb == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    // structure d'affectation
    public function str_affect() {
        $code = $this->get_cascade();

        if ($this->input->get_post('id_dispo2') || $this->input->get_post('modifier') == 'modifier') {
            $reket_1 = "SELECT DISTINCT b.code, b.libelle FROM tbno_notation a INNER JOIN structure b ON b.code=a.STRUCTURE
                        LEFT JOIN structure_restreinte c on b.code = c.CODE_SR
                        WHERE (c.TYPE_SR in ('1') OR  c.TYPE_SR is null OR c.TYPE_SR ='')
                        AND d.code = '" . $this->session->userdata('STRUCT_DEST') . "'
                        ORDER BY b.libelle";
        } else {
            if (!empty($code['STRUCTURE'])) {
                $reket_1 = "Select Distinct b.code, b.libelle
                        From tbno_notation a Inner Join structure b ON b.code=a.STRUCTURE
                        Left Join structure_restreinte c on b.code = c.CODE_SR
                        Where(c.TYPE_SR in ('1') OR  c.TYPE_SR is null OR c.TYPE_SR ='')
                        And b.code <>'" . addslashes($code['STRUCTURE']) . "'
                        Order By b.libelle";
            } else {
                $reket_1 = "SELECT DISTINCT b.code, b.libelle FROM tbno_notation a INNER JOIN structure b ON b.code=a.STRUCTURE
                        LEFT JOIN structure_restreinte c on b.code = c.CODE_SR
                        WHERE (c.TYPE_SR in ('1') OR  c.TYPE_SR is null OR c.TYPE_SR ='')
                        AND b.libelle <>'" . addslashes($this->session->userdata('structure')) . "'
                        ORDER BY b.libelle";
            }
        }

        return $this->getSQL('sf', $reket_1, '');
    }

    // VALIDATION MISE A DISPOSITION
    public function val_ps_mad() {
        // demande existante
        $req_verif = "SELECT * "
                . "from tmp_disposition "
                . "where MATRICULE='" . $this->session->userdata('matricule') . "' "
                . "AND POSITION=1 "
                . "and ETAT_AGT=0";

        $exist = $this->getSQL('sf', $req_verif, '');

        if ($exist <> 0) {
            return 2;
        } else {
            $code = $this->get_cascade();

            $req_insert = "INSERT INTO `tmp_disposition` "
                    . "( `MATRICULE`, `DATE`, `STRUCT_AGT`, `CODE_CAB_AGT`, `CODE_DG_AGT`,"
                    . " `ETAT_AGT_DATE`, `STRUCT_DEST`,`CODE_CAB_AGT_DEST`, "
                    . "`CODE_DG_AGT_DEST`, MOTIF, `CODE_DC_AGT_DEST`, `CODE_SD_AGT_DEST`,"
                    . " `CODE_SC_AGT_DEST`, `CONTACT_AGT` ) "
                    . "VALUES ( '" . $this->session->userdata('matricule') . "', CURRENT_TIMESTAMP,  "
                    . "'" . $code['STRUCTURE'] . "', "
                    . "'" . $code['CODE_CAB'] . "',"
                    . " '" . $code['CODE_DG'] . "',"
                    . "'" . date('d/m/Y h:i') . "',"
                    . " '" . addslashes($this->input->post('N1')) . "',"
                    . " '" . addslashes($this->input->post('CB')) . "',"
                    . " '" . addslashes($this->input->post('N22')) . "',"
                    . " '" . addslashes($this->input->post('MOTIF')) . "',"
                    . " '" . addslashes($this->input->post('N33')) . "',"
                    . " '" . addslashes($this->input->post('N44')) . "',"
                    . " '" . addslashes($this->input->post('N55')) . "',"
                    . " '" . addslashes($this->input->post('contact')) . "')";

            $insert = $this->xcudSQL('sf', $req_insert);

            if ($insert) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    // MODIFICATION
    public function upd_ps_mad() {
        // verifie si une demande est en cours
        $req_verif = "SELECT `MATRICULE`, `STRUCT_AGT`, `CODE_CAB_AGT`,"
                . " `CODE_DG_AGT`, `CODE_DC_AGT`, `CODE_SD_AGT`, "
                . "`CODE_SC_AGT`, `STRUCT_DEST`, `CODE_CAB_AGT_DEST`,"
                . "`CODE_DG_AGT_DEST`, `CODE_DC_AGT_DEST`, "
                . "`CODE_SD_AGT_DEST`, `CODE_SC_AGT_DEST` "
                . "from tmp_disposition "
                . "where MATRICULE='" . $this->session->userdata('matricule') . "'"
                . " AND POSITION=1 "
                . "AND ETAT_AGT=0";

        $line_verif_service = $this->getSQL('sf', $req_verif, '');

        if ($line_verif_service == 0) {
            return 3;
        } else {
            $line_service = $this->get_cascade();

            $req_insert = "UPDATE `tmp_disposition` "
                    . "SET  ETAT_AGT_DATE_MOD='" . date('d/m/Y : H:i') . "',"
                    . " MATIF='" . addslashes($this->input->post('MOTIF')) . "'";

            if ($line_service['CODE_CAB'] <> $line_verif_service['CODE_CAB_AGT'])
                $req_insert .= ", `CODE_CAB_AGT`='" . $line_service['CODE_CAB'] . "' ";

            if ($line_service['CODE_DG'] <> $line_verif_service['CODE_DG_AGT'])
                $req_insert .= ", `CODE_DG_AGT`='" . $line_service['CODE_DG'] . "' ";

            if ($line_service['CODE_DC'] <> $line_verif_service['CODE_DC_AGT'])
                $req_insert .= ", `CODE_DC_AGT`='" . $line_service['CODE_DC'] . "' ";

            if ($line_service['CODE_SD'] <> $line_verif_service['CODE_SD_AGT'])
                $req_insert .= ", `CODE_SD_AGT`='" . $line_service['CODE_SD'] . "' ";

            if ($line_service['CODE_SC'] <> $line_verif_service['CODE_SC_AGT'])
                $req_insert .= ", `CODE_SC_AGT`='" . $line_service['CODE_SC'] . "' ";

            if ($_POST['CB'] <> $line_verif_service['CODE_CAB_AGT_DEST'])
                $req_insert .= ", `CODE_CAB_AGT_DEST`='" . addslashes($this->input->post('CB')) . "' ";

            if ($_POST['N22'] <> $line_verif_service['CODE_DG_AGT_DEST'])
                $req_insert .= ", `CODE_DG_AGT_DEST`='" . addslashes($this->input->post('N22')) . "' ";

            if ($_POST['N33'] <> $line_verif_service['CODE_DC_AGT_DEST'])
                $req_insert .= ", `CODE_DC_AGT_DEST`='" . addslashes($this->input->post('N33')) . "' ";

            if ($_POST['N44'] <> $line_verif_service['CODE_SD_AGT_DEST'])
                $req_insert .= ", `CODE_SD_AGT_DEST`='" . addslashes($this->input->post('N44')) . "' ";

            if ($_POST['N4'] <> $line_verif_service['CODE_SC_AGT_DEST'])
                $req_insert .= ", `CODE_SC_AGT_DEST`='" . addslashes($this->input->post('N4')) . "' ";

            // suite de la requete
            $req_insert .= " WHERE MATRICULE='" . $this->session->userdata('matricule') . "' "
                    . "AND POSITION=1 AND ETAT_AGT=0 ";
        }

        $upd_mad = $this->xcudSQL('sf', $req_insert);

        if ($upd_mad) {
            return 1;
        } else {
            return 0;
        }
    }

    // verification ds la table tmp_disposition, si demanande en cours
    public function suivi_mad() {
        $query_dmd = "SELECT tmp_disposition.STRUCT_DEST, tmp_disposition.ID, `MATRICULE`, `CONTACT_AGT` , s1.libelle AS str_ori,  s2.libelle AS str_dest, PSERVICE_VALIDE,
            Case When (g4.LIB_CAB Is Not Null And g1.LIB_DG Is Null) Then g4.LIB_CAB  Else (Case When (g4.LIB_CAB Is Not Null And g1.LIB_DG Is Not Null) Then g1.LIB_DG End ) End As service_ori,
            Case When (g5.LIB_CAB Is Not Null And g2.LIB_DG Is Null) Then g5.LIB_CAB  Else (Case When (g5.LIB_CAB Is Not Null And g2.LIB_DG Is Not Null) Then g2.LIB_DG End ) End As service_dest,
               case when  ( ETAT_USERCHEF IS NULL and ETAT_DRH_DEST=1)  then 'EN ATTENTE' else ( case when ETAT_USERCHEF=2 then 'REFUSEE' else ( case when ETAT_USERCHEF=1 then 'ACCORDEE' else '?' end) end) end  as accord_cs,

                     case when ( ETAT_DRH IS NULL and ETAT_USERCHEF=1)  then 'EN ATTENTE' else (case when ETAT_DRH=2 then 'REFUSEE' else ( case when  ETAT_DRH=1 then 'ACCORDEE' else '?' end) end) end  as accord_drh,

                     case when ( ETAT_DPCE IS NULL and ETAT_DRH=1)  then 'EN ATTENTE' else (case when ETAT_DPCE=2 then 'REFUSEE' else ( case when  ETAT_DPCE=1 then 'ACCORDEE' else '?' end) end) end  as accord_mfpra,

                    case when ETAT_USERCHEF_DEST IS NULL then 'EN ATTENTE' else (case when ETAT_USERCHEF_DEST=2 then 'REFUSEE' else 'ACCORDEE' end) end  as accord_cs_dest,

                    case when ( ETAT_DRH_DEST IS NULL AND ETAT_USERCHEF_DEST=1)  then 'EN ATTENTE' else (case when ETAT_DRH_DEST=2 then 'REFUSEE' else ( case when  ETAT_DRH_DEST=1 then 'ACCORDEE' else '?' end) end) end  as accord_drh_dest,

                    case when  ETAT_USERCHEF_DEST IS NULL then 'MODIFIER' else '' end as modifier
                    from tmp_disposition
                    LEFT JOIN structure AS s1 ON s1.code = `STRUCT_AGT`
                    LEFT JOIN tbaf_cabinet AS g4 ON g4.CODE_CAB = `CODE_CAB_AGT`
                    LEFT JOIN tbaf_direction_gle AS g1 ON g1.CODE_DG = `CODE_DG_AGT`
                    LEFT JOIN structure AS s2 ON s2.code = `STRUCT_DEST`
                    LEFT JOIN tbaf_direction_gle AS g2 ON g2.CODE_DG = `CODE_DG_AGT_DEST`
                    LEFT JOIN tbaf_cabinet AS g5 ON g5.CODE_CAB = `CODE_CAB_AGT_DEST`
                    WHERE POSITION=1 AND MATRICULE='" . $this->session->userdata('matricule') . "' AND ETAT_AGT=0 /*AND PSERVICE_VALIDE<>1*/ ";

        return $this->getSQL('sf', $query_dmd, 'row');
    }

    // ############# FIN DISPOSITION ################################################
    // ############# DEMANDE D'ACTE  ################################################
    // nature d'acte
    public function nature_da($p='') {
		if($p==''){
			$nature = "SELECT * FROM type_acte where etat =1";
		}
		else{
			$nature = "SELECT * FROM type_acte where etat =1 and idtype='".$p."'";
		}

        return $this->getSQL('db', $nature, '');
    }
    // nature d'acte
    public function list_emploi() {
        $emploi = "SELECT * FROM emploi order by EMP_LIBELLE";
        return $this->getSQL('db', $emploi, '');
    }


//        // derouler_conc
//        public function derouler_conc() {
//            $query_dc="Select Distinct c.`PA_TYPECONC_CODE`, c.`PA_TYPECONC_LIB`
//                From bd_concours_ns.`tbpa_typeconc` c Inner Join $this->bd_site.tbce_rconcemp On
//                c.PA_TYPECONC_CODE = tbce_rconcemp.PA_TYPECONC_CODE
//		Where c.`PA_TYPECONC_CODE` in ('TC006', 'TC010', 'TC001') And tbce_rconcemp.GL_EXCECODE = 'EX15' ";
//
//            return $this->getSQL('cc', $query_dc, '');
//        }
//        public function derouler_conc2() {
//            $query_dc2="Select Distinct c.`PA_TYPECONC_CODE`, c.`PA_TYPECONC_LIB`
//                From bd_concours_ns.`tbpa_typeconc` c Inner Join $this->bd_site.tbce_rconcemp
//                On c.PA_TYPECONC_CODE = tbce_rconcemp.PA_TYPECONC_CODE
//                Where c.`PA_TYPECONC_CODE` in ('TC006',  'TC010', 'TC001')
//                And tbce_rconcemp.GL_EXCECODE = 'EX15' ";
//
//            return $this->getSQL('cc', $query_dc2, '');
//        }
    // EXTRACTION DEMANDE ACTE
    public function extract_data() {
        $query = "SELECT `DATE_RDV`,COUNT(*) FROM `tbat_demande_acte` GROUP BY `DATE_RDV` HAVING COUNT(*)>1000";
        return $this->getSQL('db', $query, '');
    }

    // traitement des demandes d'actes
    public function dmd_acte() {
        //echo $this->session->userdata('matricule');
        $acte = htmlentities($this->input->post('id_acte'));
        $motif = htmlentities($this->input->post('motif'));

        $date = date("d/m/Y");
        $nbcopie = addslashes($this->input->post('nbcopie'));

        if (!$nbcopie) {
            $nbcopie = 1;
        }

        if ($acte == 'A0041') {//non sanction disciplinaire
            //non sanction disciplinaire
            $typeconc = 'TC006';
            $concours = 'C0866';

            $nbre_conc = 1;
            $daterdv = '';
        } else {
            $id_bque = $agence = $nom_prenom = $contact = $email = 'NULL';
            $daterdv = addslashes($this->input->post('daterdv'));
        }

        // CONTROLE INSCRIPTION
        $control = "SELECT * FROM `tbat_demande_acte` INNER JOIN  `tbat_acte_tarife`"
                . " ON `tbat_demande_acte`.`ID_ACTE`=`tbat_acte_tarife`.`NATURE_CODE` "
                . "AND `MATAGENT`='" . $this->session->userdata('matricule') . "' AND ID_ACTE='" . $acte . "' ";

        $total = $this->getSQL('db', $control, 'row');
        //echo $total;
        if (empty($total)) {
            if ($acte != 'A0041') {   // tout sauf non sanction
                $rek_acte = "INSERT INTO `tbat_demande_acte` (`ID`, `ID_ACTE`, `MATAGENT`, "
                        . "`MOTIF`, `NUM_RECU`, `DATE_DEMANDE`, `DATE_RDV`,`DATE_PAIE`, "
                        . "`ETAT`,`COPIE`, TYPECONC, CONCOURS, BANQUE, AGENCE, GESTIONNAIRE,"
                        . " CONTACT_GEST, EMAIL_GEST) VALUES ('', '" . $acte . "', '" . strtoupper($this->session->userdata('matricule')) . "',"
                        . "'" . addslashes($motif) . "', NULL, '" . $date . "', '" . $daterdv . "',NULL, "
                        . "NULL,'" . $nbcopie . "', '', '', '" . $id_bque . "', '" . $agence . "', "
                        . "'" . $nom_prenom . "', '" . $contact . "', '" . $email . "')";

                $this->xcudSQL('db', $rek_acte);

                // Générer numero de reçu
                $id_recu = $this->db->insert_id();
                $num_recu = $this->codification($id_recu);

                if ($id_recu != 0) {
                    $rec = "UPDATE `tbat_demande_acte` SET `NUM_RECU` = '" . $num_recu . "' WHERE `ID` ='" . $id_recu . "' ";
                    $this->xcudSQL('db', $rec);

                    return $num_recu;
                } else {
                    return 1;
                }
            } else { //non sanction
                $rek_acte_ns = "INSERT INTO `tbat_demande_acte` "
                        . "(`ID`, `ID_ACTE`, `MATAGENT`, `MOTIF`, `NUM_RECU`, "
                        . "`DATE_DEMANDE`, `DATE_RDV`,`DATE_PAIE`, `ETAT`,`COPIE`,"
                        . " TYPECONC, CONCOURS, BANQUE, AGENCE, GESTIONNAIRE, CONTACT_GEST,"
                        . " EMAIL_GEST) VALUES ('', '" . $acte . "', '" . strtoupper($this->session->userdata('matricule')) . "',"
                        . "'" . addslashes($motif) . "', NULL, '" . $date . "', '" . $daterdv . "',"
                        . "NULL, NULL,'" . $nbre_conc . "', '" . $typeconc . "', '" . $concours . "', '', '', '', '', '')";

                $ex_acte = $this->xcudSQL('db', $rek_acte_ns);

                // Générer numero de reçu
                $id_recu = $this->db->insert_id();
                $num_recu = $this->codification($id_recu);

                if ($id_recu != 0) {
                    $rec = "UPDATE `tbat_demande_acte` SET `NUM_RECU` = '" . $num_recu . "' WHERE"
                            . " `MATAGENT` ='" . $this->session->userdata('matricule') . "' And `DATE_DEMANDE` = '" . $date . "' "
                            . "And (NUM_RECU Is Null Or NUM_RECU = '') ";

                    $ex_rec = $this->xcudSQL('db', $rec);

                    return $num_recu;
                } else {
                    return 1;
                }
            }
        } else {
            //echo 'ns';
            if (empty($total['DATE_PAIE'])) {
                //echo 'pp';
                return 2;
            } else {
                //echo 'hh';
                //VERIFIONS QUE LE QUOTA DE LA DATE CHOISIT EST ATTEINTE
                /* $date_rdv="SELECT * FROM `tbat_demande_acte` WHERE DATE_RDV='".$daterdv."' AND ID_ACTE='".$acte."'";
                  $exe_rdv=$this->getSQL('db',$date_rdv,'');

                  $quota=$exe_rdv->num_rows();

                  if($quota > 1000){
                  return 3;
                  }
                  else{ */
                $rek_acte = "INSERT INTO `tbat_demande_acte` (`ID`, `ID_ACTE`, `MATAGENT`,"
                        . " `MOTIF`, `NUM_RECU`, `DATE_DEMANDE`, `DATE_RDV`,`DATE_PAIE`, "
                        . "`ETAT`,`COPIE`, TYPECONC, CONCOURS, BANQUE, AGENCE, GESTIONNAIRE, "
                        . "CONTACT_GEST, EMAIL_GEST) VALUES ('', '" . $acte . "', "
                        . "'" . strtoupper($this->session->userdata('matricule')) . "','" . addslashes($motif) . "',"
                        . " NULL, '" . $date . "', '" . $daterdv . "',NULL, NULL,'" . $nbcopie . "',"
                        . " '" . $typeconc . "', '" . $concours . "', '" . $id_bque . "', '" . $agence . "',"
                        . " '" . $nom_prenom . "', '" . $contact . "', '" . $email . "')";

                $ex_acte = $this->xcudSQL('db', $rek_acte);

                // Générer numero de reçu
                $id_recu = $this->db->insert_id();
                $num_recu = $this->codification($id_recu);

                if ($id_recu != 0) {
                    $rec = "UPDATE `tbat_demande_acte` SET `NUM_RECU` = '" . $num_recu . "' WHERE `ID` ='" . $id_recu . "'";
                    $ex_rec = $this->xcudSQL('db', $rec);

                    return $num_recu;
                } else {
                    return 1;
                }
                // }//
            }
        }
    }

    public function recu_demande_acte($param) {
        $demande = "Select tbat_demande_acte.ID as ID_NUM,tbat_demande_acte.*, tbat_acte_tarife.*, banques.LIBELLE As Bank,
                agences.LIBELLE As Agence /*, T.PA_TYPECONC_LIB, T.PA_CONC_LIB */
             From `tbat_acte_tarife` Inner Join `tbat_demande_acte` ON `tbat_acte_tarife`.`NATURE_CODE`
             = `tbat_demande_acte`.`ID_ACTE`
			    Left Join banques On tbat_demande_acte.BANQUE = banques.CODE
				Left Join agences On tbat_demande_acte.AGENCE = agences.CODE_AGENCE
			   /* Left Join (Select DISTINCT tbpa_conc_2015.`PA_TYPECONC_CODE`,
                           tbpa_conc_2015.PA_CONC_NUM, tbpa_conc_2015.PA_CONC_LIB
	 From $this->bd_site.`tbce_rconcemp` Inner Join bd_concours_ns.tbpa_conc_2015 On
         tbce_rconcemp.PA_TYPECONC_CODE = tbpa_conc_2015.PA_TYPECONC_CODE
	   Where tbce_rconcemp.`PA_TYPECONC_CODE` in ('TC006', 'TC010')
						   )As T On `tbat_demande_acte`.`TYPECONC` =
                                                   T.PA_TYPECONC_CODE And `tbat_demande_acte`.`CONCOURS` = T.PA_CONC_NUM*/
			   Where NUM_RECU='" . addslashes($param) . "'  ";

        return $this->getSQL('db', $demande, 'row');
    }

    //Fonction retournant le nombre de RDV à une date
    function compte_rdv($daterdv) {
        $sql = "SELECT * FROM `tbat_demande_rdv` WHERE DATE_RDV='" . $daterdv . "'";
        $query = $this->db->query($sql);
        $nb = $query->num_rows();
        return $nb;
    }

    //FONCTION DE CODIFICATION
    public function codification($numrec) {
        $query = "SELECT  `CE_AGT_STRUCT` FROM `$this->bd_sigfae`.`tbce_agt`"
                . " WHERE `CE_AGT_MAT` = '" . $this->session->userdata('matricule') . "'";

        $tab_code = $this->getSQL('sf', $query, 'row');
        $str1 = $tab_code['CE_AGT_STRUCT'];

        $nbrchar = strlen($numrec);
        $an = date('y');
        $str = substr($str1, 1);

        if ($nbrchar == 1) {
            $val = '000000' . $numrec . '/' . $an . $str;
        } elseif ($nbrchar == 2) {
            $val = '00000' . $numrec . '/' . $an . $str;
        } elseif ($nbrchar == 3) {
            $val = '0000' . $numrec . '/' . $an . $str;
        } elseif ($nbrchar == 4) {
            $val = '000' . $numrec . '/' . $an . $str;
        } elseif ($nbrchar == 5) {
            $val = '00' . $numrec . '/' . $an . $str;
        } elseif ($nbrchar == 6) {
            $val = '0' . $numrec . '/' . $an . $str;
        } else {
            $val = $numrec . '/' . $an . $str;
        }

        return $val;
    }

    public function liste_demande_acte() {
        $liste = "SELECT * FROM `tbat_demande_acte` INNER JOIN `tbat_acte_tarife` "
                . "ON `tbat_acte_tarife`.`NATURE_CODE` = `tbat_demande_acte`.`ID_ACTE`"
                . "  WHERE MATAGENT ='" . $this->session->userdata('matricule') . "'";

        return $this->getSQL('db', $liste, '');
    }

    public function del_dmd_acte() {
        $del = "Delete from  tbat_demande_acte Where NUM_RECU ='" . $this->input->get_post('id') . "' "
                . "and MATAGENT='" . $this->input->get_post('mat') . "' ";

        $ex_rec = $this->xcudSQL('db', $del);

        if ($ex_rec == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function print_recu_1() {
        $sql_3 = "SELECT MATAGENT, NUM_RECU, DATE_DEMANDE, DATE_RDV, TYPE_ACTE, MONTANT, DATE_PAIE, DATE_RDV_RETRAIT,
            concat_ws(' ', NOM, PRENOMS) as NOM_PRENOMS, NOMJFILLE, NATURE_CODE , COPIE, Left(NUM_RECU, 7)As identifiant,
            tbat_demande_acte.`ID_ACTE`, banques.LIBELLE As Bank, agences.LIBELLE As Agence /*,
            T.PA_TYPECONC_LIB, T.PA_CONC_LIB*/,
            tbat_demande_acte.`GESTIONNAIRE`, tbat_demande_acte.`EMAIL_GEST`,tbat_demande_acte.`CONTACT_GEST`
            FROM `tbat_demande_acte`
            INNER JOIN  tbat_acte_tarife ON tbat_demande_acte.`ID_ACTE`=tbat_acte_tarife.NATURE_CODE
            INNER JOIN $this->bd_site.situation_agent_maj s ON tbat_demande_acte.MATAGENT = s.MATRICULE
            Left Join banques On tbat_demande_acte.BANQUE = banques.CODE
            Left Join agences On tbat_demande_acte.AGENCE = agences.CODE_AGENCE
            /*Left Join (Select tbpa_typeconc.`PA_TYPECONC_CODE`, tbpa_typeconc.`PA_TYPECONC_LIB`,
            tbpa_conc.PA_CONC_NUM, tbpa_conc.PA_CONC_LIB
                                     From bd_concours_ns.`tbpa_typeconc` Inner Join bd_concours_ns.tbpa_conc On
                                     tbpa_typeconc.PA_TYPECONC_CODE = tbpa_conc.PA_TYPECONC_CODE
                                       Where tbpa_typeconc.`PA_TYPECONC_CODE` in ('TC006', 'TC010')
                               )As T On `tbat_demande_acte`.`TYPECONC` = T.PA_TYPECONC_CODE And `tbat_demande_acte`.`
                               CONCOURS` = T.PA_CONC_NUM*/
            WHERE `NUM_RECU`='" . addslashes($this->input->post('numrecu')) . "'";

        return $this->getSQL('db', $sql_3, 'row');
    }

    public function print_recu_2() {
        $demande1 = "Select Case When TYPECONC = 'TC006' Then 'CONCOURS PROFESSIONNEL' Else
                'CONCOURS PROFESSIONNELS EXCEPTIONNELS' End As PA_TYPECONC_LIB, T.PA_CONC_LIB
            From tbat_demande_acte
              Inner Join (Select tbpa_conc.PA_TYPECONC_CODE, tbpa_conc.PA_CONC_NUM, tbpa_conc.PA_CONC_LIB
                                             From bd_concours_ns.tbpa_conc
                                    )As T On `tbat_demande_acte`.`TYPECONC` = T.PA_TYPECONC_CODE And
                                    `tbat_demande_acte`.`CONCOURS` = T.PA_CONC_NUM
           Where NUM_RECU='" . addslashes($this->input->post('numrecu')) . "'";

        $this->getSQL('db', $demande1, 'row');

        return $this->db->count_all_results();
    }

    function opsystem($platform) {
        $sql = 'SELECT id_operating_system FROM operating_system WHERE name = "' . $platform . '" ';
        $query = $this->db->query($sql);
        $row = $query->row(0);
        if (isset($row)) {
            $dataOs = $row->id_operating_system;
        }
        if ($query->num_rows() == 0) {
            $sql = 'INSERT INTO operating_system (name, dates) VALUES ("' . $platform . '", now())';
            $query = $this->db->query($sql);
            $dataOs = $this->db->insert_id();
        }
        return $dataOs;
    }

    function browser($browser, $version) {
        $sql = 'SELECT id_web_browser FROM web_browser WHERE name = "' . $browser . '" and versions = "' . $version . '"';
        $query = $this->db->query($sql);
        $row = $query->row(0);
        if (isset($row)) {
            $dataWeb = $row->id_web_browser;
        }
        if ($query->num_rows() == 0) {
            $sql = 'INSERT INTO web_browser (name,versions, dates) VALUES ("' . $browser . '","' . $version . '", now())';
            $query = $this->db->query($sql);
            $dataWeb = $this->db->insert_id();
        }
        return $dataWeb;
    }

    function ident_querry($data) {
        $sql = 'select distinct guest.id_guest from guest inner join connections on guest.id_guest = connections.id_guest where id_operating_system = ? and id_web_browser = ? and screen_resolution_x = ? and screen_resolution_y = ? and INET_ATON(ip_address) = INET_ATON(?) and accept_language = ? and date_add >= "' . date('Y-m-d') . '" and idrand = ? ';

        $query = $this->db->query($sql, $data);
        //$this->db->get_compiled_select('', FALSE);
        $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->row(0);
        } else {
            return 0;
        }
    }

    function addquerry($table, $data) {

        $this->db->insert($table, $data);
        $dataGuest = $this->db->insert_id();
        return $dataGuest;
    }

    function identity_guest($data) {
        $idg = array('id_guest' => $data);
        $sql = 'SELECT * from guest inner join connections on guest.id_guest = connections.id_guest where connections.id_guest = ? and connections.date_add = now()';
        $resul = $this->db->query($sql, $idg);
        if ($resul->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    //compteur de visite
//        public function date_jour_compteur() {
//            $sql_date = "SELECT date_add FROM connections";
//            $res_date = $this->getSQL('db', $sql_date, '');
//
//            return $res_date;
//        }
    //compteur de visite
    public function compteur() {
        $sql = "SELECT * FROM connections WHERE date_add='" . date('Y-m-d') . "'";
        $query = $this->db->query($sql);

        return $query->num_rows();
    }

    // notification
    function notification($matricule) {
        $sql = "SELECT * FROM notation_2013_fin WHERE agentmatricule = '" . $matricule . "'";

        $query = $this->sf->query($sql);
        return $query->num_rows();
    }

    // notification 2014
    function notification2014($matricule, $annee = NULL) {
        $sql = "SELECT * FROM notation$annee WHERE agentmatricule = '" . $matricule . "' and total>0";

        $query = $this->sf->query($sql);
        return $query->num_rows();
    }

    // certficiation 2014
    function certification2014($matricule) {
        $sql = "SELECT * FROM notation WHERE agentmatricule = '" . $matricule . "' and total=0";

        $query = $this->sf->query($sql);
        return $query->num_rows();
    }

    // presence au poste
    function presenceposte2016($matricule) {
        $sql = "SELECT * FROM presence_poste2016 WHERE agentmatricule = '" . $matricule . "' and total=0";

        $query = $this->sf->query($sql);
        return $query->num_rows();
    }

    //
    function trt_ansult_messagerie() {

    }

    function do_reclamation() {
        $files = $path = '';
        $nb_file = $this->input->post('nb_fichier');

        $from = $this->input->post('email') . ', ' . $this->input->post('mat') . ' '
                . '' . $this->input->post('nom') . ' ' . $this->input->post('tel');

        // traitement des fichiers joints
        if ($nb_file != '') {
            $config['upload_path'] = 'assets/docs/reclamations/';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|png|PNG|doc|docx|pdf';

            // chargement de la librairie
            $this->load->library('Multi_upload', $config);

            for ($i = 0; $i < $nb_file; $i++) {
                $this->multi_upload->initialize($config);

                if (!$this->multi_upload->do_upload('userfile', $i)) {
                    return 2;
                } else {
                    $files = $this->multi_upload->data();
                    $this->email->attach(base_url('assets/docs/reclamations/' . $files['file_name']));
                }
            }
        }

        $to_sub = explode('-', $this->input->post('objet'));
        $dest = stripos($to_sub[0], '|');

        if ($dest === false) {
            $this->email->to($to_sub[0]);

            $this->email->from($from);
            $this->email->subject($to_sub[1]);
            $this->email->message($this->input->post('msg'));
            $mes = $this->email->send();
        } else {
            $full_dest = explode('|', $to_sub[0]);

            foreach ($full_dest as $dest => $dst) {
                $this->email->clear();

                $this->email->to($dst);
                $this->email->from($from);
                $this->email->subject($to_sub[1]);
                $this->email->message($this->input->post('msg'));
                $mes = $this->email->send();
            }
        }

        if ($mes == TRUE) {
            if ($nb_file != '')
                unlink($_SERVER['DOCUMENT_ROOT'] . '/mfp/assets/docs/reclamations/' . $files['file_name']);

            return 1;
        }
        else {
            return 0;
        }
    }

//        function compte_rdv($daterdv){
//            //Fonction retournant le nombre de RDV à une date
//            $control="SELECT * FROM `tbat_demande_rdv` WHERE DATE_RDV='".$daterdv."'";
//            $ex_control=  $this->db->query($control);
//            $nb = $ex_control->num_rows();
//
//            return $nb;
//        }

    function do_rendezvous($daterdv) {
        $id_acte = $this->input->post('objet');
        $motif = $this->input->post('motif');
        $date = date("d/m/Y");

        //Gestion des quota
        $control = "SELECT * FROM `tbat_demande_rdv` WHERE DATE_RDV='" . $daterdv . "'";
        $ex_control = $this->db->query($control);
        $rdv_lst = $ex_control->num_rows();

        if ($rdv_lst < QUOTA) {
            // CONTROLE INSCRIPTION
            $control1 = "SELECT * FROM `tbat_demande_rdv` INNER JOIN  `objet` ON "
                    . "`tbat_demande_rdv`.`ID_ACTE`=`objet`.`idobjet` WHERE "
                    . "`MATAGENT`='" . $this->session->userdata('matricule') . "'"
                    . " AND ID_ACTE='" . $id_acte . "' AND DATE_RDV='" . $daterdv . "'";

            $ex_control1 = $this->db->query($control1);
            $nbr_en = $ex_control1->num_rows();

            if ($nbr_en == 0) { //Pas de RDV pris pour ce motif à cette date
                $rek_acte = "INSERT INTO `tbat_demande_rdv` "
                        . "(`ID`, `ID_ACTE`, `MATAGENT`, `MOTIF`, `NUM_RECU`, `DATE_DEMANDE`, `DATE_RDV`,`ETAT`)"
                        . " VALUES ('', '" . $id_acte . "', '" . $this->session->userdata('matricule') . "',"
                        . "'" . $motif . "', NULL, '" . $date . "', '" . $daterdv . "', NULL)";

                $this->db->query($rek_acte);

                // Générer numero de reçu
                $id_recu = $this->db->insert_id();
                $num_recu = $this->codification($id_recu);

                if ($id_recu) {
                    $rec = "UPDATE `tbat_demande_rdv` SET `NUM_RECU` = '" . $num_recu . "' WHERE `ID` ='" . $id_recu . "' ";
                    $this->db->query($rec);

                    return $num_recu;
                } else {
                    return 0;
                }
            } else {
                return 2;
            }
        } else {
            return 3;
        }
    }

    function create_recu_rdv($num_recu) {
        $demande = "SELECT tbat_demande_rdv.*, objet.* FROM `tbat_demande_rdv` INNER JOIN  "
                . "`objet` ON `tbat_demande_rdv`.`ID_ACTE`=`objet`.`idobjet` "
                . "Where NUM_RECU='" . $num_recu . "'  ";

        $res = $this->getSQL('db', $demande, 'row');

//            $ex_demande=$this->db->query($demande);
//            $tab_demande=$ex_demande->row_array();
//            $numrows=$ex_demande->num_rows();

        return $res;
    }

}

?>