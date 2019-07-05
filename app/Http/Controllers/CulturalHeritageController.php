<?php

namespace App\Http\Controllers;

use App\SubDistrict;
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

        $subDistricts = SubDistrict::all();

        return view('cultural_heritages.create', compact('subDistricts'));
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
            'name'            => 'required|max:60',
            'type'            => 'required|max:60',
            'sub_district_id' => 'required',
            'village'         => 'required|max:60',
            'description'     => 'nullable|max:255',
        ]);
        $newCulturalHeritage['creator_id'] = auth()->id();

        $culturalHeritage = CulturalHeritage::create($newCulturalHeritage);

        flash(__('cultural_heritage.created'), 'success');

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

        $subDistricts = SubDistrict::all();

        return view('cultural_heritages.edit', compact('culturalHeritage', 'subDistricts'));
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
            'name'            => 'required|max:60',
            'type'            => 'required|max:60',
            'sub_district_id' => 'required',
            'village'         => 'required|max:60',
            'description'     => 'nullable|max:255',
        ]);
        $culturalHeritage->update($culturalHeritageData);

        flash(__('cultural_heritage.updated'), 'information');

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
            flash(__('cultural_heritage.deleted'), 'error');
            return redirect()->route('cultural_heritages.index');
        }

        return back();
    }
}
