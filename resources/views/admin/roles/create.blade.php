@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="card mb-3 m-3" >
    <div class="card-body">
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Add New</h1>
    <a class="btn btn-primary" href="{{ route('admin.additions.index') }}">All Roles</a>
</div>
</div>
<form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body border-top">
        <div class="row align-items-center mb-3 m-8">
            <label class="col-md-2 mb-0 text-gray-600 required"><b>Name</b></label>
            <div class="col-md-6 ms-20" >
                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('name') is-invalid @enderror" name="name">
                @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            </div>

            <label><input type="checkbox" id="check_all" /> All </label><br>
            @foreach ($permissions as $p)
            <label> <input type="checkbox" value="{{ $p->id }}" name="permissions[]"> {{$p->name }}</label> <br>
            @endforeach
            <div class="card-footer d-flex justify-content-end py-6 px-9 m-5">
                <button type="button" onclick="history.back()" class="btn btn-secondary m-1"> <i class="fas fa-ban"></i>Cancel</button>
                <button class="btn btn-success ms- m-1"> <i class="fas fa-save"></i>Save</button>
            </div>
        </div>
</form>
</div>
@stop
@section('scripts')

<script>
    $('#check_all').change(function() {
        $('input[type=checkbox]').attr('checked', this.checked )
    })
</script>
@stop


