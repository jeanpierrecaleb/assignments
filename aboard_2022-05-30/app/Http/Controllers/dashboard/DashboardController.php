<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Wpa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Any right ?

    public function index (){
        $wpas = Wpa::orderBy('created_at', 'DESC')->get()->take(10);
        $wpatotal = count($wpas);

        return view('dashboard', compact('wpatotal'));

}
}
