<?php
namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Input;

class CommonController extends Controller {

    function uploadImage(Request $request) {
        $file = Input::file('fileToUpload');
//        $allowed_extensions = ['png', 'jpg', 'gif'];
        $extension = $file->getClientOriginalExtension();
//        if ($extension && !in_array($extension, $allowed_extensions)) {
//            return json_encode(['error' => 'You may only upload png, jpg or gif.']);
//        }

        $destinationPath = public_path() .'/uploads/images/';
        $fileName = md5(time()).'.'.$extension;

        $file->move($destinationPath, $fileName);
        $filePath = '/uploads/images/' . $fileName;
        $data['url'] = $filePath;
        $response = json_encode($data['url'], JSON_UNESCAPED_SLASHES);
        return $response;
    }

}
