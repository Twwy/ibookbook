<?php
/*****************************************************
** 文 件 名：豆瓣图书类
** 功能描述：从豆瓣获取图书信息
** 作    者：Twwy
** 日    期：2011/9/26
** 修 改 人：-
** 日    期：-
********************************************************/
class douban {
		
	public function search($searchKey, $start = 1, $result = 10){
		$bookCatch = curl_init();
		curl_setopt ($bookCatch, CURLOPT_URL, "http://api.douban.com/book/subjects?q={$searchKey}&start-index={$start}&max-results={$result}");
		curl_setopt($bookCatch, CURLOPT_RETURNTRANSFER, 1);
		$xml = curl_exec($bookCatch);
		curl_close($bookCatch);
		$p = xml_parser_create();
		xml_parse_into_struct($p, $xml, $value, $index);
		xml_parser_free($p);
		$resultArray = Array();
		$totalNum = count($index['ID']);
		$booksStart = $value[$index['OPENSEARCH:STARTINDEX'][0]]['value'];
		$booksMax = $value[$index['OPENSEARCH:TOTALRESULTS'][0]]['value'];
		$resultArray['result'] = $totalNum;
		$resultArray['total'] = $booksMax;
		$resultArray['index'] = $booksStart;
		$resultArray['content'] = Array();
		$sign = 0;
		$imgSign = 0;
		$AttrSign = 0;
		for($i = 0; $i < $totalNum; $i++){
			$id = explode('/', $value[$index['ID'][$i]]['value']);
			$resultArray['content'][$i]['id'] = $id[count($id) - 1];  //获取ID号
			$resultArray['content'][$i]['title'] = $value[$index['TITLE'][$i + 1]]['value'];
			if($i + 1 != $totalNum){
				for($j = 0; $index['LINK'][$imgSign] < $index['ID'][$i + 1]; $j++){
					if($value[$index['LINK'][$imgSign]]['attributes']['REL'] == 'image'){
						$resultArray['content'][$i]['img'] = $value[$index['LINK'][$imgSign]]['attributes']['HREF'];
					}
					$imgSign++;	
				}
				if(array_key_exists('DB:ATTRIBUTE', $index) && $index['DB:ATTRIBUTE'][$AttrSign] < $index['ID'][$i + 1]){
					for($j = 0; $index['DB:ATTRIBUTE'][$AttrSign] < $index['ID'][$i + 1]; $j++){
						if($value[$index['DB:ATTRIBUTE'][$AttrSign]]['attributes']['NAME'] == 'publisher'){
							$resultArray['content'][$i]['publisher'] = $value[$index['DB:ATTRIBUTE'][$AttrSign]]['value'];
						}
						if($value[$index['DB:ATTRIBUTE'][$AttrSign]]['attributes']['NAME'] == 'pubdate'){
							$resultArray['content'][$i]['pubdate'] = $value[$index['DB:ATTRIBUTE'][$AttrSign]]['value'];
						}
						if($value[$index['DB:ATTRIBUTE'][$AttrSign]]['attributes']['NAME'] == 'author'){
							if(empty($resultArray[$i]['author'])){
								$resultArray['content'][$i]['author'] = $value[$index['DB:ATTRIBUTE'][$AttrSign]]['value'];
							}else{
								$resultArray['content'][$i]['author'] .= '|'.$value[$index['DB:ATTRIBUTE'][$AttrSign]]['value'];
							}
						}
						$AttrSign++;
					}
				}
			}else{
				for($imgSign; $imgSign < count($index['LINK']); $imgSign++){
					if($value[$index['LINK'][$imgSign]]['attributes']['REL'] == 'image'){
						$resultArray['content'][$i]['img'] = $value[$index['LINK'][$imgSign]]['attributes']['HREF'];
					}
				}
				if(array_key_exists('DB:ATTRIBUTE', $index) && $AttrSign < count($index['DB:ATTRIBUTE'])){
					for($AttrSign; $AttrSign < count($index['DB:ATTRIBUTE']); $AttrSign++){
						if($value[$index['DB:ATTRIBUTE'][$AttrSign]]['attributes']['NAME'] == 'publisher'){
							$resultArray['content'][$i]['publisher'] = $value[$index['DB:ATTRIBUTE'][$AttrSign]]['value'];
						}
						if($value[$index['DB:ATTRIBUTE'][$AttrSign]]['attributes']['NAME'] == 'pubdate'){
							$resultArray['content'][$i]['pubdate'] = $value[$index['DB:ATTRIBUTE'][$AttrSign]]['value'];
						}
						if($value[$index['DB:ATTRIBUTE'][$AttrSign]]['attributes']['NAME'] == 'author'){
							if(empty($resultArray[$i]['author'])){
								$resultArray['content'][$i]['author'] = $value[$index['DB:ATTRIBUTE'][$AttrSign]]['value'];
							}else{
								$resultArray['content'][$i]['author'] .= '|'.$value[$index['DB:ATTRIBUTE'][$AttrSign]]['value'];
							}
						}
					}
				}
			}
		}
		return $resultArray;
	}
	
