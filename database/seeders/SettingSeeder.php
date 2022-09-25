<?php

namespace Database\Seeders;

use App\Models\Setting;
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
        // Setting::factory()->count(2)->create();
        Setting::create([
            'phone' => '9811111111',
            'mobile' => '9811111111', 
            'email' =>'example@gmail.com', 
            'opening_hours' => 'Mon – Sat, 8AM – 5PM',
            'location' => 'location',
            'address' => 'Akeshedhaara, Kathmandu, Nepal', 
            'instagram' =>'instagram', 
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'youtube' => 'youtube', 
            'logo' =>'logo.jpg'
        ]);

        
        // Setting::create(['name' => 'Phone','item_key' => 'phone', 'setting_type' =>'number', 'value' => '9811111111']);
        // Setting::create(['name' => 'Mobile','item_key' => 'mobile', 'setting_type' =>'number', 'value' => '9811111111']);
        // Setting::create(['name' => 'Email','item_key' => 'email', 'setting_type' =>'email', 'value' => 'example@gmail.com']);
        // Setting::create(['name' => 'Opening Hours','item_key' => 'opening-hours', 'setting_type' =>'text', 'value' => 'Mon – Sat, 8AM – 5PM']);
        // Setting::create(['name' => 'Location','item_key' => 'location', 'setting_type' =>'text', 'value' => 'location']);
        // Setting::create(['name' => 'Address','item_key' => 'address', 'setting_type' =>'text', 'value' => 'Akeshedhaara, Kathmandu, Nepal']);
        // Setting::create(['name' => 'Instagram','item_key' => 'instagram', 'setting_type' =>'text', 'value' => 'instagram']);
        // Setting::create(['name' => 'Facebook','item_key' => 'facebook', 'setting_type' =>'text', 'value' => 'facebook']);
        // Setting::create(['name' => 'Twitter','item_key' => 'twitter', 'setting_type' =>'text', 'value' => 'twitter']);
        // Setting::create(['name' => 'Youtube','item_key' => 'youtube', 'setting_type' =>'text', 'value' => 'youtube']);
        // Setting::create(['name' => 'Logo','item_key' => 'logo', 'setting_type' =>'text', 'value' => 'logo.jpg']);
    }
}
