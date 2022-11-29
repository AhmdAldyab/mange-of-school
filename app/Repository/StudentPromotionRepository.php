<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\promotion;
use App\Models\Students;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{
    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Students.promotion.index', compact('Grades'));
    }
    public function store($request)
    {
        DB::beginTransaction();

        try {

            $students = Students::where('Grade_id', $request->Grade_id)->where('Classroom_id',   $request->Classroom_id)->where('section_id', $request->section_id)->get();

            if ($students->count() < 1) {
                return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
            }

            // update in table student
            foreach ($students as $student) {

                $ids = explode(',', $student->id);
                Students::whereIn('id', $ids)
                    ->update([
                        'Grade_id' => $request->Grade_id_new,
                        'Classroom_id' => $request->Classroom_id_new,
                        'section_id' => $request->section_id_new,
                        'academic_year' => $request->academic_year_new,
                    ]);

                // insert in to promotions
                promotion::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->Grade_id,
                    'from_Classroom' => $request->Classroom_id,
                    'from_section' => $request->section_id,
                    'to_grade' => $request->Grade_id_new,
                    'to_Classroom' => $request->Classroom_id_new,
                    'to_section' => $request->section_id_new,
                    'academic_year' => $request->academic_year,
                    'academic_year_new' => $request->academic_year_new,
                ]);
            }
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function create()
    {
        $promotions = promotion::all();
        return view('pages.Students.promotion.management', compact('promotions'));
    }

    public function destroy($request)
    {
        Db::beginTransaction();
        try {
            if ($request->page_id == 1) {
                // التراجع عن الكل

                $Promotions = Promotion::all();
                foreach ($Promotions as $Promotion) {
                    //التحديث في جدول الطلاب
                    $ids = explode(',', $Promotion->student_id);
                    Students::whereIn('id', $ids)
                        ->update([
                            'Grade_id' => $Promotion->from_grade,
                            'Classroom_id' => $Promotion->from_Classroom,
                            'section_id' => $Promotion->from_section,
                            'academic_year' => $Promotion->academic_year,
                        ]);
                }
                //حذف جدول الترقيات
                Promotion::truncate();
            } else {
                $Promotion = Promotion::findorfail($request->id);
                Students::where('id', $Promotion->student_id)
                    ->update([
                        'Grade_id'=>$Promotion->from_grade,
                        'Classroom_id'=>$Promotion->from_Classroom,
                        'section_id'=> $Promotion->from_section,
                        'academic_year'=>$Promotion->academic_year,
                    ]);
                Promotion::destroy($request->id);
            }
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
