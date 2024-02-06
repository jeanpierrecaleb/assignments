@extends('layouts.app_admin')



@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Program details > Outcomes of
                                {{ $program->name }} / Sub-Project </li>


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



            <!-- Sub Program or Project row-->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <a href="{{ url('planning/add-subpro/' . $program->id) }}"
                                        class="btn btn-dark mb-2"><i class="fa fa-plus" aria-hidden="true"></i> Add
                                        Sub-program</a>
                                    <!-- <button type="button" class="btn btn-dark w-sm-100" data-bs-toggle="modal" data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>Create Project</button> -->

                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end">

                                        <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                        <button type="button" class="btn btn-success mb-2">Export</button>
                                    </div>
                                </div>

                                <!-- end col-->
                            </div>
                            <br>

                            <div class="table-responsive">
                                <table id="example2" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Program</th>
                                            <th>Status</th>

                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($program->subprograms as $subprogram)
                                            <tr>
                                                <td class="id">
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="apps-ecommerce-products-details.html"
                                                            class="text-body"></a>
                                                        {{ $subprogram->id }}
                                                        <br>

                                                    </p>
                                                </td>
                                                <td class="name">
                                                    {{ $subprogram->name }}
                                                </td>
                                                <td class="program_id">
                                                    {{ $subprogram->program_id }}, {{ $subprogram->program->name }}

                                                </td>
                                                <td class="status">

                                                    {{ $subprogram->status }}

                                                </td>
                                                <td class="city">

                                                    <!-- <a  href="edit-employee.html"><i class="fas fa-pencil-alt m-r-5"></i></a>
                                                                            <a  href="#"><i class="fas fa-trash-alt m-r-5"></i></a> -->

                                                    <a style="color: black"
                                                        href="{{ url('planning/subpro/edit/' . $subprogram->id) }} "><i
                                                            class="fas fa-pencil-alt m-r-5"></i> </a>
                                                    <a style="color: black"
                                                        href="{{ url('planning/del-subpro/' . $subprogram->id) }}"
                                                        onclick="return confirm('Are you sure to delete it ?')"><i
                                                            class="fas fa-trash-alt m-r-5"></i></a>
                                                    {{-- <a style="color: black"
                                                        href="{{ url('planning/details-subpro/' . $program->id . '/' . $subprogram->id) }}"><i
                                                            class="fas fa-info m-r-5 "></i></a> --}}
                                                    <a style="color: black"
                                                        href="{{ url('planning/details-subpro/' . $program->id . '/' . $subprogram->id) }}"><i
                                                            class="fas fa-plus"></i></i></a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Department</th>
                                            <th>Office</th>

                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>






                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>


            <!-- Fin Project row -->


            <!-- Outcome-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <a href="{{ url('planning/add-outcome/' . $program->id) }}"
                                        class="btn btn-dark mb-2"><i class="mdi mdi-plus-circle me-2"></i><i
                                            class="fa fa-plus" aria-hidden="true"></i> Add
                                        Outcome</a>
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
                                            <th>Program</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($program->outcomes as $outcome)
                                            <tr>
                                                <td class="id">
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="apps-ecommerce-products-details.html"
                                                            class="text-body"></a>
                                                        {{ $outcome->id }}
                                                        <br>

                                                    </p>
                                                </td>
                                                <td class="name">
                                                    {{ $outcome->name }}
                                                </td>
                                                <td class="program_id">
                                                    {{ $outcome->program_id }}, {{ $outcome->program->name }}

                                                </td>
                                                <td class="status">
                                                    {{ $outcome->status }}
                                                </td>
                                                <td class="progress">

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
                                                        href="{{ url('planning/outcome/edit/' . $outcome->id) }} "><i
                                                            class="fas fa-pencil-alt m-r-5"></i> </a>
                                                    <a style="color: black"
                                                        href="{{ url('planning/del-outcome/' . $outcome->id) }}"
                                                        onclick="return confirm('Are you sure to delete it ?')"><i
                                                            class="fas fa-trash-alt m-r-5"></i></a>

                                                    <a style="color: black"
                                                        href="{{ url('planning/details-outcome/' . $program->id . '/' . $outcome->id) }}"><i
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


            <!-- Row information sur program -->
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
                                        <h3 class="mt-0">{{ $program->name }} <a
                                                href="{{ url('program/edit/' . $program->id) }} "
                                                class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a>
                                        </h3>
                                        <p class="mb-1">Added Date: {{ $program->created_at }}</p>
                                        <p class="font-16">

                                        </p>

                                        <!-- Product stock -->
                                        <div class="mt-3">
                                            <h4><span class="badge badge-success-lighten">Instock</span></h4>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Begining date</h6>
                                            <h3> {{ $program->startdate }} </h3>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="mt-4">
                                            <h6 class="font-14">End date</h6>
                                            <div class="d-flex">
                                                <p>{{ $program->endate }} </p>
                                            </div>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Description:</h6>
                                            <p> {{ $program->description }} </p>
                                        </div>

                                        <!-- Product information -->
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Last update</h6>
                                                    <p class="text-sm lh-150">{{ $program->updated_at }} </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Last Updater</h6>
                                                    <p class="text-sm lh-150"> {{ Auth::user()->name }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Activeness</h6>
                                                    <p class="text-sm lh-150">{{ $program->active }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->



                        </div>

                    </div>

                </div>
            </div> <!-- container -->

        </div> <!-- content -->

    </div>
@endsection
