<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Crud extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function getoffers(){
        return Offer::select('name')->get();
     }
     public function store(Request $data){
        // $rules=['name'=>'required|max:100|unique:offers,name',
          //   'price'=>'required|numeric',
            // 'details'=>'required|',];
         $message=$this->getMessages();
         $rules=$this->getrules();
         //$message=['name.required'=>'please choose other name',];

        $validator=Validator::make($data->all(),$rules,$message);
        if($validator->fails()){
           // return $validator->errors()->first();
           // return $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput($data->all());
        }

         Offer::create([
             'name'=>$data->name,
             'price'=>$data->price,
             'details'=>$data->details,

         ]);
         return redirect()->back()->with('success','Saved');
     }

     public  function create (){
         return view('offers.create');

     }
     protected function  getMessages(){
         $messages=['name.required'=>__('messages.required'),
             ];
         return $messages;
     }
     protected function getrules(){
         $rules=['name'=>'required|max:100|unique:offers,name',
             'price'=>'required|numeric',
             'details'=>'required|',];
         return $rules;


     }

}
