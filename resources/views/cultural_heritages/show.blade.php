@extends('layouts.app')

@section('title', __('cultural_heritage.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('cultural_heritage.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('cultural_heritage.name') }}</td><td>{{ $culturalHeritage->name }}</td></tr>
                        <tr><td>{{ __('cultural_heritage.description') }}</td><td>{{ $culturalHeritage->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $culturalHeritage)
                    <a href="{{ route('cultural_heritages.edit', $culturalHeritage) }}" id="edit-cultural_heritage-{{ $culturalHeritage->id }}" class="btn btn-warning">{{ __('cultural_heritage.edit') }}</a>
                @endcan
                <a href="{{ route('cultural_heritages.index') }}" class="btn btn-link">{{ __('cultural_heritage.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
