<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); //RUTA POR CAMBIAR PARA USAURIO
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],

            //datos personales
            'nombres' => 'nullable | string|max:50',
            'apellido_paterno' => 'nullable | string|max:50',
            'apellido_materno' => 'nullable | string|max:50',
            'curp' => 'nullable | string|max:18',
            'municipio_nacimiento' => 'nullable | string',
            'estado_nacimiento' => 'nullable | string',
            'fecha_nacimiento' => 'nullable | date',
            'sexo' => 'nullable | string',
            'mayahablante' => 'nullable | boolean',
            'telefono' => 'nullable | string|max:10',

        ]);
        try {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Exception $e) {

        }

        try {
            $fileController = app(FileController::class);

            $actaNacimientoPath = $fileController->storeFile($request, 'acta_nacimiento', 'usuarios', $user->id);
            $curpPath = $fileController->storeFile($request, 'curp_file', 'usuarios', $user->id);
            $comprobanteDomicilioPath = $fileController->storeFile($request, 'comprobante_domicilio', 'usuarios', $user->id);
            $inePath = $fileController->storeFile($request, 'ine', 'usuarios', $user->id);
            $fotoPerfilPath = $fileController->storeFile($request, 'foto_perfil', 'usuarios', $user->id);
        } catch (\Exception $e) {
            dd($e);
        }



        $perfil = $user->perfil()->create([
            'str_nombre' => $request->nombres,
            'str_apellido_paterno' => $request->apellido_paterno,
            'str_apellido_materno' => $request->apellido_materno,
            'str_curp' => $request->curp,
            'str_estado_nacimiento' => $request->estado_nacimiento,
            'str_municipio_nacimiento' => $request->municipio_nacimiento,
            'dt_fecha_nacimiento' => $request->fecha_nacimiento,
            'str_sexo' => $request->sexo,
            'bl_mayahablante' => $request->mayahablante,
            'str_tel_celular' => $request->telefono,
            'path_acta_nacimiento' => $actaNacimientoPath,
            'path_curp' => $curpPath,
            'path_comprobante_domicilio' => $comprobanteDomicilioPath,
            'path_identificacion' => $inePath,
            'path_foto_perfil' => $fotoPerfilPath,

        ]);


        Auth::loginUsingId($user->id);
        return redirect('/'); //RUTA POR CAMBIAR PARA USAURIO
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
