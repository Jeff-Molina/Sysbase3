<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacion_clienteDataTable;
use App\Http\Requests\Createcapacitacion_clienteRequest;
use App\Http\Requests\Updatecapacitacion_clienteRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacion_cliente;
use Illuminate\Http\Request;

class capacitacion_clienteController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Clientes')->only('show');
        $this->middleware('permission:Crear Capacitacion Clientes')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Clientes')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Clientes')->only('destroy');
    }
    /**
     * Display a listing of the capacitacion_cliente.
     */
    public function index(capacitacion_clienteDataTable $capacitacionClienteDataTable)
    {
    return $capacitacionClienteDataTable->render('capacitacion_clientes.index');
    }


    /**
     * Show the form for creating a new capacitacion_cliente.
     */
    public function create()
    {
        return view('capacitacion_clientes.create');
    }

    /**
     * Store a newly created capacitacion_cliente in storage.
     */
    public function store(Createcapacitacion_clienteRequest $request)
    {
        $input = $request->all();

        /** @var capacitacion_cliente $capacitacionCliente */
        $capacitacionCliente = capacitacion_cliente::create($input);

        flash()->success('Capacitacion Cliente guardado.');

        return redirect(route('capacitacionClientes.index'));
    }

    /**
     * Display the specified capacitacion_cliente.
     */
    public function show($id)
    {
        /** @var capacitacion_cliente $capacitacionCliente */
        $capacitacionCliente = capacitacion_cliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        return view('capacitacion_clientes.show')->with('capacitacionCliente', $capacitacionCliente);
    }

    /**
     * Show the form for editing the specified capacitacion_cliente.
     */
    public function edit($id)
    {
        /** @var capacitacion_cliente $capacitacionCliente */
        $capacitacionCliente = capacitacion_cliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        return view('capacitacion_clientes.edit')->with('capacitacionCliente', $capacitacionCliente);
    }

    /**
     * Update the specified capacitacion_cliente in storage.
     */
    public function update($id, Updatecapacitacion_clienteRequest $request)
    {
        /** @var capacitacion_cliente $capacitacionCliente */
        $capacitacionCliente = capacitacion_cliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        $capacitacionCliente->fill($request->all());
        $capacitacionCliente->save();

        flash()->success('Capacitacion Cliente actualizado.');

        return redirect(route('capacitacionClientes.index'));
    }

    /**
     * Remove the specified capacitacion_cliente from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacion_cliente $capacitacionCliente */
        $capacitacionCliente = capacitacion_cliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        $capacitacionCliente->delete();

        flash()->success('Capacitacion Cliente eliminado.');

        return redirect(route('capacitacionClientes.index'));
    }
}
