<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store (Request $request){

        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000,1000);
        $path = public_path('uploads');

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;

        $imagenServidor ->save($imagenPath);


        return response()->json(['imagen' => $nombreImagen]);
    }
}
