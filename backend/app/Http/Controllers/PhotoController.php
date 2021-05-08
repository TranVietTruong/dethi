<?php

namespace App\Http\Controllers;

use App\Services\Google\GoogleClientService;
use Google_Service_PhotosLibrary_Album;
use Google_Service_PhotosLibrary_BatchCreateMediaItemsRequest;
use Google_Service_PhotosLibrary_CreateAlbumRequest;
use Google_Service_PhotosLibrary_MediaMetadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public $googleClientService;

    public function __construct(GoogleClientService $googleClientService)
    {
        $this->googleClientService = $googleClientService;
    }

    public function album()
    {
        $client = $this->googleClientService->getClient();
        $photoService = new \Google_Service_PhotosLibrary($client);

        $album = new \Google_Service_PhotosLibrary_Album();
        $album->setTitle('hello');

        $albumRequest = new \Google_Service_PhotosLibrary_CreateAlbumRequest();
        $albumRequest->setAlbum($album);

        $result = $photoService->albums->create($albumRequest);
        dd($result);
        dd("ok");
    }

    public function changeAlbumTitle()
    {
//        $image = Storage::disk('local')->get('test.jpg');
        $albumId = 'AL_a4JEN2EDQgLbYmfSJqaeq1XTTgErw_5ipM-7wqfJ7wTopf7Pcm4UHTJp_qlglZLqQZssudu9v';
        $client = $this->googleClientService->getClient();
        $photoService = new \Google_Service_PhotosLibrary($client);

        $album = $photoService->albums->get($albumId);
        dd($album);
    }

    public function upload(Request $request)
    {

    }

}
