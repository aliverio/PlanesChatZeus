<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PlanLicenciamiento_;
use Illuminate\Support\Facades\DB;

class Planes extends Component
{

    public $_id, $filtro, $descripcion, $limite_usuario;
    public $updateMode = false;

    public $planes = null;

    public function render()
    {
		$filtro = '%'.$this->filtro .'%';
        $this->planes = PlanLicenciamiento_::orderBy('plan_licenciamiento_id', 'asc')
                ->orWhere('descripcion', 'LIKE', $filtro)    
                ->get();
        return view('livewire.planes.view', [
            'planes' => $this->planes
        ]);
    }

    public function cancel()
    {
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

        $r = PlanLicenciamiento_::create([
			    'descripcion' => $this-> descripcion, 'limite_usuario' => $this-> limite_usuario,
                ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Tabla Successfully created.');
    }

    public function edit($id)
    {
        $r = PlanLicenciamiento_::findOrFail($id);

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
			$r = PlanLicenciamiento_::find($this->_id);
            $r->update([ 'descripcion' => $this->descripcion, 'limite_usuario' => $this->limite_usuario ]);
            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Tabla Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $r = PlanLicenciamiento_::where('catalogo_opcion_id', $id);
            $r->delete();
        }
    }
}