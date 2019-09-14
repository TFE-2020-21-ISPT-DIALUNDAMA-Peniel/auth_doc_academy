<?php

namespace App\DataTables;

use App\Models\Document;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class ListDocumentsDataTable extends DataTable
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
            ->addColumn('action', function($query){
                return '<a href="'.route('show_document',$query->ref).'" class="btn btn-primary"><span class="fa fa-eye"></span>Visualiser</a>'
                .
                ' <a href="'.route('destroy_document',$query->ref).'" class="btn btn-danger" onclick="if(confirm(\'Voulez-vous vraiment supprimé ce document ?\')){return true}else{return false}"><span class="fa fa-trash"></span>Supprimer</a>'
                ;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ListDocument $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Document $model)
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
                    ->setTableId('listdocuments-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()

                    // ->dom('Bfrtip')
                    ->orderBy(1);

                    // ->buttons(
                    //     Button::make('create'),
                    //     Button::make('export'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            
            // Column::make('id'),
            // Column::make('file'),
            Column::make('ref')->title('N° Réference de code barre'),
            Column::computed('action','Visualiser')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
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
        return 'ListDocuments_' . date('YmdHis');
    }
}
