<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function store(Request $request)
    {
       Job::create($request->all());

       return to_route('dashboard');
    }
}
