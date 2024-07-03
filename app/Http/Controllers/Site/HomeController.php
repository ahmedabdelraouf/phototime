<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ContactUsRequest;
use App\Models\Album;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Setting;
use App\Models\SliderBanner;
use App\Models\SlugAlias;
use App\Models\SuccessPartner;
use App\Models\UserMessage;
use App\Models\YoutubeChannel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends SiteBaseController
{
    private function getRouteName($fullRouteName)
    {
        // Extract the route name from the full route name
        // For example, admin.dashboard becomes dashboard
        return last(explode('.', $fullRouteName));
    }

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
        $featuredAlbums = Album::take(6)->inRandomOrder()->where("is_featured", 1)->get();
        $youtubeLinks = YoutubeChannel::take(4)->get();
        return view("site.modules.homepage", get_defined_vars());
    }

    public function getGroupedCategories()
    {
        $categoriesCount = Category::count();
        if ($categoriesCount > 2) {
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

    /**
     * @param ContactUsRequest $request
     * @return RedirectResponse
     */
    function albumDetails($id)
    {
        $album = Album::where("is_blocked",false)->findOrFail($id);
        $album->views_count += 1;
        $album->save();
        $images = $album->images;
        foreach ($images as $image) {
            $image->image = asset($image->image);
//            $image->image = env("AWS_PATH") . $image->image;
        }
        return view("site.modules.album_details", get_defined_vars());
    }

    /**
     * @param ContactUsRequest $request
     * @return RedirectResponse
     */
    function youtubeChannelDetails($id)
    {
        $YoutubeChannelUrl = YoutubeChannel::find($id);
        return view("site.modules.youtube_channel_details", get_defined_vars());
    }

    function albums(Request $request): View
    {
        $slug_data = SlugAlias::where("slug", "albums")->first();
        if (!empty($slug_data)) {
            $page = Page::where("is_active", 1)->find($slug_data->module_id);
        }
        $albums = $this->getAlbums($request->all());
        $categories = Category::where("is_active", 1)->orderBy("order", "ASC")->get()->toArray();
        return view("site.modules.albums", get_defined_vars());
    }

    public function getAlbums($filters)
    {
        $albums = Album::where("is_active", 1)->with("slugData")
            ->where("is_blocked", 0)
            ->orderBy('photo_date', 'DESC');
        if (isset($filters['album_title']) && $filters['album_title'] != null) {
            $title = $filters['album_title'];
            $albums->where("title", "like", "%{$title}%");
        }
        if (isset($filters['photo_date']) && $filters['photo_date'] != null) {
            $albums->where("photo_date", $filters['photo_date']);
        }
//        if (isset($filters['category_id']) && $filters['category_id'] != null) {
//            $albums->where("category_id", $filters['category_id']);
//        }
        return $albums->paginate(27);
    }

    function youtubeChannel(): View
    {
        $slug_data = SlugAlias::where("slug", "categories")->first();
        if (!empty($slug_data)) {
            $page = Page::where("is_active", 1)->find($slug_data->module_id);
        }
        $youtubeChannelLinks = YoutubeChannel::all();
        return view("site.modules.youtubeChannel", get_defined_vars());
    }

    function blogs(): View
    {
        $slug_data = SlugAlias::where("slug", "categories")->first();
        $blogs = Blog::where("is_active", 1)->with("slugData")->paginate(30);
        return view("site.modules.blogs", get_defined_vars());
    }

    function blogDetails($id): View
    {
        $slug_data = SlugAlias::where("slug", "categories")->first();
        $blog = Blog::where("id", $id)->with("slugData")->first();
        return view("site.modules.blog_details", get_defined_vars());
    }


}
