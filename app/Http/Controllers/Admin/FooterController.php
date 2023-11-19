<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterRequest;
use App\Models\Footer;
use Exception;
use Faker\Core\Number;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        $page_links = Footer::where('title','not like', '%copyright_text%')->where('title','not like', '%copyright_pages%')->get();
        $copyright_string = Footer::select('copyright_text','id')->where('copyright_text','not like', '%copyright_pages%')->where('copyright_text','not like', '%footer_page_link%')->first();
        $copyright_pages = Footer::
        where('copyright_page_name','not like', '%copyright_text%')
        ->where('copyright_page_link','not like', '%copyright_text%')

        ->where('copyright_page_name','not like', '%footer_page_link%')
        ->where('copyright_page_link','not like', '%footer_page_link%')
        
        ->get();


        // return $copyright_string->id;
        return view('admin.footer.index', compact('page_links','copyright_string','copyright_pages'));
 
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
            $page_link->copyright_text = "footer_page_link";
            $page_link->copyright_page_name = "footer_page_link";
            $page_link->copyright_page_link = "footer_page_link";



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

            //  return $copyright_pages = Footer::select('id')->
            //         where('copyright_page_name','not like', '%copyright_text%')
            //         ->where('copyright_page_link','not like', '%copyright_text%')

            //         ->where('copyright_page_name','not like', '%footer_page_link%')
            //         ->where('copyright_page_link','not like', '%footer_page_link%')
                    
            //         ->find(27);


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

    public function store_copyright_text(HttpRequest $request)
    {
        $copyright_text_string = new Footer;
        $copyright_text_string->copyright_text =  $request->input('copyright_text');
        $copyright_text_string->title =  'copyright_text';
        $copyright_text_string->link = 'copyright_text';
        $copyright_text_string->copyright_page_name = 'copyright_text';
        $copyright_text_string->copyright_page_link = 'copyright_text';

        $copyright_text_string->active =  1;
        $copyright_text_string->save();
        return redirect()->route('admin.footer')->with(['success' => 'تمت الاضافة بنجاح']);
    
    }
    
    
    public function update_copyright_text($id, HttpRequest $request)
    {
        $copyright_string = Footer::find($id);

        if (!$copyright_string) {
            return redirect()->route('admin.footer.edit', $id)->with(['error' => 'هذه غير موجودة']);
        }

        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);

            Footer::where('id', $id)
            ->update([
                'copyright_text' => $request->copyright_text,
            ]);
        // save image

        return redirect()->route('admin.footer')->with(['success' => 'تمت تحديث المدينة بنجاح']);
    }

        
    // edit copyright_pages 
    public function copyright_pages_store(HttpRequest $request)
    {
        DB::beginTransaction();
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);

        try{
            $copyright_pages = new Footer;
            $copyright_pages->title =  'copyright_pages';
            $copyright_pages->link =  'copyright_pages';
            $copyright_pages->copyright_text = "copyright_pages";
            $copyright_pages->copyright_page_name =  $request->input('copyright_page_name');
            $copyright_pages->copyright_page_link =  $request->input('copyright_page_link');



            $copyright_pages->active =  $request->input('active');
            $copyright_pages->save();
            DB::commit();
            return redirect()->route('admin.footer')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.footer')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    
}
