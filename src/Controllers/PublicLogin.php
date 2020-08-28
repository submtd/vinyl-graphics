<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Submtd\VinylGraphics\Rules\ValidLogin;

class PublicLogin extends Controller
{
    public function __invoke(Request $request)
    {
        if (! Auth::user()) {
            if (! $request->has('email')) {
                return view('vinyl-graphics::public.login');
            }
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => ['required', new ValidLogin($request->get('email'))],
            ]);
            $request->session()->flash('status', 'Login successful');
        }

        return response()->redirectTo(route('home'));
    }
}
