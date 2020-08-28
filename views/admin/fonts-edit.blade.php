@extends('vinyl-graphics::admin.layout')
@section('title', 'Edit Font')
@section('content')
    <h1>Edit Font</h1>
    <div class="row mb-5">
        {!! $font->svg !!}
    </div>
    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            @error('name')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ $font->name }}">
        </div>
        <div class="form-group">
            <label for="font">SVG</label>
            @error('font')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <textarea class="form-control @error('font') is-invalid @enderror" id="font" name="font" rows="20">{!! $font->svg !!}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        @csrf
    </form>
@endsection
