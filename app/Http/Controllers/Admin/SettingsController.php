<?php

/**
 * Class SettingsController
 *
 * The SettingsController class is responsible for handling the logic related to website settings in the admin section.
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class SettingsController
 *
 * This class is responsible for handling the settings related actions in the application.
 */
class SettingsController extends Controller
{
    /**
     * [index description]
     *
     * [A method that retrieves all settings and renders a view with the settings data]
     *
     * @return View [A view containing the settings data]
     */
    public function index()
    {
        $settings = Setting::orderBy('type')->get();
        return view('admin.modules.settings.list_data', compact('settings'));
    }

    /**
     * Update the website settings.
     *
     * @param Request $request The request object containing the settings to update.
     * @return RedirectResponse
     *         Redirects to the settings index page with a success message if the update is successful.
     */
    public function update(Request $request)
    {
        foreach ($request->settings as $key => $value) {
            $setting = Setting::where('key', $key)->firstOrFail();
            switch ($setting->type) {
                case 'text':
                case 'number':
                case 'textarea':
                    $setting->update(['value' => $value]);
                    break;
                case 'image':
                    $image_name = store_image($value, "settings", $key);
                    $setting->update(['value' => $image_name]);
                    break;
            }
        }
        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully');
    }
}
