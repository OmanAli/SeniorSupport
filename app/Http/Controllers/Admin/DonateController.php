<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonateHero;
use App\Models\DonateForm;
use App\Models\DonateWhyDonate;
use App\Models\DonateWhyText;
use App\Models\DonateWaysToGive;
use App\Models\DonateWaysToGiveText;
use App\Models\DonateWhereMoneyGoesText;
use App\Models\DonateWhereMoneyGoesCard;
use App\Models\DonateDonorRecognitionText;
use App\Models\DonateDonorRecognitionCard;
use App\Models\DonationSubmission;
use App\Models\DonateFormExtraText;




class DonateController extends Controller
{
    public function heroSection()
    {
        $data = DonateHero::first();
        return view('admin.donate.hero', compact('data'));
    }

    public function updateHeroSection(Request $request)
    {
        $request->validate([
            'heading' => 'required|string',
            'subheading' => 'required|string',
            'description' => 'required|string',
            'button_text' => 'required|string',
        ]);

        $data = DonateHero::first();
        if (!$data) {
            $data = new DonateHero();
        }

        $data->heading = $request->heading;
        $data->subheading = $request->subheading;
        $data->description = $request->description;
        $data->button_text = $request->button_text;
        $data->save();

        return redirect()->back()->with('success', 'Hero section updated successfully');
    }



