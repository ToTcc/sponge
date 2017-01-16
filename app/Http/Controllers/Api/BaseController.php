<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Facades\PermissionRepository;
use Illuminate\Support\Facades\Config;

class BaseController extends Controller {

    protected $returnObject = array(
        "errorCode" => 200,
        "msg" => "",
        "values" => array(),
    );

    public function returnError($code) {
        $this->returnObject["errorCode"] = config("errorInfo.errorCode.".$code);
        $this->returnObject["msg"] = config("errorInfo.msg.".$code);
        return response()->json($this->returnObject);
    }

}
