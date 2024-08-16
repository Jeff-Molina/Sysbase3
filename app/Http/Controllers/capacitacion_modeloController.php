<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacion_modeloDataTable;
use App\Http\Requests\Createcapacitacion_modeloRequest;
use App\Http\Requests\Updatecapacitacion_modeloRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacion_modelo;
use Illuminate\Http\Request;

class capacitacion_modeloController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Modelos')->only('show');
        $this->middleware('permission:Crear Capacitacion Modelos')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Modelos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Modelos')->only('destroy');
    }
    /**
     * Display a listing of the capacitacion_modelo.
     */
    public function index(capacitacion_modeloDataTable $capacitacionModeloDataTable)
    {
    return $capacitacionModeloDataTable->render('capacitacion_modelos.index');
    }


    /**
     * Show the form for creating a new capacitacion_modelo.
     */
    public function create()
    {
        return view('capacitacion_modelos.create');
    }

    /**
     * Store a newly created capacitacion_modelo in storage.
     */
    public function store(Createcapacitacion_modeloRequest $request)
    {
        $input = $request->all();

        /** @var capacitacion_modelo $capacitacionModelo */
        $capacitacionModelo = capacitacion_modelo::create($input);

        flash()->success('Capacitacion Modelo guardado.');

        return redirect(route('capacitacionModelos.index'));
    }

    /**
     * Display the specified capacitacion_modelo.
     */
    public function show($id)
    {
        /** @var capacitacion_modelo $capacitacionModelo */
        $capacitacionModelo = capacitacion_modelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        return view('capacitacion_modelos.show')->with('capacitacionModelo', $capacitacionModelo);
    }

    /**
     * Show the form for editing the specified capacitacion_modelo.
     */
    public function edit($id)
    {
        /** @var capacitacion_modelo $capacitacionModelo */
        $capacitacionModelo = capacitacion_modelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        return view('capacitacion_modelos.edit')->with('capacitacionModelo', $capacitacionModelo);
    }

    /**
     * Update the specified capacitacion_modelo in storage.
     */
    public function update($id, Updatecapacitacion_modeloRequest $request)
    {
        /** @var capacitacion_modelo $capacitacionModelo */
        $capacitacionModelo = capacitacion_modelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        $capacitacionModelo->fill($request->all());
        $capacitacionModelo->save();

        flash()->success('Capacitacion Modelo actualizado.');

        return redirect(route('capacitacionModelos.index'));
    }

    /**
     * Remove the specified capacitacion_modelo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacion_modelo $capacitacionModelo */
        $capacitacionModelo = capacitacion_modelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        $capacitacionModelo->delete();

        flash()->success('Capacitacion Modelo eliminado.');

        return redirect(route('capacitacionModelos.index'));
    }
}
