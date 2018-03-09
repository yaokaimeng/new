<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>登录表单</title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="http://localhost/tp//Application/Home/Public//css/style.css" type="text/css" media="all">



</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>登录表单</h1>

	<div class="container w3layouts agileits">

		<div class="login w3layouts agileits">
			<h2>登 录</h2>
			<form action="<?php echo U('Home/Login_do');?>" method="post">
				<input type="text" Name="Userame" placeholder="用户名" required="">
				<input type="password" Name="Password" placeholder="密码" required="">
			
			<ul class="tick w3layouts agileits">
				<li>
					<input type="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>记住我</label>
				</li>
			</ul>
			<div class="send-button w3layouts agileits">
				
					<input type="submit" value="登 录">
				</form>
			</div>
			<a href="#">记住密码?</a>
			<div class="social-icons w3layouts agileits">
				<p>- 其他方式登录 -</p>
				<ul>
					<li class="qq"><a href="#">
					<span class="icons w3layouts agileits"></span>
					<span class="text w3layouts agileits">QQ</span></a></li>
					<li class="weixin w3ls"><a href="#">
					<span class="icons w3layouts"></span>
					<span class="text w3layouts agileits">微信</span></a></li>
					<li class="weibo aits"><a href="#">
					<span class="icons agileits"></span>
					<span class="text w3layouts agileits">微博</span></a></li>
					<div class="clear"> </div>
				</ul>
			</div>
			<div class="clear"></div>
		</div><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
		<div class="register w3layouts agileits">
			<h2>注 册</h2>
			<form action="<?php echo U('Home/Regice_do');?>" method="post">
				<input type="text" Name="Name" placeholder="用户名" required="">
				<input type="text" Name="Email" id="Email" placeholder="邮箱" onblur="s_emil()"><span id="ss_emil"></span>
				<input type="password" Name="Password" id='Password' placeholder="密码" required="" onblur="s_pwd()"><span id='ss_pwd'></span>
				<input type="text" Name="Number" placeholder="手机号码" required="">
			
			<div class="send-button w3layouts agileits">
				
					<input type="submit" value="免费注册">
				</form>
			</div>
			<div class="clear"></div>
		</div>

		<div class="clear"></div>

	</div>

	<div class="footer w3layouts agileits">
		<p>Copyright &copy; More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
	</div>

</body>
<!-- //Body -->

</html>
	
 <!-- <script type="text/javascript">


	function s_pwd(){
	 pwd=document.getElementById('Password').value;
	if(pwd==""){
		document.getElementById('ss_pwd').innerHTML="<font color='red'>不能为空</font>";
		
	}else if(pwd.length>=6){
		document.getElementById('ss_pwd').innerHTML="<font color='red'>对</font>";
		
	}else{
		document.getElementById('ss_pwd').innerHTML="<font color='red'>错</font>";
		
	}
}




	function s_emil(){
	var emil=document.getElementById('Email').value;
	var r_emil=/^\w+@\w+(\.)(com|cn|net)$/;
	if(emil==""){
		document.getElementById('ss_emil').innerHTML="<font color='red'>不能为空</font>";
		
	}else if(r_emil.test(emil)){
		document.getElementById('ss_emil').innerHTML="<font color='red'>对</font>";
		
	}else{
		document.getElementById('ss_emil').innerHTML="<font color='red'>错</font>";
		
	}
}

</script>-->