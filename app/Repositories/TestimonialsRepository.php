<?php

namespace App\Repositories;

use App\Interfaces\TestimonialsRepositoryInterface;
use App\Models\Testimonial;
use Exception;

class TestimonialsRepository implements TestimonialsRepositoryInterface{
    public function getAllTestimonials(){
        return Testimonial::orderBy('id','desc')->get();
    }
    public function getTestimonialById($TestimonialId){
        return Testimonial::findOrFail($TestimonialId);
    }
    public function deleteTestimonial($TestimonialId){
        return Testimonial::destroy($TestimonialId);
    }
    public function createTestimonial(object $TestimonialDetails){        
        $data = [
            'name' => $TestimonialDetails->name,
            'description' => $TestimonialDetails->description,
        ];
        if($TestimonialDetails->file('image')){
            $uploadFile = uploadFile($TestimonialDetails->file('image'),'testimonials'); //uploadFile from helper.php
            $data['image'] = $uploadFile;
        }
        $data['created_by'] = Auth()->user()->id;
        return Testimonial::create($data);
    }
    public function updateTestimonial($TestimonialId, object $newDetails){        
        $data = [
            'name' => $newDetails->name,
            'description' => $newDetails->description,
        ];
        if($newDetails->file('image')){
            $uploadFile = uploadFile($newDetails->file('image'),'testimonials'); //uploadFile from helper.php
            $data['image'] = $uploadFile;
        }
        return Testimonial::whereId($TestimonialId)->update($data);
    }
}