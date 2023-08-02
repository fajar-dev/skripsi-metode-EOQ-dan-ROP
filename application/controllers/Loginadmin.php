<?php
class Loginadmin extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_padmin');
    }
    function index(){
        $this->load->view('login');
    }
    function auth(){
        $user_username=strip_tags(str_replace("'", "", $this->input->post('user_username',TRUE)));
        $user_password=strip_tags(str_replace("'", "", $this->input->post('user_password',TRUE)));
        $cadmin=$this->m_padmin->cekadminlogin($user_username,$user_password);
        if($cadmin->num_rows() > 0){
            $xcadmin=$cadmin->row_array();
            $newdata = array(
                'user_id'   => $xcadmin['user_id'],
                'user_username'   => $xcadmin['user_username'],
                'user_nama'   => $xcadmin['user_nama'],
                'user_role'      => $xcadmin['user_role'],
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            redirect(); 
        }else{
            redirect('loginadmin/gagallogin'); 
        }
    }


    function gagallogin(){
        $url=base_url();
        echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
        redirect($url);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url();
        redirect($url);
    }
}