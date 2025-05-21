<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redirect;

class RedirectController extends Controller
{
    public function index()
    {
        $redirects = Redirect::all();
        return view('redirects.index', compact('redirects'));
    }

    public function create()
    {
        return view('redirects.create');
    }

    public function store(Request $request)
    {
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);

        $request->validate([
            'source_url' => 'required|string',
            'target_url' => 'required|string',
            'status_code' => 'required|integer|in:301,302',
            'active' => 'required|integer|in:1,0',

        ]);

        Redirect::create($request->all());
        return redirect()->route('redirects.index')->with('success', 'تمت إضافة التوجيه بنجاح');
    }

    public function edit($id)
    {
        $redirect = Redirect::findOrFail($id);
        return view('redirects.edit', compact('redirect'));
    }

    public function update(Request $request, $id)
    {
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);
        $request->validate([
            'source_url' => 'required|string',
            'target_url' => 'required|string',
            'status_code' => 'required|integer|in:301,302',
        ]);

        $redirect = Redirect::findOrFail($id);
        $redirect->update($request->all());

        return redirect()->route('redirects.index')->with('success', 'تم تحديث التوجيه بنجاح');
    }

    public function destroy($id)
    {
        $redirect = Redirect::findOrFail($id);
        $redirect->delete();

        return redirect()->route('redirects.index')->with('success', 'تم حذف التوجيه بنجاح');
    }
    public function changeStatus($id)
    {
        try {
            $redirect = Redirect::find($id);
            if (!$redirect)
                return redirect()->route('redirects.index')->with(['error' => 'هذه المدينة غير موجود ']);

            $status =  $redirect -> active  == 0 ? 1 : 0;

            $redirect -> update(['active' =>$status ]);

            return redirect()->route('redirects.index')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('redirects.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
