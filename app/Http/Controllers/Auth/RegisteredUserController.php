<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('frontend.pages.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'phone'     => ['required', 'digits:11', 'unique:users,phone'],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email, // This can be null
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        Toastr::success('User Login Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->intended('/');
    }
}
