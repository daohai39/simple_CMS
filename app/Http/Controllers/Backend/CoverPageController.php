<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\DataTables\CoverPageDataTableInterface;
use App\Contracts\Repositories\CoverPageRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Jobs\CoverPage\CreateCoverPage;
use App\Jobs\CoverPage\DeleteCoverPage;
use App\Jobs\CoverPage\UpdateCoverPage;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CoverPageController extends Controller
{
    use ExecuteCommandTrait;

    protected $coverPages;
    protected $dataTable;

    public function __construct(CoverPageRepositoryInterface $coverPages, CoverPageDataTableInterface $dataTable)
    {
        $this->coverPages = $coverPages;
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
        return view('backend.cover_page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cover_page.create');
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
        $attributes = [
            'id' => $id,
            'heading' => $request->heading,
            'content' => $request->content,
            'url' => $request->url,
            'image_id' => $request->images_id,
        ];

        $this->executeCommand(new CreateCoverPage($attributes));
        flash('Created Successfully', 'success');
        return redirect()->route('admin.cover-page.edit', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coverPage = $this->coverPages->find($id);
        $coverPage->load('images');
        return view('backend.cover_page.edit', compact('coverPage'));
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
        $attributes = [
            'heading' => $request->heading,
            'content' => $request->content,
            'url' => $request->url,
            'image_id' => $request->images_id,
        ];

        $this->executeCommand(new UpdateCoverPage($id, $attributes));
        flash('Edited Successfully', 'success');
        return redirect()->route('admin.cover-page.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->executeCommand(new DeleteCoverPage($id));
        flash('Deleted Successfully', 'success');
        return redirect()->route('admin.cover-page.index');
    }
}
