<?php
namespace Admin\Controller;
use Think\Controller;
//header("Content-type:text/html;charset=UTF-8");
class EssayController extends Controller
{
	public function index()
	{
		$this->display();
	}

	 public function Design()
    {
       $essay = D('ArticleView');
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


      public function add()
    {
        $essay = D('Essay');
    	if(IS_POST){
    		$data['title'] = I('title');
    		$data['decac'] = I('decac');
    		$data['content'] = I('content');
    		$data['time'] = time(I('time'));
  			$data['pic'] = I($_FILES['pic']);
  			$data['cateid'] = I('cateid');
  			//var_dump($data);die;
    		if($_FILES['pic']['tmp_name']!=''){
    			$upload = new \Think\Upload();//实例化上传类    
    			$upload->maxSize = 3145728 ;// 设置附件上传大小    
    			$upload->exts = array('jpg','gif', 'png', 'jpeg');// 设置附件上传类型    
    			$upload->rootPath = './';//保存根路径
    			$upload->savePath = './Public/Uploads/'; // 设置附件上传目录
    			$info = $upload->uploadOne($_FILES['pic']);
    			 if(!$info) {
    			 // 上传错误提示错误信息
    	        $this->error($upload->getError());    
    	        }else{
    	        // 上传成功 获取上传文件信息
    	         $data['pic'] = $info['savepath'].$info['savename'];
    		}
    	}else{

    	}
    		
    		if($essay->create($data)){
    			if($essay->add()){
    				$this->success('发表成功!',U('design'));
    			}else{
    				$this->error('发表失败!');
    			}
    		}else{
    			$this->error($essay->getError());
    		}
			return;
    	}
    		$article = D('article')->select();
			$this->assign('res',$article);
			$this->display();

    }

      
      public function del()
    {
    	$essay = D('essay');
    	if($essay->delete(I('id'))){
    		$this->success('删除成功',U('design'));
    	}else{
    		$this->error('删除失败');
    	}
    }

    public function up()
    {
    	$article = D('Essay');
    	if(IS_POST){
    		$data['id'] = I('id');
    		$data['cateid'] = I('cateid');
    		$data['title'] = I('title');
    		$data['content'] = I('content');
    		$data['pic'] = I($_FILES['pic']);
    		//var_dump($data);die;
    		if($article->create($data)){
    			//var_dump($article);die;
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
    	$art = $article->find(I('id'));
    	$this->assign('art',$art);
    	$article = D('article')->select();
    	$this->assign('res',$article);
    	$this->display();
    }

     public function sub()
    {
        $sou = I('post.sub');
        $map['title'] = array('like', '%' . $sou . '%');
        //print_r($map);exit;
        $list = D('essay')->where($map)->select();
        $count = D('essay')->where($map)->count();
        $Page = new \Think\Page($count, 2);
        //print_r($Page);exit;
       // $Page->setConfig('next','下一页');
        //$Page->setConfig('prev','上一页');
        $a_list = $Page->show();
        $list=D('essay')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
        //print_r($list);exit;
        $this->assign('page',$a_list);
        $this->assign('row',$list);
        $this->display('design');
}

	/* public function k(){
        
        $m=D('essay')->where()->find(I('id'));
        $data=time();
        $num=$data->strtotime($m['time']);
        //print_r($m);exit;
        $this->assign('m',$m);
        $this->assign('num',$num);
        $this->display();

}*/

	/* public function lock()
    {
    	$essay = D('essay');
    	
    	if($essay->select(I('tique'==1))){
    		$this->success('审核成功',U('design'));
    	}else{
    		$this->error('审核失败');
    	}
    }*/

    public function pin()
    {
    $link = D("link"); 
    $lid = $_POST['checkbox'];
    $lid = join(',',$lid);
    $res = D("link") -> where("lid in ($lid)")->setField('del','0');

    }

     public function lock()
    {
    	$essay = D('essay');
    	
    	if($essay->select(I('tique'==1))){
    		$this->success('审核成功',U('design'));
    	}else{
    		$this->error('审核失败');
    	}
    }
}