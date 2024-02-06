<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Directorate;
use Illuminate\Http\Request;

class DirectorateController extends Controller
{
    // Linked to department


    public function __construct()
    {
       // $this->middleware('auth');
    }


    public function index(){

        $directorates = Directorate::all();
        return view('community.directorate', compact('directorates'));
    }


    public function add()
    {
        $departments = Department::all();
        return view('community.add-direc', compact('departments'));
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


        $directorate = new Directorate();



        $directorate->name = $request->input('name');

        $directorate->department_id = $request->input('department_id');

        $directorate->country = $request->input('country');
        $directorate->city = $request->input('city');
        $directorate->address = $request->input('address');

        // $directorate->date_creation = $request->input('date_creation');
        $directorate->description = $request->input('description');




        $directorate->save();

        return redirect('/directorate')->with('success', 'Data saved');
    }


    public function edit($id)
    {
        $departments = Department::all();
        $directorate = Directorate::find($id);
        return view('community.edit_direc', compact('directorate', 'departments'));
    }


    public function update(Request $request, $id)
    {


        $directorate = Directorate::find($id);

        $directorate->name = $request->input('name');

        $directorate->department_id = $request->input('department_id');

        $directorate->country = $request->input('country');
        $directorate->city = $request->input('city');
        //$directorate->date_creation = $request->input('date_creation');
        $directorate->address = $request->input('address');
        $directorate->description = $request->input('description');




        $directorate->update();


        return redirect('/directorate')->with('success', 'Directorate updates saved');
    }




    public function delete($id)
    {


        $directorate = Directorate::find($id);
        $directorate->delete();

        return redirect('directorate')->with("success", "Directorate deleted successfully");
    }


    public function details($id)
    {

        $directorate = Directorate::find($id);
        return view('community.details-direc', compact('directorate'));
    }





}
