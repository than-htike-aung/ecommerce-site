@extends('frontend.main_master')

@section('content')

{{-- @php
$user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp --}}

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')

            <div class="col-md-2">

            </div>
            <!--end col md -2 -->

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">Change Password</span>

                    </h3>
                    <div class="card-body">
                        <form action="{{route('user.password.update')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password<span></span></label>
                                <input type="password" name="oldpassword" class="form-control" id="current_password">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password<span></span></label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password<span></span></label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!--end col md -8 -->
        </div>
        <!--end row -->
    </div>
</div>

@endsection