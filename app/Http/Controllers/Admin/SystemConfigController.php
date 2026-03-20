<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemConfigController extends Controller
{
    public function systemconfigIndex()
    {
        $data = SystemConfig::first();
        return view('admin.systemconfig', compact('data'));
    }
    public function systemconfigUpdate(Request $request)
    {

        DB::beginTransaction();
        try {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //     'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            SystemConfig::updateOrCreate(
                ['id' => 1],
                [
                    'email' => $request->email,
                    'phone' => $request->phone1,
                    'phoneSecond' => $request->phone2,
                    'address' => $request->address,
                ]
            );

            DB::commit();
            return back()->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
             return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
