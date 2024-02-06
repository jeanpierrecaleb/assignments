<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Subprogram;
use Illuminate\Http\Request;

class SubproController extends Controller
{
    // Authentification dans le constructeur

    public function add($progid){

        $program = Program::find($progid);

        return view('planning.add-subpro', compact('program'));


    }


    public function store(Request $request){



        $subpro = new Subprogram();

        $subpro->name = $request->input('name');
        $subpro->program_id = $request->input('program_id');
        $subpro->status = $request->input('status');
        $subpro->active = "yes";
        $subpro->startdate = $request->input('startdate');
        $subpro->endate = $request->input('endate');
        $subpro->objective = $request->input('objective');
        $subpro->description = $request->input('description');

        $wpaid = $request->input('wpa_id');

        $subpro->save();
        return redirect('planning/details-program/'.$wpaid.'/'.$request->input('program_id'))->with('success', 'Program saved and waiting for review');

    }

    public function edit($id)
    {
        $subprogram = Subprogram::find($id);
       // $wpas = Wpa::all();
        return view('planning.edit_subpro', compact('subprogram'));
    }


    public function update(Request $request, $id)
    {

        $subprogram = Subprogram::find($id);
        $subprogram->name = $request->input('name');
        $subprogram->program_id = $request->input('program_id');
        $subprogram->status = $request->input('status');
        $subprogram->active = $request->input('active');
        $subprogram->startdate = $request->input('startdate');
        $subprogram->endate = $request->input('endate');
        $subprogram->objective = $request->input('objective');
        $subprogram->description = $request->input('description');

        $wpaid = $request->input('wpa_id');

        $subprogram->update();

        return redirect('planning/details-program/'.$wpaid.'/'.$request->input('program_id'))->with('success', 'Sub-Program Headline Updated successfully');


    }

    public function delete($id)
    {

        $subprogram = Subprogram::find($id);
        $wpaid = $subprogram->program->wpa_id;
        $progid = $subprogram->program_id;
        $subprogram->delete();

        return redirect('planning/details-program/'.$wpaid.'/'.$progid)->with('success', 'Subprogram Headline Deleted successfully');
    }


    public function details($programid, $subprogramid)
    {

        $subprogram = Subprogram::find($subprogramid);
        return view('planning.details-subpro', compact('programid', 'subprogram' ));
    }


}
