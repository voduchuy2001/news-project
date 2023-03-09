<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function admin($id)
    {
        $user = User::findOrFail($id);

        $user->admin = 1;
        $user->save();

        Session::flash('success', 'Đặt người dùng ' . $user->name . ' làm quản trị viên thành công.');
        return redirect()->back();
    }

    public function notAdmin($id)
    {
        $user = User::findOrFail($id);

        $user->admin = 0;
        $user->save();

        Session::flash('success', 'Thu hồi quyền quản trị viên của ' . $user->name . ' thành công.');
        return redirect()->back();
    }

    public function changeProfile()
    {
        $user = Auth::user();

        return view('admin.users.change-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required', 'string', 'max:255',
            ],
            [
                'name.required' => 'Vui lòng nhập tên!',
            ]
        );

        $user = Auth::user();

        $user->name = $request->name;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->phone_number = $request->phone_number;
        $user->about_user  = $request->about_user;

        $user->save();

        Session::flash('success', 'Cập nhật thông tin người dùng ' . $user->name . ' thành công.');
        return redirect()->back();
    }

    public function changePassword()
    {
        $user = Auth::user();

        return view('admin.users.change-password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate(
            $request,
            [
                'old_password' => 'required',
                'password' => ['string', 'min:8', 'confirmed'],
            ],
            [
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'password.min' => 'Mật khẩu phải có ít nhất 8 kí tự.',
                'password.confirmed' => 'Mật khẩu và xác nhận mật khẩu không chính xác.',
                'password.string' => 'Mật khẩu chỉ cho phép chứa các kí tự.',
            ]
        );
        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Mật khẩu cũ không chính xác!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        Session::flash('success', 'Cập nhật mật khẩu thành công.');
        return redirect()->back();
    }
}
