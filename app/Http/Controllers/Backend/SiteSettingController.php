<?php

namespace App\Http\Controllers\Backend;

use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function SiteSetting()
    {
        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update', compact('setting'));
    }

    public function SiteSettingUpdate(Request $request)
    {
        $setting_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('logo')) {
            unlink($old_img);
            $image = $request->file('logo');

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(139, 36)->save('upload/logo/' . $name_gen);
            $save_url = 'upload/logo/' . $name_gen;

            SiteSetting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'logo' => $save_url,

            ]);

            $notification = array(
                'message' => 'SiteSetting updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {

            SiteSetting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,


            ]);

            $notification = array(
                'message' => 'SiteSetting updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function SeoSetting()
    {
        $seo = Seo::find(1);
        return view('backend.setting.seo_update', compact('seo'));
    }

    public function SeoSettingUpdate(Request $request)
    {
        $seo_id = $request->id;
        Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'seo updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
