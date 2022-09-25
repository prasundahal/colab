<?php

namespace App\Interfaces;

interface TestimonialsRepositoryInterface 
{
    public function getAllTestimonials();
    public function getTestimonialById($TestimonialId);
    public function deleteTestimonial($TestimonialId);
    public function createTestimonial(object $TestimonialDetails);
    public function updateTestimonial($TestimonialId, object $newDetails);
}