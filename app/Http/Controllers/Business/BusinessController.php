<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BusinessController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');

        if (!empty($search)) {
            $businesses = Business::where('businessName', 'like', "{$search}%")
                ->select('id', 'businessName', 'category', 'status', 'registrationDate')
                ->get();
        } else {
            $businesses = Business::select('id', 'businessName', 'category', 'status', 'registrationDate')->get();
        }

        $businesses->transform(function ($business) {
            $business->registrationDate = Carbon::parse($business->registrationDate);
            return $business;
        });

        return view('business.index', compact('businesses'));
    }

    public function show($id): View
    {
        $business = Business::find($id);
        return view('business.show', compact('business'));
    }
}
