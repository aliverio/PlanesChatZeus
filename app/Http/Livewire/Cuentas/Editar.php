<?php
namespace App\Http\Livewire\Cuentas;

use App\Models\Cuenta_;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Editar extends Component {

    protected $listeners = ['editarCuenta'];
    public $cuenta;

    public function render() {
        return view('livewire.cuentas.editar');
    }

    public function mount($id)
    {
        $this->cuenta = \App\Cuenta_::find($id);
    }

    public function newPost($postId)
    {
        dd($cuenta);
    }
}