<?php
class ui {
	public 	$skin 			= 'default';
	public 	$headerData 	= Array();
	public 	$footerData 	= Array();
	public 	$login		 	= false;		//登陆状态
	public 	$title		 	= '布布网ibookbook.com';  // 标题
	public 	$hideFoot		= false;	//隐藏foot
	public 	$hideVars		= Array();  //隐藏变量以json形式存放于头部script
	public 	$script			= Array();  //加载的js文件名(不需要.js后缀)
	public 	$style			= Array();	//加载的css文件名(不需要.css后缀)
	
	function __construct(){
	}
	public function load($page, $data = Array()){
		$CI =& get_instance();
		
		$configData = Array();
		$configData['login'] 			= $this->login;
		$configData['site'] 			= site_url();
		$configData['hideFoot'] 		= $this->hideFoot;
		$this->hideVars['configData'] 	= $configData;
		$this->hideVars					= json_encode($this->hideVars);
		$this->footerData['configData'] = $configData;
		
		$configData['title'] 			= $this->title;
		$configData['script'] 			= $this->scriptToTag($this->script);
		$configData['style'] 			= $this->styleToTag($this->style);
		$configData['hideVars'] 		= $this->hideVars;  
		$this->headerData['configData'] = $configData;
		
		$CI->load->view($this->skin.'/header', $this->headerData);
		$CI->load->view($this->skin.'/'.$page, $data);
		$CI->load->view($this->skin.'/footer', $this->footerData);
	}
	
	private function scriptToTag($value){
		if(is_array($value) && count($value) >0){
			$str = '';
			$siteUrl = site_url();
			foreach($value as $ele){
				$str .= "<script src=\"{$siteUrl}script/{$ele}.js\"></script>";
			}
			return $str;
		}
		return false;
	}
	
	private function styleToTag($value){
		if(is_array($value) && count($value) >0){
			$str = '';
			$siteUrl = site_url();
			foreach($value as $ele){
				$str .= "<link href=\"{$siteUrl}style/{$ele}.css\" rel=\"stylesheet\" />";
			}
			return $str;
		}
		return false;
	}
	
}


?>