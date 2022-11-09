<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistrationMail;
use App\Models\FormNumber;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ColabController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:formnumbers,phone_number',
        //     'name' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        // }
        $data = [];
        $user_email = '';
        $user_name = '';
        $questions = Question::get();
        $post_data = $request->all();
        // $name  = $request->name;
        // $phone  = $request->phone_number;
        foreach($questions as $question){
            if(key_exists($question->name,$post_data)){
                if($question->type == 'number'){
                    if(!is_numeric($post_data[$question->name])){
                        return redirect()->back()->withInput()->with('error',$question->question.' must be a number.');
                    }
                }
                if($question->type == 'email'){
                    $user_email = $post_data[$question->name];
                }
                if($question->type == 'string' && $question->name == "full_name"){
                    $user_name = $post_data[$question->name];
                }
                $answer = $post_data[$question->name];
                $image  = '';
                if($question->type == 'image'){
                    $uploadFile = uploadFile($request->file($question->name),'form-images'); //uploadFile from helper.php
                    $image = $uploadFile;
                    $answer = '';
                }
                $data[] = [
                    'question' => $question->question,
                    'name' => $question->name,
                    'type' => $question->type,
                    'image' => $image,
                    'answer' => $answer
                ];
            }
            // else{
            //     echo 'asdf';
            // }
        }
        $json = array(
            'details' => json_encode($data)
        );
        $sql = FormNumber::create($json);  
        if(!$sql){
            return redirect()->back()->withInput()->with('error', $sql);
        }

        if(!empty($user_email)){            
            $sendtexttouser ='Welcome '.$user_name.', to Noor Games family.We have received your details. Someone from collab team will reach back to you based on your eligibility.
            Note: Do not  bother asking to Sasha when will they reach out.';
            $details = array(
                'message' => $sendtexttouser,
                'subject' => 'Welcome To The Family',
                'title' => 'Noor Games',
                'theme' => '/public/images/animation.gif.mp4'
            );
            Mail::to($user_email)->send(new UserRegistrationMail(json_encode($details)));
        }            

        $admin_email = 'baros73190@lidely.com';
        $sendtexttouser ='New Registration Alert <b>Name : '.$user_name.'</b> Email : '.$user_email.'</b>';
        $details = array(
            'message' => $sendtexttouser,
            'subject' => 'New Registration Alert',
            'title' => 'Noor Games',
            'theme' => '/images/animation.gif.mp4'
        );
        Mail::to($admin_email)->send(new UserRegistrationMail(json_encode($details)));
      
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
