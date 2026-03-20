<?php

namespace App\Http\Controllers;

use App\Mail\DonationMail;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DonateController extends Controller
{
 public function index()
    {
        $heroData = DonateHero::first();
        $formData = DonateForm::first();
        $whyDonateData = DonateWhyDonate::orderBy('order', 'asc')->get();
        $whyText = DonateWhyText::first();

        // ========== YEH SAB ADD KARO ==========
        $waysToGiveText = null;//DonateWaysToGiveText::first();
        $waysCards = DonateWaysToGive::orderBy('order', 'asc')->get();
        $whereTexts = DonateWhereMoneyGoesText::first();
        $whereCards = DonateWhereMoneyGoesCard::orderBy('order', 'asc')->get();
        $recognitionTexts = DonateDonorRecognitionText::first();
        $recognitionCards = DonateDonorRecognitionCard::orderBy('order', 'asc')->get();
        $extraTexts = DonateFormExtraText::first(); // <-- YEH IMPORTANT HAI!
        // ======================================

        return view('donate', compact(
            'heroData',
            'formData',
            'whyDonateData',
            'whyText',
            'waysToGiveText',      // Add
            'waysCards',           // Add
            'whereTexts',          // Add
            'whereCards',          // Add
            'recognitionTexts',    // Add
            'recognitionCards',    // Add
            'extraTexts'           // <-- YEH ZAROORI HAI!
        ));
    }


 // ========== STORE DONATION (Both Forms) ==========

    public function storeDonation(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
            'message' => 'nullable|string',
        ]);

        $data=DonationSubmission::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'amount' => $request->amount,
            'message' => $request->message,
        ]);
        Mail::to('Consultingseniorsolutions@gmail.com')->send(new DonationMail($data));
        return redirect()->back()->with('success', 'Thank you for your donation! We will contact you soon.');
    }
}

