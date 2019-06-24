@extends('layouts.app')

@section('title', __('ritual_ceremony.list'))

@section('content')
<div class="d-print-none mb-3">
    <div class="float-right">
        @can('create', new App\RitualCeremony)
            <a href="{{ route('ritual_ceremonies.create') }}" class="btn btn-success">{{ __('ritual_ceremony.create') }}</a>
            <a href="" class="btn btn-danger" onclick="window.print()">{{ __('app.print') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">{{ __('app.back_to_menu') }}</a>
        @endcan
    </div>
    <h3 class="page-title">{{ __('ritual_ceremony.list') }} | <small>{{ __('app.total') }} : {{ $ritualCeremonies->total() }} {{ __('ritual_ceremony.ritual_ceremony') }}</small></h3>
</div>
<div class="d-none d-print-block">
    <h5 class="text-center"><b>UPACARA RITUAL</b></h5>
    <h5 class="text-center"><b>KABUPATEN KAPUAS</b></h5><br>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="d-print-none card-header">
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
                        <th width="30" style="vertical-align: middle;" class="text-center">{{ __('app.table_no') }}</th>
                        <th width="100" style="vertical-align: middle;">{{ __('ritual_ceremony.name') }}</th>
                        <th width="100" style="vertical-align: middle;">{{ __('ritual_ceremony.detail') }}</th>
                        <th width="100" style="vertical-align: middle;">{{ __('ritual_ceremony.description') }}</th>
                        <th width="100" style="vertical-align: middle;" class="d-print-none text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ritualCeremonies as $key => $ritualCeremony)
                    <tr>
                        <td class="text-center">{{ $ritualCeremonies->firstItem() + $key }}</td>
                        <td>{{ $ritualCeremony->name }}</td>
                        <td>{{ $ritualCeremony->detail }}</td>
                        <td>{{ $ritualCeremony->description ?? '-' }}</td>
                        <td class="d-print-none text-center">
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
