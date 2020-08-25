<?php
namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class IsLive implements ICriterion
{
    
    public function apply($entity)
    {
        return $entity->live();
    }
    
    
}