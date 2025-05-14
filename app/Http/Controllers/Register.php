<?php

namespace App\Http\Controllers;
use App\Models\DatosFiscales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

//importacion de models
use App\Models\Persona;

class Register extends Controller
{
    protected function decodeJson($json, $relation, $structure, $update=false){
        $items = json_decode($json, true);
        if ($update == true){
            $relation->delete();
        }
        $size = count($structure);
        foreach ($items as $item) {
            $data = [];
            for ($i = 0; $i < $size; $i++) {
                $data[$structure[$i]] = $item[$i];
            }
            $tabla = $relation->create($data);
        }
    }
    /**
     * Display a listing of the resource.
     */
    protected function transformCollection($collection, array $fields)
    {
        if (!$collection) {
            return [];
        }

        return $collection->map(function ($item) use ($fields) {
            return array_map(fn($field) => $item->$field, $fields);
        })->toArray();
    }


    public function index()
    {
        //
        $user = Auth::user();
        $registros = $user->dato_fiscal;
        return view('registro.index', ['registros' => $registros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("registro.registro");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validate = Validator::make($request->all(), [

            //DATOS FISCALES
            'actividad_economica' => ' nullable| string',
            'regimen_fiscal' => 'nullable | string',
            'nombre_comercial' => 'nullable | string | max:50',
            'tiempo_ejerciendo' => 'nullable | date',
            'registro_imss' => 'nullable | string | max:11',
            'registro_affy' => 'nullable | string | max:11',
            'rfc_usuario' => 'nullable | string | max:13',
            'razon_social' => ' nullable| string | max:50',
            'numero_empleados' => '| integer',
            'registro_impi' => 'nullable | string | max:11',

            'registros_adicionales' => 'nullable| json',

            //DOMICILIOS
            'domicilios_json' => 'nullable | json',

            // //PRODUCTOS Y VENTAS
            'productos_json' => 'nullable | json',

            //MEDIOS DIGITALES
            'facebook_usuario' => ' nullable| string | max:50',
            'facebook_empresarial' => 'nullable | string | max:50',
            'facebook_marketplace' => ' nullable| string | max:50',
            'pagina_web' => 'nullable | string | max:100',
            'whatsapp_empresarial' => 'nullable | string | max:10',
            'mercado_libre' => 'nullable | string | max:50',
            'mercado_pago' => 'nullable | string | max:50',
            //tabla medios digitales adiconales
            'medios_digitales_json' => 'nullable | json',

            // //DOCUMENTOS
            'cif_file'=> 'nullable | file | mimes:pdf,jpg,jpeg,png',
            'affy_file' => 'nullable | file | mimes:pdf,jpg,jpeg,png',
            'impi_file' => 'nullable | file | mimes:pdf,jpg,jpeg,png',
            'imss_file' => 'nullable | file | mimes:pdf,jpg,jpeg,png',
            // // -- tabla de documentos adicionales --
            // 'documentos_adicionales_json' => 'nullable | json'
        ]);

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        } else {
            $validate = $validate->validated();
            DB::transaction(function () use ($validate) {


                $user = Auth::user();

                $dato_fiscal = $user->dato_fiscal()->create([
                    'str_razon_social' => $validate['razon_social'],
                    'str_nombre_comercial' => $validate['nombre_comercial'],
                    'dt_tiempo_ejerciendo' => $validate['tiempo_ejerciendo'],
                    'str_rfc' => $validate['rfc_usuario'],
                    //'fk_regimen_id' => $validate['regimen_fiscal'],
                    'str_clave_impi' => $validate['registro_impi'],
                    'str_clave_affy' => $validate['registro_affy'],
                    'str_clave_imss' => $validate['registro_imss'],
                    //'fk_actividad_economica_id' => $validate['actividad_economica'],
                    'int_num_empleados' => $validate['numero_empleados'],
                ]);

                if (!empty($validate['registros_adicionales'])) {
                    //Añadir registros adiconales
                    $registros_adicionales = json_decode($validate['registros_adicionales'], true);
                    
                    // Verificar que se decodificó correctamente como un array
                    if (is_array($registros_adicionales) && !empty($registros_adicionales)) {
                        foreach ($registros_adicionales as $registro) {
                            $dato_fiscal->adicional()->create([
                                'str_nombre_registro_adicional' => $registro[0],
                                'str_clave_registro_adicional' => $registro[1],
                            ]);
                        }
                    }
                }


                // Añador informacion de domicilio
                $domicilios = json_decode($validate['domicilios_json'], true);
                foreach ($domicilios as $domicilio) {
                    $domicilio_unitario = $dato_fiscal->domicilio()->create([
                        'str_direccion' => $domicilio[0],
                        'str_estado' => $domicilio[1],
                        'str_municipio' => $domicilio[2],
                        'str_localidad' => $domicilio[3]
                    ]);
                }


                // Añacion de productos y ventas
                $productos_ventas = json_decode($validate['productos_json'], true);
                foreach ($productos_ventas as $producto) {
                    $producto_ventas = $dato_fiscal->productos_ventas()->create([
                        'str_nombre_producto' => $producto[0],
                        'str_descripcion_producto' => $producto[1],
                        'int_produccion_mensual' => $producto[2],
                        'int_venta_mensual' => $producto[3],
                        'int_venta_anual' => $producto[4]
                    ]);
                }

                //Creacion de tabla redes sociales
                $red_social = $dato_fiscal->red_social()->create([
                    'str_facebook' => $validate['facebook_usuario'],
                    'str_facebook_empresarial' => $validate['facebook_empresarial'],
                    'str_facebook_marketplace' => $validate['facebook_marketplace'],
                    'str_pagina_web' => $validate['pagina_web'],
                    'str_whatsapp_bussines' => $validate['whatsapp_empresarial'],
                    'str_mercado_libre' => $validate['mercado_libre'],
                    'str_mercado_pago' => $validate['mercado_pago'],
                ]);

                if (!empty($validate['medios_digitales_json'])) {
                    $red_adicional = json_decode($validate['medios_digitales_json'], true);
                    if (is_array($red_adicional) && !empty($registros_adicionales)) {
                        foreach ($red_adicional as $red_social_adicional) {
                            $red_social_adicional = $red_social->redes_adicionales()->create([
                                'str_nombre_red_social' => $red_social_adicional[0],
                                'str_nombre_perfil' => $red_social_adicional[1]
                            ]);
                        }
                    }
                    
                }
                // try{
                //     $fileController = app(FileController::class);
    
                //     $cif_filPath= $fileController->storeFile($validate, 'cif_file', 'inscripciones', $user->id);
                //     $affy_filePath= $fileController->storeFile($validate, 'affy_file', 'inscripciones', $user->id);
                //     $impi_filePath= $fileController->storeFile($validate, 'impi_file', 'inscripciones', $user->id);
                //     $imss_filePath= $fileController->storeFile($validate, 'imss_file', 'inscripciones', $user->id);
                // } catch (\Exception $e) {
                //     dd($e);
                // };

                // $documentos= $dato_fiscal->domumentos()->create([
                //     "path_impi" => $impi_filePath,
                //     "path_imss"=> $imss_filePath,
                //     "path_affy" => $affy_filePath,
                //     "path_cif" => $cif_filPath,
                // ]);
            });


            return redirect()->route('list.registers');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $datosFiscales = DatosFiscales::with(['red_social', 'domicilio', 'productos_ventas'])->findOrFail($id);
        return view('registro.show', [
            'datosFiscales' => $datosFiscales,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datosFiscales = DatosFiscales::with(['red_social.redes_adicionales', 'adicional', 'domicilio', 'productos_ventas'])->findOrFail($id);

        $redesSociales = $datosFiscales->red_social;

        $registrosAdicionales = $datosFiscales->adicional ? $this->transformCollection($datosFiscales->adicional, [
            'str_nombre_registro_adicional',
            'str_clave_registro_adicional',
        ]) : null;

        $domicilios = $this->transformCollection($datosFiscales->domicilio, [
            'str_direccion',
            'str_estado',
            'str_municipio',
            'str_localidad',
        ]);

        $productos = $this->transformCollection($datosFiscales->productos_ventas, [
            'str_nombre_producto',
            'str_descripcion_producto',
            'int_produccion_mensual',
            'int_venta_mensual',
            'int_venta_anual',
        ]);

        if ($redesSociales && $redesSociales->redes_adicionales && $redesSociales->redes_adicionales->count()) {
            $mediosDigitales = $this->transformCollection($redesSociales->redes_adicionales, [
                'str_nombre_red_social',
                'str_nombre_perfil',
            ]);
        }

        return view('registro.registro', [
            'datosFiscales' => $datosFiscales,
            'redesSociales' => $redesSociales,
            'registrosAdicionales' => $registrosAdicionales,
            'domicilios' => $domicilios,
            'productos' => $productos,
            'mediosDigitales' => $mediosDigitales?? [],
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate([

            //DATOS FISCALES
            'actividad_economica' => ' nullable| string',
            'regimen_fiscal' => 'nullable | string',
            'nombre_comercial' => 'nullable | string | max:50',
            'tiempo_ejerciendo' => 'nullable | date',
            'registro_imss' => 'nullable | string | max:11',
            'registro_affy' => 'nullable | string | max:11',
            'rfc_usuario' => 'nullable | string | max:13',
            'razon_social' => ' nullable| string | max:50',
            'numero_empleados' => '| integer',
            'registro_impi' => 'nullable | string | max:11',

            'registros_adicionales' => 'nullable| json',

            //DOMICILIOS
            'domicilios_json' => 'nullable | json',

            // //PRODUCTOS Y VENTAS
            'productos_json' => 'nullable | json',

            //MEDIOS DIGITALES
            'facebook_usuario' => ' nullable| string | max:50',
            'facebook_empresarial' => 'nullable | string | max:50',
            'facebook_marketplace' => ' nullable| string | max:50',
            'pagina_web' => 'nullable | string | max:100',
            'whatsapp_empresarial' => 'nullable | string | max:10',
            'mercado_libre' => 'nullable | string | max:50',
            'mercado_pago' => 'nullable | string | max:50',
            //tabla medios digitales adiconales
            'medios_digitales_json' => 'nullable | json',

            // //DOCUMENTOS
            // 'ine_file' => 'nullable | file | mimes:pdf,jpg,jpeg,png',
            // 'acta_nacimiento_file'=> 'nullable | file | mimes:pdf,jpg,jpeg,png',
            // 'comprobante_domicilio_file' => 'nullable | file | mimes:pdf,jpg,jpeg,png',
            // 'cif_file'=> 'nullable | file | mimes:pdf,jpg,jpeg,png',
            // 'affy_file' => 'nullable | file | mimes:pdf,jpg,jpeg,png',
            // 'impi_file' => 'nullable | file | mimes:pdf,jpg,jpeg,png',
            // 'imss_file' => 'nullable | file | mimes:pdf,jpg,jpeg,png',
            // // -- tabla de documentos adicionales --
            // 'documentos_adicionales_json' => 'nullable | json'
        ]);


        $datosFiscales = DatosFiscales::with(['red_social.redes_adicionales', 'adicional', 'domicilio', 'productos_ventas'])->findOrFail($id);
        $datosFiscales->update([
            'str_razon_social' => $validate['razon_social'],
            'str_nombre_comercial' => $validate['nombre_comercial'],
            'dt_tiempo_ejerciendo' => $validate['tiempo_ejerciendo'],
            'str_rfc' => $validate['rfc_usuario'],
            //'fk_regimen_id' => $validate['regimen_fiscal'],
            'str_clave_impi' => $validate['registro_impi'],
            'str_clave_affy' => $validate['registro_affy'],
            'str_clave_imss' => $validate['registro_imss'],
            //'fk_actividad_economica_id' => $validate['actividad_economica'],
            'int_num_empleados' => $validate['numero_empleados'],
        ]);
        
        if ($validate['registros_adicionales'] != null) {
            $registros_adicionales = json_decode($validate['registros_adicionales'], true);
            $datosFiscales->adicional()->delete();
            foreach ($registros_adicionales as $registro) {
                $datosFiscales->adicional()->create([
                    'str_nombre_registro_adicional' => $registro[0],
                    'str_clave_registro_adicional' => $registro[1],
                ]);
            }
        }

                
        $domicilios = json_decode($validate['domicilios_json'], true);
        $datosFiscales->domicilio()->delete();
        foreach ($domicilios as $domicilio) {
            $datosFiscales->domicilio()->create([
                'str_direccion' => $domicilio[0],
                'str_estado' => $domicilio[1],
                'str_municipio' => $domicilio[2],
                'str_localidad' => $domicilio[3],
            ]);
        }


        $productos_ventas = json_decode($validate['productos_json'], true);
        $datosFiscales->productos_ventas()->delete();
        foreach ($productos_ventas as $producto) {
            $datosFiscales->productos_ventas()->create([
                'str_nombre_producto' => $producto[0],
                'str_descripcion_producto' => $producto[1],
                'int_produccion_mensual' => $producto[2],
                'int_venta_mensual' => $producto[3],
                'int_venta_anual' => $producto[4],
            ]);
        }

        $red_social = $datosFiscales->red_social;
        $datosFiscales->red_social()->delete();
        $red_social = $datosFiscales->red_social()->create([
            'str_facebook' => $validate['facebook_usuario'],
            'str_facebook_empresarial' => $validate['facebook_empresarial'],
            'str_facebook_marketplace' => $validate['facebook_marketplace'],
            'str_pagina_web' => $validate['pagina_web'],
            'str_whatsapp_bussines' => $validate['whatsapp_empresarial'],
            'str_mercado_libre' => $validate['mercado_libre'],
            'str_mercado_pago' => $validate['mercado_pago'],
        ]);

        if ($validate['medios_digitales_json'] != null) {
            $red_social->redes_adicionales()->delete();
            $red_adicional = json_decode($validate['medios_digitales_json'], true);
            foreach ($red_adicional as $red_social_adicional) {
                $red_social->redes_adicionales()->create([
                    'str_nombre_red_social' => $red_social_adicional[0],
                    'str_nombre_perfil' => $red_social_adicional[1]
                ]);
            }
        }
        
        return redirect()->route('list.registers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
