@extends('layouts.app')

@section('title', __('art_studio.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $artStudio)
        @can('delete', $artStudio)
            <div class="card">
                <div class="card-header">{{ __('art_studio.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary" style="margin:0px">{{ __('art_studio.name') }}</label>
                    <p  style="margin-bottom:6px">{{ $artStudio->name }}</p>
                    <label class="form-label text-primary" style="margin:0px">{{ __('art_studio.sub_district_id') }}</label>
                    <p  style="margin-bottom:6px">{{ $artStudio->subDistrict->name }}</p>
                    <label class="form-label text-primary" style="margin:0px">{{ __('art_studio.village') }}</label>
                    <p  style="margin-bottom:6px">{{ $artStudio->village }}</p>
                    <label class="form-label text-primary" style="margin:0px">{{ __('art_studio.leader') }}</label>
                    <p  style="margin-bottom:6px">{{ $artStudio->leader }}</p>
                    <label class="form-label text-primary" style="margin:0px">{{ __('art_studio.art_type') }}</label>
                    <p  style="margin-bottom:6px">{{ $artStudio->art_type }}</p>
                    <label class="form-label text-primary" style="margin:0px">{{ __('art_studio.building') }}</label>
                    <p  style="margin-bottom:6px">{{ $artStudio->building }}</p>
                    <label class="form-label text-primary" style="margin:0px">{{ __('art_studio.description') }}</label>
                    <p  style="margin-bottom:6px">{{ $artStudio->description }}</p>
                    {!! $errors->first('art_studio_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('art_studio.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('art_studios.destroy', $artStudio) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="art_studio_id" type="hidden" value="{{ $artStudio->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('art_studios.edit', $artStudio) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('art_studio.edit') }}</div>
            <form method="POST" action="{{ route('art_studios.update', $artStudio) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('art_studio.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $artStudio->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="sub_district_id" class="form-label">{{ __('art_studio.sub_district_id') }} <span class="form-required">*</span></label>
                        <input id="sub_district_id" type="text" class="form-control{{ $errors->has('sub_district_id') ? ' is-invalid' : '' }}" name="sub_district_id" value="{{ old('sub_district_id', $artStudio->subDistrict->name) }}" required>
                        {!! $errors->first('sub_district_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="village" class="form-label">{{ __('art_studio.village') }} <span class="form-required">*</span></label>
                        <input id="village" type="text" class="form-control{{ $errors->has('village') ? ' is-invalid' : '' }}" name="village" value="{{ old('village', $artStudio->village) }}" required>
                        {!! $errors->first('village', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="leader" class="form-label">{{ __('art_studio.leader') }} <span class="form-required">*</span></label>
                        <input id="leader" type="text" class="form-control{{ $errors->has('leader') ? ' is-invalid' : '' }}" name="leader" value="{{ old('leader', $artStudio->leader) }}" required>
                        {!! $errors->first('leader', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="art_type" class="form-label">{{ __('art_studio.art_type') }} <span class="form-required">*</span></label>
                        <input id="art_type" type="text" class="form-control{{ $errors->has('art_type') ? ' is-invalid' : '' }}" name="art_type" value="{{ old('art_type', $artStudio->art_type) }}" required>
                        {!! $errors->first('art_type', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="building" class="form-label">{{ __('art_studio.building') }} <span class="form-required">*</span></label>
                        <input id="building" type="text" class="form-control{{ $errors->has('building') ? ' is-invalid' : '' }}" name="building" value="{{ old('building', $artStudio->building) }}" required>
                        {!! $errors->first('building', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('art_studio.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $artStudio->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('art_studio.update') }}" class="btn btn-success">
                    <a href="{{ route('art_studios.show', $artStudio) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $artStudio)
                        <a href="{{ route('art_studios.edit', [$artStudio, 'action' => 'delete']) }}" id="del-art_studio-{{ $artStudio->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
