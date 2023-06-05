<?php

namespace App\Http\Controllers;

use App\Models\FileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function fileView(){
        //
    }

    public function fileDelete($id){
        $file = FileModel::where('id',$id)->first();
        $path = $file->file_path;
        // delete from storage area
        Storage::delete($path);
        $file->delete();  
        return redirect()->back()->with('success', 'Dosya silindi.');
    }
    public function fileDownload($id){
        $file = FileModel::find($id);
        $filePath = $file->file_path;
        //dd(public_path($filePath)); 
        return response()->download($filePath);
    }
}
