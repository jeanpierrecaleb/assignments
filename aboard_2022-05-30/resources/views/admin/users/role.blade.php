role edit
@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item active"> Settings > Edit Roles
                            </li>


                        </ul>


                    </div>
                </div>
            </div>

            <div class="card-header ">{{ __('User Granting') }}
                <a class="btn btn-dark ml-3" href="{{ route('admin.users.index') }}"> Users Index</a>
            </div>

            {{-- Insertion of the table --}}


            <div class="mb-3">
                <br>
                <label for="name" class="form-label">Targeted User</label> <br>
                <div> User name : {{ $user->name }} ;  {{ $user->id }},  </div>
                <div>Email : {{ $user->email }} </div>
            </div>




            <div class="mb-3">
                <label class="form-label">Roles granted</label> <br>
                @if ($user->roles)
                    @foreach ($user->roles as $user_role)
                        {{-- <spa>{{ $role_permission->name }}</spa> --}}

                        <form method="POST" style="display:inline;"
                            action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                            onsubmit="return confirm('Are you sure to delete it ?');">
                            @csrf
                            @method('DELETE')
                            {{-- <i class="fas fa-trash-alt m-r-5"> </i> --}}
                            <button style="background-color: yellow" type="submit"> {{ $user_role->name }}
                            </button>
                        </form>
                    @endforeach
                @endif

            </div>


            <form  method="POST" action="{{ route('admin.users.roles', $user->id) }}" id="myform2">
                {{ csrf_field() }}
                <div class="mb-3">

                    <label class="form-label">Roles</label>
                    {{-- <input type="text"  id="permission" value="{{ $role->name}}" class="form-control" name="permission"
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

            {{-- Role through Model has role --}}

             {{-- <div class="mb-3">
                <label class="form-label">Permissions received through role</label> <br>
                @for ($model_has_role->id = i, i=1 , i++ )


                @if ($model_has_role = "App\Models\User" & $user->id === $model_has_role->model_id)



                        <form method="POST" style="display:inline;"
                            action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                            onsubmit="return confirm('Are you sure to delete it ?');">
                            @csrf
                            @method('DELETE')

                            <button style="background-color: yellow" type="submit"> {{ $user_permission->name }}
                            </button>
                        </form>

                @endif

                @endfor

            </div> --}}

            {{-- Permission through role of model has role --}}

           {{-- <div class="mb-3">
                <label class="form-label">Permissions received through role</label> <br>
                @if ($model_has_role = "App\Models\User" & $user->id === $model_has_role->model_id)
                    @foreach ($user->permissions as $user_permission)


                        <form method="POST" style="display:inline;"
                            action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                            onsubmit="return confirm('Are you sure to delete it ?');">
                            @csrf
                            @method('DELETE')

                            <button style="background-color: yellow" type="submit"> {{ $user_permission->name }}
                            </button>
                        </form>
                    @endforeach
                @endif

            </div> --}}

            {{-- Permissions --}}

            {{-- <div class="mb-3">
                <br>  <label for="name" class="form-label">Permissions</label>
            </div> --}}



            <div class="mb-3">
                <label class="form-label">Permissions granted</label> <br>
                @if ($user->permissions)
                    @foreach ($user->permissions as $user_permission)
                        {{-- <spa>{{ $role_permission->name }}</spa> --}}

                        <form method="POST" style="display:inline;"
                            action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                            onsubmit="return confirm('Are you sure to delete it ?');">
                            @csrf
                            @method('DELETE')
                            {{-- <i class="fas fa-trash-alt m-r-5"> </i> --}}
                            <button style="background-color: yellow" type="submit"> {{ $user_permission->name }}
                            </button>
                        </form>
                    @endforeach
                @endif

            </div>

            <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}"  id="myform3">
                {{ csrf_field() }}
                <div class="mb-3">

                    <label for="permission" class="form-label">Permission</label>
                    {{-- <input type="text"  id="permission" value="{{$role->name}}" class="form-control" name="permission"
                        placeholder="Say what is the Name of your permission"> --}}

                    <select id="permission" name="permission" class="form-select"
                        aria-label="Default select a permission" form="myform3" required>
                        <option value=" " selected disabled>Select below</option>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <span class="text-red-400 text-sm"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <button type="submit" form="myform3" value="Submit">Assign</button>
                </div>

            </form>





        </div>
    </div>
@endsection
