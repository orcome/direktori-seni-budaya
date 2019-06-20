<?php

namespace App\Http\Controllers;

use App\TraditionalGame;
use Illuminate\Http\Request;

class TraditionalGameController extends Controller
{
    /**
     * Display a listing of the traditionalGame.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $traditionalGameQuery = TraditionalGame::query();
        $traditionalGameQuery->where('name', 'like', '%'.request('q').'%');
        $traditionalGames = $traditionalGameQuery->paginate(25);

        return view('traditional_games.index', compact('traditionalGames'));
    }

    /**
     * Show the form for creating a new traditionalGame.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new TraditionalGame);

        return view('traditional_games.create');
    }

    /**
     * Store a newly created traditionalGame in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new TraditionalGame);

        $newTraditionalGame = $request->validate([
            'name'        => 'required|max:60',
            'tools'       => 'required|max:255',
            'detail'      => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        $newTraditionalGame['creator_id'] = auth()->id();

        $traditionalGame = TraditionalGame::create($newTraditionalGame);

        return redirect()->route('traditional_games.show', $traditionalGame);
    }

    /**
     * Display the specified traditionalGame.
     *
     * @param  \App\TraditionalGame  $traditionalGame
     * @return \Illuminate\View\View
     */
    public function show(TraditionalGame $traditionalGame)
    {
        return view('traditional_games.show', compact('traditionalGame'));
    }

    /**
     * Show the form for editing the specified traditionalGame.
     *
     * @param  \App\TraditionalGame  $traditionalGame
     * @return \Illuminate\View\View
     */
    public function edit(TraditionalGame $traditionalGame)
    {
        $this->authorize('update', $traditionalGame);

        return view('traditional_games.edit', compact('traditionalGame'));
    }

    /**
     * Update the specified traditionalGame in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TraditionalGame  $traditionalGame
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, TraditionalGame $traditionalGame)
    {
        $this->authorize('update', $traditionalGame);

        $traditionalGameData = $request->validate([
            'name'        => 'required|max:60',
            'tools'       => 'required|max:255',
            'detail'      => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        $traditionalGame->update($traditionalGameData);

        return redirect()->route('traditional_games.show', $traditionalGame);
    }

    /**
     * Remove the specified traditionalGame from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TraditionalGame  $traditionalGame
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, TraditionalGame $traditionalGame)
    {
        $this->authorize('delete', $traditionalGame);

        $request->validate(['traditional_game_id' => 'required']);

        if ($request->get('traditional_game_id') == $traditionalGame->id && $traditionalGame->delete()) {
            return redirect()->route('traditional_games.index');
        }

        return back();
    }
}
