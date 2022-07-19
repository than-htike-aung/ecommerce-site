@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Data Tables</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Tables</li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Total User
                            <span class="badge badge-pill badge-danger">{{ count($users) }}</span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <img class="card-img-top" style="border-radius: 50%" alt="no-image" src="{{!empty($user->profile_photo_path) ?
                                                url('upload/user_images/'.$user->profile_photo_path) :
                                                url('upload/no_image.jpg')}}" width="50px" height="50px">
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>

                                        <td>
                                            @if($user->UserOnline())
                                            <span class="badge badge-pill badge-success">Active Now</span>
                                            @else
                                            <span
                                                class="badge badge-pill badge-danger">{{Carbon\Carbon::parse($user->last_seen)->diffForHumans()
                                                }}</span>
                                            @endif


                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="" class="btn btn-danger" id="delete"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Brand En</td>
                                        <td>Brand Myan</td>
                                        <td>Image</td>
                                        <td>Action</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>



        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>


@endsection