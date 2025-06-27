<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $nameSetting = Setting::firstOrCreate(['key' => 'portfolio_name'], ['value' => 'Your Name']);
        $githubSetting = Setting::firstOrCreate(['key' => 'github_url'], ['value' => '']);
        $xSetting = Setting::firstOrCreate(['key' => 'x_url'], ['value' => '']);
        $emailSetting = Setting::firstOrCreate(['key' => 'contact_email'], ['value' => '']);

        return view('admin.settings.edit', compact('nameSetting', 'githubSetting', 'xSetting', 'emailSetting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required|string|max:255',
            'github_url' => 'nullable|url',
            'x_url' => 'nullable|url',
            'contact_email' => 'nullable|email',
        ]);

        $nameSetting = Setting::firstOrCreate(['key' => 'portfolio_name']);
        $nameSetting->value = $request->input('portfolio_name');
        $nameSetting->save();

        $githubSetting = Setting::firstOrCreate(['key' => 'github_url']);
        $githubSetting->value = $request->input('github_url');
        $githubSetting->save();

        $xSetting = Setting::firstOrCreate(['key' => 'x_url']);
        $xSetting->value = $request->input('x_url');
        $xSetting->save();

        $emailSetting = Setting::firstOrCreate(['key' => 'contact_email']);
        $emailSetting->value = $request->input('contact_email');
        $emailSetting->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }
}
