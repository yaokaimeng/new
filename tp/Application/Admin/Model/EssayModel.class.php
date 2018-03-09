<?php
namespace Admin\Model;
use Think\Model;
use Think\Controller;
//header("Content-type:text/html;charset=UTF-8");
class EssayModel extends Model
{
	protected $_validate = array(   
      array('title','require','标题不能为空！',1,'regex',3), // 在新增的时候验证name字段是否唯一  
      array('cateid','require','分类不能为空！',1,'regex',3), // 在新增的时候验证name字段是否唯一  
    array('content','require','内容不能为空！',1,'regex',3), // 在新增的时候验证name字段是否唯一 
    array('title','','文章名称不能重复!',1,'unique',3), // 在新增的时候验证name字段是否唯一   
 );
}