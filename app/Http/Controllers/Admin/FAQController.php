<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\FAQBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FAQController extends Controller
{
    public function FAQbannerSection()
    {
        $data = FAQBanner::first();
        return view('admin.FAQ.bannersection', compact('data'));
    }

    public function FAQUpdatebannerSection(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'banner_text' => 'required|string',
            ]);
            $banner = FAQBanner::first();

            if (!$banner) {
                $banner = new FAQBanner();
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
    public function FAQQASection()
    {
        $data = FAQ::all();
        return view('admin.FAQ.FAQsection', compact('data'));
    }

     public function FAQUpdateQASection(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'question' => 'required|string',
                'answer' => 'required|string',
            ]);
            FAQ::create([
                'question' => $request->input('question'),
                'answer' => $request->input('answer'),
            ]);
            DB::commit();
            return back()->with('success', 'Added Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function FAQDeleteQASection($id)
    {
        try {
            FAQ::findOrFail($id)->delete();
            return back()->with('success', 'Deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
