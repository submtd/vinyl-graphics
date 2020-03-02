@extends('vinyl-graphics::admin.layout')
@section('title', 'Edit Font')
@section('content')
    <h1>Edit Font</h1>
    <div class="row mb-5">
        <img class="img-fluid" src="{{ $font->path }}">
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            @error('name')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ $font->name }}">
        </div>
        <div class="form-group">
            <label for="font">SVG File</label>
            @error('font')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="file" class="form-control-file @error('font') is-invalid @enderror" id="font" name="font" placeholder="Font">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        @csrf
    </form>
@endsection