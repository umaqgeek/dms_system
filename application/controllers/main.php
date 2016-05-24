<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{
        var $parent_page = "main";
	function __construct()
	{
            parent::__construct(); 
	}
        
        private function viewpage($page='v_main', $data=array())
        {
            
            // check for the flashdata
            if ($this->session->flashdata('error') != "")
                $data['error'] = $this->session->flashdata('error');
            if ($this->session->flashdata('sucess') != "")
                $data['sucess'] = $this->session->flashdata('sucess');
            if ($this->session->flashdata('info') != "")
                $data['info'] = $this->session->flashdata('info');

            echo $this->load->view('v_header', $data, true);
            echo $this->load->view($this->parent_page.'/v_menu', $data, true);
            echo $this->load->view($this->parent_page.'/'.$page, $data, true);
            echo $this->load->view('v_footer', $data, true);
        }


        public function index()
	{
            $this->viewpage();
	}
        
        public function login()
        {
            $this->viewpage('v_login');
        }
        
        public function registration()
        {
            $this->viewpage('v_register');
        }
        
        function register_process()
        {
            $data_u = $this->input->post();
            foreach ($data_u as $u) {
                if ($u == '' || $u == NULL || empty($u)) {
                    $this->session->set_flashdata('error', 'Don\'t leave blank!');
                    redirect(site_url('main/registration'));
                } 
            }
            $u_id = $this->m_conndb->add('users1', $data_u);
            if ($u_id) {
                $this->session->set_flashdata('sucess', 'Registration success. Now you can login.');
                redirect(site_url('main/login'));
            } else {
                $this->session->set_flashdata('error', 'Registration failed!');
                redirect(site_url('main/registration'));
            }
        }
        
        public function listDocuments()
        {
            $sql = "SELECT * "
                    . "FROM document_type dt, "
                    . "document_class dc, users1 u, documents1 d "
                    . "LEFT JOIN mukim m ON m.m_id = d.m_id "
                    . "LEFT JOIN state s ON s.s_id = d.s_id "
                    . "WHERE d.dt_id = dt.dt_id "
                    . "AND d.dc_id = dc.dc_id "
                    . "AND d.u_id = u.u_id "
                    . "AND d.dc_id = 2 "
                    . "ORDER BY d.d_datetime DESC ";
            $data['document'] = $this->m_conndb->getQuery($sql);
            $this->viewpage('v_pub_doc', $data);
        }
        
        function checklogin()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $bol_login = $this->simpleloginsecure->login($username, $password);
            
            if ($bol_login) {
                redirect(site_url('users'));
            } else {
                $this->session->set_flashdata('error', 'Invalid login!');
                redirect(site_url('main/login'));
            }
        }
        
        function logout()
        {
            $this->simpleloginsecure->logout();
            redirect(site_url('main'));
        }
}
