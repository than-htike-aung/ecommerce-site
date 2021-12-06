@extends('admin.admin_master')
@section('admin')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Admin Profile Edit</h4>
        
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
    <form action="{{route('admin.profile.store')}}" method="post"  enctype="multipart/form-data">
       @csrf
        {{-- <input type="hidden" value="{{$editData->id}}" name="id">
        {{ csrf_field() }}    --}}
        <div class="row">
                   <div class="col-12">	
                       
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Admin User Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="name" class="form-control" value="{{$editData->name}}" required="" >
                        </div>
                    </div>
                </div> <!-- end col md 6 -->

                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Admin Email <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="email" name="email" value="{{$editData->email}}" class="form-control" required="" >
                        </div>
                    </div>
                </div> <!-- end col md 6 -->
            </div>  <!-- end row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Profile Image <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" class="form-control" required="" name="profile_photo_path" id="image" onchange="loadFile(event)" > </div>
                    </div>
                    
                </div><!-- end col md 6 -->
                <div class="col-md-6">
                    <img id="showImage" src="{{!empty($editData->profile_photo_path) ?
                        url('upload/admin_images/'.$editData->profile_photo_path) :
                        url('upload/no_image.jpg')}}" style="width: 100px; height:100px" alt="">
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

{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataUrl(e.target.files['0']);
        });
    });
</script> --}}

<!--  at the input => using onchange="loadFile(event)" -->
<script>
    var loadFile = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('showImage');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
  </script>



{{-- <script>
    $('#image').change(function() {
    var url = window.URL.createObjectURL(this.files[0]);
     $('#showImage').attr('src',url);
    });
</script> --}}


@endsection