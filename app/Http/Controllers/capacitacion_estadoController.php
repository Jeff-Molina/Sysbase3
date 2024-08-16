<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacion_estadoDataTable;
use App\Http\Requests\Createcapacitacion_estadoRequest;
use App\Http\Requests\Updatecapacitacion_estadoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacion_estado;
use Illuminate\Http\Request;

class capacitacion_estadoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Estados')->only('show');
        $this->middleware('permission:Crear Capacitacion Estados')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Estados')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Estados')->only('destroy');
    }
    /**
     * Display a listing of the capacitacion_estado.
     */
    public function index(capacitacion_estadoDataTable $capacitacionEstadoDataTable)
    {
    return $capacitacionEstadoDataTable->render('capacitacion_estados.index');
    }


    /**
     * Show the form for creating a new capacitacion_estado.
     */
    public function create()
    {
        return view('capacitacion_estados.create');
    }

    /**
     * Store a newly created capacitacion_estado in storage.
     */
    public function store(Createcapacitacion_estadoRequest $request)
    {
        $input = $request->all();

        /** @var capacitacion_estado $capacitacionEstado */
        $capacitacionEstado = capacitacion_estado::create($input);

        flash()->success('Capacitacion Estado guardado.');

        return redirect(route('capacitacionEstados.index'));
    }

    /**
     * Display the specified capacitacion_estado.
     */
    public function show($id)
    {
        /** @var capacitacion_estado $capacitacionEstado */
        $capacitacionEstado = capacitacion_estado::find($id);

        if (empty($capacitacionEstado)) {
            flash()->error('Capacitacion Estado no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        return view('capacitacion_estados.show')->with('capacitacionEstado', $capacitacionEstado);
    }

    /**
     * Show the form for editing the specified capacitacion_estado.
     */
    public function edit($id)
    {
        /** @var capacitacion_estado $capacitacionEstado */
        $capacitacionEstado = capacitacion_estado::find($id);

        if (empty($capacitacionEstado)) {
            flash()->error('Capacitacion Estado no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        return view('capacitacion_estados.edit')->with('capacitacionEstado', $capacitacionEstado);
    }

    /**
     * Update the specified capacitacion_estado in storage.
     */
    public function update($id, Updatecapacitacion_estadoRequest $request)
    {
        /** @var capacitacion_estado $capacitacionEstado */
        $capacitacionEstado = capacitacion_estado::find($id);

        if (empty($capacitacionEstado)) {
            flash()->error('Capacitacion Estado no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        $capacitacionEstado->fill($request->all());
        $capacitacionEstado->save();

        flash()->success('Capacitacion Estado actualizado.');

        return redirect(route('capacitacionEstados.index'));
    }

    /**
     * Remove the specified capacitacion_estado from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacion_estado $capacitacionEstado */
        $capacitacionEstado = capacitacion_estado::find($id);

        if (empty($capacitacionEstado)) {
            flash()->error('Capacitacion Estado no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        $capacitacionEstado->delete();

        flash()->success('Capacitacion Estado eliminado.');

        return redirect(route('capacitacionEstados.index'));
    }
}
