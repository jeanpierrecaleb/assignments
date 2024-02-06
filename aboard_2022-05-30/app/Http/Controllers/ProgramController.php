<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\Wpa;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // Constructeur faisant intervenir l'authentification obligatoire

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $programs = Program::all();
        return view('planning.program', compact('programs'));

    }


    public function add($id){
        $wpatarget = Wpa::find($id);

       // $wpas = Wpa::all();
        //$wpas = auth()->user()->;

        return view('planning.add-program', compact('wpatarget'));
    }


    public function store(Request $request){



        $program = new Program();

        $program->name = $request->input('name');
        $program->wpa_id = $request->input('wpa_id');
        // $program->status = "Waiting for submission";
        /* Apply the status of the linked work plan */
        $program->status = Wpa::find($request->input('wpa_id'))->status;
        $program->active = "yes";
        $program->startdate = $request->input('startdate');
        $program->endate = $request->input('endate');
        $program->objective = $request->input('objective');
        $program->description = $request->input('description');

        $program->save();
        return redirect('planning/details-wpa/'.$request->input('wpa_id'))->with('success', 'Program saved and waiting for review');

    }


    public function edit($id)
    {
        $program = Program::find($id);
        $wpas = Wpa::all();
        return view('planning.edit_program', compact('program', 'wpas'));
    }




    public function update(Request $request, $id)
    {

        // dd();

        $program = Program::find($id);


        $program->name = $request->input('name');
         // $wpa->directorate_id = $request->input('directorate_id');
        $program->wpa_id = $request->input('wpa_id');
       // $program->user_id = $request->input('user_id');

        $program->status = $request->input('status');
        $program->active = $request->input('active');
        $program->startdate = $request->input('startdate');
        $program->endate = $request->input('endate');
        $program->objective = $request->input('objective');
        $program->description = $request->input('description');

        $program->update();

        return redirect('planning/details-wpa/'.$request->input('wpa_id'))->with('success', 'Program Headline Updated successfully');


    }




    public function delete($id)
    {

        $program = Program::find($id);
        $wpaid = $program->wpa_id;
        $program->delete();

        return redirect('planning/details-wpa/'.$wpaid)->with("success", "Program deleted successfully");
    }


    public function details($wpaid, $progid)
    {

        $program = Program::find($progid);
        return view('planning.details-program', compact('wpaid', 'program' ));
    }






}
