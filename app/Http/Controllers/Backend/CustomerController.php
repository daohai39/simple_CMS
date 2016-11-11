<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\DataTables\CustomerDataTableInterface;
use App\Contracts\Repositories\CustomerRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Jobs\Customer\CreateCustomer;
use App\Jobs\Customer\DeleteCustomer;
use App\Jobs\Customer\UpdateCustomer;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CustomerController extends Controller
{
    use ExecuteCommandTrait;

    private $customers;
    private $dataTable;

    public function __construct(CustomerRepositoryInterface $customers, CustomerDataTableInterface $dataTable)
    {
        $this->customers = $customers;
        $this->dataTable = $dataTable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return $this->dataTable->getData();
        }
        return view('backend.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()) {
            if($input = $request->input('q')) {
                return $this->customers->paginateNameLike($input);
            }
            return $this->customers->paginate();
        }
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Uuid::uuid4()->toString();
        $attributes = array_merge(['id' => $id], $request->all());
        $this->executeCommand(new CreateCustomer($attributes));
        return redirect()->route('admin.customer.edit', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->customers->find($id);
        return view('backend.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->executeCommand(new UpdateCustomer($id, $request->all()));
        return redirect()->route('admin.customer.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->executeCommand(new DeleteCustomer($id));
        return redirect()->route('admin.customer.index');
    }
}
