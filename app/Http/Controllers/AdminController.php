<?php

namespace App\Http\Controllers;

use App\Models\balanza;
use App\Models\Chofere;
use App\Models\Cierre;
use App\Models\Cliente;
use App\Models\combustible;
use App\Models\Destino;
use App\Models\peaje;
use App\Models\planificacione;
use App\Models\Ruta;
use App\Models\Solicitude;
use App\Models\Tarifa;
use App\Models\User;
use App\Models\Vehiculo;
use App\Models\viatico;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Whoops\Run;

class AdminController extends Controller
{
    public function listarsolicitudes()
    {
        $solicitudes = DB::table('solicitudes')->orderBy('id', 'desc')->get();
        $vehiculos = DB::table('vehiculos')->orderBy('id', 'desc')->get();
        $choferes = DB::table('choferes')->where('tipo_cho', 1)->orderBy('id', 'desc')->get();
        $ayudantes = DB::table('choferes')->orderBy('id', 'desc')->get();
        $cierres = DB::table('cierres')->orderBy('id', 'desc')->get();
        $planificaciones = DB::table('planificaciones')->orderBy('id', 'desc')->get();
        $destinos = DB::table('destinos')->orderBy('id', 'desc')->get();

        $combustibles = DB::table('combustibles')->orderBy('id', 'desc')->get();
        $balanzas = DB::table('balanzas')->orderBy('id', 'desc')->get();
        $peajes = DB::table('peajes')->orderBy('id', 'desc')->get();
        $viaticos = DB::table('viaticos')->orderBy('id', 'desc')->get();

        $solicitudes = Solicitude::select(
            "solicitudes.id as id",
            "solicitudes.codigo_solicitud as codigo",
            "solicitudes.fecha_solicitud as fecha",
            "solicitudes.hora as hora",
            "solicitudes.hora_cochera as hora_cochera",
            "solicitudes.cantidad as cantidad",
            "solicitudes.fecha_traslado as fecha_traslado",
            "solicitudes.costo as costo",
            "solicitudes.estado as estado",
            "solicitudes.datos_destinos as destinos",
            "solicitudes.id_plani as id_plani",
            "solicitudes.id_cierre as id_cierre",
            "solicitudes.id_combustible as id_combustible",
            "solicitudes.id_balanza as id_balanza",
            "solicitudes.id_peaje as id_peaje",
            "solicitudes.id_viaticos as id_viaticos",
            "solicitudes.lavado as lavado",
            "solicitudes.comprobante as comprobante",
            "solicitudes.datos_cantidad as datos_cantidad",
            "clientes.nombre as nombre_cli",
            "clientes.referencia as referencia_cli",
            "solicitudes.created_at",
            "datos_destinos"
        )
            ->join("clientes", "clientes.id", "=", "solicitudes.cliente")
            ->orderBy('solicitudes.costo', 'desc')
            ->get();

        return view('admin.solicitudes.index', compact(
            'solicitudes',
            'vehiculos',
            'choferes',
            'planificaciones',
            'ayudantes',
            'destinos',
            'cierres',
            'combustibles',
            'balanzas',
            'peajes',
            'viaticos'
        ));
    }

    public function show_agregar_soli()
    {

        $clientes = DB::table('clientes')->get();
        // $destinos = DB::table('destinos')->get();

        return view('admin.solicitudes.nueva-solicitud', compact('clientes'));
    }

    public function create_crear_soli(Request $request)
    {
        // $datos_cantidad = $request->get('datos_cantidad1');
        // for ($i = 0; $i < count($datos_cantidad); $i++) {
        // }
        $obs = $request->get('observaciones');
        $n_com = $request->get('comprobante');
        if (empty($obs) || empty($n_com)) {
            $observaciones = "";
            $comprobante = "";
        } else {
            $observaciones = $request->get('observaciones');
            $comprobante = $request->get('comprobante');
        }

        $datos_estructura = array(
            'cant1' => $request->get('datos_cantidad1'),
            'cant2' => $request->get('datos_cantidad2'),
            'cant3' => $request->get('datos_cantidad3'),
            'cant4' => $request->get('datos_cantidad4'),
            'sub' => $request->get('subtotal'),
        );
        $data = [
            'codigo_solicitud' => $request->get('codigo_solicitud'),
            'fecha_solicitud' => $request->get('fecha_solicitud'),
            'cliente' => $request->get('idcliente'),
            'fecha_traslado' => $request->get('fecha_traslado'),
            // 'origen' => $request->get('origen'),
            'hora' => $request->get('hora'),
            'hora_cochera' => $request->get('hora_cochera'),
            'cantidad' => $request->get('cantidad'),
            'datos_destinos' => json_encode($request->get('datos_destinos')),
            'datos_cantidad' => json_encode($datos_estructura),
            'observaciones' =>  $observaciones,
            'estado' => 1,
            'costo' => $request->get('costo-soli'),
            'id_plani' => 0,
            'id_cierre' => 0,
            'id_combustible' => 0,
            'id_balanza' => 0,
            'id_peaje' => 0,
            'id_viaticos' => 0,
            'lavado' => $request->get('lavado'),
            'comprobante' => $comprobante
        ];

        // dd($data);
        $soli = Solicitude::create($data);
        $mensaje = "Solicitud Creada";
        return redirect()->route('admin.solicitudes.index')->with(['data' => $mensaje]);
    }

    public function BuscarCosto(Request $request)
    {
        $idcliente = $request->get('idcliente');
        // echo $idcliente;
        $datos_destinos = $request->get('costo_des');
        $cont_lista = $request->get('cont_lista');
        $datos_tarifa  = DB::table('tarifas')->where('id_cliente', $idcliente)->get();
        $filas =  $datos_tarifa->count();


        // $arrr2 = array($datos_destinos);
        // echo  $cont_lista;
        // $arrr1 = count($datos_tarifa);
        // $arrr2 = $arr2->count();

        if ($filas == 0) {
            echo  $mensaje = 1;
        } else {

            foreach ($datos_tarifa as $tar) {


                $arr1 = array(json_decode($tar->destinos));
                $arr2 = array($datos_destinos);
                // echo  $tar->cont_destinos;
                // validar si tiene solo 1 valor
                if ($tar->cont_destinos == $cont_lista) {
                    // 1 = 1
                    sort($arr1);
                    sort($arr2);

                    if ($arr1 == $arr2) {
                        $mensaje = $tar->total;
                    } else {
                        // $mensaje = 1;
                    }
                    // echo 55;
                    // $mensaje = $tar->total;
                } else {
                    // $mensaje = 1;
                    // echo $mensaje = $tar->cont_destinos;
                }
            }
            if (isset($mensaje)) {
                echo $mensaje;
            } else {
                echo 1;
            }
        }
    }
    // ----------------------Vehiculos------------------------------
    public function show_listado_vehiculos()
    {
        $vehiculos = DB::table('vehiculos')->orderBy('id', 'desc')->get();

        return view('admin.vehiculos.index', compact('vehiculos'));
    }