    public function deleteHeroSection()
{
    $data = DonateHero::first();
    if ($data) {
        $data->delete();
    }
    return redirect()->back()->with('success', 'Hero section deleted. Default values restored.');
}


public function formSection()
{
    $data = DonateForm::first();
    return view('admin.donate.form', compact('data'));
}

public function updateFormSection(Request $request)
{
    $request->validate([
        'form_heading' => 'required|string',
        'form_subheading' => 'required|string',
    ]);

    $data = DonateForm::first();
    if (!$data) {
        $data = new DonateForm();
    }

    $data->form_heading = $request->form_heading;
    $data->form_subheading = $request->form_subheading;
    $data->save();

    return redirect()->back()->with('success', 'Form section updated successfully');
}

public function deleteFormSection()
{
    $data = DonateForm::first();
    if ($data) {
        $data->delete();
    }
    return redirect()->back()->with('success', 'Form section deleted. Default values restored.');
}


public function whyDonateSection()
{
    $data = DonateWhyDonate::orderBy('order', 'asc')->get();
    return view('admin.donate.why_donate', compact('data'));
}

public function updateWhyDonateSection(Request $request)
{
    $request->validate([
        'order' => 'required|integer',
        'title' => 'required|string',
        'description' => 'required|string',
        'icon' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
    ]);

    // Icon upload
    $iconName = time() . '_' . $request->file('icon')->getClientOriginalName();
       $request->file('icon')->move(public_path('assets/images/donate/whyicons'), $iconName);

    DonateWhyDonate::create([
        'order' => $request->order,
        'title' => $request->title,
        'description' => $request->description,
        'icon' => $iconName,
    ]);

    return redirect()->back()->with('success', 'Card added successfully');
}

public function deleteWhyDonateSection($id)
{
    $data = DonateWhyDonate::findOrFail($id);  // findOrFail use karo
    
    // Delete icon file
    $iconPath = public_path('assets/images/donate/whyicons/' . $data->icon);
    if (file_exists($iconPath)) {
        unlink($iconPath);
    }
    
    // Delete record
    $data->delete();
    
    return redirect()->back()->with('success', 'Card deleted successfully');
}





public function whyDonateTextSection()
{
    $data = DonateWhyText::first();
    return view('admin.donate.why_text', compact('data'));
}

public function updateWhyDonateTextSection(Request $request)
{
    $request->validate([
        'section_heading' => 'required|string',
        'section_highlight' => 'required|string',
        'section_description' => 'required|string',
        'sub_heading' => 'required|string',
        'bottom_text' => 'required|string',
    ]);

    $data = DonateWhyText::first();
    if (!$data) {
        $data = new DonateWhyText();
    }

    $data->section_heading = $request->section_heading;
    $data->section_highlight = $request->section_highlight;
    $data->section_description = $request->section_description;
    $data->sub_heading = $request->sub_heading;
    $data->bottom_text = $request->bottom_text;
    $data->save();

    return redirect()->back()->with('success', 'Texts updated successfully');
}

public function deleteWhyDonateTextSection()
{
    $data = DonateWhyText::first();
    if ($data) {
        $data->delete();
    }
    return redirect()->back()->with('success', 'Texts reset to default');
}




public function waysToGiveSection()
{
    $data = DonateWaysToGive::orderBy('order', 'asc')->get();
    $section = DonateWaysToGiveText::first(); // Alag table se texts
    return view('admin.donate.ways_to_give', compact('data', 'section'));
}

public function updateWaysToGiveSection(Request $request)
{
    $request->validate([
        'order' => 'required|integer|in:1,2,3,4',
        'title' => 'required|string',
        'description' => 'required|string',
        'icon' => 'required|image|mimes:svg,png,jpg,jpeg|max:2048',
    ]);

    // Icon upload
    $iconName = time() . '_' . $request->file('icon')->getClientOriginalName();
    $request->file('icon')->move(public_path('assets/images/donate/waysicons'), $iconName);

    DonateWaysToGive::create([
        'order' => $request->order,
        'title' => $request->title,
        'description' => $request->description,
        'icon' => $iconName,
    ]);

    return redirect()->back()->with('success', 'Card added successfully');
}

// Update Section Texts - Alag table mein
public function updateWaysToGiveText(Request $request)
{
    $request->validate([
        'section_heading' => 'required|string',
        'section_highlight' => 'required|string',
        'section_subheading' => 'required|string',
    ]);

    $section = DonateWaysToGiveText::first();
    if (!$section) {
        $section = new DonateWaysToGiveText();
    }

    $section->section_heading = $request->section_heading;
    $section->section_highlight = $request->section_highlight;
    $section->section_subheading = $request->section_subheading;
    $section->save();

    return redirect()->back()->with('success', 'Section texts updated');
}

public function deleteWaysToGiveSection($id)
{
    $data = DonateWaysToGive::findOrFail($id);
    
    // Delete icon file
    $iconPath = public_path('assets/images/donate/waysicons/' . $data->icon);
    if (file_exists($iconPath)) {
        unlink($iconPath);
    }
    
    $data->delete();
    
    return redirect()->back()->with('success', 'Card deleted successfully');
}


// ========== WHERE YOUR MONEY GOES SECTION ==========

public function whereMoneyGoesSection()
{
    $texts = DonateWhereMoneyGoesText::first();
    $cards = DonateWhereMoneyGoesCard::orderBy('order', 'asc')->get();
    return view('admin.donate.where_money_goes', compact('texts', 'cards'));
}

public function updateWhereMoneyGoesText(Request $request)
{
    $request->validate([
        'section_heading' => 'required|string',
        'section_highlight' => 'required|string',
        'section_description' => 'required|string',
        'quote_text' => 'required|string',
    ]);

    $texts = DonateWhereMoneyGoesText::first();
    if (!$texts) {
        $texts = new DonateWhereMoneyGoesText();
    }

    $texts->section_heading = $request->section_heading;
    $texts->section_highlight = $request->section_highlight;
    $texts->section_description = $request->section_description;
    $texts->quote_text = $request->quote_text;
    $texts->save();

    return redirect()->back()->with('success', 'Texts updated successfully');
}

public function addWhereMoneyGoesCard(Request $request)
{
    $request->validate([
        'order' => 'required|integer|in:1,2,3,4',
        'title' => 'required|string',
        'description' => 'required|string',
        'icon' => 'required|image|mimes:svg,png,jpg,jpeg|max:2048',
    ]);

    $iconName = time() . '_' . $request->file('icon')->getClientOriginalName();
    $request->file('icon')->move(public_path('assets/images/donate/moneyicons'), $iconName);

    DonateWhereMoneyGoesCard::create([
        'order' => $request->order,
        'title' => $request->title,
        'description' => $request->description,
        'icon' => $iconName,
    ]);

    return redirect()->back()->with('success', 'Card added successfully');
}

public function deleteWhereMoneyGoesCard($id)
{
    $card = DonateWhereMoneyGoesCard::findOrFail($id);
    
    $iconPath = public_path('assets/images/donate/moneyicons/' . $card->icon);
    if (file_exists($iconPath)) {
        unlink($iconPath);
    }
    
    $card->delete();
    
    return redirect()->back()->with('success', 'Card deleted successfully');
}


// ========== DONOR RECOGNITION SECTION ==========

public function donorRecognitionSection()
{
    $texts = DonateDonorRecognitionText::first();
    $cards = DonateDonorRecognitionCard::orderBy('order', 'asc')->get();
    return view('admin.donate.donor_recognition', compact('texts', 'cards'));
}

public function updateDonorRecognitionText(Request $request)
{
    $request->validate([
        'section_heading' => 'required|string',
        'section_highlight' => 'required|string',
        'section_description' => 'required|string',
        'bottom_text' => 'required|string',
    ]);

    $texts = DonateDonorRecognitionText::first();
    if (!$texts) {
        $texts = new DonateDonorRecognitionText();
    }

    $texts->section_heading = $request->section_heading;
    $texts->section_highlight = $request->section_highlight;
    $texts->section_description = $request->section_description;
    $texts->bottom_text = $request->bottom_text;
    $texts->save();

    return redirect()->back()->with('success', 'Texts updated successfully');
}

public function addDonorRecognitionCard(Request $request)
{
    $request->validate([
        'order' => 'required|integer|in:1,2,3',
        'title' => 'required|string',
        'description' => 'required|string',
        'icon' => 'required|image|mimes:svg,png,jpg,jpeg|max:2048',
    ]);

    $iconName = time() . '_' . $request->file('icon')->getClientOriginalName();
    $request->file('icon')->move(public_path('assets/images/donate/recognitionicons'), $iconName);

    DonateDonorRecognitionCard::create([
        'order' => $request->order,
        'title' => $request->title,
        'description' => $request->description,
        'icon' => $iconName,
    ]);

    return redirect()->back()->with('success', 'Card added successfully');
}

public function deleteDonorRecognitionCard($id)
{
    $card = DonateDonorRecognitionCard::findOrFail($id);
    
    $iconPath = public_path('assets/images/donate/recognitionicons/' . $card->icon);
    if (file_exists($iconPath)) {
        unlink($iconPath);
    }
    
    $card->delete();
    
    return redirect()->back()->with('success', 'Card deleted successfully');
}


