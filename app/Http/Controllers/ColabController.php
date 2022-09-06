<?php

namespace App\Http\Controllers;

use App\Models\Colab;
use Illuminate\Http\Request;

class ColabController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => [
            'store'
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {

    // }

    public function store(Request $request,Colab $colabs)
    {

        $validator = Validator::make($request->all(), [
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:colabs,number',
            'full_name' => 'required'
        ]);
        // $request->validate([
        // 'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:forms,number'
        // ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }
        $formdata = array(
            'full_name'       =>   isset($request->full_name)?($request->full_name):null,
            'first_question'       =>   isset($request->first_question)?($request->first_question):null,
            'second_question'       =>   isset($request->second_question)?($request->second_question):null,
            'image1'       =>   isset($request->image1)?($request->image1):null,
            'number'       =>   isset($request->number)?($request->number):null,
            'state'       =>   isset($request->state)?($request->state):null,
            'email'       =>   isset($request->email)?($request->email):null,
            'image2'       =>   isset($request->image2)?($request->image2):null,
            'third_question'       =>   isset($request->third_question)?($request->third_question):null,
            'fourth_question'       =>   isset($request->fourth_question)?($request->fourth_question):null,
            'fifth_question'       =>   isset($request->fifth_question)?($request->fifth_question):null

        );
        $sql = Colab::create($formdata);
        if(!$sql){
            return redirect()->back()->withInput()->with('error', $sql);
        }

        $sendtexttouser ='Welcome'.' ' . $request->full_name . ' ' .', to family.We have received your details. Someone from collab team will reach back to you based on your eligibility.
           Note: Don not  bother asking to Sasha when will they reach out.';
        $str = $request->number;
        $usernumber = preg_replace('/[^0-9]/','',$str);
        $usernumberint = (int) filter_var($usernumber, FILTER_SANITIZE_NUMBER_INT);
//  dd($usernumberint);
        $settings = GeneralSetting::first();
        $key = (string) $settings['api_key'];
        $secret = (string) $settings['api_secret'];
        $basic  = new \Vonage\Client\Credentials\Basic($key, $secret);
        $client = new \Vonage\Client($basic);
        $message = $client->message()->send([
        'to' => '1'.$usernumber,
        'from' => '18337222376',
        'text' => $sendtexttouser
        ]);


          $sendtexttoadmin =' Collab team      '.' '  . $request->full_name . ' is added to the family with ' . 'Phone ' . $request->phone_number . ' ' . 'Take your time to reach out to him.';
        // dd($sendtexttoadmin, $sendtexttouser);
        $basic  = new \Vonage\Client\Credentials\Basic($key, $secret);
        $client = new \Vonage\Client($basic);
        $message = $client->message()->send([
        'to' => '19292684435',
        'from' => '18337222376',
        'text' => $sendtexttoadmin
        ]);


        return redirect()->route('formsuccess')->with('success', 'Thank You.');
        // return redirect('formsuccess')->with('success', 'Thank You. ');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colab  $colab
     * @return \Illuminate\Http\Response
     */
    public function show(Colab $colab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\colab  $colab
     * @return \Illuminate\Http\Response
     */
    public function edit(Colab $colab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\colab  $colab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colab $colab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\colab  $colab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colab $colab)
    {
        //
    }
}
