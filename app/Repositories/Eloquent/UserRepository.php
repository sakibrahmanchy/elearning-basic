<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Models\Course;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\Repositories\Contracts\IUser;

class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param  User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function update(User $user, array $data)
    {
        return $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
        ]);
    }
}


