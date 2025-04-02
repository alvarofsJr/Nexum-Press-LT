<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

// class RegisteredUserController extends Controller
// {
//     /**
//      * Display the registration view.
//      */
//     public function create(): View
//     {
//         return view('auth.register');
//     }

//     /**
//      * Handle an incoming registration request.
//      *
//      * @throws \Illuminate\Validation\ValidationException
//      */
//     public function store(Request $request): RedirectResponse
//     {
//         $request->validate([
//             'name' => ['required', 'string', 'max:255'],
//             'credencial' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
//             'password' => ['required', 'confirmed', 'regex:/^\d{6}$/'], // Senha de 6 dígitos numéricos
//         ]);

//         $user = User::create([
//             'name' => $request->name,
//             'credencial' => $request->credencial,
//             'password' => Hash::make($request->password),
//         ]);

//         event(new Registered($user));

//         Auth::login($user);

//         return redirect(route('dashboard', absolute: false));
//     }
// }


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'credencial' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:6', 'regex:/^\d{6}$/'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'credencial' => $request->credencial,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));


        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
