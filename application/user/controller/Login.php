<?php
namespace app\user\controller;

class Login
{
    public function index()
    {
        return('你好啊 北京时间10月份');

    }

    public function dologin(){
         $code =  input('get.code');/*获取前端传过来的code*/
         if(!$code){
                     this->ajaxReturn(['code' => 40000, 'msg'=>'code不能为空']);
         }

    }
}
