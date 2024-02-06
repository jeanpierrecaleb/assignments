<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Spactivity;
use App\Models\Subprogram;
use App\Models\User;
use App\Models\Wpa;


use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $wpas = Wpa::orderBy('created_at', 'DESC')->get()->take(10);
        $wpatotal = count($wpas);
        $wpaapproved = Wpa::where('status', 'Approved')->count();
        $wpareviewed = Wpa::where('status', 'Reviewed waiting for approval')->count() + $wpaapproved;
        $wpasubmitted = Wpa::where('status', 'Submitted waiting for reviewing')->count()  + $wpareviewed + $wpaapproved;


        $programs = Program::orderBy('created_at', 'DESC')->get()->take(10); // Is it taking only 10 occurrences ??
        $programtotal = $programs->count();
        $spactivities = Spactivity::orderBy('created_at', 'DESC')->get()->take(10);
        $activitytotal = $spactivities->count();
        $users = User::orderBy('created_at', 'DESC')->get()->take(10);
        $usertotal = $users->count();
        $subprograms = Subprogram::orderBy('created_at', 'DESC')->get()->take(10);
        $subprogramtotal = $subprograms->count();
        return view('dashboard', compact('users', 'wpas', 'wpatotal', 'wpasubmitted', 'wpareviewed', 'wpaapproved', 'programtotal', 'activitytotal', 'usertotal', 'subprogramtotal'));
    }
}
