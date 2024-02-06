@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">


            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Edit and update Outcome </li>

                        </ul>


                    </div>
                </div>
            </div>


            <!-- Begin filter date and else -->


            <br>





            <!-- New form -->



            <form action="{{ url('planning/outcome/update/' . $outcome->id) }}" method="POST" id="myform"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mb-3">
                    <label for="name" class="form-label">Outcome Name</label>
                    <input type="text" id="name" value="{{ $outcome->name }}" class="form-control" name="name"
                        placeholder="Say what is the title of your P ">
                </div>

                <div class="mb-3">
                    <label class="form-label">Belonging Program</label>
                    <select id="program_id" name="program_id" class="form-select" aria-label="Select a Work Plan">
                        <option value=" {{ $outcome->program->id }} " selected> {{ $outcome->program->id }},
                            {{ $outcome->program->name }} </option>
                    </select>
                </div>

                {{-- <input type="hidden" id="user_id" name="user_id" value="{{$wpa->user_id}}"> --}}

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select id="status" name="status" class="form-select" aria-label="Status applied by default">
                        <option value="{{ $outcome->status }}" selected> {{ $outcome->status }} </option>
                        <option value="Waiting for submittion">Waiting for submittion</option>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="hidden" id="wpaid" class="form-control" name="wpaid" placeholder="Wpaid"
                        value="{{ $outcome->program->wpa_id }}">
                </div>


                <div class="mb-3">
                    <label for="objective" class="form-label">Target Area</label>
                    <textarea id="objective" name="objective" form="myform" class="form-control" rows="3"
                        placeholder="Add the objective about the request"> {{ $outcome->objective }} </textarea>
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" form="myform" class="form-control" id="description" rows="3"
                        placeholder="Add any extra details about the request"> {{ $outcome->description }} </textarea>
                </div>

                <div class="mb-3">
                    <label for="indicators" class="form-label" style="width:90%">Indicators </label>

                    <input type="text" value="{{ $outcome->indicators }}" id="indicators" class="form-control"
                        name="indicators" placeholder="Choose proposed outcome-indicators or create">
                    <a class="btn btn-dark mb-2" data-toggle="modal" data-target="#createproject"><i class="fa fa-plus"
                            aria-hidden="true"></i> Add</a>
                </div>




                <div class="form-group mb-3">
                    <a href="{{url()->previous()}}"><button>Cancel</button></a>
                    <button type="submit" form="myform" value="Submit">Update Data</button>
                </div>

            </form>


            <!-- End of the new form -->
















        </div>
    </div>



    {{-- Iclusion Modal Add Indicator --}}


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
                    <form action="{{ url('planning/create-ocindicator') }}" method="POST" id="myform2">
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
                                        <input type="date" class="form-control" id="baseline_date" name="baseline_date"
                                            value="2022-01-01">
                                    </div>
                                    <div class="col">
                                        <label for="target_date" class="form-label">Target Date</label>
                                        <input type="date" class="form-control" id="target_date" name="target_date"
                                            value="2022-12-31">
                                    </div>
                                </div>

                            </form>
                        </div>



                        <div class="deadline-form">
                            <form>
                                <div class="row g-3 mb-3">
                                    <div class="col">
                                        <label for="sector" class="form-label">Sector</label>
                                        <select class="form-select" id="sector" name="sector" form="myform2">
                                            <option>All</option>
                                            <option selected value="Agriculture">Agriculture</option>
                                            <option value="Social">Social</option>
                                        </select>
                                    </div>




                                    <div class="col">
                                        <label for="measure_unit" class="form-label">Measure Unit</label>
                                        <select class="form-select" id="measure_unit" name="measure_unit" form="myform2">
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
                                <input type="number" class="form-control" id="baseline" name="baseline" form="myform2">
                            </div>




                            <div class="col">
                                <label for="target" class="form-label">Target</label>
                                <input type="number" class="form-control" id="target" name="target" form="myform2">
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="baseline_description" class="form-label">Baseline Description</label>
                            <textarea id="baseline_description" name="baseline_description" form="myform2" class="form-control" rows="3"
                                placeholder="Add any extra details about the Baseline"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="target_description" class="form-label">Target Description</label>
                            <textarea id="target_description" name="target_description" form="myform2" class="form-control" rows="3"
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
