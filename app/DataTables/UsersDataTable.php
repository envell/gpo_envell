<?php

namespace App\DataTables;

use App\User;
use Yajra\Datatables\Services\DataTable;

class UsersDataTable extends DataTable
{
    // protected $printPreview  = 'path.to.print.preview.view';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
public function ajax()
{
    return $this->datatables
        ->eloquent($this->query())
        ->make(true);
}

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
public function query()
{
    $users = User::select();

    return $this->applyScopes($users);
}

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
public function html()
{
    return $this->builder()
        ->columns([
            'lastname',
            'name',
            'middlename',
            'post',
            'phone_number',
            'email',
        ])
        ->parameters([
            'dom' => 'Bfrtip',
            'buttons' => ['csv', 'excel', 'print', 'reset', 'reload'],      
        ]);
}
    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
        'lastname',
            'name',
            'middlename',
            'post',
            'phone_number',
            'email',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users';
    }
}
