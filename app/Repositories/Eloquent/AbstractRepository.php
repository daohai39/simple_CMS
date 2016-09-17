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

	public function find($id, $columns = ['*'])
	{
		return $this->model()->findOrFail($id, $columns);
	}

	public function paginate($id, $perpage = null, $columns = ['*'])
	{
		return $this->paginateWhere(['id', '=', $id], $perpage, $columns);
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