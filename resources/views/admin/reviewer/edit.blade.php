@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="card mb-3 m-3" >
    <div class="card-body">
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Edite Addition</h1>
    <a class="btn btn-primary" href="{{ route('admin.additions.index') }}">All Additions</a>
</div>
</div>
<form action="{{ route('admin.additions.update',$addition->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body border-top">
        <div class="row align-items-center mb-3 m-8">
            <label class="col-md-2 mb-0 text-gray-600 required"><b>File</b></label>
            <div class="col-md-6 ms-20" >
                <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('file') is-invalid @enderror" name="file">
                @error('file')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
                <a href="{{ asset('uploads/files/'.$addition->file) }}" download >{{ $addition->file }}</a>
            </div>
            </div>
            <div class="row align-items-center mb-3 m-8">
                <label class="col-md-2 mb-0 text-gray-600 required"><b>Ranking</b></label>
                <div class="col-md-6 ms-20" >
                    <input type="text" placeholder="Ranking"class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('ranking') is-invalid @enderror" value="{{ $addition->ranking }}" name="ranking">
                    @error('ranking')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                </div>
                <div class="row align-items-center mb-3 m-8">
                    <label class="col-md-2 mb-0 text-gray-600 required"><b>Comments</b></label>
                    <div class="col-md-6 ms-20" >
                        <input type="text" placeholder="comments" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('comments') is-invalid @enderror" value="{{ $addition->comments }}" name="comments">
                        @error('comments')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9 m-5">
                        <button type="button" onclick="history.back()" class="btn btn-secondary m-1"> <i class="fas fa-ban"></i>Cancel</button>
                        <button class="btn btn-success ms- m-1"> <i class="fas fa-save"></i>Save</button>
                    </div>
    </div>
</form>
</div>
@stop


