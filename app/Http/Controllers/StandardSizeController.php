<?php

namespace App\Http\Controllers;

use App\Models\StandardSize;
use Illuminate\Http\Request;

class StandardSizeController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:standardSize-list',   ['only' => ['index']]);
        $this->middleware('permission:standardSize-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:standardSize-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:standardSize-delete', ['only' => ['destroy']]);
    }


}
