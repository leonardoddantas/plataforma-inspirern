<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\View\View;

class BusinessController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $date = $request->input('date');

        $query = Business::query();

        if (!empty($search)) {

            $cleanedSearch = preg_replace('/[^0-9]/', '', $search);
            // ^\d{3}\.\d{3}\.\d{3}\-\d{2}$/ cpf
            // /^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/ cnpj
            if (preg_match('/^\d{11}$/', $cleanedSearch)) {
                $query->where('ownerCpf', $cleanedSearch);
            } elseif (preg_match('/^\d{14}$/', $cleanedSearch)) {
                $query->where('cnpj', $cleanedSearch);
            } else {
                $query->where('businessName', 'like', "{$search}%");
            }
        }

        if (!empty($status)) {
            $query->where('status', $status);
        }

        if (!empty($date)) {
            $query->whereDate('registrationDate', $date);
        }

        $businesses = $query->select('id', 'businessName', 'cnpj', 'category', 'status', 'registrationDate')->get();

        $businesses->transform(function ($business) {
            $business->registrationDate = Carbon::parse($business->registrationDate);
            return $business;
        });

        return view('business.index', compact('businesses'));
    }

    public function show($id): View
    {
        $business = Business::with('socialMedias')->find($id);
        return view('business.show', compact('business'));
    }


    public function avaliation(Request $request)
    {
        $request->validate(
            [
                'id' => 'required|exists:businesses,id',
                'status' => 'required|string',
                'ratingBusiness' => 'required_if:status,reprovado|nullable|string',
            ],
        );

        $business = Business::find($request->id);

        $business->update([
            'status' => $request->status,
            'ratingBusiness' => $request->ratingBusiness,
        ]);

        return back();
    }
}
