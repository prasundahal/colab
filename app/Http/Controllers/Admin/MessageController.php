<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\MessageRepositoryInterface;
use App\Models\Message;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MessageController extends Controller
{
    private MessageRepositoryInterface $messageRepository;

    public function __construct(MessageRepositoryInterface $messageRepository) 
    {
        $this->messageRepository = $messageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Message::when($request->has("name"),function($q)use($request){
            return $q->where("name","like","%".$request->get("name")."%");
        })->orderBy('id','desc')->paginate(2);
        if($request->ajax()){
            return view('admin.message.partials.list ',['items'=>$items]); 
        } 
        // $items = $this->messageRepository->getAllMessages();
        return view('admin.message.index',compact('items'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.message.add-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        // $validated = $request->validate([
        //     'question' => 'required',
        //     'answer' => 'required',
        // ]);

        // try{
        //     $create = $this->faqRepository->createFaq($request);
        //     return redirect(route('faq.edit',[$create->id]))->with('message','FAQ Created');
        // }
        // catch(Exception $e){
        //     return back()->with('error',$e->getMessage());
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->messageRepository->getMessageById($id);
        $this->messageRepository->toggleStatus($id);
        //observer is not hit here
        return view('admin.message.form',compact('item'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $this->messageRepository->deleteMessage($id); 
            return redirect(route('messages.index'))->with('success','Message Deleted');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function bulkDeleteMessage(Request $request){ 
        try{
            $create = $this->messageRepository->bulkDeleteMessage($request->cids);
            
            $items = Message::when($request->has("name"),function($q)use($request){
                return $q->where("name","like","%".$request->get("name")."%");
            })->orderBy('id','desc')->paginate(2);
            if($request->ajax()){
                return view('admin.message.partials.list ',['items'=>$items]); 
            } 
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
        
        
        return $request->cids;
    }

    public function composeMessage(){
        return view('admin.message.partials.compose'); 
    }
}
