<?php
namespace Admin\Controller;
use Think\Controller;
//header("Content-type:text/html;charset='UTF-8'");
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
}