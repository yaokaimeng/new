<?php
//载入ucpass类
require_once('lib/Ucpaas.class.php');

//初始化必填
//填写在开发者控制台首页上的Account Sid
$options['accountsid']='686d3fe90a14b2805a8abb481896b989';
//填写在开发者控制台首页上的Auth Token
$options['token']='ad076984563443ffa0064a3daa31c8ae';

//初始化 $options必填
$ucpass = new Ucpaas($options);