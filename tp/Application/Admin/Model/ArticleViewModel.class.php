<?php
namespace Admin\Model;
use Think\Model\ViewModel;
//header("Content-type:text/html;charset=UTF-8");
class ArticleViewModel extends ViewModel
{
	 public $viewFields = array(
	'Essay'=>array('id','title','content','pic','time','decac','cateid','tique','_type'=>'LEFT'),
	'Article'=>array('list','_on'=>'Essay.cateid=Article.id'),
);
}