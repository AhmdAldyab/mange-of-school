<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\Grade;
use Exception;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $grades = Grade::all();
    $classrooms = Classroom::all();
    return view('pages.My_Classes.My_Classes', compact('grades', 'classrooms'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreClassroom $request)
  {
    $classes = $request->List_Classes;
    try {
      /*      $this->validate($request,[
        'Name'          => 'required',
        'Name_class_en' => 'required',
      ],[
        'Name.required'          =>"kk",
        'Name_class_en.required' =>"ll",
      ]);*/
      $validated = $request->validated();
      foreach ($classes as $class) {
        $classroom = new Classroom();
        $classroom->Name_Class = ['en' => $class['Name_class_en'], 'ar' => $class['Name']];
        $classroom->Grade_id = $class['Grade_id'];
        $classroom->save();
      }
      toastr()->success(trans('messages.success'));
      return redirect()->route('Classrooms.index');
    } catch (Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    try {

      $Classrooms = Classroom::findOrFail($request->id);

      $Classrooms->update([

        $Classrooms->Name_Class = ['ar' => $request->Name, 'en' => $request->Name_en],
        $Classrooms->Grade_id = $request->Grade_id,
      ]);
      toastr()->success(trans('messages.Update'));
      return redirect()->route('Classrooms.index');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    $Classrooms = Classroom::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Classrooms.index');
  }
  public function delete_all(Request $request)
  {
    $delete_all_id = explode(",", $request->delete_all_id);

    Classroom::whereIn('id', $delete_all_id)->Delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Classrooms.index');
  }
  public function Filter_Classes(Request $request)
  {
    $grades = Grade::all();
    $classrooms = Classroom::select('*')->where('Grade_id', '=', $request->Grade_id)->get();
    return view('pages.My_Classes.My_Classes', compact('grades'))->withDetails($classrooms);
  }
}
