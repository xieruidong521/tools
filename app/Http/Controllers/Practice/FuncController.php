<?php
namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use App\Jobs\GetCategory;
use App\Model\Users;
use Carbon\Carbon;

class FuncController extends Controller
{
    public function index()
    {
        dispatch(new GetCategory());
    }
}