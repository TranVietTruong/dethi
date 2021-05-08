<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DriveController extends Controller
{
    public function index(Request $request)
    {
        $image = $request->file('image');
        $data = file_get_contents($image->getRealPath());
        $name = time().'.'.$image->getClientOriginalExtension();
        $file = Storage::disk('google')->put($name, $data, 'public');
        dd($file);
    }

    public function list()
    {
        $list = collect(Storage::disk('google')->listContents('/',false));
//        $url = Storage::disk('google')->url('10libnzsNHOHoPi0HOD4RgewuNP9eHe0-');
        dd($list);
    }
}
