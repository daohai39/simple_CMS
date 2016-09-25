<?php
namespace App\DataTables;

use Yajra\Datatables\Datatables;

abstract class AbstractDataTable
{
    protected $resource;
    private $dataTable;

    public function getHtmlBuilder()
    {
        return $this->dataTable->getHtmlBuilder();
    }

    public function getDataTable()
    {
        return $this->dataTable;
    }

    public function make($objectData = true)
    {
        return $this->dataTable->make($objectData);
    }

    protected static function of($builder)
    {
        $self = new static();
        $self->dataTable = Datatables::of($builder);
        return $self;
    }

    protected function addColumn($name, $content, $order = false)
    {
        $this->dataTable->addColumn($name, $content, $order);
        return $this;
    }

    protected function editColumn($name, $content)
    {
        $this->dataTable->editColumn($name, $content);
        return $this;
    }

    protected function hasActions($actions = ['update', 'delete'])
    {
        $this->dataTable->addColumn('actions', function($model) use ($actions) {
            if(count($actions) == 1 && in_array('update', $actions)) {
                return $this->updateAction($model);
            } else if(count($actions) == 1 && in_array('delete', $actions)) {
                return $this->deleteAction($model);
            }

            return $this->updateAction($model) ."\r\n". $this->deleteAction($model);
        });

        return $this;
    }

    private function updateAction($model)
    {
        return '<a href="'.route('admin.'.$this->resource.'.edit', ['id' => $model->id]).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Sửa</a>';
    }
    private function deleteAction($model)
    {
        return '<a href="'.route('admin.'.$this->resource.'.destroy', ['id' => $model->id]).'" class="btn btn-xs btn-danger" data-method="DELETE" data-confirm="Bạn có chắc chắn xoá đối tượng này?"><i class="glyphicon glyphicon-remove"></i>Xoá</a>';
    }
}
