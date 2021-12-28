<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PlanOpcionLiga_;
use App\Models\PlanLicenciamiento_;
use Illuminate\Support\Facades\DB;

class Planesopciones extends Component
{

    public $_id, $filtro = 1, $descripcion, $limite_usuario;
    public $updateMode = false;

    public $planesopciones = null;
    public $planes = null;
    public $selPlanLicenciamientoId = null;

    public function render() {
        $this->planesopciones = DB::select('SELECT
                planes_opciones_ligas.plan_opcion_id, 
                planes_opciones_ligas.plan_licenciamiento_id, 
                planes_opciones_ligas.catalogo_opcion_id, 
                catalogo_opciones.descripcion, 
                catalogo_opciones.clave, 
                planes_opciones_ligas.activo
            FROM chatzeus.planes_opciones_ligas
            INNER JOIN chatzeus.catalogo_opciones
            ON planes_opciones_ligas.catalogo_opcion_id = catalogo_opciones.catalogo_opcion_id
            WHERE (planes_opciones_ligas.plan_licenciamiento_id = ?)
            ORDER BY planes_opciones_ligas.catalogo_opcion_id ASC;', [$this->filtro]);
        $this->getPlenes();
        return view('livewire.planesopciones.view', [
            'planesopciones' => $this->planesopciones
        ]);
    }

    private function getPlenes() {
        $this->planes = PlanLicenciamiento_::orderBy('plan_licenciamiento_id', 'asc')->get();
    }

    public function setActivar($plan_opcion_id) {
        $r = PlanOpcionLiga_::find($plan_opcion_id);
        if ($r->activo)
            $r->update([ 'activo' => false]);
        else
            $r->update([ 'activo' => true]);
    }

    public function updatedselPlanLicenciamientoId($selPlanLicenciamientoId) {
        $this->filtro = $selPlanLicenciamientoId;
    }

    public function cancel() {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->descripcion = null;
		$this->limite_usuario = null;
    }

    public function store()
    {
        $this->validate([
		'descripcion' => 'required',
		'limite_usuario' => 'required',
        ]);

        $r = PlanOpcionLiga_::create([
			    'descripcion' => $this-> descripcion, 'limite_usuario' => $this-> limite_usuario,
                ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Tabla Successfully created.');
    }

    public function edit($id)
    {
        $r = PlanOpcionLiga_::findOrFail($id);

        $this->_id = $id;
		$this->descripcion = $r-> descripcion;
		$this->limite_usuario = $r-> limite_usuario;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'descripcion' => 'required',
		'limite_usuario' => 'required',
        ]);

        if ($this->_id) {
			$r = PlanOpcionLiga_::find($this->_id);
            $r->update([ 'descripcion' => $this->descripcion, 'limite_usuario' => $this->limite_usuario ]);
            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Tabla Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $r = PlanOpcionLiga_::where('catalogo_opcion_id', $id);
            $r->delete();
        }
    }
}