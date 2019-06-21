@extends('layouts.app')

@section('title', __('cultural_heritage.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('cultural_heritage.create') }}</div>
            <form method="POST" action="{{ route('cultural_heritages.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('cultural_heritage.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="type" class="form-label">{{ __('cultural_heritage.type') }} <span class="form-required">*</span></label>
                        <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required>
                        {!! $errors->first('type', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="sub_district_id" class="form-label">{{ __('cultural_heritage.sub_district_id') }} <span class="form-required">*</span></label>
                        <input id="sub_district_id" sub_district_id="text" class="form-control{{ $errors->has('sub_district_id') ? ' is-invalid' : '' }}" name="sub_district_id" value="{{ old('sub_district_id') }}" required>
                        {!! $errors->first('sub_district_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="village" class="form-label">{{ __('cultural_heritage.village') }} <span class="form-required">*</span></label>
                        <input id="village" village="text" class="form-control{{ $errors->has('village') ? ' is-invalid' : '' }}" name="village" value="{{ old('village') }}" required>
                        {!! $errors->first('village', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('cultural_heritage.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('cultural_heritage.create') }}" class="btn btn-success">
                    <a href="{{ route('cultural_heritages.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
