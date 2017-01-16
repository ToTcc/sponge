<?php

namespace App\Http\Controllers\Api;

use App\Facades\MovieRepository;

class TestController extends BaseController
{

    public function doubantest() {

        $data = searchMovieByKeyword("王宝强", 0, 2);

        return response()->json($data);

    }

    public function index($id) {

        $data = MovieRepository::find(2);

        return response()->json($data);
    }

    public function ret($id) {

        return $this->returnError("ERROR_TOKEN");
//        $permission = PermissionRepository::find($id);
//
//        $data = PermissionRepository::getAllMenusTreeByPermissionModel($permission);
//
//        $this->returnObject["values"]["list"] = $data;
    }

}
