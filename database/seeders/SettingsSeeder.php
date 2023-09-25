<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settingsModules = [
            ['module_name'=>'HRM'],
            ['module_name'=>'Finance'],
            ['module_name'=>'Palm Oil'],
            ['module_name'=>'Tree Plant']
        ];

        foreach ($settingsModules as $key => $settingsModule) {
            Setting::create($settingsModule);
        }
    }
}
