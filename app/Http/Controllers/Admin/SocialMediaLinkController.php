<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SocialMediaLinks\CreateRequest;
use App\Http\Requests\Admin\SocialMediaLinks\UpdateRequest;
use App\Models\SocialMediaLink;
use Illuminate\Http\RedirectResponse;

class SocialMediaLinkController extends AdminBaseController
{
    public $socialMediaTypes = array(
        'Snapchat',
        'Facebook',
        'Twitter',
        'Instagram',
        'Youtube',
        'Pinterest',
        'TikTok'
    );

    /**
     * Display a listing of the resource.
     */
    public function listData()
    {
        $socialMediaLinks = SocialMediaLink::paginate(20);
        return view('admin.modules.socialMediaLinks.list_data', ['socialMediaLinks' => $socialMediaLinks, 'socialMediaTypes' => $this->socialMediaTypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.socialMediaLinks.create', ['socialMediaTypes' => $this->socialMediaTypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(CreateRequest $request): RedirectResponse
    {
        $socialMediaLinkData = $request->validated();
        $image_name = store_image($request->image, "socialMediaLinks", $request->image_name);
        $socialMediaLinkData["image"] = $image_name;
        $socialMediaLink = SocialMediaLink::updateOrCreate(["title" => $socialMediaLinkData['title']], $socialMediaLinkData);
        if (!empty($socialMediaLink->id)) {
            return redirect()->route("admin.socialMedia.list")->with("success", "Social media Link Added successfully");
        }
        return redirect()->back()->withInput()->with("error", "No data saved please try again")->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.modules.socialMediaLinks.edit');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $socialMediaLink = SocialMediaLink::find($id);
        $socialMediaTypes = $this->socialMediaTypes;
        if (empty($socialMediaLink)) {
            return redirect()->route("admin.socialMedia.list")->with("error", "socialMedia Link not exist in system");
        }
        return view("admin.modules.socialMediaLinks.edit", get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $socialMediaLink = SocialMediaLink::find($id);
        if (empty($socialMediaLink)) {
            return redirect()->route("admin.socialMedia.list")->with("error", "social Media Link not exist in system");
        }
        $socialMediaLinkUpdates = $request->validated();
        if (!empty($request->image)) {
            $socialMediaLinkUpdates["image"] = store_image($request->image, "socialMediaLinks", $request->image_name);
        }
        $socialMediaLink->update($socialMediaLinkUpdates);
        return redirect()->route("admin.socialMedia.list")->with("success", "social Media Link Created successfully");
    }


    /**
     * @param string $type
     * @param int $id
     * @return RedirectResponse
     */
    function updateStatus(string $type, int $id): RedirectResponse
    {
        $socialMediaLink = SocialMediaLink::find($id);
        if (empty($socialMediaLink)) {
            return redirect()->back()->with("error", "Social Media Link not exist in system");
        }
        switch (strtolower($type)) {
            case "activate":
                if ($socialMediaLink->is_active == 1) {
                    return redirect()->back()->with("error", "Social Media Link Already active");
                }
                $socialMediaLink->is_active = 1;
                break;
            case "deactivate":
                if ($socialMediaLink->is_active == 0) {
                    return redirect()->back()->with("error", "Social Media Link  Already no active");
                }
                $socialMediaLink->is_active = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $socialMediaLink->save();
        return redirect()->back()->with("success", "Social Media Link Status updated successfully");
    }

}
