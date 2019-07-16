<?php

namespace App\Http\Controllers\Video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OSS\OssClient;
use Illuminate\Support\Facades\DB;
class VideoController extends Controller
{

    public function index(){
        $arr=DB::table('p_videos')->get();
        return view('video.index',['arr'=>$arr]);
    }

    public function details(){
        $where=[
            'vid'=>$_GET['vid']
        ];
        $info=DB::table('p_videos')->where($where)->first();
        return view('video.details',['info'=>$info]);
    }

    public function add(){
        $DomainName="cdn.video.highyr.com";
        $NotifyUrl="rtmp://push.video.highyr.com/cuifang/cuifang?auth_key=1562935011-0-0-1bcc50bb8f0b786c38e6b0ec1e69a60e";
        echo $DomainName;
        echo "<hr>";
        echo $NotifyUrl;
        $url="https://live.aliyuncs.com/?Action= SetLiveStreamsNotifyUrlConfig&DomainName=$DomainName&NotifyUrl=$NotifyUrl";
        echo "<hr>";
        echo $url;
//        return view('video.add');
    }











    public function weather(){
        $constAPI_ACCOUNT='N0247743'; //创蓝API账号
        $constAPI_PASSWORD='GEyHwDxIOTe675';//创蓝API密码
        $mobile="手机号";//手机号
        $msg="测试";//短信内容
        $needstatus='true';
        //创蓝接口参数
        $postArr =array(
            'account'=>$constAPI_ACCOUNT,
            'password'=>$constAPI_PASSWORD,
            'msg' =>$msg,
            'phone' =>$mobile,
            'report' =>$needstatus
        );
        $info=json_encode($postArr);//转为json格式
//        dd($info);
        //创蓝接口参数
        $url="http://smssh1.253.com/msg/send/json";

        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8'
            )
        );
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$info);
        $res=curl_exec($ch);
        curl_close($ch);
        dd($res);
    }









}
