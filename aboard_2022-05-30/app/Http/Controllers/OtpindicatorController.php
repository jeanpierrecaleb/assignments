<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otpindicator;


class OtpindicatorController extends Controller
{
    //

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


         $emps = new Otpindicator();




         $emps->name = $request->input('name');
         $emps->output_id = $request->input('output_id');
         $emps->baseline_date = $request->input('baseline_date');
         $emps->target_date = $request->input('target_date');
         $emps->sector = $request->input('sector');
         $emps->measure_unit = $request->input('measure_unit');
         $emps->baseline = $request->input('baseline');
         $emps->target = $request->input('target');

         $emps->baseline_description = $request->input('baseline_description');
         $emps->target_description = $request->input('target_description');

         $subproid = $request->input('subprogram_id');

         $emps->save();

         return redirect('/planning/output/details/'.$subproid.'/'. $request->input('output_id'))->with('success', 'Data saved');

        // public function details($subprogramid, $outputid)
     }


     public function edit($id)
     {
         $otpindicator = Otpindicator::find($id);

         return view('planning.edit_otpindicator', compact('otpindicator'));
     }


     public function update(Request $request, $id)
    {

        // dd();

        $otpindicator = Otpindicator::find($id);

        // $outcomeid = $otpindicator->outcome_id;

        $subproid = $otpindicator->output->subprogram_id;

        $otpindicator->name = $request->input('name');
        $otpindicator->output_id = $request->input('output_id');

        $otpindicator->baseline_date = $request->input('baseline_date');

        $otpindicator->target_date = $request->input('target_date');
        $otpindicator->sector = $request->input('sector');

        $otpindicator->baseline = $request->input('baseline');
        $otpindicator->target = $request->input('target');
        $otpindicator->baseline_description = $request->input('baseline_description');
        $otpindicator->target_description = $request->input('target_description');


        $otpindicator->update();

        return redirect('planning/output/details/'.$subproid.'/'.$request->input('output_id'))->with('success', 'Otpindicator Headline Updated successfully');

    }

    public function delete($id)
    {

        $otpindicator = Otpindicator::find($id);
        $outputid = $otpindicator->output->id;
        $subproid = $otpindicator->output->subprogram->id;
        $otpindicator->delete();

        return redirect('planning/output/details/'.$subproid.'/'.$outputid)->with('success', 'Otpindicator Headline deleted successfully');
    }

    public function details($outputid, $otpindicatorid)
    {

        $otpindicator = Otpindicator::find($otpindicatorid);
        return view('planning.details-otpindicator', compact('outputid', 'otpindicator' ));
    }




}
