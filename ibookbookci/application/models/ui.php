<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ui extends CI_Controller {
	public $skin = 'default';
	
	function __construct(){
		parent::__construct();
	}
	
	function load(){
		$this->view($skin.'/header');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */