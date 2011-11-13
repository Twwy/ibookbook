<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index()
	{
		$this->ui->style 	= Array('search');
		$this->ui->script 	= Array('search');
		$this->ui->hideFoot = true;
		$this->ui->hideVars	= Array('key' => $this->input->post('key'));
		$data = Array();
		$data['key'] = $this->input->post('key');
		$this->ui->load('search', $data);
	}
}
