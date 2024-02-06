role index
@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">

                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Settings > Edit Permissions
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

            <div class="card-header">{{ __('Permission Updating') }}</div>

            {{-- Insertion of the table --}}


            {{-- <div class="card">
                <div class="card-body"> --}}
                    <form action="{{ route('admin.permissions.update', $permission) }}" method="POST" id="myform">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="mb-3">
                            <br>
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" id="name" value="{{ $permission->name }}" class="form-control"
                                name="name" placeholder="Say what is the Name of your Permission">
                            @error('name')
                                <span class="text-red-400 text-sm"> {{ $message }} </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <button type="submit" form="myform" value="Submit">Submit</button>
                        </div>

                    </form>


                    <div class="mb-3">
                        <label class="form-label">Roles</label> <br>
                        @if ($permission->roles)
                            @foreach ($permission->roles as $permission_role)
                                {{-- <spa>{{ $role_permission->name }}</spa> --}}

                                <form method="POST" style="display:inline;"
                                    action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}"
                                    onsubmit="return confirm('Are you sure to delete it ?');">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <i class="fas fa-trash-alt m-r-5"> </i> --}}
                                    <button style="background-color: yellow" type="submit"> {{ $permission_role->name }}
                                    </button>
                                </form>
                            @endforeach
                        @endif

                    </div>


                    <form action="{{ route('admin.permissions.roles', $permission->id) }}" method="POST" id="myform2">
                        {{ csrf_field() }}
                        <div class="mb-3">

                            <label for="permission" class="form-label">Roles</label>
                            {{-- <input type="text"  id="permission" value="{{$role->name}}" class="form-control" name="permission"
                        placeholder="Say what is the Name of your permission"> --}}

                            <select id="role" name="role" class="form-select"
                                aria-label="Default select a role" form="myform2" required>
                                <option value=" " selected disabled>Select below</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="text-red-400 text-sm"> {{ $message }} </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <button type="submit" form="myform2" value="Submit">Assign</button>
                        </div>

                    </form>



               {{-- </div>
            </div> --}}
        </div>
    </div>
@endsection
