@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">


            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Edit and update Outcome Indicators </li>

                        </ul>


                    </div>
                </div>
            </div>


            <!-- Begin filter date and else -->


            <br>





            <!-- New form -->



            <form action="{{ url('planning/ocindicator/update/' . $ocindicator->id) }}" method="POST" id="myform"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mb-3">
                    <label for="name" class="form-label">Ocindicator Name</label>
                    <input type="text" id="name" value="{{ $ocindicator->name }}" class="form-control" name="name"
                        placeholder="Say what is the title of your P " form="myform">
                </div>

                <div class="mb-3">
                    <label class="form-label">Belonging Program</label>
                    <select id="outcome_id" name="outcome_id" class="form-select" aria-label="Select a Work Plan" form="myform">
                        <option value=" {{ $ocindicator->outcome_id }} " selected> {{ $ocindicator->outcome->id }},
                            {{ $ocindicator->outcome->name }} </option>
                    </select>
                </div>

                {{-- <input type="hidden" id="user_id" name="user_id" value="{{$wpa->user_id}}"> --}}

                {{-- <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select id="status" name="status" class="form-select" aria-label="Status applied by default">
                        <option value="{{ $outcome->status }}" selected> {{ $outcome->status }} </option>
                        <option value="Waiting for submittion">Waiting for submittion</option>
                    </select>
                </div> --}}

                {{-- <div class="mb-3">
                <input type="hidden" id="wpaid" class="form-control" name="wpaid"
                    placeholder="Wpaid" value="{{ $outcome->program->wpa_id }}" >
            </div> --}}

                {{--





                        --}}


                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="baseline_date" class="form-label">Baseline Date</label>
                                <input type="date" class="form-control" id="baseline_date" name="baseline_date" form="myform"
                                    value="{{$ocindicator->baseline_date}}">
                            </div>
                            <div class="col">
                                <label for="target_date" class="form-label">Target Date</label>
                                <input type="date" class="form-control" id="target_date" name="target_date" form="myform"
                                    value="{{$ocindicator->target_date}}">
                            </div>
                        </div>

                    </form>
                </div>


                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="sector" class="form-label">Sector</label>
                                <select class="form-select" id="sector" name="sector" form="myform" >
                                    <option value="{{$ocindicator->sector}}" >{{$ocindicator->sector}}</option>
                                    <option selected value="Agriculture">Agriculture</option>
                                    <option value="Social">Social</option>
                                </select>
                            </div>




                            <div class="col">
                                <label for="measure_unit" class="form-label">Measure Unit</label>
                                <select class="form-select" id="measure_unit" name="measure_unit"  form="myform">
                                    <option value="{{$ocindicator->measure_unit}}" >{{$ocindicator->measure_unit}}</option>
                                    <option value="Number" selected>Number</option>
                                    <option value="Percentage">Percentage</option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>


                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="baseline" class="form-label">Baseline</label>
                        <input type="number" value="{{  $ocindicator->baseline }}" class="form-control" id="baseline" name="baseline"  form="myform">
                    </div>




                    <div class="col">
                        <label for="target" class="form-label">Target</label>
                        <input type="number" value="{{$ocindicator->target}}" class="form-control" id="target" name="target"  form="myform">
                    </div>
                </div>


                <div class="mb-3">
                    <label for="baseline_description" class="form-label">Baseline Description</label>
                    <textarea id="baseline_description" name="baseline_description" form="myform" class="form-control"  rows="3"
                        placeholder="Add any extra details about the Baseline"> {{$ocindicator->baseline_description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="target_description" class="form-label">Target Description</label>
                    <textarea id="target_description" name="target_description" form="myform" class="form-control"  rows="3"
                        placeholder="Add any extra details about the target">{{$ocindicator->target_date}}</textarea>
                </div>






                <div class="form-group mb-3">
                    <button type="submit" form="myform" value="Submit">Update Data</button>
                </div>

            </form>


            <!-- End of the new form -->
















        </div>
    </div>




    {{-- Inclusion Modal Add Oc Indicator No --}}



@endsection
