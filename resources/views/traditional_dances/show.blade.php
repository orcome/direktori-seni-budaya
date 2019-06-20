@extends('layouts.app')

@section('title', __('traditional_dance.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('traditional_dance.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('traditional_dance.name') }}</td><td>{{ $traditionalDance->name }}</td></tr>
                        <tr><td>{{ __('traditional_dance.description') }}</td><td>{{ $traditionalDance->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $traditionalDance)
                    <a href="{{ route('traditional_dances.edit', $traditionalDance) }}" id="edit-traditional_dance-{{ $traditionalDance->id }}" class="btn btn-warning">{{ __('traditional_dance.edit') }}</a>
                @endcan
                <a href="{{ route('traditional_dances.index') }}" class="btn btn-link">{{ __('traditional_dance.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
