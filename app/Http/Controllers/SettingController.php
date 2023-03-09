<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $settings =  Setting::first();

        return view('admin.settings.setting', compact('settings'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'facebook_contact' => 'required',
            'instagram_contact' => 'required',
            'youtube_channel' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required',
            'about' => 'required',
        ], [
            'facebook_contact.required' => 'Vui lòng chọn đường dẫn facebook.',
            'youtube_channel.required' => 'Vui lòng chọn đường dẫn youtube.',
            'instagram_contact.required' => 'Vui lòng chọn đường dẫn instagram.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'about.required' => 'Vui lòng nhập mô tả cho trang web.',
            'email.required' => 'Vui lòng nhập email.',
            'phone.numeric' => 'Vui lòng nhập đúng định dạng.',
        ]);

        $settings = Setting::first();

        $oldLogo = $settings->logo;
        if ($request->logo != '') {
            $logo = $request->logo;
            $logo_new_name = time() . $logo->getClientOriginalName();
            $logo->move('uploads/settings/', $logo_new_name);

            $settings->logo = 'uploads/settings/' . $logo_new_name;
        } else {
            $settings->logo = $oldLogo;
        }
        $settings->facebook_contact = $request->facebook_contact;
        $settings->youtube_channel = $request->youtube_channel;
        $settings->instagram_contact = $request->instagram_contact;
        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->about = $request->about;

        $settings->save();

        Session::flash('success', 'Cập nhật thông tin thành công!');
        return redirect()->back();
    }
}
