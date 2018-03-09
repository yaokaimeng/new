<?php
namespace Admin\Controller;
use Think\Controller;
//header("Content-type:text/html;charset='UTF-8'");
class LinkController extends Controller {
    public function index(){
        $this->display();
    }

    public function Design()
    {
       $link = D('link');
		//查询满足要求的总记录数
       $count = $link->count(); 
       //实例化分页类 传入总记录数和每页显示的记录数(25)
       $Page = new \Think\Page($count,3);
       // 分页显示输出
       $show = $Page->show();
       //进行分页数据查询 注意limit方法的参数要使用Page类的属性
       $list = $link->order('sort desc')->limit($Page->firstRow.','.$Page->listRows)->select();
       //赋值数据集
       $this->assign('list',$list);
       // 赋值分页输出
       $this->assign('page',$show);
       // 输出模板
       $this->display(); 
      }


      public function add()
    {
        $link = D('link');
    	if(IS_POST){
    		$data['link'] = I('link');
    		$data['url'] = I('url');
    		$data['desca'] = I('desca');
    		if($link->create($data)){
    			if($link->add()){
    				$this->success('链接成功!',U('design'));
    			}else{
    				$this->error('链接失败!');
    			}
    		}else{
    			$this->error($link->getError());
    		}
    		return;
    	}
    	$this->display();
    }

    public function sort()
    {
    	//var_dump($_POST);die;
    	$link = D('link');
    	foreach($_POST as $id=>$sort){
    		$link->where(array('id'=>$id))->setField('sort',$sort);
    	}
    	$this->success('排序成功',U('design'));
    }

    public function del()
    {
    	$link = D('link');
    	if($link->delete(I('id'))){
    		$this->success('删除成功',U('design'));
    	}else{
    		$this->error('删除失败');
    	}
    }

    public function up()
    {
    	$link = D('link');
    	$art = $link->find(I('id'));
    	$this->assign('art',$art);
    	if(IS_POST){
    		$data['id'] = I('id');
    		$data['link'] = I('link');
    		$data['url'] = I('url');
    		$data['desca'] = I('desca');
    		if($link->create($data)){
    			if($link->save()){
    				$this->success('修改成功!',U('design'),3);
    			}else{
    				$this->error('修改失败!');
    			}
    		}else{
    			$this->error($link->getError());
    		}
    		return;
    	}
    	$this->display();
    }


}