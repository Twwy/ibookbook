<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index()
	{
		echo '404';
	}
	
	public function key($searchKey = ''){
		$this->ui->style 	= Array('search');
		$this->ui->script 	= Array('search');
		$this->ui->hideFoot = true;
		$this->ui->hideVars	= Array('key' => $searchKey);
		$data = Array();
		$data['key'] = $searchKey;
		$this->ui->load('search', $data);
	}
}
