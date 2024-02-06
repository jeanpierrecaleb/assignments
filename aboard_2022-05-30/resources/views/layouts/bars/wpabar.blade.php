<ul class="nav nav-tabs">
    <li class="nav-item active">
        <a onclick="window.history.go(-1)" ><button> <i class="fa fa-arrow-left" aria-hidden="true"></i> </button> </a>

    </li>
    <li class="nav-item active">
        <a class="nav-link {{ Request::is('wpaboard') ? 'active' : '' }}" href="#">
            Home
        </a>
    </li>

    </li>


    <li class="nav-item">
        <a class="nav-link {{ Request::is('listactivity') ? 'active' : '' }}" href="#">
            Community Strategy framework
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link {{ Request::is('planning/listwpa') ? 'active' : '' }} {{ Request::is('planning*') ? 'active' : '' }}"
            {{ Request::is('planning*') ? 'active' : '' }}" href="{{ route('planning/listwpa') }}">
            Annual Work Plan
        </a>
    </li>



    {{-- <li class="nav-item">
        <a class="nav-link {{ Request::is('listprogram') ? 'active':''}}" href="{{route('listprogram')}}">
            Programs
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('listoutcome') ? 'active':''}}" href="{{route('listoutcome')}}">
            Outcome
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('listsubpro') ? 'active':''}}" href="{{route('listsubpro')}}">
            Sub-Program or Project
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('listoutput') ? 'active':''}}" href="{{route('listoutput')}}">
            Output
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('listactivity') ? 'active':''}}" href="{{route('listactivity')}}">
            Activity
        </a>
    </li> --}}



    <li class="nav-item">
        <a class="nav-link {{ Request::is('planning/quarterly') ? 'active' : '' }}" href="#">
            Quaterly Work Plan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#"> Disabled-Budget</a>
    </li>
    <li class="nav-item active">
        {{-- <a href="{{ url()->next() }}"><button><i class="fa fa-arrow-right" aria-hidden="true"></i></button></a> --}}
        <a href="{{ url()->previous() }}"><button><i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button></a>




    </li>
</ul>
