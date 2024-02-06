@extends('layouts.app_admin')

@section('content')
    <!-- All the body ot he page -->


    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Annual Work Plan </li>

                        </ul>


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.bars.wpabar')
                    <br>
                    <!-- Begin form filter -->

                    <!-- End form of the filter -->
                </div>
            </div>


            <!-- Begin filter date and else -->


            {{-- <div class="row">
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
            </div> --}}


            <!-- End filter date and else -->





            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">Annual Work Plan

                            <!-- Default switch -->


                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <br>
            <!-- Begin of the datatable -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <a href="{{ url('planning/add-wpa') }}" class="btn btn-dark mb-2"></i>+ Add
                                        Work Plan </a>
                                    <!-- <button type="button" class="btn btn-dark w-sm-100" data-bs-toggle="modal" data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>Create Project</button> -->

                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end">
                                        {{-- <button type="button" class="btn btn-success mb-2 me-1"><i
                                                class="mdi mdi-cog-outline"></i></button> --}}
                                        <button type="button" class="btn btn-secondary mb-2">View Tree</button>
                                        <button type="button" class="btn btn-light mb-2 me-1">Import</button>
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
                                            <th>Directorate</th>
                                            <th>Status</th>
                                            @if (Auth()->user()->hasRole('focal point'))
                                                <th>Submit</th>
                                            @endif
                                            @role('director')
                                                <th>Review</th>
                                            @endrole
                                            @if (Auth()->user()->hasRole('head of department'))
                                                <th>Approve</th>
                                            @endif


                                            <th>Actions</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wpas as $wpa)
                                            <tr>

                                                <td class="id">
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="apps-ecommerce-products-details.html"
                                                            class="text-body"></a>
                                                        {{ $wpa->id }}
                                                        <br>

                                                    </p>
                                                </td>
                                                <td class="name">
                                                    {{ $wpa->name }}
                                                </td>
                                                <td class="directorate_id">
                                                    {{ $wpa->directorate_id }}, {{ $wpa->directorate->name }}, <br>
                                                    {{ $wpa->directorate->department->institution->name }}

                                                </td>
                                                <td id="status-{{$wpa->id}}" class="status">
                                                    {{ $wpa->status }}
                                                </td>

                                                <!-- <td class="text-right">
                                                                                      <div class="dropdown dropdown-action">  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                                                      <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-staff.html"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset"><i class="fas fa-trash-alt m-r-5"></i> Delete</a> </div>
                                                                                        </div>
                                                                                    </td> -->

                                                @if (Auth()->user()->hasRole('focal point'))
                                                    <td class="status">

                                                        <div class="form-check form-switch">
                                                            <input data-id="{{ $wpa->id }}" class="form-check-input"
                                                                type="checkbox" role="switch" id="sbtoggle"
                                                                {{ $wpa->status == 'Submitted waiting for reviewing' ? 'checked' : '' }}
                                                                {{ $wpa->status == 'Reviewed waiting for approval' ? 'checked' : '' }}
                                                                {{ $wpa->status == 'Approved' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="sbtoggle">On</label>
                                                        </div>






                                                        {{-- id="flexSwitchCheckDefault"
                                                        <input data-id="{{ $wpa->id }}" class="toggle-class"
                                                            type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                            data-toggle="toggle" data-on="yes" data-off="no"
                                                            {{ $wpa->status == 'Submitted waiting for reviewing' ? 'checked' : '' }}
                                                            {{ $wpa->status == 'Reviewed waiting for approval' ? 'checked' : '' }}
                                                            {{ $wpa->status == 'Approved' ? 'checked' : '' }}>

                                                        {{-- Submission --}}

                                                    </td>
                                                @endif
                                                @if (Auth()->user()->hasRole('director'))
                                                    <td class="status">

                                                        {{-- <input data-id="{{ $wpa->id }}" class="toggle-rv"
                                                            type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                            data-toggle="toggle" data-on="on" data-off="of"

                                                            {{ $wpa->status == 'Reviewed waiting for approval' ? 'checked' : '' }}
                                                            {{ $wpa->status == 'Approved' ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="first_toggle"></label>
                                                        Reviewing --}}




                                                        <div class="form-check form-switch">
                                                            <input data-id="{{ $wpa->id }}" class="form-check-input"
                                                                type="checkbox" role="switch" id="rvtoggle"
                                                                {{ $wpa->status == 'Reviewed waiting for approval' ? 'checked' : '' }}
                                                                {{ $wpa->status == 'Approved' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="rvtoggle">On</label>
                                                        </div>




                                                    </td>
                                                @endif
                                                @if (Auth()->user()->hasRole('head of department'))
                                                    <td class="status">

                                                        <div class="form-check form-switch">
                                                            <input data-id="{{ $wpa->id }}" class="form-check-input"
                                                                type="checkbox" role="switch" id="aptoggle"
                                                                {{ $wpa->status == 'Approved' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="rvtoggle">On</label>
                                                        </div>



                                                    </td>
                                                @endif



                                                <td>
                                                    <a style="color: black"
                                                        href="{{ url('planning/wpa/edit/' . $wpa->id) }} "><i
                                                            class="fas fa-pencil-alt m-r-5"></i> </a>
                                                    <a style="color: black"
                                                        href="{{ url('planning/del-wpa/' . $wpa->id) }}"
                                                        onclick="return confirm('Are you sure to delete it ?')"><i
                                                            class="fas fa-trash-alt m-r-5"></i></a>
                                                    {{-- <a style="color: black" href="{{url('planning/details-wpa/'.$wpa->id) }}"><i class="fas fa-info m-r-5 "></i></a> --}}
                                                    <a style="color: black"
                                                        href="{{ url('planning/details-wpa/' . $wpa->id) }}"><i
                                                            class="fas fa-plus"></i></i></a>


                                                </td>

                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Directorate</th>
                                            <th>Status</th>

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
