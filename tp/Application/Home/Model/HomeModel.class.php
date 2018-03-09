
<?php
namespace Home\Model;
use Think\Model;
use Think\Controller;
class HomeModel extends Model{
   protected $_validate = array(
     array('code','require','验证码必须！'),  // 都有时间都验证
     array('username','checkName','帐号错误！',1,'function',3),  // 只在登录时候验证
     array('password','checkPwd','密码错误！',1,'function',3), // 只在登录时候验证
    array('email','email','email格式错误'),  //就这!
   );
}