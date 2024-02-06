@extends('layouts.app_admin')



@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Outcome details > Indicators of
                                {{ $outcome->name }}
                            </li>


                        </ul>


                    </div>
                </div>
            </div>


            <!-- Begin filter date and else -->


            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.bars.wpabar')
                    <br>
                    <!-- Begin form filter -->

                    <!-- End form of the filter -->
                </div>
            </div>


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    {{-- <a href="{{ url('planning/add-indicators/' . $outcome->id) }}" class="btn btn-dark mb-2"><i
                                            class="mdi mdi-plus-circle me-2"></i><i class="fa fa-plus"
                                            aria-hidden="true"></i> Add
                                        Indicator</a> --}}

                                    <a class="btn btn-dark mb-2" data-toggle="modal" data-target="#createproject"><i
                                            class="fa fa-plus" aria-hidden="true"></i> Add Indicator for outcome</a>
                                    <!-- <button type="button" class="btn btn-dark w-sm-100" data-bs-toggle="modal" data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>Create Project</button> -->

                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end">
                                        <button type="button" class="btn btn-success mb-2">Export</button>
                                    </div>
                                </div>

                                <!-- end col-->
                            </div>
                            <br>

                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Outcome</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($outcome->ocindicators as $ocindicator)
                                            <tr>
                                                <td class="id">
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="apps-ecommerce-products-details.html"
                                                            class="text-body"></a>
                                                        {{ $ocindicator->id }}
                                                        <br>

                                                    </p>
                                                </td>
                                                <td class="name">
                                                    {{ $ocindicator->name }}
                                                </td>
                                                <td class="outcome_id">
                                                    {{ $ocindicator->outcome_id }}, {{ $ocindicator->outcome->name }}

                                                </td>
                                                <td class="status">
                                                    {{ $ocindicator->status }}
                                                </td>
                                                <td class="progress">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                                          40% Complete (success)
                                                        </div>
                                                      </div>
                                                </td>
                                                <!-- <td class="text-right">
                                                                            <div class="dropdown dropdown-action">  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                                                <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-staff.html"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset"><i class="fas fa-trash-alt m-r-5"></i> Delete</a> </div>
                                                                            </div>
                                                                        </td> -->

                                                <td>


                                                    <!-- <a  href="edit-employee.html"><i class="fas fa-pencil-alt m-r-5"></i></a>
                                                                            <a  href="#"><i class="fas fa-trash-alt m-r-5"></i></a> -->

                                                    <a style="color: black"
                                                        href="{{ url('planning/ocindicator/edit/' . $ocindicator->id) }} "><i
                                                            class="fas fa-pencil-alt m-r-5"></i> </a>
                                                    <a style="color: black"
                                                        href="{{ url('planning/del-ocindicator/' . $ocindicator->id) }}"
                                                        onclick="return confirm('Are you sure to delete it ?')"><i
                                                            class="fas fa-trash-alt m-r-5"></i></a>

                                                    <a style="color: black"
                                                        href="{{ url('planning/details-ocindicator/' . $outcome->id . '/' . $ocindicator->id) }}"><i
                                                            class="fas fa-info m-r-5 "></i></a>

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Work Plan</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>






                            </div>
                        </div>


                    </div>

                </div>



















                <br>
                <br>
                <br>





            </div>
            <!-- end row-->

            <!-- Sub Program or Project row-->

            <!-- Fin Project row -->


            <!-- Row information sur Outcome -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-lg-5">
                                    <!-- Product image -->
                                    <a href="javascript: void(0);" class="text-center d-block mb-4">
                                        <img src="{{ asset('assets/img/placeholder.jpg') }}" class="img-fluid"
                                            style="max-width: 280px;" alt="Institution image">
                                    </a>


                                </div> <!-- end col -->
                                <div class="col-lg-7">
                                    <form class="ps-lg-4">
                                        <!-- Product title -->
                                        <h3 class="mt-0">{{ $outcome->name }} <a
                                                href="{{ url('planning/outcome/edit/' . $outcome->id) }} "
                                                class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a>
                                        </h3>
                                        <p class="mb-1">Added Date: {{ $outcome->created_at }}</p>
                                        <p class="font-16">

                                        </p>

                                        <!-- Product stock -->
                                        <div class="mt-3">
                                            <h4><span class="badge badge-success-lighten">Instock</span></h4>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Begining date</h6>
                                            <h3> {{ $outcome->startdate }} </h3>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="mt-4">
                                            <h6 class="font-14">End date</h6>
                                            <div class="d-flex">
                                                <p>{{ $outcome->endate }} </p>
                                            </div>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Description:</h6>
                                            <p> {{ $outcome->description }} </p>
                                        </div>

                                        <!-- Product information -->
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Last update</h6>
                                                    <p class="text-sm lh-150">{{ $outcome->updated_at }} </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Last Updater</h6>
                                                    <p class="text-sm lh-150"> {{ Auth::user()->name }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Activeness</h6>
                                                    <p class="text-sm lh-150">{{ $outcome->active }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->

                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-centered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Department</th>
                                            <th>Direction</th>
                                            <th>Division</th>
                                            <th>Users</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ASOS Ridley Outlet - NYC</td>
                                            <td>$139.58</td>
                                            <td>
                                                <div class="progress-w-percent mb-0">
                                                    <span class="progress-value">478 </span>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 56%;" aria-valuenow="56" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$1,89,547</td>
                                        </tr>
                                        <tr>
                                            <td>Marco Outlet - SRT</td>
                                            <td>$149.99</td>
                                            <td>
                                                <div class="progress-w-percent mb-0">
                                                    <span class="progress-value">73 </span>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 16%;" aria-valuenow="16" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$87,245</td>
                                        </tr>
                                        <tr>
                                            <td>Chairtest Outlet - HY</td>
                                            <td>$135.87</td>
                                            <td>
                                                <div class="progress-w-percent mb-0">
                                                    <span class="progress-value">781 </span>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 72%;" aria-valuenow="72" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$5,87,478</td>
                                        </tr>
                                        <tr>
                                            <td>Nworld Group - India</td>
                                            <td>$159.89</td>
                                            <td>
                                                <div class="progress-w-percent mb-0">
                                                    <span class="progress-value">815 </span>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 89%;" aria-valuenow="89" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$55,781</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->

                        </div>

                    </div>

                </div>
            </div> <!-- container -->

        </div> <!-- content -->

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
                    <form action="{{ url('planning/create-ocindicator') }}" method="POST" id="myform2">
                        {{ csrf_field() }}


                        <div class="mb-3">
                            <label for="name" class="form-label">Indicator Title</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Say what is the name of the Outcome indicator ">
                        </div>

                        <div class="mb-3">

                            <input type="hidden" class="form-control" value="{{ $outcome->id }}" id="outcome_id"
                                name="outcome_id" placeholder="Say what is the name of the Outcome Id ">
                        </div>

                        <div class="mb-3">

                            <input type="hidden" class="form-control" value="{{ $outcome->program_id }}" id="program_id"
                                name="program_id" placeholder="Say what is the name of the Program Id ">
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
                                        <select class="form-select" id="measure_unit" name="measure_unit"
                                            form="myform2">
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




                            <button type="submit" class="btn btn-primary" form="myform2">Create</button>
                        </div>

                    </form>
                </div>



            </div>
        </div>

        <!--End create -->
    </div>
@endsection
