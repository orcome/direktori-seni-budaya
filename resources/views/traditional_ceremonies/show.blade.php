@extends('layouts.app')

@section('title', __('traditional_ceremony.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('traditional_ceremony.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('traditional_ceremony.name') }}</td><td>{{ $traditionalCeremony->name }}</td></tr>
                        <tr><td>{{ __('traditional_ceremony.detail') }}</td><td>{{ $traditionalCeremony->detail }}</td></tr>
                        <tr><td>{{ __('traditional_ceremony.description') }}</td><td>{{ $traditionalCeremony->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $traditionalCeremony)
                    <a href="{{ route('traditional_ceremonies.edit', $traditionalCeremony) }}" id="edit-traditional_ceremony-{{ $traditionalCeremony->id }}" class="btn btn-warning">{{ __('traditional_ceremony.edit') }}</a>
                @endcan
                <a href="{{ route('traditional_ceremonies.index') }}" class="btn btn-link">{{ __('traditional_ceremony.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
