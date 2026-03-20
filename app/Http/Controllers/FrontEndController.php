<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function aboutUs()
    {
        $banner = \App\Models\AboutPageBanner::first();
        $offers = \App\Models\AboutPageOffer::orderBy('order', 'asc')->get();
        $welcome = \App\Models\AboutPageWelcome::first();
        $welcomeImage = \App\Models\AboutPageWelcomeImage::first();
        $counter = \App\Models\AboutPageCouter::orderBy('order', 'asc')->get();
        return view('about', compact('banner', 'offers', 'welcome', 'welcomeImage', 'counter'));
    }
    public function faq()
    {   $banner = \App\Models\FAQBanner::first();
        $faqs = \App\Models\FAQ::latest()->get();
        return view('FAQ', compact('banner', 'faqs'));
    }
}
