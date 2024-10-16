<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessRequest;
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
    public function store(BusinessRequest $request): View
    {
        $validatedData = $request->validated();

        DB::transaction(function () use ($request, $validatedData) {
            $pathLocalPhoto = $this->handleLocationPhoto($request);

            $operatingSchedule = $this->generateOperatingSchedule(
                $request->input('operatingDays'),
                $request->input('openingTime'),
                $request->input('closingTime')
            );

            $business = Business::create(array_merge(
                $validatedData,
                ['locationPhoto' => $pathLocalPhoto, 'operatingSchedule' => json_encode($operatingSchedule), 'user_id' => auth()->id()]
            ));

            $this->storeSocialMedia($request, $business);
        });

        return view('business.confirmation');
    }


    private function handleLocationPhoto(Request $request): ?string
    {
        return $request->hasFile('locationPhoto') && $request->file('locationPhoto')->isValid()
            ? $request->locationPhoto->store('business')
            : null;
    }

    private function generateOperatingSchedule(array $operatingDays, array $openingTimes, array $closingTimes): array
    {
        return array_map(function ($day) use ($openingTimes, $closingTimes) {
            return [
                'day' => $day,
                'opening_time' => $openingTimes[strtolower($day)] ?? null,
                'closing_time' => $closingTimes[strtolower($day)] ?? null,
            ];
        }, $operatingDays);
    }

    private function storeSocialMedia(Request $request, Business $business)
    {
        $socialMediaPlatforms = ['facebook', 'instagram', 'whatsapp'];
        foreach ($socialMediaPlatforms as $platform) {
            if ($request->has($platform)) {
                SocialMedia::create([
                    'business_id' => $business->id,
                    'socialMediaName' => ucfirst($platform),
                    'socialMediaURL' => $request->input($platform),
                ]);
            }
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
    }
}
