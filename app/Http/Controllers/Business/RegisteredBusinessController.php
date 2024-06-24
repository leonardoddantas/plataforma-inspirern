<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class RegisteredBusinessController extends Controller
{
    public function create(): View
    {
        return view('business.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): View
    {
        $request->validate([
            'businessName' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'cnpj' => ['required', 'string', 'unique:businesses'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Business::class],
            'websiteURL' => ['string', 'max:255'],
            'socialMedia' => ['required', 'string', 'max:255'],
            'locationPhoto' => ['required', 'max:255'],
            'road' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:255'],
            'operatingDays' => ['required', 'string', 'max:255'],
            'operatingHours' => ['required', 'string', 'max:255'],
            'ownerName' => ['required', 'string', 'max:255'],
            'ownerTelephone' => ['required', 'string', 'max:255'],
            'ownerEmail' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'ownerCpf' => ['required', 'string', 'max:255'],
        ]);

        if ($request->hasFile('locationPhoto') && $request->file('locationPhoto')->isValid()) {
            $pathLocalPhoto = $request->locationPhoto->store('business');
        }

        $business = Business::create([
            'businessName' => $request->businessName,
            'category' => $request->category,
            'description' => $request->description,
            'cnpj' => $request->cnpj,
            'phone' => $request->phone,
            'email' => $request->email,
            'websiteURL' => $request->websiteURL,
            'socialMedia' => $request->socialMedia,
            'locationPhoto' => $pathLocalPhoto,
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

        return view('business.confirmation');
    }
}
