@extends('layout.head')
@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-layers bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>User</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="/admin/dashboard"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Manage User</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add </h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="post-user" method="post">
                                            @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                                                <ul>
                                                    @foreach ($_SESSION['errors'] as $error)
                                                        <li style="color: red">{{$error}}</li>
                                                    @endforeach   
                                                </ul>
                                            @endif 
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control">

                                            <label for="pass" class="mt-3">Pass</label>
                                            <input type="text" name="pass" class="form-control">

                                            <label for="email" class="mt-3">Email</label>
                                            <input type="email" name="email" class="form-control">

                                            <label for="address" class="mt-3">Address</label>
                                            <input type="text" name="address" class="form-control">

                                            <label for="tel" class="mt-3">Tel</label>
                                            <input type="tel" name="tel" class="form-control">

                                            <input type="submit" name="submit" class="btn btn-info mt-3"
                                                value="Submit">
                                            <a href="{{route('list-user')}}" class="btn btn-primary mt-3">List User</a>
                                        </form>
                                        @if (isset($_SESSION['success']) && isset($_GET['msg']))
                                            <span style="color: green">{{$_SESSION['success']}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@extends('layout.foot')
