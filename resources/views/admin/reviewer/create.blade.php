@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<form enctype="multipart/form-data">
    <div class="modal-body">
        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Download URL of the file:</label>
            <a href="{{ asset('uploads/files/'.$addition->file) }}" >{{ $addition->file }}</a>
          </div>
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Reviewed by:</label>
          <input type="text" class="form-control" id="recipient-name">
        </div>
        <div class="form-group">
          <label for="message-text" class="col-form-label">review:</label>
          <textarea class="form-control" id="message-text"></textarea>
        </div>

    </div>
    <div class="modal-footer justify-content-start">
      <button type="submit" id="invalidDemoButton" class="btn btn-danger" data-dismiss="modal" >Invalid Demo</button>

      <button type="submit" id="completeReviewButton" class="btn btn-primary" data-dismiss="modal" >Complete review</button>

      <button type="button" onclick="history.back()" class="btn btn-secondary"> <i class="fas fa-ban"></i>Cancel</button>
    </div>
</form>
  </div>
  @section('scripts')
  <script>
    $(document).ready(function() {
        $("#signupModal").modal('show');
    });
  </script>
  @endsection
  @section('scripts1')
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#invalidDemoButton").click(function(e){

        e.preventDefault();

        var reviewed_by = $("#recipient-name").val();
        var your_review = $("#message-text").val();
        var type = 'Invalid demo';

        $.ajax({
           type:'POST',
           url:"{{ route('admin.reviewers.store') }}",
           data:{reviewed_by:reviewed_by, your_review:your_review, type:type},
           success:function(data){
                if($.isEmptyObject(data.error)){
                    Swal.fire({
    icon: 'success',
    title:' success',
    text: data.success
  }).then(function(){
    location.reload();
  })
                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });



    $("#completeReviewButton").click(function(e){

e.preventDefault();

var reviewed_by = $("#recipient-name").val();
        var your_review = $("#message-text").val();
        var type = 'Yes';

$.ajax({
   type:'POST',
   url:"{{ route('admin.reviewers.store') }}",
   data:{reviewed_by:reviewed_by, your_review:your_review, type:type},
   success:function(data){
        if($.isEmptyObject(data.error)){
            Swal.fire({
    icon: 'success',
    title:' success',
    text: data.success
  }).then(function(){
    location.reload();
  })

        }else{
            printErrorMsg(data.error);
        }
   }
});

});

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }


  </script>
  @endsection
@stop


