<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

	public function index(){
		exit('404');
	}

	public function search($key, $start = 1, $resultNum = 10){		
		$this->load->library('douban');
		$searchResult = $this->douban->search($key, $start, $resultNum);
		if($searchResult){
			echo json_encode(Array('return' => true, 'info'=> $searchResult));
		}else{
			echo json_encode(Array('return' => false, 'info'=> '搜索失败'));
		}
	}
}
