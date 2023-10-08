<?php

namespace App\Http\Controllers;

use App\Http\Requests\City\StoreCityRequest;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CityController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:city-list',   ['only' => ['index']]);
        $this->middleware('permission:city-chengStatus', ['only' => ['chengStatus']]);
    }

    public function index()
    {
        $cities = City::whereHas('governorate', function($q){
            return $q->where('status', '=', 'active');
        })->get();
        return view('dashbord.cities.index', compact('cities'));
    }


    public function chengStatus($slug)
    {

        $city = City::where('slug', $slug)->first();
        if ($city->status == 'active') {
            $status = 'inactive';
        } else {
            $status = 'active';
        }
        $city->update(['status' => $status]);
        return redirect()->back()
            ->with('success', __('master.messages_success_cheng'));
    }


    public function getCities($governorateId)
    {
        $cities = City::where('governorate_id', $governorateId)->get();

        return response()->json(['cities' => $cities]);
    }



    // public function create()
    // {
    //     $governorates = Governorate::get();
    //     return view('dashbord.cities.create', compact('governorates'));
    // }

    // public function store(StoreCityRequest $request)
    // {
    //     $data = $request->validated();
    //     City::create($data);
    //     $governorates = Governorate::get();
    //     return view('dashbord.cities.create', compact('governorates'));
    // }



    // public function edit($id)
    // {
    //     $city = City::find($id);
    //     return view('dashbord.cities.edit', compact('city'));
    // }

    // public function update(Request $request, City $city)
    // {
    //     $data = $request->all();
    //     $city->update($data);
    //     return $request->all();
    // }
}
