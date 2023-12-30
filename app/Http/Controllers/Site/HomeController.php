<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ContactUsRequest;
use App\Models\Category;
use App\Models\Page;
use App\Models\Setting;
use App\Models\SliderBanner;
use App\Models\SlugAlias;
use App\Models\SocialMediaLink;
use App\Models\SuccessPartner;
use App\Models\UserMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends SiteBaseController
{
    /**
     * @param Request $request
     * @return View
     */
    function homePage(Request $request)
    {
        $sliders = SliderBanner::where("language", app()->getLocale())
            ->where("is_active", 1)->orderBy("order", "ASC")->get();
        $groupedCategories = $this->getGroupedCategories();
        $successPartners = SuccessPartner::where("is_active", 1)->get();
        $settingsDB = Setting::select("key", "value")->get();
        $settings = $this->getSettings();
        return view("site.modules.homepage", get_defined_vars());
    }

    public function getGroupedCategories()
    {
        $categoriesCount = Category::count();
        if ($categoriesCount > 12) {
            $categories = Category::where("is_active", 1)->orderBy("order", "ASC")->take(11)->get()->toArray();
            $categories[] = [
                "title" => "...المزيد",
                "is_more" => 1,
                "image" => "",
            ];
        } else {
            $categories = Category::where("is_active", 1)->orderBy("order", "ASC")->get()->toArray();
        }
        return array_chunk($categories, 3);
    }

    public function getSettings()
    {
        $settingsDB = Setting::select("key", "value")->get();
        $settings = new \stdClass();
        foreach ($settingsDB as $setting) {
            $settings->{$setting['key']} = $setting['value'];
        }
        return $settings;
    }

    /**
     * @return View
     */
    function categories(): View
    {
        $slug_data = SlugAlias::where("slug", "categories")->first();
        if (!empty($slug_data)) {
            $page = Page::where("is_active", 1)->find($slug_data->module_id);
        }
        $categories = Category::where("is_active", 1)->with("slugData")->get();
        return view("site.modules.categories", get_defined_vars());
    }

    /**
     * @param Request $request
     * @return View
     */
    function aboutUs(Request $request): View
    {
        $slug_data = SlugAlias::where("slug", "about-us")->firstOrFail();
        $page = Page::where("is_active", 1)->find($slug_data->module_id);
        return view("site.modules.static_page", get_defined_vars());
    }

    /**
     * @param Request $request
     * @return View
     */
    function contactUs(Request $request): View
    {
        $content = Page::where("url", "contact-us")
            ->where("is_active", 1)->first();
        $request->session()->regenerateToken();
        return view("site.modules.contact_us", get_defined_vars());
    }

    /**
     * @param ContactUsRequest $request
     * @return RedirectResponse
     */
    function postContactUs(ContactUsRequest $request): RedirectResponse
    {
        UserMessage::create($request->validated());
        return redirect()->route("site.contact")->with("success", "لقد تم ارسال رسالتكم بنجاح وسيقوم احد افراد خدمة العملاء بالاتصال بكم قريبا");
    }
}
