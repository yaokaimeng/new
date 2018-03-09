<?php
namespace Home\Controller;
use Think\Controller;
//header("Content-type:text/html;charset='UTF-8'");
class IndexController extends CateController {
    
 public function index()
   {
      $this->display('login');
   }


   //防非法登录   注意事项  ：构造方法会覆盖父类中的构造方法，需要在子类的构造方法中加parent::父类方法名
    public  function  __construct(){
        parent::__construct();    
        $username = cookie('username');
        if(!$username){
          $this->error('请先登录',U('Home/login'));
        } 
        
    }
   


     
}