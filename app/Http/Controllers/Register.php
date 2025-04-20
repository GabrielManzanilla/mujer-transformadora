<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

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
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("registro");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validate = $request ->Validator::request([
            //DATOS PERSONALES
            'nombres_usuario' => ' | string | max:50',
            'apellidos_paterno' => ' | string | max:50',
            'apellidos_materno' => ' | string | max:50',
            'curp_usuario'=> ' | string | max:18',
            'municipio_nacimiento' => ' | string',
            'estado_nacimiento' => ' | string',
            'fecha_nacimiento' => ' | date',
            'email_usuario' => '|email',
            'telefono_usuario' => ' | string | max:10', 
            'estado_perfil_usuario' => ' | string',
            'estado_candidato' => ' | string',

            //DATOS FISCALES
            'actividad_economica' => ' | string',
            'regimen_fiscal' => ' | string',
            'nombre_comercial' => ' | string | max:50',
            'tiempo_ejerciendo' => ' | date',
            'registro_imss' => ' | string | max:11',
            'registro_affy' => ' | string | max:11',
            'rfc_usuario' => ' | string | max:13',
            'razon_social' => ' | string | max:50',
            'numero_empleados' => 'requiered| integer',
            'registro_impi' => ' | string | max:11',
            // -- falta la tabla de registros adicionales --
            'registros_json' => '',

            //DOMICILIOS
            'domicilios_json' => '',

            //PRODUCTOS Y VENTAS
            'productos_json'=>'',

            //MEDIOS DIGITALES
            'facebook_usuario' => ' | string | max:50',
            'facebook_empresarial' => ' | string | max:50',
            'facebook_marketplace' => ' | string | max:50',
            'pagina_web' => ' | string | max:100',
            'whatsapp_empresarial' => ' | string | max:10',
            'mercado_libre' => ' | string | max:50',
            'mercado_pago' => ' | string | max:50',
            //tabla medios digitales adiconales
            'medios_digitales_json' => '',

            //DOCUMENTOS
            'ine_file' => ' | file | mimes:pdf,jpg,jpeg,png',
            'acta_nacimiento_file'=> ' | file | mimes:pdf,jpg,jpeg,png',
            'comprobante_domicilio_file' => ' | file | mimes:pdf,jpg,jpeg,png',
            'cif_file'=> ' | file | mimes:pdf,jpg,jpeg,png',
            'affy_file' => ' | file | mimes:pdf,jpg,jpeg,png',
            'impi_file' => ' | file | mimes:pdf,jpg,jpeg,png',
            'imss_file' => ' | file | mimes:pdf,jpg,jpeg,png',
            // -- tabla de documentos adicionales --  
            'documentos_adicionales_json' => ''          
        ]);
        dd($validate);

        DB:: transaction(function () use ($validate) {

            //Creacion de tabla persona
            $persona = Persona::create([
                'str_curp' => $validate['curp_usuario'],
                'str_nombre' => $validate['nombres_usuario'],
                'str_apellido_paterno' => $validate['apellidos_paterno'],
                'str_apellido_materno' => $validate['apellidos_materno'],
                'dt_fecha_nacimiento' => $validate['fecha_nacimiento'],
                'str_estado_nacimiento' => $validate['estado_nacimiento'],
                'str_municipio_nacimiento' => $validate['municipio_nacimiento'],
                'str_sexo' => $validate['sexo_usuario'],
                'bl_mayahablante' => $validate['mayahablante_usuario'],
                'str_ine' => $validate['ine_usuario'],
                'str_correo_electronico' => $validate['email_usuario'],
                'str_tel_celular' => $validate['telefono_usuario'],
                'estado_perfil' => $validate['estado_perfil_usuario'],
                
            ]);

            // $dato_fiscal = $persona-> dato_fiscal() -> create([
            //     'str_razon_social' => $validate['razon_social'],
            //     'str_nombre_comercial' => $validate['nombre_comercial'],
            //     'int_tiempo_ejerciendo' => $validate['tiempo_ejerciendo'],
            //     'str_rfc' => $validate['rfc_usuario'],
            //     //'fk_regimen_id' => $validate['regimen_fiscal'],
            //     'str_clave_impi' => $validate['registro_impi'],
            //     'str_clvae_affy' => $validate['registro_affy'],
            //     'str_clave_imss' => $validate['registro_imss'],
            //     //'fk_actividad_economica_id' => $validate['actividad_economica'],
            //     'int_num_empleados' => $validate['numero_empleados'],
            // ]);

            // //Añadir registros adiconales
            // $registros_adicionales = json_decode($validate['registros_json'], true);
            // foreach( $registros_adicionales as $registro ) {
            //     $dato_fiscal ->adicional()->create([
            //         'str_nombre_registro_adicional' => $registro[0],
            //         'str_clave_registro_adicional'=> $registro[1],
            //     ]);
            // }

            // //Añador informacion de domicilio
            // $domicilios = json_decode($validate['domicilios_json'], true);
            // foreach($domicilios as $domicilio){
            //     $domicilio_unitario = $dato_fiscal -> domicilio() -> create([
            //         'str_direccion' => $domicilio[0],
            //         'str_estado' => $domicilio[1],
            //         'str_municipio' => $domicilio[2],
            //         'str_localidad' => $domicilio[3]
            //     ]);
            // }

            // $productos_ventas = json_decode($validate['productos_json'], true);
            // foreach( $productos_ventas as $producto ) {
            //     $producto_ventas = $dato_fiscal -> productos_ventas() -> create([
            //         'str_nombre_producto' => $producto[0],
            //         'str_descripcion_producto' => $producto[1],
            //         'int_produccion_mensual' => $producto[2],
            //         'int_venta_mensual' => $producto[3],
            //         'int_venta_anual' => $producto[4]
            //     ]);
            // }

            // //Creacion de tabla redes sociales
            // $red_social = $dato_fiscal -> red_social() -> create([
            //     'str_facebook' => $validate['facebook_usuario'],
            //     'str_facebook_empresarial' => $validate['facebook_empresarial'],
            //     'str_facebook_marketplace' => $validate['facebook_marketplace'],
            //     'str_pagina_web' => $validate['pagina_web'],
            //     'str_whatsapp_bussines' => $validate['whatsapp_empresarial'],
            //     'str_mercado_libre' => $validate['mercado_libre'],
            //     'str_mercado_pago' => $validate['mercado_pago'],
            // ]);

            // $red_adicional = json_decode($validate['medios_digitales_json'], true);
            // foreach( $red_adicional as $red_social){
            //     $red_social_adicional = $dato_fiscal -> redes_adicionales() -> create([
            //         'str_nombre_red_social' => $red_social[0],
            //         'str_nombre_perfil' => $red_social[1]
            //     ]);
            // }
        });
        return redirect('/');
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
