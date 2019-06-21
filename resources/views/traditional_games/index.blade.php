@extends('layouts.app')

@section('title', __('traditional_game.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\TraditionalGame)
            <a href="{{ route('traditional_games.create') }}" class="btn btn-success">{{ __('traditional_game.create') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">{{ __('app.back_to_menu') }}</a>
        @endcan
    </div>
    <h3 class="page-title">{{ __('traditional_game.list') }} | <small>{{ __('app.total') }} : {{ $traditionalGames->total() }} {{ __('traditional_game.traditional_game') }}</small></h3>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('traditional_game.search') }}</label>
                        <input placeholder="{{ __('traditional_game.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('traditional_game.search') }}" class="btn btn-secondary">
                    <a href="{{ route('traditional_games.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('traditional_game.name') }}</th>
                        <th>{{ __('traditional_game.tools') }}</th>
                        <th>{{ __('traditional_game.detail') }}</th>
                        <th>{{ __('traditional_game.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($traditionalGames as $key => $traditionalGame)
                    <tr>
                        <td class="text-center">{{ $traditionalGames->firstItem() + $key }}</td>
                        <td>{!! $traditionalGame->name_link !!}</td>
                        <td>{{ $traditionalGame->tools }}</td>
                        <td>{{ $traditionalGame->detail }}</td>
                        <td>{{ $traditionalGame->description }}</td>
                        <td class="text-center">
                            @can('view', $traditionalGame)
                                <a href="{{ route('traditional_games.show', $traditionalGame) }}" id="show-traditional_game-{{ $traditionalGame->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $traditionalGames->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
