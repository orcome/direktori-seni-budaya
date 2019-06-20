@extends('layouts.app')

@section('title', __('traditional_music_instrument.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\TraditionalMusicInstrument)
            <a href="{{ route('traditional_music_instruments.create') }}" class="btn btn-success">{{ __('traditional_music_instrument.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('traditional_music_instrument.list') }} <small>{{ __('app.total') }} : {{ $traditionalMusicInstruments->total() }} {{ __('traditional_music_instrument.traditional_music_instrument') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('traditional_music_instrument.search') }}</label>
                        <input placeholder="{{ __('traditional_music_instrument.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('traditional_music_instrument.search') }}" class="btn btn-secondary">
                    <a href="{{ route('traditional_music_instruments.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('traditional_music_instrument.name') }}</th>
                        <th>{{ __('traditional_music_instrument.sum_sub_district') }}</th>
                        <th>{{ __('traditional_music_instrument.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($traditionalMusicInstruments as $key => $traditionalMusicInstrument)
                    <tr>
                        <td class="text-center">{{ $traditionalMusicInstruments->firstItem() + $key }}</td>
                        <td>{!! $traditionalMusicInstrument->name_link !!}</td>
                        <td>{!! $traditionalMusicInstrument->sum_sub_district !!}</td>
                        <td>{{ $traditionalMusicInstrument->description }}</td>
                        <td class="text-center">
                            @can('view', $traditionalMusicInstrument)
                                <a href="{{ route('traditional_music_instruments.show', $traditionalMusicInstrument) }}" id="show-traditional_music_instrument-{{ $traditionalMusicInstrument->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $traditionalMusicInstruments->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
