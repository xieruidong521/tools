<?php
namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecaptchaController extends Controller
{
    public function index()
    {
        return view("google.recaptcha");
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
}