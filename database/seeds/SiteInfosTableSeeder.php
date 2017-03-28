<?php

use Illuminate\Database\Seeder;

class SiteInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_infos')->truncate();

        DB::table('site_infos')->insert([
            [
                'name' => 'អាល់ហ្វាផូលីត',
                'description' => 'សម្រាប់​ប្រមុខការបរទេស​អាមេរិក គេ​ត្រូវ​តែ​ស្វែងរក​ដំណោះស្រាយ​ថ្មី ព្រោះថា នយោបាយ​ការទូត​ដែល​គេ​ប្រើ ក្នុង​រយៈពេល​២០​ឆ្នាំ​ចុងក្រោយ​នេះ បាន​បរាជ័យ មិនអាច​ជំរុញ​កូរ៉េខាងជើង​ឲ្យ​លះបង់​ចោល​មហិច្ឆត',
                'image' => 'alpha-icon-small-min.png',
                'image1' => 'cambodia.png',
            ],
        ]);
    }
}
