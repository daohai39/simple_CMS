<?php
namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\MediaRepositoryInterface;
use App\Media;

class MediaRepository extends AbstractRepository implements MediaRepositoryInterface
{
	public function __construct(Media $media)
	{
		parent::__construct($media);
	}

}
