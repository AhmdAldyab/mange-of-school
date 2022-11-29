<?php

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();

        $genders = [
            ['en'=> 'primary', 'ar'=> 'المرحلة الابتدائية'],
            ['en'=> 'middle', 'ar'=> 'المرحلة الاعدادية'],

        ];
        foreach ($genders as $ge) {
            Grade::create(['Name' => $ge]);
        }
    }
}
