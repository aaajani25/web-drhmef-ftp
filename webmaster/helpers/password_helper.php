<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/../../connexion/Password.php';

function hashAllPassword() {
    $ci = & get_instance();
    $ci->load->database();
    $sqlToGetAllUsers = 'select pswd,matricule,id_inscription as id from inscription_agent_1 where CHAR_LENGTH(pswd)<60';
    $sqlToUpdatePwd = 'update inscription_agent_1 set pswd=? where id_inscription=? ';
    $query = $ci->db->query($sqlToGetAllUsers);

    foreach ($query->result() as $index => $row) {
        if (strlen($row->pswd) < 60) {
            $hashedPass = Password::hash($row->pswd);
            $ci->db->query($sqlToUpdatePwd, [$hashedPass, $row->id]);
            echo $index . ') ' . $row->matricule . ' => ' . $row->pswd . ' => ' . $hashedPass . '<br>';
        }
    }
    die();
}

function hashAllPasswordAdmin() {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $ci = & get_instance();
    $ci->load->database();
    $sqlToGetAllUsers = 'select pswd,login,id_user as id from utilisateur';
    $sqlToUpdatePwd = 'update utilisateur set pswd=? where id_user=? ';
    $query = $ci->db->query($sqlToGetAllUsers);

    foreach ($query->result() as $index => $row) {
        $pswd = $ci->encrypt->decode($row->pswd);
        $hashedPass = NULL;
        if ($pswd) {
            $hashedPass = Password::hash($pswd);
            $ci->db->query($sqlToUpdatePwd, [$hashedPass, $row->id]);
        }
        echo $index . ') ' . $row->login . ' => ' . $pswd . ' => ' . $hashedPass . '<br>';
    }
    die();
}
