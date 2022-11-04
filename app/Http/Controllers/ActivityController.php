<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('dashboard.activities.index', compact('activities', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'category_id' => ['required', 'exists:categories,id']
        ]);

        Activity::create($validatedData);

        return to_route('dashboard.activities.index')->with('success', 'Berhasil menambah aktivitas baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $categories = Category::orderBy('name')->get();

        return view('dashboard.activities.edit', compact('activity', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'category_id' => ['required', 'exists:categories,id']
        ]);

        $activity->update($validatedData);

        return to_route('dashboard.activities.index')->with('success', 'Berhasil mengubah aktivitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return to_route('dashboard.activities.index')->with('success', 'Berhasil menghapus aktivitas');
    }
}
