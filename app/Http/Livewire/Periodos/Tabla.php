<?php

namespace App\Http\Livewire\Periodos;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Tabla extends Component
{
    public $_id, $filtro, $descripcion, $clave;
    public $updateMode = false;

    public $licencia_periodos = null;

    public function render()
    {
		$filtro = '%'.$this->filtro .'%';
        $this->periodos = DB::select('SELECT * FROM chatzeus.licencia_periodos');
        return view('livewire.periodos.view', [
            'periodos' => $this->periodos
        ]);
    }

    // public function cancel()
    // {
    //     $this->resetInput();
    //     $this->updateMode = false;
    // }

    // private function resetInput()
    // {
	// 	$this->descripcion = null;
	// 	$this->clave = null;
    // }

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

    // public function edit($id)
    // {
    //     $r = CatalogoOpcion_::findOrFail($id);

    //     $this->_id = $id;
	// 	$this->descripcion = $r-> descripcion;
	// 	$this->clave = $r-> clave;

    //     $this->updateMode = true;
    // }

    // public function update()
    // {
    //     $this->validate([
	// 	'descripcion' => 'required',
	// 	'clave' => 'required',
    //     ]);

    //     if ($this->_id) {
	// 		$r = CatalogoOpcion_::find($this->_id);
    //         $r->update([ 'descripcion' => $this->descripcion, 'clave' => $this->clave ]);
    //         $this->resetInput();
    //         $this->updateMode = false;
	// 		session()->flash('message', 'Tabla Successfully updated.');
    //     }
    // }

    // public function destroy($id)
    // {
    //     if ($id) {
    //         $r = CatalogoOpcion_::where('catalogo_opcion_id', $id);
    //         $r->delete();
    //     }
    // }
}