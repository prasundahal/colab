<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FormNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColabController extends Controller
{
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:formnumbers,phone_number',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }
        $image_1 = '';
        $image_2 = '';
        if($request->file('image_1')){
            $uploadFile = uploadFile($request->file('image_1'),'form-images'); //uploadFile from helper.php
            $image_1 = $uploadFile;
        }
        if($request->file('image_2')){
            $uploadFile2 = uploadFile($request->file('image_2'),'form-images'); //uploadFile from helper.php
            $image_2 = $uploadFile2;
        }
        $formdata = array(
            'cash_app_send_limit'       =>   isset($request->cash_app_send_limit)?($request->cash_app_send_limit):null,
            'us_citizen'       =>   isset($request->us_citizen)?($request->us_citizen):null,
            'cash_app'       =>   isset($request->cash_app)?($request->cash_app):null,
            'driving_license'       =>   isset($request->driving_license)?($request->driving_license):null,
            'cash_app_score'       =>   isset($request->cash_app_score)?($request->cash_app_score):null,
            'cash_app_send_limit'       =>   isset($request->cash_app_send_limit)?($request->cash_app_send_limit):null,
            'state'       =>   isset($request->state)?($request->state):null,
            'crime'       =>   isset($request->crime)?($request->crime):null,
            'extra_1'       =>   isset($request->extra_1)?($request->extra_1):null,
            'extra_2'       =>   isset($request->name)?($request->name):null,
            'image_1'       =>   $image_1,
            'image_2'       =>   $image_2,
            'phone_number'       =>   isset($request->phone_number)?($request->phone_number):null
        
        );
        $sql = FormNumber::create($formdata);  
        if(!$sql){
            return redirect()->back()->withInput()->with('error', $sql);
        }
      
        // $sendtexttouser ='Welcome'.' ' . $request->name . ' ' .', to Noor Games family.We have received your details. Someone from collab team will reach back to you based on your eligibility.
        //    Note: Do not  bother asking to Sasha when will they reach out.';
        // $str = $request->phone_number;
        // $usernumber = preg_replace('/[^0-9]/','',$str);
        // $usernumberint = (int) filter_var($usernumber, FILTER_SANITIZE_NUMBER_INT);

        //  dd($usernumberint);
        // $settings = GeneralSetting::first();
        // $key = (string) $settings['api_key'];
        // $secret = (string) $settings['api_secret'];
        // $basic  = new \Vonage\Client\Credentials\Basic($key, $secret);
        // $client = new \Vonage\Client($basic);
        // $message = $client->message()->send([
        // 'to' => '1'.$usernumber,
        // 'from' => '18337222376',
        // 'text' => $sendtexttouser
        // ]);
       
        
        //   $sendtexttoadmin =' Collab team      '.' '  . $request->name . ' is added to the family with ' . 'Phone ' . $request->phone_number . ' ' . 'Take your time to reach out to him.';
        // $basic  = new \Vonage\Client\Credentials\Basic($key, $secret);
        // $client = new \Vonage\Client($basic);
        // $message = $client->message()->send([
        // 'to' => '19292684435',
        // 'from' => '18337222376',
        // 'text' => $sendtexttoadmin
        // ]);
        
        
        return redirect()->route('formsuccess')->with('success', 'Thank You.');
    }
}
