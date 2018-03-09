<?php
namespace Admin\Model;
use Think\Model;
use Think\Controller;
//header("Content-type:text/html;charset=UTF-8");
class LinkModel extends Model
{
	 protected $_validate = array(   
      array('link','require','链接不能为空！',1,'regex',3), // 在新增的时候验证name字段是否唯一  
      array('url','require','链接地址不能为空！',1,'regex',3), // 在新增的时候验证name字段是否唯一  
    array('link','','链接不能重复！',1,'unique',3), // 在新增的时候验证name字段是否唯一  
 );
}