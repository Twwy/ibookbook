
$i(document).ready(function(){
	
	/*<圆角>*/
	$i('.search-left-top').corner('top 10px');
	$i('.search-left-bottom').corner('bottom 10px');
	/*</圆角>*/
	
	/*<载入时判断是否GET中携带关键词>*/
	if(hideVars.key == false){
		$i(".search-left-content").show();   //如果POST的KEY值为空，则显示关键字为空
	}else{
		search(hideVars.key);
	}
	/*</载入时判断是否GET中携带关键词>*/
	
	//resultClick();
	
	/*<搜索更多>*/
	$i(".search-left-more").click(function(){
		var start =  parseInt(parseInt($i("#readyNum").html()) + 1);
		search(hideVars.key, start);
	});
	/*</搜索更多>*/
	
	/*<右侧高度调节>*/
	$i('.search-right-box-content').css('height',$i(window).height()-143+'px');
	$i('.search-left').css('min-height',$i(window).height()-102+'px');
	
	setInterval(function(){
		$i('.search-right-box-content').css('height',$i(window).height()-143+'px');
	},1000);
	/*</右侧高度调节>*/
	
	/*<右侧浏览关闭>*/
	$i('.search-right-box-close').click(function(){
		$i('.search-right-box').hide();
		$i('.search-right-box-info').hide();
	});
	$i('.search-right-box-close').hover(function(){
		$i(this).css('color','#000');
	},function(){
		$i(this).css('color','#555');
	});
	/*</右侧浏览关闭>*/
	
	/*<右侧窗口美化>*/
	$i('.search-right-box').hover(function(){
		$i('.search-right-box-top').css('background','#BBB');
	},function(){
		$i('.search-right-box-top').css('background','#AAA');
	});	
	/*</右侧窗口美化>*/
	
	/*$i('.search-right-box-want').mouseenter(function(){
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
	});*/
});
/*
function resultClick(){   //每个搜索结果的绑定函数

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
*/
function search(key, start, resultNum){
	var key 		= decodeURIComponent(arguments[0]);
	var start 		= arguments[1] ? arguments[1] : 1;
	var resultNum 	= arguments[2] ? arguments[2] : 10;
	$i("#searchFeedback").html('正在搜索，请稍等');  //搜索提示
	$i("#searchFeedback").show();
	$i(".search-left-more-feedback").show();		//处于搜索更多状态时显示的“载入中”
	$i(".search-left-more-content").hide();
	$i("#searchKey").hide();
	$i.get(hideVars.configData.site+'data/search/' + key + '/' + start + '/' + resultNum,
		function(data){
			$i("#searchFeedback").hide();  //搜索提示关闭
			$i(".search-left-content").hide();
			var result = $i.parseJSON(data);
			if(result["return"] == true){
				searchContent = result.info.content;
				$i("#searchKey").html("关键词:" + key);   //显示关键词
				$i("#searchKey").show();
				$i(".search-left-more-feedback").hide();
				$i(".search-left-more-content").show();
				for(i = 0; i < searchContent.length; i++){
					var insertResult = $i("#searchResult").clone();
					insertResult.removeAttr("id");
					insertResult.addClass("search-left-result");
					insertResult.show();
					insertResult.children(":input").attr("value", searchContent[i]['id']);
					if(searchContent[i]['img'] && searchContent[i]['img'] != ""){
						insertResult.children().first().children().first().attr('src', searchContent[i]['img']);
					}
					if(searchContent[i]['title'] && searchContent[i]['title'] != ""){
						insertResult.children(".result-content").children(".result-title").html(searchContent[i]['title']);
					}
					if(searchContent[i]['author'] && searchContent[i]['author'] != ""){
						insertResult.children(".result-content").children(".result-author").html(searchContent[i]['author']);
					}
					if(searchContent[i]['publisher'] && searchContent[i]['publisher'] != ""){
						insertResult.children(".result-content").children(".result-publisher").html(searchContent[i]['publisher']);
					}
					if(searchContent[i]['pubdate'] && searchContent[i]['pubdate'] != ""){
						insertResult.children(".result-content").children(".result-pubdate").html(searchContent[i]['pubdate']);
					}
					insertResult.hover(function(){
						$i(this).css('background','#CCD4DE'); 
					},function(){
						$i(this).css('background','#FFF');
					});
					insertResult.click(function(){
						$i('.search-right-box-info').hide();
						$i('.search-right-box-img').hide();
						$i('.search-right-box').show();
						var resultId = $i(this).children(":input").val();
						$i.post(hideVars.configData.site + 'data/book/view-douban',
							{id:resultId},
							function(data){
								result = $i.parseJSON(data);
								if(result["return"] == true){
									$i('.search-right-box-title').html("<b>《" + result.info.book_title + "》</b>");
									$i('.search-right-box-img').children().first().attr("src", result.info.book_image.replace("spic","lpic"));
									if(result.info.book_title){
										$i('.search-right-box-detail').children(".detail-title").html("书名:" + result.info.book_title);
									}else $i('.search-right-box-detail').children(".detail-title").html('书名:暂无');
									if(result.info.book_subtitle){
										$i('.search-right-box-detail').children(".detail-subtitle").html("副标题:" + result.info.book_subtitle);
										$i('.search-right-box-detail').children(".detail-subtitle").show();
									}else{$i('.search-right-box-detail').children(".detail-subtitle").hide();}
									if(result.info.book_author){
										$i('.search-right-box-detail').children(".detail-author").html("作者:" + result.info.book_author);
									}else $i('.search-right-box-detail').children(".detail-author").html('作者:暂无');									
									if(result.info.book_translator){
										$i('.search-right-box-detail').children(".detail-translator").html("译者:" + result.info.book_translator);
										$i('.search-right-box-detail').children(".detail-translator").show();
									}else $i('.search-right-box-detail').children(".detail-translator").hide();	
									if(result.info.book_publisher){
										$i('.search-right-box-detail').children(".detail-publisher").html("出版社:" + result.info.book_publisher);
									}else $i('.search-right-box-detail').children(".detail-publisher").html('出版社:暂无');
									if(result.info.book_isbn10) $i('.search-right-box-detail').children(".detail-isbn").html("ISBN:" +result.info.book_isbn10);
									if(result.info.book_isbn13) $i('.search-right-box-detail').children(".detail-isbn").html("ISBN:" +result.info.book_isbn13);
									if(!(result.info.book_isbn10 || result.info.book_isbn13)) $i('.search-right-box-detail').children(".detail-isbn").hide();
									if(result.info.book_pubdate){
										$i('.search-right-box-detail').children(".detail-pubdate").html("出版日期:" + result.info.book_pubdate);
									}else $i('.search-right-box-detail').children(".detail-pubdate").html('出版日期:暂无');
									if(result.info.book_price){
										$i('.search-right-box-detail').children(".detail-price").html("价格:" + result.info.book_price);
									}else $i('.search-right-box-detail').children(".detail-price").html('价格:暂无');
									if(result.info.book_pages && result.info.book_pages != 0){
										$i('.search-right-box-detail').children(".detail-pages").html("页数:" + result.info.book_pages);
										$i('.search-right-box-detail').children(".detail-pages").show();
									}else $i('.search-right-box-detail').children(".detail-pages").hide();
									if(result.info.book_binding){
										$i('.search-right-box-detail').children(".detail-binding").html("装帧:" + result.info.book_binding);
										$i('.search-right-box-detail').children(".detail-binding").show();
									}else $i('.search-right-box-detail').children(".detail-binding").hide();
									if(result.info.book_summary){
										var cutSummary = cutstr(result.info.book_summary,200);
										$i('.search-right-box-summary').html(cutSummary);
										if(result.info.book_summary.length > cutSummary.length){
											$i('.search-right-box-summary').append('..<span class="show-more" id="summaryMore">(更多)</span>');
											$i("#summaryMore").click(function(){
												$i('.search-right-box-summary').html(result.info.book_summary);
											});
											
										}
									}else $i('.search-right-box-summary').html("暂无");
									$i('.search-right-box-img').show();								
									$i('.search-right-box-info').show();

									//alert(data);
								}else{
									alert("读取失败");
								}
								$i('.search-right-box-content').css('height',$i(window).height()-143+'px');
						});
					});
					$i("#searchResult").before(insertResult);
					if(parseInt(result.info.result) + parseInt(result.info.index) >= parseInt(result.info.total)){
						$i(".search-left-more").hide();
					}else{
						$i("#totalNum").html(parseInt(result.info.total));
						$i(".search-left-more").show();
					}
				}
				if($i("#readyNum").html() == ""){
					$i("#readyNum").html(result.info.result);
				}else{
					$i("#readyNum").html(parseInt($i("#readyNum").html()) + parseInt(result.info.result));
				}
			}else{
				$i("#searchFeedback").html('搜索完毕，返回结果异常'); 
				$i("#searchFeedback").show();
			}
		}
	);
}
