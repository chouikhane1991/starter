<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Traits\offerTrait;
use Illuminate\Http\Request;

class Ajax extends Controller
{
    use  offerTrait;
    public function create(){
        return view('offersAjax/create');

    }
    public function store(Request $data){
        //save offer into data base using Ajax
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

}
