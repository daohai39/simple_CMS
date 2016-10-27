<?php
namespace App\Services\Designer;

use App\Designer;
use App\Contracts\Repositories\DesignerRepositoryInterface;
use App\Contracts\Services\DesignerAppServiceInterface;
use App\Contracts\Validators\DesignerValidatorInterface;

class DesignerAppService implements DesignerAppServiceInterface
{
	private $designers;
    private $validator;

	public function __construct(DesignerRepositoryInterface $designers, DesignerValidatorInterface $validator)
	{
		$this->designers = $designers;
        $this->validator = $validator;
	}

	public function create(array $attributes)
	{
        $this->validator->validate('create', $attributes);

        $images_id = empty($attributes['images_id']) ? [] : $attributes['images_id'];

        $designer = Designer::create($attributes);
        $designer->syncMedia($images_id, 'gallery');

        return $designer;
	}

    public function update($id, $attributes)
    {
        $this->validator->validate('update', $attributes, $id);

        $designer = $this->designers->find($id);
        $images_id = empty($attributes['images_id']) ? [] : $attributes['images_id'];

        $designer->syncMedia($images_id, 'gallery');
        return $designer->update($attributes);
    }

    public function delete($id)
    {
        $designer = $this->designers->find($id);
        return $designer->delete();
    }
}
