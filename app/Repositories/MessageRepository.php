<?php

namespace App\Repositories;

use App\Interfaces\MessageRepositoryInterface;
use App\Models\Message;
use Illuminate\Support\Facades\Cache;

class MessageRepository implements MessageRepositoryInterface{
    public function getAllMessages(){
        // return Message::orderBy('id','desc')->get();
        return Message::orderBy('id','desc')->paginate(2);
    }
    public function getMessageById($messageId){
        return Message::findOrFail($messageId);
    }
    public function deleteMessage($messageId){
        Cache::forget('messagesCount');
        return Message::destroy($messageId);
    }
    public function bulkDeleteMessage($array){
        Cache::forget('messagesCount');
        foreach($array as $a => $messageId){
            Message::destroy($messageId);
        }
        return true;
    }
    public function createMessage(object $messageDetails){        
        $data = [
            'name' => $messageDetails->name,
            'email' => $messageDetails->email,
            'phone' => $messageDetails->phone,
            'message' => $messageDetails->message,
        ];
        return Message::create($data);
    }
    public function toggleStatus($messageId){    
        Cache::forget('messagesCount');    
        $data = [
            'is_new' => 1,
        ];
        return Message::whereId($messageId)->update($data);
    }
}