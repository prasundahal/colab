<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Interfaces\TestimonialsRepositoryInterface;

class TestimonialsController extends Controller
{
    // protected $users;
    private TestimonialsRepositoryInterface $testimonialRepository;

    public function __construct(TestimonialsRepositoryInterface $testimonialRepository) 
    {
        $this->testimonialRepository = $testimonialRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->testimonialRepository->getAllTestimonials();
        return view('admin.testimonials.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.add-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try{
            $create = $this->testimonialRepository->createTestimonial($request);
            return redirect(route('testimonials.edit',[$create->id]))->with('message','Testimonial Created');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->testimonialRepository->getTestimonialById($id);
        return view('admin.faq.form',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try{
            $create = $this->testimonialRepository->updateTestimonial($id,$request);
            return redirect(route('testimonials.edit',[$id]))->with('success','Testimonial Updated');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->testimonialRepository->deleteTestimonial($id); 
            return redirect(route('testimonials.index'))->with('success','Testimonial Deleted');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
