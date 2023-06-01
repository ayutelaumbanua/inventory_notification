<?php

class M_login extends CI_Model {

    function query_validasi_username($username) {
        $sql = "SELECT * FROM user WHERE username = ? LIMIT 1";
        $result = $this->db->query($sql, array($username));
        return $result;
    }

    function query_validasi_password($username, $password) {
        $sql = "SELECT * FROM user WHERE username = ? LIMIT 1";
        $result = $this->db->query($sql, array($username));
        $user = $result->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return null;
        }
    }

}
