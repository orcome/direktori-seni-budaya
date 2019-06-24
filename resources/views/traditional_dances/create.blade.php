@extends('layouts.app')

@section('title', __('traditional_dance.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('traditional_dance.create') }}</div>
            <form method="POST" action="{{ route('traditional_dances.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('traditional_dance.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="dance_type" class="form-label">{{ __('traditional_dance.dance_type') }} <span class="form-required">*</span></label>
                        <input id="dance_type" type="text" class="form-control{{ $errors->has('dance_type') ? ' is-invalid' : '' }}" name="dance_type" value="{{ old('dance_type') }}" required>
                        {!! $errors->first('dance_type', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="choreographer" class="form-label">{{ __('traditional_dance.choreographer') }}</label>
                        <input id="choreographer" type="text" class="form-control{{ $errors->has('choreographer') ? ' is-invalid' : '' }}" name="choreographer" value="{{ old('choreographer') }}">
                        {!! $errors->first('choreographer', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('traditional_dance.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('traditional_dance.create') }}" class="btn btn-success">
                    <a href="{{ route('traditional_dances.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
