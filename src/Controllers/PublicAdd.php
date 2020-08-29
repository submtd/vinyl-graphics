<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Submtd\VinylGraphics\Models\Order;

class PublicAdd extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'font' => 'required|exists:fonts,id',
            'color' => 'required|exists:colors,id',
            'border_color' => 'required|exists:colors,id',
            'text' => 'required|max:25',
            'quantity' => 'required|numeric',
        ]);
        if (! $order = $request->session()->get('order')) {
            $order = Order::create([
                'user_id' => Auth::id(),
            ]);
            $request->session()->put('order', $order);
        }
        $item = $order->items()->create([
            'font_id' => $request->get('font'),
            'color_id' => $request->get('color'),
            'border_color_id' => $request->get('border_color'),
            'text' => $request->get('text'),
            'quantity' => $request->get('quantity'),
        ]);

        return response()->redirectTo(route('cart'));
    }
}
