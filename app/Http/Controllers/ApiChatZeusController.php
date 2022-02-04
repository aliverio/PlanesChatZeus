<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PermisoCanalRequest;
use App\Http\Requests\VerificaLicenciaRequest;
use App\Http\Requests\DetalleCuentaPlanRequest;
use App\Http\Requests\PermisoCuentaCanalRequest;
use App\Http\Requests\PermisoAgregarAgenteRequest;


class ApiChatZeusController extends Controller {
    private function getCuenta($d){
        $res = DB::select("SELECT a.account_id as cuenta_id, a.user_id, b.token FROM account_users as a
                        INNER JOIN access_tokens as b ON  a.user_id = b.owner_id
                        WHERE b.token = '$d->usuario_token'");
        foreach ($res as $r) {
            return($r->cuenta_id);
        }
        return (0);
    }
    private function obtenerPlan($cuenta_id){
        $res = DB::select("SELECT cuentas.plan_licenciamiento_id 
                            FROM chatzeus.cuentas
                            WHERE (cuentas.cuenta_chatzeus_id = $cuenta_id)");
        foreach ($res as $r) {
            return($r->plan_licenciamiento_id);
        }
        return (0);
    }
    public function DetalleCuentaPlan(DetalleCuentaPlanRequest $r) {
        $cuenta_id = $this->getCuenta($r);
        if ( $cuenta_id > 0 ) {
            $resultado = DB::SELECT("SELECT a.plan_licenciamiento_descripcion, 
                                to_char(a.fecha_inicio,'DD/MM/YYYY') as fecha_inicio, 
                                to_char(a.fecha_vencimiento ,'DD/MM/YYYY') as fecha_vencimiento  
                FROM chatzeus.vw_cuentas as a
                WHERE (a.cuenta_chatzeus_id = $cuenta_id)");
            return response()->json($resultado);
        }
    }

    public function PermisoCuentaCanal(PermisoCuentaCanalRequest $r) {
        if ($this->Validado($r)) {
            // $resultado = DB::SELECT("SELECT a.descripcion, a.fecha_inicio, a.fecha_vencimiento 
            //     FROM chatzeus.vw_cuentas as a
            //     WHERE (a.cuenta_chatzeus_id = $r->cuenta_id)");
            return response()->json($r);
        }
    }

    public function PermisoAgregarAgente(PermisoAgregarAgenteRequest $r) {
        $cuenta_id = $this->getCuenta($r);
        if ( $cuenta_id > 0 ) {
            $resultado = DB::SELECT("SELECT COUNT(a.user_id) as total_agentes,
                                    (SELECT b.limite_usuarios 
                                        FROM chatzeus.cuentas as b
                                        WHERE b.cuenta_chatzeus_id = $cuenta_id ) as limite_usuarios
                                    FROM account_users as a
                                    WHERE ( a.account_id = $cuenta_id )
                                    GROUP BY a.account_id");
            return response()->json($resultado[0]);
        }
    }

    public function PermisoCanal(PermisoCanalRequest $r) {
        $cuenta_id = $this->getCuenta($r);
        $plan_licenciamiento_id = $this->obtenerPlan($cuenta_id);
        if ( $cuenta_id > 0 && $plan_licenciamiento_id > 0) {
            $resultado = DB::SELECT("SELECT planes_opciones_ligas.activo 
                FROM chatzeus.planes_opciones_ligas
                INNER JOIN chatzeus.catalogo_opciones ON 
                    planes_opciones_ligas.catalogo_opcion_id = catalogo_opciones.catalogo_opcion_id
                WHERE (planes_opciones_ligas.plan_licenciamiento_id = $plan_licenciamiento_id 
                    AND catalogo_opciones.clave = '$r->clave_canal')");
            return response()->json($resultado[0]);
        }
    }


    //env('TOKEN_APP_CHATZEUS');
    public function VerificaLicencia(VerificaLicenciaRequest $r) {
        if ($r->usuario_token == env('TOKEN_APP_CHATZEUS')) {
            $resultado = DB::SELECT("SELECT * FROM verifica_licencia_vista
                WHERE(email = '$r->email');");
            return response()->json($resultado[0]);
        }
    }
}
