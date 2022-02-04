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

class Cuentas extends Component {

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $SelectedId, $Filtro;
    public $updateMode = false;
    
    //Tabla Cuentas
    public $CuentaDescripcion;
    public $FechaInicio;
    public $FechaVencimiento;
    public $LimiteUsuarios;
    public $LicenciaPeriodoId = null;
    public $PlanLicenciamientoId = null;
   
    //Variables Auxiliares
    public $CuentaDescripcion_;
    public $PlanLicenciamientoDescripcion_;
    public $LimiteUsuarios_;
    public $LicenciaPeriodoDescripcion_; 
    public $FechaInicio_; 
    public $FechaVencimiento_; 

    // Datos de Condultas
    public $Cuentas = null;
    public $LicenciaPperiodos = null;
    public $PlanLicencia  =  null;

    public $UsuariosEditable = 'readonly';

    public function updatingFiltro()
    {
        $this->resetPage();
    }

    public function render() {
		
        $this->LicenciaPeriodos = Licenciaperiodo_::all();
        $this->PlanLicencia = Planlicenciamiento_::all();

        // $this->cuentas= DB::table('chatzeus.vw_cuentas')
        //         ->where('cuenta_descripcion', 'like', $Filtro)->get(); 

        if ($this->Filtro != "") {
            $Filtro = '%'.$this->Filtro.'%';
            $Cuentas = CuentaView_::where('cuenta_descripcion', 'LIKE', $Filtro)->paginate(5);
        } else {
            // $this->total_students = CuentaView_::get();
            $Cuentas = CuentaView_::paginate(5);
        }

        return view('livewire.cuentas.lista', [
            'cuentas' => $Cuentas,
            'licencia_periodos' => $this->LicenciaPeriodos,
            'plan_licencia' => $this->PlanLicencia,
        ]);
    }
    public function updatedPlanLicenciamientoId($id){
        $this->PlanLicenciamientoId = $id;
        $this->UsuariosEditable = 'readonly';
        $this->LimiteUsuarios = 0;

        $r = DB::table('chatzeus.planes_licenciamiento')
            ->where('plan_licenciamiento_id', '=', $id)->get()->first();
        if ($r) {
            $this->UsuariosEditable = $r->usuarios_editable;
            $this->LimiteUsuarios = $r->limite_usuarios;
            if (!$r->limite_usuarios) {
                $this->limite_usuarios = $this->LimiteUsuarios_;
            }
        }
    }

    public function updatedLicenciaPeriodoId($id){
        $this->LicenciaPeriodoId = $id;

        $r = DB::table('chatzeus.licencia_periodos')
            ->where('licencia_periodo_id', '=', $id)
            ->get()
            ->first();
        if ($r) {
            $this->FechaVencimiento = Carbon::parse($this->FechaInicio)
                ->addDays($r->cantidad_dias)
                ->format('Y-m-d');   
        }
    }

   public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->CuentaDescripcion_               = null;
        $this->PlanLicenciamientoDescripcion_   = null;
        $this->LimiteUsuarios_                  = null;
        $this->LicenciaPeriodoDescripcion_      = null;
        $this->FechaInicio_                     = null;
        $this->FechaVencimiento_                = null;
        $this->PlanLicenciamientoId             = 0;
        $this->LicenciaPeriodoId                = 0;
        $this->UsuariosEditable                 = 'readonly';
    }

    // public function store()
    // {
    //     $this->validate([
	// 	'descripcion' => 'required',
	// 	'clave' => 'required',
    //     ]);

    //     $r = CatalogoOpcion_::create([
	// 		    'descripcion' => $this-> descripcion, 'clave' => $this-> clave,
    //             ]);
        
    //     $this->resetInput();
	// 	$this->emit('closeModal');
	// 	session()->flash('message', 'Tabla Successfully created.');
    // }

    public function editarCuenta($id) {

        $this->resetInput();

        $r = CuentaView_::findOrFail($id);
        $this->SelectedId = $id;
	    $this->CuentaDescripcion_             = $r-> cuenta_descripcion;
        $this->PlanLicenciamientoDescripcion_ = $r-> plan_licenciamiento_descripcion;
        $this->LimiteUsuarios_                = $r-> limite_usuarios;
        $this->LimiteUsuarios                 = $r-> limite_usuarios;
        $this->LicenciaPeriodoDescripcion_    = $r-> licencia_periodo_descripcion;
        $this->FechaInicio_                   = Carbon::parse($r-> fecha_inicio)->format('d/m/Y');
        $this->LicenciaPeriodoId              = $r-> licencia_periodo_id;
        $this->PlanLicenciamientoId           = $r-> plan_licenciamiento_id;
        $this->UsuariosEditable               = $r-> usuarios_editable;
        
        if ($r->fecha_vencimiento) {
            $this->FechaVencimiento_          = Carbon::parse($r-> fecha_vencimiento)->format('d/m/Y');
            $this->FechaInicio                = Carbon::parse($r-> fecha_vencimiento)->format('Y-m-d');
            $this->FechaVencimiento           = Carbon::parse($r-> fecha_vencimiento)->format('Y-m-d');
        } else {
            $this->FechaVencimiento_          = "";
            $this->FechaInicio                = Carbon::now()->format('Y-m-d');
            $this->FechaVencimiento           = Carbon::now()->format('Y-m-d');
        }
        
        $this->updateMode = true;
    }

    public function updatePlan() {
        if ($this->SelectedId) {
			$r = Cuenta_::find($this->SelectedId);
            $FechaVencimineto = Carbon::parse($this->FechaVencimiento)->format('Y-m-d');
            if ($this->PlanLicenciamientoId == 1) {
                $FechaVencimineto = null;
                $this->LicenciaPeriodoId = 0;
            }
            $data = [ 
                'plan_licenciamiento_id'    => $this->PlanLicenciamientoId, 
                'licencia_periodo_id'       => $this->LicenciaPeriodoId,
                'limite_usuarios'           => $this->LimiteUsuarios,
                'fecha_inicio'              => Carbon::parse($this->FechaInicio)->format('Y-m-d'),
                'fecha_vencimiento'         => $FechaVencimineto,
            ];
            $r->update($data);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    // public function destroy($id)
    // {
    //     if ($id) {
    //         $r = CatalogoOpcion_::where('catalogo_opcion_id', $id);
    //         $r->delete();
    //     }
    // }
    public function paginationView()
    {
        return 'bootstrap';
    }
}