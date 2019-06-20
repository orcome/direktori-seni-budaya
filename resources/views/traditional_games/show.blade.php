@extends('layouts.app')

@section('title', __('traditional_game.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('traditional_game.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('traditional_game.name') }}</td><td>{{ $traditionalGame->name }}</td></tr>
                        <tr><td>{{ __('traditional_game.tools') }}</td><td>{{ $traditionalGame->tools }}</td></tr>
                        <tr><td>{{ __('traditional_game.detail') }}</td><td>{{ $traditionalGame->detail }}</td></tr>
                        <tr><td>{{ __('traditional_game.description') }}</td><td>{{ $traditionalGame->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $traditionalGame)
                    <a href="{{ route('traditional_games.edit', $traditionalGame) }}" id="edit-traditional_game-{{ $traditionalGame->id }}" class="btn btn-warning">{{ __('traditional_game.edit') }}</a>
                @endcan
                <a href="{{ route('traditional_games.index') }}" class="btn btn-link">{{ __('traditional_game.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
