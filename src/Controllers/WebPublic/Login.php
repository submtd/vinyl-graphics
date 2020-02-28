<?php

namespace Submtd\VinylGraphics\Controllers\WebPublic;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Rules\ValidLogin;

class Login extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->has('email')) {
            return view('vinyl-graphics::public.login');
        }
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => ['required', new ValidLogin($request->get('email'))],
        ]);
        $request->session()->flash('status', 'Login successful');
        return response()->redirectTo(route('home'));
    }
}
