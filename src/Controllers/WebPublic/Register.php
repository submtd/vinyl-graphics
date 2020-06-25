<?php

namespace Submtd\VinylGraphics\Controllers\WebPublic;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function __invoke(Request $request)
    {
        if (!Auth::user()) {
            if (!$request->has('email')) {
                return view('vinyl-graphics::public.register');
            }
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:32',
                'confirm_password' => 'required|same:password',
            ]);
            $user = User::create([
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);
            Auth::login($user);
            $request->session()->flash('status', 'User account has been created');
        }
        return response()->redirectTo(route('home'));
    }
}
