<?php
namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class EagerLoad implements ICriterion
{
    
    protected $relations;
    
    public function __construct(array $relations)
    {
        $this->relations = $relations;
    }
    
    public function apply($entity)
    {
        return $entity->with($this->relations);
    }
    
    
}