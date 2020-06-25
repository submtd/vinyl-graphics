@extends('vinyl-graphics::layout')
@section('title', 'Register')
@section('content')
<form method="post">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    @csrf
</form>
@endsection
