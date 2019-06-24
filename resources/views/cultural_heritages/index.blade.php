@extends('layouts.app')

@section('title', __('cultural_heritage.list'))

@section('content')
<div class="d-print-none mb-3">
    <div class="float-right">
        @can('create', new App\CulturalHeritage)
            <a href="{{ route('cultural_heritages.create') }}" class="btn btn-success">{{ __('cultural_heritage.create') }}</a>
            <a href="" class="btn btn-danger" onclick="window.print()">{{ __('app.print') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">{{ __('app.back_to_menu') }}</a>
        @endcan
    </div>
    <h3 class="page-title">{{ __('cultural_heritage.list') }} | <small>{{ __('app.total') }} : {{ $culturalHeritages->total() }} {{ __('cultural_heritage.cultural_heritage') }}</small></h3>
</div>
<div class="d-none d-print-block">
    <h5 class="text-center"><b>DATA CAGAR BUDAYA</b></h5>
    <h5 class="text-center"><b>KABUPATEN KAPUAS</b></h5><br>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="d-print-none card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('cultural_heritage.search') }}</label>
                        <input placeholder="{{ __('cultural_heritage.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('cultural_heritage.search') }}" class="btn btn-secondary">
                    <a href="{{ route('cultural_heritages.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('cultural_heritage.name') }}</th>
                        <th>{{ __('cultural_heritage.type') }}</th>
                        <th>{{ __('cultural_heritage.sub_district_id') }}</th>
                        <th>{{ __('cultural_heritage.village') }}</th>
                        <th>{{ __('cultural_heritage.description') }}</th>
                        <th class="d-print-none text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($culturalHeritages as $key => $culturalHeritage)
                    <tr>
                        <td class="text-center">{{ $culturalHeritages->firstItem() + $key }}</td>
                        <td>{{ $culturalHeritage->name }}</td>
                        <td>{{ $culturalHeritage->type }}</td>
                        <td>{{ $culturalHeritage->subDistrict->name }}</td>
                        <td>{{ $culturalHeritage->village }}</td>
                        <td>{{ $culturalHeritage->description ?? '-' }}</td>
                        <td class="d-print-none text-center">
                            @can('view', $culturalHeritage)
                                <a href="{{ route('cultural_heritages.show', $culturalHeritage) }}" id="show-cultural_heritage-{{ $culturalHeritage->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $culturalHeritages->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
