@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">


            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Create Output for {{$subprogram->name}} </li>

                        </ul>


                    </div>
                </div>
            </div>


            <!-- Begin filter date and else -->


            <div class="row">
                <div class="col-lg-12">
                    {{-- @include('layouts.bars.wpabar') --}}
                    <br>
                    <!-- Begin form filter -->

                    <!-- End form of the filter -->
                </div>
            </div>




            <form action="{{ url('planning/output/create') }}" method="POST" id="myform">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label">Output Name</label>
                    <input type="text" id="name" class="form-control" name="name"
                        placeholder="Write the name of the directorate" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Belonging Subprogram</label>
                    <select id="subprogram_id" name="subprogram_id" form="myform" class="form-select" aria-label="Select a Program">
                        <option value=" " disabled>Select below</option>
                        <option value="{{$subprogram->id}}">{{$subprogram->id}}, {{$subprogram->name}}</option>




                        {{-- 'name',
                            'subprogram_id',
                            'status',
                            'quater',
                            'description',
                            'outcome_id',
                            'risks',
                            'indicators'
                            @foreach (auth()->user()->directorate->wpas as $wpa)
                            @foreach ($wpa->programs as $program)
                                <option value="1">{{ $program->name }}</option>
                            @endforeach
                        @endforeach --}}

                    </select>
                </div>
                {{-- Id du Work Plan en hidden --}}
                <div class="mb-3">
                    <input type="hidden" id="progid" class="form-control" name="progid"
                        placeholder="Program id" value="{{$subprogram->program_id}}" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select id="status" name="status" class="form-select" aria-label="Status applied by default">
                        <option value="Waiting for submition" selected> Waiting for submition </option>
                        <option value="Waiting for reviewing" disabled>Waiting for review</option>
                        <option value="Reviewed waiting approuval" disabled>Reviewed waiting approuval</option>
                        <option value="Approuved" disabled>Approved</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quater</label>
                    <select id="quater" name="quater" class="form-select" aria-label="Quater applied">
                        <option value="quater1" selected>quater1 </option>
                        <option value="quater2" disabled>quater2</option>
                        <option value="quater3" disabled>quater3</option>
                        <option value="quater4" disabled>quater4</option>
                    </select>
                </div>




                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" form="myform" class="form-control" rows="3"
                        placeholder="Add any extra details about the request" ></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Linked Outcome</label>
                    <select id="output_id" name="output_id" form="myform" class="form-select" aria-label="Select an Output">
                        <option value=" " disabled>Select below</option>
                        @foreach ($subprogram->program->outcomes as $outcome)
                        <option value="{{$outcome->id}}" selected>{{$outcome->id}}, {{$outcome->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="risks" class="form-label">Risks</label>
                    <textarea id="risks" name="risks" form="myform" class="form-control" rows="3"
                        placeholder="Add the risks" ></textarea>
                </div>



                <div class="mb-3">
                    <label for="indicators" class="form-label" style="width:90%">Indicators </label>

                    <input type="text" id="indicators" value="To do after, add it your outcome details" class="form-control" name="indicators"
                        placeholder="Choose proposed outcome-indicators or create" >
                    {{-- <a class="btn btn-dark mb-2" data-toggle="modal" data-target="#createproject"><i class="fa fa-plus"
                            aria-hidden="true"></i> Add</a> --}}
                            {{-- <a class="btn btn-dark mb-2" href="{{ url('planning/details-outcome/'.$program->id) }}"><i class="fa fa-plus"
                                aria-hidden="true"></i> Add</a> --}}
                </div>

                <div class="form-group mb-3">
                    {{-- <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a> --}}
                    <button ><a href="{{url()->previous()}}" style="color:black;">Cancel</a></button>
                    <button type="submit" form="myform" value="Submit">Submit</button>
                    <br>
                </div>


            </form>

        </div>


    </div>



    <!-- Inclusion Create -->

    <!-- Create Modal Indicator -->
    <!-- <div class="modal fade" id="createproject" tabindex="-1" role="dialog" aria-hidden="true"> -->
    <div class="modal fade" id="createproject" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Create Outcome Indicator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <div class="modal-body">
                    <form action="{{ url('planning/create-ocindicator')}}" method="POST" id="myform2">
                        {{ csrf_field() }}


                        <div class="mb-3">
                            <label for="name" class="form-label">Indicator Title</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Say what is the name of the Outcome indicator ">
                        </div>




                        <div class="deadline-form">
                            <form>
                                <div class="row g-3 mb-3">
                                    <div class="col">
                                        <label for="baseline_date" class="form-label">Baseline Date</label>
                                        <input type="date" class="form-control" id="baseline_date" name="baseline_date" value="2022-01-01">
                                    </div>
                                    <div class="col">
                                        <label for="target_date" class="form-label">Target Date</label>
                                        <input type="date" class="form-control" id="target_date" name="target_date" value="2022-12-31">
                                    </div>
                                </div>

                            </form>
                        </div>



                        <div class="deadline-form">
                            <form>
                                <div class="row g-3 mb-3">
                                    <div class="col">
                                        <label for="sector" class="form-label">Sector</label>
                                        <select class="form-select" id="sector" name="sector" form="myform2" >
                                            <option >All</option>
                                            <option selected value="Agriculture">Agriculture</option>
                                            <option value="Social">Social</option>
                                        </select>
                                    </div>




                                    <div class="col">
                                        <label for="measure_unit" class="form-label">Measure Unit</label>
                                        <select class="form-select" id="measure_unit" name="measure_unit"  form="myform2">
                                            <option value="Number" selected>Number</option>
                                            <option value="Percentage">Percentage</option>
                                            <option value="Other">Other</option>

                                        </select>
                                    </div>
                                </div>

                            </form>
                        </div>


                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="baseline" class="form-label">Baseline</label>
                                <input type="number" class="form-control" id="baseline" name="baseline"  form="myform2">
                            </div>




                            <div class="col">
                                <label for="target" class="form-label">Target</label>
                                <input type="number" class="form-control" id="target" name="target"  form="myform2">
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="baseline_description" class="form-label">Baseline Description</label>
                            <textarea id="baseline_description" name="baseline_description" form="myform2" class="form-control"  rows="3"
                                placeholder="Add any extra details about the Baseline"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="target_description" class="form-label">Target Description</label>
                            <textarea id="target_description" name="target_description" form="myform2" class="form-control"  rows="3"
                                placeholder="Add any extra details about the target"></textarea>
                        </div>







                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>



                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                             <button type="submit" class="btn btn-primary" form="myform2">Create</button>
                        </div>

                    </form>
                </div>



            </div>
        </div>

        <!--End create -->
    </div>
@endsection
