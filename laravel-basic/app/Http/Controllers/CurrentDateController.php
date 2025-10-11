<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrentDateController extends Controller
{
    function showCurrentDate() {
        $current_date = date('m月d日');

        return view('current-date', compact('current_date'));
    }
}
