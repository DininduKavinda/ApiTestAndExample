<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoodleCategoryController extends Controller
{
    public function getCategory()
    {
        $params = [
            'wsfunction' => 'core_course_get_categories',
            'moodlewsrestformat' => 'json',
            'wstoken' => env('MOODLE_WEB_TOKEN'),
            'criteria[0][key]' => '',
            'criteria[0][value]' => ''
        ];
    }
}
