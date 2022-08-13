<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function userUpdate(Request $request)
    {
        $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Settings successfully updated!');
    }
    public function update(Request $request, GeneralSettings $setting)
    {
        $request->validate(
            [
                'favicon' => 'image|nullable',
                'avatar' => 'image|nullable',
                'site_name' => 'max:300',
                'portfolio_name' => 'max:300',
                'portfolio_email' => 'nullable|max:300',
                'portfolio_work' => 'min:1|max:300',
                'portfolio_about' => 'max:2000',
                'github_url' => 'max:500',
            ]
        );

        if ($request->hasFile('favicon')){
            Storage::delete(getSetting('favicon'));
            $favicon = $request->file('favicon')->store('images', 'public');
            $setting->favicon = $request->$favicon;
        }

        if ($request->hasFile('avatar')){
            Storage::delete(getSetting('avatar'));
            $avatar = $request->file('avatar')->store('images', 'public');
            $setting->favicon = $request->$avatar;
        }
        $setting->site_name = $request->site_name;
        $setting->portfolio_name = $request->portfolio_name;
        $setting->portfolio_email = $request->portfolio_email;
        $setting->portfolio_work = $request->portfolio_work;
        $setting->portfolio_about = $request->portfolio_about;
        $setting->github_url = $request->github_url;
        $setting->save();

        return back()->with('success', 'Settings successfully updated!');

    }
}
