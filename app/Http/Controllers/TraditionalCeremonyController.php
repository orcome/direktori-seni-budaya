<?php

namespace App\Http\Controllers;

use App\TraditionalCeremony;
use Illuminate\Http\Request;

class TraditionalCeremonyController extends Controller
{
    /**
     * Display a listing of the traditionalCeremony.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $traditionalCeremonyQuery = TraditionalCeremony::query();
        $traditionalCeremonyQuery->where('name', 'like', '%'.request('q').'%');
        $traditionalCeremonies = $traditionalCeremonyQuery->paginate(25);

        return view('traditional_ceremonies.index', compact('traditionalCeremonies'));
    }

    /**
     * Show the form for creating a new traditionalCeremony.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new TraditionalCeremony);

        return view('traditional_ceremonies.create');
    }

    /**
     * Store a newly created traditionalCeremony in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new TraditionalCeremony);

        $newTraditionalCeremony = $request->validate([
            'name'        => 'required|max:60',
            'detail'      => 'nullable|max:255',
            'description' => 'nullable|max:255',
        ]);
        $newTraditionalCeremony['creator_id'] = auth()->id();

        $traditionalCeremony = TraditionalCeremony::create($newTraditionalCeremony);

        return redirect()->route('traditional_ceremonies.show', $traditionalCeremony);
    }

    /**
     * Display the specified traditionalCeremony.
     *
     * @param  \App\TraditionalCeremony  $traditionalCeremony
     * @return \Illuminate\View\View
     */
    public function show(TraditionalCeremony $traditionalCeremony)
    {
        return view('traditional_ceremonies.show', compact('traditionalCeremony'));
    }

    /**
     * Show the form for editing the specified traditionalCeremony.
     *
     * @param  \App\TraditionalCeremony  $traditionalCeremony
     * @return \Illuminate\View\View
     */
    public function edit(TraditionalCeremony $traditionalCeremony)
    {
        $this->authorize('update', $traditionalCeremony);

        return view('traditional_ceremonies.edit', compact('traditionalCeremony'));
    }

    /**
     * Update the specified traditionalCeremony in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TraditionalCeremony  $traditionalCeremony
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, TraditionalCeremony $traditionalCeremony)
    {
        $this->authorize('update', $traditionalCeremony);

        $traditionalCeremonyData = $request->validate([
            'name'        => 'required|max:60',
            'detail'      => 'nullable|max:255',
            'description' => 'nullable|max:255',
        ]);
        $traditionalCeremony->update($traditionalCeremonyData);

        return redirect()->route('traditional_ceremonies.show', $traditionalCeremony);
    }

    /**
     * Remove the specified traditionalCeremony from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TraditionalCeremony  $traditionalCeremony
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, TraditionalCeremony $traditionalCeremony)
    {
        $this->authorize('delete', $traditionalCeremony);

        $request->validate(['traditional_ceremony_id' => 'required']);

        if ($request->get('traditional_ceremony_id') == $traditionalCeremony->id && $traditionalCeremony->delete()) {
            return redirect()->route('traditional_ceremonies.index');
        }

        return back();
    }
}
