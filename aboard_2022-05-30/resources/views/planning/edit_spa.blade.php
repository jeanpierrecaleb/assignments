@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">


            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                        <li class="breadcrumb-item active"> Planning > Edit activity of ... </li>

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



            <form action="{{ url('planning/spactivity/update/'.$activity->id) }}" method="POST" id="myform">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mb-3">
                    <label for="name" class="form-label">Activity Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ $activity->name }}"
                        placeholder="Edit the name of the activity" form="myform" required>
                </div>



                <div class="mb-3">
                    <label class="form-label">Belonging Subprogram</label>
                    <select id="subprogram_id" name="subprogram_id" form="myform" class="form-select" aria-label="Select one">
                        <option value=" " disabled>Select below</option>
                        <option value="{{$activity->subprogram_id}}" selected>{{$activity->subprogram_id}}, {{$activity->subprogram->name}}</option>
                    </select>
                </div>

                <div class="mb-3">

                    <input type="hidden" id="program_id" value="{{$activity->subprogram->program_id}}" class="form-control" name="program_id"
                    form="myform" placeholder="Id of the belonging prog of the belonging program" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select id="status" name="status" class="form-select" aria-label="Status applied by default" form="myform">
                        <option value="{{ $activity->status }}" selected> {{ $activity->status }} </option>
                        <option value="Not started" > Not started </option>
                        <option value="In progress" > In progress </option>
                        <option value="Implemented" > Implemented </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Previous Year activity</label>
                    <select id="pyearactivity" name="pyearactivity" form="myform" class="form-select" aria-label="Select a previous year activity related ID">
                        <option value=" " disabled>Select below</option>
                        <option value="{{ $activity->pyearactivity }}" selected> {{ $activity->pyearactivity }} </option>

                    </select>
                </div>


                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                          <div class="col">
                            <label class="form-label">Category of the activity</label>
                                <select id="category" name="category" form="myform" class="form-select" aria-label="Select a category for the activity">
                                    <option value=" " disabled>Select below</option>
                                    <option value="{{ $activity->category }}" selected> {{ $activity->category }} </option>
                                </select>
                          </div>
                          <div class="col">
                            <label for="code" class="form-label">Activity Code</label>
                            <input type="text" id="code" class="form-control" name="code"  value="{{ $activity->code }}"
                                placeholder="Write the code of the activity" form="myform" required>
                          </div>
                        </div>
                    </form>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" id="location" class="form-control" name="location" value="{{ $activity->location }}"
                                placeholder="Edit the location of the activity" form="myform" required>
                </div>


                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                          <div class="col">
                            <label for="startdate" class="form-label">Activity Start Date</label>
                            <input type="date" value="{{ $activity->startdate }}" class="form-control" id="startdate" name="startdate" form="myform" required>
                          </div>
                          <div class="col">
                            <label for="endate" class="form-label">Activity End Date</label>
                            <input type="date" value="{{ $activity->endate }}" class="form-control" id="endate" name="endate" form="myform" required>
                          </div>
                        </div>
                    </form>
                </div>

                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                          <div class="col">
                            <label for="ecowas_budget" class="form-label">Ecowas Budget</label>
                            <input type="number" value="{{ $activity->ecowas_budget }}" class="form-control" id="ecowas_budget" name="ecowas_budget" form="myform" required>
                          </div>
                          <div class="col">
                            <label for="donor_budget" class="form-label">Donor Budget</label>
                            <input type="number" value="{{ $activity->donor_budget }}" class="form-control" id="donor_budget" name="donor_budget" form="myform" required>
                          </div>
                        </div>
                    </form>
                </div>


                <div class="mb-3">
                    <label for="responsible_officer" class="form-label">Responsible Officer</label>
                    <input type="text" value="{{ $activity->responsible_officer }}" id="responsible_officer" name="responsible_officer" form="myform" class="form-control"  rows="3"
                        placeholder="Add any extra details about the request" required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Belonging Output</label>
                    <select id="output_id" name="output_id" form="myform" class="form-select" aria-label="Select an output">
                        <option value=" " disabled>Select below</option>
                        <option value="{{ $activity->output_id }}" selected>{{ $activity->output_id }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="l_comments" class="form-label">Local comments</label>
                    <textarea id="l_comments"  name="l_comments" form="myform" class="form-control"  rows="3"
                        placeholder="Add any comment or details about the request" required>{{ $activity->l_comments }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <a type="button" class="btn btn-dark" href="{{url()->previous()}}" >Cancel</a>
                    <button type="submit" form="myform" value="Submit">Submit</button>
                </div>

            </form>

        </div>


    </div>



<!-- Inclusion Create -->

    <!-- Create Modal Indicator -->
    <div class="modal fade" id="createproject" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Create Indicator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="modal-body">
                    <form action="institution" method="POST">
                            {{ csrf_field() }}


                        <div class="mb-3">
                            <label for="name" class="form-label">Institution Name</label>
                            <input type="text" class="form-control" name="name"
                                placeholder="Say what is the Institution Name ">
                        </div>


                        <div class="deadline-form">
                            <form>
                                <div class="row g-3 mb-3">
                                    <div class="col">
                                        <label for="date_creation" class="form-label">Date of creation</label>
                                        <input type="date" name="date_creation" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="town" class="form-label">Town of location</label>
                                        <input type="text" class="form-control" name="town" placeholder="Say where it is">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3"
                                placeholder="Add any extra details about the request"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultipleone" class="form-label">Institution Images & Document</label>
                            <input class="form-control" type="file" id="formFileMultipleone" multiple>
                        </div>





                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>

                    </form>
                </div>



            </div>
        </div>

        <!--End create -->
    </div>










@endsection
