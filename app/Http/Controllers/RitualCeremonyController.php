<?php

namespace App\Http\Controllers;

use App\RitualCeremony;
use Illuminate\Http\Request;

class RitualCeremonyController extends Controller
{
    /**
     * Display a listing of the ritualCeremony.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ritualCeremonyQuery = RitualCeremony::query();
        $ritualCeremonyQuery->where('name', 'like', '%'.request('q').'%');
        $ritualCeremonies = $ritualCeremonyQuery->paginate(25);

        return view('ritual_ceremonies.index', compact('ritualCeremonies'));
    }

    /**
     * Show the form for creating a new ritualCeremony.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new RitualCeremony);

        return view('ritual_ceremonies.create');
    }

    /**
     * Store a newly created ritualCeremony in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new RitualCeremony);

        $newRitualCeremony = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newRitualCeremony['creator_id'] = auth()->id();

        $ritualCeremony = RitualCeremony::create($newRitualCeremony);

        return redirect()->route('ritual_ceremonies.show', $ritualCeremony);
    }

    /**
     * Display the specified ritualCeremony.
     *
     * @param  \App\RitualCeremony  $ritualCeremony
     * @return \Illuminate\View\View
     */
    public function show(RitualCeremony $ritualCeremony)
    {
        return view('ritual_ceremonies.show', compact('ritualCeremony'));
    }

    /**
     * Show the form for editing the specified ritualCeremony.
     *
     * @param  \App\RitualCeremony  $ritualCeremony
     * @return \Illuminate\View\View
     */
    public function edit(RitualCeremony $ritualCeremony)
    {
        $this->authorize('update', $ritualCeremony);

        return view('ritual_ceremonies.edit', compact('ritualCeremony'));
    }

    /**
     * Update the specified ritualCeremony in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RitualCeremony  $ritualCeremony
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, RitualCeremony $ritualCeremony)
    {
        $this->authorize('update', $ritualCeremony);

        $ritualCeremonyData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $ritualCeremony->update($ritualCeremonyData);

        return redirect()->route('ritual_ceremonies.show', $ritualCeremony);
    }

    /**
     * Remove the specified ritualCeremony from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RitualCeremony  $ritualCeremony
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, RitualCeremony $ritualCeremony)
    {
        $this->authorize('delete', $ritualCeremony);

        $request->validate(['ritual_ceremony_id' => 'required']);

        if ($request->get('ritual_ceremony_id') == $ritualCeremony->id && $ritualCeremony->delete()) {
            return redirect()->route('ritual_ceremonies.index');
        }

        return back();
    }
}
