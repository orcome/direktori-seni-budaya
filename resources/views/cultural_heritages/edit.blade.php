@extends('layouts.app')

@section('title', __('cultural_heritage.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $culturalHeritage)
        @can('delete', $culturalHeritage)
            <div class="card">
                <div class="card-header">{{ __('cultural_heritage.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('cultural_heritage.name') }}</label>
                    <p>{{ $culturalHeritage->name }}</p>
                    <label class="form-label text-primary">{{ __('cultural_heritage.type') }}</label>
                    <p>{{ $culturalHeritage->type }}</p>
                    <label class="form-label text-primary">{{ __('cultural_heritage.sub_district_id') }}</label>
                    <p>{{ $culturalHeritage->subDistrict->name }}</p>
                    <label class="form-label text-primary">{{ __('cultural_heritage.village') }}</label>
                    <p>{{ $culturalHeritage->village }}</p>
                    <label class="form-label text-primary">{{ __('cultural_heritage.description') }}</label>
                    <p>{{ $culturalHeritage->description }}</p>
                    {!! $errors->first('cultural_heritage_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('cultural_heritage.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('cultural_heritages.destroy', $culturalHeritage) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="cultural_heritage_id" type="hidden" value="{{ $culturalHeritage->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('cultural_heritages.edit', $culturalHeritage) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('cultural_heritage.edit') }}</div>
            <form method="POST" action="{{ route('cultural_heritages.update', $culturalHeritage) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('cultural_heritage.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $culturalHeritage->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="type" class="form-label">{{ __('cultural_heritage.type') }} <span class="form-required">*</span></label>
                        <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type', $culturalHeritage->type) }}" required>
                        {!! $errors->first('type', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="sub_district_id" class="form-label">{{ __('art_studio.sub_district_id') }} <span class="form-required">*</span></label>
                        <select name="sub_district_id" id="sub_district_id" class="form-control {{ $errors->has('sub_district_id') ? ' is-invalid' : '' }}">
                            <option value="">-- {{ __('sub_district.list') }} --</option>
                            @foreach ($subDistricts as $key => $subDistrict)
                                <option value="{{ $subDistrict->id }}" {{ old('sub_district_id', $culturalHeritage->sub_district_id) == $subDistrict->id ? 'selected' : '' }}>{{ $subDistrict->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('sub_district_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="village" class="form-label">{{ __('cultural_heritage.village') }} <span class="form-required">*</span></label>
                        <input id="village" type="text" class="form-control{{ $errors->has('village') ? ' is-invalid' : '' }}" name="village" value="{{ old('village', $culturalHeritage->village) }}" required>
                        {!! $errors->first('village', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('cultural_heritage.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $culturalHeritage->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('cultural_heritage.update') }}" class="btn btn-success">
                    <a href="{{ route('cultural_heritages.show', $culturalHeritage) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $culturalHeritage)
                        <a href="{{ route('cultural_heritages.edit', [$culturalHeritage, 'action' => 'delete']) }}" id="del-cultural_heritage-{{ $culturalHeritage->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
