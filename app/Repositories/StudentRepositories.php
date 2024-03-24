<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepositories
{
    public function __construct(
        protected readonly Student $student
    ) {
    }

    public function findAll()
    {
        return $this->student->latest()->get();
    }

    public function findById(int $student_id): Student
    {
        return $this->student->where('id', $student_id)->first();
    }

    public function findOrFail(int $student_id): Student
    {
        return $this->student->findOrFail($student_id);
    }

    public function store($request): Student
    {
        return $this->student->create($request);
    }

    public function update($request, $student)
    {
        return $student->update($request);
    }

    public function delete($student)
    {
        return $student->delete();
    }
}
