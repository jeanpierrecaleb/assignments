@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper" style="background: #F4ECC2;">
        <div class="content container-fluid">


            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Planning > Review > Edit and update WPA </li>

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






        <!-- New form

        <form action="{{ url('edit-wpa') }}" method="POST" id="myform">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label">Work Plan Name</label>
                    <input type="text" id="name" class="form-control" name="name"
                        placeholder="Write the name of the directorate">
                </div>
                <div class="mb-3">
                    <label class="form-label">Belonging Directorate</label>
                    <select id="directorate_id" name="directorate_id" class="form-select" aria-label="Select a Directorate">
                        <option value=" " selected disabled>Select below</option>

                        <option value="A"> A </option>
                        <option value="B"> B </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select id="status" name="status" class="form-select" aria-label="Status applied by default">
                        <option value="Waiting for review" selected>Waiting for review</option>
                        <option value="Reviewed waiting approuval" disabled>Reviewed waiting approuval</option>
                        <option value="Approuved" disabled >Approuved</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"> Active ? </label>
                    <select id="active" name="active" class="form-select" aria-label="Is it ongoing < ">
                        <option value=" " selected>Select below</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="no">On pause</option>
                    </select>
                </div>

                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                          <div class="col">
                            <label for="startdate" class="form-label">Work Plan Start Date</label>
                            <input type="date" class="form-control" id="startdate" name="startdate">
                          </div>
                          <div class="col">
                            <label for="datepickerdedone" class="form-label">Work Plan End Date</label>
                            <input type="date" class="form-control" id="endate" name="endate" >
                          </div>
                        </div>

                    </form>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" form="myform" class="form-control"  rows="3"
                        placeholder="Add any extra details about the request"></textarea>
                </div>

                <div class="form-group mb-3">
                    <button type="submit" form="myform" value="Submit">Submit</button>
                </div>

            </form>


        -->

        <form action="{{ url('planning/rv/wpa/update/'.$wpa->id) }}" method="POST" id="myform"  enctype="multipart/form-data"  >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="mb-3">
                <label for="name" class="form-label">Work Plan Name</label>
                <input type="text" id="name" value="{{ $wpa->name }}"  class="form-control" name="name"
                    placeholder="Say what is the Name of your institution ">
            </div>

            <div class="mb-3">
                <label class="form-label">Belonging Directorate</label>
                <select id="directorate_id" name="directorate_id" class="form-select" aria-label="Select a Directorate">
                    <option value=" {{ $wpa->directorate_id }} " selected> {{ $wpa->directorate_id }}, {{ $wpa->directorate->name }}, {{ $wpa->directorate->city }}, {{ $wpa->directorate->department->name }} </option>
                    @foreach ($directorates as $item)
                        <option value="{{ $item->id}}" disabled>{{  $item->id }}, {{$item->name }}, {{ $item->city }}</option>
                    @endforeach

                </select>
            </div>

            <input type="hidden" id="user_id" name="user_id" value="{{$wpa->user_id}}">


            <div class="mb-3">
                <label class="form-label">Status</label>
                <select id="status" name="status" class="form-select" aria-label="Status applied by default">
                    <option value="{{ $wpa->status}}"> {{$wpa->status}} </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Submit</label>
                <input type="checkbox" name="ckecksbmt" {{ ($wpa->status == 'Submitted waiting for reviewing' ? 'checked' : '')}}>
                <label for="name" class="form-label"> Reviewed ? </label>
                <input type="checkbox" name="ckecksbmtrv" {{ ($wpa->status == 'Reviewed waiting for appoval' ? 'checked' : '')}}>
            </div>




            <div class="mb-3">
                <label class="form-label"> Active ? </label>
                <select id="active" name="active" class="form-select" aria-label="Is it ongoing < ">
                    <option value="{{$wpa->active}}" selected>{{$wpa->active}}</option>
                    @if ($wpa->active=="yes")
                    <option value="yes" disabled>yes</option>
                    @else
                    <option value="yes">yes</option>
                    @endif
                    <option value="no">no</option>
                    <option value="on pause">on pause</option>
                </select>
            </div>



            <div class="deadline-form">
                <form>
                    <div class="row g-3 mb-3">
                      <div class="col">
                        <label for="startdate" class="form-label">Work Plan Start Date</label>
                        <input type="date" value="{{ $wpa->startdate }}"  class="form-control" id="startdate" name="startdate">
                      </div>
                      <div class="col">
                        <label for="datepickerdedone" class="form-label">Work Plan End Date</label>
                        <input type="date" value="{{ $wpa->endate }}" class="form-control" id="endate" name="endate" >
                      </div>
                    </div>

                </form>
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" form="myform" class="form-control" id="description" rows="3"
                    placeholder="Add any extra details about the request"> {{ $wpa->description }} </textarea>
            </div>

            <div class="form-group mb-3">
                <button type="submit" form="myform" value="Submit">Update Data</button>
            </div>

        </form>


        <!-- End of the new form -->
















        </div>
    </div>

@endsection
