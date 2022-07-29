@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Blog Post List
                            <span class="badge badge-pill badge-danger">{{ count($blogpost) }}</span>
                        </h3>
                        <a href="{{ route('add.post') }}" class="btn btn-success" style="float: right;">Add Post</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Post Category</td>

                                        <th> Post Image</th>
                                        <th> Post Titile English</th>
                                        <th> Post Titile Myanmar</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogpost as $item)
                                    <tr>

                                        <td>{{$item->category->blog_category_name_en}}</td>
                                        <td><img src="{{ asset($item->post_image) }}" style="width: 60px; height:60px;"
                                                alt=""></td>
                                        <td>{{$item->post_title_en}}</td>
                                        <td>{{$item->post_title_my}}</td>

                                        <td width="20%">
                                            <a href="{{route('post.edit',$item->id)}}" class="btn btn-info"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="{{route('post.delete',$item->id)}}" id="delete"
                                                class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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