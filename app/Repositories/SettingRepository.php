<?php

namespace App\Repositories;

use App\Interfaces\SettingRepositoryInterface;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingRepository implements SettingRepositoryInterface{
    public function getAllSettings(){
        $settings = Cache::remember('settings',config('app.cache_time'), function(){
            return Setting::first();
        });
        return $settings;
    }
    public function getSettingById($id){
        return Setting::findOrFail($id);
    }
    public function deleteSetting($id){
        Cache::forget('settings');
        return Setting::destroy($id);
    }
    public function createSetting(object $SettingDetails){        
        $data = [
            'question' => $SettingDetails->question,
            'answer' => $SettingDetails->answer,
        ];
        $data['created_by'] = Auth()->user()->id;
        return Setting::create($data);
    }
    public function updateSetting($id, object $SettingDetails){      
        Cache::forget('settings');  
        $data = [
            'phone' => $SettingDetails->phone,
            'mobile' => $SettingDetails->mobile,
            'email' => $SettingDetails->email,
            'opening_hours' => $SettingDetails->opening_hours,
            'location' => $SettingDetails->location,
            'address' => $SettingDetails->address,
            'instagram' => $SettingDetails->instagram,
            'facebook' => $SettingDetails->facebook,
            'twitter' => $SettingDetails->twitter,
            'youtube' => $SettingDetails->youtube,
            'logo' => $SettingDetails->logo
        ];
        if($SettingDetails->file('logo')){
            $uploadFile = uploadFile($SettingDetails->file('logo'),''); //uploadFile from helper.php
            $data['logo'] = $uploadFile;
        }
        return Setting::whereId($id)->update($data);
    }
}