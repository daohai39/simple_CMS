<?php

namespace App\Http\Controllers\Backend;

use App\Jobs\Tag\DeleteTag;
use App\Traits\ExecuteCommandTrait;
use App\Contracts\DataTables\TagDataTableInterface;
use App\Contracts\Repositories\TagRepositoryInterface;

use App\Http\Requests;
use Illuminate\Http\Request;

class TagController extends BackendController
{
    use ExecuteCommandTrait;

    private $tags;
    private $dataTable;

    public function __construct(TagRepositoryInterface $tags, TagDataTableInterface $dataTable)
    {
        $this->tags = $tags;
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
        if($input = $request->input('q')) {
            return $this->tags->paginateNameLike($input);
        }
        return $this->tags->paginate();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->executeCommand(new DeleteTag($id));
        return redirect()->route('admin.tag.index');
    }
}
