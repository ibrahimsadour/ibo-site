<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterRequest;
use App\Models\Footer;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
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

     //show all cities   
     public function index()

     {
        // selection() deze methode is gemaakt in de Models
        $page_links = Footer::all();
        return view('admin.footer.index', compact('page_links'));
 
     }
    
    //add new car
    public function store(HttpRequest $request)

    {
        // return $request;
        DB::beginTransaction();
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);

        try{
            $page_link = new Footer;
            $page_link->title =  $request->input('title');
            $page_link->link =  $request->input('link');
            $page_link->active =  $request->input('active');
            $page_link->save();
            DB::commit();
            return redirect()->route('admin.footer')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.footer')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function edit($id)

    {
        try {
            $page_link = Footer::select()->find($id);
            if (!$page_link) {
                return redirect()->route('admin.footer')->with(['error' => 'هذه المدينة غير موجودة ']);
            }

            return view('admin.footer.edit', compact('page_link'));

        } catch (\Exception $ex) {
            return redirect()->route('admin.footer')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id, FooterRequest $request)
    {
        //validation => CarsRequest

        try {
            //find Car
            $page_link = Footer::find($id);
            if (!$page_link) {
                return redirect()->route('admin.footer.edit', $id)->with(['error' => 'هذه المدينة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

                Footer::where('id', $id)
                ->update([
                    'title' => $request->title,
                    'link' => $request->link,
                    'active' => $request->active,
                ]);
            // save image

            return redirect()->route('admin.footer')->with(['success' => 'تمت تحديث المدينة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.footer')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function destroy($id)
    {

        try {
            $page_link = Footer::find($id);
            if (!$page_link)
                return redirect()->route('admin.footer')->with(['error' => 'هذه المدينة غير موجود ']);


            #delet section
            $page_link->delete();

            return redirect()->route('admin.footer')->with(['success' => 'تم حذف المدينة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.footer')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $page_link = Footer::find($id);
            if (!$page_link)
                return redirect()->route('admin.footer')->with(['error' => 'هذه المدينة غير موجود ']);

            $status =  $page_link -> active  == 0 ? 1 : 0;

            $page_link -> update(['active' =>$status ]);

            return redirect()->route('admin.footer')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.footer')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    
}
