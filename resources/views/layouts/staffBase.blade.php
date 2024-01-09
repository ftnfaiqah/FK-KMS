<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>FKKMS</title>
    <link rel="shortcut icon" href="assets/img/petakom-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/styleStaff.css')}} ">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

</head>

<body>

    <div class="main-wrapper min-vh-100 d-flex flex-column justify-content-between">
        <div class="header-left">
            <a href="\" class="logo">
                <img src="{{ asset('assets/img/petakom-navLogo.png') }}" alt="Logo">
            </a>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>
        <div class="header">
            @yield('title')
            <ul class="nav user-menu ms-auto">
                <li class="nav-item dropdown new-user-menus">
                    <a href="#" id="navbarDropdown"  class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="user-img">
                            <div class="user-text">
                                <h6>{{ Auth::user()->name }}</h6>
                                <p class="text-muted mb-0">{{ Auth::user()->role }}</p>
                            </div>
                            <i class="fas fa-user fa-xl" style="color: white"></i>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
            
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>

        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <i class="fas fa-home"></i> <span> Menu</span>
                        </li>
                        <hr>
                        <li class="">
                            <a href="staffProfile"><i class="fas fa-user"></i> <span> Profile</span></a>
                        </li>
                        <li class="">
                            <a href="staffPayment"><i class="fas fa-credit-card"></i> <span> Payment</span></a>
                        </li>
                        <li class="menu active">
                            <a href="{{route('technical.index')}}"><i class="fas fa-file-alt"></i><span> Complaint</span></a>
                        </li>
                        <li class="">
                            <a href="staffSalesReport"><i class="fa-solid fa-chart-area"></i><span> Sales Report</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <!-- Content -->
                @yield('content')
            </div>
            <footer>
                <p>Copyright © 2023 FKKMS</p>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>

</body>

</html>