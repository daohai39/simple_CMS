<?php
namespace App\Repositories\Eloquent;

use App\Image;
use App\Contracts\Repositories\MediaRepositoryInterface;

class MediaRepository extends AbstractRepository implements MediaRepositoryInterface
{
	public function __construct(Image $media)
	{
		parent::__construct($media);
	}

}
