<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\HomePage;
use App\Http\Requests\Pages\HomePageUsRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Redirect;
use Exception;
use Illuminate\Support\Facades\DB as FacadesDB;

class HomePageController extends Controller
{
    //show all cars
    public function index()

    {
        // selection() deze methode is gemaakt in de Models
        $home_page = HomePage::first();
        return view('admin.pages.home-page.index', compact('home_page'));
    }
    //open Form to add new car
    public function create(){
        return view('admin.pages.home-page.create');
    }

    private function formatKeywords($keywordsJson)
    {
        // تحويل JSON إلى مصفوفة
        $keywordsArray = json_decode($keywordsJson, true);

        // استخراج القيم فقط
        $keywords = array_column($keywordsArray, 'value');

        // دمج الكلمات بفواصل
        return implode(', ', $keywords);
    }
   
    //add info of the home page
    public function store(HomePageUsRequest $request)
    {
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);
        // try{
            $home_page = new HomePage;
            // basic info sction
            $home_page->title = $request->input('title');
            $home_page->default_country =  $request->input('default_country');
            $home_page->description =  $request->input('description');
            $home_page->call_us =  $request->input('call_us');
            $home_page->facebook_link =  $request->input('facebook_link');
            $home_page->instagram_link =  $request->input('instagram_link');
            $home_page->twitter_link =  $request->input('twitter_link');
            // extra info section
            $home_page->h2title = $request->input('h2title');
            $home_page->extra_info = $request->input('extra_info');
            // SEO section
            $home_page->seo_title =  $request->input('seo_title');
            $home_page->seo_keyword = $this->formatKeywords($request->input('seo_keyword'));
            $home_page->seo_description =  $request->input('seo_description');
            $home_page->active = $request->input('active');

            // قائمة الصور المطلوبة
            $imageFields = [
                'logo' => 'assets/images/pages/logo/',
                'background' => 'assets/images/pages/background/',
                'default_seo_image' => 'assets/images/pages/default_seo_image/',
                'ads_sidebar' => 'assets/images/pages/ads_sidebar/',
            ];

            // معالجة رفع الصور
            foreach ($imageFields as $field => $path) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    
                    // إنشاء اسم ملف نظيف بدون مسافات
                    $filename = time() . '-' . preg_replace('#[ -]+#', '-', $file->getClientOriginalName());

                    // حفظ الصورة في المسار المحدد
                    $file->move(public_path($path), $filename);

