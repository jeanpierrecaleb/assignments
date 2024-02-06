@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">


            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Create Sub-program or Project of {{$program->name}} </li>

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




            <form action="{{ url('planning/create-subpro') }}" method="POST" id="myform">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label">Subprogram or Project Name</label>
                    <input type="text" id="name" class="form-control" name="name"
                        placeholder="Write the name of the directorate" form="myform" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Belonging Program</label>
                    <select id="program_id" name="program_id" form="myform" class="form-select" aria-label="Select a Program">
                        <option value=" " disabled>Select below</option>
                        <option value="{{$program->id}}" selected>{{$program->id}}, {{$program->name}}</option>
                    </select>
                </div>

                <div class="mb-3">

                    <input type="hidden" id="wpa_id" value="{{$program->wpa_id}}" class="form-control" name="wpa_id"
                    form="myform" placeholder="Id of the belonging Wpa of the belonging program" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select id="status" name="status" class="form-select" aria-label="Status applied by default" form="myform">
                        <option value="Waiting for submission" selected> Waiting for submission </option>
                        <option value="Submitted waiting for reviewing" disabled> Submitted Waiting for reviewing</option>
                        <option value="Reviewed waiting approuval" disabled>Reviewed waiting approuval</option>
                        <option value="Approved" disabled>Approved</option>
                    </select>
                </div>

                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                          <div class="col">
                            <label for="startdate" class="form-label">Program Start Date</label>
                            <input type="date" class="form-control" id="startdate" name="startdate" required>
                          </div>
                          <div class="col">
                            <label for="datepickerdedone" class="form-label">Porgram End Date</label>
                            <input type="date" class="form-control" id="endate" name="endate" required>
                          </div>
                        </div>
                    </form>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Objective</label>
                    <textarea id="objective" name="objective" form="myform" class="form-control"  rows="3"
                        placeholder="Add the objective about the request" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" form="myform" class="form-control"  rows="3"
                        placeholder="Add any extra details about the request" required></textarea>
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
