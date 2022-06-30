@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
      
      <!-- Main content -->
      <section class="content">
        <div class="row">
         
        <!-- Add Coupon page start -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Update Coupon</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
<form action="{{route('coupon.update', $coupons->id)}}" method="post" >
           @csrf
           <div class="form-group">
            <h5>Coupon Name <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text"  name="coupon_name" class="form-control" value="{{$coupons->coupon_name}}">
            @error('coupon_name')
              <span class="text-danger">{{$message}}</span>
            @enderror

              </div>
        </div>

        <div class="form-group">
          <h5>Coupon Discount (%) <span class="text-danger">*</span></h5>
          <div class="controls">
              <input type="text" name="coupon_discount" value="{{$coupons->coupon_discount}}" class="form-control">
            @error('coupon_discount')
              <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
      </div>

      <div class="form-group">
        <h5>Coupon Validity Date<span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="date" name="coupon_validity" value="{{$coupons->coupon_validity}} min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control">
          @error('coupon_validity')
            <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
    </div>

       <div class="text-xs-right">
           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Coupon">
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
