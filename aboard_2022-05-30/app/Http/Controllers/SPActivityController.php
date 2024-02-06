<?php

namespace App\Http\Controllers;

use App\Models\Spactivity;
use App\Models\Subprogram;
use Illuminate\Http\Request;

class SPActivityController extends Controller
{
    // Authentification dans le constructeur

    public function add($subprogramid){

        $subprogram = Subprogram::find($subprogramid);

        return view('planning.add-spa', compact('subprogram'));

    }


     /*
             'name',
        'subprogram_id',
        'status',
        'pyearactivity',
        'code',
        'category',
        'location',
        'ecowas_budget',
        'dornor_budget',
        'startdate',
        'endate',
        'responsible_officer',
        'output_id',
        'l_comments',
        */

    public function store(Request $request){



       // dd(request()->all());

        $subpro = new Spactivity();

        $subpro->name = $request->input('name');
        $subpro->subprogram_id = $request->input('subprogram_id');
        $subpro->status = "Not started";
        $subpro->pyearactivity = $request->input('pyearactivity');
        $subpro->code = $request->input('code');

        $subpro->category = $request->input('category');

        $subpro->location = $request->input('location');


        $subpro->ecowas_budget = $request->input('ecowas_budget');


        $subpro->donor_budget = $request->input('donor_budget');


        $subpro->startdate = $request->input('startdate');
        $subpro->endate = $request->input('endate');
        $subpro->responsible_officer = $request->input('responsible_officer');
        $subpro->output_id = $request->input('output_id');
        $subpro->l_comments = $request->input('l_comments');

        $progid = $request->input('program_id');

        $subpro->save();
        return redirect('planning/details-subpro/'.$progid.'/'.$request->input('subprogram_id'))->with('success', 'Activity saved and waiting for review');

        //  return redirect('/planning/details-subpro/' . $progid . '/' . $request->input('subprogram_id'))->with('success', 'Output saved and waiting for to send for review');

    }

    public function edit($id)
    {
        $activity = Spactivity::find($id);
    //  $wpas = Wpa::all();
        return view('planning.edit_spa', compact('activity'));
    }


    public function update(Request $request, $id)
    {


     /*
             'name',
        'subprogram_id',
        'status',
        'pyearactivity',
        'code',
        'category',
        'location',
        'ecowas_budget',
        'dornor_budget',
        'startdate',
        'endate',
        'responsible_officer',
        'output_id',
        'l_comments',
        */

        $spactivity = Spactivity::find($id);
        $spactivity->name = $request->input('name');
        $spactivity->subprogram_id = $request->input('subprogram_id');
        $spactivity->status = $request->input('status');
        $spactivity->pyearactivity = $request->input('pyearactivity');
        $spactivity->code = $request->input('code');
        $spactivity->category = $request->input('category');
        $spactivity->location = $request->input('location');
        $spactivity->ecowas_budget = $request->input('ecowas_budget');
        $spactivity->donor_budget = $request->input('donor_budget');



        $spactivity->startdate = $request->input('startdate');
        $spactivity->endate = $request->input('endate');
        $spactivity->responsible_officer = $request->input('responsible_officer');
        $spactivity->output_id = $request->input('output_id');
        $spactivity->l_comments = $request->input('l_comments');


        $progid = $request->input('program_id');

        $spactivity->update();

        return redirect('planning/details-subpro/'.$progid.'/'.$request->input('subprogram_id'))->with('success', 'Sub-Program Headline Updated successfully');


    }

    public function delete($id)
    {

        $spactivity = Spactivity::find($id);
        $progid = $spactivity->subprogram->program_id;
        $subproid = $spactivity->subprogram_id;
        $spactivity->delete();

        return redirect('planning/details-subpro/'.$progid.'/'.$subproid)->with('success', 'Subprogram Headline Deleted successfully');
    }


    public function details($subprogramid, $spactivityid)
    {

        $spactivity = Spactivity::find($spactivityid);
        return view('planning.details-spa', compact('subprogramid', 'spactivity' ));
    }
}
