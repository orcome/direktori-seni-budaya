@extends('layouts.app')

@section('title', __('natural_artificial_tourism.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\NaturalArtificialTourism)
            <a href="{{ route('natural_artificial_tourisms.create') }}" class="btn btn-success">{{ __('natural_artificial_tourism.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('natural_artificial_tourism.list') }} <small>{{ __('app.total') }} : {{ $naturalArtificialTourisms->total() }} {{ __('natural_artificial_tourism.natural_artificial_tourism') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('natural_artificial_tourism.search') }}</label>
                        <input placeholder="{{ __('natural_artificial_tourism.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('natural_artificial_tourism.search') }}" class="btn btn-secondary">
                    <a href="{{ route('natural_artificial_tourisms.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('natural_artificial_tourism.name') }}</th>
                        <th>{{ __('natural_artificial_tourism.category') }}</th>
                        <th>{{ __('natural_artificial_tourism.location') }}</th>
                        <th>{{ __('natural_artificial_tourism.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($naturalArtificialTourisms as $key => $naturalArtificialTourism)
                    <tr>
                        <td class="text-center">{{ $naturalArtificialTourisms->firstItem() + $key }}</td>
                        <td>{!! $naturalArtificialTourism->name_link !!}</td>
                        <td>{!! $naturalArtificialTourism->category !!}</td>
                        <td>{!! $naturalArtificialTourism->location !!}</td>
                        <td>{{ $naturalArtificialTourism->description }}</td>
                        <td class="text-center">
                            @can('view', $naturalArtificialTourism)
                                <a href="{{ route('natural_artificial_tourisms.show', $naturalArtificialTourism) }}" id="show-natural_artificial_tourism-{{ $naturalArtificialTourism->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $naturalArtificialTourisms->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
