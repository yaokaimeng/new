<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>有一种思念，是淡淡的幸福-杨青个人博客网站</title>
<meta name="keywords" content="杨青个人博客网站,杨青个人网站，杨青博客,个人博客,个人网站" />
<meta name="description" content="杨青个人原创博客，提供个人博客，个人网站源码分享" />
<link href="http://localhost/tp//Application/Home/Public//css/index.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>

</head>
<body>
<header>
  <h1><a href="/">Missing </a></h1>
  <p>有一种思念，是淡淡的幸福；有一种幸福，是常常的牵挂；有一种牵挂，是远远地欣赏.......</p>
</header>


<div class="navswf">
<object id="customMenu" data="images/nav.swf" width="528" height="70" type="application/x-shockwave-flash"><param name="allowScriptAccess" value="always"><param name="allownetworking" value="all"><param name="allowFullScreen" value="true"><param name="wmode" value="transparent"><param name="menu" value="false"><param name="scale" value="noScale"><param name="salign" value="1"></object>
<nav id="nav">
     <ul>
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/Home/index/id/<?php echo ($no["id"]); ?>"><?php echo ($no["list"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
     </ul>
        
        <?php if($_COOKIE['id'] ): ?><li><a href="/index.php/Home/Liuyan/out">退出</a></li>
        <li><a href="<?php echo U('Admin/Admin/login');?>">管理中心</a></li>
        <?php else: ?>
        <li><a href="/index.php/Home/Liuyan/out">退出</a></li>
        <li><a href="<?php echo U('Admin/Admin/login');?>">管理中心</a></li>
        <li><a href="/index.php/Home/Liuyan/login">登录</a></li><?php endif; ?>
        
     </ul>
     <script src="http://localhost/tp//Application/Home/Public//js/silder.js"></script><!--获取当前页导航 高亮显示标题-->
</nav>
</div>


<article>
    <div class="pho">
       <ul>
         <!-- <li><a href="http://localhost/tp//Application/Home/Public//#pic01"><img src="http://localhost/tp//Application/Home/Public//images/01.jpg"></a></li>-->
          <li><a href="http://localhost/tp//Application/Home/Public//#pic02"><img src="http://localhost/tp//Application/Home/Public//images/02.jpg"></a></li>
          <!--<li><a href="http://localhost/tp//Application/Home/Public//#pic03"><img src="http://localhost/tp//Application/Home/Public//images/03.jpg"></a></li>-->
       </ul>    
    </div>
    <div class="blank"></div>
   
    <div class="blog">
      <h2><?php echo (date("Y-m-d H:i:s",$fo["time"])); ?></h2> 


      <ul>
        <img src="/<?php echo ($fo["pic"]); ?>"><h3 class="title"><a href="#"><?php echo ($fo["title"]); ?></a></h3>
        
        <p>5) 愈害怕失去的人，愈容易失去。愈想得到，就愈要放手。 放手是很难的，但是别无选择。 世上有很多东西是可以挽回的，比如良知，比如体重。 但不可挽回的东西更多，譬如旧梦，譬如岁月，譬如对一个人的感觉。 放弃一个很爱你的人并不痛苦，放弃一个你很爱的人才是痛苦。</p>
        <p>6) 假装坚强，是不想让人看到眼泪；假装开心，是不想让人知道寂寞；假装快乐，是不想让人看出孤独；假装高兴，是不想让人看见伤口；假装甜蜜，是不想让人看见泪水；假装轻松，是不想让人发觉心酸；假装幸福，是不想让人看见疤痕；假装成熟，是不想让人看出无知；假装聪明，是不想让人看到失败。</p>
      </ul>
    </div>
 
  
</article>
<!--PC版-->
<div id="SOHUCS" ></div>
<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
window.changyan.api.config({
appid: 'cytriW2By',
conf: '5a289ec27532fa720f7501bc09dda28b'
});
</script>
<!doctype html>
<html>
<head>
<meta charset="gb2312">


<footer id="copright">
<?php if(is_array($las)): $i = 0; $__LIST__ = $las;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uo): $mod = ($i % 2 );++$i;?>Design by <a href="http://<?php echo ($uo["url"]); ?>/" target="_blank" rel="friend"><?php echo ($uo["link"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
</footer>

</body>
</html>

</body>
</html>