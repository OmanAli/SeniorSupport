<?php

namespace App\Http\Controllers;

use App\Models\VolunteerHero;
use App\Models\VolunteerRole;
use App\Models\VolunteerWhyUs;
use App\Models\VolunteerApplication;
use App\Models\VolunteerTestimonial;

use App\Models\VolunteerBenefit;
use App\Models\VolunteerWhyUsImage;
use Illuminate\Http\Request;

class VolunteerPageController extends Controller
{
    // Frontend - Volunteer Page Show
    public function index()
    {
        $hero = VolunteerHero::first();
        $roles = VolunteerRole::orderBy('role_order', 'asc')->get();
        
        // Why Us Section Data
        $mainData = VolunteerWhyUs::first();
        $benefits = VolunteerBenefit::orderBy('benefit_order', 'asc')->get();
        $imageData = VolunteerWhyUsImage::first();
        $testimonials = VolunteerTestimonial::orderBy('display_order', 'asc')->get(); 
        
        
    return view('volunteer', compact(
        'hero', 
        'roles', 
        'mainData', 
        'benefits', 
        'imageData',
        'testimonials'
    ));

    }









public function store(Request $request)
{
    try {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
        ]);

        VolunteerApplication::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Thank you! Your application has been submitted successfully.');
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong.')->withInput();
    }
}

}