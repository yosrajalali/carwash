<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Wash</title>

    <!--vendor css ================================================== -->
    <link rel="stylesheet" href="/css/vendor.css">


    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!--Bootstrap ================================================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Style Sheet ================================================== -->

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/showProfile.css">

    <!-- Google Fonts ================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,400;6..12,600;6..12,700&family=Oswald:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- font awesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>

    <!-- script ================================================== -->
    <script src="/js/modernizr.js"></script>

</head>

<body data-bs-spy="scroll" data-bs-target="#header-nav" tabindex="0" >

<nav class="navbar navbar-expand-lg container-fluid p-4 bg-dark">

    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home.index')}}"><img src="images/main-logo-light.png" alt="logo"></a>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-body">

                <ul class="navbar-nav align-items-center justify-content-end justify-content-xxl-center flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase active mx-2 px-3 mb-2 mb-lg-0" aria-current="page" href="{{route('home.index')}}">home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase mx-2 px-3 mb-2 mb-lg-0" href="{{ route('tracking.index') }}">Tracking</a>
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center justify-content-end">
                    @auth
                        <!-- Profile link for logged-in users -->
                        <li class="nav-item">
                            <a class="nav-link text-white mx-2 px-3 mb-2 mb-lg-0 text-capitalize" href="{{route('profile.show')}}">profile</a>
                        </li>
                        <!-- Show logout form if user is logged in -->
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link text-white mx-2 px-3 mb-2 mb-lg-0 text-capitalize">logout</button>
                            </form>
                        </li>
                    @else
                        <!-- Show login and register links if user is not logged in -->
                        <li class="nav-item">
                            <a class="nav-link text-white mx-2 px-3 mb-2 mb-lg-0 text-capitalize" href="{{ route('login.show') }}">login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-2 px-3 mb-2 mb-lg-0 text-capitalize" href="{{ route('register.check') }}">register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>

