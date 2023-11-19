<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request as HttpRequest;

class RobotsTxtController extends Controller
{
    
    public function open_file()
    {
        if(file_exists(public_path("robots.txt"))){
            $file = public_path("robots.txt");
            $current = file_get_contents($file);
            return view('admin.seo.robots_index', compact('current'));
        }else{
            $file = fopen(public_path("robots.txt"),'w');
            return Redirect::back()->with(['success' =>' تم انشاء ملف بنجاح ']);
        }
    }
    public function update_file(HttpRequest $request)
    {
        $content = $request->content;
        if(file_exists(public_path("robots.txt"))){
            // get the file
            $file = public_path("robots.txt");
            file_put_contents($file,$content);
            return Redirect::back()->with(['success' =>' تم تحديث ملف بنجاح ']);

        }
    }
}
