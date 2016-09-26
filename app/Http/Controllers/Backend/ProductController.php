<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\DataTables\ProductDataTableInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Services\ProductAppServiceInterface;
use App\Http\Requests;
use App\Validators\ValidationException;
use Illuminate\Http\Request;


class ProductController extends BackendController
{

    private $products;
    private $appService;
    private $dataTable;

    public function __construct(ProductRepositoryInterface $products, ProductAppServiceInterface $appService, ProductDataTableInterface $dataTable)
    {
        $this->products = $products;
        $this->appService = $appService;
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
        try {
            $product = $this->appService->create($request->all());
            return redirect()->route('admin.product.index');
        } catch(ValidationException $e) {
            return back()->with(['errors' => $e->getErrors()]);
        }
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
        try {
            $this->appService->update($id, $request->all());
            return redirect()->route('admin.product.index');
        } catch(ValidationException $e) {
            return back()->with(['errors' => $e->getErrors()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->appService->delete($id);
            return redirect()->route('admin.product.index');
        } catch(ValidationException $e) {
            return back()->with(['errors' => $e->getErrors()]);
        }
    }
}
