<?php

namespace Submtd\VinylGraphics\Controllers;

use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PublicPayment extends Controller
{
    public function __invoke(Request $request)
    {
        if (! $user = Auth::user()) {
            abort(404);
        }
        if (! $order = $request->session()->get('order')) {
            return response()->redirectTo(route('home'));
        }
        if (! $order->items()->count()) {
            return response()->redirectTo(route('home'));
        }
        if ($request->getMethod() != 'POST') {
            return view('vinyl-graphics::public.payment');
        }
        $request->validate([
            'number' => 'required|numeric',
            'exp_month' => 'required|numeric',
            'exp_year' => 'required|numeric',
            'cvc' => 'required|numeric',
        ]);
        $stripe = new Stripe(env('STRIPE_SECRET_KEY'));
        $customer = $stripe->customers()->create([
            'email' => $user->email,
        ]);
        $token = $stripe->tokens()->create([
            'card' => [
                'number' => $request->get('number'),
                'exp_month' => $request->get('exp_month'),
                'cvc' => $request->get('cvc'),
                'exp_year' => $request->get('exp_year'),
            ],
        ]);
        $stripe->cards()->create($customer['id'], $token['id']);
        $charge = $stripe->charges()->create([
            'customer' => $customer['id'],
            'currency' => 'USD',
            'amount' => $order->total,
            'capture' => true,
        ]);
        if (! $charge['captured']) {
            $error = ValidationException::withMessages([
                'number' => ['Unable to process payment'],
            ]);
            throw $error;
        }
        $request->session()->forget('order');

        return view('vinyl-graphics::public.thank-you');
    }
}
