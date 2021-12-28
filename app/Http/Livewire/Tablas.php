<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tabla;

class Tablas extends Component
{

    public $selected_id, $keyWord, $descripcion, $valor, $campos;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tablas.view', [
            'tablas' => Tabla::all()
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
		$this->valor = null;
		$this->campos = null;
    }

    public function store()
    {
        $this->validate([
		'descripcion' => 'required',
		'valor' => 'required',
		'campos' => 'required',
        ]);

        Tabla::create([
			'descripcion' => $this-> descripcion,
			'valor' => $this-> valor,
			'campos' => $this-> campos
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Tabla Successfully created.');
    }

    public function edit($id)
    {
        $record = Tabla::findOrFail($id);

        $this->selected_id = $id;
		$this->descripcion = $record-> descripcion;
		$this->valor = $record-> valor;
		$this->campos = $record-> campos;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'descripcion' => 'required',
		'valor' => 'required',
		'campos' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Tabla::find($this->selected_id);
            $record->update([
			'descripcion' => $this->descripcion,
			'valor' => $this->valor,
			'campos' => $this->campos
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Tabla Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Tabla::where('id', $id);
            $record->delete();
        }
    }
}