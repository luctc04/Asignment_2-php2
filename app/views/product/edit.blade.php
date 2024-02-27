@extends('layout.head')
@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-layers bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Product</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="/admin/dashboard"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Manage Product</a> </li>
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
                                        <h5>Update</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{route('edit-product/'.$detail->id)}}" method="post" enctype="multipart/form-data">

                                            @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                                                <ul>
                                                    @foreach ($_SESSION['errors'] as $error)
                                                        <li style="color: red">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif

                                            <label for="id_category">Category</label>
                                            <select name="id_category" class="form-select">
                                                {{-- <option value="{{$detail->id_ct}}">{{$detail->name_category}}</option> --}}
                                                @foreach ($categorys as $ct)
                                                    <option 
                                                        @if ($ct->id == $detail->id_category) selected @endif 
                                                        value="{{ $ct->id }}">{{ $ct->name }}</option>
                                                @endforeach
                                            </select>

                                            <label for="name" class="mt-3">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$detail->name}}"><br>

                                            <label for="image" class="mt-3">Image</label>
                                            <input type="file" name="image" class="form-control"><br> 
                                            <center><img src="{{ IMG }}/{{$detail->image}}" alt="" width="240" height="159"></center><br>

                                            <label for="price" class="mt-3">Price</label>
                                            <input type="number" name="price" class="form-control" value="{{$detail->price}}">

                                            <label for="describe" class="mt-3">Describe</label>
                                            <textarea name="describe" class="form-control" cols="10" rows="4"> {{$detail->describe}} </textarea>

                                            <input type="submit" name="submit" class="btn btn-info mt-3" value="Submit">
                                            <a href="{{ route('list-product') }}" class="btn btn-primary mt-3">List Product</a>
                                        </form>
                                        @if (isset($_SESSION['success']) && isset($_GET['msg']))
                                            <span style="color: green">{{ $_SESSION['success'] }}</span>
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
