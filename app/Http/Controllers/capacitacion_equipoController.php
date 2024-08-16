<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacion_equipoDataTable;
use App\Http\Requests\Createcapacitacion_equipoRequest;
use App\Http\Requests\Updatecapacitacion_equipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacion_equipo;
use Illuminate\Http\Request;

class capacitacion_equipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Equipos')->only('show');
        $this->middleware('permission:Crear Capacitacion Equipos')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Equipos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Equipos')->only('destroy');
    }
    /**
     * Display a listing of the capacitacion_equipo.
     */
    public function index(capacitacion_equipoDataTable $capacitacionEquipoDataTable)
    {
    return $capacitacionEquipoDataTable->render('capacitacion_equipos.index');
    }


    /**
     * Show the form for creating a new capacitacion_equipo.
     */
    public function create()
    {
        return view('capacitacion_equipos.create');
    }

    /**
     * Store a newly created capacitacion_equipo in storage.
     */
    public function store(Createcapacitacion_equipoRequest $request)
    {
        $input = $request->all();

        /** @var capacitacion_equipo $capacitacionEquipo */
        $capacitacionEquipo = capacitacion_equipo::create($input);

        flash()->success('Capacitacion Equipo guardado.');

        return redirect(route('capacitacionEquipos.index'));
    }

    /**
     * Display the specified capacitacion_equipo.
     */
    public function show($id)
    {
        /** @var capacitacion_equipo $capacitacionEquipo */
        $capacitacionEquipo = capacitacion_equipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        return view('capacitacion_equipos.show')->with('capacitacionEquipo', $capacitacionEquipo);
    }

    /**
     * Show the form for editing the specified capacitacion_equipo.
     */
    public function edit($id)
    {
        /** @var capacitacion_equipo $capacitacionEquipo */
        $capacitacionEquipo = capacitacion_equipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        return view('capacitacion_equipos.edit')->with('capacitacionEquipo', $capacitacionEquipo);
    }

    /**
     * Update the specified capacitacion_equipo in storage.
     */
    public function update($id, Updatecapacitacion_equipoRequest $request)
    {
        /** @var capacitacion_equipo $capacitacionEquipo */
        $capacitacionEquipo = capacitacion_equipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        $capacitacionEquipo->fill($request->all());
        $capacitacionEquipo->save();

        flash()->success('Capacitacion Equipo actualizado.');

        return redirect(route('capacitacionEquipos.index'));
    }

    /**
     * Remove the specified capacitacion_equipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacion_equipo $capacitacionEquipo */
        $capacitacionEquipo = capacitacion_equipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        $capacitacionEquipo->delete();

        flash()->success('Capacitacion Equipo eliminado.');

        return redirect(route('capacitacionEquipos.index'));
    }
}
