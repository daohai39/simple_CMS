<?php
namespace App\Jobs\Category;

use App\Contracts\Repositories\CategoryRepositoryInterface;

use Illuminate\Bus\Queueable;

class DeleteCategory
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
    public function handle(CategoryRepositoryInterface $categories)
    {
        $categories->find($this->id)->delete();
    }
}
