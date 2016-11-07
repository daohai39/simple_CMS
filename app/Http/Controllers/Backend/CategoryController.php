<?php
namespace App\Http\Controllers\Backend;

use Ramsey\Uuid\Uuid;
use App\Traits\ExecuteCommandTrait;
use App\Jobs\Category\CreateCategory;
use App\Jobs\Category\DeleteCategory;
use App\Jobs\Category\UpdateCategory;
use App\Contracts\DataTables\CategoryDataTableInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;

use App\Http\Requests;
use Illuminate\Http\Request;

class CategoryController extends BackendController
{
    use ExecuteCommandTrait;

    private $categories;
    private $dataTable;

    public function __construct(CategoryRepositoryInterface $categories, CategoryDataTableInterface $dataTable)
    {
        $this->categories = $categories;
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
        return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()) {
            if($input = $request->input('q'))
                return $this->categories->paginateNameLike($input);
            else if($request->input('type') == 'root')
                return $this->categories->paginateRoots();
            else if($request->input('type') == 'children')
                return $this->categories->paginateChildren();
        }

        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = (string) Uuid::uuid4();
        $attributes = array_merge(['id' => $id], $request->all());

        $this->executeCommand(new CreateCategory($attributes));
        flash('Created Successfully', 'success');
        return redirect()->route('admin.category.edit', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $category = $this->categories->find($id);
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categories->find($id);
        return view('backend.category.edit', compact('category'));
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
        $this->executeCommand(new UpdateCategory($id, $request->all()));
        flash('Edited Successfully', 'success');
        return redirect()->route('admin.category.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->executeCommand(new DeleteCategory($id));
        flash('Deleted Successfully', 'success');
        return redirect()->route('admin.category.index');
    }
}
