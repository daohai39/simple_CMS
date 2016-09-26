<?php
namespace App\Http\Controllers\Backend;

use App\Contracts\DataTables\CategoryDataTableInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Services\CategoryAppServiceInterface;
use App\Http\Requests;
use App\Validators\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends BackendController
{
    private $categories;
    private $appService;
    private $dataTable;

    public function __construct(CategoryRepositoryInterface $categories, CategoryAppServiceInterface $appService, CategoryDataTableInterface $dataTable)
    {
        $this->categories = $categories;
        $this->appService = $appService;
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
            return $this->dataTable->getRootData();
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
            if($input = $request->input('q')) {
                return $this->categories->paginateNameLike($input);
            }
            return $this->categories->paginateRoots();
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
        try {
            $category = $this->appService->create($request->all());
            return redirect()->route('admin.category.show', ['id' => $category->id]);
        } catch(ValidationException $e) {
            return back()->with(['errors' => $e->getErrors()]);
        }
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
        try {
            $this->appService->update($id, $request->all());
            return redirect()->route('admin.category.show', ['id' => $id]);
        } catch(ValidationException $e) {
            return back()->with(['errors' => $e->getErrors()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->appService->delete($id);
            return redirect()->route('admin.category.index');
        } catch(ValidationException $e) {
            return back()->with(['errors' => $e->getErrors()]);
        }
    }
}
