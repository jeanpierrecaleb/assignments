<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use App\Models\Program;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    // Outcome : one program has many outcomes


    // Constructeur faisant intervenir l'authentification obligatoire

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){



        return view('planning.outcome' );
    }


    public function add($progid){
        $program = Program::find($progid);
        return view('planning.add-outcome' , compact('program'));
    }



    public function store(Request $request){



        $outcome = new Outcome();



        /*       'program_id',

        'status',
        'objective',
        'description',
        'indicators', */

        $outcome->name = $request->input('name');
        $outcome->program_id = $request->input('program_id');
        $outcome->status = $request->input('status');

        $wpaid = $request->input('wpaid');

        $outcome->objective = $request->input('objective');
        $outcome->description = $request->input('description');

        $outcome->indicators = $request->input('indicators');

        $outcome->save();
        // '/details-wpa/'.$request->input('wpa_id')
        return redirect('/planning/details-program/'.$wpaid.'/'.$request->input('program_id'))->with('success', 'Outcome saved and waiting for to send for review');

    }

    public function edit($id)
    {
        $outcome = Outcome::find($id);

        return view('planning.edit_outcome', compact('outcome'));
    }




    public function update(Request $request, $id)
    {

        // dd();

        $outcome = Outcome::find($id);


        $outcome->name = $request->input('name');
         // $wpa->directorate_id = $request->input('directorate_id');
        $outcome->program_id = $request->input('program_id');
       // $program->user_id = $request->input('user_id');

        $wpaid = $request->input('wpaid');


        $outcome->status = $request->input('status');

        $outcome->objective = $request->input('objective');
        $outcome->description = $request->input('description');

        // $outcome->indicators = $request->input('indicators');

        $outcome->indicators = "To add in outcome details"; // To do after with multiselect

        $outcome->update();

        return redirect('planning/details-program/'.$wpaid.'/'.$request->input('program_id'))->with('success', 'Outcome Headline Updated successfully');


    }



    public function delete($id)
    {

        $outcome = Outcome::find($id);
        $wpaid = $outcome->program->wpa_id;
        $progid = $outcome->program_id;
        $outcome->delete();

        return redirect('planning/details-program/'.$wpaid.'/'.$progid)->with('success', 'Outcome Headline Updated successfully');
    }




    public function details($progid, $outcomeid)
    {

        $outcome = Outcome::find($outcomeid);
        return view('planning.details-outcome', compact('progid', 'outcome' ));
    }









}
