<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SliderBanners\CreateRequest;
use App\Http\Requests\Admin\SliderBanners\UpdateRequest;
use App\Models\SliderBanner;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SliderBannersController extends AdminBaseController
{
    /**
     * @param Request $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function listData(Request $request)
    {
        $sliders = SliderBanner::orderBy("order", "ASC")->cursorPaginate(20,
            ["title", "image", "is_active", "id", "url"], "sliderBanners");
        return view("admin.modules.sliderBanners.list_data", get_defined_vars());
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function create()
    {
        return view("admin.modules.sliderBanners.create", get_defined_vars());
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    function store(CreateRequest $request): RedirectResponse
    {
        $slider = $request->validated();
        $image_name = store_image($request->image, "sliders", $request->image_name);
        $slider["image"] = $image_name;
        $sliderBanner = SliderBanner::create($slider);
        if (!empty($sliderBanner->id)) {
            return redirect()->route("admin.sliders.list")->with("success", "Slider Banner Created successfully");
        }
        return redirect()->route("admin.sliders.create")->with("error", "No data saved please try again")->withInput();
    }

    /**
     * @param string $type
     * @param int $id
     * @return RedirectResponse
     */
    function updateStatus(string $type, int $id): RedirectResponse
    {
        $sliderBanner = SliderBanner::find($id);
        if (empty($sliderBanner)) {
            return redirect()->back()->with("error", "Slider Banner not exist in system");
        }
        switch (strtolower($type)) {
            case "activate":
                if ($sliderBanner->is_active == 1) {
                    return redirect()->back()->with("error", "Slider Banner Already active");
                }
                $sliderBanner->is_active = 1;
                break;
            case "deactivate":
                if ($sliderBanner->is_active == 0) {
                    return redirect()->back()->with("error", "Slider Banner Already no active");
                }
                $sliderBanner->is_active = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $sliderBanner->save();
        return redirect()->back()->with("success", "Slider Banner Status updated successfully");
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function edit(int $id)
    {
        $slider = SliderBanner::find($id);
        if (empty($slider)) {
            return redirect()->route("admin.sliders.list")->with("error", "Slider Banner not exist in system");
        }

        return view("admin.modules.sliderBanners.edit", get_defined_vars());
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    function update(UpdateRequest $request, $id): RedirectResponse
    {
        $sliderBanner = SliderBanner::find($id);
        if(empty($sliderBanner)){
            return redirect()->route("admin.sliders.list")->with("error", "Slider Banner not exist in system");
        }
        $slider = $request->validated();
        if(!empty($request->image)){
            $image_name = store_image($request->image, "sliders", $request->image_name);
            $slider["image"] = $image_name;
        }
        $sliderBanner->update($slider);
        return redirect()->route("admin.sliders.list")->with("success", "Slider Banner Created successfully");
    }
}
