<?php

namespace App\Http\Controllers;

use App\ArtStudio;
use App\RitualCeremony;
use App\TraditionalGame;
use App\CulturalHeritage;
use App\TraditionalDance;
use App\TraditionalCeremony;
use App\NaturalArtificialTourism;
use App\TraditionalMusicInstrument;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artStudios = ArtStudio::all()->count();
        $culturalHeritages = CulturalHeritage::all()->count();
        $naturalArtificialTourisms = NaturalArtificialTourism::all()->count();
        $ritualCeremonies = RitualCeremony::all()->count();
        $traditionalCeremonies = TraditionalCeremony::all()->count();
        $traditionalDances = TraditionalDance::all()->count();
        $traditionalGames = TraditionalGame::all()->count();
        $traditionalMusicInstruments = TraditionalMusicInstrument::all()->count();

        return view('home', compact(
            'artStudios',
            'culturalHeritages',
            'naturalArtificialTourisms',
            'ritualCeremonies',
            'traditionalCeremonies',
            'traditionalDances',
            'traditionalGames',
            'traditionalMusicInstruments'));
    }
}
