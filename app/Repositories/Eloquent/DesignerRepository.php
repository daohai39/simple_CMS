<?php
namespace App\Repositories\Eloquent;

use App\Designer;
use App\Contracts\Repositories\DesignerRepositoryInterface;

class DesignerRepository extends AbstractRepository implements DesignerRepositoryInterface
{
    public function __construct(Designer $designer)
    {
        parent::__construct($designer);
    }

    public function paginateNameLike($name, $perpage = null, $columns = ['*'])
    {
        return $this->paginateWhere(['name', 'like', "%{$name}%"], $perpage, $columns);
    }
}
