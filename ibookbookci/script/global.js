$i(document).ready(function(){
	
	/*<搜索框>*/
	$i('.header-search-input').focus(function(){
		if($i(this).parent().children("input:hidden").val() == "1"){
			$i(this).css('background','#FFF');
			$i(this).css('color','#000');
			$i(this).parent().children("input:hidden").attr("value", 0);
			$i(this).attr("value", "");
			$i(".header-search-icon").show();
		}
	});  //搜索框获得焦点时，显示搜索按钮
	
	$i('.header-search-input').blur(function(){
		if($i(this).val() == ""){
			$i(this).parent().children("input:hidden").attr("value", 1);
			$i(this).css('background','#EEE');
			$i(this).css('color','#AAA');
			$i(this).attr("value", "搜索图书");
			$i(".header-search-icon").hide();
		}
	});  //搜索框失去焦点时
	
	$i('.header-search-input').keypress(function(event){
		if(event.which == 13){
			$i('.header-search-icon').click();
		}
	});  //捕获回车键进行搜索
	
	$i('.header-search-icon').click(function searchClick(){
		var siteUrl = hideVars.configData.site + 'search';
		if(location.href.search(siteUrl) == 0){
			$i(".search-left-result").remove();					//针对已搜索过的,结果清空
			$i("#readyNum").html('');   						//针对已搜索过的,more处计数清空
			hideVars.key = $i(".header-search-input").val();  	//在隐藏变量中放置搜索关键词
			search(hideVars.key);								//在search页，直接搜索
		}else{
			window.location.href = hideVars.configData.site + "search/" + $i(".header-search-input").val();
		}
	});
	/*</搜索框>*/
	
	
	/*$i('.header-login').click(function(){
		userLogin();
	});
	
	$i('#headerLoginButton').click(function(){
		$i.post($i('#site').val()+'do/userLogin',
			$i("#headerLoginWindow").serialize(),
			function(data){
				result = $i.parseJSON(data);
				if(result.result == true){
					$i('#headerLoginInfo').html(result.info);
					$i("#headerLoginWindow,.header-login,.header-reg").hide();
					$i('#isLogin').attr("value", 1);
					$i.dialog.list['loginWindowDialog'].time(0.5);
				}else{
					$i('#headerLoginInfo').html(result.info);
				}
			}
		);
	});*/
	
});

function cutstr(str, len){  //字符串切割函数
	var str_length = 0;  
	var str_len = 0;  
	str_cut = new String();  
	str_len = str.length;
	for(i = 0; i < str_len ;i++){  
		a = str.charAt(i);  
		str_length++;  
		if(escape(a).length > 4){   
			str_length++;  
		}  
		str_cut = str_cut.concat(a);  
		if(str_length >= len){
			return str_cut;  
		}  
    }
	if(str_length<len) return str; 
} 
/*
function userLogin(){
	$i.dialog({
		id: 'loginWindowDialog',
		title:'用户登陆',
		content:document.getElementById('headerLogin'),
		lock: true,
		esc:true,
	});
	$i('#headerLoginInfo').html('');
	$i("#headerLoginWindow").show();
}*/