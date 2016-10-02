<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\DataTables\MediaDataTableInterface;
use App\Contracts\Repositories\MediaRepositoryInterface;
use App\Contracts\Services\MediaServiceInterface;
use App\Http\Requests;
use App\Validators\ValidationException;
use Illuminate\Http\Request;


class MediaController extends BackendController
{	
	private $medias;
    private $appService;
    private $dataTable;

    public function __construct(MediaRepositoryInterface $medias, MediaServiceInterface $appService, MediaDataTableInterface $dataTable)
    {
        $this->medias = $medias;
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
        return view('upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
        $this->appService->upload($request->all());
        flash('Upload successful', 'success');
        return view('backend.dashboard');
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
        //
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
        //
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
        flash('Xoá danh mục thành công', 'success');
        return redirect()->route('admin.media.index');
    }
}
