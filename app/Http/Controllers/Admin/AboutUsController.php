<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPageBanner;
use App\Models\AboutPageCouter;
use App\Models\AboutPageOffer;
use App\Models\AboutPageWelcome;
use App\Models\AboutPageWelcomeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function AboutbannerSection()
    {
        $data = AboutPageBanner::first();
        return view('admin.aboutPage.bannersection', compact('data'));
    }
    public function AboutUpdatebannerSection(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'banner_text' => 'required|string',
            ]);
            $banner = AboutPageBanner::first();

            if (!$banner) {
                $banner = new AboutPageBanner();
            }
            $banner->description = $request->input('banner_text');
            $banner->save();
            DB::commit();
            return back()->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function AboutOfferSection()
    {
        $data = AboutPageOffer::all();
        return view('admin.aboutPage.offerssection', compact('data'));
    }
    public function AboutUpdateOfferSection(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'offer_order'       => 'required|integer',
                'offer_title'       => 'required|string|max:255',
                'offer_description' => 'required|string',
                'offer_icon'        => 'required|image|mimes:webp|max:2048',
            ]);
            $menuIconPath = null;
            if ($request->hasFile('offer_icon')) {
                $imageName = time() . '.' . $request->offer_icon->extension();
                $request->offer_icon->move(public_path('offer/icons'), $imageName);
                $menuIconPath = 'offer/icons/' . $imageName;
            }
            AboutPageOffer::where('order', $request->offer_order)->delete();
            AboutPageOffer::create([
                'order'       => $request->offer_order,
                'title'       => $request->offer_title,
                'description' => $request->offer_description,
                'icon'        => $imageName,
            ]);

            DB::commit();
            return back()->with('success', 'Added successfully.');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function AboutDeleteOfferSection($id)
    {
        try {
            AboutPageOffer::findOrFail($id)->delete();
            return back()->with('success', 'Deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function AboutWelcomeSection()
    {
        $data = AboutPageWelcome::first();
        return view('admin.aboutPage.welcomesection', compact('data'));
    }

    public function AboutUpdateWelcomeSection(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'text' => 'required|string',
            ]);
            $banner = AboutPageWelcome::first();

            if (!$banner) {
                $banner = new AboutPageWelcome();
            }
            $banner->description = $request->input('text');
            $banner->save();
            DB::commit();
            return back()->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function AboutUpdateWelcomeSectionImage(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'image' => 'required|image|mimes:webp|max:2048',
            ]);
            $menu = AboutPageWelcomeImage::first();

            if (!$menu) {
                $menu = new AboutPageWelcomeImage();
            }

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('welcom/picture'), $imageName);
                $menu->picture = $imageName;
            }
            $menu->save();
            DB::commit();
            return back()->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function AboutcounterSection()
    {
        $data = AboutPageCouter::all();
        return view('admin.aboutPage.counter', compact('data'));
    }

    public function AboutUpdatecounterSection(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'order'       => 'required|integer',
                'title'       => 'required|string|max:255',
                'counter_value' => 'required|string',
            ]);
            AboutPageCouter::where('order', $request->order)->delete();
            AboutPageCouter::create([
                'order'       => $request->order,
                'title'       => $request->title,
                'counter_value' => $request->counter_value,
            ]);

            DB::commit();
            return back()->with('success', 'Added successfully.');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function AboutDeletecounterSection($id)
    {
        try {
            AboutPageCouter::findOrFail($id)->delete();
            return back()->with('success', 'Deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
