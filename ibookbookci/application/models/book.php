<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}
	
	function insert(){
		//$this->view($skin.'/header');
	}
	
	function view($bid){
		$this->load->database();
		$result = $this->db->query("SELECT * FROM ibookbook_books WHERE BID = '{$bid}'");
		return $result->row_array();
	}
	
	function check($type = 'doubanID', $id){	//check是否存在，如果存在则返回bid，如果不存在，则进入收录后返回bid
		switch($type){
			case 'doubanID':
				$this->load->library('douban');
				$this->load->database();
				$result = $this->db->query("SELECT BID FROM ibookbook_books WHERE book_doubanID = '{$id}'");
				if($result->num_rows() > 0){
					$bid = $result->row()->BID;
				}else{
					$bookArray = $this->douban->view($id);
					if(!$bookArray) return false;
					foreach ($bookArray as $key => $value){		
						$bookArray['book_'.$key] = $value;
						unset($bookArray[$key]);
					}
					$bookArray['book_insertTime'] = time();
					$bookArray['book_lastRequireTime'] = time();
					$this->db->insert('ibookbook_books', $bookArray);					
					$bid = $this->db->insert_id();					
				}
				return $bid;
				break;
			
			case 'ISBN':
				break;
		}
	}
	
	function update(){
	}
	
	function delete(){
	}
}