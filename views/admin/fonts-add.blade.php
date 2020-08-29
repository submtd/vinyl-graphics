@extends('vinyl-graphics::admin.layout')
@section('title', 'Add Font')
@section('content')
    <h1>Add Font</h1>
    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            @error('name')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="font">SVG</label>
            @error('font')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <textarea class="form-control @error('font') is-invalid @enderror" id="font" name="font" rows="20"></textarea>
        </div>
        <div class="form-group">
            <label for="cost_multiplier">Cost Multiplier</label>
            @error('cost_multiplier')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('cost_multiplier') is-invalid @enderror" id="cost_multiplier" name="cost_multiplier" placeholder="Cost Multiplier" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
        @csrf
    </form>
@endsection
