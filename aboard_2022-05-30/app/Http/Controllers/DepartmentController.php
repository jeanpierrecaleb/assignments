<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Institution;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Controlleur pour l'authentification

    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function index()
    {
        $departments = Department::all();
        return view('community.department', compact('departments'));
    }

    public function add()
    {
        $institutions = Institution::all();
        return view('community.add-depart', compact('institutions'));
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


        $emps = new Department();



        $emps->name = $request->input('name');

        $emps->institution_id = $request->input('institution_id');

        $emps->country = $request->input('country');
        $emps->town = $request->input('town');
        $emps->address = $request->input('address');

        $emps->date_creation = $request->input('date_creation');
        $emps->description = $request->input('description');




        $emps->save();

        return redirect('/department')->with('success', 'Data saved');
    }


    public function edit($id)
    {
        $institutions = Institution::all();
       // return view('community.edit_instit', compact('institution'));
        $department = Department::find($id);
        return view('community.edit_depart', compact('department', 'institutions'));
    }


    public function update(Request $request, $id)
    {

        // dd();

        $department = Department::find($id);

        $department->name = $request->input('name');

        $department->institution_id = $request->input('institution_id');

        $department->country = $request->input('country');
        $department->town = $request->input('town');
        $department->date_creation = $request->input('date_creation');
        $department->address = $request->input('address');
        $department->description = $request->input('description');




        $department->update();

        //  return redirect('institution')->with('success', 'Institution updated saved');

        return redirect('/department')->with('success', 'Department updated saved');
    }




    public function delete($id)
    {


        $department = Department::find($id);
        $department->delete();

        return redirect('department')->with("success", "Department deleted successfully");
    }


    public function details($id)
    {

        $department = Department::find($id);
        return view('community.details-depart', compact('department'));
    }
}
