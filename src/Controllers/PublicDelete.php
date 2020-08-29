<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PublicDelete extends Controller
{
    public function __invoke(Request $request, $id)
    {
        if (! $order = $request->session()->get('order')) {
            abort(404);
        }
        $order->refresh();
        if (! $item = $order->items()->where('id', $id)->first()) {
            abort(404);
        }
        $item->delete();

        return response()->redirectTo(route('cart'));
    }
}
