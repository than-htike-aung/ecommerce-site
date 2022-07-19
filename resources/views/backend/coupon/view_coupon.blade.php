@extends('admin.admin_master')

@section('admin')

<div class="container-full">

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-8">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Coupon List
              <span class="badge badge-pill badge-danger">{{ count($coupons) }}</span>
            </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td>Coupon Name</td>
                    <td>Coupon Discount</td>
                    <th>Validity</th>
                    <th>Status</th>

                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($coupons as $item)
                  <tr>
                    <td>{{$item->coupon_name}}</td>
                    <td>{{$item->coupon_discount}}%</td>
                    <td>
                      {{Carbon\Carbon::parse($item->coupon_validity)->format('D, d-F-Y')}}
                    </td>
                    <td>
                      @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                      <span class="badge badge-pill badge-success">Valid</span>
                      @else
                      <span class="badge badge-pill badge-danger">Invalid</span>
                      @endif


                    </td>

                    <td width='30%'>
                      <a href="{{route('coupon.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                      <a href="{{route('coupon.delete',$item->id)}}" id="delete" class="btn btn-danger" id="delete"><i
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


      <!-- Add Category col start -->
      <div class="col-4">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Add Coupon</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <form action="{{route('coupon.store')}}" method="post">
                @csrf
                <div class="form-group">
                  <h5>Coupon Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="coupon_name" class="form-control">
                    @error('coupon_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                  </div>
                </div>

                <div class="form-group">
                  <h5>Coupon Discount (%) <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="coupon_discount" class="form-control">
                    @error('coupon_discount')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                  <h5>Coupon Validity Date<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="date" name="coupon_validity" min="{{Carbon\Carbon::now()->format('Y-m-d')}}"
                      class="form-control">
                    @error('coupon_validity')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Coupon">
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