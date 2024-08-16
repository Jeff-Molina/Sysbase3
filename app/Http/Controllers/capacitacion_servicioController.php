<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacion_servicioDataTable;
use App\Http\Requests\Createcapacitacion_servicioRequest;
use App\Http\Requests\Updatecapacitacion_servicioRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacion_servicio;
use Illuminate\Http\Request;

class capacitacion_servicioController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Servicios')->only('show');
        $this->middleware('permission:Crear Capacitacion Servicios')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Servicios')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Servicios')->only('destroy');
    }
    /**
     * Display a listing of the capacitacion_servicio.
     */
    public function index(capacitacion_servicioDataTable $capacitacionServicioDataTable)
    {
    return $capacitacionServicioDataTable->render('capacitacion_servicios.index');
    }


    /**
     * Show the form for creating a new capacitacion_servicio.
     */
    public function create()
    {
        return view('capacitacion_servicios.create');
    }

    /**
     * Store a newly created capacitacion_servicio in storage.
     */
    public function store(Createcapacitacion_servicioRequest $request)
    {
        $input = $request->all();

        /** @var capacitacion_servicio $capacitacionServicio */
        $capacitacionServicio = capacitacion_servicio::create($input);

        flash()->success('Capacitacion Servicio guardado.');

        return redirect(route('capacitacionServicios.index'));
    }

    /**
     * Display the specified capacitacion_servicio.
     */
    public function show($id)
    {
        /** @var capacitacion_servicio $capacitacionServicio */
        $capacitacionServicio = capacitacion_servicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        return view('capacitacion_servicios.show')->with('capacitacionServicio', $capacitacionServicio);
    }

    /**
     * Show the form for editing the specified capacitacion_servicio.
     */
    public function edit($id)
    {
        /** @var capacitacion_servicio $capacitacionServicio */
        $capacitacionServicio = capacitacion_servicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        return view('capacitacion_servicios.edit')->with('capacitacionServicio', $capacitacionServicio);
    }

    /**
     * Update the specified capacitacion_servicio in storage.
     */
    public function update($id, Updatecapacitacion_servicioRequest $request)
    {
        /** @var capacitacion_servicio $capacitacionServicio */
        $capacitacionServicio = capacitacion_servicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        $capacitacionServicio->fill($request->all());
        $capacitacionServicio->save();

        flash()->success('Capacitacion Servicio actualizado.');

        return redirect(route('capacitacionServicios.index'));
    }

    /**
     * Remove the specified capacitacion_servicio from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacion_servicio $capacitacionServicio */
        $capacitacionServicio = capacitacion_servicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        $capacitacionServicio->delete();

        flash()->success('Capacitacion Servicio eliminado.');

        return redirect(route('capacitacionServicios.index'));
    }
}
