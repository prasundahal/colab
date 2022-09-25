<?php

namespace App\Interfaces;

interface FaqRepositoryInterface 
{
    public function getAllFaq();
    public function getFaqById($FaqId);
    public function deleteFaq($Faq);
    public function createFaq(object $FaqDetails);
    public function updateFaq($FaqId, object $newDetails);
}