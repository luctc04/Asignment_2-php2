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
                                <a href="index.php"><i class="feather icon-home"></i></a>
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
                                        <h5>List User</h5>

                                        <a href="{{route('add-user')}}" class="btn btn-info btn-sm">Add</a>
                                    </div>
                                    <div class="card-block">
                                        @if (isset($_SESSION['success']) && isset($_GET['msg']))
                                            <center><span style="color: green">{{ $_SESSION['success'] }}</span></center>   
                                        @endif
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>User</th>
                                                        <th>Pass</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Tel</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $us)
                                                        <tr>
                                                            <td>{{$us->id}}</td>
                                                            <td>{{$us->user}}</td>
                                                            <td>{{$us->pass}}</td>
                                                            <td>{{$us->email}}</td>
                                                            <td>{{$us->address}}</td>
                                                            <td>{{$us->tel}}</td>
                                                            <td>
                                                                <a href="{{route('detail-user/'.$us->id)}}" class="btn btn-primary btn-sm">Update</a>
                                                                {{-- <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{route('delete-user/'.$us->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}
                                                                <button onclick="confirmDelete('{{route('delete-user/'.$us->id)}}')" class="btn btn-danger btn-sm">xóa</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
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
    </div>
@endsection

@extends('layout.foot')
