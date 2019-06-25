@extends('layouts.app')

@section('title', __('backup.index_title'))

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('backup.index_title') }}</div>
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <th class="text-center">{{ __('app.table_no') }}</th>
                    <th>{{ __('backup.file_name') }}</th>
                    <th>{{ __('backup.file_size') }}</th>
                    <th>{{ __('backup.created_at') }}</th>
                    <th class="text-center">{{ __('backup.actions') }}</th>
                </thead>
                <tbody>
                    @forelse($backups as $key => $backup)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $backup->getFilename() }}</td>
                        <td>{{ format_size_units($backup->getSize()) }}</td>
                        <td>{{ date('Y-m-d H:i:s', $backup->getMTime()) }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('backups.index', ['action' => 'restore', 'file_name' => $backup->getFilename()]) }}"
                                    id="restore_{{ str_replace('.gz', '', $backup->getFilename()) }}"
                                    class="btn btn-warning btn-sm"
                                    title="{{ __('backup.restore') }}">{{ __('backup.restore') }}</a>
                                <a href="{{ route('backups.download', [$backup->getFilename()]) }}"
                                    id="download_{{ str_replace('.gz', '', $backup->getFilename()) }}"
                                    class="btn btn-success btn-sm"
                                    title="{{ __('backup.download') }}">{{ __('backup.download') }}</a>
                                <a href="{{ route('backups.index', ['action' => 'delete', 'file_name' => $backup->getFilename()]) }}"
                                    id="del_{{ str_replace('.gz', '', $backup->getFilename()) }}"
                                    class="btn btn-danger btn-sm"
                                    title="{{ __('backup.delete') }}">{{ __('backup.delete') }}</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">{{ __('backup.empty') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        @include('backups.forms')
    </div>
</div>
@endsection
