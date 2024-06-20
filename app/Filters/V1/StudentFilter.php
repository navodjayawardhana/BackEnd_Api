<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class StudentFilter extends ApiFilter{
    protected $safeParams = [
        'name' => ['eq'],
        'email' => ['eq'],
        'date_of_birth' => ['eq'],
        'address' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];

    protected $columnMap = [
        'name' => 'name',
        'email' => 'email',
        'date_of_birth' => 'date_of_birth',
        'address' => 'address',
    ];

   
}