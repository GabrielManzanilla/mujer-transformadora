<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Persona;
use App\Models\DatosFiscales;
use PhpParser\Node\Stmt\ElseIf_;
class FileController extends Controller
{
    //
    protected function getPath($usuarioId, $typefile, $personaId=null, $inscripcion_id=null)
    {
        if ($personaId) {
            $persona = Persona::where('pk_persona_id', $personaId)
                ->where('fk_user_id', $usuarioId)
                ->firstOrFail();
            $campoArchivo = match ($typefile) {
                'acta_nacimiento' => $persona->path_acta_nacimiento,
                'curp_file' => $persona->path_curp,
                'comprobante_domicilio' => $persona->path_comprobante_domicilio,
                'ine' => $persona->path_identificacion,
                'foto_perfil' => $persona->path_foto_perfil,
                default => abort(404, 'Tipo de archivo no válido'),
            };
        }
        if ($inscripcion_id) {
            $inscripcion = DatosFiscales::where('pk_inscripcion_id', $inscripcion_id)
                ->where('fk_user_id', $usuarioId)
                ->firstOrFail();
            $campoArchivo = match ($typefile) {
                //Aqui iran los campos de la tabla de inscripciones

                default => abort(404, 'Tipo de archivo no válido'),
            };
        }
        return $campoArchivo;
    }

    public function storeFile(Request $request, $key, $table, $user_id, $inscripcion_id = null)
    {
        if ($request->hasFile($key)) {
            $file = $request->file($key);

            $folder = match ($table) {
                'usuarios' => 'usuarios/' . $user_id,
                'inscripciones' => 'usuarios/' . $user_id . '/inscripciones/' . $inscripcion_id,
            };

            if (is_array($file)) { // Confirmacion de si el archivo es un array y si es asi extrae el primero 
                $file = $file[0];
            }
            $path = $file->store($folder, 'local');
            return $path;
        }
        return null;
    }


    public function showFile($typefile, $personaId = null, $inscripcion_id = null)
    {
        $usuarioId = auth()->id();

        $campoArchivo = $this->getPath($usuarioId, $typefile, $personaId, $inscripcion_id);


        if (!$campoArchivo || !\Storage::disk('local')->exists($campoArchivo)) {
            abort(404, 'Archivo no encontrado.');
        }

        $pathCompleto = Storage::disk('local')->path($campoArchivo);

        return response()->file($pathCompleto);
    }

    public function editFile(Request $request, $typefile, $personaId = null, $inscripcion_id = null)
    {
        $usuarioId = auth()->id();
        $campoArchivo = $this->getPath($usuarioId, $typefile, $personaId, $inscripcion_id);

        if ($request->hasFile($typefile)) {
            $file = $request->file($typefile);
            if (is_array($file)) { // Confirmacion de si el archivo es un array y si es asi extrae el primero 
                $file = $file[0];
            }
            Storage::disk('local')->delete($campoArchivo);
            $newPathFile=$this->storeFile($request, $typefile, 'usuarios', $usuarioId, $inscripcion_id??null);
            return $newPathFile;
        }

        return null;
    }
}