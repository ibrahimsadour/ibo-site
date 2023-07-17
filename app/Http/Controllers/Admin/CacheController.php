<?php

namespace App\Http\Controllers\Admin;
use Artisan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan as FacadesArtisan;
use Illuminate\Support\Facades\DB;

class CacheController extends Controller
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

    // Clear application cache:
    public function clear_cache()
    {
        FacadesArtisan::call('cache:clear');

        return redirect()->route('admin.dashboard')->with(['success' => 'Application cache has been cleared']);
    }    
    public function optimize()
    {
        FacadesArtisan::call('optimize');
        return redirect()->route('admin.dashboard')->with(['success' => 'Application cache has been optimized']);
    }
    public function optimize_clear()
    {
        FacadesArtisan::call('optimize:clear');
        return redirect()->route('admin.dashboard')->with(['success' => 'Application cache has been optimized']);
    }
    public function route_cache()
    {
         FacadesArtisan::call('route:cache');
        return redirect()->route('admin.dashboard')->with(['success' => 'Route cache has been cleared']);
    }
    public function route_clear()
    {
        FacadesArtisan::call('route:clear');
        return redirect()->route('admin.dashboard')->with(['success' => 'Route cache has been cleared']);
    }
    public function view_clear()
    {
        FacadesArtisan::call('view:clear');
        return redirect()->route('admin.dashboard')->with(['success' => 'view cache has been cleared']);
    }
    public function view_cache()
    {
        FacadesArtisan::call('view:cache');
        return redirect()->route('admin.dashboard')->with(['success' => 'view cache has been cleared']);
    }
    public function config_cache()
    {
        FacadesArtisan::call('config:cache');
        return redirect()->route('admin.dashboard')->with(['success' => 'config cache has been cleared']);
    }
    public function config_clear()
    {
        FacadesArtisan::call('config:clear');
        return redirect()->route('admin.dashboard')->with(['success' => 'config cache has been cleared']);
    }
    public function clear_compiled()
    {
        FacadesArtisan::call('clear-compiled');
        return redirect()->route('admin.dashboard')->with(['success' => 'config cache has been cleared']);
    }

}
