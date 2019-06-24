@extends('layouts.app')

@section('title', __('traditional_game.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $traditionalGame)
        @can('delete', $traditionalGame)
            <div class="card">
                <div class="card-header">{{ __('traditional_game.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('traditional_game.name') }}</label>
                    <p>{{ $traditionalGame->name }}</p>
                    <label class="form-label text-primary">{{ __('traditional_game.tools') }}</label>
                    <p>{{ $traditionalGame->tools }}</p>
                    <label class="form-label text-primary">{{ __('traditional_game.detail') }}</label>
                    <p>{{ $traditionalGame->detail }}</p>
                    <label class="form-label text-primary">{{ __('traditional_game.description') }}</label>
                    <p>{{ $traditionalGame->description ?? '-' }}</p>
                    {!! $errors->first('traditional_game_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('traditional_game.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('traditional_games.destroy', $traditionalGame) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="traditional_game_id" type="hidden" value="{{ $traditionalGame->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('traditional_games.edit', $traditionalGame) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('traditional_game.edit') }}</div>
            <form method="POST" action="{{ route('traditional_games.update', $traditionalGame) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('traditional_game.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $traditionalGame->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="tools" class="form-label">{{ __('traditional_game.tools') }} <span class="form-required">*</span></label>
                        <textarea id="tools" class="form-control{{ $errors->has('tools') ? ' is-invalid' : '' }}" name="tools" rows="4">{{ old('tools', $traditionalGame->tools) }}</textarea>
                        {!! $errors->first('tools', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="detail" class="form-label">{{ __('traditional_game.detail') }} <span class="form-required">*</span></label>
                        <textarea id="detail" class="form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}" name="detail" rows="4">{{ old('detail', $traditionalGame->detail) }}</textarea>
                        {!! $errors->first('detail', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('traditional_game.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $traditionalGame->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('traditional_game.update') }}" class="btn btn-success">
                    <a href="{{ route('traditional_games.show', $traditionalGame) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $traditionalGame)
                        <a href="{{ route('traditional_games.edit', [$traditionalGame, 'action' => 'delete']) }}" id="del-traditional_game-{{ $traditionalGame->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
