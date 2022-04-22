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
                <h3 class="box-title">Slider List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Slider Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>                                        
                    @foreach($sliders as $item)
                        <tr>
                            <td> <img src="{{asset($item->slider_img)}}" style="width: 70px; height:40px;" alt=""></td>
                            <td>
                                @if($item->title == NULL)
                                <span class="badge badge-pill badge-danger">No Title</span>
                                @else
                                {{$item->title}} 
                              @endif
                              
                            </td>
                            <td>{{$item->description}}</td>
                            <td>
                                @if($item->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">InActive</span>
                              @endif
                            </td>
                            <td width="30%"> 
                                <a href="{{route('slider.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('slider.delete',$item->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                            
                                @if($item->status == 1)
                                <a href="{{route('slider.inactive',$item->id)}}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                @else
                                <a href="{{route('slider.active',$item->id)}}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                @endif
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


        <!-- Add Slider col start -->
        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
<form action="{{route('slider.store')}}" method="post"  enctype="multipart/form-data">
           @csrf
           <div class="form-group">
            <h5>Slider Title <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text"  name="title" class="form-control">
           
              </div>
        </div>

        <div class="form-group">
          <h5>Slider Description<span class="text-danger">*</span></h5>
          <div class="controls">
              <input type="text" name="description" class="form-control">
          
            </div>
      </div>

      <div class="form-group">
        <h5>Slider Image<span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="file"  name="slider_img" class="form-control">
            @error('slider_img')
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
        <!-- Add Slider col End -->

         
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>


@endsection
