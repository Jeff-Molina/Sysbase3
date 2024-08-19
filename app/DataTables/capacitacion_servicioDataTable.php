<?php

namespace App\DataTables;

use App\Models\capacitacion_servicio;
use phpseclib3\Crypt\DSA\Formats\Keys\Raw;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class capacitacion_servicioDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->addColumn('action', function(capacitacion_servicio $capacitacionServicio){
                $id = $capacitacionServicio->id;
                return view('capacitacion_servicios.datatables_actions',compact('capacitacionServicio','id'));
            })
            ->editColumn('id',function (capacitacion_servicio $capacitacionServicio){

                return $capacitacionServicio->id;

            })
            ->editColumn('cliente_id',function (capacitacion_servicio $capacitacionServicio){

                return $capacitacionServicio->cliente()->first()->nombres . ' ' . $capacitacionServicio->cliente()->first()->apellidos;

            })
            ->editColumn('fecha_diagnostico', function (capacitacion_servicio $capacitacionServicio) {
                if ($capacitacionServicio->fecha_diagnostico) {
                    return $capacitacionServicio->fecha_diagnostico->format('d/m/Y');
                }
                return '';
            })
            ->editColumn('fecha_recepcion', function (capacitacion_servicio $capacitacionServicio) {
                return date('d/m/Y', strtotime($capacitacionServicio->fecha_recepcion));
            })->editColumn('fecha_entrega', function (capacitacion_servicio $capacitacionServicio) {
                if ($capacitacionServicio->fecha_entrega) {
                    return $capacitacionServicio->fecha_entrega->format('d/m/Y');
                }
                return '';
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\capacitacion_servicio $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(capacitacion_servicio $model)
    {
        return $model->newQuery()->select($model->getTable().'.*')->with(['cliente','equipo','estado','user']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->ajax([
                'data' => "function(data) { formatDataDataTables($('#formFiltersDatatables').serializeArray(), data);   }"
                ])
                ->info(true)
                ->language(['url' => asset('js/SpanishDataTables.json')])
                ->responsive(true)
                ->stateSave(false)
                ->orderBy(1,'desc')
                ->dom('
                    <"row mb-2"
                    <"col-sm-12 col-md-6" B>
                    <"col-sm-12 col-md-6" f>
                    >
                    rt
                    <"row"
                    <"col-sm-6 order-2 order-sm-1" ip>
                    <"col-sm-6 order-1 order-sm-2 text-right" l>
                    >
                ')
                ->buttons(

                    Button::make('reset')
                        ->addClass('')
                        ->text('<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'),

                    Button::make('export')
                        ->extend('collection')
                        ->addClass('')
                        ->text('<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>')
                        ->buttons([
                            Button::make('print')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-print"></i> <span class="d-none d-sm-inline"> Imprimir</span>'),
                            Button::make('csv')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-csv"></i> <span class="d-none d-sm-inline"> Csv</span>'),
                            Button::make('pdf')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-pdf"></i> <span class="d-none d-sm-inline"> Pdf</span>'),
                            Button::make('excel')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-excel"></i> <span class="d-none d-sm-inline"> Excel</span>'),
                        ]),
                );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('cliente_id')->title('Cliente')->addClass('text-center'),
            Column::make('estado_id')->data('estado.nombre')->addClass('text-center')->title('Estado'),
            Column::make('equipo_id')->data('equipo.numero_serie')->addClass('text-center')->title('Equipo'),
            Column::make('user_id')->data('user.username')->addClass('text-center')->title('Usuario'),
            Column::make('precio')->addClass('text-center')->title('Precio'),
            Column::make('fecha_recepcion')->addClass('text-center'),
            Column::make('problema')->addClass('text-center'),
            Column::make('fecha_diagnostico')->addClass('text-center'),
            Column::make('diagnostico')->addClass('text-center'),
            Column::make('fecha_entrega')->addClass('text-center'),
            Column::make('solucion')->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width('20%')
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'capacitacion_servicios_datatable_' . time();
    }
}
