@extends('layouts.app')

@section('title', __('sub_district.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\SubDistrict)
            <a href="{{ route('sub_districts.index', ['action' => 'create']) }}" class="btn btn-success">{{ __('sub_district.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('sub_district.list') }} <small>{{ __('app.total') }} : {{ $subDistricts->total() }} {{ __('sub_district.sub_district') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('sub_district.search') }}</label>
                        <input placeholder="{{ __('sub_district.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('sub_district.search') }}" class="btn btn-secondary">
                    <a href="{{ route('sub_districts.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('sub_district.name') }}</th>
                        <th>{{ __('sub_district.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subDistricts as $key => $subDistrict)
                    <tr>
                        <td class="text-center">{{ $subDistricts->firstItem() + $key }}</td>
                        <td>{{ $subDistrict->name }}</td>
                        <td>{{ $subDistrict->description }}</td>
                        <td class="text-center">
                            @can('update', $subDistrict)
                                <a href="{{ route('sub_districts.index', ['action' => 'edit', 'id' => $subDistrict->id] + Request::only('page', 'q')) }}" id="edit-sub_district-{{ $subDistrict->id }}">{{ __('app.edit') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $subDistricts->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
    <div class="col-md-4">
        @if(Request::has('action'))
        @include('sub_districts.forms')
        @endif
    </div>
</div>
@endsection
