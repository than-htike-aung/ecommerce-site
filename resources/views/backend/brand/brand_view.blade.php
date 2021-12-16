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
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Brand List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Brand En</th>
                            <th>Brand Myan</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>                                        
                    @foreach($brands as $item)
                        <tr>
                            <td>{{$item->brand_name_en}}</td>
                            <td>{{$item->brand_name_my}}</td>
                            <td>
                                <img src="{{asset($item->brand_image)}}" style="width: 70px; height:40px;" alt="">
                            </td>
                            <td>
                                <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('brand.delete',$item->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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


        <!-- Add brand col start -->
        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
<form action="{{route('brand.store')}}" method="post"  enctype="multipart/form-data">
           @csrf
           <div class="form-group">
            <h5>Brand Name Eng <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text"  name="brand_name_en" class="form-control">
            @error('brand_name_en')
              <span class="text-danger">{{$message}}</span>
            @enderror

              </div>
        </div>

        <div class="form-group">
          <h5>Brand Name Myanmar <span class="text-danger">*</span></h5>
          <div class="controls">
              <input type="text" name="brand_name_my" class="form-control">
            @error('brand_name_my')
              <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
      </div>

      <div class="form-group">
        <h5>Brand Image<span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="file"  name="brand_image" class="form-control">
            @error('brand_image')
            <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
      </div>
   
       <div class="text-xs-right">
           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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
