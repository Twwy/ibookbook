
$i(document).ready(function(){
	
	/*<圆角>*/
	$i('.search-left-top').corner('top 10px');
	$i('.search-left-bottom').corner('bottom 10px');
	/*</圆角>*/
		
	resultClick();
	
	$i(".search-left-more").click(function(){
		$i.post($i('#site').val()+'do/bookSearch=' + $i("#search_key").html(),
			"start=" + parseInt(parseInt($i("#ready_num").html()) + 1) ,
			function(data){
				result = $i.parseJSON(data);
				if(result.result == true){
					var searchContent = '';
					var ready_num = parseInt(parseInt($i("#ready_num").html()) + result.info.result);
					$i("#total_num").html(result.info.total);
					$i("#ready_num").html(ready_num);
					catchContent = result.info.content;
					for(i = 0; i < catchContent.length; i++){
						searchContent += '<div class="span-9 search-left-result">';
						searchContent += '<div class="span-3">';
						searchContent += '<img src="' + catchContent[i]['img'] + '">';
						searchContent += '</div>';
						searchContent += '<div class="span-6 last">';
						searchContent += '<b>' + catchContent[i]['title'] + '</b><br>';
						if(catchContent[i]['author'] && catchContent[i]['author'] != ""){
							searchContent += '作者:' + catchContent[i]['author'] + '<br>';
						}else{
							searchContent += '作者:暂无<br>';
						}
						if(catchContent[i]['publisher'] && catchContent[i]['publisher'] != ""){
							searchContent += '出版社:' + catchContent[i]['publisher'] + '<br>';
						}else{
							searchContent += '出版社:暂无<br>';
						}
						if(catchContent[i]['pubdate'] && catchContent[i]['pubdate'] != ""){
							searchContent += '出版日期:' + catchContent[i]['pubdate'] + '<br>';
						}else{
							searchContent += '出版日期:暂无<br>';
						}
						searchContent += '</div>';
						searchContent += '<input type="hidden" value="' + catchContent[i]['id'] + '"></div>';
					}
					$i(".search-left-more").prev().after(searchContent);
					resultClick();
					if( parseInt(result.info.index) + parseInt(result.info.result) >= parseInt(result.info.total)) $i(".search-left-more").hide();
				}else{
					$i('.search-right-box-title').html("读取失败");
				}
			}
		);
	});
	
	//调控右边高度
	$i('.search-right-box-content').css('height',$i(window).height()-143+'px');
	$i('.search-left').css('min-height',$i(window).height()-102+'px');
	
	setInterval(function(){
		$i('.search-right-box-content').css('height',$i(window).height()-143+'px');
	},1000);
	
	//右边关闭
	$i('.search-right-box-close').click(function(){
		$i('.search-right-box').hide();
		$i('.search-right-box-info').hide();
	});
	$i('.search-right-box-close').hover(function(){
		$i(this).css('color','#000');
	},function(){
		$i(this).css('color','#555');
	});

	$i('.search-right-box').hover(function(){
		$i('.search-right-box-top').css('background','#BBB');
	},function(){
		$i('.search-right-box-top').css('background','#AAA');
	});	
	
	$i('.search-right-box-want').mouseenter(function(){
		$i(this).children('span').hide();
		$i(this).css('background','#EEE');
		$i(this).css('cursor','default');
		$i(this).children('.search-right-box-wantdo').show();
	});
	$i('.search-right-box-want').mouseleave(function(){
		$i(this).children('.search-right-box-wantdo').hide();
		$i(this).children('span').show();
		$i(this).css('cursor','pointer');
		$i(this).css('background','#CCD4DE');
	});
	
	$i("#searchRightBoxStore").click(function(){
		$i("#book_lend").hide();
		$i("#book_store").slideDown();
	});
	
	$i("#lend_button").click(function(){
		if(parseInt($i('#isLogin').val()) == 0) return userLogin();
		$i(this).parent().children('span').html('我有书(共享)');
		$i("#book_store").hide();
		$i("#book_lend").slideDown();
	});
	
	$i("#firstShareAdd").click(function(){
		alert('add');
	});
});

