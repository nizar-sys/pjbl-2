<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidasiJobCreate;
use Illuminate\Http\Request;
use App\Models\Job;
use Carbon\Carbon;
use DateTime;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function store(RequestValidasiJobCreate $request)
    {

        $validated = $request->validated();
        
        $assigned_seconds = strtotime($validated['start_jp']);
        $completed_seconds = strtotime($validated['end_jp']);
        
        $duration = $completed_seconds - $assigned_seconds;
        
        $validated['duration'] = date('H:i:s', $duration);

        Job::create($request->validated());

        return to_route('dashboard');
    }
}
