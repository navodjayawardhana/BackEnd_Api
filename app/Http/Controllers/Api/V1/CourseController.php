<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\V1\CourseResource;
use App\Http\Resources\V1\CourseCollection;
use App\Filters\V1\CourseFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\V1\BulkStoreCourseRequst;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter =new CourseFilter();
        $queryItems = $filter->transform($request); //[['column','operator','value']]
        
        if (count($queryItems) == 0) {
            return new CourseCollection(Course::paginate());
        }else{
            return new CourseCollection(Course::where($queryItems)->paginate());
        }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function bulkStore(BulkStoreCourseRequst $request)
    {
       $bulk =collect($request->all())->map(function($arr,$key){
        return Arr::except($arr,['student_id','title','description']);
       });

       Course::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}