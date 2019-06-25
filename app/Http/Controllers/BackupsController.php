<?php

namespace App\Http\Controllers;

use BackupManager\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\FileExistsException;
use BackupManager\Filesystems\Destination;
use League\Flysystem\FileNotFoundException;

/**
 * Database Backups Controller.
 *
 * @author Nafies Luthfi <nafiesL@gmail.com>
 */
class BackupsController extends Controller
{
    public function index(Request $request)
    {
        if (!file_exists(storage_path('app/backup/db'))) {
            $backups = [];
        } else {
            $backups = \File::allFiles(storage_path('app/backup/db'));

            // Sort files by modified time DESC
            usort($backups, function ($a, $b) {
                return -1 * strcmp($a->getMTime(), $b->getMTime());
            });
        }

        return view('backups.index', compact('backups'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file_name' => 'nullable|max:30|regex:/^[\w._-]+$/',
        ]);

        try {
            $manager = app()->make(Manager::class);
            $fileName = $request->get('file_name') ?: date('Y-m-d_Hi');

            $manager->makeBackup()->run('mysql', [
                new Destination('local', 'backup/db/'.$fileName),
            ], 'gzip');

            flash(__('backup.created', ['filename' => $fileName.'.gz']), 'success');

            return redirect()->route('backups.index');
        } catch (FileExistsException $e) {
            flash(__('backup.not_created', ['filename' => $fileName.'.gz']), 'error');

            return redirect()->route('backups.index');
        }
    }

    public function destroy($fileName)
    {
        if (file_exists(storage_path('app/backup/db/').$fileName)) {
            unlink(storage_path('app/backup/db/').$fileName);
        }

        flash(__('backup.deleted', ['filename' => $fileName]), 'warning');

        return redirect()->route('backups.index');
    }

    public function download($fileName)
    {
        return response()->download(storage_path('app/backup/db/').$fileName);
    }

    public function restore($fileName)
    {
        try {
            $manager = app()->make(Manager::class);
            $manager->makeRestore()->run('local', 'backup/db/'.$fileName, 'mysql', 'gzip');
        } catch (FileNotFoundException $e) {
        }

        flash(__('backup.restored', ['filename' => $fileName]), 'success');

        return redirect()->route('backups.index');
    }

    public function upload(Request $request)
    {
        $data = $request->validate([
            'backup_file' => 'required|mimetypes:application/x-gzip',
        ], [
            'backup_file.mimetypes' => 'Invalid file type, must be <strong>.gz</strong> file',
        ]);

        $file = $data['backup_file'];
        $fileName = $file->getClientOriginalName();

        if (file_exists(storage_path('app/backup/db/').$fileName) == false) {
            $file->storeAs('backup/db', $fileName);
        }

        flash(__('backup.uploaded', ['filename' => $fileName]), 'success');

        return redirect()->route('backups.index');
    }
}
