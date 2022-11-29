<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Sections;
use App\Models\Students;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    public function index()
    {
        $ids=DB::table('teacher_sections')->where('teacher_id',auth()->user()->id)->pluck('sections_id');
        $students=Students::whereIn('section_id',$ids)->get();
        return view('pages.Teachers.studeent_index',compact('students'));
    }

    public function sections()
    {
        $ids=DB::table('teacher_sections')->where('teacher_id',auth()->user()->id)->pluck('sections_id');
        $sections=Sections::whereIn('id',$ids)->get();
        return view('pages.Teachers.section_index',compact('sections'));
    }

    public function attendance(Request $request)
    {

        try {

            $attenddate = date('Y-m-d');
            foreach ($request->attendences as $studentid => $attendence) {

                if ($attendence == 'presence') {
                    $attendence_status = true;
                } else if ($attendence == 'absent') {
                    $attendence_status = false;
                }

                Attendance::updateOrcreate(
                    [
                        'student_id'      =>$studentid,
                        'attendence_date' =>$attenddate
                    ],[
                    'student_id' => $studentid,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 1,
                    'attendence_date' => $attenddate,
                    'attendence_status' => $attendence_status
                    ]
                );
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function attendanceReport()
    {
        $ids= DB::table('teacher_sections')->where('teacher_id',auth()->user()->id)->pluck('sections_id');
        $students=Students::whereIn('section_id',$ids)->get();
        return view('pages.Teachers.attandance_report',compact('students'));
    }

    public function attandanceSerach(Request $request)
    {
        $request->validate([
            'from'  =>'required|date|date_format:Y-m-d',
            'to'=> 'required|date|date_format:Y-m-d|after_or_equal:from'
        ],[
            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);

        try {
            $ids= DB::table('teacher_sections')->where('teacher_id',auth()->user()->id)->pluck('sections_id');
            $students=Students::whereIn('section_id',$ids)->get();
            if ($request->student_id==0) {
                $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
                return view('pages.Teachers.attandance_report',compact('Students','students'));  
            }else{
                $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
                ->where('student_id',$request->student_id)->get();
                return view('pages.Teachers.attandance_report',compact('Students','students'));         
            }
        } catch (\Exception $e) {
            return redirect()->back();
        }

    }
}
