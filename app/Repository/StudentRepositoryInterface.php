<?php

namespace App\Repository;

interface StudentRepositoryInterface
{
  //Get Students
  public function Get_Student();

  // Get Add Form Student
  public function Create_Student();

  // Get classrooms
  public function Get_classrooms($id);

  //Get Sections
  public function Get_Sections($id);

  //Store_Student
  public function Store_Student($request);

  //edit students
  public function edit_Student($id);

  //update students
  public function update_Student($request);

  //show deatiles student
  public function show_Student($id);

  //delete student
  public function delete_Student($request);

  //Upload attachment
  public function Upload_attachment($request);

  //Download image
  public function Download_attachment($name,$file);

  //Delete image
  public function Delete_attachment($request);

}
