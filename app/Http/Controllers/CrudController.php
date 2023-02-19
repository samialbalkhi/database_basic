<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffreRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class CrudController extends Controller
{
    public function getoffers()
    {
        return Offer::select('id','name')->get();
    }

    public function create()
    {
        return view("offer.create");

    }
    public function stor(OffreRequest $request)
    {
        // dd($request->image);        
       $path=$request->image->store('images','public');

        Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
            'image'=>$path

        ]);
    }

    public function gitalloffer()
    {
        $offre=Offer::select('id','name','price','details')->get();   
        return view("offer.getalloffer",compact('offre')); 
    }
    public function editoffer($id)
    {
      $offer=Offer::findOrFail($id);
      if($offer)
     $offer=Offer::select('id','name','price','details')->find($id);
        return view('offer.edit',compact('offer'));
        
    }
    public function updateoffer(OffreRequest $request,$id)
    {  
       $offer=$offer=Offer::findOrFail($id);

        $offer->update([

            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details

        ]);
        
        return redirect()->back()->with(['success'=>'insted updated']);
    }
    public function deleteoffer($id)
    {
        $offer=Offer::findOrFail($id);
        if($offer)
        // return redirect()->back()->with(['error'=>'offer not found']);

        $offer->delete();
        return redirect()->route('alloffer',$id)->with(['success'=>'offer deleted']);
    }
}
