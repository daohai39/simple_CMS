<?php
namespace App\Http\Controllers\Backend;

use App\Contracts\DataTables\ProductDataTableInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;

use App\Jobs\Product\CreateProduct;
use App\Jobs\Product\DeleteProduct;
use App\Jobs\Product\UpdateProduct;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;


class ProductController extends BackendController
{
    use ExecuteCommandTrait;

    private $products;
    private $dataTable;

    public function __construct(ProductRepositoryInterface $products, ProductDataTableInterface $dataTable)
    {
        $this->products = $products;
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
        return view('backend.product.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = (string) Uuid::uuid4();

        $attributes = array_merge(['id' => $id], $request->all());
        $attributes['featured'] = ($attributes['featured'] == 'on') ? true : false;

        $this->executeCommand(new CreateProduct($attributes));

        flash('Created Successfully', 'success');
        return redirect()->route('admin.product.edit', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->products->find($id);
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->products->find($id);
        $product->load('images');
        return view('backend.product.edit', compact('product'));
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
        $attributes = $request->all();
        $attributes['featured'] = ($attributes['featured'] == 'on') ? true : false;

        $this->executeCommand(new UpdateProduct($id, $attributes));

        flash('Edited Successfully', 'success');
        return redirect()->route('admin.product.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->executeCommand(new DeleteProduct($id));
        flash('Deleted Successfully', 'success');
        return redirect()->route('admin.product.index');
    }
}
