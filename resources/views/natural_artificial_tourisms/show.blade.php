@extends('layouts.app')

@section('title', __('natural_artificial_tourism.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('natural_artificial_tourism.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('natural_artificial_tourism.name') }}</td><td>{{ $naturalArtificialTourism->name }}</td></tr>
                        <tr><td>{{ __('natural_artificial_tourism.category') }}</td><td>{{ $naturalArtificialTourism->category == 0 ? 'Wisata Alam' : 'Wisata Buatan' }}</td></tr>
                        <tr><td>{{ __('natural_artificial_tourism.location') }}</td><td>{{ $naturalArtificialTourism->location }}</td></tr>
                        <tr><td>{{ __('natural_artificial_tourism.description') }}</td><td>{{ $naturalArtificialTourism->description ?? '-' }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $naturalArtificialTourism)
                    <a href="{{ route('natural_artificial_tourisms.edit', $naturalArtificialTourism) }}" id="edit-natural_artificial_tourism-{{ $naturalArtificialTourism->id }}" class="btn btn-warning">{{ __('natural_artificial_tourism.edit') }}</a>
                @endcan
                <a href="{{ route('natural_artificial_tourisms.index') }}" class="btn btn-link">{{ __('natural_artificial_tourism.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
