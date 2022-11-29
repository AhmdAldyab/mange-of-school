<?php

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Sections;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();
        $Sections = [
            ['en' => 'a', 'ar' => 'ا'],
            ['en' => 'b', 'ar' => 'ب'],
            ['en' => 'c', 'ar' => 'ت'],
        ];
        foreach($Sections as $Section)
        {
            Sections::create([
                'Name_Section' => $Section,
                'Status' => 1,
                'Grade_id' => Grade::all()->unique()->random()->id,
                'Class_id' =>Classroom::all()->unique()->random()->id
            ]);
        }
    }
}
