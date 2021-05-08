<?php

namespace App\Http\Controllers;

use Google_Service_Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Services\Google\GoogleClientService;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    const URl = 'https://docs.google.com/uc?id=';
    const FOLDER_ID = '1wcuMweBUW95YZgwfNI6eWHLsPyNWjHj-';

    public $googleClientService;

    public function __construct(GoogleClientService $googleClientService)
    {
        $this->googleClientService = $googleClientService;
    }


    public function upload(Request $request)
    {
        $image = $request->file('image');
        $client = $this->googleClientService->getClient();
        $driveService = new \Google_Service_Drive($client);

        $fileMetadata = new \Google_Service_Drive_DriveFile([
            'name' => time().'.'.$image->getClientOriginalExtension(),
            'parents' => self::FOLDER_ID
        ]);

        $file = $driveService->files->create($fileMetadata, [
            'data' => file_get_contents($image->getRealPath()),
            'uploadType' => 'multipart',
            'fields' => 'id'
        ]);

        $driveService->getClient()->setUseBatch(true);

        $batch = $driveService->createBatch();
        $userPermission = new \Google_Service_Drive_Permission([
            'type' => 'anyone',
            'role' => 'reader',
        ]);

        $request = $driveService->permissions->create($file->id, $userPermission, ['fields' => 'id']);
        $batch->add($request, 'user');
        $results = $batch->execute();

        dd(self::URl.$file->id);

        return redirect('/');
    }

    public function folder ()
    {
        $client = $this->googleClientService->getClient();
        $driveService = new \Google_Service_Drive($client);

        $fileMetadata = new \Google_Service_Drive_DriveFile([
            'name' => 'dethi',
            'mimeType' => 'application/vnd.google-apps.folder'
        ]);

        $file = $driveService->files->create($fileMetadata, [
            'fields' => 'id',
        ]);

        $driveService->getClient()->setUseBatch(true);

        $batch = $driveService->createBatch();
        $userPermission = new \Google_Service_Drive_Permission([
            'type' => 'anyone',
            'role' => 'reader',
        ]);

        $request = $driveService->permissions->create($file->id, $userPermission, ['fields' => 'id']);
        $batch->add($request, 'user');
        $results = $batch->execute();

        dd("Folder ID:" . $file->id);
    }
}
