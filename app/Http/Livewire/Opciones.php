<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CatalogoOpcion_;
use App\Models\PlanOpcionLiga_;
use Illuminate\Support\Facades\DB;

class Opciones extends Component
{

    public $_id, $filtro, $descripcion, $clave;
    public $updateMode = false;

    public $opciones = null;

    public function render()
    {
		$filtro = '%'.$this->filtro .'%';
        $this->opciones = CatalogoOpcion_::orderBy('catalogo_opcion_id', 'asc')
                ->orWhere('descripcion', 'LIKE', $filtro)    
                ->get();
        return view('livewire.opciones.view', [
            'opciones' => $this->opciones
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
		$this->clave = null;
    }

    public function store()
    {
        $this->validate([
		'descripcion' => 'required',
		'clave' => 'required',
        ]);

        $r = CatalogoOpcion_::create([
			    'descripcion' => $this-> descripcion, 'clave' => $this-> clave,
                ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Tabla Successfully created.');
    }

    public function edit($id)
    {
        $r = CatalogoOpcion_::findOrFail($id);

        $this->_id = $id;
		$this->descripcion = $r-> descripcion;
		$this->clave = $r-> clave;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'descripcion' => 'required',
		'clave' => 'required',
        ]);

        if ($this->_id) {
			$r = CatalogoOpcion_::find($this->_id);
            $r->update([ 'descripcion' => $this->descripcion, 'clave' => $this->clave ]);
            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Tabla Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $r = CatalogoOpcion_::where('catalogo_opcion_id', $id);
            $r->delete();
        }
    }
}