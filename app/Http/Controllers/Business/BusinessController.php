<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\View\View;

class BusinessController extends Controller
{
    public function index(): View
    {
        $businesses = Business::select('id', 'businessName', 'category', 'status', 'registrationDate')->get();

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

    public function avaliation(Request $request)
    {
        $business = Business::find($request->id);
        $business->update([
            'status' => $request->status,
            'ratingBusiness' => $request->ratingBusiness,
        ]);
        return back()->with('sucess', 'Ação executada com sucesso!');
    }
}
