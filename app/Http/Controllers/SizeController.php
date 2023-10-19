<?php

namespace App\Http\Controllers;

use App\Http\Requests\Size\UpdateSizeRequest;
use App\Http\Requests\Size\UpdateSizeRrquest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
  
    public function update(UpdateSizeRequest $request, $id)
    {
        $size = Size::find($id);
        $uniqSize = Size::where('standard_size_id', $request->standard_size_id)->where('product_id', $request->product_id)->where('id', '!=', $id)->count();
        // return $uniqSize;
        if ($uniqSize == 0) {
            $size->update($request->validated());
        }
        else {
            return redirect()->back()
                ->with('error', __('master.messages_error_size'));
        }
        return redirect()->back()
                ->with('success', __('master.messages_edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Size::find($id)->delete();
        return redirect()->back()
        ->with('success', __('master.messages_delete'));

    }
}
