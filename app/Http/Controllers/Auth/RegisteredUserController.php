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
use App\Models\City;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        /**
         * recover database.
         */
        $cities = City::orderBy('name', 'asc')->get();
        return view('auth.register', [
            'cities' => $cities
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'city' => ['required', 'string'],
                'type' => ['required', 'string'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'name.required' => 'O nome é obrigatório.',
                'name.string' => 'O nome deve ser uma string válida.',
                'name.max' => 'O nome não pode exceder 255 caracteres.',
                'email.required' => 'O e-mail é obrigatório.',
                'email.string' => 'O e-mail deve ser uma string válida.',
                'email.lowercase' => 'O e-mail deve estar em letras minúsculas.',
                'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
                'email.max' => 'O e-mail não pode exceder 255 caracteres.',
                'email.unique' => 'O e-mail já está em uso.',
                'city.required' => 'A cidade é obrigatória.',
                'type.required' => 'O tipo de usuário é obrigatório.',
                'password.required' => 'A senha é obrigatória.',
                'password.confirmed' => 'A confirmação da senha não coincide.',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
