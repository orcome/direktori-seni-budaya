@extends('layouts.app')

@section('title', __('natural_artificial_tourism.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $naturalArtificialTourism)
        @can('delete', $naturalArtificialTourism)
            <div class="card">
                <div class="card-header">{{ __('natural_artificial_tourism.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('natural_artificial_tourism.name') }}</label>
                    <p>{{ $naturalArtificialTourism->name }}</p>
                    <label class="form-label text-primary">{{ __('natural_artificial_tourism.category') }}</label>
                    <p>{{ $naturalArtificialTourism->category == 0 ? 'Wisata Alam' : 'Wisata Buatan' }}</p>
                    <label class="form-label text-primary">{{ __('natural_artificial_tourism.location') }}</label>
                    <p>{{ $naturalArtificialTourism->location }}</p>
                    <label class="form-label text-primary">{{ __('natural_artificial_tourism.description') }}</label>
                    <p>{{ $naturalArtificialTourism->description ?? '-' }}</p>
                    {!! $errors->first('natural_artificial_tourism_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('natural_artificial_tourism.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('natural_artificial_tourisms.destroy', $naturalArtificialTourism) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="natural_artificial_tourism_id" type="hidden" value="{{ $naturalArtificialTourism->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('natural_artificial_tourisms.edit', $naturalArtificialTourism) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('natural_artificial_tourism.edit') }}</div>
            <form method="POST" action="{{ route('natural_artificial_tourisms.update', $naturalArtificialTourism) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('natural_artificial_tourism.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $naturalArtificialTourism->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">{{ __('natural_artificial_tourism.category') }} <span class="form-required">*</span></label>
                        <div class="col-md-6">
                            <input type="radio" name="category" value="0" {{ $naturalArtificialTourism->category == 0 ? 'checked' : '' }}> Wisata Alam <br>
                            <input type="radio" name="category" value="1" {{ $naturalArtificialTourism->category == 1 ? 'checked' : '' }}> Wisata Buatan <br>
                        </div>
                        {!! $errors->first('category', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="location" class="form-label">{{ __('natural_artificial_tourism.location') }} <span class="form-required">*</span></label>
                        <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location', $naturalArtificialTourism->location) }}" required>
                        {!! $errors->first('location', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('natural_artificial_tourism.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $naturalArtificialTourism->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('natural_artificial_tourism.update') }}" class="btn btn-success">
                    <a href="{{ route('natural_artificial_tourisms.show', $naturalArtificialTourism) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $naturalArtificialTourism)
                        <a href="{{ route('natural_artificial_tourisms.edit', [$naturalArtificialTourism, 'action' => 'delete']) }}" id="del-natural_artificial_tourism-{{ $naturalArtificialTourism->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
