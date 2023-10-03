@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="card mb-3 m-3" >
    <div class="card-body">
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Edite Account</h1>
</div>
</div>
<form action="{{ route('admin.account.update') }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="card-body border-top">
        <div class="row align-items-center mb-3 m-8">
            <label class="col-md-2 mb-0 text-gray-600 required"><b>Name</b></label>
            <div class="col-md-6 ms-20" >
                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" name="name">
                @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            </div>
            <div class="row align-items-center mb-3 m-8">
                <label class="col-md-2 mb-0 text-gray-600 required"><b>Email</b></label>
                <div class="col-md-6 ms-20" >
                    <input type="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" name="email">
                    @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                </div>
                <div class="row align-items-center mb-3 m-8">
                    <label class="col-md-2 mb-0 text-gray-600 required"><b>New Password</b></label>
                    <div class="col-md-6 ms-20" >
                        <input id="myInput" type="password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('password') is-invalid @enderror" name="password" >
                        @error('password')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                        <input type="checkbox" id="showPassword">
                        <label for="showPassword">Show Password</label>
                    </div>
                    </div>
                    <div class="row align-items-center mb-3 m-8">
                        <label class="col-md-2 mb-0 text-gray-600 required"><b>Confirm Password</b></label>
                        <div class="col-md-6 ms-20" >
                            <input type="password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="password_confirmatio" required autocomplete="new-password">
                        </div>
                        </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9 m-5">
                        <button type="button" onclick="history.back()" class="btn btn-secondary m-1"> <i class="fas fa-ban"></i>Cancel</button>
                        <button class="btn btn-success ms- m-1"> <i class="fas fa-save"></i>Save</button>
                    </div>
                </div>
</form>
</div>
@section('scripts')
<script>
$('#showPassword').change(function(){
    if (document.getElementById("showPassword").checked) {
    document.getElementById("myInput").type = "text";
  } else {
    document.getElementById("myInput").type = "password";
  }
})

</script>
@endsection
@section('scripts1')
<script>
    @if (session('success'))
    Swal.fire({
    icon: 'success',
    title: "{{ session('success') }}"
    })
    @endif
</script>
@endsection
@stop


