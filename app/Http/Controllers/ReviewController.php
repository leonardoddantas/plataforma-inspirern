<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Business $business, Request $request)
    {

        // Validação e criação da avaliação aqui
        $validateData = $request->validate([
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer',
        ]);

        Review::create([
            'comment' => $validateData['comment'],
            'numberStars' => $validateData['rating'],
            'user_id' => Auth::id(),
            'business_id' => $business->id,
        ]);

        return redirect()->back();
    }

    public function showReviewForm($id)
    {
        return view('bussinesses.redirect_to_review', ['businessId' => $id]);
    }
}
