@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-body">
      <form>
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
      </form>
    </div>
    <div class="modal-footer justify-content-start">
      <button type="button" id="invalidDemoButton" class="btn btn-danger" data-dismiss="modal">Invalid Demo</button>
      <button type="button" id="completeReviewButton" class="btn btn-primary" data-dismiss="modal">Complete review</button>
      <button type="button" onclick="history.back()" class="btn btn-secondary"> <i class="fas fa-ban"></i>Cancel</button>
    </div>

  </div>
  @section('scripts')
  <script>
    $(document).ready(function() {
        $("#signupModal").modal('show');
    });
</script>
  @endsection
@stop


