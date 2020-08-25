<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'title' => 'Leadership: Practical Leadership Skills',
                'subtitle' => 'Master leadership skills and leadership techniques',
                'description' => 'Leadership is often seen an elusive or complex skill, but with this practical course you\'ll soon have it mastered. Whether you\'re managing a small team or an entire business this course will build essential skills for your time management, team motivation, and personal happiness. Leadership is an essential skill at home, at work, and in every stage of your career. If you\'re in charge of two or more people at work, this course could change your life'
            ],
            [
                'title' => 'An Entire MBA in 1 Course',
                'subtitle' => 'Everything You Need to Know About Business from Start-up to IPO',
                'description' => 'Students of this course will enjoy learning everything they need to know about business….from starting a company to taking it public while learning the most important topics taught at the top MBA schools in the world. Take your career to the next level!'
            ],
            [
                'title' => 'iOS 13 & Swift 5 - The Complete iOS App Development Bootcamp',
                'subtitle' => 'From Beginner to iOS App Developer with Just One Course!',
                'description' => 'This Swift 5.1 course is based on our in-person app development bootcamp in London, where we\'ve perfected the curriculum over 4 years of in-person teaching.'
            ],
            [
                'title' => 'Advanced CSS and Sass: Flexbox, Grid, Animations and More!',
                'subtitle' => 'The most advanced and modern CSS course on the internet: master flexbox, CSS Grid, responsive design, and so much more.',
                'description' => 'Tons of modern CSS techniques to create stunning designs and effects'
            ],
            [
                'title' => 'Cisco CCNA 200-301 – The Complete Guide to Getting Certified',
                'subtitle' => 'The top rated CCNA course online and only one where all questions get a response. Full lab exercises included.',
                'description' => 'Get what you need to pass the up-to-date Cisco CCNA 200-301 exam'
            ],

        ];
        $countOfCourses = Course::count();
        if ($countOfCourses < 5) {
            foreach ($courses as $courseData) {
                $course = new Course();
                $course->title = $courseData['title'];
                $course->subtitle = $courseData['subtitle'];
                $course->description = $courseData['description'];
                $course->user_id = 1;
                $course->save();
            }
        }
    }
}
