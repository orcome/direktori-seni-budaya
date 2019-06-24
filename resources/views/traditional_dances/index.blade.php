@extends('layouts.app')

@section('title', __('traditional_dance.list'))

@section('content')
<div class="d-print-none mb-3">
    <div class="float-right">
        @can('create', new App\TraditionalDance)
            <a href="{{ route('traditional_dances.create') }}" class="btn btn-success">{{ __('traditional_dance.create') }}</a>
            <a href="" class="btn btn-danger" onclick="window.print()">{{ __('app.print') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">{{ __('app.back_to_menu') }}</a>
        @endcan
    </div>
    <h3 class="page-title">{{ __('traditional_dance.list') }} | <small>{{ __('app.total') }} : {{ $traditionalDances->total() }} {{ __('traditional_dance.traditional_dance') }}</small></h3>
</div>
<div class="d-none d-print-block">
    <h5 class="text-center"><b>TARI TRADISIONAL</b></h5>
    <h5 class="text-center"><b>KABUPATEN KAPUAS</b></h5><br>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="d-print-none card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('traditional_dance.search') }}</label>
                        <input placeholder="{{ __('traditional_dance.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('traditional_dance.search') }}" class="btn btn-secondary">
                    <a href="{{ route('traditional_dances.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('traditional_dance.name') }}</th>
                        <th>{{ __('traditional_dance.dance_type') }}</th>
                        <th>{{ __('traditional_dance.choreographer') }}</th>
                        <th>{{ __('traditional_dance.description') }}</th>
                        <th class="d-print-none text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($traditionalDances as $key => $traditionalDance)
                    <tr>
                        <td class="text-center">{{ $traditionalDances->firstItem() + $key }}</td>
                        <td>{{ $traditionalDance->name }}</td>
                        <td>{{ $traditionalDance->dance_type }}</td>
                        <td>{{ $traditionalDance->choreographer }}</td>
                        <td>{{ $traditionalDance->description }}</td>
                        <td class="d-print-none text-center">
                            @can('view', $traditionalDance)
                                <a href="{{ route('traditional_dances.show', $traditionalDance) }}" id="show-traditional_dance-{{ $traditionalDance->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $traditionalDances->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