                    // حفظ المسار في قاعدة البيانات بدون "assets/"
                    $home_page->{$field} = str_replace('assets/', '', $path) . $filename;
                }
            }

            // حفظ باقي البيانات
            $home_page->save();
            FacadesDB::commit();

            return redirect()->route('admin.home-page')->with(['success' => 'تمت الاضافة بنجاح']);

            $home_page->save();
            FacadesDB::commit();
            return redirect()->route('admin.home-page')->with(['success' => 'تمت الاضافة بنجاح']);
        // }
        // catch(Exception $e){
        //     FacadesDB::rollback();
        //     return Redirect::back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        // }

    }

    public function edit($id)
    {
        $home_page = HomePage::select()->find($id);
        if (!$home_page) {
            return redirect()->route('admin.home-page')->with(['error' => 'هذه المقالة غير موجودة ']);
        }
        return view('admin.pages.home-page.edit', compact('home_page'));
    }
    public function update($id, HomePageUsRequest $request)
    {
        try {
            //find Article and check of the exists or not
            $home_page = HomePage::find($id);
            if (!$home_page) {
                return redirect()->route('admin.home-page', $id)->with(['error' => 'هذه الصفحة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            // basic info sction
            $home_page->title = $request->input('title');
            $home_page->default_country =  $request->input('default_country');
            $home_page->description =  $request->input('description');
            $home_page->call_us =  $request->input('call_us');
            $home_page->facebook_link =  $request->input('facebook_link');
            $home_page->instagram_link =  $request->input('instagram_link');
            $home_page->twitter_link =  $request->input('twitter_link');
            // extra info section
            $home_page->h2title = $request->input('h2title');
            $home_page->extra_info = $request->input('extra_info');

            // seo section
            $home_page->seo_title =  $request->input('seo_title');
            $home_page->seo_keyword = $this->formatKeywords($request->input('seo_keyword'));

            $home_page->seo_description =  $request->input('seo_description');
            $home_page->active = $request->input('active');
            
            // check if the user uplode new logo than delete the old logo
            if($request->hasfile('logo'))
            {
                $image = Str::after($home_page->logo, 'assets/');
                $image = public_path('assets/' . $image);
                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('logo');
                $filename =  'images/pages/logo/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/logo/', $filename);
                $home_page->logo = $filename;
            }

            // check if the user uplode new background  than delete the old background
            if($request->hasfile('background'))
            {
                $image = Str::after($home_page->background, 'assets/');
                $image = public_path('assets/' . $image);
                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('background');
                $filename =  'images/pages/background/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/background/', $filename);
                $home_page->background = $filename;
            }

            // check if the user uplode new default_seo_image  than delete the old default_seo_image
            if($request->hasfile('default_seo_image'))
            {
                $image = Str::after($home_page->default_seo_image, 'assets/');
                $image = public_path('assets/' . $image);
                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('default_seo_image');
                $filename =  'images/pages/default_seo_image/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/default_seo_image/', $filename);
                $home_page->default_seo_image = $filename;
            }

            // check if the user uplode new ads_sidebar  than delete the old ads_sidebar
            if($request->hasfile('ads_sidebar'))
            {
                $image = Str::after($home_page->ads_sidebar, 'assets/');
                $image = public_path('assets/' . $image);
                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('ads_sidebar');
                $filename =  'images/pages/ads_sidebar/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/ads_sidebar/', $filename);
                $home_page->ads_sidebar = $filename;
            }
            $home_page->update();
            FacadesDB::commit();
            return redirect()->route('admin.home-page')->with(['success' => 'تمت تحديث الصفحة بنجاح']);

        } catch (\Exception $ex) {
            return Redirect::back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        // try {
            $home_page = HomePage::find($id);
            // if (!$home_page)
            //     return redirect()->route('admin.home-page')->with(['error' => 'هذه المقالة غير موجود ']);


            ## Delet logo
            ##Srt is cutting helper method
            $logo = Str::after($home_page->logo, 'assets/');
            $logo = public_path('assets/' . $logo);
            if(!$logo != false ){
                unlink($logo); //delete from folder
            }

            ## Delet background
            ##Srt is cutting helper method
            $background = Str::after($home_page->background, 'assets/');
            $background = public_path('assets/' . $background);
            if(!$background != false ){
                unlink($background); //delete from folder
            }

            ## Delet background
            ##Srt is cutting helper method
            $default_seo_image = Str::after($home_page->default_seo_image, 'assets/');
            $default_seo_image = public_path('assets/' . $default_seo_image);
            if(!$default_seo_image != false ){
                unlink($default_seo_image); //delete from folder
            }

            ## Delet ads_sidebar
            ##Srt is cutting helper method
            $ads_sidebar = Str::after($home_page->ads_sidebar, 'assets/');
            $ads_sidebar = public_path('assets/' . $ads_sidebar);
            if(!$ads_sidebar != false ){
                unlink($ads_sidebar); //delete from folder
            }

            #delet section
            $home_page->delete();

            return redirect()->route('admin.home-page')->with(['success' => 'تم حذف المقالة بنجاح']);

        // } catch (\Exception $ex) {
        //     // return $ex;
        //     return redirect()->route('admin.home-page')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        // }
    }
        public function changeStatus($id)
    {
        try {
            $privacy_policy = HomePage::find($id);
            if (!$privacy_policy)
                return redirect()->route('admin.home-page')->with(['error' => 'هذه المقالة غير موجود ']);

            $status =  $privacy_policy -> active  == 0 ? 1 : 0;

            $privacy_policy -> update(['active' =>$status ]);

            return redirect()->route('admin.home-page')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.home-page')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
