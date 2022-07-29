@extends('admin.admin_master')
@section('admin')



<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Seo Update</h4>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form action="{{route('update.seosetting')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$seo->id}}" name="id">


                        <div class="row">
                            <div class="col-12">

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Meta title<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_title" value="{{ $seo->meta_title }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Author<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_author" value="{{ $seo->meta_author }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Keyword <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_keyword" value="{{ $seo->meta_keyword }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Description <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_description"
                                                    value="{{ $seo->meta_description }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Google Analytics<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="google_analytics"
                                                    value="{{ $seo->google_analytics }}" class="form-control">
                                            </div>
                                        </div>



                                    </div> <!-- end col md 6 -->


                                </div> <!-- end row -->

                            </div>

                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                        </div>
                    </form>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>






@endsection