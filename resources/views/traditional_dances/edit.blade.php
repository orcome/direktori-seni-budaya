@extends('layouts.app')

@section('title', __('traditional_dance.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $traditionalDance)
        @can('delete', $traditionalDance)
            <div class="card">
                <div class="card-header">{{ __('traditional_dance.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('traditional_dance.name') }}</label>
                    <p>{{ $traditionalDance->name }}</p>
                    <label class="form-label text-primary">{{ __('traditional_dance.dance_type') }}</label>
                    <p>{{ $traditionalDance->dance_type }}</p>
                    <label class="form-label text-primary">{{ __('traditional_dance.choreographer') }}</label>
                    <p>{{ $traditionalDance->choreographer ?? '-' }}</p>
                    <label class="form-label text-primary">{{ __('traditional_dance.description') }}</label>
                    <p>{{ $traditionalDance->description ?? '-' }}</p>
                    {!! $errors->first('traditional_dance_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('traditional_dance.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('traditional_dances.destroy', $traditionalDance) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="traditional_dance_id" type="hidden" value="{{ $traditionalDance->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('traditional_dances.edit', $traditionalDance) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('traditional_dance.edit') }}</div>
            <form method="POST" action="{{ route('traditional_dances.update', $traditionalDance) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('traditional_dance.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $traditionalDance->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="dance_type" class="form-label">{{ __('traditional_dance.dance_type') }} <span class="form-required">*</span></label>
                        <input id="dance_type" type="text" class="form-control{{ $errors->has('dance_type') ? ' is-invalid' : '' }}" name="dance_type" value="{{ old('dance_type', $traditionalDance->dance_type) }}" required>
                        {!! $errors->first('dance_type', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="choreographer" class="form-label">{{ __('traditional_dance.choreographer') }}</label>
                        <input id="choreographer" type="text" class="form-control{{ $errors->has('choreographer') ? ' is-invalid' : '' }}" name="choreographer" value="{{ old('choreographer', $traditionalDance->choreographer) }}">
                        {!! $errors->first('choreographer', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('traditional_dance.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $traditionalDance->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('traditional_dance.update') }}" class="btn btn-success">
                    <a href="{{ route('traditional_dances.show', $traditionalDance) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $traditionalDance)
                        <a href="{{ route('traditional_dances.edit', [$traditionalDance, 'action' => 'delete']) }}" id="del-traditional_dance-{{ $traditionalDance->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
