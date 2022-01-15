<?php

namespace App\Http\Controllers\dcss;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DcssDashboard;

class dashboard extends Controller
{

    public function index(Request $request) {
        $css = DcssDashboard::with('category')->get();

        $contents = view('dcss_dashboard')->with('css', $css);
        return response($contents)->header('Content-Type', 'text/css');
    }
}