<main class="cd__main m-0">

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex">
        <!-- Start sidebar-->
        <header class="sidebar_header">

            <div class="d-flex flex-column flex-shrink-0 sidebar-wrap bg-dark">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="" class="text-decoration-none logo-wrap">
                            <div class="icon-wrap"><i class="fab fa-slack"></i></div>
                            <span>{{$user->first_name .' '. $user->last_name}}</span>
                        </a>
                        <hr>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('home.index')}}" class="nav-link active" aria-current="page">
                            <div class="icon-wrap">
                                <i class="fas fa-home"></i>
                            </div>
                            <span> Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link" id="editProfileLink">
                            <div class="icon-wrap">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            <span>Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="nav-link" id="ordersLink">
                            <div class="icon-wrap">
                                <i class="fab fa-first-order"></i>
                            </div>
                            <span>Orders</span>
                        </a>
                    </li>

                </ul>
                <hr>

            </div>

        </header>
        <!-- end sidebar -->

        <!-- Start update profile -->
        <div class="container d-none" id="form">
            <h4 class="text-capitalize">Update Profile</h4>
            <form method="POST" action="{{route('profile.update')}}"  >
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}">
                </div>

                @error('first_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}">
                </div>

                @error('last_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$user->phone_number}}">
                </div>

                @error('phone_number')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-outline-secondary">Update</button>
            </form>
        </div>
        <!-- End form -->

        <div class="container-xl d-none" id="reservation">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Manage <b>orders</b></h2>
                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>

                            </th>
                            <th>Service Name</th>
                            <th>Reservation Start Time</th>
                            <th>Reservation End time</th>
                            <th>Tracking Code</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>

                                </td>
                                <td>{{$reservation->service->name}}</td>
                                <td>{{$reservation->reservation_time}}</td>
                                <td class="reservation-end-time"></td>
                                <td>{{$reservation->tracking_code}}</td>

                                <td>
                                    <a href="{{route('reservations.edit',['id' => $reservation->id])}}" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
{{--                                    <a href="" class="delete" ><i class="material-icons"  title="Delete">&#xE872;</i></a>--}}
                                    <form method="POST" action="{{ route('reservations.destroy', ['id'=> $reservation->id]) }}" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button">
                                            <i class="material-icons" title="Delete">&#xE872;</i>
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Edit Modal HTML -->
{{--        <div id="editReservationModal" class="modal fade">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}

{{--                        <div class="modal-header">--}}
{{--                            <h4 class="modal-title">Edit Reservation</h4>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
{{--                        </div>--}}

{{--                        <div class="flex items-center justify-center h-screen">--}}

{{--                            <div class="w-full max-w-md modal-body">--}}
{{--                                @if (session('not_available'))--}}
{{--                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">--}}
{{--                                        <strong class="font-bold">Warning!</strong>--}}
{{--                                        <span class="block sm:inline">{{ session('not_available') }}</span>--}}
{{--                                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">--}}
{{--                                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                                <title>Close</title>--}}
{{--                                                <path fill-rule="evenodd" d="M14.354 5.646a.5.5 0 0 1 0 .708l-8 8a.5.5 0 0 1-.708-.708l8-8a.5.5 0 0 1 .708 0z"/>--}}
{{--                                                <path fill-rule="evenodd" d="M5.646 5.646a.5.5 0 0 0 0 .708l8 8a.5.5 0 0 0 .708-.708l-8-8a.5.5 0 0 0-.708 0z"/>--}}
{{--                                            </svg>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                @endif--}}

{{--                                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('reservations.update', $reservation->id) }}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    @method('PUT')--}}

{{--                                    <input type="hidden" id="reservation_id" name="reservation_id">--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="time_option">--}}
{{--                                            Choose Time Option--}}
{{--                                        </label>--}}

{{--                                        <select id="time_option" name="time_option" onchange="toggleTimeOptions(this.value)" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">--}}
{{--                                            <option selected disabled>Select a Time Option</option>--}}
{{--                                            <option value="earliest" @if(old('time_option') == 'earliest') selected @endif>Earliest Available Time Slot</option>--}}
{{--                                            <option value="choose" @if(old('time_option') == 'choose') selected @endif>Choose Day and Time</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div id="time_div" class="mb-4">--}}
{{--                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="reservation_time">--}}
{{--                                            Time--}}
{{--                                        </label>--}}

{{--                                        <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reservation_time" name="reservation_time">--}}
{{--                                            <option selected disabled>Select</option>--}}
{{--                                            @forelse($availableTimeSlots as $timeSlot)--}}
{{--                                                <option value="{{ $timeSlot->start_time }}">{{ $timeSlot->start_time }}</option>--}}
{{--                                            @empty--}}
{{--                                                <option value="" disabled>No time available</option>--}}
{{--                                            @endforelse--}}
{{--                                        </select>--}}

{{--                                        @error('reservation_time')--}}
{{--                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

{{--                                        <div class="mb-4">--}}
{{--                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="service_id">--}}
{{--                                                Select Service--}}
{{--                                            </label>--}}

{{--                                            <select id="service_id" name="service_id" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">--}}
{{--                                                <option selected disabled>Select a Service</option>--}}
{{--                                                <option value="1" @if(old('service_id') == '1') selected @endif>Interior</option>--}}
{{--                                                <option value="2" @if(old('service_id') == '2') selected @endif>Exterior</option>--}}
{{--                                                <option value="3" @if(old('service_id') == '3') selected @endif>Washing</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}

{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">--}}
{{--                            <input type="submit" class="btn btn-info" value="Update">--}}
{{--                        </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Delete Modal HTML -->
        <div id="deleteReservationModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete these Records?</p>
                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        const reservations = @json($reservations); // Convert PHP array to JavaScript object

        reservations.forEach(function(reservation) {
            const serviceId = reservation.service_id;
            const reservationTime = new Date(reservation.reservation_time);
            let endTime;

            if (serviceId === 1) {
                endTime = new Date(reservationTime.getTime() + 20 * 60000); // Add 20 minutes
            } else if (serviceId === 2) {
                endTime = new Date(reservationTime.getTime() + 40 * 60000); // Add 40 minutes
            } else if (serviceId === 3) {
                endTime = new Date(reservationTime.getTime() + 60 * 60000); // Add 60 minutes
            }

            // Format the end time as desired (e.g., "YYYY-MM-DD HH:MM:SS")
            const formattedEndTime = endTime.toLocaleString();

            // Update the corresponding cell with the calculated end time
            const rowIndex = reservations.findIndex(r => r.id === reservation.id);
            const endTimeCell = document.querySelectorAll('.reservation-end-time')[rowIndex];
            endTimeCell.textContent = formattedEndTime;
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const editProfileLink = document.getElementById('editProfileLink');
        const ordersLink = document.getElementById('ordersLink');
        const form = document.getElementById('form');
        const reservation = document.getElementById('reservation');

        editProfileLink.addEventListener('click', function(event) {
            event.preventDefault();
            form.classList.remove('d-none');
            reservation.classList.add('d-none');
        });

        ordersLink.addEventListener('click', function(event) {
            event.preventDefault();
            form.classList.add('d-none');
            reservation.classList.remove('d-none');
        });
    });

    function toggleTimeOptions(value) {
        var timeDiv = document.getElementById('time_div');

        if (value === 'earliest') {
            timeDiv.innerHTML = `
                <label class="block text-gray-700 text-sm font-bold mb-2" for="reservation_time">
                    Time
                </label>
                <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reservation_time" name="reservation_time">
                    <option value="{{ $earliestTimeSlot }}" selected>{{ $earliestTimeSlot }}</option>
                </select>

                @error('reservation_time')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror`;
        } else {
            timeDiv.innerHTML = `
                <label class="block text-gray-700 text-sm font-bold mb-2" for="reservation_time">
                    Time
                </label>
                <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reservation_time" name="reservation_time">
                    <option selected disabled>Select</option>
                   @forelse($availableTimeSlots as $timeSlot)
                        <option value="{{ $timeSlot->start_time }}">{{ $timeSlot->start_time }}</option>
                                        @empty
                        <option value="" disabled>No time available</option>
                    @endforelse
                        </select>
                    @error('reservation_time')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror`;
        }
    }
</script>

</body>

</html>
