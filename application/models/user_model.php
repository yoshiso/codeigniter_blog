<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    
    private $table_name = "user";

    function __construct()
    {
        parent::__construct();
    }

    public function all(){
        $this->db->from($this->table_name);
        $this->db->select('*');
        $ret = $this->db->get();
        return $ret->result();
    }

    public function get($id){
        $this->db->from($this->table_name);
        $this->db->where(array('id' => $id));
        $ret = $this->db->get();
        return $ret->result()[0];
    }

    public function ins(array $data)
    {
        $ret = $this->db->insert($this->table_name, $data);
        return $ret;
    }

    public function del()
    {
        $ret = $this->db->truncate($this->table_name);
        return $ret;
    }
}