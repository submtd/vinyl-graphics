<?php

namespace Submtd\VinylGraphics\Controllers\WebPublic;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Submtd\VinylGraphics\Facades\UserFacade;

class Register extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->has('email')) {
            return view('vinyl-graphics::public.register');
        }
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:255',
            'confirm_password' => 'required|same:password',
        ]);
        try {
            $user = UserFacade::create($request->get('name'), $request->get('email'), $request->get('password'), false);
            Auth::login($user);
            $request->session()->flash('status', 'User account has been created');
        } catch (\Exception $e) {
            $request->session()->flash('status', $e->getMessage());
        }
        return response()->redirectTo(route('home'));
    }
}
