<?php

namespace App\Http\Controllers;

use App\ArtStudio;
use Illuminate\Http\Request;

class ArtStudioController extends Controller
{
    /**
     * Display a listing of the artStudio.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $artStudioQuery = ArtStudio::query();
        $artStudioQuery->where('name', 'like', '%'.request('q').'%');
        $artStudios = $artStudioQuery->paginate(25);

        return view('art_studios.index', compact('artStudios'));
    }

    /**
     * Show the form for creating a new artStudio.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new ArtStudio);

        return view('art_studios.create');
    }

    /**
     * Store a newly created artStudio in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new ArtStudio);

        $newArtStudio = $request->validate([
            'name'         => 'required|max:255',
            'sub_district' => 'required|max:255',
            'village'      => 'nullable|max:255',
            'leader'       => 'required|max:60',
            'art_type'     => 'required|max:255',
            'building'     => 'required|boolean',
            'description'  => 'nullable|max:255',
        ]);
        $newArtStudio['creator_id'] = auth()->id();

        $artStudio = ArtStudio::create($newArtStudio);

        return redirect()->route('art_studios.show', $artStudio);
    }

    /**
     * Display the specified artStudio.
     *
     * @param  \App\ArtStudio  $artStudio
     * @return \Illuminate\View\View
     */
    public function show(ArtStudio $artStudio)
    {
        return view('art_studios.show', compact('artStudio'));
    }

    /**
     * Show the form for editing the specified artStudio.
     *
     * @param  \App\ArtStudio  $artStudio
     * @return \Illuminate\View\View
     */
    public function edit(ArtStudio $artStudio)
    {
        $this->authorize('update', $artStudio);

        return view('art_studios.edit', compact('artStudio'));
    }

    /**
     * Update the specified artStudio in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArtStudio  $artStudio
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, ArtStudio $artStudio)
    {
        $this->authorize('update', $artStudio);

        $artStudioData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $artStudio->update($artStudioData);

        return redirect()->route('art_studios.show', $artStudio);
    }

    /**
     * Remove the specified artStudio from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArtStudio  $artStudio
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, ArtStudio $artStudio)
    {
        $this->authorize('delete', $artStudio);

        $request->validate(['art_studio_id' => 'required']);

        if ($request->get('art_studio_id') == $artStudio->id && $artStudio->delete()) {
            return redirect()->route('art_studios.index');
        }

        return back();
    }
}
