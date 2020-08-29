@extends('vinyl-graphics::layout')
@section('title', 'Home')
@section('content')
<div class="container" id="app">
    <div class="order-image" id="order-image">
        <img src="{{ $image->resize(800, 600) }}">
    </div>
    <div v-if="typeof font !== 'undefined'" class="selected-font" id="selected-font" v-html="font.attributes.svg">
    </div>
    <form method="POST" action="{{ route('add') }}">
        @csrf
        <div class="form-group">
            <label for="font">Font</label>
            <select class="form-control @error('font') is-invalid @enderror" id="font" name="font" v-model="selectedFont">
                <option v-for="font in fonts" v-bind:value="font.id">@{{ font.attributes.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <select class="form-control @error('color') is-invalid @enderror" id="color" name="color" v-model="selectedColor">
                <option v-for="color in colors" v-bind:value="color.id">@{{ color.attributes.display }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="border_color">Border Color</label>
            <select class="form-control @error('border_color') is-invalid @enderror" id="border_color" name="border_color" v-model="selectedBorderColor">
                <option v-for="color in borderColors" v-bind:value="color.id">@{{ color.attributes.display }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="text">Text</label>
            <input class="form-control @error('text') is-invalid @enderror" id="text" name="text" v-model="text">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="1" v-model="quantity">
        </div>
        <button type="submit" class="btn btn-lg btn-primary">Add to Cart ($@{{ price.toFixed(2) }})</button>

    </form>
</div>


@endsection
