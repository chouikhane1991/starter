<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\Video;
use App\Traits\offerTrait;
use Facade\FlareClient\View;
use LaravelLocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Crud extends Controller
{
    use offerTrait;
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
     public function store(OfferRequest $data){
        // $rules=['name'=>'required|max:100|unique:offers,name',
          //   'price'=>'required|numeric',
            // 'details'=>'required|',];
         //$message=$this->getMessages();
         //$rules=$this->getrules();
         //$message=['name.required'=>'please choose other name',];

        //$validator=Validator::make($data->all(),$rules,$message);
        //if($validator->fails()){
           // return $validator->errors()->first();
           // return $validator->errors();
          //  return redirect()->back()->withErrors($validator)->withInput($data->all());
        //}

         //save photo
            $image_name=$this->SaveImage($data->photo,'images/offers');
         //return 'done';

         Offer::create([
             'photo'=>$image_name,
             'name_ar'=>$data->name_ar,
             'name_en'=>$data->name_en,
             'price'=>$data->price,
             'details_ar'=>$data->details_ar,
             'details_en'=>$data->details_en,

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
     public function index(){

          $offers=Offer::select(
              'id',
              'name_'.LaravelLocalization::getCurrentLocale().' as name',
              'price',
              'photo',
              'details_'.LaravelLocalization::getCurrentLocale().' as details'

          )->get();
          return view('offers/index',compact('offers'));
     }
     public function EditOffers ($offer_id){
         //Offer::findorfail($offer_id);
         $offer=Offer::find($offer_id);
         $offer2=Offer::select('name_ar')->find($offer_id);
         if($offer){
             return view('offers.edite',compact('offer'));
               // return $offer;

         }else{
             return redirect()->back();

         }

     }
    public function UpdateOffers(OfferRequest $data,$offer_id){
        //validation done in requiste php
         $offer=Offer::find($offer_id);
         //check the offer is existe or no
        if(!$offer)
            return redirect()->back();
        //there is two methos update first one
        $offer->update($data->all());

        return redirect()->back()->with('success',trans('messages.update'));

    }
    public function youtube(){
         $video=Video::first();
         event(new VideoViewer($video));
         return view('offers.youtube')->with('video',$video);

    }
    public function delete($offer_id){
        $offer=Offer::find($offer_id)->first();;
        //$offer=Offer::where('id',$offer_id)->first();
        if(!$offer)
        return redirect()->back();

        $offer->delete();
        return redirect()->route('index')->with(['done'=>'your order has been deleted ']);;



    }



}
