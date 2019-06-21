@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <h1><b>Sistem Informasi Database Seni & Budaya Daerah</b></h1>
                    <h3>Kabupaten Kapuas | Provinsi Kalimantan Tengah</h3>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                    <div class="card-header text-white" style="background-color: #066d32; padding-top: 35px">
                        <a class="icon_dashboard" href="{{ route('art_studios.index') }}">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                            <h5>{{ __('app.list_1') }}</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('art_studios.index') }}" class="btn btn-outline-secondary btn-sm">Tampilkan</a>
                            </div>
                            <small class="text-muted">{{ $artStudios.' Rercord' }}</small>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                    <div class="card-header text-white" style="background-color: #d80783; padding-top: 35px">
                        <a class="icon_dashboard" href="{{ route('traditional_music_instruments.index') }}">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                            <h5>{{ __('app.list_2') }}</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('traditional_music_instruments.index') }}" class="btn btn-outline-secondary btn-sm">Tampilkan</a>
                            </div>
                            <small class="text-muted">{{ $traditionalMusicInstruments.' Rercord' }}</small>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                    <div class="card-header text-white" style="background-color: #4999da; padding-top: 35px">
                        <a class="icon_dashboard" href="{{ route('traditional_dances.index') }}">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                            <h5>{{ __('app.list_3') }}</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('traditional_dances.index') }}" class="btn btn-outline-secondary btn-sm">Tampilkan</a>
                            </div>
                            <small class="text-muted">{{ $traditionalDances.' Rercord' }}</small>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                    <div class="card-header text-white" style="background-color: #d82b26; padding-top: 35px">
                        <a class="icon_dashboard" href="{{ route('traditional_ceremonies.index') }}">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                            <h5>{{ __('app.list_4') }}</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('traditional_ceremonies.index') }}" class="btn btn-outline-secondary btn-sm">Tampilkan</a>
                            </div>
                            <small class="text-muted">{{ $traditionalCeremonies.' Rercord' }}</small>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                    <div class="card-header text-white" style="background-color: #545b62; padding-top: 35px">
                        <a class="icon_dashboard" href="{{ route('ritual_ceremonies.index') }}">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                            <h5>{{ __('app.list_5') }}</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('ritual_ceremonies.index') }}" class="btn btn-outline-secondary btn-sm">Tampilkan</a>
                            </div>
                            <small class="text-muted">{{ $ritualCeremonies.' Rercord' }}</small>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                    <div class="card-header text-white" style="background-color: #15d0c0; padding-top: 35px">
                        <a class="icon_dashboard" href="{{ route('traditional_games.index') }}">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                            <h5>{{ __('app.list_6') }}</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('traditional_games.index') }}" class="btn btn-outline-secondary btn-sm">Tampilkan</a>
                            </div>
                            <small class="text-muted">{{ $traditionalGames.' Rercord' }}</small>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                    <div class="card-header text-white" style="background-color: #459808; padding-top: 35px">
                        <a class="icon_dashboard" href="{{ route('cultural_heritages.index') }}">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                            <h5>{{ __('app.list_7') }}</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('cultural_heritages.index') }}" class="btn btn-outline-secondary btn-sm">Tampilkan</a>
                            </div>
                            <small class="text-muted">{{ $culturalHeritages.' Rercord' }}</small>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                    <div class="card-header text-white" style="background-color: #e4b810; padding-top: 35px">
                        <a class="icon_dashboard" href="{{ route('natural_artificial_tourisms.index') }}">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                            <h5>{{ __('app.list_8') }}</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('natural_artificial_tourisms.index') }}" class="btn btn-outline-secondary btn-sm">Tampilkan</a>
                            </div>
                            <small class="text-muted">{{ $naturalArtificialTourisms.' Rercord' }}</small>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
