<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'my_tp',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',
    'DEFAULT_MODULE'        =>  'Admin',      // 默认模块
    'DEFAULT_CONTROLLER'    =>  'admin',     // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index',     // 默认操作名称
    'TMPL_PARSE_STRING'  =>array(
    '__PUBLIC__' =>SITE_URL.'/Application/Admin/Public',              //更改默认的/Public替换规则     
    
),
);