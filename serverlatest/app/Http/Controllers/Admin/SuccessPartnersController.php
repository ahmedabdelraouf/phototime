<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SuccessPartners\CreateRequest;
use App\Http\Requests\Admin\SuccessPartners\UpdateRequest;
use App\Models\SuccessPartner;
use Illuminate\Http\RedirectResponse;

class SuccessPartnersController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function listData()
    {
        $successPartners = SuccessPartner::paginate(20);
        return view('admin.modules.successPartners.list_data', ['successPartners' => $successPartners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.successPartners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(CreateRequest $request): RedirectResponse
    {
        $successPartnerData = $request->validated();
        $image_name = store_image($request->image, "successPartners", $request->image_name);
        $successPartnerData["image"] = $image_name;
        $successPartner = SuccessPartner::updateOrCreate(["title" => $successPartnerData['title']], $successPartnerData);
        if (!empty($successPartner->id)) {
            return redirect()->route("admin.successPartners.list")->with("success", "Social media Link Added successfully");
        }
        return redirect()->back()->withInput()->with("error", "No data saved please try again")->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.modules.successPartners.edit');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $successPartner = SuccessPartner::find($id);
        if (empty($successPartner)) {
            return redirect()->route("admin.successPartners.list")->with("error", "Success Partner not exist in system");
        }
        return view("admin.modules.successPartners.edit", get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $successPartner = SuccessPartner::find($id);
        if (empty($successPartner)) {
            return redirect()->route("admin.successPartners.list")->with("error", "Success Partner not exist in system");
        }
        $successPartnerUpdates = $request->validated();
        if (!empty($request->image)) {
            $successPartnerUpdates["image"] = store_image($request->image, "successPartners", $request->image_name);
        }
        $successPartner->update($successPartnerUpdates);
        return redirect()->route("admin.successPartners.list")->with("success", "Success Partner Created successfully");
    }


    /**
     * @param string $type
     * @param int $id
     * @return RedirectResponse
     */
    function updateStatus(string $type, int $id): RedirectResponse
    {
        $successPartner = SuccessPartner::find($id);
        if (empty($successPartner)) {
            return redirect()->back()->with("error", "Social Media Link not exist in system");
        }
        switch (strtolower($type)) {
            case "activate":
                if ($successPartner->is_active == 1) {
                    return redirect()->back()->with("error", "Social Media Link Already active");
                }
                $successPartner->is_active = 1;
                break;
            case "deactivate":
                if ($successPartner->is_active == 0) {
                    return redirect()->back()->with("error", "Social Media Link  Already no active");
                }
                $successPartner->is_active = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $successPartner->save();
        return redirect()->back()->with("success", "Social Media Link Status updated successfully");
    }

}
