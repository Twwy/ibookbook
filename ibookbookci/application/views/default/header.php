<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		<?php	echo $configData['title']; 	?>
	</title>
	
	<!-- Framework CSS --> 
    <link rel="stylesheet" href="<?php	echo $configData['site']; 	?>style/blueprint/screen.css" type="text/css" media="screen, projection" /> 
    <link rel="stylesheet" href="<?php	echo $configData['site']; 	?>style/blueprint/print.css" type="text/css" media="print" /> 
    <!--[if lt IE 8]>
		<link rel="stylesheet" href="./style/blueprint/ie.css" type="text/css" media="screen, projection" />
	<![endif]--> 
	
	<link href="<?php	echo $configData['site']; 	?>style/simpleDialog.css" rel="stylesheet" />
	<link href="<?php	echo $configData['site']; 	?>style/global.css" rel="stylesheet" />	
	<style>
		.header-head{background:url("<?php	echo $configData['site']; 	?>/image/header.png") repeat-x scroll 0 0 transparent;}
	</style>
	<?php	echo $configData['style'];	?>
	

	<script src="<?php	echo $configData['site']; 	?>script/jquery-1.6.2.js"></script>
	<script src="<?php	echo $configData['site']; 	?>script/corner.js"></script>
	<script src="<?php 	echo $configData['site'];	?>script/dialog.js"></script>
	<script src="<?php 	echo $configData['site'];	?>script/global.js"></script>
	<script>
		var hideVars = $i.parseJSON('<?php	echo $configData['hideVars'];	?>');
	</script>
	<?php	echo $configData['script'];	?>
	
</head>
<body>
	<div class="header-head">
		<div class="header-content">
			<div class="header-head-logo">布布网</div>
			<div class="header-search">
					<input class="header-search-input" name="search" type="text" value="搜索图书" autocomplete="off"/>
					<input type="hidden" value="1" autocomplete="off"/>
			</div>
			<div class="header-search-image">
				<img src="<?php	echo $configData['site']; 	?>/image/searchButton.png" class="header-search-icon"/>
			</div>
			<?php
				/*if($configData['site']) echo  '<div class="header-reg"><a>注册</a></div>';
				if(param('showLogin')) echo '<div class="header-login"><a>登陆</a></div>';
				if(param('showExit')) echo '<div class="header-exit"><a>退出</a></div>';*/
			?>
		</div>
	</div>
	<div id="headerLogin">
		<div id="headerLoginInfo"></div>
		<form id="headerLoginWindow">
			邮箱:<input type="text" name="mail" /><br />
			密码:<input type="password" name="password" /><br />
			<div class="header-login-button" id="headerLoginButton">登陆</div>
		</form>
		<input type="hidden" value="<?php 	echo $configData['login'];	?>" autocomplete="off" id="isLogin"/>
	</div>
	<div class="container">
