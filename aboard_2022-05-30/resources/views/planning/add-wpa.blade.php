@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">


            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Create Work Plan </li>

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




            <form action="{{ url('planning/create-wpa') }}" method="POST" id="myform">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label">Work Plan Name</label>
                    <input type="text" id="name" class="form-control" name="name"
                        placeholder="Write the name of the directorate" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Belonging Directorate</label>
                    <select id="directorate_id" name="directorate_id" class="form-select" aria-label="Select a Directorate" required>
                        <option value=" " selected disabled>Select below</option>

                        <option value="{{ auth()->user()->directorate_id }}"> {{ auth()->user()->directorate_id }}, {{ auth()->user()->directorate->name }}, {{ auth()->user()->directorate->city }} </option>
                        <option value=" " disabled> You belong to one directorate </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select id="status" name="status" class="form-select" aria-label="Status applied by default">
                        <option value="Waiting for submittion" selected>Waiting for submission</option>
                        <option value="Submitted waiting for review" disabled> Submitted waiting for review</option>
                        <option value="Reviewed waiting approuval" disabled>Reviewed waiting approuval</option>
                        <option value="Approved" disabled >Approved</option>
                    </select>
                </div>

                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                          <div class="col">
                            <label for="startdate" class="form-label">Work Plan Start Date</label>
                            <input type="date" class="form-control" id="startdate" name="startdate" required>
                          </div>
                          <div class="col">
                            <label for="datepickerdedone" class="form-label">Work Plan End Date</label>
                            <input type="date" class="form-control" id="endate" name="endate" required>
                          </div>
                        </div>

                    </form>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" form="myform" class="form-control"  rows="3"
                        placeholder="Add any extra details about the request" required> </textarea>
                </div>

                <div class="form-group mb-3">
                    <a href="{{url()->previous()}}"><button>Cancel</button></a>
                    <button type="submit" form="myform" value="Submit">Submit</button>
                </div>

            </form>








        </div>



    </div>
@endsection
