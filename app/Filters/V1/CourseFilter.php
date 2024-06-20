<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CourseFilter extends ApiFilter
{
    protected $safeParams = [
        'student_id' => ['eq', 'like'],
        'title' => ['eq', 'like'],
        'description' => ['eq', 'like'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'like' => 'like',
    ];

    protected $columnMap = [
        'student_id' => 'student_id',
        'title' => 'title',
        'description' => 'description',
    ];

}