<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function getoffers()
    {
        return Offer::select('id','name')->get();
    }
    // public function stor(Request $request)
    // {
    //     Offer::create([

    //         'name'=>$request->name,
    //         'price'=>$request->price,
    //         'details'=>$request->details

    //     ]);
    // }

    public function create()
    {
        return view("offer.create");

    }
    public function stor(Request $request)
    {
    //    return ($request);
        $rules=$this->getRules();
        $messges=$this->getmessages();
        $validator=Validator::make($request->all(),$rules,$messges);
            
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());

        }
        Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details
        ]);

        return redirect()->back()->with(['success'=>'insted offers']);

    }

    public function getRules()
    {
      return $rules=
        ['name'=>'required|max:20|unique:offers,name',
        'price'=>'required|numeric',
        'details'=>'required',];
    }
    public function getmessages()
    {
        
     return $messges=   
     [
         'name.required'=>__('messages.your name is required'),
        'name.unique'=>__('messages.already a username'),
        'price.required'=>__('messages.inter your price offer'),
        'price.numeric'=>__("messages.inter youe plese Numbers"),
         'details'=>__('messages.inter your details plese')
        ];
    }

}
