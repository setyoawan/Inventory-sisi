<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Template {

    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct() {
        // Assign the CodeIgniter super-object
        $this->CI = &get_instance();
        $this->CI->load->model('menu_m');
    }

    public function load($view_file_name, $data_array = array()) {
        $menu = ['menu' => $this->get_menu_by_role()];
        $this->CI->load->view("templates/header", $menu);
        $this->CI->load->view($view_file_name, $data_array);
        $this->CI->load->view("templates/footer");
    }

    public function get_menu() {
        $parent = $this->CI->menu_m->get_parent();
        $child = $this->CI->menu_m->get_child();
        
        foreach ($parent as $key => $value) {
            $parent[$key]['child'] = [];
            foreach ($child as $v) {
                if ($value['id'] == $v['parent']) {
                    array_push($parent[$key]['child'], $v);
                }
            }
        }
        
        return $parent;
    }

    public function config($id){
        $role = $this->role_m->get_by_id($id);
        $menu = $this->template->get_menu();
        $role_m = $this->role_menu_m->get_privilege($id);
    }

    public function get_menu_by_role()
    {
        $role_id = $this->CI->session->userdata('role_id');
        $parent = $this->CI->menu_m->get_parent_by_role($role_id);
        $child = $this->CI->menu_m->get_child_by_role($role_id);

        foreach ($parent as $key => $value) {
            $parent [$key] ['child'] = [];
            foreach ($child as $v) {
                if ($value['id'] == $v ['parent']) {

                    array_push($parent[$key]['child'], $v);
                }
            }
        }

    return $parent;
    }


}
