@if (Request::get('action') == 'create')
@can('create', new App\SubDistrict)
    <form method="POST" action="{{ route('sub_districts.store') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="form-label">{{ __('sub_district.name') }} <span class="form-required">*</span></label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('sub_district.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input type="submit" value="{{ __('sub_district.create') }}" class="btn btn-success">
        <a href="{{ route('sub_districts.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
    </form>
@endcan
@endif
@if (Request::get('action') == 'edit' && $editableSubDistrict)
@can('update', $editableSubDistrict)
    <form method="POST" action="{{ route('sub_districts.update', $editableSubDistrict) }}" accept-charset="UTF-8">
        {{ csrf_field() }} {{ method_field('patch') }}
        <div class="form-group">
            <label for="name" class="form-label">{{ __('sub_district.name') }} <span class="form-required">*</span></label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $editableSubDistrict->name) }}" required>
            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="description" class="form-label">{{ __('sub_district.description') }}</label>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $editableSubDistrict->description) }}</textarea>
            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <input name="page" value="{{ request('page') }}" type="hidden">
        <input name="q" value="{{ request('q') }}" type="hidden">
        <input type="submit" value="{{ __('sub_district.update') }}" class="btn btn-success">
        <a href="{{ route('sub_districts.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        @can('delete', $editableSubDistrict)
            <a href="{{ route('sub_districts.index', ['action' => 'delete', 'id' => $editableSubDistrict->id] + Request::only('page', 'q')) }}" id="del-sub_district-{{ $editableSubDistrict->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
        @endcan
    </form>
@endcan
@endif
@if (Request::get('action') == 'delete' && $editableSubDistrict)
@can('delete', $editableSubDistrict)
    <div class="card">
        <div class="card-header">{{ __('sub_district.delete') }}</div>
        <div class="card-body">
            <label class="form-label text-primary">{{ __('sub_district.name') }}</label>
            <p>{{ $editableSubDistrict->name }}</p>
            <label class="form-label text-primary">{{ __('sub_district.description') }}</label>
            <p>{{ $editableSubDistrict->description }}</p>
            {!! $errors->first('sub_district_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <hr style="margin:0">
        <div class="card-body text-danger">{{ __('sub_district.delete_confirm') }}</div>
        <div class="card-footer">
            <form method="POST" action="{{ route('sub_districts.destroy', $editableSubDistrict) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                {{ csrf_field() }} {{ method_field('delete') }}
                <input name="sub_district_id" type="hidden" value="{{ $editableSubDistrict->id }}">
                <input name="page" value="{{ request('page') }}" type="hidden">
                <input name="q" value="{{ request('q') }}" type="hidden">
                <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
            </form>
            <a href="{{ route('sub_districts.index', Request::only('q', 'page')) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
        </div>
    </div>
@endcan
@endif
