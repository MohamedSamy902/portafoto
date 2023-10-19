<?php

namespace App\Http\Controllers;

use App\Models\StandardColor;
use Illuminate\Http\Request;

class StandardColorController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:standardColor-list',   ['only' => ['index']]);
        $this->middleware('permission:standardColor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:standardColor-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:standardColor-delete', ['only' => ['destroy']]);
    }

}
