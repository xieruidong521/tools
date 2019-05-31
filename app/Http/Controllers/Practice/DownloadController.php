<?php

namespace App\Http\Controllers\Practice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function index()
    {
        return response()->file('D:/zhengquanjichuzhishi.pdf');
    }
}
