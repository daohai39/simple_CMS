<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\DataTables\DesignerDataTableInterface;
use App\Contracts\Repositories\DesignerRepositoryInterface;
use App\Contracts\Services\DesignerAppServiceInterface;
use App\Http\Requests;
use Illuminate\Http\Request;

class DesignerController extends BackendController
{
    private $designers;
    private $appService;
    private $dataTable;

    public function __construct(DesignerRepositoryInterface $designers, DesignerAppServiceInterface $appService, DesignerDataTableInterface $dataTable)
    {
        $this->designers = $designers;
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
        return view('backend.designer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $designer = $this->appService->create($request->all());
        flash('Created Successfully', 'success');
        return redirect()->route('admin.designer.edit', ['id' => $designer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->appService->update($id, $request->all());
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
        $this->appService->delete($id);
        flash('Deleted Successfully', 'success');
        return redirect()->route('admin.designer.index');
    }
}
