@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Total Admin User</h3>

                        <a href="{{ route('add.admin') }}" class="btn btn-danger" style="float: right">Add Admin
                            User</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Image</td>
                                        <td>Name</td>
                                        <th>Email</th>
                                        <th>Access</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adminuser as $item)
                                    <tr>
                                        <td><img src="{{ asset($item->profile_photo_path) }}"
                                                style="width: 50px; height:50px" alt=""></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>

                                        <td>
                                            @if($item->brand == 1)
                                            <span class="badge btn-primary">Brand</span>
                                            @else
                                            @endif

                                            @if($item->category == 1)
                                            <span class="badge btn-secondary">Category</span>
                                            @else
                                            @endif

                                            @if($item->product == 1)
                                            <span class="badge btn-success">Product</span>
                                            @else
                                            @endif

                                            @if($item->slider == 1)
                                            <span class="badge btn-danger">Slider</span>
                                            @else
                                            @endif

                                            @if($item->coupon == 1)
                                            <span class="badge btn-warning ">Coupon</span>
                                            @else
                                            @endif

                                            @if($item->shipping == 1)
                                            <span class="badge btn-info ">Shipping</span>
                                            @else
                                            @endif

                                            @if($item->blog == 1)
                                            <span class="badge btn-light ">Blog</span>
                                            @else
                                            @endif

                                            @if($item->setting == 1)
                                            <span class="badge btn-dark">Setting</span>
                                            @else
                                            @endif

                                            @if($item->returnorder == 1)
                                            <span class="badge btn-primary">Return order</span>
                                            @else
                                            @endif

                                            @if($item->review == 1)
                                            <span class="badge btn-secondary">Review</span>
                                            @else
                                            @endif

                                            @if($item->orders == 1)
                                            <span class="badge btn-success">Orders</span>
                                            @else
                                            @endif

                                            @if($item->stock == 1)
                                            <span class="badge btn-danger">Stock</span>
                                            @else
                                            @endif

                                            @if($item->reports == 1)
                                            <span class="badge btn-warning ">Reports</span>
                                            @else
                                            @endif

                                            @if($item->alluser == 1)
                                            <span class="badge btn-info ">All user</span>
                                            @else
                                            @endif

                                            @if($item->adminuserrole == 1)
                                            <span class="badge btn-light ">Admin user role</span>
                                            @else
                                            @endif

                                            @if($item->reports == 1)
                                            <span class="badge btn-dark">Reports</span>
                                            @else
                                            @endif
                                        </td>

                                        <td width='30%'>
                                            <a href="{{route('edit.admin.user',$item->id)}}" class="btn btn-info"><i
                                                    class="fa fa-eye"></i></a>
                                            <a target="__blank" href="{{ route('delete.admin.user', $item->id) }}"
                                                class="btn btn-danger" id="delete" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>

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