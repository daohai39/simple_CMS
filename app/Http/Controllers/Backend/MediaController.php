<?php
namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\MediaRepositoryInterface;
use App\Contracts\Services\MediaAppServiceInterface;
use App\Http\Requests;
use App\Validators\ValidationException;
use Illuminate\Http\Request;


class MediaController extends BackendController
{
	private $medias;
    private $appService;

    public function __construct(MediaRepositoryInterface $medias, MediaAppServiceInterface $appService)
    {
        $this->medias = $medias;
        $this->appService = $appService;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request)
    {
        $media = $this->appService->uploadImage($request->file('images'));

        if($request->ajax()) {
            return $media;
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
        $this->appService->delete($id);
    }

    public function setThumbnail(Request $request)
    {
        $media = $this->appService->setThumbnail($request->all());
        return $this->medias->find($media->id);
    }
}