function resultClick(){   //每个搜索结果的绑定函数
	$i('.search-left-result').hover(function(){
		$i(this).css('background','#CCD4DE'); 
	},function(){
		$i(this).css('background','#FFF');
	});

	$i('.search-left-result').click(function(){
		$i('.search-right-box').show();
		$i.get($i('#site').val()+'do/bookView=' + parseInt($i(this).children("input:hidden").eq(0).val()),
		function(data){
			result = $i.parseJSON(data);
			if(result.result == true){
				$i('.search-right-box-title').html("<b>《" + result.info.book_title + "》</b>");
				$i('.search-right-box-img').html('<img class="span-5" src="' + result.info.book_image.replace("spic","lpic") + '"/>');
				var bookDetail = '';
				var bookSummary = '';
				if(result.info.book_title){
					bookDetail 	+= '书名:' + result.info.book_title + '<br />';
				}else{
					bookDetail 	+= '书名:暂无<br />';
				}
				if(result.info.book_subtitle) bookDetail += '副标题:' + result.info.book_subtitle + '<br />';
				if(result.info.book_author){
					bookDetail 	+= '作者:' + result.info.book_author + '<br />';
				}else{
					bookDetail 	+= '作者:暂无<br />';
				}
				if(result.info.book_translator) bookDetail += '译者:' + result.info.book_translator + '<br />';
				if(result.info.book_publisher){
					bookDetail 	+= '出版社:' + result.info.book_publisher + '<br />';
				}else{
					bookDetail 	+= '出版社:暂无<br />';
				}
				if(result.info.book_isbn13 && result.info.book_isbn13 !=0){
					bookDetail 	+= 'ISBN:' + result.info.book_isbn13 + '<br />'; 
				}else{
					if(result.info.book_isbn10 && result.info.book_isbn10 !=0){
						bookDetail 	+= 'ISBN:' + result.info.book_isbn13 + '<br />'; 
					}
				}
				if(result.info.book_pubdate && result.info.pubdate != 0) bookDetail += '出版日期:' + result.info.book_pubdate + '<br />';
				if(result.info.book_price) bookDetail 	+= '官方价格:' + result.info.book_price + '<br />';
				if(result.info.book_pages && result.info.book_pages != 0) bookDetail 	+= '页数:' + result.info.book_pages + '<br />';
				if(result.info.book_binding) bookDetail 	+= '装帧:' + result.info.book_binding + '<br />';
				$i('.search-right-box-detail').html(bookDetail);
				if(result.info.book_summary){
					bookSummary = "图书简介:<br />" + cutstr(result.info.book_summary,200) + "<br />";
				}
				else bookSummary = "图书简介:<br />暂无";
				$i('.search-right-box-summary').html(bookSummary);
				$i('.search-right-box-summary').children(".show-more").click(function(){
					$i('.search-right-box-summary').html("图书简介:<br />" + result.info.book_summary + "<br />");
				});
				$i('.search-right-box-info').show();
			}else{
				$i('.search-right-box-title').html("读取失败");
			}
		});
		$i('.search-right-box-content').css('height',$i(window).height()-143+'px');
	});
}

function search(key, start, resultNum){
	var start 		= arguments[1] ? arguments[1] : 1;
	var resultNum 	= arguments[2] ? arguments[2] : 10;
	$i.get(hideVars.configData.site+'data/search/' + hideVars.key + '/' + start + '/' + resultNum,
		function(data){
			var result = $i.parseJSON(data);
			if(result["return"] == true){
				searchContent = result.info.content;
				for(i = 0; i < searchContent.length; i++){
					var insertResult = $i("#searchResult").clone();
					insertResult.removeAttr("id");
					if(searchContent[i]['author'] && searchContent[i]['author'] != ""){
						insertResult.children(".result-author").html(searchContent[i]['author']);
					}
					$i(".search-left-more").parent().prepend(insertResult);
				}
			}else{
				alert('load error');
			}
		}
	);
}
