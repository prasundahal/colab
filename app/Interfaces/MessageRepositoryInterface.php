<?php

namespace App\Interfaces;

interface MessageRepositoryInterface 
{
    public function getAllMessages();
    public function getMessageById($messageId);
    public function deleteMessage($messageId);
    public function bulkDeleteMessage($array);    
    public function createMessage(object $messageDetails);
    public function toggleStatus($messageId);
}