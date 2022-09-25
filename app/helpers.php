<?php

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

if (!function_exists('test')) {
    function test(){
        dd('helper');
    }
}
if (!function_exists('uploadFile')) {
    function uploadFile($file,$folder){
        $file= $file;
        $filename= date('YmdHi').'.'.$file->extension();
        if($folder == ''){
            $file-> move(public_path('images'), $filename);
        }else{
            $file-> move(public_path('images/'.$folder), $filename);
        }
        return $filename;
    }
}
if (!function_exists('fileExists')) {
    function fileExists($file,$folder){
        $file= $file;
        
        if (file_exists(public_path('images/'.$folder.'/'.$file))) {
            return true;
        } else {
            return false;
        }
    }
}
if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
if (!function_exists('getNewMessagesCount')) {
    function getNewMessagesCount() {
        // $message_count = Cache::remember('messagesCount','60*60*24', function(){
            return Message::where('is_new',0)->count();
        // });
        // return $message_count;
    }
}
if (!function_exists('LogFunction')) {
    function LogFunction($message) {
        Log::info($message);
    }
}
if (!function_exists('time_elapsed_string')) {
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}