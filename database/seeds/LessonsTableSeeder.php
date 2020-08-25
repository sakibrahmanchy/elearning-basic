<?php
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Options;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Faker\Factory as Factory;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $countLessons = Lesson::count();
        if ($countLessons < 10) {
            $courses = Course::take(10)->get();
            foreach ($courses as $course) {
                for ($i = 0; $i < 5; $i++) {
                    $lesson = new Lesson();
                    $lesson->title = $faker->sentence(10, true);
                    $lesson->description = $faker->text;
                    $lesson->course_id = $course->id;
                    $lesson->save();
                    for($j =0; $j < 10; $j++) {
                        $q = new Question();
                        $q->question_text = $faker->sentence(10, true);
                        $q->lesson_id = $lesson->id;
                        $q->save();

                        for ($k = 0; $k < 4; $k++) {
                            $o = new Options();
                            $o->question_id = $q->id;
                            $o->correct = $faker->boolean;
                            $o->option = $faker->sentence(6, true);
                            $o->save();
                        }
                    }
                }
            }
        }
    }
}
