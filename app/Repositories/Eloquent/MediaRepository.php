<?php
namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\MediaRepositoryInterface;
use App\Media;
use App\Image;

class MediaRepository extends AbstractRepository implements MediaRepositoryInterface
{
	public function __construct(Media $media)
	{
		parent::__construct($media);
	}

    public function image()
    {
        return new self(new Image);
    }
}
