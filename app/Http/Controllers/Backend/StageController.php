<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\StageRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Jobs\Stage\CreateStage;
use App\Jobs\Stage\DeleteStage;
use App\Jobs\Stage\UpdateStage;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class StageController extends Controller
{
    use ExecuteCommandTrait;

    private $stages;

    public function __construct(StageRepositoryInterface $stages)
    {
        $this->stages = $stages;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.stage.create', ['project_id' => $request->project_id]);
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
        $attributes = array_merge(['id' => $id], $request->all());
        $attributes['paid'] = ($request->has('paid') && $request->paid =='on') ? true : false;

        $this->executeCommand(new CreateStage($attributes));
        return redirect()->route('admin.stage.edit', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stage = $this->stages->find($id);
        $stage->load('images');
        $stage->load('documents');
        return view('backend.stage.edit', compact('stage'));
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
        $attributes = $request->all();
        $attributes['paid'] = ($request->has('paid') && $request->paid =='on') ? true : false;

        $this->executeCommand(new UpdateStage($id, $attributes));
        return redirect()->route('admin.stage.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = $this->stages->find($id)->project;
        $this->executeCommand(new DeleteStage($id));
        return redirect()->route('admin.project.edit', ['id' => $project->id]);
    }
}
