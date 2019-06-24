@extends('layouts.app')

@section('title', __('ritual_ceremony.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('ritual_ceremony.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('ritual_ceremony.name') }}</td><td>{{ $ritualCeremony->name }}</td></tr>
                        <tr><td>{{ __('ritual_ceremony.detail') }}</td><td>{{ $ritualCeremony->detail }}</td></tr>
                        <tr><td>{{ __('ritual_ceremony.description') }}</td><td>{{ $ritualCeremony->description ?? '-' }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $ritualCeremony)
                    <a href="{{ route('ritual_ceremonies.edit', $ritualCeremony) }}" id="edit-ritual_ceremony-{{ $ritualCeremony->id }}" class="btn btn-warning">{{ __('ritual_ceremony.edit') }}</a>
                @endcan
                <a href="{{ route('ritual_ceremonies.index') }}" class="btn btn-link">{{ __('ritual_ceremony.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
