@extends('vinyl-graphics::layout')
@section('title', 'Checkout')
@section('content')
<div class="container">
    <form class="form" method="POST">
        @guest
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    @error('email')
                        <small class="form-text alert alert-danger">{{ $message }}</small>
                    @enderror
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    @error('password')
                        <small class="form-text alert alert-danger">{{ $password }}</small>
                    @enderror
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                    <small id="passwordHelp" class="form-text text-muted">If you already have an account, enter your password here and you'll be logged in. If not, we will create an account for you.</small>
                </div>
            </div>
        @endguest
        <div class="form-group">
            <h2>Shipping Address</h2>
        </div>
        @auth
            @if(Auth::user()->addresses()->count)
                <div class="form-group">
                    <label for="select_shipping_address">Select a saved address</label>
                    <select class="form-control" name="select_shipping_address" id="select_shipping_address">
                        <option value=""></option>
                        @foreach(Auth::user()->addresses as $address)
                            <option value="{{ $address->id }}">{{ $address->address_1 }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        @endauth
        <div class="form-group">
            <label for="shipping_address_1">Address 1</label>
            @error('shipping_address_1')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('shipping_address_1') is-invalid @enderror" name="shipping_address_1" id="shipping_address_1" placeholder="Address 1" value="{{ old('shipping_address_1') }}">
        </div>
        <div class="form-group">
            <label for="shipping_address_2">Address 2</label>
            @error('shipping_address_2')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('shipping_address_2') is-invalid @enderror" name="shipping_address_2" id="shipping_address_2" placeholder="Address 2" value="{{ old('shipping_address_2') }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="shipping_city">City</label>
                @error('shipping_city')
                    <small class="form-text alert alert-danger">{{ $message }}</small>
                @enderror
                <input type="text" class="form-control @error('shipping_city') is-invalid @enderror" name="shipping_city" id="shipping_city" placeholder="City" value="{{ old('shipping_city') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="shipping_state">State</label>
                @error('shipping_state')
                    <small class="form-text alert alert-danger">{{ $message }}</small>
                @enderror
                <select class="form-control @error('shipping_state') is-invalid @enderror" name="shipping_state" id="shipping_state">
                    <option value=""></option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="shipping_zip">City</label>
                @error('shipping_zip')
                    <small class="form-text alert alert-danger">{{ $message }}</small>
                @enderror
                <input type="text" class="form-control @error('shipping_zip') is-invalid @enderror" name="shipping_zip" id="shipping_zip" placeholder="Zip Code" value="{{ old('shipping_zip') }}">
            </div>
        </div>
        <div class="form-group">
            <h2>Billing Address</h2>
        </div>
        @auth
            @if(Auth::user()->addresses()->count)
                <div class="form-group">
                    <label for="select_shipping_address">Select a saved address</label>
                    <select class="form-control" name="select_shipping_address" id="select_shipping_address">
                        <option value=""></option>
                        @foreach(Auth::user()->addresses as $address)
                            <option value="{{ $address->id }}">{{ $address->address_1 }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        @endauth
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="same_as_shipping" id="same_as_shipping">
            <label class="form-check-label" for="same_as_shipping">Same as shipping address</label>
        </div>
        <div class="form-group">
            <label for="shipping_address_1">Address 1</label>
            @error('shipping_address_1')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('shipping_address_1') is-invalid @enderror" name="shipping_address_1" id="shipping_address_1" placeholder="Address 1" value="{{ old('shipping_address_1') }}">
        </div>
        <div class="form-group">
            <label for="shipping_address_2">Address 2</label>
            @error('shipping_address_2')
                <small class="form-text alert alert-danger">{{ $message }}</small>
            @enderror
            <input type="text" class="form-control @error('shipping_address_2') is-invalid @enderror" name="shipping_address_2" id="shipping_address_2" placeholder="Address 2" value="{{ old('shipping_address_2') }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="shipping_city">City</label>
                @error('shipping_city')
                    <small class="form-text alert alert-danger">{{ $message }}</small>
                @enderror
                <input type="text" class="form-control @error('shipping_city') is-invalid @enderror" name="shipping_city" id="shipping_city" placeholder="City" value="{{ old('shipping_city') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="shipping_state">State</label>
                @error('shipping_state')
                    <small class="form-text alert alert-danger">{{ $message }}</small>
                @enderror
                <select class="form-control @error('shipping_state') is-invalid @enderror" name="shipping_state" id="shipping_state">
                    <option value=""></option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="shipping_zip">City</label>
                @error('shipping_zip')
                    <small class="form-text alert alert-danger">{{ $message }}</small>
                @enderror
                <input type="text" class="form-control @error('shipping_zip') is-invalid @enderror" name="shipping_zip" id="shipping_zip" placeholder="Zip Code" value="{{ old('shipping_zip') }}">
            </div>

        @csrf
    </form>
</div>
@endsection
