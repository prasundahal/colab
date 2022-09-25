<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\FaqRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private FaqRepositoryInterface $faqRepository;

    public function __construct(FaqRepositoryInterface $faqRepository) 
    {
        $this->faqRepository = $faqRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->faqRepository->getAllFaq();
        return view('admin.faq.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.add-form');
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
            'question' => 'required',
            'answer' => 'required',
        ]);

        try{
            $create = $this->faqRepository->createFaq($request);
            return redirect(route('faq.edit',[$create->id]))->with('message','FAQ Created');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->faqRepository->getFaqById($id);
        return view('admin.faq.form',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        try{
            $create = $this->faqRepository->updateFaq($id,$request);
            return redirect(route('faq.edit',[$id]))->with('success','FAQ Updated');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->faqRepository->deleteTestimonial($id); 
            return redirect(route('faq.index'))->with('success','Testimonial Deleted');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
