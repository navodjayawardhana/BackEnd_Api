<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "id"=> $this->id,
            "name"=> $this->name,
            "email"=> $this->email,
            "date_of_birth"=> $this->date_of_birth,
            "address"=> $this->address,
            'course_id'=> CourseResource::collection($this->whenLoaded('courses')),
            
        ];
    }
}