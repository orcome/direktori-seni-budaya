@extends('layouts.app')

@section('title', __('traditional_ceremony.list'))

@section('content')
<div class="d-print-none mb-3">
    <div class="float-right">
        @can('create', new App\TraditionalCeremony)
            <a href="{{ route('traditional_ceremonies.create') }}" class="btn btn-success">{{ __('traditional_ceremony.create') }}</a>
            <a href="" class="btn btn-danger" onclick="window.print()">{{ __('app.print') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">{{ __('app.back_to_menu') }}</a>
        @endcan
    </div>
    <h3 class="page-title">{{ __('traditional_ceremony.list') }} | <small>{{ __('app.total') }} : {{ $traditionalCeremonies->total() }} {{ __('traditional_ceremony.traditional_ceremony') }}</small></h3>
</div>
<div class="d-none d-print-block">
    <h5 class="text-center"><b>UPACARA ADAT</b></h5>
    <h5 class="text-center"><b>KABUPATEN KAPUAS</b></h5><br>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="d-print-none card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('traditional_ceremony.search') }}</label>
                        <input placeholder="{{ __('traditional_ceremony.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('traditional_ceremony.search') }}" class="btn btn-secondary">
                    <a href="{{ route('traditional_ceremonies.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('traditional_ceremony.name') }}</th>
                        <th>{{ __('traditional_ceremony.detail') }}</th>
                        <th>{{ __('traditional_ceremony.description') }}</th>
                        <th class="d-print-none text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($traditionalCeremonies as $key => $traditionalCeremony)
                    <tr>
                        <td class="text-center">{{ $traditionalCeremonies->firstItem() + $key }}</td>
                        <td>{{ $traditionalCeremony->name }}</td>
                        <td>{{ $traditionalCeremony->detail }}</td>
                        <td>{{ $traditionalCeremony->description }}</td>
                        <td class="d-print-none text-center">
                            @can('view', $traditionalCeremony)
                                <a href="{{ route('traditional_ceremonies.show', $traditionalCeremony) }}" id="show-traditional_ceremony-{{ $traditionalCeremony->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $traditionalCeremonies->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
