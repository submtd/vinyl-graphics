@extends('vinyl-graphics::admin.layout')
@section('title', 'Add Background Image')
@section('content')
    <h1>Add Background Image</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            @error('name')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            @error('image')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" placeholder="Image">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
        @csrf
    </form>
@endsection