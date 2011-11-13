<div class="span-24 search-left-top">
关键词:<span id="search_key"><?php //echo $searchKey;?></span>
</div>
<div class="span-9 search-left">
	<?php if(empty($key)){?>
	关键字为空
	<?php }else{?>
	<?php } ?>
	<?php
	/*
		$resultListContent = $resultList['content'];
		for($i = 0; $i < $resultList['result']; $i++){
			if(!array_key_exists('id',$resultListContent[$i])) $resultListContent[$i]['id'] = '暂无';
			if(!array_key_exists('title',$resultListContent[$i])) $resultListContent[$i]['title'] = '暂无';
			if(!array_key_exists('author',$resultListContent[$i])) $resultListContent[$i]['author'] = '暂无';
			if(!array_key_exists('publisher',$resultListContent[$i])) $resultListContent[$i]['publisher'] = '暂无';
			if(!array_key_exists('pubdate',$resultListContent[$i])) $resultListContent[$i]['pubdate'] = '暂无';
			$displayContent = '';
			$displayContent .= '<div class="span-9 search-left-result">';
			$displayContent .= '<div class="span-3">';
			$displayContent .= "<img src=\"{$resultListContent[$i]['img']}\"></div>";
			$displayContent .= '<div class="span-6 last">';
			$displayContent .= "<b>{$resultListContent[$i]['title']}</b><br/>";
			$displayContent .= '作者:'.$resultListContent[$i]['author'].'<br/>';
			$displayContent .= "出版社:{$resultListContent[$i]['publisher']}<br/>";
			$displayContent .= "出版日期:{$resultListContent[$i]['pubdate']}<br/>";
			$displayContent .= "</div><input type=\"hidden\" value=\"{$resultListContent[$i]['id']}\"></div>";
			echo $displayContent;
		}
		if($resultList['result'] + $resultList['index'] >= $resultList['total']){
			$showBool = 'none';
		}else{
			$showBool = 'block';
		}*/
	?>
	<div class="span-9 search-left-result" id="searchResult">
		<div class="span-3" class="result-img">
			<img src="http://img3.douban.com/pics/book-default-small.gif" />
		</div>
		<div class="span-6 last">
			<b class="result-title">暂无</b><br />
			作者:<span class="result-author">暂无</span><br />
			出版社:<span class="result-publisher">暂无</span><br />
			出版日期:<span class="result-pubdate">暂无</span><br />
		</div>
		<input type="hidden" value="" />
	</div>
	<div class="span-9 search-left-more">
		共<span id="total_num"><?php //echo $resultList['total'];?></span>本书,
		已显示<span id="ready_num"><?php //echo $resultList['result'];?></span>本,点击显示更多
	</div>
</div>
<div class="span-15 last">
	推荐块。。。
	<div class="span-15 search-right-box">
		<div class="span-15 search-right-box-top">
			<span class="search-right-box-title">读取中...</span>
			<div class="search-right-box-close">关闭&nbsp;×</div>
		</div>
		<div class="span-15 search-right-box-content">
			<div class="span-14 search-right-box-info">
				<div class="span-6 search-right-box-img"></div>
				<div class="span-8 search-right-box-detail last">
				</div>
				<div class="span-14 search-right-box-do">
					<div class="span-7 search-right-box-want">
						<span>我有书</span>
						<div class="search-right-box-wantdo" style="margin-right:10px;" id="lend_button">
							共享
						</div>
						<div class="search-right-box-wantdo last">
							出售
						</div>
					</div>
					<div class="span-7 search-right-box-wantNo last" id="searchRightBoxStore">
						<span>我没书</span>
					</div>
				</div>
				<div class="span-14 search-right-box-doMain" id="book_lend">
					<div class="search-right-box-doMainLeft">再添加一本共享</div>
					<div class="search-right-box-doMainRight">已登记的书</div>
					<div class="search-right-box-doMainContent" id="firstShareAdd">添加共享</div>
				</div>
				<div class="span-14 search-right-box-doMain" id="book_store">
					csadas
				</div>
				<hr class="space"/>
				<div class="span-14 search-right-box-summary last">
				</div>
			</div>
		</div>
	</div>
</div>