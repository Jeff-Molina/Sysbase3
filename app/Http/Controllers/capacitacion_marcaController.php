<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacion_marcaDataTable;
use App\Http\Requests\Createcapacitacion_marcaRequest;
use App\Http\Requests\Updatecapacitacion_marcaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacion_marca;
use Illuminate\Http\Request;

class capacitacion_marcaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Marcas')->only('show');
        $this->middleware('permission:Crear Capacitacion Marcas')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Marcas')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Marcas')->only('destroy');
    }
    /**
     * Display a listing of the capacitacion_marca.
     */
    public function index(capacitacion_marcaDataTable $capacitacionMarcaDataTable)
    {
    return $capacitacionMarcaDataTable->render('capacitacion_marcas.index');
    }


    /**
     * Show the form for creating a new capacitacion_marca.
     */
    public function create()
    {
        return view('capacitacion_marcas.create');
    }

    /**
     * Store a newly created capacitacion_marca in storage.
     */
    public function store(Createcapacitacion_marcaRequest $request)
    {
        $input = $request->all();

        /** @var capacitacion_marca $capacitacionMarca */
        $capacitacionMarca = capacitacion_marca::create($input);

        flash()->success('Capacitacion Marca guardado.');

        return redirect(route('capacitacionMarcas.index'));
    }

    /**
     * Display the specified capacitacion_marca.
     */
    public function show($id)
    {
        /** @var capacitacion_marca $capacitacionMarca */
        $capacitacionMarca = capacitacion_marca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        return view('capacitacion_marcas.show')->with('capacitacionMarca', $capacitacionMarca);
    }

    /**
     * Show the form for editing the specified capacitacion_marca.
     */
    public function edit($id)
    {
        /** @var capacitacion_marca $capacitacionMarca */
        $capacitacionMarca = capacitacion_marca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        return view('capacitacion_marcas.edit')->with('capacitacionMarca', $capacitacionMarca);
    }

    /**
     * Update the specified capacitacion_marca in storage.
     */
    public function update($id, Updatecapacitacion_marcaRequest $request)
    {
        /** @var capacitacion_marca $capacitacionMarca */
        $capacitacionMarca = capacitacion_marca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        $capacitacionMarca->fill($request->all());
        $capacitacionMarca->save();

        flash()->success('Capacitacion Marca actualizado.');

        return redirect(route('capacitacionMarcas.index'));
    }

    /**
     * Remove the specified capacitacion_marca from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacion_marca $capacitacionMarca */
        $capacitacionMarca = capacitacion_marca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        $capacitacionMarca->delete();

        flash()->success('Capacitacion Marca eliminado.');

        return redirect(route('capacitacionMarcas.index'));
    }
}
