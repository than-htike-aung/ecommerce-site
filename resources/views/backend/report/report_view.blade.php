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

            <!-- Add brand col start -->
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search By Date</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{route('search-by-date')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Select Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="date" class="form-control">
                                        @error('date')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                </div>



                            </form>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- Add brand col start -->
            <!-- Add brand col start -->
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search by Month</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{route('search-by-month')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <h5>Select Month<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="month" id="" class="form-control">
                                            <option label="Choose One"></option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>

                                        </select>
                                        @error('month')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Select Year<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="year_name" id="" class="form-control">
                                            <option label="Choose One"></option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>


                                        </select>
                                        @error('year_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                </div>



                            </form>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- Add brand col start -->
            <!-- Add brand col start -->
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Select Year</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('search-by-year') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <h5>Select Year<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="year" id="" class="form-control">
                                            <option label="Choose One"></option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>


                                        </select>
                                        @error('year')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
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