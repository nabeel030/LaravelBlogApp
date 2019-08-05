<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Setting::create([
        'site_name' => 'My Blog',
        'contact_email' => 'na@gmail.com',
        'contact_number' => '0347 2725413',
        'address' => 'Karachi, Pakistan',
      ]);
    }
}
