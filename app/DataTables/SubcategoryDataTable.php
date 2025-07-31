<?php

namespace App\DataTables;

use App\Models\Category\Subcategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubcategoryDataTable extends DataTable
{

    public $category_id;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', function ($row) {
                return '
                     <!-- Edit Button -->
                    <button type="button" class="btn btn-primary btn_edit" 
                        id="btn_edit_subcategory"
                        data-subcategory-id="' . $row->id . '" 
                        data-bs-toggle="modal" 
                        data-bs-target="#editModalSubcategory">
                        Edit
                    </button>' .
                    ' <!-- Delete Button -->
                    <button type="button" class="btn btn-danger btn_delete_subcategory"
                        data-subcategory-id="' . $row->id . '"
                        id="btn_delete_subcategory" 
                        data-bs-toggle="modal"
                    data-bs-target="#deleteModalSubcategory"
                        > Delete </button>';
            })->rawColumns(['action']);
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param Subcategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Subcategory $model): QueryBuilder
    {
        return $model->newQuery()->where('category_id', $this->category_id);
    }

    /**
     * Optional method if you want to use the html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
     public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('category-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel')->className('btn btn-success me-1'),
                        Button::make('csv')->className('btn btn-info me-1'),
                        Button::make('pdf')->className('btn btn-danger me-1'),
                        Button::make('print')->className('btn btn-warning me-1'),
                        Button::make([
                            'text' => 'Reload',
                            'action' => 'function (e, dt, node, config) { dt.ajax.reload(); }',
                            'className' => 'btn btn-secondary'
                        ])
                    ]);

    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
         return [
            Column::make('id'),
            Column::make('name'),
            Column::make('description'),            
            Column::computed('action')
                  ->exportable(true)
                  ->printable(true)
                  ->width(120)
                  ->addClass('text-center'),
        ];
    }
    

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Subcategory_' . date('YmdHis');
    }
}
