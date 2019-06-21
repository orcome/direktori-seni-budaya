@extends('layouts.app')

@section('title', __('traditional_music_instrument.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('traditional_music_instrument.create') }}</div>
            <form method="POST" action="{{ route('traditional_music_instruments.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('traditional_music_instrument.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="type" class="form-label">{{ __('traditional_music_instrument.type') }} <span class="form-required">*</span></label>
                        <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required>
                        {!! $errors->first('type', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="sum_sub_district" class="form-label">{{ __('traditional_music_instrument.sum_sub_district') }} <span class="form-required">*</span></label>
                        <input id="sum_sub_district" type="number" class="form-control{{ $errors->has('sum_sub_district') ? ' is-invalid' : '' }}" name="sum_sub_district" value="{{ old('sum_sub_district') }}" required>
                        {!! $errors->first('sum_sub_district', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('traditional_music_instrument.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('traditional_music_instrument.create') }}" class="btn btn-success">
                    <a href="{{ route('traditional_music_instruments.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
