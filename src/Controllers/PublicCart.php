<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Submtd\VinylGraphics\Models\Order;

class PublicCart extends Controller
{
    public function __invoke(Request $request)
    {
        if (! $order = $request->session()->get('order')) {
            $order = Order::create([
                'user_id' => Auth::id(),
            ]);
        }
        $order->refresh();
        $request->session()->put('order', $order);

        return view('vinyl-graphics::public.cart', ['order' => $order, 'items' => $order->items]);
    }
}
