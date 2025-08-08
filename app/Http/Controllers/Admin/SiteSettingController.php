<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = [
            'general' => SiteSetting::getByGroup('general'),
            'footer' => SiteSetting::getByGroup('footer'),
            'contact' => SiteSetting::getByGroup('contact'),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
        ]);

        foreach ($request->settings as $group => $groupSettings) {
            foreach ($groupSettings as $key => $value) {
                if ($request->hasFile("settings.{$group}.{$key}")) {
                    // Handle file upload
                    $file = $request->file("settings.{$group}.{$key}");
                    $path = $file->store('settings', 'public');
                    SiteSetting::set($key, $path, 'image', $group);
                } else {
                    // Handle text/textarea values
                    $type = in_array($key, ['company_description', 'footer_description']) ? 'textarea' : 'text';
                    SiteSetting::set($key, $value, $type, $group);
                }
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
