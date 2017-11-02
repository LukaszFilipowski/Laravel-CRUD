<?php
namespace App\Http\Controllers;

class StorageController extends Controller
{
    public function link($folder, $file) 
    {
        $file_path = storage_path().'/app/public/images/'.$folder.'/'.$file;
        if (file_exists($file_path)) {
            return response()->file($file_path);
        }
        
        exit("Nie znaleziono wybranego pliku.");
    }
    
    public function easter() {
        $file_path = storage_path().'/app/public/images/easter.gif';
        if (file_exists($file_path)) {
            return response()->file($file_path);
        }
        
        exit("Nie znaleziono wybranego pliku.");
    }
}
