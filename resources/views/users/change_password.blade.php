@extends('layouts.app')

@section('title', __('auth.change_password'))

@section('content')
<div class="row justify-content-center">
    {{-- <div class="row"> --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('auth.change_password') }}</div>

                @if (session('success') or session('error'))
                    <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}">
                        {{ session('success') ?: session('error')}}
                    </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.change_password.update') }}">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label for="old_password" class="form-label">{{ __('auth.old_password') }}</label>

                            <div>
                                <input id="old_password" type="password" class="form-control" name="old_password" placeholder="******">

                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label for="new_password" class="form-label">{{ __('auth.new_password') }}</label>

                            <div>
                                <input id="new_password" type="password" class="form-control" name="new_password" placeholder="********">

                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                            <label for="new_password-confirm" class="form-label">{{ __('auth.new_password_confirmation') }}</label>
                            <div>
                                <input id="new_password-confirm" type="password" class="form-control" name="new_password_confirmation" placeholder="********">

                                @if ($errors->has('new_password_confirmation'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('new_password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            {{ __('auth.change_password') }}
                        </button>
                        <a href="{{ route('home') }}" class="btn btn-link">
                            {{ __('auth.back') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
