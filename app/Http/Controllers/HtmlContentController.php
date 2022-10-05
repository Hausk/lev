<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HtmlContentController extends Controller
{
    public function index()
    {
        return view('htmlcontent.index');
    }
}
