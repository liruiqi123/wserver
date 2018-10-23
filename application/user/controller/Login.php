<?php
namespace app\user\controller;
use \think\Log;

class Login
{
    public function index()
    {
        return('你好啊 北京时间10月份');

    }

    public function dologin(){
         $code =  input('get.code');/*获取前端传过来的code*/

         Log::write('测试日志信息，这是警告级别，并且实时写入','notice');

         Log::write($code);

         $param = input('param');

         $code = input('param.code');

         Log::write($code);



         if(!$code){
                ajaxReturn(['code' => 40000, 'msg'=>'code不能为空']);
         }else{
                ajaxReturn(['code'=>20000, 'msg'=>'success', 'token'=>$code,'openid'=>$code]);
         }

    }
}
