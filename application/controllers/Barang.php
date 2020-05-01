<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_m');
        $this->load->model('Role_m');
        $this->load->model('Barang_m');
    }

    public function index() {
    	$user = $this->Barang_m->get_all();

    	$this->template->load('pages/barang/index', ['data' => $user]);
    }
    public function index_ajax() {
        $this->template->load('pages/barang/index_ajax');
    }

    public function get_data() {
        $barang = $this->Barang_m->get_all();

        $return['data'] = [];
        $no = 1;
        foreach ($barang as $value) {
            $value->no = $no;
            $value->image = '<img src="' . base_url('assets/img/barang/') . $value->image . '" width="100">';
            $value->action = '<button class="btn btn-warning" onclick="edit(' . $value->id . ')">Edit</button>&nbsp;'
                    . '<button class="btn btn-danger" onclick="remove(' . $value->id . ')">Delete</button>';
            array_push($return['data'], $value);
            $no++;
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($return));
    }

    public function create(){
        $barang = $this->Barang_m->get_all();
        $this->template->load('pages/barang/create', ['barang' => $barang]);
    }

    public function store(){
    	$post = $this->input->post();

        $config['upload_path']         = 'assets/img/barang/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg'; // jenis file
        $config['max_size']             = 3000;
        $config['max_width']            = 3000;
        $config['max_height']           = 3000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) //sesuai dengan name pada form 
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload Gagal!</div>');
            redirect('barang');
        } else {
            //tampung data dari form
            $file = $this->upload->data();
            $gambar = $file['file_name'];
            $kode = $this->input->post('kode');
            $name = $this->input->post('name');
            $type = $this->input->post('type');
            $brand = $this->input->post('brand');
            $file = $this->upload->data();

            $data = array(
                'kd_brg' => $kode,
                'name' => $name,
                'type' => $type,
                'brand' => $brand,
                'image' => $gambar
            );
            $this->Barang_m->input_data($data, 'barang');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success!</div>');
            redirect('barang');
        }
    	

    	$result = $this->Barang_m->insert($post);
    	if ($result){
    		redirect('barang');
    	}
    }

    public function edit($id){
    	$barang = $this->Barang_m->get_by_id($id);
    	// $role = $this->Role_m->get_all();

    	$this->template->load('pages/barang/edit', ['data' => $barang]);
    }

    public function update ($id) {
    	$post = $this->input->post();

    	$result = $this->Barang_m->update($id, $post);
    	if ($result) {
    		redirect('barang');
    	}
    }

    public function delete($id){
    	$result = $this->Barang_m->delete($id);
    	if ($result) {
    		redirect('barang');
    	}
    }

    public function insertdata()
    {
        $config['upload_path']         = 'assets/img/barang/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg'; // jenis file
        $config['max_size']             = 10000;
        $config['max_width']            = 3000;
        $config['max_height']           = 3000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) //sesuai dengan name pada form 
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload Gagal!</div>');
            redirect('barang');
        } else {
            //tampung data dari form
            $file = $this->upload->data();
            $gambar = $file['file_name'];
            $kode = $this->input->post('kode');
            $name = $this->input->post('name');
            $type = $this->input->post('type');
            $brand = $this->input->post('brand');
            $file = $this->upload->data();

            $data = array(
                'kode' => $kode,
                'name' => $name,
                'type' => $isi,
                'brand' => $brand,
                'image' => $gambar
            );
            $this->Barang_m->input_data($data, 'barang');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success!</div>');
            redirect('barang');
        }
    }
    

 }