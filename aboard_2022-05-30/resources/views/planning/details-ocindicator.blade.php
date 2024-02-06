@extends('layouts.app_admin')



@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Ocindicator details


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
                                        <h3 class="mt-0">{{ $ocindicator->name }} <a
                                                href="{{ url('planning/outcome/edit/' . $ocindicator->id) }} "
                                                class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a>
                                        </h3>
                                        <p class="mb-1">Added Date: {{ $ocindicator->created_at }}</p>
                                        <p class="font-16">

                                        </p>

                                        <!-- Product stock -->
                                        <div class="mt-3">
                                            <h4><span class="badge badge-success-lighten">Instock</span></h4>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Begining date</h6>
                                            <h3> {{ $ocindicator->baseline_date }} </h3>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="mt-4">
                                            <h6 class="font-14">End date</h6>
                                            <div class="d-flex">
                                                <p>{{ $ocindicator->target_date }} </p>
                                            </div>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Description:</h6>
                                            <p> {{ $ocindicator->description }} </p>
                                        </div>

                                        <!-- Product information -->
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Last update</h6>
                                                    <p class="text-sm lh-150">{{ $ocindicator->updated_at }} </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Last Updater</h6>
                                                    <p class="text-sm lh-150"> {{ Auth::user()->name }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Activeness</h6>
                                                    <p class="text-sm lh-150">{{ $ocindicator->active }}</p>
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












@endsection
