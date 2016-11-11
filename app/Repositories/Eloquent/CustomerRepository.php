<?php
namespace App\Repositories\Eloquent;

use App\Customer;
use App\Contracts\Repositories\CustomerRepositoryInterface;

class CustomerRepository extends AbstractRepository implements CustomerRepositoryInterface
{
    public function __construct(Customer $customer)
    {
        parent::__construct($customer);
    }

    public function paginateNameLike($name, $perpage = null, $columns = ['*'])
    {
        return $this->paginateWhere(['name', 'like', "%{$name}%"], $perpage, $columns);
    }
}