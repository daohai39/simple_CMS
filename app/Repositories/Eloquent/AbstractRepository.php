<?php
namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\AbstractRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements AbstractRepositoryInterface
{
	private $model;

	protected function __construct(Model $model)
	{
		$this->model = $model;
	}

    public function all()
    {
        return $this->model()->all();
    }

    public function getFillable()
    {
        return $this->model()->getFillable();
    }

	public function find($id, $columns = ['*'])
	{
		return $this->model()->findOrFail($id, $columns);
	}

	public function paginate($perpage = null, $columns = ['*'])
	{
		return $this->model()->paginate($perpage, $columns);
	}

	public function paginateWhere($where, $perpage = null, $columns = ['*'])
	{
		return $this->model()->where([$where])->paginate($perpage, $columns);
	}

	protected function model()
	{
		return $this->model;
	}
}
