<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judul_model extends CI_Model {
     
    private $_table = "judul_data";

    public $judul_nm;

    public function rules()
    {
        return [
            ['field' => 'judul_nm',
            'label' => 'Judul_nm',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
      return $this->db->get($this->_table)->result_array();
    }
    
    public function getById($id)
    {
      return $this->db->get_where($this->_table, ["judul_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->judul_nm = $post["judul_nm"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->judul_nm = $post["judul_nm"];
        return $this->db->update($this->_table, $this, array('judul_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("judul_id" => $id));
    }
}