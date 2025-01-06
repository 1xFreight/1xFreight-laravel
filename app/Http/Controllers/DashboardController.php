<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $page = 'dashboard';
        $visits_records = Visit::where('year', date('Y'))->get();
        $visits = [
            $visits_records->where('month', '01')->count(),
            $visits_records->where('month', '02')->count(),
            $visits_records->where('month', '03')->count(),
            $visits_records->where('month', '04')->count(),
            $visits_records->where('month', '05')->count(),
            $visits_records->where('month', '06')->count(),
            $visits_records->where('month', '07')->count(),
            $visits_records->where('month', '08')->count(),
            $visits_records->where('month', '09')->count(),
            $visits_records->where('month', '10')->count(),
            $visits_records->where('month', '11')->count(),
            $visits_records->where('month', '12')->count(),
        ];
        return view('dashboard.dashboard', compact('page', 'visits'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
