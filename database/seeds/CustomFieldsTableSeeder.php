<?php

use Illuminate\Database\Seeder;

class CustomFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('custom_fields')->truncate();

        DB::table('custom_fields')->insert([
            [
                'title' => 'ចំណងជើងទី១',
                'description' => 'សម្រាប់​ប្រមុខការបរទេស​អាមេរិក គេ​ត្រូវ​តែ​ស្វែងរក​ដំណោះស្រាយ​ថ្មី ព្រោះថា១',
                'image' => 'pic1.jpg',
                'type' => 'slide',
                'link' => '',
            ],
            [
                'title' => 'ចំណងជើងទី២',
                'description' => 'សម្រាប់​ប្រមុខការបរទេស​អាមេរិក គេ​ត្រូវ​តែ​ស្វែងរក​ដំណោះស្រាយ​ថ្មី ព្រោះថា២',
                'image' => 'pic2.jpg',
                'type' => 'slide',
                'link' => '',
            ],
            [
                'title' => 'ចំណងជើងទី៣',
                'description' => 'សម្រាប់​ប្រមុខការបរទេស​អាមេរិក គេ​ត្រូវ​តែ​ស្វែងរក​ដំណោះស្រាយ​ថ្មី ព្រោះថា៣',
                'image' => 'pic3.jpg',
                'type' => 'slide',
                'link' => '',
            ],
            
            
            [
                'title' => 'សេដ្ជកិច',
                'description' => 'សម្រាប់​ប្រមុខការបរទេស​អាមេរិក គេ​ត្រូវ​តែ​ស្វែងរក​ដំណោះស្រាយ​ថ្មី ព្រោះថា នយោបាយ​ការទូត​ដែល​គេ​ប្រើ ក្នុង​រយៈពេល​២០​ឆ្នាំ​ចុងក្រោយ​នេះ បាន​បរាជ័យ មិនអាច​ជំរុញ​កូរ៉េខាងជើង​ឲ្យ​លះបង់​ចោល​មហិច្ឆត',
                'image' => '<i class="fa fa-line-chart fa-5x" aria-hidden="true"></i>',
                'type' => 'knowledge',
                'link' => '',
            ],
            [
                'title' => 'នយោបាយ',
                'description' => 'សម្រាប់​ប្រមុខការបរទេស​អាមេរិក គេ​ត្រូវ​តែ​ស្វែងរក​ដំណោះស្រាយ​ថ្មី ព្រោះថា នយោបាយ​ការទូត​ដែល​គេ​ប្រើ ក្នុង​រយៈពេល​២០​ឆ្នាំ​ចុងក្រោយ​នេះ បាន​បរាជ័យ មិនអាច​ជំរុញ​កូរ៉េខាងជើង​ឲ្យ​លះបង់​ចោល​មហិច្ឆត',
                'image' => '<img src="img/cambodia.png" alt="Cambodia map">',
                'type' => 'knowledge',
                'link' => '',
            ],
            [
                'title' => 'សង្គមកិច្ច',
                'description' => 'សម្រាប់​ប្រមុខការបរទេស​អាមេរិក គេ​ត្រូវ​តែ​ស្វែងរក​ដំណោះស្រាយ​ថ្មី ព្រោះថា នយោបាយ​ការទូត​ដែល​គេ​ប្រើ ក្នុង​រយៈពេល​២០​ឆ្នាំ​ចុងក្រោយ​នេះ បាន​បរាជ័យ មិនអាច​ជំរុញ​កូរ៉េខាងជើង​ឲ្យ​លះបង់​ចោល​មហិច្ឆត',
                'image' => '<i class="fa fa-graduation-cap fa-5x" aria-hidden="true"></i>',
                'type' => 'knowledge',
                'link' => '',
            ],
        ]);
    }
}
