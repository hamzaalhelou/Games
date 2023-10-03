@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="card mb-3 m-3" >
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center  mb-4">
            <h1 class="h3 text-gray-800 mb-0">Account</h1>
            <a class="btn btn-primary" href="{{ route('admin.account') }}">Edite Account</a>
        </div>
</div>
<form action="{{ route('admin.account.update') }}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="card-body border-top">
        <div class="row align-items-center mb-3 m-8">
            <label class="col-md-2 mb-0 text-gray-600 required"><b>Name</b></label>
            <div class="col-md-6 ms-20" >
                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ Auth::user()->name }}" disabled name="name">
            </div>
            </div>
            <div class="row align-items-center mb-3 m-8">
                <label class="col-md-2 mb-0 text-gray-600 required"><b>Email</b></label>
                <div class="col-md-6 ms-20" >
                    <input type="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ Auth::user()->email }}" disabled name="email">
                </div>
                </div>
                </div>
</form>
</div>
@stop


