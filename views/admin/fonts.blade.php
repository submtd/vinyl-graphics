@extends('vinyl-graphics::admin.layout')
@section('title', 'Fonts')
@section('content')
    <h1>Fonts</h1>
    <a class="btn btn-primary" href="{{ route('admin.fonts.add') }}">Add a Font</a>
    <div class="row mt-5">
        @foreach($fonts as $font)
                <a href="{{ route('admin.fonts.edit', ['id' => $font->id]) }}">
                    {!! $font->svg !!}
                </a>
        @endforeach
    </div>
    {{ $fonts->appends($_GET)->links() }}
@endsection
