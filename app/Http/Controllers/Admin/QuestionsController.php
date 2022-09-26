<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $items = Question::orderBy('id','desc')->with('creator')->get();
        return view('admin.questions.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.add-form');
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
            'question' => 'required',
            'type' => 'required',
            'yes_no' => 'required',
        ]);

        try{    
            $data = [
                'name' => $request->name,
                'question' => $request->question,
                'type' => $request->type,
                'yes_no' => $request->yes_no,
            ];
            $data['created_by'] = Auth()->user()->id;
            $create = Question::create($data);
            return redirect(route('questions.edit',[$create->id]))->with('success','Question Created');
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
        $item = Question::findOrFail($id);
        return view('admin.questions.form',compact('item'));
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
            'question' => 'required',
            'type' => 'required',
            'yes_no' => 'required',
        ]);

        try{
            $data = [
                'name' => $request->name,
                'question' => $request->question,
                'type' => $request->type,
                'yes_no' => $request->yes_no,
            ];
            $data['created_by'] = Auth()->user()->id;
            $update = Question::whereId($id)->update($data);
            return redirect(route('questions.edit',[$id]))->with('success','Question Updated');
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
            Question::destroy($id);
            return redirect(route('questions.index'))->with('success','Question Deleted');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
