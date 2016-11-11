<?php
namespace App\Repositories\Eloquent;

use App\Project;
use App\Contracts\Repositories\ProjectRepositoryInterface;

class ProjectRepository extends AbstractRepository implements ProjectRepositoryInterface
{
    public function __construct(Project $project)
    {
        parent::__construct($project);
    }

}