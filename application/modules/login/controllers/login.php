<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Login extends MY_Controller {
    
    function __construct()
	{
		parent::__construct();
		//$this->template->write_view('sidenavs', 'template/default_sidenavs', true);
        //$this->template->write_view('navs', 'template/default_topnavs.php', true);
        $this->load->model('Login_model');
    }

	function index() {
        $this->template->set_template('login');
		$this->template->write('title', 'BPKP 2020 SIK', TRUE);
		$this->template->write('header', 'Page Example');
		$this->template->write_view('content', 'login', '', true);
		$this->template->render();
    }
    
    function auth()
    {
        //die("hello");
        $email = $this->input->post('email',TRUE);
        $password = md5($this->input->post('password',TRUE));
        //print_r($email);die();
        $validate = $this->Login_model->validate($email,$password);
        //print_r($validate);die();
        if($validate->num_rows() > 0 )
        {
            $data = $validate->row_array();
            $name = $data['user_name'];
            $email = $data['user_email'];
            $level = $data['user_level'];
            $sesdata = array(
                'username'  => $name,
                'email'     => $email,
                'level'     => $level,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);

            //print_r($sesdata);die();
            // access login for admin
            if($level === '1'){
                
                redirect('site');
     
            }
        }else{
            echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            redirect('login');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
    
}