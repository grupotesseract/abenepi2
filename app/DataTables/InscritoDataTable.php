<?php

namespace App\DataTables;

use App\Models\Inscrito;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class InscritoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'inscritos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Inscrito $model)
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
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'title' => 'Ação'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner', 'text'    => '<i class="fa fa-print"></i> Criar Novo',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner', 'text'    => '<i class="fa fa-print"></i> Exportar',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner', 'text'    => '<i class="fa fa-print"></i> Imprimir',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner', 'text'    => '<i class="fa fa-print"></i> Atualizar',],
                ],
                'language' => ['url' => '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'],
            ]);

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'nome',
            'compareceu',
            'pagou',
            'cidade',
            'estado',
            'cpf',
            'profissao',
            'endereco',
            'bairro',
            'numero',
            'complemento',
            'cep',
            'email',
            'senha',
            'cidade',
            'estado',
            'telefone',
            'nascimento',
            'valor',
            'created_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'inscritosdatatable_' . time();
    }
}
