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
        <div class="form-group">
            <label for="type">Type</label>
            @error('type')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                <option value="vinyl" {{ $color->type == 'vinyl' ? 'selected' : '' }}>Vinyl</option>
                <option value="print" {{ $color->type == 'print' ? 'selected' : '' }}>Print</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cost_per_character">Cost per character</label>
            @error('cost_per_character')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('cost_per_character') is-invalid @enderror" id="cost_per_character" name="cost_per_character" placeholder="Cost per character" value="{{ $color->cost_per_character }}">
        </div>
        <div class="form-group">
            <label for="border_cost_per_character">Border cost per character</label>
            @error('border_cost_per_character')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('border_cost_per_character') is-invalid @enderror" id="border_cost_per_character" name="border_cost_per_character" placeholder="Border cost per character" value="{{ $color->border_cost_per_character }}">
        </div>
        <div class="form-group">
            <label for="enabled_for_color">Enabled for color</label>
            <select class="form-control @error('enabled_for_color') is-invalid @enderror" id="enabled_for_color" name="enabled_for_color">
                <option value="1"{{ $color->enabled_for_color == 1 ? ' selected' : ''}}>True</option>
                <option value="0"{{ $color->enabled_for_color == 0 ? ' selected' : ''}}>False</option>
            </select>
        </div>
        <div class="form-group">
            <label for="enabled_for_border">Enabled for border</label>
            <select class="form-control @error('enabled_for_border') is-invalid @enderror" id="enabled_for_border" name="enabled_for_border">
                <option value="1"{{ $color->enabled_for_border == 1 ? ' selected' : ''}}>True</option>
                <option value="0"{{ $color->enabled_for_border == 0 ? ' selected' : ''}}>False</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <input type="hidden" name="updated" value="1">
        @csrf
    </form>
@endsection
