@extends('vinyl-graphics::layout')
@section('title', 'Home')
@section('content')
<div class="container" id="app">
    <style v-if="typeof color !== 'undefined'">
        svg text {
            fill: @{{ color.attributes.color_code }} !important;
            stroke: @{{ borderColor.attributes.color_code }} !important;
        }
    </style>
    <div class="order-image" id="order-image">
        <img src="{{ $image->resize(800, 600) }}">
    </div>
    <div v-if="typeof font !== 'undefined'" class="selected-font" id="selected-font" v-html="font.attributes.svg">
    </div>
    <form>
        @csrf
        <div class="form-group">
            <label for="font">Font</label>
            <select class="form-control" id="font" name="font" v-model="selectedFont">
                <option v-for="font in fonts" v-bind:value="font.id">@{{ font.attributes.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <select class="form-control" id="color" name="color" v-model="selectedColor">
                <option v-for="color in colors" v-bind:value="color.id">@{{ color.attributes.display }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="border_color">Border Color</label>
            <select class="form-control" id="border_color" name="border_color" v-model="selectedBorderColor">
                <option v-for="color in colors" v-bind:value="color.id">@{{ color.attributes.display }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="text">Text</label>
            <input class="form-control" id="text" name="text">
        </div>
        <button type="submit" class="btn btn-lg btn-primary">Add to Cart</button>

    </form>
</div>


@endsection
