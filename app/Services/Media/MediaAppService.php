<?php
namespace App\Services\Media;

use App\Contracts\Repositories\MediaRepositoryInterface;
use App\Contracts\Services\MediaAppServiceInterface;
use App\Contracts\Validators\MediaValidatorInterface;
use App\Media;
use Illuminate\Http\Request;
use MediaUploader;


class MediaAppService implements MediaAppServiceInterface
{
    const UPLOAD_IMAGES_DISK = 'image';
    private $medias;
    private $validator;

    public function __construct(MediaRepositoryInterface $medias, MediaValidatorInterface $validator)
    {
        $this->medias = $medias;
        $this->validator = $validator;
    }

	public function uploadImage($image)
    {
        return $this->uploadMedia(self::UPLOAD_IMAGES_DISK, $image);
    }

    public function delete($id)
    {
        $media = $this->medias->find($id);
        return $media->delete();
    }

    public function setThumbnail($attributes)
    {
        $resource = ucfirst($attributes['resource']);
        $newThumbnail = $this->medias->find($attributes['image_id']);

        $itemRepository = app('App\Contracts\Repositories\\'.$resource.'RepositoryInterface');
        $item = $itemRepository->find($attributes['item_id']);


        if( $oldThumbnail = $item->firstMedia(Media::IMAGE_THUMBNAIL) ) {
            if($oldThumbnail->id == $newThumbnail->id) {
                $item->detachMedia($oldThumbnail, Media::IMAGE_THUMBNAIL);
                $item->attachMedia($oldThumbnail, Media::IMAGE_DEFAULT);
            } else {
                $item->detachMedia($oldThumbnail, Media::IMAGE_THUMBNAIL);
                $item->attachMedia($oldThumbnail, Media::IMAGE_DEFAULT);

                $item->detachMedia($newThumbnail, Media::IMAGE_DEFAULT);
                $item->attachMedia($newThumbnail, Media::IMAGE_THUMBNAIL);
            }
        } else {
            $item->detachMedia($newThumbnail, Media::IMAGE_DEFAULT);
            $item->attachMedia($newThumbnail, Media::IMAGE_THUMBNAIL);
        }

        return $newThumbnail;
    }

    private function uploadMedia($disk = null, $media)
    {
        return MediaUploader::fromSource($media)->toDisk($disk)->upload();
    }
}
