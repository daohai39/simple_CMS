<?php
namespace App\Repositories\Eloquent;

use App\Stage;
use App\Contracts\Repositories\StageRepositoryInterface;

class StageRepository extends AbstractRepository implements StageRepositoryInterface
{
    public function __construct(Stage $stage)
    {
        parent::__construct($stage);
    }

    public function paginateNameLike($name, $perpage = null, $columns = ['*'])
    {
        return $this->paginateWhere(['name', 'like', "%{$name}%"], $perpage, $columns);
    }
}
