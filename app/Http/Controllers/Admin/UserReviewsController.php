<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserReviewsController extends Controller
{
    public function reviewsIndex()
    {
        $data = Review::get();
        return view('admin.reviews', compact('data'));
    }

    public function reviewsStore(Request $request)
    {

        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'review' => 'required|string',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('reviews'), $imageName);
            }
            Review::create([
                'name' => $request->name,
                'designation' => $request->designation ?? null,
                'picture' => $imageName ?? null,
                'review' => $request->review,
            ]);
            DB::commit();
            return back()->with('success', 'Data Inserted Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
             return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function reviewsDestroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return back()->with('success', 'Data deleted successfully!');
    }
}
