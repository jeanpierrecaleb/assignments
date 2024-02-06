@extends('layouts.app_admin')



@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > WPA details > Programs of {{ $wpa->name }} </li>


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
                                    <a href="{{url('planning/add-program/'.$wpa->id) }}" class="btn btn-dark mb-2"><i
                                            class="mdi mdi-plus-circle me-2"></i><i class="fa fa-plus" aria-hidden="true"></i> Add
                                        Program</a>
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
                                            <th>Work Plan</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($programs as $program) --}}
                                        @foreach ($wpa->programs as $program)
                                            <tr>
                                                <td class="id">
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="apps-ecommerce-products-details.html"
                                                            class="text-body"></a>
                                                        {{$program->id}}
                                                        <br>

                                                    </p>
                                                </td>
                                                <td class="name">
                                                    {{$program->name}}
                                                </td>
                                                <td class="wpa_id">
                                                    {{$program->wpa_id}}, {{$program->wpa->name}}

                                                </td>
                                                <td class="status">
                                                    {{$program->status}}
                                                </td>
                                                <td class="progress">
                                                    Progress
                                                </td>
                                                <!-- <td class="text-right">
                                                            <div class="dropdown dropdown-action">  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-staff.html"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset"><i class="fas fa-trash-alt m-r-5"></i> Delete</a> </div>
                                                            </div>
                                                        </td> -->

                                                <td>


                                                    <!-- <a  href="edit-employee.html"><i class="fas fa-pencil-alt m-r-5"></i></a>
                                                            <a  href="#"><i class="fas fa-trash-alt m-r-5"></i></a> -->

                                                    <a style="color: black" href="{{ url('planning/program/edit/'.$program->id ) }} "><i class="fas fa-pencil-alt m-r-5"></i> </a>
                                                    <a style="color: black" href="{{ url('planning/del-program/'.$program->id) }}" onclick="return confirm('Are you sure to delete it ?')"><i class="fas fa-trash-alt m-r-5"></i></a>
                                                    {{-- <a style="color: black" href="{{url('planning/details-program/'.$wpa->id.'/'. $program->id ) }}"> <i class="fas fa-info m-r-5 "></i></a> --}}
                                                    <a style="color: black" href="{{url('planning/details-program/'.$wpa->id.'/'. $program->id ) }}">  <i class="fas fa-plus"></i> </a>

                                                    {{-- <i class="fas fa-plus"></i> --}}
                                                    {{-- <a href="{{ url('sig/edit/ ' . $value->id . '/' . $value->ticketid .')}}"> --}}

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




                <div class="col-12">

                    <div class="card">
                        <div class="card-body">











                            <br>
                            <br>
                            <br>

                            <div class="row">
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
                                        <h3 class="mt-0">{{ $wpa->name }} <a
                                                href="{{ url('wpa/edit/'.$wpa->id ) }} " class="text-muted"><i
                                                    class="mdi mdi-square-edit-outline ms-2"></i></a> </h3>
                                        <p class="mb-1">Added Date: {{$wpa->created_at}}</p>
                                        <p class="font-16">

                                        </p>

                                        <!-- Product stock -->
                                        <div class="mt-3">
                                            <h4><span class="badge badge-success-lighten">Instock</span></h4>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Begining date</h6>
                                            <h3> {{ $wpa->startdate }} </h3>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="mt-4">
                                            <h6 class="font-14">End date</h6>
                                            <div class="d-flex">
                                                <p>{{ $wpa->endate }} </p>
                                            </div>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Description:</h6>
                                            <p> {{ $wpa->description}} </p>
                                        </div>

                                        <!-- Product information -->
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Last update</h6>
                                                    <p class="text-sm lh-150">{{ $wpa->updated_at }} </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Last Updater</h6>
                                                    <p class="text-sm lh-150"> {{ Auth::user()->name }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Activeness</h6>
                                                    <p class="text-sm lh-150">{{ $wpa->active}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div> <!-- end col -->
                            </div> <!-- end row-->

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

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    </div>
@endsection
