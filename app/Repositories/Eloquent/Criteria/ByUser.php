<?php
namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class ByUser implements ICriterion
{
    
    protected $userId;
    
    public function __construct($userId)
    {
        $this->userId = $userId;
    }
    
    public function apply($entity)
    {
        return $entity->where('user_id', $this->userId);
    }
    
    
}