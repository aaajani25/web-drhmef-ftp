<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siteback_mod extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('password');
        //$this->load->database();
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

    public function fields_escaper($fieldsToEscapeArray, $arrayData) {

        $fieldsToEscape = $fieldsToEscapeArray;
        foreach ($fieldsToEscape as $field) {
            if (isset($arrayData[$field])) {
                $arrayData[$field] = html_escape($arrayData[$field]);
            }
        }
    }

    // insertion simple
    public function insert_simple($table, $data) {
        if ($table == '_reponse') {
            $t = 0;

            if ($this->input->post('group') == 'autre') {
                $group = $this->input->post('group2');
            } else {
                $group = $this->input->post('group');
            }

            foreach ($this->input->post('choix') as $rep) {
                $data = array(
                    'groupe' => $group,
                    'reponse' => $rep
                );
                $this->fields_escaper(['groupe', 'reponse'],$data);
                $this->db->insert($table, $data);
                $t += $this->db->affected_rows();
            }
        } else {
            $this->db->insert($table, $data);
            $t = $this->db->affected_rows();
        }

        if ($t > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    // upd simple
    public function update($cond, $table, $data) {
        $this->db->where($cond);
        $this->db->update($table, $data);

        $t = $this->db->affected_rows();

        if ($t > 0) {
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

    // requete de projection en tableau avec condition
    public function read_result($table, $cond, $orderby) {
        $this->db->select("*")
                ->from($table)
                ->where($cond)
                ->order_by($orderby[0], $orderby[1]);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    // requete de projection en tableau avec condition et limite
    public function read_result_limit($table, $cond, $orderby, $limit) {
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
    public function read($table) {
        $this->db->distinct();
        $this->db->select('*')->from($table);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    public function read_reponse() {
        $this->db->distinct();
        $this->db->select('groupe')->from('_reponse');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    public function all_reponse() {
        $this->db->distinct();
        $this->db->select('*')->from('_reponse')->where(array('groupe' => $this->input->get_post('grp')));

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    public function do_upd_reponse() {
        $id = $this->input->post('id');
        $new_grp = $this->input->post('new_grp');
        $ch = $this->input->post('ch');

        $t = 0;

        foreach ($id as $i) {
            $this->db->where(array('id' => $i));
            $this->db->update('_reponse', array('groupe' => $new_grp, 'reponse' => $ch[$t]));

            $t += $this->db->affected_rows();
        }

        if ($t > 0) {
            // gestion des intégrités
            $grp = $this->input->post('grp');

            $sql = "SELECT group_reponse FROM _sondage WHERE group_reponse ='" . $grp . "'";
            $query = $this->db->query($sql);
            $res = $query->result_array();

            if ($query->num_rows() > 0 && $grp != $new_grp) {
                foreach ($res as $grp_sond_rep) {
                    $this->db->where(array('group_reponse' => $grp_sond_rep['group_reponse']));
                    $this->db->update('_sondage', array('group_reponse' => $new_grp));
                }
            }

            return 1;
        } else {
            return 0;
        }
    }

    public function do_del_reponse() {
        // gestion des intégrités
        $grp = $this->input->get_post('v');
        $del = 0;

        $sql = "SELECT group_reponse FROM _sondage WHERE group_reponse ='" . $grp . "'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return 3;
        } else {
            $sqlx = "SELECT groupe FROM _reponse WHERE groupe ='" . $grp . "'";
            $queryx = $this->db->query($sqlx);
            $res = $queryx->result_array();

            foreach ($res as $grp_sond_rep) {
                $this->db->where(array('groupe' => $grp_sond_rep['groupe']));
                $this->db->delete('_reponse');

                $del += $this->db->affected_rows();
            }

            if ($del > 0) {
                return 1;
            } else {
                return 0;
            }
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

    //upload image
    public function getImage($rep) {
        $config['upload_path'] = './assets/rubriques/' . $rep;
        $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|png|PNG|GIF|gif';
        $config['max_size'] = '1000';
        $config['max_width'] = '1500';
        $config['max_height'] = '1500';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            return 0;
        } else { // image uploadée
            $info_image = $this->upload->data();
            return $info_image;
        }
    }

    //upload image miniature
    public function getImageMini($rep) {
        
        $config['upload_path'] = './assets/rubriques/' . $rep;
        $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|png|PNG|GIF|gif';
        $config['max_size'] = '1000';
        $config['max_width'] = '1300';
        $config['max_height'] = '1000';

        $this->load->library('upload2', $config);
        $this->upload2->initialize($config);

        if (!$this->upload2->do_upload()) {
            return 0;
        } else { // image uploadée
            $info_image = $this->upload2->data();
            return $info_image;
        }
    }

    //upload fichier
    public function getFile($rep) {
        //echo $rep;exit;
        $config['upload_path'] = './assets/rubriques/' . $rep;
        $config['allowed_types'] = 'doc|docx|pdf|mp3|jpg|jpeg|JPG|JPEG|png|PNG|GIF|gif';
        //$config['max_size'] = '222048';

        $this->load->library('upload3', $config);
        $this->upload3->initialize($config);

        if (!$this->upload3->do_upload()) {
            return 0;
        } else { // fichier uploadé
            $info_file = $this->upload3->data();
            return $info_file;
        }
    }

    // phototheque: insertion et upload multiple de fichier
    public function do_phototheque($table) {
        $n = 0;
        $photo = '';
        $nb = $this->input->post('nb_up_photo');

        $config['upload_path'] = FCPATH.'assets/rubriques/' . $table;
        $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|png|PNG';
        $config['max_size'] = '200';
        $config['max_width'] = '1000';
        $config['max_height'] = '1000';

        // chargement de la librairie
        $this->load->library('Multi_upload', $config);

        for ($i = 0; $i < $nb; $i++) {
            $this->multi_upload->initialize($config);

            if (!$this->multi_upload->do_upload('userfile', $i)) {
                // erreur d'upload
                return 2;
            } else {
                // on insère
                $photo = $this->multi_upload->data();

                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => NULL,
                    'image_wide' => $photo['file_name'],
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => NULL,
                    'album' => $this->input->post('album'),
                    'resume' => NULL,
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                $this->fields_escaper(['album', 'type_lien', 'etat', 'lib', 'resume', 'contenu', 'lien'],$data);
                $this->db->insert($table, $data);
                $t = $this->db->affected_rows();

                if ($t > 0) {
                    // maj de la table categorie ou album
                    if ($this->input->post('etat') == 'on') {
                        $this->db->where('lib_album', $this->input->post('album'));
                        $this->db->update('album', array('etat_album' => 'on'));
                    } else {
                        $cond = array('album' => $this->input->post('album'), 'etat' => 'on');

                        $t = $this->exist($table, $cond);

                        // s'il n'en existe pas, on désactive
                        if (!$t) {
                            $this->db->where('lib_album', $this->input->post('album'));
                            $this->db->update('album', array('etat_album' => 'off'));
                        }
                    }
                } else {
                    return 0;
                }

                $n++;
            }
        }

        if ($n > 0) {
            // tracabilite
            $data_trace = array(
                'lib_trace' => "Insertion dans la table " . $table,
                'date_trace' => @date('Y-m-d'),
                'heure_trace' => @date('H:i:s'),
                'user' => $this->session->userdata('login')
            );
            $this->db->insert('tracabilite', $data_trace);

            return 1;
        } else {
            return 0;
        }
    }

    public function do_communiques($table) {
        $lien = $resume = $contenu = $file = $lien_slide = $lien_inscr = NULL;
        $titre = $this->input->post('titre');
        $etat = $this->input->post('etat');
        $type_lien = $this->input->post('type_lien');
        $date = date('Y-m-d');
        $admin = $this->session->userdata('login');
        $share = $this->input->post('urgent');

//            print_r($_FILES['userfile2']); exit;

        if ($share == 1 && $_FILES['userfile2']['tmp_name'] == '') {
            return 5;
        }

        // lien
        if ($type_lien != NULL || $type_lien != '') {
            if ($this->input->post('type_lien') == 'fichier') {
                $file = $this->getFile($table);

                if ($file == 0) {
                    return 4;
                } else {
                    $lien = $table . '/' . $file['file_name'];
                    $resume = $this->input->post('resume');

                    if ($resume == '')
                        return 5;
                }
            }
            elseif ($this->input->post('type_lien') == 'site') {
                $lien = $this->input->post('site');
                $resume = $this->input->post('resume');

                if ($lien == '' || $resume == '')
                    return 5;
            }
            elseif ($this->input->post('type_lien') == 'rep') {
                $lien = $this->input->post('rep');
                $resume = $this->input->post('resume');

                if ($lien == '' || $resume == '')
                    return 5;
            }
            elseif ($this->input->post('type_lien') == 'auto') {
                $lien = 'viewpage/' . $table . '/';
                $resume = $this->input->post('resume');
                $contenu = $this->input->post('contenu');

                if ($contenu == '' || $resume == '')
                    return 5;
            }
            else {
                $lien = NULL;
            }
        }

        // important
        if ($share == 1) {
            // upload du slide
            $slide = $this->getImageMini('_alaune');

            if ($slide == 0) {
                return 3;
            } else {
                $slidename = $slide['file_name'];
            }

            // recuperation du lien dinscription
            $lien_inscr = $this->input->post('lien_inscrire');

            // etat
            $etat = 'on';
        }

        $data_com = array(
            'etat' => $etat,
            'type_image' => NULL,
            'image_small' => NULL,
            'image_wide' => NULL,
            'type_lien' => $type_lien,
            'lien' => $lien,
            'titre' => $titre,
            'partage' => $share,
            'resume' => $resume,
            'contenu' => $contenu,
            'date_ins' => $date,
            'user_ins' => $admin
        );
        $this->fields_escaper(['titre', 'type_lien', 'nom', 'lib', 'resume', 'contenu', 'lien'],$data_com);
        $this->db->insert($table, $data_com);
        $t = $this->db->affected_rows();

        if ($t > 0) {
            $id_com = $this->db->insert_id();

            if ($type_lien == 'auto') {
                $lien = $lien . $id_com;

                $this->db->where('id', $id_com);
                $this->db->update($table, array('lien' => $lien));
            }

            // insertion du slide et de l'actualite
            if ($share == 1) {
                $data_slide = array(
                    'etat' => $etat,
                    'type_image' => 'small',
                    'image_small' => $slidename,
                    'image_wide' => NULL,
                    'type_lien' => $type_lien,
                    'lien' => $lien,
                    'titre' => $titre,
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'date_ins' => $date,
                    'user_ins' => $admin,
                    'id_com' => $id_com
                );
                $this->fields_escaper(['titre', 'type_lien', 'nom', 'lib', 'resume', 'contenu', 'lien'],$data_slide);
                $data_actu = array(
                    'etat' => $etat,
                    'type_image' => NULL,
                    'image_small' => NULL,
                    'image_wide' => NULL,
                    'type_lien' => $type_lien,
                    'lien' => $lien,
                    'titre' => $titre,
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'date_ins' => $date,
                    'urgent' => 1,
                    'lien_inscrire' => $lien_inscr,
                    'user_ins' => $admin,
                    'id_com' => $id_com
                );
                $this->fields_escaper(['titre', 'type_lien', 'nom', 'lib', 'resume', 'contenu', 'lien', 'lien_inscrire'],$data_actu);
                $this->db->insert('_actualite', $data_actu);
                $this->db->insert('_alaune', $data_slide);

                // tracabilite
                $data_trace = array(
                    'lib_trace' => "Insertion dans les tables, " . $table . " ,_alaune et _actualite",
                    'date_trace' => @date('Y-m-d'),
                    'heure_trace' => @date('H:i:s'),
                    'user' => $admin
                );
            } else {
                // tracabilite
                $data_trace = array(
                    'lib_trace' => "Insertion dans la table " . $table,
                    'date_trace' => @date('Y-m-d'),
                    'heure_trace' => @date('H:i:s'),
                    'user' => $admin
                );
            }

            $this->db->insert('tracabilite', $data_trace);

            return 1;
        } else {
            return 0;
        }
    }

    public function insertion($table) {

        // initialisation des variables
        $lien = $resume = $contenu = $wide = $min = $doc = $profil = NULL;

        // grande & miniature
        if (($this->input->post('type_image') == 'wide')) {
            $img_wide = $this->getImage($table);

            if ($table == '_phototheque') {
                if ($img_wide == 0) {
                    return 2;
                } else {
                    $wide = $img_wide['file_name'];
                }
            } else {
                
                $img_mini = $this->getImageMini($table);

                if ($img_wide == 0) {
                    return 2;
                } elseif ($img_mini == 0) {
                    return 3;
                } else {
                    $wide = $img_wide['file_name'];
                    $min = $img_mini['file_name'];
                }
            }
        }

        // miniature
        if (($this->input->post('type_image') == 'small')) {
            $image_mini = $this->getImageMini($table);
            if ($image_mini == 0) {
                return 3;
            } else {
                $min = $image_mini['file_name'];
            }
        }

        // lien
        if ($this->input->post('type_lien') != NULL || $this->input->post('type_lien') != '') {
            if ($this->input->post('type_lien') == 'fichier') {
                $file = $this->getFile($table);

                if ($file == 0) {
                    return 4;
                } else {
                    $lien = $table . '/' . $file['file_name'];
                    $resume = $this->input->post('resume');
                }
            } elseif ($this->input->post('type_lien') == 'liste') {
                $file = $this->getFile($table);

                if ($file == 0) {
                    return 4;
                } else {
                    $lien = $table . '/' . $file['file_name'];
                    $doc = $this->input->post('doc');
                }
            } elseif ($this->input->post('type_lien') == 'site') {
                $lien = $this->input->post('site');
                $resume = $this->input->post('resume');

                if ($lien == '' || $resume == '')
                    return 5;
            }
            elseif ($this->input->post('type_lien') == 'rep') {
                $lien = $this->input->post('rep');
                $resume = $this->input->post('resume');

                if ($lien == '' || $resume == '')
                    return 5;
            }
            elseif ($this->input->post('type_lien') == 'auto') {
                $lien = 'viewpage/' . $table . '/';
                $resume = $this->input->post('resume');

                if ($table == '_phototheque') {
                    if ($resume == '')
                        return 5;
                }
                else {
                    $contenu = $this->input->post('contenu');
                    if ($contenu == '' || $resume == '')
                        return 5;
                }
            }
            else {
                $lien = NULL;
            }
        }

        // insertion dans la base de données
        switch ($table) {
            case "utilisateur":
                if ($this->input->post('profil') == 'autre') {
                    $profil = $this->input->post('profil2');

                    // données d'insertion dans la table profil
                    $data_profil = array('lib_profil' => $profil);
                } else {
                    $profil = $this->input->post('profil');
                }

                $data = array(
                    'login' => $this->input->post('login'),
                    'pswd' =>$this->encrypt->encode($this->input->post('mdp')),
                    'profil' => $profil,
                    'date_crea_user' => @date('Y-m-d'),
                    'heur_crea_user' => @date('H:i:s'),
                    'user_crea_util' => $this->session->userdata('login'),
                    'nom_user' => strtoupper($this->input->post('np'))
                );
                break;

            // les rubriques du site
            case '_flashinfo' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'titre' => $this->input->post('titre'),
                    'urgent' => $this->input->post('urgent'),
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;

            case '_offre' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'titre' => $this->input->post('titre'),
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'debut' => $this->input->post('debut'),
                    'fin' => $this->input->post('fin'),
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;

            case '_publication' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'titre' => $this->input->post('titre'),
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'debut' => $this->input->post('debut'),
                    'fin' => $this->input->post('fin'),
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;

            case '_annuaire' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'titre' => $this->input->post('titre'),
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'fax' => $this->input->post('fax'),
                    'call_center' => $this->input->post('call_center'),
                    'support' => $this->input->post('support'),
                    'dircab' => $this->input->post('dircab'),
                    'email' => $this->input->post('email'),
                    'standard' => $this->input->post('standard'),
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;

            case '_evenement' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'album' => $this->input->post('album'),
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'titre' => $this->input->post('titre'),
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;

            case '_alaune' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'album' => $this->input->post('album'),
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'titre' => $this->input->post('titre'),
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;

            case '_documentation' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'titre' => $this->input->post('titre'),
                    'document' => $doc,
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;
            case 'article_pnd' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'lien' => $lien,
                    'nom_document' => $this->input->post('doc'),
                    'pndId' => $this->input->post('titre'),
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;

            case '_actualite' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'lien_se_connecter' => $this->input->post('lien_connex'),
                    'urgent' => $this->input->post('urgent'),
                    'album' => $this->input->post('album'),
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'lien_inscrire' => $this->input->post('lien_inscrire'),
                    'date_fin_inscr' => $this->input->post('date_fin_ins'),
                    'titre' => $this->input->post('titre'),
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;

            case '_sondage' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'titre' => $this->input->post('titre'),
                    'resume' => $resume,
                    'contenu' => $this->input->post('contenu'),
                    'group_reponse' => $this->input->post('reponse'),
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;

            case '_ministre' :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'titre' => $this->input->post('titre'),
                    'stitre' => $this->input->post('stitre'),
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
                break;

            default :
                $data = array(
                    'etat' => $this->input->post('etat'),
                    'type_image' => $this->input->post('type_image'),
                    'image_small' => $min,
                    'image_wide' => $wide,
                    'type_lien' => $this->input->post('type_lien'),
                    'lien' => $lien,
                    'titre' => $this->input->post('titre', TRUE),
                    'resume' => $resume,
                    'contenu' => $contenu,
                    'date_ins' => @date('Y-m-d'),
                    'user_ins' => $this->session->userdata('login')
                );
        }
        
        $this->fields_escaper(['titre', 'type_lien', 'nom', 'lib', 'resume', 'contenu', 'lien'],$data );
        $this->db->insert($table, $data);
        $t = $this->db->affected_rows();

        if ($t > 0) {
            if (($table != 'utilisateur') && ($this->input->post('type_lien') == 'auto')) {
                $id = $this->db->insert_id();

                $this->db->where('id', $id);
                $this->db->update($table, array('lien' => $lien . $id));
            }

            // maj de la table categorie ou album
            if ($table == '_documentation' || $table == '_phototheque') {
                if ($this->input->post('etat') == 'on') {
                    switch ($table) {
                        case '_documentation':
                            $this->db->where('libel_categorie', $this->input->post('titre'));
                            $this->db->update('categorie_doc', array('etat' => 'on'));
                            break;

                        case '_phototheque':
                            $this->db->where('lib_album', $this->input->post('album'));
                            $this->db->update('album', array('etat_album' => 'on'));
                            break;
                    }
                } else {
                    $cond = '';

                    // on verfie s'il existe un autre activé
                    switch ($table) {
                        case '_documentation': $cond = array('titre' => $this->input->post('titre'), 'etat' => 'on');
                            break;
                        case '_phototheque': $cond = array('album' => $this->input->post('album'), 'etat' => 'on');
                            break;
                    }

                    $t = $this->exist($table, $cond);

                    // s'il n'en existe pas, on désactive
                    if (!$t) {
                        switch ($table) {
                            case '_documentation':
                                $this->db->where('libel_categorie', $this->input->post('titre'));
                                $this->db->update('categorie_doc', array('etat' => 'off'));
                                break;

                            case '_phototheque':
                                $this->db->where('lib_album', $this->input->post('album'));
                                $this->db->update('album', array('etat_album' => 'off'));
                                break;
                        }
                    }
                }
            }

            // on ajoute le nouveau profil s'il en y a un
            if (($table == 'utilisateur') && ($this->input->post('profil') == 'autre')) {
                $this->db->insert('profil', $data_profil);
            }

            // tracabilite
            $data_trace = array(
                'lib_trace' => "Insertion dans la table " . $table,
                'date_trace' => @date('Y-m-d'),
                'heure_trace' => @date('H:i:s'),
                'user' => $this->session->userdata('login')
            );
            $this->db->insert('tracabilite', $data_trace);

            return 1;
        } else {
            return 0;
        }
    }

    public function updates_com_share($table, $id) {
        $n = 0;

        // GESTION DES LIENS
        if ($this->input->post('type_lien') != NULL) {
            switch ($this->input->post('type_lien')) {
                case 'site':
                    $lien = $this->input->post('site');
                    $resume = $this->input->post('resume');

                    if ($lien == '' || $resume == '')
                        return 5;
                    break;

                case 'rep' :
                    $lien = $this->input->post('rep');
                    $resume = $this->input->post('resume');

                    if ($lien == '' || $resume == '')
                        return 5;
                    break;

                case 'auto' :
                    $lien = $this->input->post('current_lien');
                    $resume = $this->input->post('resume');
                    $contenu = $this->input->post('contenu');

                    if ($contenu == '' || $resume == '')
                        return 5;
                    break;

                case 'fichier' :
                    if (isset($_FILES['userfile3']) && $_FILES['userfile3']['name'] != '') {

                        $file = $this->getFile($table);
                        if ($file == 0) {
                            return 4;
                        } else {
                            $lien = $table . '/' . $file['file_name'];
                        }
                    } else {
                        $lien = $this->input->post('current_lien');
                    }
                    break;

                default : $lien = $this->input->post('current_lien');
            }
        }

        $id_slide = $this->read_row('_alaune', array('id_com' => $id));
        $id_actu = $this->read_row('_actualite', array('id_com' => $id));

        $tab_id = array($id . '/' . $table, $id_slide['id'] . '/_alaune', $id_actu['id'] . '/_actualite');

        foreach ($tab_id as $tid) {
            $index = explode('/', $tid);

            $this->db->where('id', $index[0]);
            $this->db->update($index[1], array(
                'type_lien' => $this->input->post('type_lien'),
                'lien' => $lien,
                'titre' => $this->input->post('titre'),
                'resume' => $resume,
                'contenu' => $contenu,
                'date_upd' => @date('Y-m-d'),
                'user_upd' => $this->session->userdata('login'),
                'etat' => $this->input->post('etat')
            ));

            $n += $this->db->affected_rows();
        }

        if ($n == 3) {
            return 1;
        } else {
            return 0;
        }
    }

    function upload($file) {

        $extensions = array(
            // images
            'png',
            'jpe',
            'jpeg',
            'jpg',
            'gif',
            'bmp',
            'ico',
            'tiff',
            'tif',
            'svg',
            'svgz',
        );

        $mime_types = array(
            // images
            'image/png',
            'image/jpeg',
            'image/jpeg',
            'image/gif',
            'image/bmp',
            'image/vnd.microsoft.icon',
            'image/tiff',
            'image/tiff',
            'image/svg+xml',
            'image/svg+xml',
        );

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        $extension = strrchr($file['name'], '.');

        if (!in_array($extension, $extensions) || !in_array($mimeType, $allowedMimeTypes)) {

        } else {

        }
    }

    //
    public function mise_a_jour($table, $id) {
        if ($table == '_communique' && $this->input->post('com_sh') == 1) {
            $n = $this->updates_com_share($table, $id);
            return $n;
        } else {
            // initialisation des variables
            $lien = $resume = $contenu = $wide = $min = $doc = NULL;

            // GESTION DES IMAGES
            //grande & miniature
            if ($this->input->post('type_image') == 'wide') {
                // si changement d'image
                if (!empty($_FILES['userfile']['name'])) {
                    //
                    $img_wide = $this->getImage($table);

                    if ($table == '_phototheque') {
                        if ($img_wide == 0) {
                            return 2;
                        } else {
                            $wide = $img_wide['file_name'];
                        }
                    } else {
                        $img_mini = $this->getImageMini($table);

                        if ($img_wide == 0) {
                            return 2;
                        } elseif ($img_mini == 0) {
                            return 3;
                        } else {
                            $wide = $img_wide['file_name'];
                            $min = $img_mini['file_name'];
                        }
                    }
                }
                // si pas changement d'image
                else {
                    $wide = $this->input->post('current_wide');
                    $min = $this->input->post('current_small');
                }
            }
            //miniature
            else {
                // si changement d'image
                if (!empty($_FILES['userfile2']['name'])) {

                    $image_mini = $this->getImageMini($table);

                    if ($image_mini == 0) {
                        return 3;
                    } else {
                        $min = $image_mini['file_name'];

                        // suppression de l'ancienne image
                        //                        $filename = "assets/rubriques/".$this->input->get_post('t').'/'.$this->input->post('current_small');
                        //                        unlink ($filename);
                    }
                }
                // si pas changement d'image
                else {
                    $min = $this->input->post('current_small');
                }
            }


            // GESTION DES LIENS
            if ($this->input->post('type_lien') != NULL) {
                switch ($this->input->post('type_lien')) {
                    case 'site':
                        $lien = $this->input->post('site');
                        $resume = $this->input->post('resume');

                        if ($lien == '' || $resume == '')
                            return 5;
                        break;

                    case 'rep' :
                        $lien = $this->input->post('rep');
                        $resume = $this->input->post('resume');

                        if ($lien == '' || $resume == '')
                            return 5;
                        break;

                    case 'auto' :
                        $lien = $this->input->post('current_lien');
                        $resume = $this->input->post('resume');

                        if ($table == '_phototheque') {
                            if ($resume == '')
                                return 5;
                        }
                        elseif ($this->input->post('sh') == 1) {
                            $contenu = $this->input->post('ctn');
                        } else {
                            $contenu = $this->input->post('contenu');
                            if ($contenu == '' || $resume == '')
                                return 5;
                        }
                        break;

                    case 'liste' :
                        $doc = $this->input->post('doc');

                        if (isset($_FILES['userfile3']) && $_FILES['userfile3']['name'] != '') {

                            $file = $this->getFile($table);
                            if ($file == 0) {
                                return 4;
                            } else {
                                $lien = $table . '/' . $file['file_name'];
                            }
                        } else {
                            $lien = $this->input->post('current_lien');
                        }
                        break;

                    case 'fichier' :
                        if (isset($_FILES['userfile3']) && $_FILES['userfile3']['name'] != '') {
                            $file = $this->getFile($table);
                            if ($file == 0) {
                                return 4;
                            } else {
                                $lien = $table . '/' . $file['file_name'];
                            }
                        } else {
                            $lien = $this->input->post('current_lien');
                        }

                        if ($table != '_documentation' && $table != '_publication') {
                            $resume = $this->input->post('resume');
                            if ($resume == '')
                                return 5;
                        }
                        break;

                    default : $lien = $this->input->post('current_lien');
                }
            }

            //
            switch ($table) {
                case 'utilisateur' :
                    $data = array(
                        'pswd' =>$this->encrypt->encode($this->input->post('nouvo_pass1')),
                        'date_modif_user' => @date('Y-m-d'),
                        'heur_modif_user' => @date('H:i:s'),
                        'user_modif_util' => $this->session->userdata('login'),
                        'nom_user' => $this->input->post('nom')
                    );
                    break;

                // les rubriques du site
                case '_flashinfo' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'titre' => $this->input->post('titre'),
                        'urgent' => $this->input->post('urgent'),
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
                    break;

                case '_phototheque' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'album' => $this->input->post('album'),
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
                    break;

                case '_annuaire' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'titre' => $this->input->post('titre'),
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'fax' => $this->input->post('fax'),
                        'call_center' => $this->input->post('call_center'),
                        'support' => $this->input->post('support'),
                        'dircab' => $this->input->post('dircab'),
                        'email' => $this->input->post('email'),
                        'standard' => $this->input->post('standard'),
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
                    break;

                case '_offre' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'titre' => $this->input->post('titre'),
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'debut' => $this->input->post('debut'),
                        'fin' => $this->input->post('fin'),
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
                    break;

                case '_evenement' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'album' => $this->input->post('album'),
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'titre' => $this->input->post('titre'),
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
                    break;

                case '_alaune' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'album' => $this->input->post('album'),
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'titre' => $this->input->post('titre'),
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
                    break;

                case '_publication' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'titre' => $this->input->post('titre'),
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'debut' => $this->input->post('debut'),
                        'fin' => $this->input->post('fin'),
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );

                    break;

                case '_documentation' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'titre' => $this->input->post('titre'),
                        'document' => $doc,
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
                    break;

                case '_actualite' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        //                       'image_wide' => $wide,
                        'album' => $this->input->post('album'),
                        'urgent' => $this->input->post('urgent'),
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'lien_inscrire' => $this->input->post('lien_inscrire'),
                        'date_fin_inscr' => $this->input->post('date_fin_ins'),
                        'lien_se_connecter' => $this->input->post('lien_connex'),
                        'titre' => $this->input->post('titre'),
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
                    break;

                case '_sondage' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'titre' => $this->input->post('titre'),
                        'resume' => $resume,
                        'contenu' => $this->input->post('contenu'),
                        'group_reponse' => $this->input->post('reponse'),
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
                    break;

                case '_ministre' :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'titre' => $this->input->post('titre'),
                        'stitre' => $this->input->post('stitre'),
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
                    break;

                default :
                    $data = array(
                        'etat' => $this->input->post('etat'),
                        'type_image' => $this->input->post('type_image'),
                        'image_small' => $min,
                        'image_wide' => $wide,
                        'type_lien' => $this->input->post('type_lien'),
                        'lien' => $lien,
                        'titre' => $this->input->post('titre'),
                        'resume' => $resume,
                        'contenu' => $contenu,
                        'date_upd' => @date('Y-m-d'),
                        'user_upd' => $this->session->userdata('login')
                    );
            }

            $this->fields_escaper(['titre', 'type_lien', 'nom', 'lib', 'resume', 'contenu', 'lien'],$data );

            if ($table == 'utilisateur') {
                $this->db->where('login', $id);
            } else {
                $this->db->where('id', $id);
            }

            $this->db->update($table, $data);
            $query = $this->db->affected_rows();

            if ($query > 0) {
                // mise à jour des donnees de session : cas user
                if ($table == 'utilisateur') {
                    $this->session->set_userdata($data);
                } else {
                    // maj de la table categorie ou album
                    if ($table == '_documentation' || $table == '_phototheque') {
                        if ($this->input->post('etat') == 'on') {
                            switch ($table) {
                                case '_documentation':
                                    $this->db->where('libel_categorie', $this->input->post('titre'));
                                    $this->db->update('categorie_doc', array('etat' => 'on'));
                                    break;

                                case '_phototheque':
                                    $this->db->where('lib_album', $this->input->post('album'));
                                    $this->db->update('album', array('etat_album' => 'on'));
                                    break;
                            }
                        } else {
                            // on verfie s'il existe un autre activé
                            switch ($table) {
                                case '_documentation': $cond = array('titre' => $this->input->post('titre'), 'etat' => 'on');
                                    break;
                                case '_phototheque': $cond = array('album' => $this->input->post('album'), 'etat' => 'on');
                                    break;
                            }

                            $t = $this->exist($table, $cond);

                            // s'il n'en existe pas, on désactive
                            if (!$t) {
                                switch ($table) {
                                    case '_documentation':
                                        $this->db->where('libel_categorie', $this->input->post('titre'));
                                        $this->db->update('categorie_doc', array('etat' => 'off'));
                                        break;

                                    case '_phototheque':
                                        $this->db->where('lib_album', $this->input->post('album'));
                                        $this->db->update('album', array('etat_album' => 'off'));
                                        break;
                                }
                            }
                        }
                    }
                }

                // tracabilite
                $data_trace = array(
                    'lib_trace' => "Mise à jour dans la table " . $table,
                    'date_trace' => @date('Y-m-d'),
                    'heure_trace' => @date('H:i:s'),
                    'user' => $this->session->userdata('login')
                );
                $this->db->insert('tracabilite', $data_trace);

                return 1;
            } else {
                return 0;
            }
        }
    }

    public function delete($table, $id) {
        $data = $small = $wide = '';

        switch ($table) {
            case 'utilisateur':
                $this->db->where('id_user', $id);
                break;

            case 'access_ef':
                $this->db->where('mat_aef', $id);
                break;

            case 'categorie_doc':
                $this->db->where('id_categorie', $id);
                break;

            default :
                // recuperation du ou des noms de fichiers à effacer
                $data = $this->read_row($table, array('id' => $id));

                // condition de suppression des autres tables
                $this->db->where('id', $id);
        }

        $this->db->delete($table);
        $query = $this->db->affected_rows();

        if ($query > 0) {
            if (!in_array($table, array('access_ef', 'utilisateur', 'categorie_doc'))) {
                // on efface le fichier s'il existe
                $file_path_wide = $_SERVER['DOCUMENT_ROOT'] . "/assets/rubriques/" . $table . "/" . $data['image_wide'];
                $file_path_small = $_SERVER['DOCUMENT_ROOT'] . "/assets/rubriques/" . $table . "/" . $data['image_small'];

                if (!empty($data['image_wide']) && file_exists($file_path_wide)) {
                    unlink($file_path_wide);
                }

                if (!empty($data['image_small']) && file_exists($file_path_small)) {
                    unlink($file_path_small);
                }
            }

            // mise a jour de tables spécifiques apres suppression de données
            $table_up = array('_documentation', '_phototheque');

            if (in_array($table, $table_up)) {
                $cond = '';

                // on verfie s'il existe un autre activé
                switch ($table) {
                    case '_documentation': $cond = array('titre' => $this->input->get_post('cat'), 'etat' => 'on');
                        break;
                    case '_phototheque': $cond = array('album' => $this->input->get_post('alb'), 'etat' => 'on');
                        break;
                    default : $cond = '';
                }

                $t = $this->exist($table, $cond);

                // s'il n'en existe pas, on désactive
                if (!$t) {
                    switch ($table) {
                        case '_documentation':
                            $this->db->where('libel_categorie', $this->input->get_post('grid'));
                            $this->db->update('categorie_doc', array('etat' => 'off'));
                            break;

                        case '_phototheque':
                            $this->db->where('lib_album', $this->input->get_post('grid'));
                            $this->db->update('album', array('etat_album' => 'off'));
                            break;
                    }
                }
            }

            // tracabilite
            $data_trace = array(
                'lib_trace' => "Suppression dans la table " . $table,
                'date_trace' => @date('Y-m-d'),
                'heure_trace' => @date('H:i:s'),
                'user' => $this->session->userdata('login')
            );
            $this->db->insert('tracabilite', $data_trace);

            return 1;
        } else {
            return 0;
        }
    }

    //
    public function change_profil_user() {
//            echo $this->input->get_post('p'); exit;
        $this->db->where('id_user', $this->input->get_post('i'));
        $this->db->update('utilisateur', array('profil' => $this->input->get_post('p')));

        $query = $this->db->affected_rows();

        if ($query > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    //
    public function liste_acces() {
        $query = $this->db->query("SELECT mat_aef, niveau_access FROM access_ef");
        return $query->result_array();
    }

    //
    public function access() {
        $mat = $this->input->post('mat_acces');
        $mdp = $this->input->post('mdp_acces');
        $nivo = $this->input->post('niv_acces');

        // on verifie s'il est fonctionnaire 
        
        //$check1 = $this->exist('situation_agent_maj', array('MATRICULE' => $mat));

        /*if ($check1 == 0) {
            return 2;
        } else {*/
            // on verifie si le matricule existe deja
            $check2 = $this->exist('access_ef', array('mat_aef' => $mat));

            if ($check2 == 1) {
                return 3;
            } else {
                // on insère

                $data = array(
                    'mat_aef' => $mat,
                    //'mdp_aef' => Password::hash(($mdp)),
		    'mdp_aef' => $this->encrypt->encode($mdp),
                    'niveau_access' => $nivo,
                    'cree_par' => $this->session->userdata('login')
                );

                $this->db->insert('access_ef', $data);
                $create = $this->db->affected_rows();

                if ($create > 0) {
                    return 1;
                } else {
                    return 0;
                }
            }
        //}
    }

    //
    public function maj_access() {

    }

}

?>