<?php
namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\MediaRepositoryInterface;
use App\Http\Requests;
use App\Jobs\Media\ChangeThumbnail;
use App\Jobs\Media\DeleteMedia;
use App\Jobs\Media\UploadDocument;
use App\Jobs\Media\UploadImage;
use App\Traits\ExecuteCommandTrait;
use Approached\LaravelImageOptimizer\ImageOptimizer;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;


class MediaController extends BackendController
{
    use ExecuteCommandTrait;

	private $medias;

    public function __construct(MediaRepositoryInterface $medias)
    {
        $this->medias = $medias;
    }

    public function storeDocument(Request $request)
    {
        return $this->executeCommand(new UploadDocument([
            'id' => Uuid::uuid4()->toString(),
            'file' => $request->document
        ]));
    }

    public function storeImage(Request $request, ImageOptimizer $imageOptimizer)
    {
        $imageOptimizer->optimizeUploadedImageFile($request->image);
        return $this->executeCommand(new UploadImage([
            'id' => Uuid::uuid4()->toString(),
            'file' => $request->image
        ]));
    }

    public function destroy($id)
    {
        $this->executeCommand(new DeleteMedia($id));
    }

    public function changeThumbnail(Request $request)
    {
        $this->executeCommand(new ChangeThumbnail($request->all()));
        return $this->medias->image()->find($request->image_id);
    }

    public function preview($id)
    {
        $media = $this->medias->find($id);
        $file = \Storage::disk($media->disk)->get("{$media->filename}.{$media->extension}");
        return response()->make($file, 200, ['Content-Type' => $media->mime_type]);
    }
}
