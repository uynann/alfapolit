<?php

namespace Alfapolit\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Alfapolit\Http\Controllers\Controller;

class UploadFileController extends Controller
{
    public function uploadImage(Request $request) {
        $image = $request->file('image_param');
        $filename = uniqid() . '-' . $image->getClientOriginalName();

        if (!file_exists('img/froala-image')) {
            mkdir('img/froala-image', 0777, true);
        }

        $image->move('img/froala-image/', $filename);
        return stripslashes(response()->json(['link' => url('/img/froala-image/' . $filename)])->content());
    }
    
    public function uploadFile(Request $request) {
        $file = $request->file('file_param');
        $filename = uniqid() . '-' . $file->getClientOriginalName();

        if (!file_exists('files/froala')) {
            mkdir('files/froala', 0777, true);
        }

        $file->move('files/froala/', $filename);
        return stripslashes(response()->json(['link' => url('/files/froala/' . $filename)])->content());
    }
}
