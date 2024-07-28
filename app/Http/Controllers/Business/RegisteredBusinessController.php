<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
            'locationPhoto' => ['required', 'max:255'],
            'road' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:255'],
            'operatingDays' => ['required', 'array'],
            'openingTime' => ['required', 'array'],
            'closingTime' => ['required', 'array'],
            'ownerName' => ['required', 'string', 'max:255'],
            'ownerTelephone' => ['required', 'string', 'max:255'],
            'ownerEmail' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'ownerCpf' => ['required', 'string', 'max:255'],
        ]);

        DB::transaction(function () use ($request) {
            if ($request->hasFile('locationPhoto') && $request->file('locationPhoto')->isValid()) {
                $pathLocalPhoto = $request->locationPhoto->store('business');
            }

            $operatingDays = $request->input('operatingDays');
            $openingTimes = $request->input('openingTime');
            $closingTimes = $request->input('closingTime');

            $operatingSchedule = [];
            foreach ($operatingDays as $day) {
                $openingTime = isset($openingTimes[strtolower($day)]) ? $openingTimes[strtolower($day)] : null;
                $closingTime = isset($closingTimes[strtolower($day)]) ? $closingTimes[strtolower($day)] : null;

                $operatingSchedule[] = [
                    'day' => $day,
                    'opening_time' => $openingTime,
                    'closing_time' => $closingTime,
                ];
            }

            $business = Business::create([
                'businessName' => $request->businessName,
                'category' => $request->category,
                'description' => $request->description,
                'cnpj' => $request->cnpj,
                'phone' => $request->phone,
                'email' => $request->email,
                'websiteURL' => $request->websiteURL,
                'locationPhoto' => $pathLocalPhoto,
                'road' => $request->road,
                'number' => $request->number,
                'neighborhood' => $request->neighborhood,
                'city' => $request->city,
                'state' => $request->state,
                'cep' => $request->cep,
                'operatingSchedule' => json_encode($operatingSchedule),
                'ownerName' => $request->ownerName,
                'ownerTelephone' => $request->ownerTelephone,
                'ownerEmail' => $request->ownerEmail,
                'ownerCpf' => $request->ownerCpf,
            ]);

            if ($request->has('facebook')) {
                SocialMedia::create([
                    'business_id' => $business->id,
                    'socialMediaName' => 'Facebook',
                    'socialMediaURL' => $request->input('facebook'),
                ]);
            }

            if ($request->has('instagram')) {
                SocialMedia::create([
                    'business_id' => $business->id,
                    'socialMediaName' => 'Instagram',
                    'socialMediaURL' => $request->input('instagram'),
                ]);
            }

            if ($request->has('whatsapp')) {
                SocialMedia::create([
                    'business_id' => $business->id,
                    'socialMediaName' => 'WhatsApp',
                    'socialMediaURL' => $request->input('whatsapp'),
                ]);
            }

            if ($request->has('socialMediaNames') && $request->has('socialMediaURLs')) {
                $socialMediaNames = $request->input('socialMediaNames');
                $socialMediaURLs = $request->input('socialMediaURLs');

                foreach ($socialMediaNames as $index => $name) {
                    SocialMedia::create([
                        'business_id' => $business->id,
                        'socialMediaName' => $name,
                        'socialMediaURL' => $socialMediaURLs[$index],
                    ]);
                }
            }
        });

        return view('business.confirmation');
    }
}
