@extends('layouts.app')

@section('title', __('ritual_ceremony.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\RitualCeremony)
            <a href="{{ route('ritual_ceremonies.create') }}" class="btn btn-success">{{ __('ritual_ceremony.create') }}</a>
            <a href="{{ route('home') }}" class="btn btn-danger">{{ __('app.print') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">{{ __('app.back_to_menu') }}</a>
        @endcan
    </div>
    <h3 class="page-title">{{ __('ritual_ceremony.list') }} | <small>{{ __('app.total') }} : {{ $ritualCeremonies->total() }} {{ __('ritual_ceremony.ritual_ceremony') }}</small></h3>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('ritual_ceremony.search') }}</label>
                        <input placeholder="{{ __('ritual_ceremony.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('ritual_ceremony.search') }}" class="btn btn-secondary">
                    <a href="{{ route('ritual_ceremonies.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('ritual_ceremony.name') }}</th>
                        <th>{{ __('ritual_ceremony.detail') }}</th>
                        <th>{{ __('ritual_ceremony.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ritualCeremonies as $key => $ritualCeremony)
                    <tr>
                        <td class="text-center">{{ $ritualCeremonies->firstItem() + $key }}</td>
                        <td>{!! $ritualCeremony->name_link !!}</td>
                        <td>{{ $ritualCeremony->detail }}</td>
                        <td>{{ $ritualCeremony->description }}</td>
                        <td class="text-center">
                            @can('view', $ritualCeremony)
                                <a href="{{ route('ritual_ceremonies.show', $ritualCeremony) }}" id="show-ritual_ceremony-{{ $ritualCeremony->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $ritualCeremonies->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
