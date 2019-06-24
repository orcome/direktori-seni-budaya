@extends('layouts.app')

@section('title', __('traditional_music_instrument.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $traditionalMusicInstrument)
        @can('delete', $traditionalMusicInstrument)
            <div class="card">
                <div class="card-header">{{ __('traditional_music_instrument.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('traditional_music_instrument.name') }}</label>
                    <p>{{ $traditionalMusicInstrument->name }}</p>
                    <label class="form-label text-primary">{{ __('traditional_music_instrument.type') }}</label>
                    <p>{{ $traditionalMusicInstrument->type }}</p>
                    <label class="form-label text-primary">{{ __('traditional_music_instrument.sum_sub_district') }}</label>
                    <p>{{ $traditionalMusicInstrument->sum_sub_district }}</p>
                    <label class="form-label text-primary">{{ __('traditional_music_instrument.description') }}</label>
                    <p>{{ $traditionalMusicInstrument->description ?? '-' }}</p>
                    {!! $errors->first('traditional_music_instrument_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('traditional_music_instrument.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('traditional_music_instruments.destroy', $traditionalMusicInstrument) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="traditional_music_instrument_id" type="hidden" value="{{ $traditionalMusicInstrument->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('traditional_music_instruments.edit', $traditionalMusicInstrument) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('traditional_music_instrument.edit') }}</div>
            <form method="POST" action="{{ route('traditional_music_instruments.update', $traditionalMusicInstrument) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('traditional_music_instrument.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $traditionalMusicInstrument->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="type" class="form-label">{{ __('traditional_music_instrument.type') }} <span class="form-required">*</span></label>
                        <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type', $traditionalMusicInstrument->type) }}" required>
                        {!! $errors->first('type', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="sum_sub_district" class="form-label">{{ __('traditional_music_instrument.sum_sub_district') }} <span class="form-required">*</span></label>
                        <input id="sum_sub_district" type="number" class="form-control{{ $errors->has('sum_sub_district') ? ' is-invalid' : '' }}" name="sum_sub_district" value="{{ old('sum_sub_district', $traditionalMusicInstrument->sum_sub_district) }}" required>
                        {!! $errors->first('sum_sub_district', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('traditional_music_instrument.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $traditionalMusicInstrument->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('traditional_music_instrument.update') }}" class="btn btn-success">
                    <a href="{{ route('traditional_music_instruments.show', $traditionalMusicInstrument) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $traditionalMusicInstrument)
                        <a href="{{ route('traditional_music_instruments.edit', [$traditionalMusicInstrument, 'action' => 'delete']) }}" id="del-traditional_music_instrument-{{ $traditionalMusicInstrument->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
