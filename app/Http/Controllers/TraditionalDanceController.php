<?php

namespace App\Http\Controllers;

use App\TraditionalDance;
use Illuminate\Http\Request;

class TraditionalDanceController extends Controller
{
    /**
     * Display a listing of the traditionalDance.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $traditionalDanceQuery = TraditionalDance::query();
        $traditionalDanceQuery->where('name', 'like', '%'.request('q').'%');
        $traditionalDances = $traditionalDanceQuery->paginate(25);

        return view('traditional_dances.index', compact('traditionalDances'));
    }

    /**
     * Show the form for creating a new traditionalDance.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new TraditionalDance);

        return view('traditional_dances.create');
    }

    /**
     * Store a newly created traditionalDance in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new TraditionalDance);

        $newTraditionalDance = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newTraditionalDance['creator_id'] = auth()->id();

        $traditionalDance = TraditionalDance::create($newTraditionalDance);

        return redirect()->route('traditional_dances.show', $traditionalDance);
    }

    /**
     * Display the specified traditionalDance.
     *
     * @param  \App\TraditionalDance  $traditionalDance
     * @return \Illuminate\View\View
     */
    public function show(TraditionalDance $traditionalDance)
    {
        return view('traditional_dances.show', compact('traditionalDance'));
    }

    /**
     * Show the form for editing the specified traditionalDance.
     *
     * @param  \App\TraditionalDance  $traditionalDance
     * @return \Illuminate\View\View
     */
    public function edit(TraditionalDance $traditionalDance)
    {
        $this->authorize('update', $traditionalDance);

        return view('traditional_dances.edit', compact('traditionalDance'));
    }

    /**
     * Update the specified traditionalDance in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TraditionalDance  $traditionalDance
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, TraditionalDance $traditionalDance)
    {
        $this->authorize('update', $traditionalDance);

        $traditionalDanceData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $traditionalDance->update($traditionalDanceData);

        return redirect()->route('traditional_dances.show', $traditionalDance);
    }

    /**
     * Remove the specified traditionalDance from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TraditionalDance  $traditionalDance
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, TraditionalDance $traditionalDance)
    {
        $this->authorize('delete', $traditionalDance);

        $request->validate(['traditional_dance_id' => 'required']);

        if ($request->get('traditional_dance_id') == $traditionalDance->id && $traditionalDance->delete()) {
            return redirect()->route('traditional_dances.index');
        }

        return back();
    }
}
