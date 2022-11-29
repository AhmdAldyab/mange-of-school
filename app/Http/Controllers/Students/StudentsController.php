<?php

namespace App\Http\Controllers\Students;

use App\Repository\StudentRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Http\Requests\StoreStudentsRequest;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    protected $Student;
    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->Student->Get_Student();
    }

    public function create()
    {   
        return $this->Student->Create_Student();
    }

    public function store(StoreStudentsRequest $request)
    {
        return $this->Student->Store_Student($request);
    }

    public function show($id)
    {
        return $this->Student->show_Student($id);
    }

    public function edit($id)
    {
        return $this->Student->edit_Student($id);
    }

    public function update(StoreStudentsRequest $request)
    {
        return $this->Student->update_Student($request);
    }

    public function destroy(Request $request)
    {
        return $this->Student->delete_Student($request);
    }
    public function Get_classrooms($id)
    {
        return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }

    public function Upload_attachment(Request $request)
    {
        return $this->Student->Upload_attachment($request);
    }

    public function Download_attachment($name,$file)
    {
        return $this->Student->Download_attachment($name,$file);
    }

    public function Delete_attachment(Request $request)
    {
        return $this->Student->Delete_attachment($request);
    }
}
