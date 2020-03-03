@extends('vinyl-graphics::admin.layout')
@section('title', 'Fonts')
@section('content')
    <h1>Fonts</h1>
    <a class="btn btn-primary" href="{{ route('admin.fonts.add') }}">Add a Font</a>
    <div class="row mt-5">
        @foreach($fonts as $font)
            <div class="card mr-4 mb-4" style="width: 200px">
                <a href="{{ route('admin.fonts.edit', ['id' => $font->id]) }}">
                    {{ $font->svg }}
                </a>
                <div class="card-body">
                    <a href="{{ route('admin.fonts.edit', ['id' => $font->id]) }}">
                        <h5 class="card-title">{{ $font->name }}</h5>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $fonts->appends($_GET)->links() }}
@endsection