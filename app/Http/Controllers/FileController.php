<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;

class FileController extends Controller
{
    public function downloadPDF()
    {
        try {
            return Storage::disk('local')->download('public/pdf/PAGUYUBAN.pdf');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function upload(Request $request){
        try {
            $file = $request->file('pdf');
            $size = $file->getClientSize();
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $time = time();

            $newFile = $time . '-' . $name ;
            $path = $request->file('pdf')->storeAs('public/pdf', $newFile);

            $data = [
                'path' => $path,
                'size' => $size
            ];

            return File::create($data);
        } 
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    

}
