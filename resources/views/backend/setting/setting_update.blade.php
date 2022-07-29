@extends('admin.admin_master')
@section('admin')



<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Site setting page</h4>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form action="{{route('update.sitesetting')}}" enctype="multipart/form-data" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$setting->id}}" name="id">
                        <input type="hidden" value="{{$setting->logo}}" name="old_image">

                        <div class="row">
                            <div class="col-12">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Site Logo<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="file" name="logo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Phone One<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="phone_one" value="{{ $setting->phone_one }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Phone Two<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="phone_two" value="{{ $setting->phone_two }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Email <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="email" value="{{ $setting->email }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Company Name <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="company_name"
                                                    value="{{ $setting->company_name }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Company Address<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="company_address"
                                                    value="{{ $setting->company_address }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Facebook<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="facebook" value="{{ $setting->facebook }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Twitter<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="twitter" value="{{ $setting->twitter }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Linkedin<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="linkedin" value="{{ $setting->linkedin }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Youtube<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="youtube" value="{{ $setting->youtube }}"
                                                    class="form-control">
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