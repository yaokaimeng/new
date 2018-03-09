<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/tp//Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/tp//Application/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="http://localhost/tp//Application/Admin/Public/js/libs/modernizr.min.js"></script>
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
                <li><a href="<?php echo U('Home/Home/index');?>">退出</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/index.php/Admin/Essay/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">文章管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="<?php echo U('Essay/sub');?>" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="sub" value="" id="sub" type="text"></td>
                                <td><input class="btn btn-primary btn2" name="" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post"
            action="#">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/index.php/Admin/Essay/add"><i class="icon-font"></i>新增文章</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>
                        <input type="submit" class="btn btn-primary btn2" value='更新排序' />
                    </a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>文章标题</th>
                            <th>文章内容</th>
                            <th>审核状态</th>
                            <th>发布人</th>
                            <th>头像</th>
                            <th>发表时间</th>
                             <th>栏目分类</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($row)): $i = 0; $__LIST__ = $row;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ao): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="id[]" value="" type="checkbox"></td>
                            <td><?php echo ($ao["id"]); ?></td>
                            <td><?php echo ($ao["title"]); ?></td>
                            <td><?php echo ($ao["content"]); ?></td>
                            <td>
                                <?php if($ao['tique'] == '1'): ?><p style="color: green;">审核已通过</p>
                                    <?php else: ?>
                                    <p style="color: red;">正在申请中</p><?php endif; ?>
                                
                            </td>
                            <td><?php echo ($ao["decac"]); ?></td>
                            <td>
                                <?php if($ao['pic'] != ''): ?><img src="/<?php echo ($ao["pic"]); ?>" height="50" />
                                    <?php else: ?>
                                    无图片<?php endif; ?>
                            </td>
                            <td><?php echo (date("Y-m-d H:i:s",$ao["time"])); ?></td>
                            <td title="<?php echo ($ao["list"]); ?>"><a target="_blank" href="#" title="<?php echo ($ao["list"]); ?>"><?php echo ($ao["list"]); ?></a>
                            </td>
                            <td>
                                <a class="link-update" href="/index.php/Admin/Essay/up/id/<?php echo ($ao["id"]); ?>" onclick="return confirm('是否修改?');">修改</a>
                                <a class="link-del" href="/index.php/Admin/Essay/del/id/<?php echo ($ao["id"]); ?>" onclick="return confirm('是否删除?');">删除</a>
                                 <a class="link-del" href="/index.php/Admin/Essay/lock/id/<?php echo ($ao['tique+1']); ?>" onclick="return confirm('是否审核?');">通过</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>  
                    </table>
                    <div class="list-page"><?php echo ($page); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>