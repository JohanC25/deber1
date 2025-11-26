<?php

namespace App\Models;

class Student extends Person
{
    protected $table = 'students';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'dob',
        'enrollment_date'
    ];

    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class, 'enrollments', 'student_id', 'class_id');
    }
}
