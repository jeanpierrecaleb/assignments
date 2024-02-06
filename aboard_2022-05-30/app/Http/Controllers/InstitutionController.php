<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
//use DB;

class InstitutionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }


    public function index()
    {
        $emps = Institution::all();
        return view('community.institution', compact('emps'));
        //return view('community.institution')->with(compact('emps'));


    }

    public function add()
    {

        return view('community.add_instit');
    }




    public function store(Request $request)
    {

        /* $this->validate($request, [
         'name' => 'required',
         'country' => 'required',
         'town' => 'required',
         'date_creation' => 'required',
         'description' => 'required'

        ]
        );*/


        $emps = new Institution();



        $emps->name = $request->input('name');
        $emps->country = $request->input('country');
        $emps->town = $request->input('town');
        $emps->date_creation = $request->input('date_creation');
        $emps->address = $request->input('address');
        $emps->meta_descrip = $request->input('description');
        $emps->description = $request->input('description');



        $emps->save();

        return redirect('/institution')->with('success', 'Data saved');
    }



    public function edit($id)
    {
        $institution = Institution::find($id);
        return view('community.edit_instit', compact('institution'));
    }

    public function update(Request $request, $id)
    {

        // dd();

        $institution = Institution::find($id);

        $institution->name = $request->input('name');
        $institution->country = $request->input('country');
        $institution->town = $request->input('town');
        $institution->date_creation = $request->input('date_creation');
        $institution->description = $request->input('description');
        $institution->address = $request->input('address');
        $institution->meta_descrip = $request->input('description');



        $institution->update();

        //  return redirect('institution')->with('success', 'Institution updated saved');

        return redirect('/institution')->with('success', 'Institution updated saved');
    }




    public function delete($id)
    {


        $institution = Institution::find($id);
        $institution->delete();

        return redirect('institution')->with("success", "Institution deleted successfully");
    }


    public function details($id)
    {

        $institution = Institution::find($id);
        return view('community.details-inst', compact('institution'));
    }
}
