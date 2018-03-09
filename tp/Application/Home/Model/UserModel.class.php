<?php
namespace  Home\Model;
use        Think\Model;
use Think\Controller;
class  UserModel  extends  Model{

	public function check_name($Name){
	//拼接一个数组条件
        $where['username'] = $Name;
        $rest = $this->where($where)->find();
        if($rest){
        	return  $rest;
        }else{
        	return  false;
        }
        
	}
}



