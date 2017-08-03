<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends CI_Model {

        public $id;
        public $title;
        public $description;

        public function __construct()
        {
                parent::__construct();
        }

        public function get_tags()
        {
                $offset = $_GET['offset'];
                $limit = $_GET['limit'];
                $query = $this->db->get('tags', $limit, $offset);
                return $query->result();
        }

        public function get_tags_count()
        {
                return $this->db->count_all('tags');
        }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->description  = $_POST['description'];

                $this->db->insert('tags', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->description  = $_POST['description'];

                $this->db->update('tags', $this, array('id' => $_POST['id']));
        }

}