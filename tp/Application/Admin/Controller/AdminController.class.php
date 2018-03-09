<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
//header("Content-type:text/html;charset=UTF-8");
class AdminController extends Controller
{
    public function Design()
    {
       $article = D('article');
		//查询满足要求的总记录数
       $count = $article->count(); 
       //实例化分页类 传入总记录数和每页显示的记录数(25)
       $Page = new \Think\Page($count,3);
       // 分页显示输出
       $show = $Page->show();
       //进行分页数据查询 注意limit方法的参数要使用Page类的属性
       $res = $article->order('sort desc')->limit($Page->firstRow.','.$Page->listRows)->select();
       //赋值数据集
       $this->assign('res',$res);
       // 赋值分页输出
       $this->assign('page',$show);
       // 输出模板
       $this->display();

    }

    public function add_to()
    {
        $article = D('article');
    	if(IS_POST){
    		$data['title'] = I('title');
            //var_dump($data);die;
    		if(!$article->create($data)){
               
    			if($article->add($data)){
    				$this->success('添加栏目成功!',U('design'));
    			}else{
    				$this->error('栏目失败!');
    			}
    		}else{
                 //echo "sorts";
    			$this->error($article->getError());
    		}
    		return;
    	}
    	$this->display();
    }

    public function sort()
    {
    	//var_dump($_POST);die;
    	$article = D('article');
    	foreach($_POST as $id=>$sort){
    		$article->where(array('id'=>$id))->setField('sort',$sort);
    	}
    	$this->success('排序成功',U('design'));
    }

    public function deldel()
    {
    	$article = D('article');
    	if($article->delete(I('id[]'))){
    		$this->success('删除成功',U('design'));
    	}else{
    		$this->error('删除失败');
    	}
    }

    public function del()
    {
    	$article = D('article');
    	if($article->delete(I('id'))){
    		$this->success('删除成功',U('design'));
    	}else{
    		$this->error('删除失败');
    	}
    }

    public function up()
    {
    	$article = D('article');
    	$art = $article->find(I('id'));
    	$this->assign('art',$art);
    	if(IS_POST){
    		$data['id'] = I('id');
    		$data['title'] = I('title');
    		if($article->create($data)){
    			if($article->save()){
    				$this->success('修改成功!',U('design'),3);
    			}else{
    				$this->error('修改失败!');
    			}
    		}else{
    			$this->error($article->getError());
    		}
    		return;
    	}
    	$this->display();
    }

    /* public function audit(){
       
      	$article = D('article');
        $data=time();
        $num=$data-strtotime($m['data']);
        $miao=60-$num;
        //print_r($m);exit;
       
        $this->assign('num',$num);
        $this->assign('miao',$miao);
        $this->display();

	    }*/
	    

	  /*  public function login_to()
	    {
	    $model=D('arruser');
        $username=I('post.username');
        $pad=I('post.password');
        $num = I('post.num');
       // $code=I('post.code');
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
       /* if(!$num==1){
        	$this->error('不是管理员');
        	die;
        }*/
        //验证验证码
       /* if(!$this->check_verify($code)){
            $this->error('验证码错误');
            die;
        }
        cookie('username',$rest['username']);
        cookie('password',$rest['password']);
        $this->success('登录成功',U('Admin/index'));
	    }*/




        public function login_to()
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
             $this->success('登录成功',U('Admin/index'),3);
        }
        }




}