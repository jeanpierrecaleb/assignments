<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subprogram;
use App\Models\Output;


class OutputController extends Controller
{
    //

    // Output : one subprogram has many output


    // Constructeur faisant intervenir l'authentification obligatoire

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function add($subproid)
    {
        $subprogram = Subprogram::find($subproid);
        return view('planning.add-output', compact('subprogram'));
    }



    public function store(Request $request)
    {

        /*  'name',
        'subprogram_id',
        'status',
        'quater',
        'description',
        'outcome_id',
        'risks',
        'indicators', */

        $output = new Output();
        $output->name = $request->input('name');
        $output->subprogram_id = $request->input('subprogram_id');
        $output->status = $request->input('status');

        $progid = $request->input('progid');

        $output->quater = $request->input('quater');
        $output->description = $request->input('description');
        $output->outcome_id = $request->input('outcome_id');
        $output->risks = $request->input('risks');

        $output->indicators = $request->input('indicators');

        $output->save();
        // '/details-wpa/'.$request->input('wpa_id')
        return redirect('/planning/details-subpro/' . $progid . '/' . $request->input('subprogram_id'))->with('success', 'Output saved and waiting for to send for review');

        // 'planning/details-subpro/'.$program->id.'/'.$subprogram->id) }}"><i class="fas fa-info m-r-5 "></i></a>


    }


    public function edit($id)
    {
        $output = Output::find($id);

        return view('planning.edit_output', compact('output'));
    }


    public function update(Request $request, $id)
    {

        // dd(request()->all());

        $output = Output::find($id);


        $output->name = $request->input('name');
        // $wpa->directorate_id = $request->input('directorate_id');
        $output->subprogram_id = $request->input('subprogram_id');
        // $program->user_id = $request->input('user_id');

        $progid = $request->input('prog_id');


        $output->status = $request->input('status');
        $output->description = $request->input('description');

        // $outcome->indicators = $request->input('indicators');

        $output->outcome_id = $request->input('outcome_id');
        $output->risks = $request->input('risks');
        $output->indicators = "To add in outcome details"; // To do after with multiselect

        $output->update();

        return redirect('planning/details-subpro/' . $progid . '/' . $request->input('subprogram_id'))->with('success', 'Output Headline Updated successfully');
    }

    public function delete($id)
    {

        $output = Output::find($id);
        $progid = $output->subprogram->program->id;
        $subprogid = $output->subprogram_id;
        $output->delete();

        return redirect('planning/details-subpro/'.$progid.'/'.$subprogid)->with('success', 'Output Headline Updated successfully');
    }


    public function details($subprogramid, $outputid)
    {

        $output = Output::find($outputid);
        return view('planning.details-output', compact('subprogramid', 'output' ));
    }

}
