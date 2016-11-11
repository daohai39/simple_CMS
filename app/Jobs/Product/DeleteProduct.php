<?php

namespace App\Jobs\Product;

use App\Contracts\Repositories\ProductRepositoryInterface;
use Illuminate\Bus\Queueable;

class DeleteProduct
{
    use Queueable;

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ProductRepositoryInterface $products)
    {
        $products->find($this->id)->delete();
    }
}
