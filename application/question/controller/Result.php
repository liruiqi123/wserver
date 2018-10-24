<?php
namespace app\question\controller;


use \think\Log;


class Result
{
 /*
     * 结果处理
     */
    public function dealResult(){

        $is_pass = input('post.is_pass/d');
        $use_revive_time = input('post.money/d');
        $share_revive_time = input('post.share_revive_time/d');


        Log::write('测试日志信息','---------------------');
        Log::write('测试日志信息',$is_pass );
        Log::write('测试日志信息',$use_revive_time );
        Log::write('测试日志信息',$share_revive_time );




        $this->ajaxReturn(['code'=>20000, 'msg'=>'操作成功', 'is_pass' =>$is_pass, 'challengeId'=>111, 'prize'=>['src'=>'11111111', 'text'=>'111111111111']  ]);
    }

}