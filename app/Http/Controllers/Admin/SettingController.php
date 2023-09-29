<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan as FacadesArtisan;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
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

    //show one city with his tag
    public function config_app_locale(){
        $app_locale = Setting::where('name','locale')->Where('active','1')->first(); 
        if (!$app_locale) {
            return redirect()->route('404.index');
        }

        return [$app_locale ,[FacadesArtisan::call('config:update')=>'Update configuration variables in config/app.php']] ;

    }

    public function update_config_app_locale($lang){


        try {

            if (!$lang) {
                return Redirect::back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            }
            $local = Setting::find(1);

            $local->value = $lang;
            $local->update();
            
            if(FacadesArtisan::call('config:update')){
                return Redirect::back()->with(['success' => 'تمت تحديث بنجاح']);
            }
            return Redirect::back()->with(['success' => 'تمت تحديث بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.google')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
