<?php

namespace App\Http\Controllers;

use App\Models\Ocindicator;
use Illuminate\Http\Request;

class OcindicatorController extends Controller
{
     // S'affiche avec avec un modal, pas besoin necessairement d'une nouvelle page


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


         $emps = new Ocindicator();




         $emps->name = $request->input('name');
         $emps->outcome_id = $request->input('outcome_id');
         $emps->baseline_date = $request->input('baseline_date');
         $emps->target_date = $request->input('target_date');
         $emps->sector = $request->input('sector');
         $emps->measure_unit = $request->input('measure_unit');
         $emps->baseline = $request->input('baseline');
         $emps->target = $request->input('target');

         $emps->baseline_description = $request->input('baseline_description');
         $emps->target_description = $request->input('target_description');

         $progid = $request->input('program_id');



         $emps->save();

         return redirect('/planning/details-outcome/'.$progid.'/'. $request->input('outcome_id'))->with('success', 'Data saved');
     }


    public function edit($id)
    {
        $ocindicator = Ocindicator::find($id);

        return view('planning.edit_ocindicator', compact('ocindicator'));
    }


    public function update(Request $request, $id)
    {

        // dd();

        $ocindicator = Ocindicator::find($id);

        $outcomeid = $ocindicator->outcome_id;
        $progid = $ocindicator->outcome->program_id;

        $ocindicator->name = $request->input('name');
        $ocindicator->outcome_id = $request->input('outcome_id');

        $ocindicator->baseline_date = $request->input('baseline_date');

        $ocindicator->target_date = $request->input('target_date');
        $ocindicator->sector = $request->input('sector');

        $ocindicator->baseline = $request->input('baseline');
        $ocindicator->target = $request->input('target');
        $ocindicator->baseline_description = $request->input('baseline_description');
        $ocindicator->target_description = $request->input('target_description');


        $ocindicator->update();

        return redirect('planning/details-outcome/'.$progid.'/'.$outcomeid)->with('success', 'Ocindicator Headline Updated successfully');


    }



    public function delete($id)
    {

        $ocindicator = Ocindicator::find($id);
        $outcomeid = $ocindicator->outcome->id;
        $progid = $ocindicator->outcome->program->id;
        $ocindicator->delete();

        return redirect('planning/details-outcome/'.$progid.'/'.$outcomeid)->with('success', 'Ocindicator deleted successfully');
    }


    public function details($outcomeid, $ocindicatorid)
    {

        $ocindicator = Ocindicator::find($ocindicatorid);
        return view('planning.details-ocindicator', compact('outcomeid', 'ocindicator' ));
    }


}
