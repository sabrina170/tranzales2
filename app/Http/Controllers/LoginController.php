<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Database\Seeders\RoleSeeder;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        // //falta valiaar datos que sean verdaderos
        // $user = $request->validated();
        // // $info = Info::create($datos);
        // $user = new User();

        // $user->tipo_dni = $request->tipo_dni;
        // $user->dni = $request->dni;
        // $user->apellido_pa = $request->apellido_pa;
        // $user->apellido_ma = $request->apellido_ma;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->celular = $request->celular;
        // $user->password = Hash::make($request->password);
        // $user->estado = '1';
        // // $user->ku = date("Ymd-His");
        // /****************
        // para los postulantes
        // - tipo 1 = admin
        // - tipo 2 = postulantea
        //  * ************/

        // $user->tipo = 2;
        // $user->save();
        // Auth::login($user);

        // //return redirect(route('login'));
        // return 1;
    }

    public function login(Request $request)
    {
        //validacion

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
            // "active" =>true
        ];

        // $tipo = $request->tipo;

        $remember = ($request->has('remenber') ? true : false);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $estado = Auth::user()->estado;
            $id_user = Auth::user()->id;

            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.solicitudes.index');
            } else if (Auth::user()->hasRole('operario')) {
                return redirect()->route('admin.solicitudes.index');
            } else if (Auth::user()->hasRole('gestion')) {
                return redirect()->route('admin.solicitudes.index');
            } else {
                return redirect()->route('admin.solicitudes.index');
            }



            // else if ($estado == 2) {
            //     return redirect()->intended('privada');
            // } else if ($estado == 22) {
            //     return redirect()->intended('entrevista');
            // } else if ($estado == 3) {
            //     return redirect()->intended('entrevista');
            // } else if ($estado == 4) {
            //     return redirect()->route('documentos.index', $id_user);
            // } else if ($estado == 5) {
            //     return redirect()->intended('misdocumentospos');
            // } else if ($estado == 6) {
            //     return redirect()->intended('finalizado');
            // }

        } else {
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        //cerrar session o limpiar session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
