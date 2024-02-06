role index
@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Settings > Users
                            </li>


                        </ul>


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.bars.adminbar')
                    <br>
                    <!-- Begin form filter -->

                    <!-- End form of the filter -->
                </div>
            </div>

            <div class="card-header">{{ __('Users') }}</div>

            {{-- Insertion of the table --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <a class="btn btn-dark mb-2" href="{{route('register')}}"> + Add
                                        User</a>
                                    <!-- <i class="mdi mdi-plus-circle me-2"> <i class="fa fa-plus me-2"> </i> -->
                                    <!-- <button type="button" class="btn btn-dark w-sm-100" data-bs-toggle="modal" data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>Create Project</button> -->
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end">
                                        <button type="button" class="btn btn-light mb-2 me-1"><i
                                                class="mdi mdi-cog-outline"></i></button>
                                        <!-- <a href="#" class="btn btn-success float-right ml-2"> Import </a> -->
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
                                            <th>Email</th>
                                            <th>Directorate</th>
                                            <th>Active ? </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="id">
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="apps-ecommerce-products-details.html"
                                                            class="text-body">{{ $user->id }}</a>

                                                        <br>

                                                    </p>
                                                </td>
                                                <td class="name">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="email">

                                                    {{ $user->email }}

                                                </td>
                                                <td class="directorate">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="name">
                                                    {{ $user->name }}
                                                </td>
                                                <!-- <td class="text-right">
                                                                <div class="dropdown dropdown-action">  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-staff.html"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset"><i class="fas fa-trash-alt m-r-5"></i> Delete</a> </div>
                                                                </div>
                                                            </td> -->

                                                <td>


                                                    <!-- <a  href="edit-employee.html"><i class="fas fa-pencil-alt m-r-5"></i></a>
                                                                <a  href="#"><i class="fas fa-trash-alt m-r-5"></i></a> -->

                                                    <a style="color: black" class="btn btn-secondary"
                                                        href="{{ route('admin.users.show', $user->id) }} ">Roles </a>
                                                    {{-- <a style="color: black" href="admin.roles" <i
                                                            class="fas fa-pencil-alt m-r-5"></i>
                                                        onclick="return confirm('Are you sure to delete it ?')"><i
                                                            class="fas fa-trash-alt m-r-5"></i></a> <i
                                                            class="fas fa-info m-r-5 "></i> --}}
                                                    {{-- <a style="color: black" class="btn btn-secondary" href="{{ url('admin.users') }}">Perm.  </a> --}}

                                                    <form method="POST" style='display:inline'
                                                        action="{{ route('admin.users.destroy', $user->id) }}"
                                                        onsubmit="return confirm('Are you sure to delete it ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        {{--<i class="fas fa-trash-alt m-r-5"> </i>--}}
                                                        <button style="" type="submit"> Delete
                                                        </button>
                                                    </form>


                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>


                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>


        </div>
    </div>
@endsection
