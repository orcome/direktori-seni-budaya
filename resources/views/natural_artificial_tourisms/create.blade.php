@extends('layouts.app')

@section('title', __('natural_artificial_tourism.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('natural_artificial_tourism.create') }}</div>
            <form method="POST" action="{{ route('natural_artificial_tourisms.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('natural_artificial_tourism.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">{{ __('natural_artificial_tourism.category') }} <span class="form-required">*</span></label>
                        <div class="col-md-6">
                            <input type="radio" name="category" value="0" checked="true"> Wisata Alam <br>
                            <input type="radio" name="category" value="1"> Wisata Buatan <br>
                        </div>
                        {!! $errors->first('category', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="location" class="form-label">{{ __('natural_artificial_tourism.location') }} <span class="form-required">*</span></label>
                        <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}" required>
                        {!! $errors->first('location', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('natural_artificial_tourism.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('natural_artificial_tourism.create') }}" class="btn btn-success">
                    <a href="{{ route('natural_artificial_tourisms.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
