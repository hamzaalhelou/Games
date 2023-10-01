@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="card mb-3 m-3" >
    <div class="card-body">
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Add New</h1>
    <a class="btn btn-primary" href="{{ route('admin.additions.index') }}">All My Demos</a>
</div>
</div>
<form action="{{ route('admin.additions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body border-top">
        <div class="row align-items-center mb-3 m-8">
            <label class="col-md-2 mb-0 text-gray-600 required"><b>Demo</b></label>
            <div class="col-md-6 ms-20" >
                <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('file') is-invalid @enderror" name="file">
                @error('file')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            </div>
            <div class="row align-items-center mb-3 m-8">
                <label class="col-md-2 mb-0 text-gray-600 required"><b>Game Rank</b></label>
                <div class="col-md-6 ms-20" >
                    <input type="text" placeholder="e.g. Gold Nova II, or FACEIT Level 5"class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('game_rank') is-invalid @enderror" name="game_rank">
                    @error('game_rank')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                </div>
                <div class="row align-items-center mb-3 m-8">
                    <label class="col-md-2 mb-0 text-gray-600 required"><b>Comments</b></label>
                    <div class="col-md-6 ms-20" >
                        <textarea placeholder="Anything else we should know?" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('comments') is-invalid @enderror" name="comments" rows="5"></textarea>
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


