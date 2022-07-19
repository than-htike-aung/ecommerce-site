$(function(){
    $(document).on('click', '#delete', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

            Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })

    })
  })


  $(function(){
    $(document).on('click', '#confirm', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

            Swal.fire({
        title: 'Are you sure to confirm?',
        text: "Once confirm, You will not be able to pending again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Confirm'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Confirm!',
            'Confirm Changes',
            'success'
          )
        }
      })

    })
  })

  
  $(function(){
    $(document).on('click', '#processing', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

            Swal.fire({
        title: 'Are you sure to processing?',
        text: "Once processing, You will not be able to pending again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Processing'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Processing!',
            'Processing Changes',
            'success'
          )
        }
      })

    })
  })

   
  $(function(){
    $(document).on('click', '#picked', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

            Swal.fire({
        title: 'Are you sure to picked?',
        text: "Once picked, You will not be able to pending again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Picked!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Picked!',
            'Picked Changes',
            'success'
          )
        }
      })

    })
  })

   
  $(function(){
    $(document).on('click', '#shipped', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

            Swal.fire({
        title: 'Are you sure to shipped?',
        text: "Once shipped, You will not be able to pending again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Shipped!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Shipped!',
            'Shipped Changes',
            'success'
          )
        }
      })

    })
  })

  
  $(function(){
    $(document).on('click', '#delivered', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

            Swal.fire({
        title: 'Are you sure to delivered?',
        text: "Once delivered, You will not be able to pending again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delivered!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Delivered!',
            'Delivered Changes',
            'success'
          )
        }
      })

    })
  })