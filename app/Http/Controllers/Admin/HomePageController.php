<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageBanner;
use App\Models\HomePageChooseUs;
use App\Models\HomePageChooseUsPicture;
use App\Models\HomePageForm;
use App\Models\HomePageMenu;
use App\Models\HomePageMenuPicture;
use App\Models\HomePagePlacment;
use App\Models\HomePagePlacmentText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function HomePagebannerSection()
    {
        $data = HomePageBanner::first();
        return view('admin.homaPage.bannersection', compact('data'));
    }
    public function HomePageUpdateBanner(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'banner_heading' => 'required|string|max:255',
                'banner_text' => 'required|string',
                'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $banner = HomePageBanner::first();

            if (!$banner) {
                $banner = new HomePageBanner();
            }
            $banner->banner_heading = $request->input('banner_heading');
            $banner->banner_text = $request->input('banner_text');
            $banner->save();
            DB::commit();
            return back()->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function HomePagemenuSection()
    {
        $data = HomePageMenu::all();
        return view('admin.homaPage.menusection', compact('data'));
    }

    public function HomePageUpdateMenuSection(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'menu_order'       => 'required|integer',
                'menu_title'       => 'required|string|max:255',
                'menu_description' => 'required|string',
                'menu_icon'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $menuIconPath = null;
            if ($request->hasFile('menu_icon')) {
                $imageName = time() . '.' . $request->menu_icon->extension();
                $request->menu_icon->move(public_path('menu/icons'), $imageName);
                $menuIconPath = 'menu/icons/' . $imageName;
            }
            HomePageMenu::where('menu_order', $request->menu_order)->delete();
            HomePageMenu::create([
                'menu_order'       => $request->menu_order,
                'menu_title'       => $request->menu_title,
                'menu_description' => $request->menu_description,
                'menu_icon'        => $imageName,
            ]);

            DB::commit();
            return back()->with('success', 'Added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function HomePageDeleteMenuSection($id)
    {
        try {
            $menuItem = HomePageMenu::findOrFail($id);
            $menuItem->delete();
            return back()->with('success', 'Deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function HomePageUpdateMenuSectionImage(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $menu = HomePageMenuPicture::first();

            if (!$menu) {
                $menu = new HomePageMenuPicture();
            }

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('menu/picture'), $imageName);
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

    public function HomePageformSection()
    {
        $data = HomePageForm::first();
        return view('admin.homaPage.formsection', compact('data'));
    }

    public function HomePageUpdateFormSection(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'bullet_point_1' => 'nullable|string',
                'bullet_point_2' => 'nullable|string',
                'bullet_point_3' => 'nullable|string',
                'bullet_point_4' => 'nullable|string',
            ]);
            $form = HomePageForm::first();

            if (!$form) {
                $form = new HomePageForm();
            }

            $form->form_heading = $request->input('title');
            $form->form_description = $request->input('description');
            $form->form_bulletPoint1 = $request->input('bullet_point_1');
            $form->form_bulletPoint2 = $request->input('bullet_point_2');
            $form->form_bulletPoint3 = $request->input('bullet_point_3');
            $form->form_bulletPoint4 = $request->input('bullet_point_4');
            $form->save();
            DB::commit();
            return back()->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function HomePageChooseUsSection()
    {
        $data = HomePageChooseUs::all();
        return view('admin.homaPage.whychooseussection', compact('data'));
    }

    public function HomePageUpdateChooseUsSection(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'order'       => 'required|integer',
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'icon'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $menuIconPath = null;
            if ($request->hasFile('icon')) {
                $imageName = time() . '.' . $request->icon->extension();
                $request->icon->move(public_path('chooseUs/icons'), $imageName);
                $menuIconPath = 'chooseUs/icons/' . $imageName;
            }
            HomePageChooseUs::where('order', $request->order)->delete();
            HomePageChooseUs::create([
                'order'       => $request->order,
                'title'       => $request->title,
                'description' => $request->description,
                'icon'        => $imageName,
            ]);

            DB::commit();
            return back()->with('success', 'Added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function HomePageUpdateChooseUsSectionImage(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $menu = HomePageChooseUsPicture::first();

            if (!$menu) {
                $menu = new HomePageChooseUsPicture();
            }

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('chooseUs/picture'), $imageName);
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
    public function HomePageDeleteChooseUsSection($id)
    {
        try {
            $item = HomePageChooseUs::findOrFail($id);
            $item->delete();
            return back()->with('success', 'Deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function HomePagePlacmentSection()
    {
        $data = HomePagePlacment::all();
        $text = HomePagePlacmentText::first();
        return view('admin.homaPage.facilities', compact('data', 'text'));
    }

    public function HomePageUpdatePlacmentSection(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('facilitis/picture'), $imageName);
                $image = $imageName;
            }
            HomePagePlacment::create([
                'title'       => $request->title,
                'description' => $request->description,
                'image'        => $image,
            ]);
            DB::commit();
            return back()->with('success', 'Added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function HomePageDeletePlacmentSection($id)
    {
        try {
            $item = HomePagePlacment::findOrFail($id);
            $item->delete();
            return back()->with('success', 'Deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function HomePageUpdatePlacmentSectionText(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'text' => 'required|string',
            ]);
            $placmentText = HomePagePlacmentText::first();

            if (!$placmentText) {
                $placmentText = new HomePagePlacmentText();
            }

            $placmentText->text = $request->input('text');
            $placmentText->save();
            DB::commit();
            return back()->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
