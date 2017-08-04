<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

        public $id;
        public $username;
        public $password;

        public function __construct()
        {
                parent::__construct();
        }

        public function authenticate()
        {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $data = array(
                        'username' => $username,
                        'password' => $password
                );

                $this->db->get('users', 1, 0);
                $query = $this->db->get_where('users',$data);
                return $query->result();
        }
}