<?php
namespace Home\Controller;
use Think\Controller;
use Think\UserModel;
use Org\Lib\Ucpaas;
//header("Content-type:text/html;charset=UTF-8");
class HomeController extends CateController
{
   
    //用户注册、
      public  function  Regice_do(){
           //实例化数据模型
           $model = D('arruser');
        //接值
        $number = I('post.number');
        $email = I('post.email');
        $username=I('post.username');

        if($model->where("username='$username'")->find()){
            $this->error('用户名已被注册');
        }
        $data['username']=$username;
        //密码
        $pad= I ('post.password');
        $pwd= I ('post.pwd');
        //判断两次密码是否输入的一致
        if($pwd==$pad){
        $data['password']= md5($pad);
        }else{
            $this->error('两次密码输入的不一致');
        }
        //入库操作
        if($model->add($data)){
           //print_r($model);exit;
            $this->success('注册成功',U('Home/login'),3);
        }else{
           $this->error($model->getError());
        }

}

    public function login()
    {
      if(!empty($_POST['phone'])){
       // dump($_POST['phone']);
        $a = rand(1000,9999);
        $_SESSION['randCount'] = null;
        $_SESSION['randCount'] = $a;

    //初始化必填
    //填写在开发者控制台首页上的Account Sid
    $options['accountsid']='686d3fe90a14b2805a8abb481896b989';
    //填写在开发者控制台首页上的Auth Token
    $options['token']='ad076984563443ffa0064a3daa31c8ae';

    //初始化 $options必填
    $ucpass = new Ucpaas($options);
    $appid = "49b7b4cf746d44c480baa6ff96f4c278";    //应用的ID，可在开发者控制台内的短信产品下查看
    $templateid = "271555";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
    $param = $a; //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
    $mobile = $_POST['phone'];
    $uid = "";
    //70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
    $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
    }
      $this->display();
    }






  /* public function Login_do()
   {
   		  //账号  
         $model=D('arruser');
        $username=I('post.username');
        $pad=md5(I('post.password'));
        $code=I('post.code');
        //验证用户名是否存在
        $rest=$model->where("username='$username'")->find();
        //print_r($rest);exit;
        if(!$rest){
            $this->error('用户名不存在');
            die;
        }
        //验证密码是否存在
        if($pad != $rest['password']){
            $this->error('密码错误');
            die;
        }
        //验证验证码
        if(!$this->check_verify($code)){
            $this->error('验证码错误');
            die;
        }
        cookie('username',$rest['username']);
        cookie('password',$rest['password']);
        //cookie('num',$rest['num']);
        $this->success('登录成功',U('index'));

   }
*/



    public function Login_do()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $user = D('arruser');
        if (!empty($_POST)) {
             $a = $user->where("username='$username'")->select();
             if (empty($a)) {
                     echo "<script>alert('用户名不存在..正在跳转...');history.go(-1)</script>";die;
             }
            $pwd = $a['0']['password'];
             if ($pwd != $password) {
                 echo "<script>alert('密码错误..正在跳转...');history.go(-1)</script>";die;
            }else{
                $result = $user->where("username='$username'")->select();
                $id = $result['0']['id'];
                 setcookie('id',$id,time()+86400,'/');
            }
             $this->success('登录成功',U('Home/index'),3);
        }
        
    }




      //退出
      public function out()
      {
        $id = $_COOKIE['id'];
        setcookie('id',$id,time()-1,'/');
        $this->success('退出成功',U('Home/index'));
      }
     
       //验证码
        public  function  Verify(){

        $Verify = new \Think\Verify();
        $Verify->useImgBg  = true;
        $Verify->fontSize  = 30;
        $Verify->useCurve  = false;
        $Verify->useNoise  = false;
        $Verify->length    = 4;
        $Verify->codeSet   = '1234567890';
        $Verify->entry();
    }

    // 验证验证码方法
    public   function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }


     
    /*  public function login_do(){  
        //账号  
        $username=$_POST['username'];  
        //密码  
        $pwd=$_POST['pwd'];  
        $user=M('表名');  
        $list=$user->where("username='$username'")->find();  
        $time=date("Ymd",time());  
        if($list['num']==0){  
            if($list['time']!=$time+1){  
                $this->error("您的账号已被锁定");  
            }  
        }  
        if($list){  
            if($list['pwd']==$pwd){  
                $data['id']=$list['id'];  
                $data['num']=3;  
                $user->save($data);  
                $this->success("登陆成功");  
            }else{  
                $list['num']=--$list['num'];  
                $data['num']=$list['num'];  
                $data['id']=$list['id'];  
                $data['time']=$time;  
                $user->save($data);  
                $this->error("密码错误，还可以输入".$list['num']."次");  
            }  
        }else{  
            $this->error("账号错误");  
        }  
    }  */


}