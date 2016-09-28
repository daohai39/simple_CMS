<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Contracts\Repositories\TagRepositoryInterface;
use App\Contracts\DataTables\TagDataTableInterface;
use App\Contracts\Services\TagAppServiceInterface;
use App\Validators\ValidationExceptions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TagController extends BackendController
{
    private $tags;
    private $appService;
    private $dataTable;

    public function __construct(TagRepositoryInterface $tags, TagAppServiceInterface $appService, TagDataTableInterface $dataTable)
    {
        $this->tags = $tags;
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
            return $this->dataTable->getData();
        }
        return view('backend.tag.index');
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
                return $this->tags->paginateNameLike($input);
            }
            return $this->tags->paginate();
        }
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = $this->appService->create($request->all());
        return redirect()->route('admin.tag.edit', ['id' => $tag->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = $this->tags->find($id);
        return view('backend.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->tags->find($id);
        return view('backend.tag.edit', compact('tag'));
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
        $tag = $this->appService->update($id, $request->all());
        return redirect()->route('admin.tag.edit', ['id' => $tag->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->appService->delete($id);
        return redirect()->route('admin.tag.index');
    }
}
