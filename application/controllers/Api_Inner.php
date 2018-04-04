<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
       
    require APPPATH . 'controllers/Rest.php';
    class Api_Inner extends Rest {

        function __construct($config = 'rest') {
            parent::__construct($config);
            $this->load->database();
            $this->cektoken();
        }

        /* index page */
       function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $inner = $this->db->query('SELECT * FROM person a
                inner join Address b on a.address_id = b.id')->result();
        } else {
            $this->db->select('*');
            $this->db->from('person');
            $this->db->join('Address', 'person.address_id = Address.id');
            $this->db->where('id', $id);
            $inner = $this->db->get();
        }
        $this->response($inner, 200);
    }

        
    }
    ?>