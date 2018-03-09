<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/tp/Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/tp/Application/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="http://localhost/tp/Application/Admin/Public/js/libs/modernizr.min.js"></script>
     <script type="text/javascript" src="http://localhost/tp/Application/Admin/Public/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="http://localhost/tp/Application/Admin/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="http://www.jscss.me">管理员</a></li>
                <li><a href="http://www.jscss.me">修改密码</a></li>
                <li><a href="http://www.jscss.me">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href=""><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/Admin/essay/design.html"><i class="icon-font">&#xe008;</i>文章管理</a></li>
                        
                        <li><a href="/index.php/Admin/Admin/design.html"><i class="icon-font">&#xe004;</i>分类管理</a></li>
                        <li><a href="/index.php/Admin/Link/design.html"><i class="icon-font">&#xe012;</i>友情链接</a></li>
                        <li><a href="/index.php/Admin/Arruser/design.html"><i class="icon-font">&#xe052;</i>管理员管理</a></li>
                      
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="system.html"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>修改作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo U('Admin/up');?>" method="post" id="myform" name="myform">
                    <input type="hidden" name="id" value="<?php echo ($art["id"]); ?>" />
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="cateid" id="cateid" class="required">
                                    <option value="">请选择</option>
                                    <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($bo["id"]); ?>"><?php echo ($bo["list"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="<?php echo ($art["title"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>作者：</th>
                                <td><input class="common-text" name="decac" size="50" value="<?php echo ($art["decac"]); ?>" type="text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="pic" id="pic" type="file" value="<?php echo ($art["pic"]); ?>">

                                <?php if($art['pic'] != ''): ?><img src="/<?php echo ($art["pic"]); ?>" height="50">
                                <?php else: ?>
                                    无图片<?php endif; ?>

                                </td>
                            </tr>
                            <tr>
                               <th>内容：</th>
                                <td><textarea name="content" id="TextArea1" value="<?php echo ($art["content"]); ?>"></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
<script type="text/javascript">
    CKEDITOR.replace('TextArea1');
    //如果是在ASP.NET环境下用的服务器端控 件<TextBox>
    CKEDITOR.replace('tbContent');
    //如 果<TextBox>控件在母版页中，要这样写
    CKEDITOR.replace('<%=tbContent.ClientID.Replace("_","$") %>');
</script>
</body>
</html>