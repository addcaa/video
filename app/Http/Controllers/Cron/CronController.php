<?php

namespace App\Http\Controllers\Cron;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OSS\OssClient;
use Illuminate\Support\Str;
use OSS\Core\OssException;
class CronController extends Controller
{
    public $AccessKeyID = 'LTAIMYSfOZoRbsK5';
    public $AccessKeySecret = 'n2rCThxBXXyI9GvBQqg1JvSsl6rG8P';
    public $bucket = '1809video';


    public function cron()
    {
        $client = new OssClient($this->AccessKeyID, $this->AccessKeySecret, env('ALY_OSS_EndPoint'));
        //获取目录中的文件
        $file_path = storage_path('app/public/files');
        //获取文件夹里所有文件
        $file_list = scandir($file_path);
        foreach ($file_list as $v) {
            if ($v == '.' || $v == '..') {
                continue;       //函数继续
            }
            $local_file = $file_path . '/' . $v;
            $file_name = 'files/'.$v;
//            print_r($file_name);
            try {
                    $rs=$client->uploadFile($this->bucket,$file_name,$local_file);
                } catch (OssException $e) {
                    printf(__FUNCTION__ . ": FAILED\n");
                    printf($e->getMessage() . "\n");
                    return;
                }
                unlink($local_file);
        }
    }
}