	public function view($doubanID){
		$bookCatch = curl_init();
		curl_setopt($bookCatch, CURLOPT_URL, "http://api.douban.com/book/subject/{$doubanID}");
		curl_setopt($bookCatch, CURLOPT_RETURNTRANSFER, 1);
		$xml = curl_exec($bookCatch);
		curl_close($bookCatch);
		if (!preg_match('/xml/', $xml)) return false;
		$p = xml_parser_create();
		xml_parse_into_struct($p, $xml, $value, $index);
		xml_parser_free($p);			
		$result = Array(
			'title' 		=> '',
			'subtitle' 		=> '',
			'doubanID' 		=> '',
			'image' 		=> '',
			'summary' 		=> '',
			'isbn10' 		=> '',
			'isbn13' 		=> '',
			'publisher' 	=> '',
			'pubdate'		=> '',
			'price'			=> '',
			'pages'			=> '',
			'author'		=> '',
			'translator'	=> '',
			'binding'		=> '',
			'tags'			=> ''
		);
		$result['doubanID'] = $doubanID;
		for($i = 0; $i < count($index['LINK']); $i++){
			if($value[$index['LINK'][$i]]['attributes']['REL'] == 'image'){
				$result['image'] = $value[$index['LINK'][$i]]['attributes']['HREF'];
			}
		}
		$result['summary'] = array_key_exists('SUMMARY', $index) ?  $value[$index['SUMMARY'][0]]['value'] : '';
		if(array_key_exists('DB:ATTRIBUTE', $index)){
			for($i = 0; $i < count($index['DB:ATTRIBUTE']); $i++){
				if(array_key_exists($value[$index['DB:ATTRIBUTE'][$i]]['attributes']['NAME'], $result)){
					if(empty($result[$value[$index['DB:ATTRIBUTE'][$i]]['attributes']['NAME']])){
						$result[$value[$index['DB:ATTRIBUTE'][$i]]['attributes']['NAME']] = $value[$index['DB:ATTRIBUTE'][$i]]['value'];
					}else{
						$result[$value[$index['DB:ATTRIBUTE'][$i]]['attributes']['NAME']] .= '|'.$value[$index['DB:ATTRIBUTE'][$i]]['value'];
					}
				}
			}
		}
		if(array_key_exists('DB:TAG', $index)){
			for($i = 0; $i < count($index['DB:TAG']); $i++){
				if(empty($result['tags'])){
					$result['tags'] = $value[$index['DB:TAG'][$i]]['attributes']['NAME'];
				}else{
					$result['tags'] .= '|'.$value[$index['DB:TAG'][$i]]['attributes']['NAME'];
				}
			}
		}
		if(empty($result['title'])) $result['title'] = $value[$index['TITLE'][0]]['value'];
		return $result;

	}
	
}


?>