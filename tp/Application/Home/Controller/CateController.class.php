<?php
namespace Home\Controller;
use Think\Controller;
use   Think\UserModel;
//header("Content-type:text/html;charset=UTF-8");
class CateController extends Controller
{
   
  
   
   public function __construct()
   {
   		parent::__construct();
   		$this->nav();
   		$this->nac();
   		//$this->img();
   		$this->classify();
   }

   public function nav()
   {
   	$article = D('article');
   	$list = $article->order("id desc")->select();
   	$this->assign('list',$list);
   }

    public function nac()
   {
   	$article = D('link');
   	$list = $article->select();
   	$this->assign('las',$list);
   }


   /* public function img()
   {
   	$comm = D('essay'); // 实例化User对象
	$count = $comm->where(array('cateid'=>I('id')))->count();// 查询满足要求的总记录数
	$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	$show = $Page->show();// 分页显示输出//进行分页数据查询 注意limit方法的参数要使用Page类的属性
	$list = $comm->where(array('cateid'=>I('id')))->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	$this->assign('pic',$list);// 赋值数据集
	$this->assign('page',$show);// 赋值分页输出
	$this->display(); // 输出模板
   }
*/
   public function classify()
   {
   $comm = D('essay'); // 实例化User对象
	$count = $comm->where(array('cateid'=>I('id')))->count();// 查询满足要求的总记录数
	$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	$show = $Page->show();// 分页显示输出//进行分页数据查询 注意limit方法的参数要使用Page类的属性
	$list = $comm->where(array('cateid'=>I('id')))->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	$this->assign('pic',$list);// 赋值数据集
	$this->assign('page',$show);// 赋值分页输出
	//$this->display(); // 输出模板
   }

}


