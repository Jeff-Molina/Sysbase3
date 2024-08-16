<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacion_tipoDataTable;
use App\Http\Requests\Createcapacitacion_tipoRequest;
use App\Http\Requests\Updatecapacitacion_tipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacion_tipo;
use Illuminate\Http\Request;

class capacitacion_tipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Tipos')->only('show');
        $this->middleware('permission:Crear Capacitacion Tipos')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Tipos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Tipos')->only('destroy');
    }
    /**
     * Display a listing of the capacitacion_tipo.
     */
    public function index(capacitacion_tipoDataTable $capacitacionTipoDataTable)
    {
    return $capacitacionTipoDataTable->render('capacitacion_tipos.index');
    }


    /**
     * Show the form for creating a new capacitacion_tipo.
     */
    public function create()
    {
        return view('capacitacion_tipos.create');
    }

    /**
     * Store a newly created capacitacion_tipo in storage.
     */
    public function store(Createcapacitacion_tipoRequest $request)
    {
        $input = $request->all();

        /** @var capacitacion_tipo $capacitacionTipo */
        $capacitacionTipo = capacitacion_tipo::create($input);

        flash()->success('Capacitacion Tipo guardado.');

        return redirect(route('capacitacionTipos.index'));
    }

    /**
     * Display the specified capacitacion_tipo.
     */
    public function show($id)
    {
        /** @var capacitacion_tipo $capacitacionTipo */
        $capacitacionTipo = capacitacion_tipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        return view('capacitacion_tipos.show')->with('capacitacionTipo', $capacitacionTipo);
    }

    /**
     * Show the form for editing the specified capacitacion_tipo.
     */
    public function edit($id)
    {
        /** @var capacitacion_tipo $capacitacionTipo */
        $capacitacionTipo = capacitacion_tipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        return view('capacitacion_tipos.edit')->with('capacitacionTipo', $capacitacionTipo);
    }

    /**
     * Update the specified capacitacion_tipo in storage.
     */
    public function update($id, Updatecapacitacion_tipoRequest $request)
    {
        /** @var capacitacion_tipo $capacitacionTipo */
        $capacitacionTipo = capacitacion_tipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        $capacitacionTipo->fill($request->all());
        $capacitacionTipo->save();

        flash()->success('Capacitacion Tipo actualizado.');

        return redirect(route('capacitacionTipos.index'));
    }

    /**
     * Remove the specified capacitacion_tipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacion_tipo $capacitacionTipo */
        $capacitacionTipo = capacitacion_tipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        $capacitacionTipo->delete();

        flash()->success('Capacitacion Tipo eliminado.');

        return redirect(route('capacitacionTipos.index'));
    }
}
