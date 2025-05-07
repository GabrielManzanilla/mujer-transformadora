<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Persona;
class FileController extends Controller
{
    //
    public function showFile($personaId, $typefile)
    {
        $usuarioId = auth()->id();

        $persona = Persona::where('pk_persona_id', $personaId)
            ->where('fk_user_id', $usuarioId)
            ->firstOrFail();

        $campoArchivo = match ($typefile) {
            'acta' => $persona->path_acta_nacimiento,
            // 'curp' => $persona->path_curp,
            // 'comprobante' => $persona->path_comprobante_domicilio,
            default => abort(404, 'Tipo de archivo no válido'),
        };

        if (!$campoArchivo || !\Storage::disk('local')->exists($campoArchivo)) {
            abort(404, 'Archivo no encontrado.');
        }

        $pathCompleto = Storage::disk('local')->path($campoArchivo);
        return response()->file($pathCompleto);
    }
}