    public function create_crear_vehiculo(Request $request)
    {

        if ($image = $request->file('vehiculo_img')) {
            $tamañoArchivoByte = filesize($image);
            // if ($tamañoArchivoByte < 820000) {
            $destinatarioPath = 'images-vehiculos/';
            $firmaImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $firmaImage);
            // } else {
            //     $mensaje = "Imagen debe ser menor a 800 KB";
            //     return redirect()->route('admin.vehiculos.index')->with(['data' => $mensaje]);
            // }


            // $alu['image'] = "$profileImage";
        }


        $data = [
            'unidad' => $request->get('unidad'),
            'marca' => $request->get('marca'),
            'placa' => $request->get('placa'),
            'tar_circulacion' => $request->get('tar_circulacion'),
            'n_certificado' => $request->get('n_certificado'),
            'fecha_ven_citv' => $request->get('fecha_ven_citv'),
            'soat' => $request->get('soat'),
            'fecha_ven_soat' => $request->get('fecha_ven_soat'),
            'categoria' => $request->get('categoria'),
            'seria_chasis' => $request->get('seria_chasis'),
            'anois_fab' => $request->get('anois_fab'),
            'n_ejes' => $request->get('n_ejes'),
            'carga_util' => $request->get('carga_util'),
            'peso_seco' => $request->get('peso_seco'),
            'estado' => 1,
            'imagen' => $firmaImage
        ];

