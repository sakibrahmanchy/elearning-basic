<?php

namespace App\Repositories\Eloquent;

use App\Models\Lesson;
use App\Models\Options;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use App\Models\Course;
use App\Models\UserOption;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResultRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param  User $model
     */
    public function __construct(Result $model)
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


    public function saveResult($lessonId, $questions)
    {
        try {
            $result = new Result();
            DB::transaction(function () use ($lessonId, $questions, $result) {
                $score = 0;
                $questionCount = 0;
                foreach ($questions as $key => $value) {
                    $question = Question::find($key);
                    $userCorrectAnswers = 0;
                    foreach ($value as $answerKey => $answerValue) {
                        if ($answerValue == 1) {
                            $userCorrectAnswers++;
                        } else {
                            $userCorrectAnswers--;
                        }
                    }
                    if ($question->correctOptionsCount() == $userCorrectAnswers) {
                        $score++;
                    }
                    $questionCount++;
                }

                $result->user_id = Auth::user()->id;
                $result->lesson_id = $lessonId;
                $result->correct_answers = $score;
                $result->questions_count = $questionCount;
                $result->save();

                foreach ($questions as $key => $value) {
                    foreach ($value as $answerKey => $answerValue) {
                        $userOption = new UserOption();
                        $result->user_id = Auth::user()->id;
                        $userOption->result_id = $result->id;
                        $userOption->question_id = $key;
                        $userOption->lesson_id = $lessonId;
                        $userOption->option_id = $answerKey;
                        $userOption->save();
                    }
                }
            });
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            return null;
        }
    }
}


