<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view("pages.index");
    }

    public function contact()
    {
        return view("pages.contact");
    }

    public function reviews()
    {
        return view("pages.reviews");
    }

    public function admin()
    {
        return view("admin.index");
    }
}
