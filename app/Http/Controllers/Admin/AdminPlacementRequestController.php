<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlacementRequest;

class AdminPlacementRequestController extends Controller
{

    public function index()
    {
    
        $requests = PlacementRequest::orderBy('id', 'desc')->get();
        
    
        return view('admin.placement_request.requests', compact('requests'));
    }
}
