<?php

namespace App\Http\Controllers;

use App\Events\VideoViwer;
use App\Models\Visit;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function youtub()
    {
       $Video=Visit::first();
       event(new VideoViwer($Video));
        return view('video')->with('Video',$Video);
    }
}
