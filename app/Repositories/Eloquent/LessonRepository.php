<?php

namespace App\Repositories\Eloquent;

use App\Models\Lesson;
use App\Models\Options;
use App\Models\Question;
use App\Models\User;
use App\Models\Course;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class LessonRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param  User $model
     */
    public function __construct(Lesson $model)
    {
        $this->model = $model;
    }

    /**
     * Create course data
     *
     * @param User $user
     * @param array $data
     * @return Lesson
     */
    public function create(array $data)
    {
        return Lesson::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'course_id' => $data['course_id'],
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function update(Lesson $lesson, array $data)
    {
        return $lesson->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'course_id' => $data['course_id'],
        ]);
    }


    public function addQuestionsToLesson($lessonId, $questions)
    {
        try {
            DB::transaction(function () use ($lessonId, $questions) {
                foreach ($questions as $question) {
                    $q = new Question();
                    $q->question_text = $question['title'];
                    $q->lesson_id = $lessonId;
                    $q->save();

                    foreach ($question['options'] as $option) {
                        $o = new Options();
                        $o->question_id = $q->id;
                        $o->correct = (bool) $option['correct'];
                        $o->option = $option['name'];
                        $o->save();
                    }
                }
            });
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}


