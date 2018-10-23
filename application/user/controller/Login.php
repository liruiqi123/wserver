<?php
namespace app\user\controller;
use \think\Log;

use app\user\model\UserLoginInfo;


class Login
{
    public function index()
    {
        return('你好啊 北京时间10月份');

    }

    public function dologin(){

         Log::write('测试日志信息，这是警告级别，并且实时写入','notice');

         $param = input('param');

         $code = input('param.code');

         Log::write($code);

         $userLoginInfo = new UserLoginInfo;

         $userLoginInfo->data([
             'gamekey'  =>  input('param.gamekey'),
             'code'  =>  input('param.code'),
             'picture'  =>  input('param.head_img'),
             'city'  => input('param.city'),
             'country'  =>  input('param.coutry'),
             'gender'  =>  input('param.sex'),
             'language'  =>  ''),
             'nickName'  =>  input('param.nick_name'),
             'province'  =>  input('param.province')
         ]);


         $result = $userLoginInfo->save();




         if(!$result){
                ajaxReturn(['code' => 40000, 'msg'=>'code不能为空']);
         }else{
                ajaxReturn(['code'=>20000, 'msg'=>'success', 'token'=>$code,'openid'=>$code]);
         }

    }
}
