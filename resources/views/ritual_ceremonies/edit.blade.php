@extends('layouts.app')

@section('title', __('ritual_ceremony.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $ritualCeremony)
        @can('delete', $ritualCeremony)
            <div class="card">
                <div class="card-header">{{ __('ritual_ceremony.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('ritual_ceremony.name') }}</label>
                    <p>{{ $ritualCeremony->name }}</p>
                    <label class="form-label text-primary">{{ __('ritual_ceremony.detail') }}</label>
                    <p>{{ $ritualCeremony->detail }}</p>
                    <label class="form-label text-primary">{{ __('ritual_ceremony.description') }}</label>
                    <p>{{ $ritualCeremony->description }}</p>
                    {!! $errors->first('ritual_ceremony_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('ritual_ceremony.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('ritual_ceremonies.destroy', $ritualCeremony) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="ritual_ceremony_id" type="hidden" value="{{ $ritualCeremony->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('ritual_ceremonies.edit', $ritualCeremony) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('ritual_ceremony.edit') }}</div>
            <form method="POST" action="{{ route('ritual_ceremonies.update', $ritualCeremony) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('ritual_ceremony.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $ritualCeremony->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="detail" class="form-label">{{ __('ritual_ceremony.detail') }} <span class="form-required">*</span></label>
                        <textarea id="detail" class="form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}" name="detail" rows="4">{{ old('detail', $ritualCeremony->detail) }}</textarea>
                        {!! $errors->first('detail', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('ritual_ceremony.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $ritualCeremony->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('ritual_ceremony.update') }}" class="btn btn-success">
                    <a href="{{ route('ritual_ceremonies.show', $ritualCeremony) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $ritualCeremony)
                        <a href="{{ route('ritual_ceremonies.edit', [$ritualCeremony, 'action' => 'delete']) }}" id="del-ritual_ceremony-{{ $ritualCeremony->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
