<?php

class M_login extends CI_Model{

    function query_validasi_username($username){
    	$result = $this->db->query("SELECT * FROM user WHERE username='$username' LIMIT 1");
        return $result;
    }

    function query_validasi_password($username,$password){
    	$result = $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
        return $result;
    }

} 