<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aboard') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">




    <!-- Style student tmple -->

    {{-- <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jqvmap/css/jqvmap.min.css')}} ">
	<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css')}}">
	<!-- Summernote -->
    <link href="{{ asset('assets/vendor/summernote/summernote.css')}} " rel="stylesheet" >
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}} "> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style3.css')}} ">
     <link rel="stylesheet" href="{{ asset('assets/css/skin-3.css')}} "> --}}
    <!-- End Style student tmple -->



    {{-- Begin Btp 5   --> --}}

    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">






    {{-- third party css for sb admin --}}
    {{-- <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
    href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet')}}">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet" defer> --}}


    <!-- Styles Hotel -->

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">
    <link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}"> Removable --}}

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    {{-- Begin Custom   --> --}}

    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

    <!-- Fin Custom Css -->


    <!-- Debut style datatable example datatable -->

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap5.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" defer>

    <!-- Hyper responsive App favicon -->

    <!-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> -->



</head>

<body>

    <div class="main-wrapper">


        @include('layouts.bars.header')
        @include('layouts.bars.sidebar')

        {{-- <div class="content" > --}}
        @yield('content')
        {{-- </div> --}}

        <!--**********************************
            Footer start
        ***********************************-->

        @include('layouts.bars.footer')

    </div>





    {{-- Script for sb admin
        <!-- bundle --> --}}

    {{-- <!-- Bootstrap core JavaScript--> --}}


    <!-- Debut scripts Hotel -->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <script data-cfasync="false"
        src="{{ asset('../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script> {{-- Removable --}}
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.morris.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>





    {{-- <script>
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
        </script> Removable --}}

    <!-- Fin script hotel -->


    <!-- Debut scripts Datatable example        -->

    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>


    <!-- Fin scripts Datatable example -->





    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example2').DataTable();
        });
    </script>


    @yield('scripts')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>

    @if (session('success'))
        <script>
            swal("{{ session('success') }}");
        </script>
    @endif



    {{-- Attention submit toggle !!! --}}
    <script>
        $(function() {

            $('#sbtoggle.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                // var status = $(this).prop('checked') == true ? 'Submitted waiting for reviewing' : 'Waiting for submission';
                // var status = 'Submitted waiting for reviewing';
                var wpa_id = $(this).data('id');
                var txt;
                if (confirm("Are you sure ?") == true) {
                    text = "You Confirm";
                    $.ajax({

                        type: "GET",
                        dataType: "json",
                        url: '/status/update',
                        data: {
                            'status': status,
                            'wpa_id': wpa_id
                        },
                        /* data: {
                             'wpa_id': wpa_id
                         }, */
                        success: function(data) {

                            alert(data.success);
                            location.reload(true);
                            console.log(data.success);
                            // $("#dialog").html(data.success);
                            //  $("#dialog").dialog("open");

                        }
                    });

                } else {
                    text = "You canceled!";


                    /// alert("You canceled!");
                    // location.reload(true);
                    console.log(text);
                    // $("#dialog").html(data.success);
                    //  $("#dialog").dialog("open");

                }
            })
        });
    </script>

    {{-- Review first_toogle --}}

    <script>
        $(function() {

            $('#rvtoggle.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                // var status = $(this).prop('checked') == true ? 'Submitted waiting for reviewing' : 'Waiting for submission';
                // var status = 'Submitted waiting for reviewing';
                var wpa_id = $(this).data('id');
                var txt;
                if (confirm("Are you sure ?") == true) {
                    text = "You Confirm";
                    $.ajax({

                        type: "GET",
                        dataType: "json",
                        url: 'status/review',
                        data: {
                            'status': status,
                            'wpa_id': wpa_id
                        },
                        /* data: {
                             'wpa_id': wpa_id
                         }, */
                        success: function(data) {

                            alert(data.success);
                            location.reload(true);
                            console.log(data.success);
                            // $("#dialog").html(data.success);
                            //  $("#dialog").dialog("open");

                        }
                    });

                } else {
                    text = "You canceled ! ";


                    // alert("You canceled ! ");
                    // location.reload(true);
                    console.log(text);
                    // $("#dialog").html(data.success);
                    //  $("#dialog").dialog("open");

                }
            })
        });
    </script>


    {{-- Approval toogle-ap --}}

    <script>
        $(function() {

            $('#aptoggle.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;

                // var status = $(this).prop('checked') == true ? 'Submitted waiting for reviewing' : 'Waiting for submission';
                // var status = 'Submitted waiting for reviewing';
                var wpa_id = $(this).data('id');
                var txt;
                $(this).prop('checked', status == 0);
                var element = $(this);
                if (confirm("Are you sure ?") == true) {
                    text = "You Confirm";
                    $.ajax({

                        type: "GET",
                        dataType: "json",
                        url: 'status/approval',
                        data: {
                            'status': status,
                            'wpa_id': wpa_id
                        },
                        /* data: {
                             'wpa_id': wpa_id
                         }, */
                        success: function(data) {

                            if (data.error) {

                                alert(data.error);
                            } else {
                                element.prop('checked', status == 1);
                                alert(data.success);
                                $('#status-'+wpa_id).html(data.status);
                            }

                        }
                    });

                } else {
                    text = "You canceled approvement validation ! ";

                    $(this).prop('checked', status == 0);

                    // alert("You canceled ! ");
                    // location.reload(true);
                    console.log(status);
                    // $("#dialog").html(data.success);
                    //  $("#dialog").dialog("open");

                }
            })
        });
    </script>








</body>



</html>
