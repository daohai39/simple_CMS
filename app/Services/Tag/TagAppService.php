<?php
namespace App\Services\Tag;

use App\Tag;
use App\Contracts\Repositories\TagRepositoryInterface;
use App\Contracts\Services\TagAppServiceInterface;
use App\Contracts\Validators\TagValidatorInterface;

class TagAppService implements TagAppServiceInterface
{
	private $tags;
    private $validator;

	public function __construct(TagRepositoryInterface $tags, TagValidatorInterface $validator)
	{
		$this->tags = $tags;
        $this->validator = $validator;
	}

	public function create(array $attributes)
	{
        $this->validator->validate('create', $attributes);
		return Tag::create($attributes);
	}

    public function update($id, array $attributes)
    {
        $tag = $this->tags->find($id);
        $this->validator->validate('update', $attributes, $id);
        return $tag->update($attributes);
    }

    public function delete($id)
    {
        $tag = $this->tags->find($id);
        return $tag->delete();
    }
}
