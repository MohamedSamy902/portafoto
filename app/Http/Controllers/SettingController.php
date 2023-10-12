<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $setting = Setting::find(1)->first();
        return view('dashbord.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $setting = Setting::find(1);
        $setting->update([
            // 'name' => [
            //     'en' => $request->name,
            //     'ar' => $request->name_ar,
            // ],
            'description' => [
                'en' => $request->description,
                'ar' => $request->description_ar,
            ],
            'keywords' => [
                'en' => $request->keywords,
                'ar' => $request->keywords_ar,
            ],

            'facebook' =>  $request->facebook,
            'instagram' => $request->instagram,
            'twitter'  => $request->twitter,
            'messenger' => $request->messenger,
            'mobile_1' => $request->mobile_1,
            'mobile_2' => $request->mobile_2,
            'vodafoneCash' => $request->vodafoneCash,
            'instapay' => $request->instapay,
        ]);
        return redirect()->back()
                ->with('success', __('master.messages_edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        abort(404);
    }
}
