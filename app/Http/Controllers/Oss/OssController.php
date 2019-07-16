<?php

namespace App\Http\Controllers\Oss;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OssController extends Controller
{
    public function ossNotify(){
        $json=file_get_contents("php://input");
        $log_str=date("Y-m-d H:i:s").'>>>>>'.$json."\n";
        file_put_contents("logs/oss.log",$log_str,FILE_APPEND);
    }
}
