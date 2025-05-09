<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Persona;
class FileController extends Controller
{
    //


    public function storeFile(Request $request, $key, $table, $user_id, $inscripcion_id = null){
        if($request->hasFile($key)){
            $file = $request->file($key);
            
            $folder = match($table){
                'usuarios' => 'usuarios/'.$user_id,
                'inscripciones' => 'usuarios/'.$user_id.'/inscripciones/'.$inscripcion_id,
            };

            if (is_array($file)) { // Confirmacion de si el archivo es un array y si es asi extrae el primero 
                $file = $file[0]; 
            }
            $path = $file->store($folder, 'local');
            return $path;
        }
        return null;
    }


    public function showFile($personaId, $typefile)
    {
        $usuarioId = auth()->id();

        $persona = Persona::where('pk_persona_id', $personaId)
            ->where('fk_user_id', $usuarioId)
            ->firstOrFail();

        $campoArchivo = match ($typefile) {
            'acta_nacimiento' => $persona->path_acta_nacimiento,
            'curp_file' => $persona->path_curp,
            'comprobante_domicilio' => $persona->path_comprobante_domicilio,
            'ine' => $persona->path_comprobante_domicilio,
            default => abort(404, 'Tipo de archivo no válido'),
        };

        if (!$campoArchivo || !\Storage::disk('local')->exists($campoArchivo)) {
            abort(404, 'Archivo no encontrado.');
        }

        $pathCompleto = Storage::disk('local')->path($campoArchivo);
        return response()->file($pathCompleto);
    }

    public function editFile($personaId, $typefile, Request $request){
        
    }
}
