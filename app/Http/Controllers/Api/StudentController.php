<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Repositories\StudentRepositories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function __construct(
        protected readonly StudentRepositories $student
    ) {
    }

    public function index()
    {
        return new StudentResource(true, 'Successful to retrieve all student data', $this->student->findAll(), 200);
    }

    public function show(Student $student)
    {
        return new StudentResource(true, 'Successful to retrieve student data with ID' . $student->id, $this->student->findOrFail($student->id), 200);
    }

    public function store(StoreStudentRequest $request)
    {
        try {
            return new StudentResource(true, 'Successful to add new student data', $this->student->store($request->validated()), 201);
        } catch (\Throwable $th) {
            return new StudentResource(false, 'Failed to add new student data', null, 400);
        }
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {
            return new StudentResource(true, 'Successful to update student data', $this->student->update($request->validated(), $student), 200);
        } catch (\Throwable $th) {
            return new StudentResource(false, 'Failed to update student data', null, 400);
        }
    }

    public function destroy(Student $student)
    {
        try {
            return new StudentResource(true, 'Successful to delete student data', $this->student->delete($student), 204);
        } catch (\Throwable $th) {
            return new StudentResource(false, 'Failed to delete student data', null, 404);
        }
    }
}
