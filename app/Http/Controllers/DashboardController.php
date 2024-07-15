<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    function index(): View
    {
        $businessesStatus = [
            'all' => Business::count(),
            'reprovado' => Business::where('status', 'reprovado')->count(),
            'aprovado' => Business::where('status', 'aprovado')->count(),
            'pendente' => Business::where('status', 'pendente')->count(),
        ];

        return view('dashboard', compact('businessesStatus'));
    }
}
