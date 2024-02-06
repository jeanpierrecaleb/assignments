role index
@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Settings > Create Permissions
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

            <div class="card-header">{{ __('Permission Creation') }}</div>

            {{-- Insertion of the table --}}


            <form action="{{ route('admin.permissions.store') }}" method="POST" id="myform">
                {{ csrf_field() }}
                <div class="mb-3">
                    <br>
                    <label for="name" class="form-label">Permission Name</label>
                    <input type="text" id="name" class="form-control" name="name"
                        placeholder="Say what is the Name of your Permission">
                        @error('name') <span class="text-red-400 text-sm"> {{$message}} </span> @enderror
                </div>


                {{-- <div class="mb-3">
                    <label class="form-label">Country of location</label>
                    <select id="country" name="country" class="form-select" aria-label="Default select a country" required>
                        <option value=" " selected disabled>Select below</option>
                        <option value="Afganistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Canada">Canada</option>

                    </select>
                </div>

                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="date_creation" class="form-label">Date of creation</label>
                                <input type="date" id="date_creation" name="date_creation" class="form-control">
                            </div>
                            <div class="col">
                                <label for="town" class="form-label">Town of location</label>
                                <input type="text" id="town" class="form-control" name="town"
                                    placeholder="Say where it is" required>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" id="address" form="myform" class="form-control" name="address"
                        placeholder="Say the street address " required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" form="myform" class="form-control" id="description" rows="3"
                        placeholder="Add the role or any extra details about the request" required></textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <button type="submit" form="myform" value="Submit">Submit</button>
                </div>

            </form>


        </div>
    </div>
@endsection
