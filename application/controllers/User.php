<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_m');
        $this->load->model('Role_m');
    }
    public function index() {
    	$user = $this->User_m->get_all();

    	$this->template->load('pages/user/index', ['data' => $user]);
    }
  	public function create(){
  		$role = $this->Role_m->get_all();
  		$this->template->load('pages/user/create', ['role' => $role]);
  	}

    public function store(){
    	$post = $this->input->post();
    	$post['password'] = hash('sha12', $post['password']);

    	$result = $this->User_m->insert($post);
    	if ($result){
    		redirect('user');
    	}
    }

    public function edit($id){
    	$user = $this->User_m->get_by_id($id);
    	$role = $this->Role_m->get_all();

    	$this->template->load('pages/user/edit', ['data' => $user, 'role' => $role]);
    }

    public function update ($id) {
    	$post = $this->input->post();

    	$result = $this->User_m->update($id, $post);
    	if ($result) {
    		redirect('user');
    	}
    }

    public function delete($id){
    	$result = $this->User_m->delete($id);
    	if ($result) {
    		redirect('user');
    	}
    }

 }