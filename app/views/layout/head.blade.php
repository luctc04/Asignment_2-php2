<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Web</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('layout.css')

</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="index.php">
                            <img class="img-fluid" style="width:100px;" src="{{ BASE_URL . 'public/img/2-removebg-preview.png'}}"
                                alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu py-4" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right "></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
                                            <i class="feather icon-x input-group-text"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
                                            <i class="feather icon-search input-group-text pt-0"></i>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()"
                                    class="waves-effect waves-light py-4">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ BASE_URL . 'public/img/logo3.jpg'}}" class="img-radius" alt="">
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                        <li>
                                            <a href="#">
                                                <i class="feather icon-log-out"></i> Log out
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <div class="pcoded-main-container">
                        <div class="pcoded-wrapper">

                            <nav class="pcoded-navbar">
                                <div class="nav-list">
                                    <div class="pcoded-inner-navbar main-menu">
                                        <div class="pcoded-navigation-label">App</div>
                                        <ul class="pcoded-item pcoded-left-item">
                                            <li class>
                                                <a href="{{route('')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon">
                                                        <i class="feather icon-home"></i>
                                                    </span>
                                                    <span class="pcoded-mtext">Dashboard</span>
                                                </a>
                                            </li>

                                            <li class>
                                                <a href="{{route('list-category')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon">
                                                        <i class="feather icon-list"></i>
                                                    </span>
                                                    <span class="pcoded-mtext">Manage Category</span>
                                                </a>
                                            </li>

                                            <li class>
                                                <a href="{{route('list-product')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon">
                                                        <i class="feather icon-layers"></i>
                                                    </span>
                                                    <span class="pcoded-mtext">Manage Product</span>
                                                </a>
                                            </li>

                                            <li class>
                                                <a href="{{route('list-user')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon">
                                                        <i class="feather icon-box"></i>
                                                    </span>
                                                    <span class="pcoded-mtext">Manage User</span>
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>


                        <section class="content">
                            @yield('content')
                        </section>
