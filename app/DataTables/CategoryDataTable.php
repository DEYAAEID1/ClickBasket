<?php

namespace App\DataTables;


use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     * @return \Yajra\DataTables\EloquentDataTable
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->setRowId('id')
        ->addColumn('action', function ($row) {
            return '
                 <!-- Edit Button -->
                <button type="button" class="btn btn-primary btn_edit" 
                    id="btn_edit_category"
                    data-category-id="' . $row->id . '" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editModalCategory">
                    Edit
                </button>' . 
                ' <!-- Delete Button -->
                <button type="button" class="btn btn-danger btn_delete_category"
                    data-category-id="' . $row->id . '"
                    id="btn_delete_category"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteModalCategory">
                    Delete
                </button>';
        })
        ->rawColumns(['action']);
    }



    /**
     * @param Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
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
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     *      * @return string
     */
    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}
