<?php
namespace App\Services\Media;

use App\Image;
use App\Contracts\Repositories\MediaRepositoryInterface;
use App\Contracts\Services\MediaServiceInterface;
use App\Contracts\Validators\MediaValidatorInterface;
use Plank\Mediable\Mediable;
use Illuminate\Http\Request;
use App\Http\Requests;
use MediaUploader;



class MediaService implements MediaServiceInterface
{
    private $medias;
    private $validator;

    public function __construct(MediaRepositoryInterface $medias, MediaValidatorInterface $validator)
    {
        $this->medias = $medias;
        $this->validator = $validator;
    }

	public function upload(array $attributes)
    {   
        $this->validator->validate('image', $attributes);
        MediaUploader::fromSource($attributes['image'])->upload();
    }

    public function delete($id)
    {
        $media = $this->medias->find($id);
        return $media->delete();
    }
}
