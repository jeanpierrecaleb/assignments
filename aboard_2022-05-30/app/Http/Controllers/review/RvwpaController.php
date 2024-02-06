<?php

namespace App\Http\Controllers\review;
use App\Models\Wpa;
use App\Models\Directorate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RvwpaController extends Controller
{
    // Authentification contructor
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $wpas = Wpa::all();

        return view('review.rv-wpa', compact('wpas'));

    }


    // Reviewed waiting for appoval





    public function edit($id)
    {
        $wpa = Wpa::find($id);
        $directorates = Directorate::all();
        return view('review.rv-edit-wpa', compact('wpa', 'directorates'));
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

        if(($request->input('ckecksbmtrv'))){ /* */
        if($wpa->status =="Reviewed waiting for appoval"){
            $wpa->update();
            return redirect('planning/rv/wpa')->with('success', 'Work Plan updated but already submitted');
        }else{
        $wpa->status = "Reviewed waiting for appoval";
        $wpa->update();
        return redirect('planning/rv/wpa')->with('success', 'Work Plan Headline Updated successfully');
        }
        }else{
        $wpa->status = $request->input('status');
        $wpa->update();
        return redirect('planning/rv/wpa')->with('success', 'Work Plan Headline Updated successfully');
        }

        //$wpa->status = "Waiting for submittion";






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
