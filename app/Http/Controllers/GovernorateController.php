<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:governorate-list',   ['only' => ['index']]);
        $this->middleware('permission:governorate-chengStatus', ['only' => ['chengStatus']]);
        $this->middleware('permission:governorate-edit', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $governorates = Governorate::get();
        return view('dashbord.governorates.index', compact('governorates'));
    }

    public function edit($id)
    {
        $governorate = Governorate::find($id);
        // return $governorate;
        return view('dashbord.governorates.edit', compact('governorate'));
    }

    public function update(Request $request, $id)
    {
        $governorate = Governorate::find($id);
        $governorate->update(['price' => $request->price]);
        return redirect()->back()
            ->with('success', __('master.messages_edit'));
    }

    public function chengStatus($slug)
    {

        $city = Governorate::where('slug', $slug)->first();
        if ($city->status == 'active') {
            $status = 'inactive';
        } else {
            $status = 'active';
        }
        $city->update(['status' => $status]);
        return redirect()->back()
            ->with('success', __('master.messages_success_cheng'));
    }
}
