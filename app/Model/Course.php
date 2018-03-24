<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $table = 'course';
    protected $fillable = ['course_name', 'course_hour', 'course_desc'];

    public static function courseList()
    {
        return self::whereNull('deleted_at')->get();
    }

    /**
     * Mass Assignment
     * @param $courses -> array
     * @return bool
     */
    public static function saveCourse($courses)
    {
        return Course::create($courses);
    }

    /**
     * Soft delete course
     * @param $courseId
     * @return mixed
     */
    public static function removeCourse($courseId)
    {
        $course = Course::find($courseId);
        return $course->delete();
    }

    /**
     * Update course
     * @param $courseId
     * @param $courses
     * @return mixed
     */
    public static function updateCourse($courseId, $courses)
    {
        $course = Course::find($courseId);
        $course->course_name = $courses['course_name'];
        $course->course_desc = $courses['course_desc'];
        $course->course_hour = $courses['course_hour'];
        return $course->save();
    }
}
