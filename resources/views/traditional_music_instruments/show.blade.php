@extends('layouts.app')

@section('title', __('traditional_music_instrument.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('traditional_music_instrument.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('traditional_music_instrument.name') }}</td><td>{{ $traditionalMusicInstrument->name }}</td></tr>
                        <tr><td>{{ __('traditional_music_instrument.sum_sub_district') }}</td><td>{{ $traditionalMusicInstrument->sum_sub_district }}</td></tr>
                        <tr><td>{{ __('traditional_music_instrument.description') }}</td><td>{{ $traditionalMusicInstrument->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $traditionalMusicInstrument)
                    <a href="{{ route('traditional_music_instruments.edit', $traditionalMusicInstrument) }}" id="edit-traditional_music_instrument-{{ $traditionalMusicInstrument->id }}" class="btn btn-warning">{{ __('traditional_music_instrument.edit') }}</a>
                @endcan
                <a href="{{ route('traditional_music_instruments.index') }}" class="btn btn-link">{{ __('traditional_music_instrument.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