 // ========== DONATION SUBMISSIONS ==========

    public function donationSubmissions()
    {
        $submissions = DonationSubmission::orderBy('created_at', 'desc')->get();
        return view('admin.donate.submissions', compact('submissions'));
    }

    public function deleteDonationSubmission($id)
    {
        $submission = DonationSubmission::findOrFail($id);
        $submission->delete();
        
        return redirect()->back()->with('success', 'Submission deleted successfully');
    }

    // ========== FORM EXTRA TEXTS (Second Form ke liye) ==========

    public function extraTextSection()
    {
        $data = DonateFormExtraText::first();
        return view('admin.donate.extra_texts', compact('data'));
    }

    public function updateExtraText(Request $request)
    {
        $request->validate([
            'secure_text' => 'required|string',
            'contact_heading' => 'required|string',
            'email_text' => 'required|string',
            'phone_text' => 'required|string',
        ]);

        $data = DonateFormExtraText::first();
        if (!$data) {
            $data = new DonateFormExtraText();
        }

        $data->secure_text = $request->secure_text;
        $data->contact_heading = $request->contact_heading;
        $data->email_text = $request->email_text;
        $data->phone_text = $request->phone_text;
        $data->save();

        return redirect()->back()->with('success', 'Extra texts updated successfully');
    }












}