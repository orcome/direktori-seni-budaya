@extends('layouts.app')

@section('title', __('traditional_game.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('traditional_game.create') }}</div>
            <form method="POST" action="{{ route('traditional_games.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('traditional_game.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="tools" class="form-label">{{ __('traditional_game.tools') }} <span class="form-required">*</span></label>
                        <textarea id="tools" class="form-control{{ $errors->has('tools') ? ' is-invalid' : '' }}" name="tools" rows="4">{{ old('tools') }}</textarea>
                        {!! $errors->first('tools', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="detail" class="form-label">{{ __('traditional_game.detail') }} <span class="form-required">*</span></label>
                        <textarea id="detail" class="form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}" name="detail" rows="4">{{ old('detail') }}</textarea>
                        {!! $errors->first('detail', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('traditional_game.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('traditional_game.create') }}" class="btn btn-success">
                    <a href="{{ route('traditional_games.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
