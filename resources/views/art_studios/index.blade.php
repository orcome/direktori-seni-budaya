@extends('layouts.app')

@section('title', __('art_studio.list'))

@section('content')
<div class="d-print-none mb-3">
    <div class="float-right">
        @can('create', new App\ArtStudio)
            <a href="{{ route('art_studios.create') }}" class="btn btn-success">{{ __('art_studio.create') }}</a>
            <a href="" class="btn btn-danger" onclick="window.print()">{{ __('app.print') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">{{ __('app.back_to_menu') }}</a>
        @endcan
    </div>
    <h3 class="page-title">{{ __('art_studio.list') }} | <small>{{ __('app.total') }} : {{ $artStudios->total() }} {{ __('art_studio.art_studio') }}</small></h3>
</div>
<div class="d-none d-print-block">
    <h5 class="text-center"><b>SANGGAR SENI</b></h5>
    <h5 class="text-center"><b>KABUPATEN KAPUAS</b></h5><br>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="d-print-none card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('art_studio.search') }}</label>
                        <input placeholder="{{ __('art_studio.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('art_studio.search') }}" class="btn btn-secondary">
                    <a href="{{ route('art_studios.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('art_studio.sub_dist_vill') }}</th>
                        <th>{{ __('art_studio.name') }}</th>
                        <th>{{ __('art_studio.leader') }}</th>
                        <th>{{ __('art_studio.art_type') }}</th>
                        <th>{{ __('art_studio.building') }}</th>
                        <th>{{ __('art_studio.description') }}</th>
                        <th class="d-print-none text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artStudios as $key => $artStudio)
                    <tr>
                        <td class="text-center">{{ $artStudios->firstItem() + $key }}</td>
                        <td>{{ $artStudio->village != null ? $artStudio->subDistrict->name.'/'.$artStudio->village : $artStudio->subDistrict->name }}</td>
                        <td>{{ $artStudio->name }}</td>
                        <td>{{ $artStudio->leader }}</td>
                        <td>{{ $artStudio->art_type }}</td>
                        <td>{{ $artStudio->building == 0 ? 'Tidak Ada' : 'Ada' }}</td>
                        <td>{{ $artStudio->description }}</td>
                        <td class="d-print-none text-center">
                            @can('view', $artStudio)
                                <a href="{{ route('art_studios.show', $artStudio) }}" id="show-art_studio-{{ $artStudio->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $artStudios->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
