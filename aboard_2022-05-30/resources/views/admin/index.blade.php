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

            <br>


            <p> Use roles under Users just right after here to easy the way of attributing </p>

        </div>
    </div>
@endsection

