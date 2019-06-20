<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TraditionalMusicInstrument;

class TraditionalMusicInstrumentController extends Controller
{
    /**
     * Display a listing of the traditionalMusicInstrument.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $traditionalMusicInstrumentQuery = TraditionalMusicInstrument::query();
        $traditionalMusicInstrumentQuery->where('name', 'like', '%'.request('q').'%');
        $traditionalMusicInstruments = $traditionalMusicInstrumentQuery->paginate(25);

        return view('traditional_music_instruments.index', compact('traditionalMusicInstruments'));
    }

    /**
     * Show the form for creating a new traditionalMusicInstrument.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new TraditionalMusicInstrument);

        return view('traditional_music_instruments.create');
    }

    /**
     * Store a newly created traditionalMusicInstrument in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new TraditionalMusicInstrument);

        $newTraditionalMusicInstrument = $request->validate([
            'name'             => 'required|max:60',
            'sum_sub_district' => 'required|numeric',
            'description'      => 'nullable|max:255',
        ]);
        $newTraditionalMusicInstrument['creator_id'] = auth()->id();

        $traditionalMusicInstrument = TraditionalMusicInstrument::create($newTraditionalMusicInstrument);

        return redirect()->route('traditional_music_instruments.show', $traditionalMusicInstrument);
    }

    /**
     * Display the specified traditionalMusicInstrument.
     *
     * @param  \App\TraditionalMusicInstrument  $traditionalMusicInstrument
     * @return \Illuminate\View\View
     */
    public function show(TraditionalMusicInstrument $traditionalMusicInstrument)
    {
        return view('traditional_music_instruments.show', compact('traditionalMusicInstrument'));
    }

    /**
     * Show the form for editing the specified traditionalMusicInstrument.
     *
     * @param  \App\TraditionalMusicInstrument  $traditionalMusicInstrument
     * @return \Illuminate\View\View
     */
    public function edit(TraditionalMusicInstrument $traditionalMusicInstrument)
    {
        $this->authorize('update', $traditionalMusicInstrument);

        return view('traditional_music_instruments.edit', compact('traditionalMusicInstrument'));
    }

    /**
     * Update the specified traditionalMusicInstrument in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TraditionalMusicInstrument  $traditionalMusicInstrument
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, TraditionalMusicInstrument $traditionalMusicInstrument)
    {
        $this->authorize('update', $traditionalMusicInstrument);

        $traditionalMusicInstrumentData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $traditionalMusicInstrument->update($traditionalMusicInstrumentData);

        return redirect()->route('traditional_music_instruments.show', $traditionalMusicInstrument);
    }

    /**
     * Remove the specified traditionalMusicInstrument from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TraditionalMusicInstrument  $traditionalMusicInstrument
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, TraditionalMusicInstrument $traditionalMusicInstrument)
    {
        $this->authorize('delete', $traditionalMusicInstrument);

        $request->validate(['traditional_music_instrument_id' => 'required']);

        if ($request->get('traditional_music_instrument_id') == $traditionalMusicInstrument->id && $traditionalMusicInstrument->delete()) {
            return redirect()->route('traditional_music_instruments.index');
        }

        return back();
    }
}
