@extends('vinyl-graphics::admin.layout')
@section('title', 'Add Font')
@section('content')
    <h1>Add Font</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            @error('name')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="font">SVG File</label>
            @error('font')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="file" class="form-control-file @error('font') is-invalid @enderror" id="font" name="font" placeholder="Font">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
        @csrf
    </form>
@endsection