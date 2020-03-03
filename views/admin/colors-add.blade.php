@extends('vinyl-graphics::admin.layout')
@section('title', 'Add Color')
@section('content')
    <h1>Add Color</h1>
    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            @error('name')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="color_code">HTML Color Code</label>
            @error('color_code')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('color_code') is-invalid @enderror" id="color_code" name="color_code" placeholder="Color Code" value="{{ old('color_code') }}">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        @csrf
    </form>
@endsection