@extends('vinyl-graphics::layout')
@section('title', 'Payment')
@section('content')
<div class="container">
    <form class="form" method="POST">
        <div class="form-group">
            <label for="number">Credit Card Number</label>
            <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" id="number" placeholder="Credit card number" value="{{ old('number') }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="exp_month">Expiration Month</label>
                <select class="form-control @error('exp_month') is-invalid @enderror" name="exp_month" id="exp_month">
                    <option value="" {{ old('exp_month') == '' ? 'selected' : '' }}></option>
                    <option value="1" {{ old('exp_month') == '1' ? 'selected' : '' }}>01 (January)</option>
                    <option value="2" {{ old('exp_month') == '2' ? 'selected' : '' }}>02 (February)</option>
                    <option value="3" {{ old('exp_month') == '3' ? 'selected' : '' }}>03 (March)</option>
                    <option value="4" {{ old('exp_month') == '4' ? 'selected' : '' }}>04 (April)</option>
                    <option value="5" {{ old('exp_month') == '5' ? 'selected' : '' }}>05 (May)</option>
                    <option value="6" {{ old('exp_month') == '6' ? 'selected' : '' }}>06 (June)</option>
                    <option value="7" {{ old('exp_month') == '7' ? 'selected' : '' }}>07 (July)</option>
                    <option value="8" {{ old('exp_month') == '8' ? 'selected' : '' }}>08 (August)</option>
                    <option value="9" {{ old('exp_month') == '9' ? 'selected' : '' }}>09 (September)</option>
                    <option value="10" {{ old('exp_month') == '10' ? 'selected' : '' }}>10 (October)</option>
                    <option value="11" {{ old('exp_month') == '11' ? 'selected' : '' }}>11 (November)</option>
                    <option value="12" {{ old('exp_month') == '12' ? 'selected' : '' }}>12 (December)</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="exp_year">Expiration Year</label>
                <select class="form-control @error('exp_year') is-invalid @enderror" name="exp_year" id="exp_year">
                    <option value="" {{ old('exp_year') == '' ? 'selected' : '' }}></option>
                    <option value="2020" {{ old('exp_year') == '2020' ? 'selected' : '' }}>2020</option>
                    <option value="2021" {{ old('exp_year') == '2021' ? 'selected' : '' }}>2021</option>
                    <option value="2022" {{ old('exp_year') == '2022' ? 'selected' : '' }}>2022</option>
                    <option value="2023" {{ old('exp_year') == '2023' ? 'selected' : '' }}>2023</option>
                    <option value="2024" {{ old('exp_year') == '2024' ? 'selected' : '' }}>2024</option>
                    <option value="2025" {{ old('exp_year') == '2025' ? 'selected' : '' }}>2025</option>
                    <option value="2026" {{ old('exp_year') == '2026' ? 'selected' : '' }}>2026</option>
                    <option value="2027" {{ old('exp_year') == '2027' ? 'selected' : '' }}>2027</option>
                    <option value="2028" {{ old('exp_year') == '2028' ? 'selected' : '' }}>2028</option>
                    <option value="2029" {{ old('exp_year') == '2029' ? 'selected' : '' }}>2029</option>
                    <option value="2030" {{ old('exp_year') == '2030' ? 'selected' : '' }}>2030</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="cvc">CVC</label>
                <input type="text" class="form-control @error('cvc') is-invalid @enderror" name="cvc" id="cvc" value="{{ old('cvc') }}">
            </div>
        </div>
        @csrf
        <div class="row mt-5">
            <div class="col-sm">
                <a class="btn btn-secondary btn-lg btn-block" href="{{ route('home') }}">Continue Shopping</a>
            </div>
            <div class="col-sm">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
