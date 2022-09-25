<?php

namespace App\Repositories;

use App\Interfaces\FaqRepositoryInterface;
use App\Models\Faq;
use Exception;

class FaqRepository implements FaqRepositoryInterface{
    public function getAllFaq(){
        return Faq::orderBy('id','desc')->get();
    }
    public function getFaqById($FaqId){
        return Faq::findOrFail($FaqId);
    }
    public function deleteFaq($Faq){
        return Faq::destroy($Faq);
    }
    public function createFaq(object $FaqDetails){        
        $data = [
            'question' => $FaqDetails->question,
            'answer' => $FaqDetails->answer,
        ];
        $data['created_by'] = Auth()->user()->id;
        return Faq::create($data);
    }
    public function updateFaq($FaqId, object $newDetails){        
        $data = [
            'question' => $newDetails->question,
            'answer' => $newDetails->answer,
        ];
        return Faq::whereId($FaqId)->update($data);
    }
}