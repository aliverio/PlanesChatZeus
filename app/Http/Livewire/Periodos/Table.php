<?php
namespace App\Http\Livewire\Clientes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cliente;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['fitroClientes'];
    public $keyWord;
    protected $clientes = null;

    public function render(){
        $keyWord = '%'.$this->keyWord .'%';
        $this->clientes = Cliente::latest()
            ->orWhere('cliente_codigo', 'LIKE', $keyWord)
            ->orWhere('cliente_desc', 'LIKE', $keyWord)
            ->orWhere('cliente_email', 'LIKE', $keyWord)
            ->orWhere('cliente_celular', 'LIKE', $keyWord)
            ->orWhere('cliente_rfc', 'LIKE', $keyWord)
            ->orWhere('cliente_rsocial', 'LIKE', $keyWord)
            ->orWhere('cliente_domicilio', 'LIKE', $keyWord)
            ->orWhere('cliente_colonia', 'LIKE', $keyWord)
            ->orWhere('cliente_cp', 'LIKE', $keyWord)
            ->paginate(5);
        return view('clientes.table', ['clientes' => $this->clientes]);
    }

    public function fitroClientes($keyword){
        if($keyword <> '') {
            $this->keyWord = $keyword;
            $this->resetPage();
        } else {
            $this->keyWord = '';
            $this->emit('keyword_cleanup');
            $keyWord = '%'.$this->keyWord .'%';
            $this->clientes = Cliente::latest()
                ->orWhere('cliente_codigo', 'LIKE', $keyWord)
                ->orWhere('cliente_desc', 'LIKE', $keyWord)
                ->orWhere('cliente_email', 'LIKE', $keyWord)
                ->orWhere('cliente_celular', 'LIKE', $keyWord)
                ->orWhere('cliente_rfc', 'LIKE', $keyWord)
                ->orWhere('cliente_rsocial', 'LIKE', $keyWord)
                ->orWhere('cliente_domicilio', 'LIKE', $keyWord)
                ->orWhere('cliente_colonia', 'LIKE', $keyWord)
                ->orWhere('cliente_cp', 'LIKE', $keyWord)
                ->paginate(5);
        }
    }

    public function destroy($id){
        if ($id) {
            $record = Cliente::where('id', $id);
            $record->delete();
            $this->emit('msgBorrado');
        }
    }

    // public function updatingKeyWord(){
    //     $this->resetPage();
    // }


    public function paginationView() {
        return 'paginacion';
    }
}