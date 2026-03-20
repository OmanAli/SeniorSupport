<?php

namespace App\Http\Controllers;

use App\Mail\PlacementRequest as MailPlacementRequest;
use Illuminate\Http\Request;
use App\Models\PlacementRequest;
use App\Models\PlacementRequestBanner;
use Illuminate\Support\Facades\Mail;

class PlacementRequestController extends Controller
{

     public function index()
    {
        // Banner DB se fetch karo
        $banner = PlacementRequestBanner::first();

        return view('placement-request', compact('banner'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'full_name'=>'required|string|max:255',
            'phone'=>'required|string|max:20',
            'email'=>'required|email|max:255',
            'senior_age'=>'required|integer',
            'care_type'=>'required|string',
            'location'=>'required|string|max:255',
            'message'=>'required|string',
        ]);

        $data=PlacementRequest::create($request->all());
        Mail::to('Consultingseniorsolutions@gmail.com')->send(new MailPlacementRequest($data));
        return redirect()->back()->with('success', 'Placement request submitted successfully!');
    }

}

