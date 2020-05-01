<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_m extends CI_Model {

    public function get_all() {
        $data = $this->db->get('barang')->result();

        return $data;
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insert($data) {
        $result = $this->db->insert('barang', $data);
        return $result;
    }

    public function get_by_id($id) {
        $data = $this->db->get_where('barang', array('id' => $id))->row();
        return $data;
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('barang', $data);
        return $result;
    }

    public function delete($id) {
        $result = $this->db->delete('barang', ['id' => $id]);
        return $result;
    }

}
