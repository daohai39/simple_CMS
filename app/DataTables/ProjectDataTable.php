<?php
namespace App\DataTables;

use App\Project;
use App\Contracts\DataTables\ProjectDataTableInterface;

class ProjectDataTable extends AbstractDataTable implements ProjectDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'project';
    }

    public function getData($columns = ['*'])
    {
        $projects = Project::with('customer')->select($columns);

        return self::of($projects)
            ->addColumn('status', function($project) {
                if($project->isCompleted)
                    return '<span class="label label-success">Completed</span>';
                else
                    return '<span class="label label-warning">Incomplete</span>';
            })
            ->addColumn('customer', function ($project) {
                if($customer = $project->customer) {
                    return '<a href="'.route('admin.customer.edit', ['id' => $customer->id]).'">'.$customer->name.'</a>';
                }
                return 'No Customer';
            })
            ->hasActions(['update', 'delete'])
            ->make();
    }
}
