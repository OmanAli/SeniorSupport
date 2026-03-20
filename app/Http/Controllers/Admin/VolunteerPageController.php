<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VolunteerHero;
use App\Models\VolunteerRole;
use App\Models\VolunteerWhyUs;
use App\Models\VolunteerBenefit;
use App\Models\VolunteerWhyUsImage;
use App\Models\VolunteerApplication;
use App\Models\VolunteerTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerPageController extends Controller
{
    // Hero Section View
    public function VolunteerheroSection()
    {
        $data = VolunteerHero::first();
        return view('admin.volunteer.heroSection', compact('data'));
    }

    // Hero Section Update
    public function VolunteerUpdateheroSection(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'hero_heading' => 'required|string|max:255',
                'hero_subtitle' => 'required|string|max:255',
                'hero_paragraph' => 'nullable|string',
            ]);

            $hero = VolunteerHero::first();

            if (!$hero) {
                $hero = new VolunteerHero();
            }

            $hero->hero_heading = $request->input('hero_heading');
            $hero->hero_subtitle = $request->input('hero_subtitle');
            $hero->hero_paragraph = $request->input('hero_paragraph');
            $hero->save();

            DB::commit();
            return back()->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }


    // Roles Section View
public function VolunteerRolesSection()
{
    $data = VolunteerRole::orderBy('role_order', 'asc')->get();
    return view('admin.volunteer.rolesSection', compact('data'));
}

// Add Role
public function VolunteerUpdateRolesSection(Request $request)
{
    DB::beginTransaction();
    try {
        $request->validate([
            'role_order' => 'required|integer',
            'role_title' => 'required|string|max:255',
            'role_description' => 'required|string',
            'role_icon' => 'required|string|max:255',
        ]);

        VolunteerRole::create([
            'role_order' => $request->role_order,
            'role_title' => $request->role_title,
            'role_description' => $request->role_description,
            'role_icon' => $request->role_icon,
        ]);

        DB::commit();
        return back()->with('success', 'Role added successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Something went wrong!');
    }
}


// Why Us Section View
public function VolunteerWhyUsSection()
{
    $mainData = VolunteerWhyUs::first();
    $benefits = VolunteerBenefit::orderBy('benefit_order', 'asc')->get();
    $imageData = VolunteerWhyUsImage::first();
    return view('admin.volunteer.whyUsSection', compact('mainData', 'benefits', 'imageData'));
}

// Update Why Us Section (Main heading, paragraph, stats, 4 benefits)
public function VolunteerUpdateWhyUsSection(Request $request)
{
    DB::beginTransaction();
    try {
        // Validate main data
        $request->validate([
            'main_heading' => 'required|string|max:255',
            'main_paragraph' => 'required|string',
            'stats_number' => 'required|string|max:50',
            'stats_text' => 'required|string|max:255',
        ]);

        // Update or create main data
        $whyUs = VolunteerWhyUs::first();
        if (!$whyUs) {
            $whyUs = new VolunteerWhyUs();
        }
        $whyUs->main_heading = $request->main_heading;
        $whyUs->main_paragraph = $request->main_paragraph;
        $whyUs->stats_number = $request->stats_number;
        $whyUs->stats_text = $request->stats_text;
        $whyUs->save();

        // Update or create 4 benefits
        for ($i = 1; $i <= 4; $i++) {
            $benefit = VolunteerBenefit::where('benefit_order', $i)->first();
            if (!$benefit) {
                $benefit = new VolunteerBenefit();
                $benefit->benefit_order = $i;
            }
            $benefit->benefit_title = $request->input('benefit_title_' . $i);
            $benefit->benefit_description = $request->input('benefit_description_' . $i);
            $benefit->save();
        }

        DB::commit();
        return back()->with('success', 'Why Volunteer With Us Section updated successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Something went wrong!');
    }
}


// Update Why Us Image
public function VolunteerUpdateWhyUsSectionImage(Request $request)
{
    DB::beginTransaction();
    try {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imageRecord = VolunteerWhyUsImage::first();
        if (!$imageRecord) {
            $imageRecord = new VolunteerWhyUsImage();
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            
            // Folder path
            $destinationPath = public_path('assets/images/volunteer/whyUs');
            
           
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $request->image->move($destinationPath, $imageName);
            $imageRecord->image = $imageName;
        }

        $imageRecord->save();
        DB::commit();
        return back()->with('success', 'Image updated successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}




public function VolunteerDeleteWhyUsImage()
{
    try {
        $imageRecord = VolunteerWhyUsImage::first();
        
        if ($imageRecord && $imageRecord->image) {
            // Delete file from storage
            $imagePath = public_path('assets/images/volunteer/whyUs/' . $imageRecord->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            
            // Delete entire record
            $imageRecord->delete();
            
            return back()->with('success', 'Image deleted successfully!');
        }
        
        return back()->with('error', 'No image found to delete!');
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}


public function VolunteerApplications()
{
    $applications = VolunteerApplication::orderBy('created_at', 'desc')->get();
    return view('admin.volunteer.applications', compact('applications'));
}


public function VolunteerTestimonials()
{
    $testimonials = VolunteerTestimonial::orderBy('display_order', 'asc')->get();
    return view('admin.volunteer.testimonials', compact('testimonials'));
}

public function VolunteerUpdateTestimonial(Request $request)
{
    DB::beginTransaction();
    try {
        $request->validate([
            'display_order' => 'required|integer',
            'quote' => 'required|string',
            'author_name' => 'required|string|max:255',
            'author_role' => 'required|string|max:255',
        ]);

        VolunteerTestimonial::create([
            'display_order' => $request->display_order,
            'quote' => $request->quote,
            'author_name' => $request->author_name,
            'author_role' => $request->author_role,
        ]);

        DB::commit();
        return back()->with('success', 'Testimonial added successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Something went wrong!');
    }
}

public function VolunteerDeleteTestimonial($id)
{
    try {
        $testimonial = VolunteerTestimonial::findOrFail($id);
        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong!');
    }
}












}