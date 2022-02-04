<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CatalogoOpcion_;
use App\Models\PlanOpcionLiga_;
use Illuminate\Support\Facades\DB;

class Cuentas extends Component
{

    public $_id, $filtro, $descripcion, $clave;
    public $updateMode = false;

    public $cuentas = null;

    public function render()
    {
		// $this->obtenerNuevasCuentas();
        // DB::select('exec chatzeus.obtenerCuentasNuevas();');
        $filtro = '%'.$this->filtro .'%';
        $this->cuentas = DB::select('SELECT * FROM chatzeus.vw_cuentas');
        return view('livewire.cuentas.view', [
            'cuentas' => $this->cuentas
        ]);
    }

    public function obtenerNuevasCuentas(){
        // DB::insert('INSERT INTO chatzeus.cuentas (cuenta_chatzeus_id, fecha_inicio) 
        //             (SELECT id, created_at
        //                 FROM chatzeus.vw_cuentas_nuevas);');
        //Notificaciòn de Actualizaciòn de Cuentas
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