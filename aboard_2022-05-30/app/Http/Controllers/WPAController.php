<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use App\Models\Wpa;
use App\Models\User;
use App\Notifications\WpaStatusChange;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Auth;

class WPAController extends Controller
{
    /* public function index(){

        return view('planning.progressionbar');

    } */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()

    {
        $user = User::find(auth()->user()->id);
        $directorateid = $user->directorate->id;


        if ($user->hasRole('admin')) {
            $directorates = Directorate::all();
            $wpas = Wpa::all();
            return view('planning.wpa', compact('wpas', 'directorates'));
        } else {
            $wpas = Wpa::where('directorate_id', '=', $directorateid)->get();
            return view('planning.wpa', compact('wpas'));
        }
    }



    public function add()
    {

        return view('planning.add-wpa');
    }


    public function store(Request $request)
    {



        $wpa = new Wpa();

        $wpa->name = $request->input('name');
        // $wpa->directorate_id = $request->input('directorate_id');
        $wpa->directorate_id = $request->input('directorate_id');
        $wpa->user_id = Auth()->user()->id;
        // $wpa->status = $request->input('status');
        $wpa->status = "Waiting for submission";
        $wpa->active = "yes";
        $wpa->startdate = $request->input('startdate');
        $wpa->endate = $request->input('endate');
        $wpa->description = $request->input('description');

        $wpa->save();
        return redirect('planning/listwpa')->with('success', 'Work Plan saved and waiting for review');
    }




    public function edit($id)
    {



        $user = User::find(auth()->user()->id);
        $directorateid = $user->directorate->id;
        if ($user->hasRole('admin')) {

            $wpa = Wpa::find($id);
            $directorates = Directorate::all();
            $do = $user->directorate;
            return view('planning.edit_wpa', compact('wpa', 'directorates', 'user'));
        } else {
            $wpa = Wpa::find($id);
            if ($wpa->directorate_id != $user->directorate_id) {
                return back()->with('success', 'This work plan does not belong to you ');
            } else {
                $directorate = $user->directorate;
                return view('planning.edit_wpa', compact('wpa', 'directorate', 'user'));
            }
        }
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());

        $wpa = Wpa::find($id);


        $wpa->name = $request->input('name');
        // $wpa->directorate_id = $request->input('directorate_id');
        $wpa->directorate_id = $request->input('directorate_id');
        $wpa->user_id = $request->input('user_id');
        $wpa->active = $request->input('active');
        $wpa->startdate = $request->input('startdate');
        $wpa->endate = $request->input('endate');
        $wpa->description = $request->input('description');

        $wpa->update();

        return redirect('planning/listwpa')->with('success', 'Work Plan updated ');

        // $wpa->status = "Waiting for submission";
    }


    /*  public function aupdateStatus(Request $request)
    {
        $wpa = Wpa::find($request->wpa_id);
        $wpa->status = "Submitted waiting for reviewing";
        $wpa->save();
        return response()->json(['success'=>'Status change successfully.']);
    } */


    public function updateStatus(Request $request)
    {


        $wpa = Wpa::find($request->wpa_id);
        // $user = User::all();
        $user = User::find(auth()->user()->id);
        $directorateid = $user->directorate->id;


        $users = User::where('directorate_id', '=', $directorateid)->get();
        $unadmins =  User::where('directorate_id', '!=', $directorateid)->get();
        /* $students = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'Teacher');
                }
            )->get(); */



        if ($request->status) {

            if ($wpa->status == "Submitted waiting for reviewing") {
                return response()->json(['success' => 'Cannot, already done.']);
            }

            if ($user->hasRole('focal point')) {
                $wpa->status = "Submitted waiting for reviewing";
                $message = "Work Plan Submitted by FP and is waiting for reviewing";
                $wpa->save();
                // $user->notify(new WpaStatusChange($message));
                Notification::send($users, new WpaStatusChange($message));
                foreach ($unadmins as $unadmin) {
                    if ($unadmin->hasRole('admin')) {
                        Notification::send($unadmin, new WpaStatusChange($message));
                    }
                }
                // Notification::send($users, new WpaStatusChange($message));
                // Notification::send($user, new WpaStatusChange($wpa->status));
                return response()->json(['success' => ' Status submitted ok ']);
            } else {
                return response()->json(['success' => ' No required right ']);
            }
        } else {
            // $wpa->status = "Waiting for submission";
            // $wpa->save();
            return response()->json(['success' => 'Cannot unsubmit now.']);
        }


        /*  $wpa->status = "Submitted waiting for reviewing";
        $wpa->save();
        return response()->json(['success'=>'Status change successfully.']); */
    }



    public function updateReview(Request $request)
    {


        $wpa = Wpa::find($request->wpa_id);


        $user = User::find(auth()->user()->id);

        $directorateid = $user->directorate->id;


        $users = User::where('directorate_id', '=', $directorateid)->get();

        if ($request->status) {

            if ($wpa->status == "Reviewed waiting for approval") {
                return response()->json(['success' => 'Cannot, already done.']);
            }

            if ($user->hasRole('director')) {
                if ($wpa->status == "Submitted waiting for reviewing") {
                    $wpa->status = "Reviewed waiting for approval";
                    $message = "Work Plan Reviewed waiting for approval";
                    $wpa->save();
                    Notification::send($users, new WpaStatusChange($message));
                    return response()->json(['success' => ' Status reviewed ok ']);
                } else {
                    return response()->json(['success' => ' WP not submitted yet ']);
                }
            } else {
                return response()->json(['success' => ' No required right oh ']);
            }
        } else {
            // $wpa->status = "Waiting for submission";
            // $wpa->save();
            return response()->json(['success' => 'Cannot unreview now.']);
        }
    }




    public function updateApprove(Request $request)
    {


        $wpa = Wpa::find($request->wpa_id);


        $user = User::find(auth()->user()->id);

        $directorateid = $user->directorate->id;


        $users = User::where('directorate_id', '=', $directorateid)->get();

        if ($request->status) {

            if ($wpa->status == "Approved") {
                return response()->json(['success' => 'Cannot, already done.']);
            }

            if ($user->hasRole('head of department')) {
                if ($wpa->status == "Reviewed waiting for approval") {
                    $wpa->status = "Approved";
                    $message = "Work Plan Approved by the head of department";
                    $wpa->save();
                    Notification::send($users, new WpaStatusChange($message));
                    return response()->json(['success' => ' Status approved ok ', 'status'=>'Approved']);
                } else {
                    return response()->json(['error' => ' WP not submitted or reviewed yet ']);
                }
            } else {
                return response()->json(['error' => ' No required right oh ']);
            }
        } else {
            // $wpa->status = "Waiting for submission";
            // $wpa->save();
            return response()->json(['error' => 'Cannot disapprove now.']);
        }
    }




    public function delete($id)
    {


        $wpa = Wpa::find($id);
        $wpa->delete();

        return redirect('planning/listwpa')->with("success", "Work Plan deleted successfully");
    }


    public function details($id)
    {

        $wpa = Wpa::find($id);

        return view('planning.details-wpa', compact('wpa'));
    }
}
