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
             'language'  =>  '',
             'nickName'  =>  input('param.nick_name'),
             'province'  =>  input('param.province')
         ]);


         $result = $userLoginInfo->save();

         Log::write('测试日志信息','更新用户记录情况:$result');

         if(!$result){
                ajaxReturn(['code' => 40000, 'msg'=>'code不能为空']);
         }else{
                ajaxReturn(['code'=>20000, 'msg'=>'success', 'token'=>$code,'openid'=>$code]);
         }

    }


    public function getGlobalInfo(){

            $returnData = [
                    'rule_text'=>array("每人每天有3次答题机会。↵每次挑战包含12道题目，全部答对即可获得随机娃娃奖品。"),  //规则数组
                    'game_text'=>"我是游戏说明",
                    'total'=>1, //总参赛挑战次数
                    'right'=>'答对12题随机送娃娃', //标题
                    //'prize'=>[['text'=>'两只熊熊', 'src'=>'https://hb.gzzh.co/envelop_tzdt/prize1.jpg'],['text'=>'两只兔兔', 'src'=>'https://hb.gzzh.co/envelop_tzdt/prize2.jpg']],   //奖品列表
                    'title'=>'答对了送娃娃',    //转发标题
                    'flag'=>1,   //分享群按钮开关
                    'flag1'=>1,   //挑战失败分享群按钮开关
                    'flag2'=>1,  //购买复活卡开关
                    'flag3'=>1,  //群内智力
                    'flag4'=>1,  //炫耀战绩
                    'flag5'=>6,  //获得挑战机会
                    'flag6'=>1,//游戏中分享到群
                    'revive_money'=>6,//复活卡金额
                    'ctime'=>6, //用户当前可挑战次数
                    'life'=>6,  //  当前用户复活卡数量
                    'share_revive_time'=>6, //分享复活次数
                    'buy_revive_time'=>6, //购买复活次数
                    'max_challenge_time'=>10,   //最大挑战次数
                    'max_get_prize_time'=>6,    //最大领奖品次数
                    'excAmount'=>6,
                    'guide_txt'=>'邀请好友，帮忙答题',
                    'sildeTxt'=>[['head_img'=>'https://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83epkDmbTFnMWh0qsjDjw0tFlpJw4CibOXgbr6bhdRhTwhjxHGhsSznJmoYAqnOWB7bVZzk2iaTicyIrWQ/0', 'sildeText'=>'1恭喜xx领到xx奖品'], ['head_img'=>'https://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83epkDmbTFnMWh0qsjDjw0tFlpJw4CibOXgbr6bhdRhTwhjxHGhsSznJmoYAqnOWB7bVZzk2iaTicyIrWQ/0', 'sildeText'=>'2恭喜xx领到xx奖品'],  ]//获取最近领到娃娃奖品的信息
        ];

        ajaxReturn(['code'=>20000, 'msg'=>'获取成功', 'data'=>$returnData]);

    }
}
