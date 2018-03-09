<?php
namespace Admin\Controller;
use Think\Controller;
//header("Content-type:text/html;charset=UTF-8");
class ArruserController extends Controller
{
	public function index()
	{
		$this->display();
	}

	 public function Design()
    {
       $essay = D('arruser');
		//查询满足要求的总记录数
       $count = $essay->count(); 
       //实例化分页类 传入总记录数和每页显示的记录数(25)
       $Page = new \Think\Page($count,3);
       // 分页显示输出
       $show = $Page->show();
       //进行分页数据查询 注意limit方法的参数要使用Page类的属性
       $list = $essay->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
       //赋值数据集
       $this->assign('row',$list);
       // 赋值分页输出
       $this->assign('page',$show);
       // 输出模板
       $this->display(); 
      }


    public function lock()
    {
    	 $uname=session('uname');
        $m=D('banks b')->join("bankq q on b.fid=q.id")->where("uname='$uname'")->find();
        $data=time();
        $num=$data-strtotime($m['data']);
        $miao=60-$num;
        //print_r($m);exit;
        $this->assign('m',$m);
        $this->assign('num',$num);
        $this->assign('miao',$miao);


        $this->display();

    }

     public function sub()
    {
        $sou = I('post.sub');
        $map['username'] = array('like', '%' . $sou . '%');
        //print_r($map);exit;
        $list = D('arruser')->where($map)->select();
        $count = D('arruser')->where($map)->count();
        $Page = new \Think\Page($count, 2);
        //print_r($Page);exit;
       // $Page->setConfig('next','下一页');
        //$Page->setConfig('prev','上一页');
        $a_list = $Page->show();
        $list=D('arruser')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
        //print_r($list);exit;
        $this->assign('page',$a_list);
        $this->assign('row',$list);
        $this->display('design');
}



}