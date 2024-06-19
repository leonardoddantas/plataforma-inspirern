<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisteredBusinessController extends Controller {
    public function create(): View {
        return view('business.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'cnpj' => ['int', 'max:255'],
            'registration' => ['string', 'max:255'],
            'telephone' => ['required', 'int', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Business::class],
            'url' => ['string', 'max:255'],
            'socialnetwork' => ['required', 'string', 'max:255'],
            'road' => ['required', 'string', 'max:255'],
            'number' => ['required', 'int', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'int', 'max:255'],
            'operatingDays' => ['required', 'string', 'max:255'],
            'operatingHours' => ['required', 'int', 'max:255'],
            'ownerName' => ['required', 'string', 'max:255'],
            'ownerTelephone' => ['required', 'int', 'max:255'],
            'ownerEmail' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'ownerCpf' => ['required', 'int', 'max:255'],
        ]);

        $business = Business::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'cnpj' => $request->cnpj,
            'registration' => $request->registration,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'url' => $request->url,
            'socialnetwork' => $request->socialnetwork,
            'road' => $request->road,
            'number' => $request->number,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
            'cep' => $request->cep,
            'operatingDays' => $request->operatingDays,
            'operatingHours' => $request->operatingHours,
            'ownerName' => $request->ownerName,
            'ownerTelephone' => $request->ownerTelephone,
            'ownerEmail' => $request->ownerEmail,
            'ownerCpf' => $request->ownerCpf,
        ]);
        return redirect(route('dashboard', absolute: false));
    }
}
?>