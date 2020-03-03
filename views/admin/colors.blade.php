@extends('vinyl-graphics::admin.layout')
@section('title', 'Colors')
@section('content')
    <h1>Colors</h1>
    <a class="btn btn-primary" href="{{ route('admin.colors.add') }}">Add a Color</a>
    <div class="row mt-5">
        @foreach($colors as $color)
            <div class="card mr-4 mb-4" style="width: 200px">
                <a href="{{ route('admin.colors.edit', ['id' => $color->id]) }}" style="background: {{ $color->color_code }}; height: 200px; display: block;">
                    &nbsp;
                </a>
                <div class="card-body">
                    <a href="{{ route('admin.colors.edit', ['id' => $color->id]) }}">
                        <h5 class="card-title">{{ $color->name }}</h5>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $colors->appends($_GET)->links() }}
@endsection