<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * ArtStudios Routes
 */
Route::resource('art_studios', 'ArtStudioController');

/*
 * TraditionalMusicInstruments Routes
 */
Route::resource('traditional_music_instruments', 'TraditionalMusicInstrumentController');

/*
 * TraditionalDances Routes
 */
Route::resource('traditional_dances', 'TraditionalDanceController');

/*
 * TraditionalCeremonies Routes
 */
Route::resource('traditional_ceremonies', 'TraditionalCeremonyController');

/*
 * RitualCeremonies Routes
 */
Route::resource('ritual_ceremonies', 'RitualCeremonyController');

/*
 * TraditionalGames Routes
 */
Route::resource('traditional_games', 'TraditionalGameController');

/*
 * CulturalHeritages Routes
 */
Route::resource('cultural_heritages', 'CulturalHeritageController');

/*
 * NaturalArtificialTourisms Routes
 */
Route::resource('natural_artificial_tourisms', 'NaturalArtificialTourismController');
