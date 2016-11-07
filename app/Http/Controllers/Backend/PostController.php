<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Post;
use Ramsey\Uuid\Uuid;
use App\Jobs\Post\CreatePost;
use App\Jobs\Post\DeletePost;
use App\Jobs\Post\UpdatePost;
use App\Traits\ExecuteCommandTrait;
use App\Contracts\DataTables\PostDataTableInterface;
use App\Contracts\Repositories\PostRepositoryInterface;

class PostController extends BackendController
{
    use ExecuteCommandTrait;

    private $posts;
    private $dataTable;

    public function __construct(PostRepositoryInterface $posts, PostDataTableInterface $dataTable)
    {
        $this->posts = $posts;
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
        $id = (string) Uuid::uuid4();

        $attributes = array_merge(['id' => $id], $request->all());
        $attributes['featured'] = ($attributes['featured'] == 'on') ? true : false;
        $attributes['status'] = ($attributes['status'] == 'on') ? Post::STATUS_PUBLISH : Post::STATUS_DRAFT;

        $this->executeCommand(new CreatePost($attributes));
        flash('Created Successfully', 'success');
        return redirect()->route('admin.post.edit', ['id' => $id]);
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
        $attributes = $request->all();
        $attributes['featured'] = ($attributes['featured'] == 'on') ? true : false;
        $attributes['status'] = ($attributes['status'] == 'on') ? Post::STATUS_PUBLISH : Post::STATUS_DRAFT;

        $this->executeCommand(new UpdatePost($id, $attributes));
        flash('Edited Successfully', 'success');
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
        $this->executeCommand(new DeletePost($id));
        flash('Deleted Successfully', 'success');
        return redirect()->route('admin.post.index');
    }
}
