@extends('layouts.app')

@section('title', __('art_studio.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('art_studio.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('art_studio.name') }}</td><td>{{ $artStudio->name }}</td></tr>
                        <tr><td>{{ __('art_studio.sub_district_id') }}</td><td>{{ $artStudio->sub_district_id }}</td></tr>
                        <tr><td>{{ __('art_studio.village') }}</td><td>{{ $artStudio->village }}</td></tr>
                        <tr><td>{{ __('art_studio.leader') }}</td><td>{{ $artStudio->leader }}</td></tr>
                        <tr><td>{{ __('art_studio.art_type') }}</td><td>{{ $artStudio->art_type }}</td></tr>
                        <tr><td>{{ __('art_studio.building') }}</td><td>{{ $artStudio->building == 0 ? 'Tidak Ada' : 'Ada' }}</td></tr>
                        <tr><td>{{ __('art_studio.description') }}</td><td>{{ $artStudio->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $artStudio)
                    <a href="{{ route('art_studios.edit', $artStudio) }}" id="edit-art_studio-{{ $artStudio->id }}" class="btn btn-warning">{{ __('art_studio.edit') }}</a>
                @endcan
                <a href="{{ route('art_studios.index') }}" class="btn btn-link">{{ __('art_studio.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
