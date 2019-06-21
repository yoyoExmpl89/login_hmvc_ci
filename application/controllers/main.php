<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is Example Controller
*/
class Main extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		$this->template->write_view('navs', 'template/default_topnavs.php', true);
	}
	function index() {
		$this->template->write('title', 'My Simple Template', TRUE);
		$this->template->write('header', 'Page Example');
		$this->template->write_view('content', 'test/mypage', '', true);
		$this->template->render();
	}

}