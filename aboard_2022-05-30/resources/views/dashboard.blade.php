@extends('layouts.app_admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container">

            <!-- Page header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard </li>

                        </ul>


                    </div>
                </div>
            </div>

            <!-- Page Header Ends -->



            <!-- Filter  combo box Starts -->

            {{-- <div class="row">
                    <div class="col-lg-12">



                        <form>
                            <div class="row formtype">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Institution</label>
                                        <select class="form-control" id="sel1" name="sellist1">
                                            <option>Comission</option>
                                            <option>Community Court of Justice</option>
                                            <option>Community Parliament</option>
                                            <option>WAHO</option>
                                            <option>All</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control" id="sel2" name="sellist2">
                                            <option>Select</option>
                                            <option>Loren Gatlin</option>
                                            <option>Tarash Sorosphire</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Directorate</label>
                                        <select class="form-control" id="sel3" name="sellist3">
                                            <option>Select</option>
                                            <option>Cash</option>
                                            <option>Cheque</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Period</label>
                                        <select class="form-control" id="sel3" name="sellist1">
                                            <option>Quater 1 </option>
                                            <option>Quater 2</option>
                                            <option>Quater 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sort By</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Search</label>
                                        <a href="#" class="btn btn-success btn-block mt-0 search_button"> Search
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>
                </div> --}}

            {{-- <div class="row">
					<div class="col-lg-12">
						<form>
							<div class="row formtype">
								<div class="col-md-4">
									<div class="form-group">
										<label>Item Name</label>
										<input class="form-control" type="text" value="BKG-0001">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Purchased By</label>
										<select class="form-control" id="sel1" name="sellist1">
											<option>Select</option>
											<option>Loren Gatlin</option>
											<option>Tarash Sorosphire</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Paid By</label>
										<select class="form-control" id="sel3" name="sellist1">
											<option>Select</option>
											<option>Cash</option>
											<option>Cheque</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>From</label>
										<div class="cal-icon">
											<input type="text" class="form-control datetimepicker">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>To</label>
										<div class="cal-icon">
											<input type="text" class="form-control datetimepicker">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Search</label>
										<a href="#" class="btn btn-success btn-block mt-0 search_button"> Search </a>

									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

                <!-- Filter  combo box Ends --> --}}


                {{-- New Filters --}}


                <div class="row">
					<div class="col-lg-12">
						<form>
							<div class="row formtype">
								<div class="col-md-3">
									<div class="form-group">
										<label>Institution </label>
										<select class="form-select" id="sel1" name="sellist1">
											<option selected>All</option>
											<option>Comission</option>
											<option>Staff</option>
											<option>Accountant</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Department</label>
										<select class="form-select" id="sel1" name="sellist1">
											<option>All</option>
											<option>Manager</option>
											<option>Staff</option>
											<option>Accountant</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Directorate</label>
										<select class="form-select" id="sel1" name="sellist1">
											<option>All</option>
											<option>Manager</option>
											<option>Staff</option>
											<option>Accountant</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Search</label>
										<a href="#" class="btn btn-success btn-block mt-0 search_button"> Search </a>

									</div>
								</div>
							</div>
						</form>
					</div>
				</div>




            <div class="row">


                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">{{ $wpatotal }}</h3>
                                    <h6 class="text-muted">ANNUAL WORK PLAN</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                                            fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-file-plus">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                            </path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="12" y1="18" x2="12" y2="12"></line>
                                            <line x1="9" y1="15" x2="15" y2="15"></line>
                                        </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">{{ $programtotal }}</h3>
                                    <h6 class="text-muted">PROGRAMS</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                                            fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">{{ $subprogramtotal }}</h3>
                                    <h6 class="text-muted"> SUBPROGRAMS (PROJECTS)</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                                            fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-user-plus">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="20" y1="8" x2="20" y2="14"></line>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">{{ $activitytotal }}</h3>
                                    <h6 class="text-muted">ACTIVITIES</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                                            fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-globe">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>









            </div>




            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title">ANNUAL WORK PLANS STATUSES</h4>
                        </div>
                        <div class="card-body">
                            {{-- <div id="line-chart"></div> --}}

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


                            <canvas id="myChart" height="300"></canvas>

                            <script>
                                const ctx = document.getElementById('myChart').getContext('2d');
                                const myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['WP created', 'WP Submitted', 'WP Reviewed', 'WP Approved', /* 'Purple', 'Orange' */ ],
                                        datasets: [{
                                            label: '# of WP = Work Plans',
                                            data: [{{ $wpatotal }}, {{ $wpasubmitted }}, {{ $wpareviewed }},
                                                {{ $wpaapproved }}, 2, 3
                                            ],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                /* 'rgba(153, 102, 255, 0.2)',
                                                 'rgba(255, 159, 64, 0.2)' */
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                /* 'rgba(153, 102, 255, 1)',
                                                 'rgba(255, 159, 64, 1)'*/
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>




                <div class="col-md-12 col-lg-6">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title"> ACTIVITIES STATES OF IMPLEMENTATION </h4>
                        </div>
                        <div class="card-body">
                            {{-- <div id="donut-chart" ></div> --}}

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


                            <canvas id="myChart2" width="10" height="10"></canvas>


                            <script>
                                const ctx2 = document.getElementById('myChart2').getContext('2d');
                                const myChart2 = new Chart(ctx2, {
                                    type: 'pie',
                                    data: {
                                        labels: ['Not started', 'In progress', 'Implemented', /* 'Green', 'Purple', 'Orange' */ ],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: [12, 19, 3, /* 5, 2, 3 */ ],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                               /* 'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)', */


                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 159, 64, 1)',
                                                'rgba(255, 206, 86, 1)',


                                                /* 'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                  */
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>


                        </div>
                    </div>
                </div>
            </div>









            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-left mt-2">Users total ({{ $usertotal }})</h4>
                            <a href="{{ route('admin.users.index') }}"><button type="button"
                                    class="btn btn-primary float-right veiwbutton">View All</button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Name</th>
                                            <th>Email ID</th>
                                            <th>Phone Number</th>
                                            <th class="text-center">Directorate</th>

                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $users as $user)


                                        <tr>
                                            <td class="text-nowrap">
                                                <div>{{ $user->id }}</div>
                                            </td>
                                            <td class="text-nowrap">{{ $user->name }}</td>
                                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                    data-cfemail="3743585a5a4e55524559565b77524f565a475b521954585a"> {{ $user->email }} </a>
                                            </td>
                                            <td>[Phone&#160;protected]</td>
                                            <td class="text-center">{{ $user->directorate->name }}</td>

                                            <td class="text-center"> <span
                                                    class="badge badge-pill bg-success inv-badge">ACTIVE</span> </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>








             <!-- Outcomes Table but now new graph -->

             <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    {{-- <a href="{{ url('planning/add-indicators/' . $outcome->id) }}" class="btn btn-dark mb-2"><i
                                            class="mdi mdi-plus-circle me-2"></i><i class="fa fa-plus"
                                            aria-hidden="true"></i> Add
                                        Indicator</a> --}}

                                    <a class="btn btn-dark mb-2" data-toggle="modal" data-target="#createproject"><i
                                            class="fa fa-plus" aria-hidden="true"></i> Add new graph </a>
                                    <!-- <button type="button" class="btn btn-dark w-sm-100" data-bs-toggle="modal" data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>Create Project</button> -->

                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end">
                                        <button type="button" class="btn btn-success mb-2">Export</button>
                                    </div>
                                </div>

                                <!-- end col-->
                            </div>
                            <br>

                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Purpose</th>
                                            <th> Displayed ? </th>
                                            <th>Progress</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- @foreach ($outcome->ocindicators as $ocindicator)
                                            <tr>
                                                <td class="id">
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="apps-ecommerce-products-details.html"
                                                            class="text-body"></a>
                                                        {{ $ocindicator->id }}
                                                        <br>

                                                    </p>
                                                </td>
                                                <td class="name">
                                                    {{ $ocindicator->name }}
                                                </td>
                                                <td class="outcome_id">
                                                    {{ $ocindicator->outcome_id }}, {{ $ocindicator->outcome->name }}

                                                </td>
                                                <td class="status">
                                                    {{ $ocindicator->status }}
                                                </td>
                                                <td class="progress">
                                                    Progress
                                                </td>
                                                <!-- <td class="text-right">
                                                                        <div class="dropdown dropdown-action">  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                                            <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-staff.html"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset"><i class="fas fa-trash-alt m-r-5"></i> Delete</a> </div>
                                                                        </div>
                                                                    </td> -->

                                                <td>


                                                    <!-- <a  href="edit-employee.html"><i class="fas fa-pencil-alt m-r-5"></i></a>
                                                                        <a  href="#"><i class="fas fa-trash-alt m-r-5"></i></a> -->

                                                    <a style="color: black"
                                                        href="{{ url('planning/ocindicator/edit/'. $ocindicator->id) }} "><i
                                                            class="fas fa-pencil-alt m-r-5"></i> </a>
                                                    <a style="color: black"
                                                        href="{{ url('planning/del-ocindicator/'.$ocindicator->id) }}"
                                                        onclick="return confirm('Are you sure to delete it ?')"><i
                                                            class="fas fa-trash-alt m-r-5"></i></a>

                                                    <a style="color: black"
                                                        href="{{ url('planning/details-ocindicator/'.$ocindicator->id )}}"><i
                                                            class="fas fa-info m-r-5 "></i></a>

                                                </td>

                                            </tr>
                                        @endforeach --}}

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Work Plan</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>


                    </div>

                </div>

                <br>
                <br>
                <br>


            </div>
            <!-- end row-->





        </div>
    </div>
@endsection
