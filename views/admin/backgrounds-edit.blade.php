@extends('vinyl-graphics::admin.layout')
@section('title', 'Edit Background Image')
@section('content')
    <h1>Edit Background Image</h1>
    <div class="row mb-5">
        <img class="img-fluid" src="{{ $background->path }}">
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            @error('name')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ $background->name }}">
        </div>
        <div class="form-group">
            <label for="image">Replace Image</label>
            @error('image')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" placeholder="Image">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <input type="hidden" name="updated" value="1">
        @csrf
    </form>
@endsection