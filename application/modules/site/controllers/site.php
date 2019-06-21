<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */

class Site extends MY_Controller {

    function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('login');
		}
		$this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		$this->template->write_view('navs', 'template/default_topnavs.php', true);
	}

	function index() {
		if($this->session->userdata('level')==='1'){
			$this->template->write('title', 'My Simple Template', TRUE);
			$this->template->write('header', 'Page Example');
			$this->template->write_view('content', 'site/home', '', true);
			$this->template->render();
		}else{
			echo "Access Denied";
		}	
	}

}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */