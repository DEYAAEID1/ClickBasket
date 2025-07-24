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
     * @param QueryBuilder $query Results from query() method.
     * @return EloquentDataTable
     * 
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
             ->addColumn('action', function ($row) {
                return '
            <button type="button" class="btn btn-primary btn-eit"
            id="btn_edit_product"
            data-product-id="' . $row->id . '"
            data-bs-toggle="modal" data-bs-target="#editModalProduct">
            Edit
            </button>
                
                ';
                '<button type="button" class="btn btn-danger btn_delete_product"
                  id="btn_delete_product"
                  
                   data-product-id="' . $row->id . '"
             data-bs-toggle="modal" data-bs-target="#deleteModalProduct">
           Delete
            </button>';
            })->removeColumn(['action']);
    }

    /**
     * Get query source for dataTable.
     *
     * @param Product $model
     * @return QueryBuilder
     */


    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Get the columns for the DataTable.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
            Column::make('id'),
            Column::make('name'),
            Column::make('description'),
            Column::make('price'),
            Column::make('updated_at'),
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
                    ->orderBy(1);
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



    

