<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlacementRequestBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlacementRequestBannerController extends Controller
{
    public function index()
    {
        $data = PlacementRequestBanner::first();
        return view('admin.placement_request.bannersection', compact('data'));
    }

    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'banner_text' => 'required|string',
            ]);

            $banner = PlacementRequestBanner::first();

            if (!$banner) {
                $banner = new PlacementRequestBanner();
            }

            $banner->description = $request->banner_text;
            $banner->save();

            DB::commit();
            return back()->with('success', 'Placement Request Banner Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }
}
