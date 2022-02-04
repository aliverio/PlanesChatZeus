<?php
namespace App\Http\Livewire\Cuentas;

use App\Models\Cuenta_;
use Livewire\Component;
use App\Models\CuentaView_;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Models\Licenciaperiodo_;
use Illuminate\Support\Facades\DB;
use App\Models\Planlicenciamiento_;

class Cuenta extends Component {

    

    //Variables Auxiliares
    public $cuenta_descripcion_ = null;
    public $plan_licenciamiento_descripcion_= null;
    public $limite_usuarios_= null;
    public $licencia_periodo_descripcion_= null;
    public $fecha_inicio_= null; 
    public $fecha_vencimiento_= null; 

    public $cuenta_id = null;
    public $licencia_periodos = null;
    public $plan_licenciamiento = null;
    public $usuarios_editable = 'readonly';

    public $selectPlan = null;
    public $selectPeriodo = null;

    public function render() {
        return view('livewire.cuentas.cuenta', [
            'cuenta_id' => $this->cuenta_id,
            'licencia_periodos' => $this->licencia_periodos,
            'plan_licencia' => $this->plan_licencia,
        ]);
    }

    public function mount($id){
        $this->cuenta_id = $id;
        $this->licencia_periodos = Licenciaperiodo_::all();
        $this->plan_licencia = Planlicenciamiento_::all();
        
        $this->informacionCuenta();

    }

    public function updatedselectPlan($id){

        $this->plan_licenciamiento_id = $id;
        $this->usuarios_editable = 'readonly';
        $this->limite_usuarios = 0;

        $r = DB::table('chatzeus.planes_licenciamiento')
            ->where('plan_licenciamiento_id', '=', $id)->get()->first();
        if ($r) {
            $this->usuarios_editable = $r->usuarios_editable;
            $this->limite_usuarios = $r->limite_usuarios;
            if (!$r->limite_usuarios) {
                $this->limite_usuarios = $this->limite_usuarios_;
            }
        }
    }

    public function updatedselectPeriodo($id){
        dd($id);
    }

    public function informacionCuenta() {
        $r = CuentaView_::findOrFail($this->cuenta_id);
	    $this->cuenta_descripcion_              = $r-> cuenta_descripcion;
        $this->plan_licenciamiento_descripcion_ = $r-> plan_licenciamiento_descripcion;
        $this->limite_usuarios_                 = $r-> limite_usuarios;
        $this->limite_usuarios                  = $r-> limite_usuarios;
        $this->licencia_periodo_descripcion_    = $r-> licencia_periodo_descripcion;
        $this->fecha_inicio_                    = Carbon::parse($r-> fecha_inicio)->format('d/m/Y');
        $this->licencia_periodo_id              = $r-> licencia_periodo_id;

        if ($r->fecha_vencimiento) {
            $this->fecha_vencimiento_               = Carbon::parse($r-> fecha_vencimiento)->format('d/m/Y');
            $this->fecha_inicio = Carbon::parse($r-> fecha_vencimiento)->format('Y-m-d');
            $this->fecha_vencimiento = Carbon::parse($r-> fecha_vencimiento)->format('Y-m-d');
        } else {
            $this->fecha_vencimiento_               = "";
            $this->fecha_inicio = Carbon::now()->format('Y-m-d');
            $this->fecha_vencimiento = Carbon::now()->format('Y-m-d');
        }
    }

    public function guardar() {
        dd($this->cuenta_id);
        if ($this->cuenta_id) {
			$r = Cuenta_::find($this->cuenta_id);
            $r->update([ 
                'plan_licenciamiento_id' => $this->plan_licenciamiento_id, 
                'licencia_periodo_id' => $this->licencia_periodo_id,
                'limite_usuarios' => $this->limite_usuarios,
                'fecha_inicio' => Carbon::parse($this->fecha_inicio)->format('Y-m-d'),
                'fecha_vencimiento' => Carbon::parse($this->fecha_vencimiento)->format('Y-m-d'),   
            ]);
        }
    }
}