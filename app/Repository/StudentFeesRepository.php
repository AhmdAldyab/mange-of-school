<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;
use Exception;

class StudentFeesRepository implements StudentFeesRepositoryInterface
{
    public function index()
    {
        $fees=Fee::all();
        return view('pages.Fees.index',compact('fees'));
    }

    public function create()
    {
        $Grades=Grade::all();
        return view('pages.Fees.add',compact('Grades'));
    }

    public function store($request)
    {
        try {
            $fees=new Fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->Grade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->Fee_type=$request->Fee_type;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Fee.create');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    public function edit($id)
    {
        $fee=Fee::findOrFail($id);
        $Grades=Grade::all();
        return view('pages.Fees.edit',compact('fee','Grades'));
    }

    public function update($request)
    {
        try {
            $fees=Fee::findOrFail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->Grade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->Fee_type=$request->Fee_type;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Fee.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Fee::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Fee.index');
    }

}