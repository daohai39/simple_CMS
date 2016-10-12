<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Contracts\Repositories\PostRepositoryInterface;
use App\Contracts\DataTables\PostDataTableInterface;
use App\Contracts\Services\PostAppServiceInterface;
use App\Validators\ValidationExceptions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends BackendController
{
    private $posts;
    private $appService;
    private $dataTable;

    public function __construct(PostRepositoryInterface $posts, PostAppServiceInterface $appService, PostDataTableInterface $dataTable)
    {
        $this->posts = $posts;
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
        return view('backend.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $this->appService->create($request->all());
        flash('Tạo bài viết thành công', 'success');
        return redirect()->route('admin.post.edit', ['id' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->posts->find($id);
        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->posts->find($id);
        $post->load('images');
        return view('backend.post.edit', compact('post'));
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
        flash('Sửa bài viết thành công', 'success');
        return redirect()->route('admin.post.edit', ['id' => $id]);
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
        flash('Xoá bài viết thành công', 'success');
        return redirect()->route('admin.post.index');
    }
}
