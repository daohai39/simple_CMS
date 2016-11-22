<?php
namespace App\Http\Controllers\Backend;

use Ramsey\Uuid\Uuid;
use App\Traits\ExecuteCommandTrait;
use App\Jobs\Designer\CreateDesigner;
use App\Jobs\Designer\DeleteDesigner;
use App\Jobs\Designer\UpdateDesigner;

use App\Contracts\DataTables\DesignerDataTableInterface;
use App\Contracts\Repositories\DesignerRepositoryInterface;
use App\Http\Requests;
use Illuminate\Http\Request;

class DesignerController extends BackendController
{
    use ExecuteCommandTrait;

    private $designers;
    private $dataTable;

    public function __construct(DesignerRepositoryInterface $designers, DesignerDataTableInterface $dataTable)
    {
        $this->designers = $designers;
        $this->dataTable = $dataTable;
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
        return view('backend.designer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()) {
            if($input = $request->input('q')) {
                return $this->designers->paginateNameLike($input);
            }
            return $this->designers->paginate();
        }
        return view('backend.designer.create');
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

        $this->executeCommand(new CreateDesigner($attributes));
        flash('Created Successfully', 'success');
        return redirect()->route('admin.designer.edit', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designer = $this->designers->find($id);
        $designer->load('images');
        return view('backend.designer.edit', compact('designer'));
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
        $this->executeCommand(new UpdateDesigner($id, $request->all()));
        flash('Edited Successfully', 'success');
        return redirect()->route('admin.designer.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->executeCommand(new DeleteDesigner($id));
        flash('Deleted Successfully', 'success');
        return redirect()->route('admin.designer.index');
    }
}
