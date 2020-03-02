@extends('vinyl-graphics::admin.layout')
@section('title', 'Backgrounds')
@section('content')
    <h1>Backgrounds</h1>
    <a class="btn btn-primary" href="{{ route('admin.backgrounds.add') }}">Add a Background</a>
    <div class="row mt-5">
        @foreach($backgrounds as $background)
            <div class="card mr-4 mb-4" style="width: 200px">
                <a href="{{ route('admin.backgrounds.edit', ['id' => $background->id]) }}">
                    <img class="rounded float-left" src="{{ $background->resize(200, 200) }}">
                </a>
                <div class="card-body">
                    <a href="{{ route('admin.backgrounds.edit', ['id' => $background->id]) }}">
                        <h5 class="card-title">{{ $background->name }}</h5>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $backgrounds->appends($_GET)->links() }}
@endsection