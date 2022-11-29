<?php 

namespace App\Repository;

use App\Models\Grade;
use App\Models\Students;

class StudentGradeautedRepository implements StudentGradeautedRepositoryInterface
{
    public function index()
    {
        $students = Students::onlyTrashed()->get();
        return view('pages.Students.Graduated.index',compact('students'));

    }   
    public function create()
    {
        $Grades=Grade::all();
        return view('pages.Students.Graduated.create',compact('Grades'));
    }

    public function store($request)
    {
        $students=Students::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();
        if ($students->count() < 1) {
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }else {
            foreach ($students as $student){
                $ids = explode(',',$student->id);
                Students::whereIn('id', $ids)->Delete();
            }
    
            toastr()->success(trans('messages.success'));
            return redirect()->route('Gradeauted.index');    
        }
    }

    public function update($request)
    {
        Students::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function delet($request)
    {
        Students::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }

}