@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- Edit brand col start -->
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Blog Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('blog.category.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$blogcategory->id}}">
                                {{-- <input type="hidden" name="old_image" value="{{$brand->brand_image}}"> --}}
                                <div class="form-group">
                                    <h5>Blog Category Name Eng <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_en"
                                            value="{{$blogcategory->blog_category_name_en}}" class="form-control">
                                        @error('blog_category_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Blog Category Name Myanmar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_my"
                                            value="{{$blogcategory->blog_category_name_my}}" class="form-control">
                                        @error('blog_category_name_my')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                </div>



                            </form>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- Add brand col start -->


        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>


@endsection