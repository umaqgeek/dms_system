<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller 
{
        var $parent_page = "users";
	function __construct()
	{
            parent::__construct(); 
	}
        
        private function viewpage($page='v_mainpage', $data=array())
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
        
        public function publicDocument($stat='view')
        {
            if ($stat == 'view') {
                $sql = "SELECT * "
                        . "FROM documents1 d, document_type dt, "
                        . "document_class dc, users1 u "
                        . "WHERE d.dt_id = dt.dt_id "
                        . "AND d.dc_id = dc.dc_id "
                        . "AND d.u_id = u.u_id "
                        . "AND d.dc_id = 2 ";
                $data['document'] = $this->m_conndb->getQuery($sql);
                $this->viewpage('v_pub_doc', $data);
            } else if ($stat == 'add') {
                $data['document_type'] = $this->m_conndb->getAll('document_type');
                $data['document_class'] = $this->m_conndb->getAll('document_class');
                $this->viewpage('v_puc_doc_add', $data);
            }
        }
        
        function publicDocument_process()
        {
            $upload = $this->my_func->do_upload('d_link', './assets/uploads/files/');
            if (isset($upload['upload_data']) && !empty($upload['upload_data'])) {
                $data_doc = $this->input->post();
                $sess = $this->session->all_userdata();
                $data_doc['u_id'] = $sess['u_id'];
                $data_doc['d_link'] = $upload['upload_data']['file_name'];
                $data_doc['d_size'] = $upload['upload_data']['file_size'];
                $data_doc['d_datetime'] = date('Y-m-d H:i:s');
                $data_doc['d_status'] = 1;
                $data_doc['dc_id'] = 2;
                $data_doc['dt_id'] = ($upload['upload_data']['is_image'] == 1) ? (2) : (1);
                $d_id = $this->m_conndb->add('documents1', $data_doc);
                if ($d_id) {
                    $this->session->set_flashdata('sucess', 'Add sucess.');
                    redirect(site_url('users/publicDocument'));
                } else {
                    $this->session->set_flashdata('error', 'Opss! Cannot add your document.');
                    redirect(site_url('users/publicDocument/add'));
                }
            } else {
                $error = $upload['error'];
                $this->session->set_flashdata('error', 'Opss! Error: ' . $error);
                redirect(site_url('users/publicDocument/add'));
            }
        }
        
        function publicDocument_delete($d_idx='-1') 
        {
            if ($d_idx != '-1') {
                $d_id = $this->my_func->custom_decrypt($d_idx);
                $doc = $this->m_conndb->get('documents1', 'd_id', $d_id);
                if (isset($doc) && !empty($doc)) {
                    $img = $doc[0]->d_link;
                    unlink("./assets/uploads/files/".$img);
                    $dt_id = $doc[0]->dt_id;
                    if ($dt_id == 2) {
                        $imgs = explode(".", $img);
                        unlink("./assets/uploads/files/".$imgs[0]."_thumb.".$imgs[1]);
                    }
                    $this->m_conndb->delete('documents1', 'd_id', $doc[0]->d_id);
                }
            }
            redirect(site_url('users/publicDocument'));
        }
        
        function privateDocument_delete($d_idx='-1') 
        {
            if ($d_idx != '-1') {
                $d_id = $this->my_func->custom_decrypt($d_idx);
                $doc = $this->m_conndb->get('documents1', 'd_id', $d_id);
                if (isset($doc) && !empty($doc)) {
                    $img = $doc[0]->d_link;
                    unlink("./assets/uploads/files/".$img);
                    $dt_id = $doc[0]->dt_id;
                    if ($dt_id == 2) {
                        $imgs = explode(".", $img);
                        unlink("./assets/uploads/files/".$imgs[0]."_thumb.".$imgs[1]);
                    }
                    $this->m_conndb->delete('documents1', 'd_id', $doc[0]->d_id);
                }
            }
            redirect(site_url('users/privateDocument'));
        }
        
        function changeDocument($dc_id=1, $d_idx='-1') 
        {
            if ($d_idx != '-1') {
                $d_id = $this->my_func->custom_decrypt($d_idx);
                $doc = $this->m_conndb->get('documents1', 'd_id', $d_id);
                if (isset($doc) && !empty($doc)) {
                    $d_id = $doc[0]->d_id;
                    $dc_id = $doc[0]->dc_id;
                    $dc_id_new = ($dc_id == 1) ? (2) : (1);
                    $data_d = array(
                        'dc_id' => $dc_id_new
                    );
                    $this->m_conndb->edit('documents1', 'd_id', $d_id, $data_d);
                }
            }
            if ($dc_id == 1) {
                redirect(site_url('users/privateDocument'));
            } else {
                redirect(site_url('users/publicDocument'));
            }
        }
        
        public function privateDocument($stat='view')
        {
            if ($stat == 'view') {
                $sess = $this->session->all_userdata();
                $u_id_sess = $sess['u_id'];
                $sql = "SELECT * "
                        . "FROM documents1 d, document_type dt, "
                        . "document_class dc, users1 u "
                        . "WHERE d.dt_id = dt.dt_id "
                        . "AND d.dc_id = dc.dc_id "
                        . "AND d.u_id = u.u_id "
                        . "AND d.dc_id = 1 "
                        . "AND d.u_id = '".$u_id_sess."' ";
                $data['document'] = $this->m_conndb->getQuery($sql);
                $this->viewpage('v_pri_doc', $data);
            } else if ($stat == 'add') {
                $data['document_type'] = $this->m_conndb->getAll('document_type');
                $data['document_class'] = $this->m_conndb->getAll('document_class');
                $this->viewpage('v_pri_doc_add', $data);
            }
        }
        
        function privateDocument_process()
        {
            $upload = $this->my_func->do_upload('d_link', './assets/uploads/files/');
            if (isset($upload['upload_data']) && !empty($upload['upload_data'])) {
                $data_doc = $this->input->post();
                $sess = $this->session->all_userdata();
                $data_doc['u_id'] = $sess['u_id'];
                $data_doc['d_link'] = $upload['upload_data']['file_name'];
                $data_doc['d_size'] = $upload['upload_data']['file_size'];
                $data_doc['d_datetime'] = date('Y-m-d H:i:s');
                $data_doc['d_status'] = 1;
                $data_doc['dc_id'] = 1;
                $data_doc['dt_id'] = ($upload['upload_data']['is_image'] == 1) ? (2) : (1);
                $d_id = $this->m_conndb->add('documents1', $data_doc);
                if ($d_id) {
                    $this->session->set_flashdata('sucess', 'Add sucess.');
                    redirect(site_url('users/privateDocument'));
                } else {
                    $this->session->set_flashdata('error', 'Opss! Cannot add your document.');
                    redirect(site_url('users/privateDocument/add'));
                }
            } else {
                $error = $upload['error'];
                $this->session->set_flashdata('error', 'Opss! Error: ' . $error);
                redirect(site_url('users/privateDocument/add'));
            }
        }
}
