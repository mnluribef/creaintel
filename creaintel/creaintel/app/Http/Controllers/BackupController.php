<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Services\Backup;
use Artisan;

class BackupController extends Controller
{
    protected $backup;

    public function __construct(Backup $backup)
    {
        //$this->middleware('auth');
        $this->backup = $backup;
    }

    /**
     * Display backups.
     */
    public function index()
    {
        $backups = $this->backup->getBackupList();

        foreach ($backups as $key => $backup) {
            $backups[$key]['size'] = $this->backup->sizeFormat(Backup::folderSize(base_path('backups') . DIRECTORY_SEPARATOR . $key));
        }

        return view('backups.index')->with(compact('backups'));
    }

    public function store(Request $request)
    {
        try {
            $data = $this->backup->createBackupFolder($request);
            $this->backup->backupDb();
            $this->backup->backupFolder(public_path('storage'));
            $backups = $data;
            return redirect()->route('backups');
        } catch (Exception $error) {
            return Redirect::back()
                ->withError($exception->getMessage());
        }
    }

    public function downloadDatabase($key)
    {
        $path = base_path('backups/') . $key;
        foreach ($this->backup->scanFolder($path) as $file) {
            if (strpos(basename($file), 'database') !== false) {
                return response()->download($path . DIRECTORY_SEPARATOR . $file);
            }
        }
        return true;
    }

    public function downloadStorage($key)
    {
        $path = base_path('backups/') . $key;
        foreach ($this->backup->scanFolder($path) as $file) {
            if (strpos(basename($file), 'storage') !== false) {
                return response()->download($path . DIRECTORY_SEPARATOR . $file);
            }
        }
        return true;
    }

    public function restore(Request $request)
    {
        try {
            $path = base_path('backups/') . $request->key;
            foreach ($this->backup->scanFolder($path) as $file) {
                if (strpos(basename($file), 'database') !== false) {
                    $this->backup->restoreDb($path . DIRECTORY_SEPARATOR . $file, $path);
                }

                if (strpos(basename($file), 'storage') !== false) {
                    $this->backup->restore($path . DIRECTORY_SEPARATOR . $file, public_path('storage'));
                }
            }

            return redirect()->route('backups');
        } catch (Exception $ex) {
            return Redirect::back()
                ->withError($exception->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->backup->deleteBackup(base_path('backups/') . $request->key);
            return redirect()->route('backups');
        } catch (Exception $error) {
            return Redirect::back()
                ->withError($exception->getMessage());
        }
    }
}
