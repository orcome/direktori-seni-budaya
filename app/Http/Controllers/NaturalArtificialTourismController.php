<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NaturalArtificialTourism;

class NaturalArtificialTourismController extends Controller
{
    /**
     * Display a listing of the naturalArtificialTourism.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $naturalArtificialTourismQuery = NaturalArtificialTourism::query();
        $naturalArtificialTourismQuery->where('name', 'like', '%'.request('q').'%');
        $naturalArtificialTourisms = $naturalArtificialTourismQuery->paginate(25);

        return view('natural_artificial_tourisms.index', compact('naturalArtificialTourisms'));
    }

    /**
     * Show the form for creating a new naturalArtificialTourism.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new NaturalArtificialTourism);

        return view('natural_artificial_tourisms.create');
    }

    /**
     * Store a newly created naturalArtificialTourism in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new NaturalArtificialTourism);

        $newNaturalArtificialTourism = $request->validate([
            'name'        => 'required|max:60',
            'category'    => 'required|boolean',
            'location'    => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newNaturalArtificialTourism['creator_id'] = auth()->id();

        $naturalArtificialTourism = NaturalArtificialTourism::create($newNaturalArtificialTourism);

        return redirect()->route('natural_artificial_tourisms.show', $naturalArtificialTourism);
    }

    /**
     * Display the specified naturalArtificialTourism.
     *
     * @param  \App\NaturalArtificialTourism  $naturalArtificialTourism
     * @return \Illuminate\View\View
     */
    public function show(NaturalArtificialTourism $naturalArtificialTourism)
    {
        return view('natural_artificial_tourisms.show', compact('naturalArtificialTourism'));
    }

    /**
     * Show the form for editing the specified naturalArtificialTourism.
     *
     * @param  \App\NaturalArtificialTourism  $naturalArtificialTourism
     * @return \Illuminate\View\View
     */
    public function edit(NaturalArtificialTourism $naturalArtificialTourism)
    {
        $this->authorize('update', $naturalArtificialTourism);

        return view('natural_artificial_tourisms.edit', compact('naturalArtificialTourism'));
    }

    /**
     * Update the specified naturalArtificialTourism in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NaturalArtificialTourism  $naturalArtificialTourism
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, NaturalArtificialTourism $naturalArtificialTourism)
    {
        $this->authorize('update', $naturalArtificialTourism);

        $naturalArtificialTourismData = $request->validate([
            'name'        => 'required|max:60',
            'category'    => 'required|boolean',
            'location'    => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $naturalArtificialTourism->update($naturalArtificialTourismData);

        return redirect()->route('natural_artificial_tourisms.show', $naturalArtificialTourism);
    }

    /**
     * Remove the specified naturalArtificialTourism from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NaturalArtificialTourism  $naturalArtificialTourism
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, NaturalArtificialTourism $naturalArtificialTourism)
    {
        $this->authorize('delete', $naturalArtificialTourism);

        $request->validate(['natural_artificial_tourism_id' => 'required']);

        if ($request->get('natural_artificial_tourism_id') == $naturalArtificialTourism->id && $naturalArtificialTourism->delete()) {
            return redirect()->route('natural_artificial_tourisms.index');
        }

        return back();
    }
}
