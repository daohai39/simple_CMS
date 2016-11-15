<?php
namespace App\Repositories\Eloquent;

use App\CoverPage;
use App\Contracts\Repositories\CoverPageRepositoryInterface;

class CoverPageRepository extends AbstractRepository implements CoverPageRepositoryInterface
{
    public function __construct(CoverPage $coverPage)
    {
        parent::__construct($coverPage);
    }
}
