<?php

class Images extends CI_Model {
    
    // Constructor
    function __construct()
    {
        parent::__construct();
    }
    
    // Return all database images as an array.
    function all()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('images');
        return $query->result_array();
    }
    
    // Returns the three newest database images as an array.
    function newest()
    {
        $this->db->order_by("id", "desc");
        $this->db->limit(3);
        $query = $this->db->get('images');
        return $query->result_array();
    }
}

