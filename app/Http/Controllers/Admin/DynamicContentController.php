<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DynamicContentRequest;
use App\Models\DynamicContent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class DynamicContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //show About page
    public function dynamic_content_index()

    {
        $dynamic_contents =  DynamicContent::select('id','name','content','active','photo')->get(); 
        // return $dynamic_contents;
        return view('admin.dynamic_content.index', compact('dynamic_contents'));
    }

    // //open Form to add  about tag content
    // public function tag_dynamic_content_create()
    // {
    //     return view('admin.tags.dynamic_content_tags.create');
    // }

    //add new car
    public function dynamic_content_store(DynamicContentRequest $request)

    {

       if (!$request->has('active'))
           $request->request->add(['active' => 0]);
       else
           $request->request->add(['active' => 1]);

       try{
           $dynamic_content = new DynamicContent;
           $dynamic_content->name = $request->input('name');
           $dynamic_content->active = $request->input('active');

            // edit content remove the extra code 
            $edit_content = $request->input('content');
            $edit_content = str_replace('-&gt;', '->', $edit_content);
            $edit_content = str_replace(";&nbsp;", "", $edit_content);
            $edit_content = str_replace(";nbsp", "", $edit_content);
            $edit_content = str_replace(";nbsp;", "", $edit_content);
            $edit_content = str_replace("nbsp", "", $edit_content);
            $edit_content = str_replace("&amp;", "", $edit_content);
            $edit_content = str_replace("&;", "", $edit_content);

            $edit_content = str_replace(array('[[',']]'),'',$edit_content);
            $dynamic_content->content = $edit_content;    
                  
            if($request->hasfile('photo'))
           {
               $file = $request->file('photo');
               $filename=  'images/pages/dynamic-content/'.$file->getClientOriginalName();
               $final_filename = preg_replace('#[ -]+#', '-', $filename);
               $file->move('assets/images/pages/dynamic-content/', $final_filename);
               $dynamic_content->photo = $final_filename;
           }
           $dynamic_content->save();
           return redirect()->route('admin.dynamic_content.index')->with(['success' => 'تمت الاضافة بنجاح']);
       }
       catch(Exception $e){
           return redirect()->route('admin.dynamic_content.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }

    }

    public function dynamic_content_edit($id)

    {
        $dynamic_content = DynamicContent::select()->find($id);

        if (!$dynamic_content) {
            return Redirect::back()->with(['error' => 'هذه المقالة غير موجودة ']);
        }
        return view('admin.dynamic_content.edit', compact('dynamic_content'));

    }
    public function dynamic_content_update($id, DynamicContentRequest  $request)
    {
            
        try {

            //find about and check of the exists or not
            $dynamic_content = DynamicContent::find($id);
            if (!$dynamic_content) {
                return redirect()->route('admin.dynamic_content.edit', $id)->with(['error' => 'هذه الصفحة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $dynamic_content = DynamicContent::find($id);
            $dynamic_content->active = $request->input('active');

            $dynamic_content->name = $request->input('name');

            // #######################################
            $edit_content = $request->input('content');
            $edit_content = str_replace('-&gt;', '->', $edit_content);
            $edit_content = str_replace(";&nbsp;", "", $edit_content);
            $edit_content = str_replace(";nbsp", "", $edit_content);
            $edit_content = str_replace(";nbsp;", "", $edit_content);
            $edit_content = str_replace("nbsp", "", $edit_content);
            $edit_content = str_replace("&amp;", "", $edit_content);
            $edit_content = str_replace(array('[[',']]'),'',$edit_content);
            $edit_content = str_replace("&;", "", $edit_content);
            // #######################################
            $dynamic_content->content = $edit_content;
            // check if the user uplode new image than delete the old image
            if($request->hasfile('photo'))
            {
                $image = Str::after($dynamic_content->photo, 'assets/');
                $image = public_path('assets/' . $image);

                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('photo');
                $filename =  'images/pages/dynamic-content/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/dynamic-content/', $filename);
                $dynamic_content->photo = $filename;
            }

            $dynamic_content->update();
            DB  ::commit();
            return Redirect::back()->with(['success' => 'تمت تحديث الصفحة الدلالية بنجاح']);

        } catch (\Exception $ex) {
            return Redirect::back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function dynamic_content_destroy($id)
    {

        try {
            $dynamic_content = DynamicContent::find($id);
            if (!$dynamic_content)
            return Redirect::back()->with(['error' => 'هذه المقالة غير موجود ']);


            ## Delet image
            ##Srt is cutting helper method
            $image = Str::after($dynamic_content->photo, 'assets/');
            $image = public_path('assets/' . $image);
            unlink($image); //delete from folder


            #delet section
            $dynamic_content->delete();

            return Redirect::back()->with(['success' =>  'تم حذف الصفحة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return Redirect::back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function dynamic_content_changeStatus($id)
    {
        try {
            $dynamic_content = DynamicContent::find($id);
            if (!$dynamic_content)
                return Redirect::back()->with(['error' => 'هذه الصفحة غير موجود ']);

            $status =  $dynamic_content -> active  == 0 ? 1 : 0;

            $dynamic_content -> update(['active' =>$status ]);

            return Redirect::back()->with(['success' =>' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return Redirect::back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
