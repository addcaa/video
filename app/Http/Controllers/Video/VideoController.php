<?php

namespace App\Http\Controllers\Video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OSS\OssClient;
class VideoController extends Controller
{
    //
    public $AccessKeyID='LTAIMYSfOZoRbsK5';
    public $AccessKeySecret='n2rCThxBXXyI9GvBQqg1JvSsl6rG8P';
    public $bucket='1809video';


    public function add(){
        $client=new OssClient($this->AccessKeyID,$this->AccessKeySecret,env('ALY_OSS_EndPoint'));
        $obg='cf.jpg';
        $local_file='u=3353325373,4220782564&fm=26&gp=0.jpg';
        $rs=$client->uploadFile($this->bucket,$obg,$local_file);
        var_dump($rs);
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
