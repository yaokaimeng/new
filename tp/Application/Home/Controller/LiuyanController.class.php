<?php
namespace Home\Controller;
use Think\Controller;
use   Think\UserModel;
//header("Content-type:text/html;charset=UTF-8");
class LiuyanController extends CateController
{
	public function index()
	{
		$essay = D('essay')->find(I('id'));
		$this->assign('fo',$essay);
		$this->list($essay['cateid']);
		$this->display();
	}

	public function list($cateid)
	{
		$cate = D('article')->find($cateid);
		$this->assign('list',$cate['list']);

	}



	



}
   