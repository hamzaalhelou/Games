@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<form action="{{ route('admin.reviewers.store') }}" method="POST" enctype="multipart/form-data">
 @csrf
    <div class="modal-body">
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
      <input name="type" type="button" id="invalidDemoButton" class="btn btn-danger" data-dismiss="modal" value="Invalid Demo" />

      <input name="type" type="button" id="completeReviewButton" class="btn btn-primary" data-dismiss="modal" value="Complete review" />

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
@stop


