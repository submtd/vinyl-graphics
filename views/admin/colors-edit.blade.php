@extends('vinyl-graphics::admin.layout')
@section('title', 'Edit Color')
@section('content')
    <h1>Edit Color</h1>
    <div class="mb-5" style="background: {{ $color->color_code }}; height: 200px;">
        &nbsp;
    </div>
    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            @error('name')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ $color->name }}">
        </div>
        <div class="form-group">
            <label for="color_code">HTML Color Code</label>
            @error('color_code')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('color_code') is-invalid @enderror" id="color_code" name="color_code" placeholder="Color Code" value="{{ $color->color_code }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <input type="hidden" name="updated" value="1">
        @csrf
    </form>
@endsection