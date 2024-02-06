@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">


            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Edit and update Subprogram or Project </li>

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


        <form action="{{ url('planning/subpro/update/'.$subprogram->id) }}" method="POST" id="myform"  enctype="multipart/form-data"  >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="mb-3">
                <label for="name" class="form-label">Subprogram Name</label>
                <input type="text" id="name" value="{{ $subprogram->name }}"  class="form-control" name="name"
                    placeholder="Say what is the title of your Program " required>
            </div>

            <div class="mb-3">
                <label class="form-label">Belonging Program</label>
                <select id="program_id" name="program_id" class="form-select" aria-label="Select a Program" required>
                    <option value=" {{ $subprogram->program->id }} " selected> {{ $subprogram->program->id }}, {{ $subprogram->program->name }} </option>
                    {{-- @foreach ($wpas as $item)
                        <option value="{{ $item->id}}" disabled>{{  $item->id }}, {{$item->name }}, {{ $item->directorate->name }}</option>
                    @endforeach --}}

                </select>
            </div>

            <div class="mb-3">

                <input type="hidden" id="wpa_id" value="{{$subprogram->program->wpa_id}}" class="form-control" name="wpa_id"
                form="myform" placeholder="Id of the belonging Wpa of the belonging program" required>
            </div>

            {{-- <input type="hidden" id="user_id" name="user_id" value="{{$wpa->user_id}}"> --}}

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select id="status" name="status" class="form-select" aria-label="Status applied by default" required>
                    <option value="{{ $subprogram->status}}" selected> {{$subprogram->status}} </option>
                    <option value="Waiting for submittion">Waiting for submittion</option>
                </select>
            </div>





            <div class="mb-3">
                <label class="form-label"> Active ? </label>
                <select id="active" name="active" class="form-select" aria-label="Is it ongoing ? " required>
                    <option value="{{$subprogram->active}}" selected>{{$subprogram->active}}</option>
                    <option value="yes">yes</option>
                    <option value="no">no</option>
                    <option value="no">on pause</option>
                </select>
            </div>



            <div class="deadline-form">
                <form>
                    <div class="row g-3 mb-3">
                      <div class="col">
                        <label for="startdate" class="form-label">Program Start Date</label>
                        <input type="date" value="{{ $subprogram->startdate }}"  class="form-control" id="startdate" name="startdate">
                      </div>
                      <div class="col">
                        <label for="datepickerdedone" class="form-label">Program End Date</label>
                        <input type="date" value="{{ $subprogram->endate }}" class="form-control" id="endate" name="endate" >
                      </div>
                    </div>

                </form>
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" form="myform" class="form-control" id="description" rows="3"
                    placeholder="Add any extra details about the request"> {{ $subprogram->description }} </textarea>
            </div>

            <div class="mb-3">
                <label for="objective" class="form-label">Objective</label>
                <textarea id="objective" name="objective" form="myform" class="form-control"  rows="3"
                    placeholder="Add the objective about the request"> {{$subprogram->objective}} </textarea>
            </div>

            <div class="form-group mb-3">
                <a href="{{url()->previous()}}"><button>Cancel</button></a>
                <button type="submit" form="myform" value="Submit">Update Data</button>
            </div>

        </form>


        <!-- End of the new form -->
















        </div>
    </div>

@endsection
