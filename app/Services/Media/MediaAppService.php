<?php
namespace App\Services\Media;

use App\Contracts\Repositories\MediaRepositoryInterface;
use App\Contracts\Services\MediaAppServiceInterface;
use App\Contracts\Validators\MediaValidatorInterface;
use Illuminate\Http\Request;
use MediaUploader;


class MediaAppService implements MediaAppServiceInterface
{
    const UPLOAD_IMAGES_DISK = 'uploads-images';
    private $medias;
    private $validator;

    public function __construct(MediaRepositoryInterface $medias, MediaValidatorInterface $validator)
    {
        $this->medias = $medias;
        $this->validator = $validator;
    }

	public function uploadImage($image)
    {
        $this->validator->validate('image', [ $image ]);
        return MediaUploader::fromSource($image)->setAllowedAggregateTypes(['image'])->toDisk(self::UPLOAD_IMAGES_DISK)->upload();
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


        if( $oldThumbnail = $item->getMedia('thumbnail') ) {
            $item->detachMedia($oldThumbnail, 'thumbnail');
            $item->attachMedia($oldThumbnail, 'gallery');
        }

        $item->detachMedia($newThumbnail, 'gallery');
        $item->attachMedia($newThumbnail, 'thumbnail');

        return $newThumbnail;
    }
}
