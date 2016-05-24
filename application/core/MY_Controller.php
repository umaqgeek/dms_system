<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

   function __construct()
    {
        parent::__construct();
		$unlocked = array('main', 'users');

				if ( ! $this->simpleloginsecure->is_logged_in() OR ! in_array(strtolower(get_class($this)), $unlocked))
				{
                                    $this->session->set_flashdata('error', 'Access denied!');
					redirect('main');
				}/*elseif($this->simpleloginsecure->is_logged_in() AND  in_array(strtolower(get_class($this)), $unlocked)){
					redirect('admin/');
				}*/

				//$this->output->cache(5);
    }

}