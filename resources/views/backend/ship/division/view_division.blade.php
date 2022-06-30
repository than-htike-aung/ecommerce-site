@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
      
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Division List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <td>Division Name</td>
                            <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>                                        
                    @foreach($divisions as $item)
                        <tr>
                            <td>{{$item->division_name}}</td>
                        
                           
                            <td width='40%'>
                                <a href="{{route('division.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('division.delete',$item->id)}}" id="delete" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
                 <h3 class="box-title">Add Division</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
<form action="{{route('division.store')}}" method="post" >
           @csrf
           <div class="form-group">
            <h5>Division Name <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text"  name="division_name" class="form-control">
            @error('division_name')
              <span class="text-danger">{{$message}}</span>
            @enderror

              </div>
        </div>

     

       <div class="text-xs-right">
           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Division">
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