        // dd($data);
        $soli = Vehiculo::create($data);
        $mensaje = "Vehiculo creado exitosamente";
        return redirect()->route('admin.vehiculos.index')->with(['data' => $mensaje]);
    }
    public function edit_vehiculo(Vehiculo $vehiculo, $id)
    {
        // dd($id);
        $vehiculo  = DB::table('vehiculos')->where('id', $id)->limit(1)->get();

        // dd($vehiculo);
        return view('admin.vehiculos.edit-vehiculo', compact('vehiculo'));
    }

    public function update_vehiculo(Request $request, Vehiculo $vehiculo)
    {

        $vehi = $request->all();
        if ($image = $request->file('vehiculo_img')) {
            $destinatarioPath = 'images-vehiculos/';
            $firmaImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $firmaImage);
            $vehi['imagen'] = "$firmaImage";
        } else {
            unset($vehi['imagen']);
        }

        // dd($data);
        $vehiculo->update($vehi);
        $mensaje = "Vehiculo actualizado exitosamente";
        return redirect()->route('admin.vehiculos.edit-vehiculo', $vehiculo)->with(['data' => $mensaje]);
        // return back()->withInput();
    }

    public function delete_vehiculo(Vehiculo $id)
    {
        // dd($id);
        $id->delete();
        $vehiculos = DB::table('vehiculos')->orderBy('id', 'desc')->get();

        return view('admin.vehiculos.index', compact('vehiculos'));
        // dd($vehiculo);
    }
    // ---------------------USUARIOS---------------------------------------
    public function show_listado_usuarios()
    {
        $usuarios = DB::table('users')->orderBy('id', 'desc')->get();
        $total = $usuarios->count();
        $admins = DB::table('users')->where('tipo', '1')->count();
        $gerentes = DB::table('users')->where('tipo', '3')->count();
        $operarios = DB::table('users')->where('tipo', '2')->count();
        $contas = DB::table('users')->where('tipo', '4')->count();

        return view('admin.usuarios.index', compact(
            'usuarios',
            'total',
            'admins',
            'gerentes',
            'operarios',
            'contas'
        ));
    }
    public function crear_usuario(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            're_password' => $request->get('password'),
            'estado' => 1,
            'tipo_dni' => 1,
            'dni' => $request->get('dni'),
            'apellido_ma' => $request->get('apellido_ma'),
            'apellido_pa' => $request->get('apellido_pa'),
            'celular' => $request->get('celular'),
            'tipo' => $request->get('tipo'),

        ];

        // dd($data);
        $soli = User::create($data);
        $mensaje = "Usuario creado exitosamente";
        return redirect()->route('admin.usuarios.index')->with(['data' => $mensaje]);
    }
    public function edit_usuario(Vehiculo $vehiculo, $id)
    {
        // dd($id);
        $usuario  = DB::table('users')->where('id', $id)->limit(1)->get();

        // dd($vehiculo);
        return view('admin.usuarios.edit-usuario', compact('usuario'));
    }
    public function update_usuario(Request $request, User $usuario)
    {

        // $us = $request->all();
        // dd($data);
        $id = $request->get('id');
        // $usuario->update($us);
        DB::table('users')->where('id', $id)->limit(1)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            're_password' => $request->get('password'),
            // 'estado' => $request->get('estado'),
            'dni' => $request->get('dni'),
            'apellido_ma' => $request->get('apellido_ma'),
            'apellido_pa' => $request->get('apellido_pa'),
            'celular' => $request->get('celular'),
            'tipo' => $request->get('tipo')
        ]);
        $mensaje = "Usuario actualizado exitosamente";
        return redirect()->route('admin.usuarios.index', $usuario)->with(['data' => $mensaje]);
        // return back()->withInput();
    }
    public function delete_usuario(User $id)
    {
        // dd($id);
        $id->delete();
        $usuarios = DB::table('users')->orderBy('id', 'desc')->get();

        return redirect()->route('admin.usuarios.index');
        // dd($vehiculo);
    }

    // ---------------------DESTINOS--------------------------------------------------
    public function show_listado_destinos()
    {
        // $destinos = DB::table('destinos')->get();
        $clientes = DB::table('clientes')->get();
        $departamentos = DB::table('departamentos')->get();

        $destinos = Destino::select(
            "destinos.id",
            "cliente",
            "empresa",
            "destinos.referencia",
            "destinos.direccion as direccion_des",
            "clientes.nombre as nombre_cli",
            "clientes.referencia as re_cli",
            "departamentos.name as nombre_dep",
            "provincias.name as nombre_prov",
            "distritos.name as nombre_dis",
            "destinos.estado as estado_des",
            "destinos.created_at",
        )
            ->join("departamentos", "departamentos.id", "=", "destinos.departamento")
            ->join("provincias", "provincias.id", "=", "destinos.provincia")
            ->join("distritos", "distritos.id", "=", "destinos.distrito")
            ->join("clientes", "clientes.id", "=", "destinos.cliente")
            ->orderBy('destinos.id', 'desc')
            ->get();

        return view('admin.destinos.index', compact('destinos', 'clientes', 'departamentos'));
    }

    public function crear_destino(Request $request)
    {

        $data = [
            'cliente' => $request->get('cliente'),
            'empresa' => $request->get('empresa'),
            'referencia' => $request->get('referencia'),
            'departamento' => $request->get('departamento'),
            'provincia' => $request->get('provincia'),
            'distrito' => $request->get('distrito'),
            'direccion' => $request->get('direccion'),
            'estado' => 1
        ];

        $soli = Destino::create($data);
        return redirect()->route('admin.destinos.index');

        // dd($request);
        // return $nombre;
    }
    public function delete_destino(Destino $id)
    {
        // dd($id);
        $id->delete();

        return redirect()->route('admin.destinos.index');
        // dd($vehiculo);
    }

    public function delete_ruta(Ruta $id)
    {
        // dd($id);
        $id->delete();

        return redirect()->route('admin.rutas.index');
        // dd($vehiculo);
    }

    //---------------- CLIENTES--------------------------------------
    public function show_listado_clientes()
    {
        // $clientes = DB::table('clientes')->orderBy('id', 'desc')->get();
        $clientes = Cliente::select(
            "clientes.id",
            "nombre",
            "referencia",
            "contactos",
            "ruc",
            "departamentos.name as nombre_dep",
            "departamentos.id as id_dep",
            "provincias.name as nombre_prov",
            "provincias.id as id_prov",
            "distritos.name as nombre_dis",
            "distritos.id as id_dis",
            "direccion",
            "estado",
            "tipo_servicio",
            "clientes.created_at",
        )
            ->join("departamentos", "departamentos.id", "=", "clientes.departamento")
            ->join("provincias", "provincias.id", "=", "clientes.provincia")
            ->join("distritos", "distritos.id", "=", "clientes.distrito")
            ->orderBy('clientes.id', 'desc')
            ->get();

        $departamentos = DB::table('departamentos')->get();
        $provincias = DB::table('provincias')->get();
        $distritos = DB::table('distritos')->get();

        return view('admin.clientes.index', compact('clientes', 'departamentos', 'provincias', 'distritos'));
    }
    public function create_crear_cliente(Request $request)
    {
        // transformar array en json 
        $datos_contacto = $request->get('datos_contacto');
        $datos_telefono = $request->get('datos_telefono');
        $datos_cargo = $request->get('datos_cargo');
        $datos_correo = $request->get('datos_correo');

        $datos = array();
        for ($i = 0; $i < count($datos_contacto); $i++) {
            $datos[$i] = array(
                'id' => $i,
                'contacto' => $datos_contacto[$i],
                'telefono' => $datos_telefono[$i],
                'cargo' => $datos_cargo[$i],
                'correo' => $datos_correo[$i]
            );
        }

        // echo var_dump($datos);

        $data = [
            'nombre' => $request->get('nombre'),
            'ruc' => $request->get('ruc'),
            'referencia' => $request->get('referencia'),
            'departamento' => $request->get('departamento'),
            'provincia' => $request->get('provincia'),
            'distrito' => $request->get('distrito'),
            'direccion' => $request->get('direccion'),
            'estado' => 1,
            'contactos' => json_encode($datos, true),
            'tipo_servicio' => $request->get('tipo_servicio')
        ];

        $soli = Cliente::create($data);
        return redirect()->route('admin.clientes.index');

        // dd($request);
        // return $nombre;
    }
    public function delete_cliente(Request $request)
    {
        // dd($id);
        $id = $request->get('id');
        DB::table('clientes')->where('id', $id)->limit(1)->update([
            'estado' => '0'
        ]);
        $mensaje = "Cliente Desactivado";
        return redirect()->route('admin.clientes.index')->with(['data' => $mensaje]);
        // dd($vehiculo);
    }

    public function edit_cliente(Cliente $cliente, $id)
    {
        // dd($id);
        $cliente  = DB::table('clientes')->where('id', $id)->limit(1)->get();
        $departamentos = DB::table('departamentos')->get();
        $provincias = DB::table('provincias')->get();
        $distritos = DB::table('distritos')->get();
        // dd($vehiculo);
        return view('admin.clientes.edit', compact('cliente', 'departamentos', 'provincias', 'distritos'));
    }
    public function update_cliente(Request $request)
    {
        // transformar array en json 
        $datos_contacto = $request->get('datos_contacto');
        $datos_telefono = $request->get('datos_telefono');
        $datos_cargo = $request->get('datos_cargo');
        $datos_correo = $request->get('datos_correo');
        $id = $request->get('id');


        $datos = array();
        for ($i = 0; $i < count($datos_contacto); $i++) {
            $datos[$i] = array(
                'id' => $i,
                'contacto' => $datos_contacto[$i],
                'telefono' => $datos_telefono[$i],
                'cargo' => $datos_cargo[$i],
                'correo' => $datos_correo[$i]
            );
        }

        // $cli = $request->all();
        // $cli['contactos'] = json_encode($datos, true);
        // $clien->update($cli);

        DB::table('clientes')->where('id', $id)->limit(1)->update([
            'nombre' => $request->get('nombre'),
            'ruc' => $request->get('ruc'),
            'referencia' => $request->get('referencia'),
            'departamento' => $request->get('departamento'),
            'provincia' => $request->get('provincia'),
            'distrito' => $request->get('distrito'),
            'direccion' => $request->get('direccion'),
            'estado' => $request->get('estado'),
            'contactos' => json_encode($datos, true),
            'tipo_servicio' => $request->get('tipo_servicio')
        ]);

        $mensaje = "Cliente actualizado exitosamente";

        $cliente  = DB::table('clientes')->where('id', $id)->limit(1)->get();
        $departamentos = DB::table('departamentos')->get();
        $provincias = DB::table('provincias')->get();
        $distritos = DB::table('distritos')->get();
        // dd($vehiculo);
        return redirect()->route('edit-cliente', $id)->with([
            'data' => $mensaje, 'cliente' => $cliente,
            'departamentos' => $departamentos, 'provincias' => $provincias, 'distritos' => $distritos
        ]);
    }

    // ------------------RUTAS--------------------------------------------
    public function show_listado_rutas()
    {

        // $departamentos = DB::table('departamentos')->get();

        // SELECT  clientes.nombre, origenes.nombre, destinos.nombre, destinos.razon_social, `distancia`, `galones`
        // FROM rutas
        // JOIN clientes ON clientes.id=rutas.id_cliente
        // JOIN origenes ON origenes.id=rutas.id_origen
        // JOIN destinos ON destinos.id=rutas.id_destino;

        $clientes = DB::table('clientes')->orderBy('id', 'desc')->get();
        $rutas = Ruta::select(
            "rutas.id",
            "clientes.nombre as nombre_cli",
            "destinos.empresa as nombre_des",
            "distancia",
            "galones",
            "rutas.created_at",
        )
            ->join("clientes", "clientes.id", "=", "rutas.id_cliente")
            ->join("destinos", "destinos.id", "=", "rutas.id_destino")
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.rutas.index', compact('rutas', 'clientes'));
    }
    public function crear_ruta(Request $request)
    {
        $data = [
            'id_cliente' => $request->get('cliente'),
            'id_destino' => $request->get('destino'),
            'distancia' => $request->get('distancia'),
            'galones' => $request->get('galones')
        ];

        // dd($data);
        $soli = Ruta::create($data);
        $mensaje = "Ruta creada exitosamente";
        return redirect()->route('admin.rutas.index')->with(['data' => $mensaje]);
    }
    // -------------------------------------------
    public function buscarprovincia(Request $request)
    {
        if ($request->ajax()) {
            $output = '<option value="0">Seleccione una provincia</option>';
            $id = $request->get('id');
            if ($id != '') {
                $data = DB::table('provincias')
                    ->where('department_id', $id)
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $dt) {
                    $output .= '<option value="' . $dt->id . '">' . $dt->name . '</option>';
                }
            }
            $data = array(
                'table_data'  => $output,
                // 'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }

    public function buscardistrito(Request $request)
    {
        if ($request->ajax()) {
            $output = '<option value="0">Seleccione un distrito</option>';
            $id = $request->get('id');
            if ($id != '') {
                $data = DB::table('distritos')
                    ->where('province_id', $id)
                    ->get();
            }

            //dd($data);
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $dt) {
                    $output .= '<option value="' . $dt->id . '">' . $dt->name . '</option>';
                }
            }
            $data = array(
                'table_data'  => $output,
                // 'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }

    // ----------------------------------CHOFERES----------------------------------
    public function show_listado_choferes()
    {
        $choferes = DB::table('choferes')->orderBy('id', 'desc')->get();

        return view('admin.choferes.index', compact('choferes'));
    }

    public function crear_chofer(Request $request)
    {
        if ($image = $request->file('dni_doc')) {
            $destinatarioPath = 'doc-dni-choferes/';
            $docdni = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $docdni);
            // $alu['image'] = "$profileImage";
        }
        if ($image = $request->file('contrato_doc')) {
            $destinatarioPath = 'doc-contrato-choferes/';
            $doccontrato = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $doccontrato);
            // $alu['image'] = "$profileImage";
        }

        if ($request->get('brevete_cho') == null) {
            $brevete_cho = "";
        } else {
            $brevete_cho = $request->get('brevete_cho');
        }
        if ($request->get('fecha_ven_cho') == null) {
            $fecha_ven_cho = "";
        } else {
            $fecha_ven_cho = $request->get('fecha_ven_cho');
        }

        $data = [
            'unidad' => $request->get('unidad'),
            'nombres_cho'  => $request->get('nombres_cho'),
            'apellidos_cho'  => $request->get('apellidos_cho'),
            'tipo_contrato' => $request->get('tipo_contrato'),
            'dni_cho' => $request->get('dni_cho'),
            'estado_cho' => 1,
            'brevete_cho' => $brevete_cho,
            'fecha_ven_cho' => $fecha_ven_cho,
            'celular_cho' => $request->get('celular_cho'),
            'tipo_cho' => $request->get('tipo_cho'),
            'telefono_emer' => $request->get('telefono_emer'),
            'duracion_contrato' => $request->get('duracion_contrato'),
            'fecha_inicio' => $request->get('fecha_inicio'),
            'url_dni' => $docdni,
            'url_contrato' => $doccontrato
        ];
        // dd($data);
        $soli = Chofere::create($data);
        $mensaje = "Usuario creado exitosamente";
        return redirect()->route('admin.choferes.index')->with(['data' => $mensaje]);
    }
    public function edit_chofer(Chofere $chofer, $id)
    {
        // dd($id);
        $usuario  = DB::table('users')->where('id', $id)->limit(1)->get();

        // dd($vehiculo);
        return view('admin.usuarios.edit-usuario', compact('usuario'));
    }
    public function update_chofer(Request $request, Chofere $usuario)
    {

        $us = $request->all();
        // dd($data);
        $usuario->update($us);
        $mensaje = "Usuario actualizado exitosamente";
        return redirect()->route('admin.choferes.index', $usuario)->with(['data' => $mensaje]);
        // return back()->withInput();
    }
    public function delete_chofer(Chofere $id)
    {
        // dd($id);
        $id->delete();
        $usuarios = DB::table('choferes')->orderBy('id', 'desc')->get();
        $mensaje = "Chofer eliminado exitosamente";
        return redirect()->route('admin.choferes.index')->with(['data' => $mensaje]);
        // dd($vehiculo);
    }
    // -------------------BUSCADORES DE RUTAS-----------------------------------------------------



    public function buscardestino(Request $request)
    {
        if ($request->ajax()) {
            $output = '<option value="">Seleccione un destino</option>';
            $id = $request->get('id');
            if ($id != '') {
                $data = DB::table('destinos')
                    ->where('cliente', $id)
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $dt) {
                    $output .= '<option value="' . $dt->id . '">' . $dt->empresa . '</option>';
                }
            }
            $data = array(
                'table_data'  => $output,
                // 'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }

    public function buscardestino2(Request $request)
    {
        if ($request->ajax()) {
            $output = '<option disabled="" value="">Seleccione un destino</option>';
            $id = $request->get('id');
            if ($id != '') {
                $data = DB::table('destinos')
                    ->where('cliente', $id)
                    ->get();
            }

            //dd($data);
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $dt) {
                    $output .= '<option value="' . $dt->id . '" data-select2-id="' . $dt->id . '">' . $dt->referencia . '</option>';
                }
            } else {
                $output = '<option disabled="" value="0">Ningún destino</option>';
            }
            $data = array(
                'table_data'  => $output,
                'total_row'  => $total_row
            );
            echo json_encode($data);
        }
    }
    public function buscardestino3(Request $request)
    {
        $destinos = DB::table('destinos')->where('cliente', $request->id)->get();

        // return view('admin.solicitudes.nueva-solicitud', compact('clientes'));

        if ($request->ajax()) {
            $output = '<option value="">Seleccione un destino</option>';
            $id = $request->get('id');
            if ($id != '') {
                $data = DB::table('destinos')
                    ->where('cliente', $id)
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $dt) {
                    $output .= '<option value="' . $dt->id . '">' . $dt->empresa . '</option>';
                }
            }
            $data = array(
                'table_data'  => $output,
                // 'total_data'  => $total_row
            );
            echo json_encode($destinos);
        }
    }

    public function buscarclientexdestino(Request $request)
    {
        $clientes = DB::table('clientes')->get();
        $destinos = DB::table('destinos')->where('cliente', $request->cliente)->get();
        $id_cli = $request->cliente;
        // return view('admin.solicitudes.nueva-solicitud', compact('clientes'));
        return view('admin.solicitudes.nueva-solicitud', compact('clientes', 'destinos', 'id_cli'));
        // dd($destinos);
    }
    // ---------------------TARIFAS-------------------------

    public function show_listado_tarifas()
    {

        $clientes = DB::table('clientes')->orderBy('id', 'desc')->get();
        $destinos = DB::table('destinos')->orderBy('id', 'desc')->get();

        $tarifas = Tarifa::select(
            "tarifas.id",
            "clientes.nombre as nombre_cli",
            "clientes.referencia as refe_cli",
            "destinos",
            "base",
            "igv",
            "total",
            "tarifas.created_at",
        )
            ->join("clientes", "clientes.id", "=", "tarifas.id_cliente")
            ->orderBy('id', 'desc')
            ->get();


        return view('admin.tarifas.index', compact('tarifas', 'clientes', 'destinos'));
    }

    public function crear_tarifa(Request $request)
    {
        // transformar array en json 
        $datos_destinos = $request->get('datos_destinos');

        // $datos = array();
        // for ($i = 0; $i < count($datos_destinos); $i++) {
        //     $datos[$i] = array(
        //         'id' => $i,
        //         'destino' => $datos_destinos[$i]
        //     );
        // }

        // echo var_dump($datos_destinos);

        $destinos = json_encode($datos_destinos, true);
        $data = [
            'id_cliente' => $request->get('cliente'),
            'destinos' => $destinos,
            'cont_destinos' => count($datos_destinos),
            'base' => $request->get('base'),
            'igv' => $request->get('igv'),
            'total' => $request->get('total')
        ];

        $soli = Tarifa::create($data);
        return redirect()->route('admin.tarifas.index');

        // dd($request);
        // return $nombre;
    }

    public function delete_tarifa(Tarifa $id)
    {
        // dd($id);
        $id->delete();

        return redirect()->route('admin.tarifas.index');
        // dd($vehiculo);
    }

    public function buscarunidad(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            if ($id != '') {
                $data = DB::table('vehiculos')
                    ->where('id', $id)
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $dt) {
                    $output = $dt->marca . ' - ' . $dt->placa;
                }
            }
            echo json_encode($output);
        }
    }

    public function buscarchofer(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            if ($id != '') {
                $data = DB::table('choferes')
                    ->where('id', $id)
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $dt) {
                    $output = $dt->nombres_cho . ' ' . $dt->apellidos_cho;
                }
            }
            echo json_encode($output);
        }
    }

    public function crear_plani(Request $request)
    {

        if ($request->get('observaciones') == null) {
            $observaciones = "";
        } else {
            $observaciones = $request->get('observaciones');
        }
        $accion = $request->get('accion');
        if ($accion == 'guardar') {
            $id_soli = $request->get('id_soli');
            $datos_ayudantes = $request->get('ayudantes');
            $data = [
                'id_unidad' => $request->get('unidad'),
                'id_chofer'  => $request->get('chofer'),
                'choferes'  => $datos_ayudantes,
                'observaciones' => $observaciones,
                'tipo_des' => $request->get('tipo_des')

            ];
            // dd($data);
            $soli = planificacione::create($data);
            $id_plani = $soli->id;
            DB::table('solicitudes')->where('id', $id_soli)->limit(1)->update([
                'id_plani' => $id_plani,
                'estado' => '2'
            ]);
            $mensaje = "Guardado exitosamente la asignación";
        } elseif ($accion == 'finalizar') {
            $id_soli = $request->get('id_soli');
            $datos_ayudantes = $request->get('ayudantes');
            $data = [
                'id_unidad' => $request->get('unidad'),
                'id_chofer'  => $request->get('chofer'),
                'choferes'  => $datos_ayudantes,
                'observaciones' => $observaciones,
                'tipo_des' => $request->get('tipo_des')
            ];
            // dd($data);
            $soli = planificacione::create($data);
            $id_plani = $soli->id;
            DB::table('solicitudes')->where('id', $id_soli)->limit(1)->update([
                'id_plani' => $id_plani,
                'estado' => '3'
            ]);
            $mensaje = "Asignación Finalizada";
        } elseif ($accion == 'actualizar') {
            $id_plani = $request->get('id_plani');
            $datos_ayudantes = $request->get('ayudantes');
            $choferes = $datos_ayudantes;
            $id_unidad = $request->get('unidad');
            $id_chofer = $request->get('chofer');
            $obser = $observaciones;
            $tipo_des =  $request->get('tipo_des');
            DB::table('planificaciones')->where('id', $id_plani)->limit(1)->update([
                'id_unidad' => $id_unidad,
                'id_chofer'  => $id_chofer,
                'choferes'  => $choferes,
                'observaciones' => $obser,
                'tipo_des' => $tipo_des
            ]);
            $mensaje = "Asignación actualizada";
        } else if ($accion == 'finalizar2') {
            $id_soli = $request->get('id_soli');
            $id_plani = $request->get('id_plani');
            $datos_ayudantes = $request->get('ayudantes');
            $choferes = $datos_ayudantes;
            $id_unidad = $request->get('unidad');
            $id_chofer = $request->get('chofer');
            $obser = $observaciones;
            $tipo_des =  $request->get('tipo_des');
            DB::table('planificaciones')->where('id', $id_plani)->limit(1)->update([
                'id_unidad' => $id_unidad,
                'id_chofer'  => $id_chofer,
                'choferes'  => $choferes,
                'observaciones' => $obser,
                'tipo_des' => $tipo_des

            ]);
            DB::table('solicitudes')->where('id', $id_soli)->limit(1)->update([
                'estado' => '3'
            ]);
            $mensaje = "Asignación Finalizada";
        }



        return redirect()->route('admin.solicitudes.index')->with(['data' => $mensaje]);
    }

    public function enviar_info_conductor(Solicitude $solicitudes, $id)
    {
        // dd($id);

        $solicitudes = DB::table('solicitudes')->orderBy('id', 'desc')->get();
        $vehiculos = DB::table('vehiculos')->orderBy('id', 'desc')->get();
        $choferes = DB::table('choferes')->where('tipo_cho', 1)->orderBy('id', 'desc')->get();
        $ayudantes = DB::table('choferes')->orderBy('id', 'desc')->get();
        $planificaciones = DB::table('planificaciones')->orderBy('id', 'desc')->get();
        $destinos = DB::table('destinos')->orderBy('id', 'desc')->get();

        $solicitudes = Solicitude::select(
            "solicitudes.id as id",
            "solicitudes.codigo_solicitud as codigo",
            "solicitudes.fecha_solicitud as fecha",
            "solicitudes.hora as hora",
            "solicitudes.hora_cochera as hora_cochera",
            "solicitudes.cantidad as cantidad",
            "solicitudes.fecha_traslado as fecha_traslado",
            "solicitudes.costo as costo",
            "solicitudes.estado as estado",
            "solicitudes.id_plani as id_plani",
            "solicitudes.lavado as lavado",
            "solicitudes.comprobante as comprobante",
            "clientes.nombre as nombre_cli",
            "clientes.referencia as referencia_cli",
            "solicitudes.created_at",
            "datos_destinos",
            "datos_cantidad"
        )
            ->join("clientes", "clientes.id", "=", "solicitudes.cliente")
            ->where('solicitudes.id', $id)->limit(1)
            ->get();

        return view('admin.solicitudes.enviar', compact(
            'solicitudes',
            'vehiculos',
            'choferes',
            'planificaciones',
            'ayudantes',
            'destinos'
        ));
        // dd($vehiculo);
    }

    public function detalle_solicitud(Solicitude $solicitudes, $id)
    {
        // dd($id);

        $solicitudes = DB::table('solicitudes')->orderBy('id', 'desc')->get();
        $vehiculos = DB::table('vehiculos')->orderBy('id', 'desc')->get();
        $choferes = DB::table('choferes')->where('tipo_cho', 1)->orderBy('id', 'desc')->get();
        $ayudantes = DB::table('choferes')->orderBy('id', 'desc')->get();
        $planificaciones = DB::table('planificaciones')->orderBy('id', 'desc')->get();
        $destinos = DB::table('destinos')->orderBy('id', 'desc')->get();
        $cierres = DB::table('cierres')->orderBy('id', 'desc')->get();

        $solicitudes = Solicitude::select(
            "solicitudes.id as id",
            "solicitudes.codigo_solicitud as codigo",
            "solicitudes.fecha_solicitud as fecha",
            "solicitudes.hora as hora",
            "solicitudes.hora_cochera as hora_cochera",
            "solicitudes.cantidad as cantidad",
            "solicitudes.fecha_traslado as fecha_traslado",
            "solicitudes.costo as costo",
            "solicitudes.estado as estado",
            "solicitudes.id_plani as id_plani",
            "solicitudes.id_cierre as id_cierre",
            "solicitudes.lavado as lavado",
            "solicitudes.comprobante as comprobante",
            "clientes.nombre as nombre_cli",
            "solicitudes.observaciones as observaciones",
            "clientes.referencia as referencia_cli",
            "solicitudes.created_at",
            "datos_destinos",
            "datos_cantidad"
        )
            ->join("clientes", "clientes.id", "=", "solicitudes.cliente")
            ->where('solicitudes.id', $id)->limit(1)
            ->get();

        return view('admin.solicitudes.detalle', compact(
            'solicitudes',
            'vehiculos',
            'choferes',
            'planificaciones',
            'ayudantes',
            'destinos',
            'cierres'

        ));
        // dd($vehiculo);
    }
    public function crear_cierre(Request $request)
    {
        $id_soli = $request->get('id_soli');

        if ($request->get('indicaciones') == null) {
            $indicaciones = "";
        } else {
            $indicaciones = $request->get('indicaciones');
        }

        if ($request->get('fecha_fac') == null) {
            $fecha_fac = "";
        } else {
            $fecha_fac = $request->get('fecha_fac');
        }
        if ($request->get('n_fac') == null) {
            $n_fac = "";
        }

        $solicitudes = DB::table('solicitudes')->where('id', $id_soli)->orderBy('id', 'desc')->get();
        foreach ($solicitudes as $col) {
            $datos_destinos = $col->datos_destinos;
        }
        $datos_destinos2 = json_decode($datos_destinos, true);

        // $arrr = [];
        foreach ($datos_destinos2 as $key) {
            // echo $key;
            if ($image = $request->file('guia' . $key)) {
                $destinatarioPath = 'pdfs-guias/';
                $firmaImage = date('mdHis') . $key . "." . $image->getClientOriginalExtension();
                $image->move($destinatarioPath, $firmaImage);
                // $alu['image'] = "$profileImage";
                $arr[] = $firmaImage;
            }

            if ($image2 = $request->file('remision' . $key)) {
                $destinatarioPath2 = 'pdfs-remision/';
                $firmaImage2 = date('mdHis') . $key . "." . $image2->getClientOriginalExtension();
                $image2->move($destinatarioPath2, $firmaImage2);
                // $alu['image'] = "$profileImage";
                $arr2[] = $firmaImage2;
            }

            $n_gruias[] = $request->get('n_guias' . $key);
            $n_remision[] = $request->get('n_remision' . $key);
        }


        $data = [
            'datos_guias' => json_encode($arr, true),
            'n_guias' => json_encode($n_gruias, true),
            'datos_remision' => json_encode($arr2, true),
            'n_remision' => json_encode($n_remision, true),
            'fecha_fac'  => $fecha_fac,
            'n_fac'  => $n_fac,
            'km_inicial'  => $request->get('km_inicial'),
            'km_final'  => $request->get('km_final'),
            'indicaciones'  => $indicaciones
        ];
        // dd($data);
        $cier = Cierre::create($data);
        $id_cierre = $cier->id;

        DB::table('solicitudes')->where('id', $id_soli)->limit(1)->update([
            'id_cierre' => $id_cierre,
            'estado' => '4'
        ]);
        $mensaje = "Asignación Finalizada";
        // echo var_dump($arr);
        return redirect()->route('admin.solicitudes.index')->with(['data' => $mensaje]);
    }

    public function edit_cierre(Request $request)
    {
        $id_soli = $request->get('id_soli');
        $id_cierre = $request->get('id_cierre');
        $fecha_fac = $request->get('fecha_fac');
        $n_fac = $request->get('n_fac');

        DB::table('cierres')->where('id', $id_cierre)->limit(1)->update([
            'fecha_fac'  => $fecha_fac,
            'n_fac'  => $n_fac
        ]);

        DB::table('solicitudes')->where('id', $id_soli)->limit(1)->update([
            'id_cierre' => $id_cierre,
            'estado' => '5'
        ]);
        $mensaje = "Facturación Terminada";
        // echo var_dump($arr);
        return redirect()->route('admin.solicitudes.index')->with(['data' => $mensaje]);
    }

    // ------------------------------COSTOSS-------------------------------------
    public function listarsolicitudes2()
    {
        $solicitudes = DB::table('solicitudes')->orderBy('id', 'desc')->get();
        $vehiculos = DB::table('vehiculos')->orderBy('id', 'desc')->get();
        $choferes = DB::table('choferes')->where('tipo_cho', 1)->orderBy('id', 'desc')->get();
        $ayudantes = DB::table('choferes')->orderBy('id', 'desc')->get();
        $cierres = DB::table('cierres')->orderBy('id', 'desc')->get();
        $planificaciones = DB::table('planificaciones')->orderBy('id', 'desc')->get();
        $destinos = DB::table('destinos')->orderBy('id', 'desc')->get();

        $combustibles = DB::table('combustibles')->orderBy('id', 'desc')->get();
        $balanzas = DB::table('balanzas')->orderBy('id', 'desc')->get();
        $peajes = DB::table('peajes')->orderBy('id', 'desc')->get();
        $viaticos = DB::table('viaticos')->orderBy('id', 'desc')->get();

        $solicitudes = Solicitude::select(
            "solicitudes.id as id",
            "solicitudes.codigo_solicitud as codigo",
            "solicitudes.fecha_solicitud as fecha",
            "solicitudes.hora as hora",
            "solicitudes.hora_cochera as hora_cochera",
            "solicitudes.cantidad as cantidad",
            "solicitudes.fecha_traslado as fecha_traslado",
            "solicitudes.costo as costo",
            "solicitudes.estado as estado",
            "solicitudes.datos_destinos as destinos",
            "solicitudes.id_plani as id_plani",
            "solicitudes.id_cierre as id_cierre",
            "solicitudes.id_combustible as id_combustible",
            "solicitudes.id_balanza as id_balanza",
            "solicitudes.id_peaje as id_peaje",
            "solicitudes.id_viaticos as id_viaticos",
            "solicitudes.lavado as lavado",
            "solicitudes.comprobante as comprobante",
            "solicitudes.datos_cantidad as datos_cantidad",
            "clientes.nombre as nombre_cli",
            "clientes.referencia as referencia_cli",
            "solicitudes.created_at",
            "datos_destinos"
        )
            ->join("clientes", "clientes.id", "=", "solicitudes.cliente")
            ->orderBy('solicitudes.costo', 'desc')
            ->get();

        return view('admin.costos.index', compact(
            'solicitudes',
            'vehiculos',
            'choferes',
            'planificaciones',
            'ayudantes',
            'destinos',
            'cierres',
            'combustibles',
            'balanzas',
            'peajes',
            'viaticos'
        ));
    }

    public function crear_combustible(Request $request)
    {

        if ($request->get('observaciones') == null) {
            $observaciones = "";
        } else {
            $observaciones = $request->get('observaciones');
        }
        $accion = $request->get('accion');
        $id_soli = $request->get('id_soli');

        if ($image = $request->file('img_recarga1')) {
            $destinatarioPath = 'img-combustibles/';
            $img_recarga1 = date('YHis') . "1" . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $img_recarga1);
        }
        if ($image = $request->file('img_recarga2')) {
            $destinatarioPath = 'img-combustibles/';
            $img_recarga2 = date('YHis') . "2" . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $img_recarga2);
        }

        $data = [
            'costo_total' => $request->get('costo_total'),
            'recarga1'  => $request->get('recarga1'),
            'img_recarga1'  => $img_recarga1,
            'recarga2'  => $request->get('recarga2'),
            'img_recarga2'  => $img_recarga2,
            'precio_1re'  => $request->get('precio_1re'),
            'precio_2re'  => $request->get('precio_2re'),
            'cant_1re'  => $request->get('cant_1re'),
            'cant_2re'  => $request->get('cant_2re'),
            'origen'  => $request->get('origen'),
            'fecha_fac'  => $request->get('fecha_fac'),
            'n_fac'  => $request->get('n_fac'),
            'observaciones' => $observaciones

        ];
        // dd($data);
        $combus = combustible::create($data);
        $id_combustible = $combus->id;
        DB::table('solicitudes')->where('id', $id_soli)->limit(1)->update([
            'id_combustible' => $id_combustible
        ]);
        $mensaje = "Asignación del Combustible exitosa";

        return redirect()->route('admin.costos.index')->with(['data' => $mensaje]);
    }
    public function crear_balanza(Request $request)
    {

        if ($request->get('observaciones') == null) {
            $observaciones = "";
        } else {
            $observaciones = $request->get('observaciones');
        }
        $accion = $request->get('accion');
        $id_soli = $request->get('id_soli');

        if ($image = $request->file('img_fac')) {
            $destinatarioPath = 'img-balanzas/';
            $img_fac = date('YHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $img_fac);
        }


        $data = [
            'costo_total' => $request->get('costo_total'),
            'precio_ba'  => $request->get('precio_ba'),
            'img_fac'  => $img_fac,
            'origen'  => $request->get('origen'),
            'fecha_fac'  => $request->get('fecha_fac'),
            'n_fac'  => $request->get('n_fac'),
            'observaciones' => $observaciones

        ];
        // dd($data);
        $balan = balanza::create($data);
        $id_balan = $balan->id;
        DB::table('solicitudes')->where('id', $id_soli)->limit(1)->update([
            'id_balanza' => $id_balan
        ]);
        $mensaje = "Asignación de la Balanza exitosa";

        return redirect()->route('admin.costos.index')->with(['data' => $mensaje]);
    }

    public function crear_peaje(Request $request)
    {

        if ($request->get('observaciones') == null) {
            $observaciones = "";
        } else {
            $observaciones = $request->get('observaciones');
        }
        $accion = $request->get('accion');
        $id_soli = $request->get('id_soli');

        if ($image = $request->file('img_peaje1')) {
            $destinatarioPath = 'img-peajes/';
            $img_peaje1 = date('YHis') . "1" . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $img_peaje1);
        }
        if ($image = $request->file('img_peaje2')) {
            $destinatarioPath = 'img-peajes/';
            $img_peaje2 = date('YHis') . "2" . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $img_peaje2);
        }
        if ($image = $request->file('img_peaje3')) {
            $destinatarioPath = 'img-peajes/';
            $img_peaje3 = date('YHis') . "3" . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $img_peaje3);
        }
        if ($image = $request->file('img_peaje4')) {
            $destinatarioPath = 'img-peajes/';
            $img_peaje4 = date('YHis') . "4" . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $img_peaje4);
        }

        $data = [
            'costo_total' => $request->get('costo_total'),
            'peaje1' => $request->get('peaje1'),
            'precio_peaje1' => $request->get('precio_peaje1'),
            'img_peaje1' => $img_peaje1,
            'peaje2' => $request->get('peaje2'),
            'precio_peaje2' => $request->get('precio_peaje2'),
            'img_peaje2' => $img_peaje2,
            'peaje3' => $request->get('peaje3'),
            'precio_peaje3' => $request->get('precio_peaje3'),
            'img_peaje3' => $img_peaje3,
            'peaje4' => $request->get('peaje4'),
            'precio_peaje4' => $request->get('precio_peaje4'),
            'img_peaje4' => $img_peaje4,
            'origen' => $request->get('origen'),
            'fecha_fac' => $request->get('fecha_fac'),
            'n_fac' => $request->get('n_fac'),
            'observaciones' => $observaciones
        ];
        // dd($data);
        $pea = peaje::create($data);
        $id_peaje = $pea->id;
        DB::table('solicitudes')->where('id', $id_soli)->limit(1)->update([
            'id_peaje' => $id_peaje
        ]);
        $mensaje = "Asignación del peaje exitosa";

        return redirect()->route('admin.costos.index')->with(['data' => $mensaje]);
    }

    public function crear_viatico(Request $request)
    {

        if ($request->get('observaciones') == null) {
            $observaciones = "";
        } else {
            $observaciones = $request->get('observaciones');
        }
        $id_soli = $request->get('id_soli');
        $data = [
            'costo_total' => $request->get('costo_total'),
            'movilidad' => $request->get('movilidad'),
            'motivo_mo' => $request->get('motivo_mo'),
            'alimento' => $request->get('alimento'),
            'motivo_ali' => $request->get('motivo_ali'),
            'servicio' => $request->get('servicio'),
            'motivo_ser' => $request->get('motivo_ser'),
            'origen' => $request->get('origen'),
            'observaciones' => $observaciones
        ];
        // dd($data);
        $via = viatico::create($data);
        $id_viatico = $via->id;
        DB::table('solicitudes')->where('id', $id_soli)->limit(1)->update([
            'id_viaticos' => $id_viatico
        ]);
        $mensaje = "Asignación de viaticos exitosa";

        return redirect()->route('admin.costos.index')->with(['data' => $mensaje]);
    }

    public function delete_solicitud(Request $request)
    {
        $id_soli = $request->get('id');
        $consulta = DB::table('solicitudes')->where('id', $id_soli)->get();

        foreach ($consulta as $value) {
            $id_plani = $value->id_plani;
            $id_cierre = $value->id_cierre;
            $id_combustible = $value->id_combustible;
            $id_balanza = $value->id_balanza;
            $id_peaje = $value->id_peaje;
            $id_viaticos = $value->id_viaticos;
        }
        if ($id_plani == 0) {
        } else {
            $consulta2 =  DB::table('planificaciones')->where('id', $id_plani)->limit(1)->delete();
        }
        if ($id_cierre == 0) {
        } else {
            $consulta3 =  DB::table('cierres')->where('id', $id_cierre)->limit(1)->delete();
        }
        if ($id_combustible == 0) {
        } else {
            $consulta4 =  DB::table('combustibles')->where('id', $id_combustible)->limit(1)->delete();
        }
        if ($id_balanza == 0) {
        } else {
            $consulta5 =  DB::table('balanzas')->where('id', $id_balanza)->limit(1)->delete();
        }
        if ($id_peaje == 0) {
        } else {
            $consulta6 =  DB::table('peajes')->where('id', $id_peaje)->limit(1)->delete();
        }
        if ($id_viaticos == 0) {
        } else {
            $consulta7 =  DB::table('viaticos')->where('id', $id_viaticos)->limit(1)->delete();
        }

        $eliminar =  DB::table('solicitudes')->where('id', $id_soli)->limit(1)->delete();

        $mensaje = "Solicitud eliminada correctamente";
        return redirect()->route('admin.solicitudes.index')->with(['data' => $mensaje]);
    }

    public function edit_solicitud(Solicitude $solicitud, $id)
    {
        // dd($id);
        $solicitud  = DB::table('solicitudes')->where('id', $id)->limit(1)->get();
        $clientes = DB::table('clientes')->orderBy('id', 'desc')->get();
        $destinos = DB::table('destinos')->orderBy('id', 'desc')->get();
        // dd($vehiculo);
        return view('admin.solicitudes.editar', compact('solicitud', 'clientes', 'destinos'));
    }
    public function update_solicitud(Request $request)
    {
        $id_soli = $request->get('id_soli');
        $obs = $request->get('observaciones');
        $n_com = $request->get('comprobante');
        if (empty($obs) || empty($n_com)) {
            $observaciones = "";
            $comprobante = "";
        } else {
            $observaciones = $request->get('observaciones');
            $comprobante = $request->get('comprobante');
        }

        $datos_estructura = array(
            'cant1' => $request->get('datos_cantidad1'),
            'cant2' => $request->get('datos_cantidad2'),
            'cant3' => $request->get('datos_cantidad3'),
            'cant4' => $request->get('datos_cantidad4'),
            'sub' => $request->get('subtotal'),
        );
        // $data = [
        //     'fecha_solicitud' => $request->get('fecha_solicitud'),
        //     'fecha_traslado' => $request->get('fecha_traslado'),
        //     'hora' => $request->get('hora'),
        //     'hora_cochera' => $request->get('hora_cochera'),
        //     'cantidad' => $request->get('cantidad'),
        //     'datos_destinos' => json_encode($request->get('datos_destinos')),
        //     'datos_cantidad' => json_encode($datos_estructura),
        //     'observaciones' =>  $observaciones,
        //     'lavado' => $request->get('lavado'),
        //     'comprobante' => $comprobante
        // ];

        DB::table('solicitudes')->where('id', $id_soli)->limit(1)->update([
            'fecha_solicitud' => $request->get('fecha_solicitud'),
            'fecha_traslado' => $request->get('fecha_traslado'),
            'hora' => $request->get('hora'),
            'hora_cochera' => $request->get('hora_cochera'),
            'cantidad' => $request->get('cantidad'),
            // 'datos_destinos' => json_encode($request->get('datos_destinos')),
            'datos_cantidad' => json_encode($datos_estructura),
            'observaciones' =>  $observaciones,
            'lavado' => $request->get('lavado'),
            'comprobante' => $comprobante
        ]);
        // dd($data);
        $mensaje = "Solicitud Actualizada";
        return redirect()->route('admin.solicitudes.editar', $id_soli)->with(['data' => $mensaje]);
    }
}
