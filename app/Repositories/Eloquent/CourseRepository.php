<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Models\Course;
use App\Repositories\BaseRepository;

class CourseRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param  User $model
     */
    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    /**
     * Create course data
     *
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        return Course::create([
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'description' => $data['description'],
            'user_id' => auth()->user()->id,
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function update(Course $course, array $data)
    {
        return $course->update([
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'description' => $data['description'],
        ]);
    }
}


