@extends('layouts.app')

@section('title', __('traditional_ceremony.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $traditionalCeremony)
        @can('delete', $traditionalCeremony)
            <div class="card">
                <div class="card-header">{{ __('traditional_ceremony.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('traditional_ceremony.name') }}</label>
                    <p>{{ $traditionalCeremony->name }}</p>
                    <label class="form-label text-primary">{{ __('traditional_ceremony.detail') }}</label>
                    <p>{{ $traditionalCeremony->detail }}</p>
                    <label class="form-label text-primary">{{ __('traditional_ceremony.description') }}</label>
                    <p>{{ $traditionalCeremony->description }}</p>
                    {!! $errors->first('traditional_ceremony_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('traditional_ceremony.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('traditional_ceremonies.destroy', $traditionalCeremony) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="traditional_ceremony_id" type="hidden" value="{{ $traditionalCeremony->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('traditional_ceremonies.edit', $traditionalCeremony) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('traditional_ceremony.edit') }}</div>
            <form method="POST" action="{{ route('traditional_ceremonies.update', $traditionalCeremony) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('traditional_ceremony.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $traditionalCeremony->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="detail" class="form-label">{{ __('traditional_ceremony.detail') }}</label>
                        <textarea id="detail" class="form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}" name="detail" rows="4">{{ old('detail', $traditionalCeremony->detail) }}</textarea>
                        {!! $errors->first('detail', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('traditional_ceremony.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $traditionalCeremony->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('traditional_ceremony.update') }}" class="btn btn-success">
                    <a href="{{ route('traditional_ceremonies.show', $traditionalCeremony) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $traditionalCeremony)
                        <a href="{{ route('traditional_ceremonies.edit', [$traditionalCeremony, 'action' => 'delete']) }}" id="del-traditional_ceremony-{{ $traditionalCeremony->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
