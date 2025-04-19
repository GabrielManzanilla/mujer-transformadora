<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $validate = $request ->validate([
            //DATOS PERSONALES
            'nombres_usuario' => 'required | string | max:50',
            'apellidos_paterno' => 'required | string | max:50',
            'apellidos_materno' => 'required | string | max:50',
            'curp_usuario'=> 'required | string | max:18',
            'municipio_nacimiento' => 'required | string',
            'estado_nacimiento' => 'required | string',
            'fecha_nacimiento' => 'required | date',
            'email_usuario' => 'required|email',
            'telefono_usuario' => 'required | string | max:10', 
            'estado_perfil_usuario' => 'required | string',
            'estado_candidato' => 'required | string',

            //DATOS FISCALES
            'actividad_economica' => 'required | string',
            'regimen_fiscal' => 'required | string',
            'nombre_comercial' => 'required | string | max:50',
            'tiempo_ejerciendo' => 'required | date',
            'registro_imss' => 'required | string | max:11',
            'registro_affy' => 'required | string | max:11',
            'rfc_usuario' => 'required | string | max:13',
            'razon_social' => 'required | string | max:50',
            'numero_empleados' => 'requiered| integer',
            'registro_impi' => 'required | string | max:11',
            // -- falta la tabla de registros adicionales --

            //DOMICILIOS
            // --falta la tabla de domicilios --

            //PRODUCTOS Y VENTAS
            // --falta la tabla de productos y ventas --

            //MEDIOS ADICIONALES
            'facebook_usuario' => 'required | string | max:50',
            'facebook_empresarial' => 'required | string | max:50',
            'facebook_marketplace' => 'required | string | max:50',
            'pagina_web' => 'required | string | max:100',
            'whatsapp_empresarial' => 'required | string | max:10',
            'mercado_libre' => 'required | string | max:50',
            'mercado_pago' => 'required | string | max:50',

            //DOCUMENTOS
            'ine_file' => 'required | file | mimes:pdf,jpg,jpeg,png',
            'acta_nacimiento_file'=> 'required | file | mimes:pdf,jpg,jpeg,png',
            'comprobante_domicilio_file' => 'required | file | mimes:pdf,jpg,jpeg,png',
            'cif_file'=> 'required | file | mimes:pdf,jpg,jpeg,png',
            'affy_file' => 'required | file | mimes:pdf,jpg,jpeg,png',
            'impi_file' => 'required | file | mimes:pdf,jpg,jpeg,png',
            'imss_file' => 'required | file | mimes:pdf,jpg,jpeg,png'
            // -- falta la tabla de documentos adicionales --            
        ]);

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

            $dato_fiscal = $persona-> dato_fiscal() -> create([
                'str_razon_social' => $validate['razon_social'],
                'str_nombre_comercial' => $validate['nombre_comercial'],
                'int_tiempo_ejerciendo' => $validate['tiempo_ejerciendo'],
                'str_rfc' => $validate['rfc_usuario'],
                //'fk_regimen_id' => $validate['regimen_fiscal'],
                'str_clave_impi' => $validate['registro_impi'],
                'str_clvae_affy' => $validate['registro_affy'],
                'str_clave_imss' => $validate['registro_imss'],
                //'fk_actividad_economica_id' => $validate['actividad_economica'],
                'int_num_empleados' => $validate['numero_empleados'],
            ]);

            foreach($validate['domicilios'] as $domicilio){
                $domicilio = $dato_fiscal -> domicilio() -> create([
                    'str_direccion' => $validate['direccion_domicilio'],
                    'str_estado' => $validate['estado_domicilio'],
                    'str_municipio' => $validate['municipio_domicilio'],
                    'str_localidad' => $validate['localidad_domicilio'],
                ]);
            }
            foreach($validate['registros_adicionales'] as $registro){
                $registro = $dato_fiscal -> registro_adicional() -> create([
                    'str_nombre_registro_adicional' => $validate['nombre_registro_adicional'],
                    'str_clave_registro_adicional' => $validate['clave_registro_adicional'],
                ]);
            }

            $productos_ventas = $dato_fiscal -> productos_ventas() -> create([
                'str_nombre_producto' => $validate['nombre_producto'],
                'str_descripcion_producto' => $validate['descripcion_producto'],
                'int_produccion_mensual' => $validate['produccion_mensual'],
                'int_venta_mensual' => $validate['venta_mensual'],
                'int_venta_anual' => $validate['venta_anual']
            ]);

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

            foreach($validate['redes_adicionales'] as $red_social){
                $red_social = $dato_fiscal -> redes_adicionales() -> create([
                    'str_nombre_red_social' => $validate['nombre_red_social'],
                    'str_nombre_perfil' => $validate['nombre_perfil'],
                ]);
            }

        });

        
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
