<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Connex_mod extends CI_Model {             
        public function __construct(){
            parent::__construct(); 
            //$this->load->database();
        }
        
        // VALIDATION DE FORMULAIRE
        public function form_val($config) {            
            $this->form_validation->set_rules($config);
            
            if($this->form_validation->run() == FALSE){
                return 1;
            }
            else{
                return 0;
            }
        }
        
         // verifier l'existence d'un enregistrement
        public function exist($table,$cond) {           
            $query = $this->db->get_where($table, $cond);

            if($query->num_rows() > 0){
                 return 1;
            }else{
                 return 0;
            }
        }
        
        // requete de projection en tableau avec condition et limite
        public function read_result($table,$cond,$orderby,$limit) {           
            $this->db->select("*")
                        ->from($table)
                            ->where($cond)
                                ->order_by($orderby[0],$orderby[1])
                                    ->limit($limit);
            
            $query = $this->db->get();

            if($query->num_rows() > 0){
                 $data = $query->result_array();
                 return $data;
            }else{
                 return 0;
            }
        }
        
         // requete de selection 
        public function readliste($table) {
            $query = $this->db->get($table);

            if($query->num_rows() > 0){
                 $data = $query->result_array();
                 return $data;
            }else{
                 return 0;
            }
        }
        
        public function read_row_l($table,$cond,$orderby,$limit) {           
            $this->db->select("*")
                        ->from($table)
                            ->where($cond)
                                ->order_by($orderby[0],$orderby[1])
                                    ->limit($limit);
            
            $query = $this->db->get();

            if($query->num_rows() > 0){
                 $data = $query->row_array();
                 return $data;
            }else{
                 return 0;
            }
        }
        
        // requete de projection d'une ligne
        public function read_row($table,$cond) {           
            $query = $this->db->get_where($table, $cond);

            if($query->num_rows() > 0){
                 $data = $query->row_array();
                 return $data;
            }else{
                 return 0;
            }
        }
        
        // requete avec jointure
        public function do_join_row($projection,$table_from,$jointure,$cond) {
//            $t='';
            $this->db->select($projection);
            $this->db->from($table_from);
            
//            foreach ($jointure as $val){
//               $this->db->join($val[0],$val[1],$val[2]); 
//            }                        
//            print_r($t); exit;
            $this->db->join($jointure[0],$jointure[1],$jointure[2]); 
            $this->db->where($cond);          
            
            $query = $this->db->get();
//             print_r($query); exit;

            if($query->num_rows() > 0){
                 $data = $query->row_array();
                 return $data;
            }else{
                 return 0;
            }
        }
        
        // requete avec jointure
        public function do_join_limit($projection,$table_from,$jointure,$cond,$orderby,$limit) {
            $this->db->select($projection);
            $this->db->from($table_from);
            
            foreach ($jointure as $val){
               $this->db->join($val[0],$val[1],$val[2]); 
            }                        
            
            $this->db->where($cond);
            $this->db->order_by($orderby[0],$orderby[1]);
            $this->db->limit($limit);
            
            $query = $this->db->get();

            if($query->num_rows() > 0){
                 $data = $query->result_array();
                 return $data;
            }else{
                 return 0;
            }
        }
        
        // insertion
        public function insertion($table,$data) {
            $this->db->insert($table, $data);
            $query = $this->db->affected_rows();
            
            if($query > 0){              
                 return 1;
            }else{
                 return 0;
            }
        }
        
        // insertion dans différentes tables
//        public function multi_insertion($table,$data) {
//          
//        }
        
    }
?>