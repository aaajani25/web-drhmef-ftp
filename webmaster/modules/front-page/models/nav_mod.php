<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nav_mod extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('password');
        // chargement de la base de données sigfae
        $this->sf = $this->load->database('sigfae', TRUE);
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
            //$nb = $query->num_rows();
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

    // requete de projection en tableau avec condition et limite
    public function read_result_nolimit($table, $cond, $orderby) {
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

    public function read($table, $cond) {
        $this->db->select("*")
                ->from($table)
                ->where($cond);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    public function readTable($table) {
        $this->db->select("*")->from($table)->order_by('id','DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    // requete de projection en tableau avec condition et limite
    public function document($table, $cond, $orderby) {
        $this->db->select("titre, type_lien, lien, document")
                ->from($table)
                ->where($cond)
                ->$this->db->group_by("titre")
                ->order_by($orderby[0], $orderby[1]);

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

    // requete de projection d'une ligne
    public function read_row($table, $cond) {

        $query = $this->db->get_where($table, $cond);
        if($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        } else {
            return 0;
        }
    }

    public function selectlist($req, $data) {
        $query = $this->db->query($req, $data);
        $row = $query->result(); //row();
        return $row;
    }

    public function selectline($req, $data) {
        $query = $this->db->query($req, $data);
        $row = $query->row(); //row();
        return $row;
    }

    // requete avec jointure
    public function do_join_row($projection, $table_from, $jointure, $cond) {
//            $t='';
        $this->db->select($projection);
        $this->db->from($table_from);

//            foreach ($jointure as $val){
//               $this->db->join($val[0],$val[1],$val[2]);
//            }
//            print_r($t); exit;
        $this->db->join($jointure[0], $jointure[1], $jointure[2]);
        $this->db->where($cond);

        $query = $this->db->get();
//             print_r($query); exit;

        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        } else {
            return 0;
        }
    }

    // requete avec jointure 1
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

    // requete avec jointure 2
    public function do_join($projection, $table_from, $jointure, $cond, $orderby) {
        $this->db->select($projection);
        $this->db->from($table_from);

        foreach ($jointure as $val) {
            $this->db->join($val[0], $val[1], $val[2]);
        }

        if(!empty($cond)) $this->db->where($cond);
        $this->db->order_by($orderby[0], $orderby[1]);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return 0;
        }
    }

    // insertion
    public function insertion($table, $data) {
        $this->db->insert($table, $data);
        $query = $this->db->affected_rows();

        if ($query > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    //upload image miniature
    public function getPhoto($mat) {
        $config['upload_path'] = 'assets/espace_fon/photos/';
        $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|png|PNG';
        $config['max_size'] = '50';
        $config['max_width'] = '150';
        $config['max_height'] = '175';
        $config['file_name'] = $mat;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            return 0;
        } else { // image uploadée
            $info_photo = $this->upload->data();
            return $info_photo;
        }
    }

    // inscription à l'espace fonctionnaire
    public function inscr_espace_fonct($table) {

            $data = array(
                'matricule' => $this->input->post('matricule'),
                'pswd' => Password::hash($this->input->post('mot_de_passe')),
                'pswd_user'=>$this->input->post('mot_de_passe'),
                'email' => $this->input->post('email'),
                'date_inscr' => @date('Y-m-d')
            );

            $this->db->insert($table, $data);
            $query = $this->db->affected_rows();

            if ($query > 0) {
                return 1;
            } else {
                return 0;
            }
        //
    }

    // maj
    public function maj($col, $value, $table, $data) {
        $this->db->where($col, $value);
        $this->db->update($table, $data);

        $query = $this->db->affected_rows();

        if ($query > 0) {
            return 1;
        } else {
            return 0;
        }
    }

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

    public function checkcivilite($sexe, $civilite) {
        // 0: erreur
        if ($sexe == 2) {
            if ($civilite == 1) {
                $ers = 0;
            } else {
                $ers = 1;
            }
        } else {
            if ($civilite == 2) {
                $ers = 0;
            } elseif ($civilite == 3) {
                $ers = 0;
            } else {
                $ers = 1;
            }
        }
        return $ers;
    }

    // codification de l'acte
    public function codification($numrec) {
        $nbrchar = strlen($numrec);
        $an = date('y');
        $str = 'XXXX';

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

    // demande acte non fonctionnaire
    public function non_engagement() {
//            echo 'khkhk'; exit;
        $matricule = '';

        $sexciv = $this->checkcivilite($this->input->post('sexe'), $this->input->post('civ'));

        if ($sexciv == 0) {
            return 4;
        } else {

            $nom_demandeur = htmlentities($this->input->post('nom'));
            $prenoms_demandeur = htmlentities($this->input->post('prenom'));

            // controle d'inscription
            $sql_control = "SELECT DISTINCT NUMRECU, CODE_ACTE, NATURE_P, NOM, PRENOM, CIVILITE,
                    DATENAISS, LIEUNAISS, FONCTION
                    FROM tbat_acte_nf
                    WHERE CODE_ACTE='" . $this->input->post('acte') . "' "
                    . "AND NATURE_P='" . $this->input->post('cni') . "'"
                    . " AND NOM='" . addslashes($nom) . "' "
                    . "AND PRENOM='" . addslashes($prenoms_demandeur) . "' "
                    . "AND CIVILITE='" . $this->input->post('civilite') . "' "
                    . "AND DATENAISS='" . $this->input->post('datenaiss') . "' AND "
                    . "LIEUNAISS='" . $this->input->post('lieu') . "' AND FONCTION= '" . $this->input->post('fonction') . "'";

            $res_control = $this->getSQL('db', $sql_control, 'row');

            if ($res_control != 0) {
                // la demande existe deja
                // affichage du recu
                return $res_control['NUMRECU'];
            } else {
                $date = date("d/m/Y");

                $motif_demandeur = htmlentities($this->input->post('motif'));
                $nom_pere = htmlentities($this->input->post('pere'));
                $nom_mere = htmlentities($this->input->post('mere'));

                $sql_acte = "INSERT INTO `tbat_demande_acte`"
                        . " (`ID_ACTE`,MATAGENT,`MOTIF`, `NUM_RECU`, `DATE_DEMANDE`, "
                        . "`DATE_RDV`,`DATE_PAIE`, `ETAT`,`COPIE`, `NOMPERE`, "
                        . "`NOMMERE`, `SEXE`) "
                        . "VALUES ('" . $this->input->post('acte') . "', '" . $matricule . "',"
                        . "'" . addslashes($motif_demandeur) . "', "
                        . "NULL, '" . $date . "', '" . $this->input->post('daterdv') . "',NULL, "
                        . "NULL,'" . $this->input->post('nbcopie') . "', '" . addslashes($nom_pere) . "', "
                        . "'" . addslashes($nom_mere) . "', '" . $this->input->post('sexe') . "')";

                $res_acte = $this->xcudSQL('db', $sql_acte);

                if ($res_acte > 0) {
                    $id_acte = $this->db->insert_id();
                    $res_codif = $this->codification($id_acte);

                    $sql_upd_acte = "UPDATE `tbat_demande_acte` "
                            . "SET MATAGENT = '" . $res_codif . "',`NUM_RECU` = '" . $res_codif . "' "
                            . "WHERE `ID` ='" . $id_acte . "'";

                    $res_up_acte = $this->xcudSQL('db', $sql_upd_acte);

                    if ($res_up_acte > 0) {
                        $sql_ins_acte = "INSERT INTO tbat_acte_nf"
                                . "(ID,CODE_ACTE,NATURE_P,MATRICULE,NUMRECU,NOM, PRENOM, "
                                . "CIVILITE, DATENAISS, LIEUNAISS, FONCTION,"
                                . "TELEPHONE,DATE_DEM) "
                                . "VALUES ('', '" . $this->input->post('acte') . "','" . $this->input->post('cni') . "', '" . $matricule . "',"
                                . "'" . $res_codif . "', '" . addslashes($this->input->post('nom')) . "', '" . addslashes($this->input->post('prenom')) . "',
                                    '" . $this->input->post('civ') . "', '" . $this->input->post('datenaiss') . "',"
                                . " '" . $this->input->post('lieu') . "', '" . $this->input->post('fonction') . "',"
                                . "'" . $this->input->post('tel') . "', NOW())";

                        $res_ins_acte = $this->xcudSQL('db', $sql_ins_acte);

                        if ($res_ins_acte > 0) {
                            // recu
                            return $res_codif;
                        } else {
                            return 2;
                        }
                    } else {
                        return 3;
                    }
                } else {
                    // impossible d'inserer la demande d'acte
                    return 2;
                }
            }
        }
    }

    // recu demande d'acte
    public function inforecu_acte() {
        $sql = "SELECT TYPE_ACTE, MATRICULE, NUMRECU, DATENAISS, LIEUNAISS, FONCTION,
                DATE_DEM, tbat_demande_acte.DATE_RDV, (COPIE * 2000) As MONTANT,
                concat_ws(' ', NOM, PRENOM) as NOM_PRENOMS,LIB_SPREF, Left(NUMRECU,7)As identifiant
                FROM tbat_acte_nf
                INNER JOIN  tbat_acte_tarife ON tbat_acte_nf.CODE_ACTE=tbat_acte_tarife.NATURE_CODE
                INNER JOIN  tbat_demande_acte ON tbat_acte_nf.NUMRECU=tbat_demande_acte.NUM_RECU
                INNER JOIN tbaf_spref ON tbaf_spref.CODE_SPREF=tbat_acte_nf.LIEUNAISS
                WHERE `NUMRECU`='" . $this->input->get_post('num_recu') . "'";

        return $this->getSQL('db', $sql, 'row');
    }

    public function print_nf() {
        $sql_3 = "SELECT TYPE_ACTE, MATRICULE AS MATAGENT, NUMRECU as NUM_RECU, DATENAISS, LIEUNAISS, FONCTION, DATE_DEM,
            tbat_demande_acte.DATE_RDV, concat_ws(' ', NOM, PRENOM) as NOM_PRENOMS,LIB_SPREF, MONTANT, DATE_PAIE,
            DATE_RDV_RETRAIT,COPIE,NATURE_CODE, Left(NUMRECU,7)As identifiant
            FROM tbat_acte_nf
            INNER JOIN  tbat_acte_tarife ON tbat_acte_nf.CODE_ACTE=tbat_acte_tarife.NATURE_CODE
            INNER JOIN  tbat_demande_acte ON tbat_acte_nf.NUMRECU=tbat_demande_acte.NUM_RECU
            INNER JOIN tbaf_spref ON tbaf_spref.CODE_SPREF=tbat_acte_nf.LIEUNAISS
            WHERE `NUMRECU`='" . addslashes($this->input->get_post('numrecu')) . "'";

        return $this->getSQL('db', $sql_3, 'row');
    }

    // actes_signes
    public function actes_signes($matricule) {
        $dir = 'dir_acte/';
        $aux = "";

        $agt = "SELECT * FROM `situation_agent_maj` WHERE `MATRICULE` LIKE '%" . $matricule . "%'";
        $nb_agt = $this->getSQL('db', $agt, 'row');

        if ($nb_agt == 0) {
            return 1; // Matricule incorrect
        } else {
            $dossier_s = "SELECT * FROM `note_service` WHERE `MATRICULE` LIKE '%" . $matricule . "%'";
            $line_s = $this->getSQL('db', $dossier_s, 'row');

            $query = "SELECT DISTINCT matricule, nom, prenoms, num_actes, date_signe, libelle_acte, etat,"
                    . " Concat_ws('/',Right(DATE_REJET,2), Left(Right(DATE_REJET,4),2), Left(DATE_REJET,4))"
                    . "As DATE_REJET, OBSERV_REJET FROM `actes` WHERE `matricule` LIKE '%" . $matricule . "%'";

            $ligne_promo = $this->getSQL('db', $query, '');

//                if($line_s!=0 and $ligne_promo==0){
//                    // Votre Note de service est sign&eacute;e
//                    return 2;
//                }
//
//                if($ligne_promo!=0 and $line_s==0){
//                    //Vos actes ci-dessous sont sign&eacute;s
//                    return 3;
//                }
//
//                if($ligne_promo!=0 and $line_s!=0){
//                    //Votre Note de service ainsi que vos actes ci-dessous sont sign&eacute;s.
//                    return 4;
//                }

            if ($ligne_promo == 0 and $line_s == 0) {
                //Vous n\'avez pas d\'actes sign&eacute;s depuis Ao&ucirc;t 2011
                return 5;
            }

            if ($line_s != 0) {
                $matricule = mb_strtoupper($matricule);
                $nom_prenoms = $line_s['NOM_PRENOMS'];
                $emploi = $line_s['EMPLOI'];
                $structure = $line_s['STRUCTURE'];

                $aux .= '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab-inc">
      <tr>
        <td width="8%">&nbsp;</td>
        <td width="92%"><div class="cadrep">
                  <table width="100%" height="148" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="7%">&nbsp;</td>
                      <td width="39%">&nbsp;</td>
                      <td width="54%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="7%" bgcolor="">&nbsp;</td>
                      <td width="39%" bgcolor="" align="left" >Matricule : </td>
                      <td bgcolor="" align="left" ><b>' . $matricule . '</b></td>
                    </tr>

                    <tr>
                      <td>&nbsp;</td>
                      <td align="left" >Nom et Pr&eacute;noms :</td>
                      <td align="left" ><b>' . $nom_prenoms . '</b></td>
                    </tr>
                   <tr>
                      <td bgcolor="" >&nbsp;</td>
                      <td bgcolor="" align="left" >Emploi :</td>
                      <td bgcolor="" align="left" ><b>' . $emploi . '</b></td>
                    </tr>

                                     <tr>
                      <td>&nbsp;</td>
                      <td align="left" >Structure :</td>
                      <td align="left" ><b>' . $structure . '</b></td>
                    </tr>';
                $aux .= '</table>';
            }

            if ($ligne_promo > 0 and $line_s == 0) {
                $matricule = $nb_agt['MATRICULE'];
                $nom_prenoms = $nb_agt['NOM'] . ' ' . $nb_agt['PRENOMS'];

                $aux .= '<table width="90%" border="1" cellspacing="0" cellpadding="0" class="tab-doc">
                    <tr class="titre-doc">
                      <td width="29%" align="" bgcolor="">Matricule : </td>
                      <td width="70%" align="left" bgcolor="" class="titre_vert" ><b>' . $matricule . '</b></td>
                    </tr>

                    <tr>
                      <td align="">Nom et Pr&eacute;noms :</td>
                      <td align="left" class="titre_vert" ><b>' . $nom_prenoms . '</b></td>
                    </tr>';

                $aux .= '</table> <br/>';
            }

            if ($ligne_promo > 0) {
                $aux .= '<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#8ec600">
      <tr>
        <td align="center" width="" bgcolor="#FBFFFC">
        <span style="color:#900;font-weight:bold">POUR LE TELECHARGEMENT DE
        VOS ACTES, ALLEZ SUR VOTRE ESPACE FONCTIONNAIRE</span><br>
        <span style="color:#000;font-weight:bold">(Les actes imprimables sont ceux num&eacute;ris&eacute;s &agrave;
        partir de JUIN 2012)</span>

    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr class="titre_orange_light" bgcolor="#EAFDEB">
                      <td width="15%" align="center">N&deg; de l\'Acte</td>
                      <td width="30%">Nature de l\'Acte</td>
                                      <td width="15%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Etat</td>
                      <td width="20%">Date de Signature</td>
                      <td width="37%" align="center">T&eacute;l&eacute;chargez l\'acte</td>
                    </tr>';
                if ($line_s != 0) {
                    $aux .= '<tr>
                      <td>' . $line_s['NUM_ACTE'] . '</td>
                      <td class="contenu_gras">NOTE DE SERVICE</td>
                                      <td class="contenu_gras">NOTE SIGNEE</td>
                      <td>&nbsp;</td>
                                      <td bgcolor="#FBFFFC">&nbsp;</td></tr>';
                }
                $i = 0;

                foreach ($ligne_promo as $ligne_promo) {
                    $req_upload = "SELECT * FROM `upload_acte` WHERE `matricule`='" . $matricule . "' "
                            . "and `numero` = '" . $ligne_promo['num_actes'] . "'";

//                    $rp=$instance_fct1->executeSQL2($req_upload);
                    $ln_rp = $this->getSQL('db', $req_upload, '');

                    //Vérifier que la date de signature est inférieure ou supérieure à la date de début de scannage
                    $detach = explode('/', $ligne_promo['date_signe']);
                    $datsign = $detach[2] . $detach[1];

                    //test s il le fichier existe dans le repertoire dir acte
                    if ($datsign < 201207)
                        $mention = 'Disponible aux archives';
                    elseif ($ligne_promo['libelle_acte'] <> 'TITULARISATION' && $ligne_promo['etat'] == 'DOCUMENT SAISI')
                        $mention = 'En traitement';
                    else
                        $mention = 'Non encore num&eacute;ris&eacute;';

                    // Afficher la liste des actes signés
                    if ($i % 2 == 0)
                        $aux .= '<tr bgcolor="#E8E8E8" >';
                    else
                        $aux .= '<tr bgcolor="#ffffff" >';

                    $aux .= '<td class="contenu_gras" align="center">' . $ligne_promo['num_actes'] . '</td>
                      <td class="contenu_gras">' . $ligne_promo['libelle_acte'] . '</td>
                                      <td class="contenu_gras">' . $ligne_promo['etat'] . '</td>
                      <td class="contenu_gras" align="center">' . $ligne_promo['date_signe'] . '</td>';

                    $rep = './TITULARISATION/';
                    $dir = "upload_acte/dir_acte/";

                    if ($ln_rp['fichier'] and file_exists($dir . $ln_rp['fichier']))
                        $aux .= '<td align="center"><a href="?fp=connect">Cliquez ici</a></td>';

                    elseif ($ligne_promo['libelle_acte'] == 'TITULARISATION' && file_exists($rep))
                        $aux .= '<td align="center"><a href="?fp=connect">Cliquez ici</a></td>';
                    else
                        $aux .= '<td align="center">' . $mention . '</td>
                      </tr>';
                    $i++;
                }
                $aux .= '</table></td></tr>';

                $aux .= '</table>';
            }

            return $aux;
        }
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
        $sql = 'SELECT count(*) as etat from guest inner join connections on guest.id_guest = connections.id_guest where connections.id_guest = ? and connections.date_add = now()';
        return ($this->db->query($sql, $idg)->row()->etat > 0) ? 1 : 0;
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
        $sql = "SELECT count(*) as total FROM connections WHERE date_add='" . date('Y-m-d') . "'";
        $query = $this->db->query($sql);

        return $query->row()->total; //$query->num_rows();
    }

    //
    public function insert_trace_acces($param1, $param2) {
        $data = array(
            'mat_aef' => $param2,
            'mat_usager' => $param1,
            'date_access' => @date('Y-m-d'),
            'heure_access' => @date('H:i:s')
        );

        $this->db->insert('trace_access_ef', $data);
    }

    //emploi pour resultat d'affectation
    public function getEmploi() {
        $sql_emp = "SELECT DISTINCT PA_EM,`PA_EMPLOI_LIB` FROM `tbaf_admis`,`emploi` WHERE `PA_EM`=`PA_EMPLOI_CODE` ORDER BY `PA_EMPLOI_LIB`";

        $res_emp = $this->sf->query($sql_emp);

        if ($res_emp->num_rows() > 0) {
            $data = $res_emp->result_array();
            return $data;
        } else {
            return 0;
        }
    }
//Liste des natures du témoignage
    public function getNature() {
        $sql_emp = "SELECT DISTINCT id,`libelle` FROM naturetem WHERE actif=1";

        $res_emp = $this->db->query($sql_emp);

        if ($res_emp->num_rows() > 0) {
            $data = $res_emp->result();
            return $data;
        } else {
            return 0;
        }
    }
    //Liste des natures du témoignage
    public function get_pl_objet($param) {
        $sql_emp = "SELECT DISTINCT id,`libelle` FROM naturetem WHERE id=?";

        $res_emp = $this->db->query($sql_emp,$param);

        if ($res_emp->num_rows() > 0) {

            $data = $res_emp->row();
            return $data;
        } else {
            return 0;
        }
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

    // fonction de recherche des affectations
    public function search_affectation($Candidat, $Composition, $spec, $emploi, $special = false) {

        if ($this->input->post() == true) {
            $Candidat = $this->sf->escape_like_str($Candidat);
            $spec = $this->sf->escape_like_str($spec);
            $Composition = $this->sf->escape_like_str($Composition);
            $emploi = $this->sf->escape_like_str($emploi);


            $sql = "SELECT DISTINCT tbaf_admis.FC_CAND_NUM,PA_EMPLOI_LIB, tbaf_admis.FC_CAND_COMPO_NUM, FC_NOM,FC_PRENOMS,s1.libelle,LIB_CAB,LIB_DG,LIB_DC,LIB_SD,LIB_SC,PA_EMPLOI_CODE,LIB_SPREF, Case When (length(tbaf_admis.FC_CAND_NUM) > 7) Then MATRICULE_AGENT Else MATRICULE_BACK End As MATRICULE_AGENT, DATE_PSERVICE,AFF_REFUSER,s2.libelle as libelle_refuser, tbpa_emp_option.PA_EMP_OPTION_LIB as emploi_option
			 FROM tbaf_admis

			 LEFT JOIN emploi ON PA_EM=PA_EMPLOI_CODE
			 LEFT JOIN tbpa_emp_option ON tbaf_admis.PA_EMP_OPTION_CODE=tbpa_emp_option.PA_EMP_OPTION_CODE
			 LEFT JOIN structure as s1 ON PA_STRUCT_COD=s1.code
			 LEFT JOIN tmp_pserv_webdata ON (tmp_pserv_webdata.FC_CAND_COMPO_NUM=tbaf_admis.FC_CAND_COMPO_NUM and tmp_pserv_webdata.FC_CAND_NUM=tbaf_admis.FC_CAND_NUM)
			 LEFT JOIN tbaf_cabinet ON tbaf_cabinet.CODE_CAB=tmp_pserv_webdata.CODE_CAB
			 LEFT JOIN tbaf_direction_gle ON tbaf_direction_gle.CODE_DG=tmp_pserv_webdata.CODE_DG
			 LEFT JOIN tbaf_direction_centre ON tbaf_direction_centre.CODE_DC=tmp_pserv_webdata.CODE_DC
			 LEFT JOIN tbaf_sdirection ON tbaf_sdirection.CODE_SD=tmp_pserv_webdata.CODE_SD
			 LEFT JOIN tbaf_service ON tbaf_service.CODE_SC=tmp_pserv_webdata.CODE_SC
			 LEFT JOIN tbaf_spref ON tbaf_spref.CODE_SPREF=tmp_pserv_webdata.CODE_VILLE
			 LEFT JOIN drh on (MATRICULE_DRH=agentmatricule and active=1)
			 LEFT JOIN structure as s2 ON drh.code=s2.code
			 WHERE  tbaf_admis.FC_CAND_COMPO_NUM Not in ('AR 2017/01348') and tbaf_admis.FC_CAND_COMPO_NUM not in (select FC_CAND_COMPO_NUM from TMP_SUPAFFECT )";

            if (!empty($Candidat)) {
                $sql .= " AND tbaf_admis.FC_CAND_NUM LIKE '%$Candidat%'";
            }
            if (!empty($spec)) {
                $sql .= " AND (FC_NOM LIKE  '%$spec%' OR CONCAT( FC_NOM,' ', FC_PRENOMS ) LIKE  '%$spec%')";
            }
            if (!empty($Composition)) {
                $sql .= " AND tbaf_admis.FC_CAND_COMPO_NUM LIKE  '%$Composition%'";
            }
            if (!empty($emploi)) {
                $sql .= " AND tbaf_admis.PA_EMPLOI_CODE LIKE '$emploi'";
            }
            $sql .= " ORDER BY FC_NOM,FC_PRENOMS ASC ";

            $res_aff = $this->sf->query($sql);

            if ($special) {

                $data = $res_aff;
            } else {
                $data = $res_aff->result();
            }

            return $data;
        }
    }

    // fonction de recuperation de matricule
    public function recup_mat($Composition, $datenaiss, $datepserv, $special = false) {
        if ($this->input->post() == true) {

            $Composition = $this->sf->escape_str($Composition);
            $datenaiss = $this->sf->escape_str($datenaiss);
            $datepserv = $this->sf->escape_str($datepserv);
            //var_dump($Composition, $datenaiss, $datepserv); die();
            $sql = "SELECT DISTINCT `MATRICULE_AGENT` as matricule,`tmp_pserv_webdata`.`FC_CAND_COMPO_NUM` as numcomp, PA_EMPLOI_LIB as emploi, `FC_NOM` as nom, `FC_PRENOMS` as prenoms, DATE_PSERVICE FROM `tmp_pserv_webdata` inner JOIN tbaf_admis ON tmp_pserv_webdata.`FC_CAND_COMPO_NUM`= tbaf_admis.`FC_CAND_COMPO_NUM`
LEFT JOIN emploi ON PA_EM=`PA_EMPLOI_CODE` WHERE tmp_pserv_webdata.`FC_CAND_COMPO_NUM`='" . $Composition . "' AND `FC_CAND_NAISS`='" . $datenaiss . "' AND `DATE_PSERVICE`='" . $datepserv . "'";

            $res_mat = $this->sf->query($sql);

            if ($special) {
                $data = $res_mat;
            } else {
                $data = $res_mat->result();
            }

            return $data;
        }
    }

     public function search_disposition($Candidat, $spec, $emploi, $special = false) {
          if ($this->input->post() == true) {
               $Candidat = $this->sf->escape_like_str($Candidat);
               $spec = $this->sf->escape_like_str($spec);
               $emploi = $this->sf->escape_like_str($emploi);

               $sql_tmp_dispo = "Select Distinct tmp_disposition.MATRICULE, CE_AGT_NOM As FC_NOM, CONCAT_WS(' ', CE_AGT_PREN, CE_AGT_NOMJFIL)As FC_PRENOMS, PA_EMPLOI_LIB, libelle, LIB_CAB, LIB_DG, LIB_DC, LIB_SD, LIB_SC, LIB_SPREF, Concat_ws('/',  Left(DATE_PRISE_SERVICE,2),  Right(Left(DATE_PRISE_SERVICE,5),2), Right(Left(DATE_PRISE_SERVICE,10),4) ) As DATE_PSERVICE, CONCAT_WS(' ', CE_AGT_NOM, CE_AGT_PREN) As NOM_PRENOMS
                            From tmp_disposition Inner Join tbce_agt On tmp_disposition.MATRICULE = tbce_agt.CE_AGT_MAT
							                     Left Outer Join  emploi ON tbce_agt.CE_AGT_EMPLOI=emploi.PA_EM
												 Left Join structure On tmp_disposition.STRUCT_DEST =structure.code
												 LEFT JOIN tbaf_cabinet ON tbaf_cabinet.CODE_CAB=tmp_disposition.CODE_CAB_AGT_DEST
												 Left Join tbaf_direction_gle On tbaf_direction_gle.CODE_DG=tmp_disposition.CODE_DG_AGT_DEST
			                                     Left Join tbaf_direction_centre On tbaf_direction_centre.CODE_DC=tmp_disposition.CODE_DC_AGT_DEST
			                                     Left Join tbaf_sdirection On tbaf_sdirection.CODE_SD=tmp_disposition.CODE_SD_AGT_DEST
			                                     Left Join tbaf_service On tbaf_service.CODE_SC=tmp_disposition.CODE_SC_AGT_DEST
			                                     Left Join tbaf_spref On tbaf_spref.CODE_SPREF=tmp_disposition.CODE_VILLE
							Where /*ETAT_AGT = 0 And POSITION = 1 And */(ETAT_DPCE = 1) ";

               if (!empty($Candidat)) {
                    $sql_tmp_dispo .= " AND tmp_disposition.MATRICULE = '$Candidat' ";
               }
               if (!empty($spec)) {
                    $sql_tmp_dispo .= " AND (CE_AGT_NOM LIKE  '%$spec%' OR CONCAT( CE_AGT_NOM,' ', CE_AGT_PREN ) LIKE  '%$spec%')";
               }
               if (!empty($emploi)) {
                    $sql_tmp_dispo .= " AND tbce_agt.CE_AGT_EMPLOI LIKE '$emploi' ";
               }

               $sql_tmp_dispo .= "Order By CE_AGT_NOM, CE_AGT_PREN, tmp_disposition.MATRICULE ASC ";

               $res_dispo = $this->sf->query($sql_tmp_dispo);

               if ($special) {

                    $data = $res_dispo;
               } else {
                    $data = $res_dispo->result();
               }

               return $data;
          }
     }

}

?>