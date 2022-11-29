<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{

	public function up()
	{
		Schema::table('Classrooms', function (Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('Grades')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
		Schema::table('sections', function (Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('Grades')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
		Schema::table('sections', function (Blueprint $table) {
			$table->foreign('Class_id')->references('id')->on('Classrooms')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		Schema::table('parent_attachments', function (Blueprint $table) {
			$table->foreign('parent_id')->references('id')->on('my__parents')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		Schema::table('teachers', function (Blueprint $table) {
			$table->foreign('Specialization_id')->references('id')->on('specializations')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		Schema::table('teachers', function (Blueprint $table) {
			$table->foreign('Gender_id')->references('id')->on('genders')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		Schema::table('teacher_sections', function (Blueprint $table) {
			$table->foreign('sections_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::table('my__parents', function (Blueprint $table) {
			$table->foreign('Nationality_Father_id')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('Religion_Father_id')->references('id')->on('religions')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('Nationality_Mother_id')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('Religion_Mother_id')->references('id')->on('religions')->onDelete('cascade')->onUpdate('cascade');
		});
		
		Schema::table('students', function (Blueprint $table) {
			$table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
			$table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('blood_id')->references('id')->on('type__bloods')->onDelete('cascade');
            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('my__parents')->onDelete('cascade');
            
		});

		Schema::table('promotions', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('from_grade')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreign('from_Classroom')->references('id')->on('Classrooms')->onDelete('cascade');
            $table->foreign('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('to_grade')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreign('to_Classroom')->references('id')->on('Classrooms')->onDelete('cascade');
            $table->foreign('to_section')->references('id')->on('sections')->onDelete('cascade');
        });

	}

	public function down()
	{
		Schema::table('Classrooms', function (Blueprint $table) {
			$table->dropForeign('Classrooms_Grade_id_foreign');
		});
		Schema::table('sections', function (Blueprint $table) {
			$table->dropForeign('sections_Grade_id_foreign');
		});
		Schema::table('sections', function (Blueprint $table) {
			$table->dropForeign('sections_Class_id_foreign');
		});
	}
}
