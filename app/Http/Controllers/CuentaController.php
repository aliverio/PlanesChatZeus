<?php
namespace App\Http\Controllers;


use App\Models\Cuenta_;
use Illuminate\Http\Request;

class CuentaController extends Controller {

    public function index() {
        return view('livewire.cuentas.index');
    }

    public function create() {
        $cliente = new Cliente();
        return view('clientes.create', compact('cliente'));
    }

    public function store(Request $request) {
        $r = request()->validate(Cliente::$rules);
        $cliente = Cliente::create($request->all());
        return redirect()->route('clientes.index')
            ->with('success', 'Ok');
    }

    public function show($id) {
        $cuenta = Cuneta::find($id);
        return view('cuentas.show', compact('cuenta'));
    }

    public function editar($id) {
        $cliente = Cuenta_::find($id);
        return view('cuentas.editar', compact('cuenta'));
    }

    public function update(Request $request, Cliente $cliente) {
        request()->validate(Cliente::$rules);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')
            ->with('success', 'Ok');
    }

    public function destroy($id){
        $cliente = Cliente::find($id)->delete();
        return redirect()->route('clientes.index')
            ->with('success', 'Ok');
    }
}
