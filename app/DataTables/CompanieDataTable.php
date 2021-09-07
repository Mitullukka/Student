<?php

namespace App\DataTables;

use App\Models\Companie;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompanieDataTable extends DataTable
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
            ->addColumn('action', function($data){
                $btn = "";
                $btn = '<a href="'.route('companies.edit',$data->id).'" class="edit btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                <form method="POST" style="display:inline-block" action="'.route('companies.destroy',$data->id).'">
                '.csrf_field().'
                '.method_field('DELETE').'
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </form>';
                return $btn;
            })->addColumn('logo',function($data){            
                $url = asset('uploads/'.$data->logo);               
                return '<img src="'.$url.'" width="100px" height="100px">';
            })
            ->rawColumns(['action','logo'])
            ->addIndexColumn();
    }   
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Companie $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Companie $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('companie-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
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
            Column::make('no')->data('DT_RowIndex')->searchable(false)->orderable(false),
            Column::make('id')->hidden(true),
            Column::make('name'),
            Column::make('email'),
            Column::make('logo'),
            Column::make('website'),
            
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Companie_' . date('YmdHis');
    }
}
