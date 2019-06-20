@extends('layouts.app')

@section('title', __('cultural_heritage.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\CulturalHeritage)
            <a href="{{ route('cultural_heritages.create') }}" class="btn btn-success">{{ __('cultural_heritage.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('cultural_heritage.list') }} <small>{{ __('app.total') }} : {{ $culturalHeritages->total() }} {{ __('cultural_heritage.cultural_heritage') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
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
                        <th>{{ __('cultural_heritage.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($culturalHeritages as $key => $culturalHeritage)
                    <tr>
                        <td class="text-center">{{ $culturalHeritages->firstItem() + $key }}</td>
                        <td>{!! $culturalHeritage->name_link !!}</td>
                        <td>{{ $culturalHeritage->description }}</td>
                        <td class="text-center">
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
