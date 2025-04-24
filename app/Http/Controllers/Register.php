<?php

namespace App\Http\Controllers;
use App\Models\DatosFiscales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

//importacion de models
use App\Models\Persona;

class Register extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $registros = DatosFiscales::all();
        return view("registro.index", compact("registros"));
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
            // DATOS PERSONALES
            'nombres_usuario' => 'nullable | string|max:50',
            'apellido_paterno' => 'nullable | string|max:50',
            'apellido_materno' => 'nullable | string|max:50',
            'curp_usuario' => 'nullable | string|max:18',
            'municipio_nacimiento' => 'nullable | string',
            'estado_nacimiento' => 'nullable | string',
            'fecha_nacimiento' => 'nullable | date',
            'sexo_usuario' => 'nullable | string',
            'mayahablante' => 'nullable | boolean',
            'email_usuario' => 'nullable | email',
            'telefono_usuario' => 'nullable | string|max:10',
            'estado_perfil_usuario' => 'nullable | string',
            'estado_candidato' => 'nullable | string',

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
            'productos_json'=>'nullable | json',

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

        if ($validate->fails()) {
            dd($validate->errors());
            //return redirect()->back()->with('message', 'Debes completar todos los campos');
        } else {
            $validate = $validate->validated();
            DB::transaction(function () use ($validate) {
                $persona = Persona::create([
                    'str_curp' => $validate['curp_usuario'],
                    'str_nombre' => $validate['nombres_usuario'],
                    'str_apellido_paterno' => $validate['apellido_paterno'],
                    'str_apellido_materno' => $validate['apellido_materno'],
                    'dt_fecha_nacimiento' => $validate['fecha_nacimiento'],
                    'str_estado_nacimiento' => $validate['estado_nacimiento'],
                    'str_municipio_nacimiento' => $validate['municipio_nacimiento'],
                    'str_sexo' => $validate['sexo_usuario'],
                    'bl_mayahablante' => $validate['mayahablante'],
                    'str_correo_electronico' => $validate['email_usuario'],
                    'str_tel_celular' => $validate['telefono_usuario'],
                    'estado_perfil_usuario' => $validate['estado_perfil_usuario'],
                    'estado_candidato' => $validate['estado_candidato'],
                ]);



                $dato_fiscal = $persona->dato_fiscal()->create([
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

                if($validate['registros_adicionales'] != null){
                    //Añadir registros adiconales
                    $registros_adicionales = json_decode($validate['registros_adicionales'], true);
                    foreach ($registros_adicionales as $registro) {
                        $dato_fiscal->adicional()->create([
                            'str_nombre_registro_adicional' => $registro[0],
                            'str_clave_registro_adicional' => $registro[1],
                        ]);
                    }
                }
                    

                // Añador informacion de domicilio
                $domicilios = json_decode($validate['domicilios_json'], true);
                foreach($domicilios as $domicilio){
                    $domicilio_unitario = $dato_fiscal -> domicilio() -> create([
                        'str_direccion' => $domicilio[0],
                        'str_estado' => $domicilio[1],
                        'str_municipio' => $domicilio[2],
                        'str_localidad' => $domicilio[3]
                    ]);
                }


                // Añacion de productos y ventas
                $productos_ventas = json_decode($validate['productos_json'], true);
                foreach( $productos_ventas as $producto ) {
                    $producto_ventas = $dato_fiscal -> productos_ventas() -> create([
                        'str_nombre_producto' => $producto[0],
                        'str_descripcion_producto' => $producto[1],
                        'int_produccion_mensual' => $producto[2],
                        'int_venta_mensual' => $producto[3],
                        'int_venta_anual' => $producto[4]
                    ]);
                }

                //Creacion de tabla redes sociales
                $red_social = $dato_fiscal -> red_social() -> create([
                    'str_facebook' => $validate['facebook_usuario'],
                    'str_facebook_empresarial' => $validate['facebook_empresarial'],
                    'str_facebook_marketplace' => $validate['facebook_marketplace'],
                    'str_pagina_web' => $validate['pagina_web'],
                    'str_whatsapp_bussines' => $validate['whatsapp_empresarial'],
                    'str_mercado_libre' => $validate['mercado_libre'],
                    'str_mercado_pago' => $validate['mercado_pago'],
                ]);

                if ($validate['medios_digitales_json'] != null) {
                    $red_adicional = json_decode($validate['medios_digitales_json'], true);
                    foreach( $red_adicional as $red_social_adicional){
                        $red_social_adicional = $red_social -> redes_adicionales() -> create([
                            'str_nombre_red_social' => $red_social_adicional[0],
                            'str_nombre_perfil' => $red_social_adicional[1]
                        ]);
                    }
                }
            });
            return redirect()->route('register.create');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
