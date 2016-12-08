<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\DataTables\ProjectDataTableInterface;
use App\Contracts\Repositories\CustomerRepositoryInterface;
use App\Contracts\Repositories\ProjectRepositoryInterface;
use App\Jobs\Project\CreateProject;
use App\Jobs\Project\DeleteProject;
use App\Jobs\Project\UpdateProject;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ProjectController extends BackendController
{
    use ExecuteCommandTrait;


    private $projects;
    private $dataTable;
    private $customers;

    public function __construct(ProjectRepositoryInterface $projects, ProjectDataTableInterface $dataTable, CustomerRepositoryInterface $customers)
    {
        $this->projects = $projects;
        $this->dataTable = $dataTable;
        $this->customers = $customers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return $this->dataTable->getData();
        }
        return view('backend.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.project.create');
    }

    public function show($id)
    {
        $project = $this->projects->find($id);
        return view('backend.project.show', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Uuid::uuid4()->toString();
        $attributes = array_merge($request->all(), [
            'id' => $id,
            'customer_id' => $this->customers->firstOrcreate(['name' => $request->customer])->id,
        ]);

        $this->executeCommand(new CreateProject($attributes));
        flash('Create Successfully', 'success');
        return redirect()->route('admin.project.edit', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = $this->projects->find($id);
        return view('backend.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = array_merge($request->all(), [
            'customer_id' => $this->customers->firstOrcreate(['name' => $request->customer])->id,
        ]);

        $this->executeCommand(new UpdateProject($id, $attributes));
        flash('Edited Successfully', 'success');
        return redirect()->route('admin.project.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->executeCommand(new DeleteProject($id));
        flash('Delete Successfully', 'success');
        return redirect()->route('admin.project.index');
    }
}
