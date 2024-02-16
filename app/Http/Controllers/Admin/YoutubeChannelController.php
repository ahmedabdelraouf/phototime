<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\youtubechannel\CreateRequest;
use App\Http\Requests\Admin\youtubechannel\UpdateRequest;
use App\Models\YoutubeChannel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class YoutubeChannelController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function listData()
    {
        $youtubechannelLinks = YoutubeChannel::paginate(20);
        return view('admin.modules.youtube_channel.list_data', ['youtubechannelLinks' => $youtubechannelLinks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.youtube_channel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request): RedirectResponse
    {
        $youtubeChannelLinkData = $request->except("_token");
        $image_name = store_image($request->image, "youtubechannel", $request->image_name);
        $youtubeChannelLinkData["image"] = $image_name;
        $youtubeChannelLink = YoutubeChannel::create($youtubeChannelLinkData);
        if (!empty($youtubeChannelLink->id)) {
            return redirect()->route("admin.youtubeChannel.list")->with("success", "Social media Link Added successfully");
        }
        return redirect()->back()->withInput()->with("error", "No data saved please try again")->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.modules.youtube_channel.edit');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $youtubeChannelLink = YoutubeChannel::find($id);
        if (empty($youtubeChannelLink)) {
            return redirect()->route("admin.youtubeChannel.list")->with("error", "youtube Linknot exist in system");
        }
        return view("admin.modules.youtube_channel.edit", get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $youtubeChannelLink = YoutubeChannel::find($id);
        if (empty($youtubeChannelLink)) {
            return redirect()->route("admin.youtubeChannel.list")->with("error", "youtube Linknot exist in system");
        }
        $youtubeChannelLinkUpdates = $request->except("_token");
        if (!empty($request->image)) {
            $youtubeChannelLinkUpdates["image"] = store_image($request->image, "youtubechannel", $request->image_name);
        }
        $youtubeChannelLink->update($youtubeChannelLinkUpdates);
        return redirect()->route("admin.youtubeChannel.list")->with("success", "youtube LinkCreated successfully");
    }


    /**
     * @param string $type
     * @param int $id
     * @return RedirectResponse
     */
    function updateStatus(string $type, int $id): RedirectResponse
    {
        $youtubeChannelLink = YoutubeChannel::find($id);
        if (empty($youtubeChannelLink)) {
            return redirect()->back()->with("error", "Social Media Link not exist in system");
        }
        switch (strtolower($type)) {
            case "activate":
                if ($youtubeChannelLink->is_active == 1) {
                    return redirect()->back()->with("error", "Social Media Link Already active");
                }
                $youtubeChannelLink->is_active = 1;
                break;
            case "deactivate":
                if ($youtubeChannelLink->is_active == 0) {
                    return redirect()->back()->with("error", "Social Media Link  Already no active");
                }
                $youtubeChannelLink->is_active = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $youtubeChannelLink->save();
        return redirect()->back()->with("success", "Social Media Link Status updated successfully");
    }

}
