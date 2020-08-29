@extends('vinyl-graphics::layout')
@section('title', 'Checkout')
@section('content')
<div class="container">
    <form class="form" method="POST">
        @guest
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                    <small id="passwordHelp" class="form-text text-muted">If you already have an account, enter your password here and you'll be logged in. If not, we will create an account for you.</small>
                </div>
            </div>
        @endguest
        <div class="form-group">
            <h2>Shipping Address</h2>
        </div>
        @auth
            @if(Auth::user()->addresses()->count())
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
            <input type="text" class="form-control @error('shipping_address_1') is-invalid @enderror" name="shipping_address_1" id="shipping_address_1" placeholder="Address 1" value="{{ old('shipping_address_1') }}">
        </div>
        <div class="form-group">
            <label for="shipping_address_2">Address 2</label>
            <input type="text" class="form-control @error('shipping_address_2') is-invalid @enderror" name="shipping_address_2" id="shipping_address_2" placeholder="Address 2" value="{{ old('shipping_address_2') }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="shipping_city">City</label>
                <input type="text" class="form-control @error('shipping_city') is-invalid @enderror" name="shipping_city" id="shipping_city" placeholder="City" value="{{ old('shipping_city') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="shipping_state">State</label>
                <select class="form-control @error('shipping_state') is-invalid @enderror" name="shipping_state" id="shipping_state">
                    <option value="" {{ old('shipping_state') == "" ? 'selected' : '' }}></option>
                    <option value="AL" {{ old('shipping_state') == "AL" ? 'selected' : '' }}>Alabama</option>
                    <option value="AK" {{ old('shipping_state') == "AK" ? 'selected' : '' }}>Alaska</option>
                    <option value="AZ" {{ old('shipping_state') == "AZ" ? 'selected' : '' }}>Arizona</option>
                    <option value="AR" {{ old('shipping_state') == "AR" ? 'selected' : '' }}>Arkansas</option>
                    <option value="CA" {{ old('shipping_state') == "CA" ? 'selected' : '' }}>California</option>
                    <option value="CO" {{ old('shipping_state') == "CO" ? 'selected' : '' }}>Colorado</option>
                    <option value="CT" {{ old('shipping_state') == "CT" ? 'selected' : '' }}>Connecticut</option>
                    <option value="DE" {{ old('shipping_state') == "DE" ? 'selected' : '' }}>Delaware</option>
                    <option value="DC" {{ old('shipping_state') == "FL" ? 'selected' : '' }}>District Of Columbia</option>
                    <option value="FL" {{ old('shipping_state') == "GA" ? 'selected' : '' }}>Florida</option>
                    <option value="GA" {{ old('shipping_state') == "HI" ? 'selected' : '' }}>Georgia</option>
                    <option value="HI" {{ old('shipping_state') == "HI" ? 'selected' : '' }}>Hawaii</option>
                    <option value="ID" {{ old('shipping_state') == "ID" ? 'selected' : '' }}>Idaho</option>
                    <option value="IL" {{ old('shipping_state') == "IL" ? 'selected' : '' }}>Illinois</option>
                    <option value="IN" {{ old('shipping_state') == "IN" ? 'selected' : '' }}>Indiana</option>
                    <option value="IA" {{ old('shipping_state') == "IA" ? 'selected' : '' }}>Iowa</option>
                    <option value="KS" {{ old('shipping_state') == "KS" ? 'selected' : '' }}>Kansas</option>
                    <option value="KY" {{ old('shipping_state') == "KY" ? 'selected' : '' }}>Kentucky</option>
                    <option value="LA" {{ old('shipping_state') == "LA" ? 'selected' : '' }}>Louisiana</option>
                    <option value="ME" {{ old('shipping_state') == "ME" ? 'selected' : '' }}>Maine</option>
                    <option value="MD" {{ old('shipping_state') == "MD" ? 'selected' : '' }}>Maryland</option>
                    <option value="MA" {{ old('shipping_state') == "MA" ? 'selected' : '' }}>Massachusetts</option>
                    <option value="MI" {{ old('shipping_state') == "MI" ? 'selected' : '' }}>Michigan</option>
                    <option value="MN" {{ old('shipping_state') == "MN" ? 'selected' : '' }}>Minnesota</option>
                    <option value="MS" {{ old('shipping_state') == "MS" ? 'selected' : '' }}>Mississippi</option>
                    <option value="MO" {{ old('shipping_state') == "MO" ? 'selected' : '' }}>Missouri</option>
                    <option value="MT" {{ old('shipping_state') == "MT" ? 'selected' : '' }}>Montana</option>
                    <option value="NE" {{ old('shipping_state') == "NE" ? 'selected' : '' }}>Nebraska</option>
                    <option value="NV" {{ old('shipping_state') == "NV" ? 'selected' : '' }}>Nevada</option>
                    <option value="NH" {{ old('shipping_state') == "NH" ? 'selected' : '' }}>New Hampshire</option>
                    <option value="NJ" {{ old('shipping_state') == "NJ" ? 'selected' : '' }}>New Jersey</option>
                    <option value="NM" {{ old('shipping_state') == "NM" ? 'selected' : '' }}>New Mexico</option>
                    <option value="NY" {{ old('shipping_state') == "NY" ? 'selected' : '' }}>New York</option>
                    <option value="NC" {{ old('shipping_state') == "NC" ? 'selected' : '' }}>North Carolina</option>
                    <option value="ND" {{ old('shipping_state') == "ND" ? 'selected' : '' }}>North Dakota</option>
                    <option value="OH" {{ old('shipping_state') == "OH" ? 'selected' : '' }}>Ohio</option>
                    <option value="OK" {{ old('shipping_state') == "OK" ? 'selected' : '' }}>Oklahoma</option>
                    <option value="OR" {{ old('shipping_state') == "OR" ? 'selected' : '' }}>Oregon</option>
                    <option value="PA" {{ old('shipping_state') == "PA" ? 'selected' : '' }}>Pennsylvania</option>
                    <option value="RI" {{ old('shipping_state') == "RI" ? 'selected' : '' }}>Rhode Island</option>
                    <option value="SC" {{ old('shipping_state') == "SC" ? 'selected' : '' }}>South Carolina</option>
                    <option value="SD" {{ old('shipping_state') == "SD" ? 'selected' : '' }}>South Dakota</option>
                    <option value="TN" {{ old('shipping_state') == "TN" ? 'selected' : '' }}>Tennessee</option>
                    <option value="TX" {{ old('shipping_state') == "TX" ? 'selected' : '' }}>Texas</option>
                    <option value="UT" {{ old('shipping_state') == "UT" ? 'selected' : '' }}>Utah</option>
                    <option value="VT" {{ old('shipping_state') == "VT" ? 'selected' : '' }}>Vermont</option>
                    <option value="VA" {{ old('shipping_state') == "VA" ? 'selected' : '' }}>Virginia</option>
                    <option value="WA" {{ old('shipping_state') == "WA" ? 'selected' : '' }}>Washington</option>
                    <option value="WV" {{ old('shipping_state') == "WV" ? 'selected' : '' }}>West Virginia</option>
                    <option value="WI" {{ old('shipping_state') == "WI" ? 'selected' : '' }}>Wisconsin</option>
                    <option value="WY" {{ old('shipping_state') == "WY" ? 'selected' : '' }}>Wyoming</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="shipping_zip">City</label>
                <input type="text" class="form-control @error('shipping_zip') is-invalid @enderror" name="shipping_zip" id="shipping_zip" placeholder="Zip Code" value="{{ old('shipping_zip') }}">
            </div>
        </div>
        <div class="form-group">
            <h2>Billing Address</h2>
        </div>
        @auth
            @if(Auth::user()->addresses()->count())
                <div class="form-group">
                    <label for="select_billing_address">Select a saved address</label>
                    <select class="form-control" name="select_billing_address" id="select_billing_address">
                        <option value=""></option>
                        @foreach(Auth::user()->addresses as $address)
                            <option value="{{ $address->id }}">{{ $address->address_1 }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        @endauth
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="same_as_shipping" id="same_as_shipping" {{ old('same_as_shipping') ? 'checked' : '' }}>
            <label class="form-check-label" for="same_as_billing">Same as shipping address</label>
        </div>
        <div class="form-group">
            <label for="billing_address_1">Address 1</label>
            <input type="text" class="form-control @error('billing_address_1') is-invalid @enderror" name="billing_address_1" id="billing_address_1" placeholder="Address 1" value="{{ old('billing_address_1') }}">
        </div>
        <div class="form-group">
            <label for="billing_address_2">Address 2</label>
            <input type="text" class="form-control @error('billing_address_2') is-invalid @enderror" name="billing_address_2" id="billing_address_2" placeholder="Address 2" value="{{ old('billing_address_2') }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="billing_city">City</label>
                <input type="text" class="form-control @error('billing_city') is-invalid @enderror" name="billing_city" id="billing_city" placeholder="City" value="{{ old('billing_city') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="billing_state">State</label>
                <select class="form-control @error('billing_state') is-invalid @enderror" name="billing_state" id="billing_state">
                    <option value="" {{ old('billing_state') == "" ? 'selected' : '' }}></option>
                    <option value="AL" {{ old('billing_state') == "AL" ? 'selected' : '' }}>Alabama</option>
                    <option value="AK" {{ old('billing_state') == "AK" ? 'selected' : '' }}>Alaska</option>
                    <option value="AZ" {{ old('billing_state') == "AZ" ? 'selected' : '' }}>Arizona</option>
                    <option value="AR" {{ old('billing_state') == "AR" ? 'selected' : '' }}>Arkansas</option>
                    <option value="CA" {{ old('billing_state') == "CA" ? 'selected' : '' }}>California</option>
                    <option value="CO" {{ old('billing_state') == "CO" ? 'selected' : '' }}>Colorado</option>
                    <option value="CT" {{ old('billing_state') == "CT" ? 'selected' : '' }}>Connecticut</option>
                    <option value="DE" {{ old('billing_state') == "DE" ? 'selected' : '' }}>Delaware</option>
                    <option value="DC" {{ old('billing_state') == "FL" ? 'selected' : '' }}>District Of Columbia</option>
                    <option value="FL" {{ old('billing_state') == "GA" ? 'selected' : '' }}>Florida</option>
                    <option value="GA" {{ old('billing_state') == "HI" ? 'selected' : '' }}>Georgia</option>
                    <option value="HI" {{ old('billing_state') == "HI" ? 'selected' : '' }}>Hawaii</option>
                    <option value="ID" {{ old('billing_state') == "ID" ? 'selected' : '' }}>Idaho</option>
                    <option value="IL" {{ old('billing_state') == "IL" ? 'selected' : '' }}>Illinois</option>
                    <option value="IN" {{ old('billing_state') == "IN" ? 'selected' : '' }}>Indiana</option>
                    <option value="IA" {{ old('billing_state') == "IA" ? 'selected' : '' }}>Iowa</option>
                    <option value="KS" {{ old('billing_state') == "KS" ? 'selected' : '' }}>Kansas</option>
                    <option value="KY" {{ old('billing_state') == "KY" ? 'selected' : '' }}>Kentucky</option>
                    <option value="LA" {{ old('billing_state') == "LA" ? 'selected' : '' }}>Louisiana</option>
                    <option value="ME" {{ old('billing_state') == "ME" ? 'selected' : '' }}>Maine</option>
                    <option value="MD" {{ old('billing_state') == "MD" ? 'selected' : '' }}>Maryland</option>
                    <option value="MA" {{ old('billing_state') == "MA" ? 'selected' : '' }}>Massachusetts</option>
                    <option value="MI" {{ old('billing_state') == "MI" ? 'selected' : '' }}>Michigan</option>
                    <option value="MN" {{ old('billing_state') == "MN" ? 'selected' : '' }}>Minnesota</option>
                    <option value="MS" {{ old('billing_state') == "MS" ? 'selected' : '' }}>Mississippi</option>
                    <option value="MO" {{ old('billing_state') == "MO" ? 'selected' : '' }}>Missouri</option>
                    <option value="MT" {{ old('billing_state') == "MT" ? 'selected' : '' }}>Montana</option>
                    <option value="NE" {{ old('billing_state') == "NE" ? 'selected' : '' }}>Nebraska</option>
                    <option value="NV" {{ old('billing_state') == "NV" ? 'selected' : '' }}>Nevada</option>
                    <option value="NH" {{ old('billing_state') == "NH" ? 'selected' : '' }}>New Hampshire</option>
                    <option value="NJ" {{ old('billing_state') == "NJ" ? 'selected' : '' }}>New Jersey</option>
                    <option value="NM" {{ old('billing_state') == "NM" ? 'selected' : '' }}>New Mexico</option>
                    <option value="NY" {{ old('billing_state') == "NY" ? 'selected' : '' }}>New York</option>
                    <option value="NC" {{ old('billing_state') == "NC" ? 'selected' : '' }}>North Carolina</option>
                    <option value="ND" {{ old('billing_state') == "ND" ? 'selected' : '' }}>North Dakota</option>
                    <option value="OH" {{ old('billing_state') == "OH" ? 'selected' : '' }}>Ohio</option>
                    <option value="OK" {{ old('billing_state') == "OK" ? 'selected' : '' }}>Oklahoma</option>
                    <option value="OR" {{ old('billing_state') == "OR" ? 'selected' : '' }}>Oregon</option>
                    <option value="PA" {{ old('billing_state') == "PA" ? 'selected' : '' }}>Pennsylvania</option>
                    <option value="RI" {{ old('billing_state') == "RI" ? 'selected' : '' }}>Rhode Island</option>
                    <option value="SC" {{ old('billing_state') == "SC" ? 'selected' : '' }}>South Carolina</option>
                    <option value="SD" {{ old('billing_state') == "SD" ? 'selected' : '' }}>South Dakota</option>
                    <option value="TN" {{ old('billing_state') == "TN" ? 'selected' : '' }}>Tennessee</option>
                    <option value="TX" {{ old('billing_state') == "TX" ? 'selected' : '' }}>Texas</option>
                    <option value="UT" {{ old('billing_state') == "UT" ? 'selected' : '' }}>Utah</option>
                    <option value="VT" {{ old('billing_state') == "VT" ? 'selected' : '' }}>Vermont</option>
                    <option value="VA" {{ old('billing_state') == "VA" ? 'selected' : '' }}>Virginia</option>
                    <option value="WA" {{ old('billing_state') == "WA" ? 'selected' : '' }}>Washington</option>
                    <option value="WV" {{ old('billing_state') == "WV" ? 'selected' : '' }}>West Virginia</option>
                    <option value="WI" {{ old('billing_state') == "WI" ? 'selected' : '' }}>Wisconsin</option>
                    <option value="WY" {{ old('billing_state') == "WY" ? 'selected' : '' }}>Wyoming</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="billing_zip">City</label>
                <input type="text" class="form-control @error('billing_zip') is-invalid @enderror" name="billing_zip" id="billing_zip" placeholder="Zip Code" value="{{ old('billing_zip') }}">
            </div>
        </div>
        @csrf
        <div class="row mt-5">
            <div class="col-sm">
                <a class="btn btn-secondary btn-lg btn-block" href="{{ route('home') }}">Continue Shopping</a>
            </div>
            <div class="col-sm">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Continue to Payment</button>
            </div>
        </div>
    </form>
</div>
@endsection
