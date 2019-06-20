<?php

namespace App\Http\Controllers;

use App\CulturalHeritage;
use Illuminate\Http\Request;

class CulturalHeritageController extends Controller
{
    /**
     * Display a listing of the culturalHeritage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $culturalHeritageQuery = CulturalHeritage::query();
        $culturalHeritageQuery->where('name', 'like', '%'.request('q').'%');
        $culturalHeritages = $culturalHeritageQuery->paginate(25);

        return view('cultural_heritages.index', compact('culturalHeritages'));
    }

    /**
     * Show the form for creating a new culturalHeritage.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new CulturalHeritage);

        return view('cultural_heritages.create');
    }

    /**
     * Store a newly created culturalHeritage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new CulturalHeritage);

        $newCulturalHeritage = $request->validate([
            'name'         => 'required|max:60',
            'type'         => 'required|max:60',
            'sub_district' => 'required|max:60',
            'village'      => 'required|max:60',
            'description'  => 'nullable|max:255',
        ]);
        $newCulturalHeritage['creator_id'] = auth()->id();

        $culturalHeritage = CulturalHeritage::create($newCulturalHeritage);

        return redirect()->route('cultural_heritages.show', $culturalHeritage);
    }

    /**
     * Display the specified culturalHeritage.
     *
     * @param  \App\CulturalHeritage  $culturalHeritage
     * @return \Illuminate\View\View
     */
    public function show(CulturalHeritage $culturalHeritage)
    {
        return view('cultural_heritages.show', compact('culturalHeritage'));
    }

    /**
     * Show the form for editing the specified culturalHeritage.
     *
     * @param  \App\CulturalHeritage  $culturalHeritage
     * @return \Illuminate\View\View
     */
    public function edit(CulturalHeritage $culturalHeritage)
    {
        $this->authorize('update', $culturalHeritage);

        return view('cultural_heritages.edit', compact('culturalHeritage'));
    }

    /**
     * Update the specified culturalHeritage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CulturalHeritage  $culturalHeritage
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, CulturalHeritage $culturalHeritage)
    {
        $this->authorize('update', $culturalHeritage);

        $culturalHeritageData = $request->validate([
            'name'         => 'required|max:60',
            'type'         => 'required|max:60',
            'sub_district' => 'required|max:60',
            'village'      => 'required|max:60',
            'description'  => 'nullable|max:255',
        ]);
        $culturalHeritage->update($culturalHeritageData);

        return redirect()->route('cultural_heritages.show', $culturalHeritage);
    }

    /**
     * Remove the specified culturalHeritage from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CulturalHeritage  $culturalHeritage
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, CulturalHeritage $culturalHeritage)
    {
        $this->authorize('delete', $culturalHeritage);

        $request->validate(['cultural_heritage_id' => 'required']);

        if ($request->get('cultural_heritage_id') == $culturalHeritage->id && $culturalHeritage->delete()) {
            return redirect()->route('cultural_heritages.index');
        }

        return back();
    }
}
