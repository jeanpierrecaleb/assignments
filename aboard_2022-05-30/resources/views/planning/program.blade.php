@extends('layouts.app_admin')

@section('content')
    <!-- All the body ot he page -->


    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Program </li>

                        </ul>


                    </div>
                </div>
            </div>


            <!-- Begin filter date and else -->


            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.bars.wpabar')
                    <br>
                    <form>
                        <div class="row formtype">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>From</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>To</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Leave Status</label>
                                    <select class="form-control" id="sel1" name="sellist1">
                                        <option>Select</option>
                                        <option>Pending</option>
                                        <option>Approved</option>
                                        <option>Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Search</label>
                                    <a href="#" class="btn btn-success btn-block mt-0 search_button"> Search </a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- End filter date and else -->







            <!-- Begin of the datatable -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-dark mb-2"></i><i class="fa fa-plus" aria-hidden="true"></i> Add
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
                                        @foreach ($programs as $program)
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

                                                    <a style="color: black" href="{{ url('program/edit/'.$program->id ) }} "><i class="fas fa-pencil-alt m-r-5"></i> </a>
                                                        <a style="color: black" href="{{ url('del-program/'.$program->id) }}" onclick="return confirm('Are you sure to delete it ?')"><i class="fas fa-trash-alt m-r-5"></i></a>
                                                        <a style="color: black" href="{{url('details-program/'.$program->id) }}"><i class="fas fa-info m-r-5 "></i></a>

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
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

            <!-- End of the datatable -->

            <!-- end row -->















        </div>
    </div>


    <!-- Inclusion Create -->

    <!-- Create Institution by Modal -->
@endsection
