<?php

namespace App\DataTables;

use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{

    /**
     *@return \Yajra\DataTables\EloquentDataTable
     * @param QueryBuilder $query Results from query() method.
     * 
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('subcategory_name', function ($row) {

                return $row->subcategory ? $row->subcategory->name : 'غير معروف';
            })
            ->addColumn('short_description', function ($row) {
                return $row->short_description;
            })
            ->addColumn('action', function ($row) {
                return '
            <button type="button" class="btn btn-primary btn-edit"
        id="btn_edit_product"
        data-product-id="' . $row->id . '"
        data-bs-toggle="modal" data-bs-target="#editModalproduct">
              Edit
           </button>
            ' .


        '<button type="button" class="btn btn-danger btn_delete_product"
         id="btn_delete_product"
           data-product-id="' . $row->id . '"
           data-id={{ $id }}
             data-bs-toggle="modal" data-bs-target="#deleteModalproduct">
              Delete
            </button>';
            })->rawColumns(['action']);
    }

    /**
     * Get query source for dataTable.
     *
     * @param Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */


    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery('subcategory');
    }


     /**
     * Get the columns for the DataTable.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('name'),
            Column::make('description'),
            Column::make('subcategory_name'),
            Column::make('price'),
            Column::make('is_active'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Optional method if you want to use the html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make([
                    'text' => 'Reload',
                    'action' => 'function (e, dt, node, config) { dt.ajax.reload(); }',
                    'className' => 'btn btn-secondary'
                ])
            ]);
    }
   

    /**
     * Get the filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
