<?php

namespace Submtd\VinylGraphics\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PublicCheckout extends Controller
{
    public function __invoke(Request $request)
    {
        if (! $order = $request->session()->get('order')) {
            return response()->redirectTo(route('home'));
        }
        if (! $order->items()->count()) {
            return response()->redirectTo(route('home'));
        }
        if ($request->getMethod() != 'POST') {
            return view('vinyl-graphics::public.checkout');
        }
        $rules = [
            'shipping_address_1' => 'required_without:select_shipping_address|max:255',
            'shipping_address_2' => 'nullable',
            'shipping_city' => 'required_without:select_shipping_address',
            'shipping_state' => 'required_without:select_shipping_address',
            'shipping_zip' => 'required_without:select_shipping_address',
            'billing_address_1' => 'required_without_all:select_billing_address,same_as_shipping',
            'billing_address_2' => 'nullable',
            'billing_city' => 'required_without_all:select_billing_address,same_as_shipping',
            'billing_state' => 'required_without_all:select_billing_address,same_as_shipping',
            'billing_zip' => 'required_without_all:select_billing_address,same_as_shipping',
        ];
        if (! $user = Auth::user()) {
            $rules = array_merge($rules, [
                'email' => 'required|email',
                'password' => 'required|min:6|max:32',
            ]);
        }
        $request->validate($rules);
        if (! $user) {
            if (! $user = User::where('email', $request->get('email'))->first()) {
                $user = User::create([
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password')),
                ]);
                Auth::login($user);
            } else {
                if (! Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                    $error = ValidationException::withMessages([
                        'password' => ['Invalid password'],
                    ]);
                    throw $error;
                }
            }
        }
        $user = Auth::user();
        $order->user_id = Auth::id();
        if ($request->get('select_shipping_address')) {
            if (! $shippingAddress = $user->addresses()->where('id', $request->get('select_shipping_address'))->first()) {
                $error = ValidationException::withMessages([
                    'select_shipping_address' => ['Invalid shipping address'],
                ]);
                throw $error;
            }
        } else {
            $shippingAddress = $user->addresses()->firstOrCreate([
                'address_1' => $request->get('shipping_address_1'),
                'address_2' => $request->get('shipping_address_2'),
                'city' => $request->get('shipping_city'),
                'state' => $request->get('shipping_state'),
                'zip' => $request->get('shipping_zip'),
                'primary_shipping' => false,
                'primary_billing' => false,
            ]);
        }
        $order->shipping_address_id = $shippingAddress->id;
        if ($request->get('select_billing_address')) {
            if (! $billingAddress = $user->addresses()->where('id', $request->get('select_billing_address'))->first()) {
                $error = ValidationException::withMessages([
                    'select_billing_address' => ['Invalid billing address'],
                ]);
                throw $error;
            }
        } elseif ($request->get('same_as_shipping')) {
            $billingAddress = $shippingAddress;
        } else {
            $billingAddress = $user->addresses()->firstOrCreate([
                'address_1' => $request->get('billing_address_1'),
                'address_2' => $request->get('billing_address_2'),
                'city' => $request->get('billing_city'),
                'state' => $request->get('billing_state'),
                'zip' => $request->get('billing_zip'),
                'primary_shipping' => false,
                'primary_billing' => false,
            ]);
        }
        $order->billing_address_id = $billingAddress->id;
        $order->save();
        $request->session()->put('order', $order);

        return response()->redirectTo(route('payment'));
    }
}
